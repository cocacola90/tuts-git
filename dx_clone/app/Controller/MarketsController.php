<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class MarketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Market->recursive = 0;
		$this->set('markets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Market->exists($id)) {
			throw new NotFoundException(__('Invalid market'));
		}
		$options = array('conditions' => array('Market.' . $this->Market->primaryKey => $id));
		$this->set('market', $this->Market->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Market->create();
			$this->request->data['Market']['slug'] = $this->Tool->slug($this->request->data['Market']['name']);
			if ($this->Market->save($this->request->data)) {
				$this->Session->setFlash(__('The market has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The market could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Market->exists($id)) {
			throw new NotFoundException(__('Invalid market'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Market']['slug'] = $this->Tool->slug($this->request->data['Market']['name']);
			if ($this->Market->save($this->request->data)) {
				$this->Session->setFlash(__('The market has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The market could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Market.' . $this->Market->primaryKey => $id));
			$this->request->data = $this->Market->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Market->id = $id;
		if (!$this->Market->exists()) {
			throw new NotFoundException(__('Invalid market'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Market->delete()) {
			$this->Session->setFlash(__('The market has been deleted.'));
		} else {
			$this->Session->setFlash(__('The market could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function load_all_markets()
	{
		$market = $this->Market->find('all', 
			array(
				'recursive' => -1,
				'fields' => array('id', 'name', 'slug')
			)
		);
		return $market;
	}
	
	public function index($category)
	{
		$this->loadModel('Product');
		if($this->request->is('post'))
		{
			//pr($this->request->data['Product']); exit;
			$arr = implode(',', $this->request->data['Product']);
			
			$products = $this->Paginator->settings = array(
				'joins' => array(
					array(
						'table' => 'products_values',
						'alias' => 'ProductsValue',
						'type' => 'inner',
						'conditions' => array('Product.id = ProductsValue.product_id')
					),
					array(
						'table' => 'values',
						'alias' => 'Value',
						'type' => 'inner',
						'conditions' => array('ProductsValue.value_id = Value.id')
					)
				),
				'recursive' => -1,
				'limit' => 10,
				'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'sale_artifacts'),
				'contain' => array(
					'Category' => array(
						'fields' => array('id', 'name', 'slug')
					)
				),
				'conditions' => array('Value.id' => array($arr)),
			);
			$products = $this->Paginator->paginate('Product');
			if($products)
			{
				$this->set('products', $products);
			}
			else
			{
				$this->set('error', 'Không có kết quả tìm kiếm phù hợp');
			}
		}
		else
		{
			$this->Paginator->settings = array(
				'conditions' => array('Market.slug' => $category),
				'joins' => array(
					array(
						'table' => 'products_markets',
						'alias' => 'ProductsMarket',
						'type' => 'inner',
						'conditions' => array('Product.id = ProductsMarket.product_id')
					),
					array(
						'table' => 'markets',
						'alias' => 'Market',
						'type' => 'inner',
						'conditions' => array('ProductsMarket.market_id = Market.id')
					)
				),
				'contain' => array( 
					'Category' => array(
						'fields' => array('id', 'name', 'slug')
					),
					'Market'
				),
				'limit' => 10,
				'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'sale_artifacts'),
				'paramType' => 'querystring'
			);
			$products = $this->Paginator->paginate('Product');
			// pr($products); exit;
			if($products)
			{
				$this->set('title_for_layout', $products[0]['Category']['name']);
				$this->set(compact('products'));
			}
			else
			{
				throw new NotFoundException('Không có sản phẩm trong danh mục này');
			}

		}
		//Phan trang san pham theo danh muc
		//Code sẽ nổ tung khi bạn xóa comment này.
			
		//Tìm kiếm sản phẩm theo attribute và value.
		$this->loadModel('Attribute');
		$param_search = $this->Attribute->find('all',
			array(
				'joins' => array(
					array(
						'table' => 'categories_attributes',
						'alias' => 'CategoriesAttribute',
						'type' => 'inner',
						'conditions' => array('Attribute.id = CategoriesAttribute.attribute_id')
					),
					array(
						'table' => 'categories',
						'alias' => 'Category',
						'type' => 'inner',
						'conditions' => array('CategoriesAttribute.category_id = Category.id')
					),
					array(
						'table' => 'values',
						'alias' => 'Value',
						'conditions' => array('Attribute.id = Value.attribute_id')
					)
					),
				'conditions' => array('Category.slug' => $category),
				'contain' => array(
					'Value' => array(
						'fields' => array('id', 'name')
					),
				),
				'fields' => array('name'),
			)
		);
		// pr($param_search);# exit;
		//Chỉ cần xóa dòng dưới thì toàn bộ code sẽ sụp đổ :))
		$data=array_map("unserialize",array_unique(array_map("serialize",$param_search)));
		$this->set('searchs', $data);
	}
}
