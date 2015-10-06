<?php
App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController
{

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
    public function admin_index()
    {
        if($this->request->is('post'))
		{
			$cid = $this->request->data['Category']['cid'];
			$status = $this->request->data['Category']['status'];
			$this->changeStatus($cid,'Category','categories','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			
		}
        $this->Category->recursive = 0;
        $this->Paginator->settings = array(
            'order' => array('lft' => 'asc')
        );
        $this->set('categories', $this->Paginator->paginate('Category'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Category->create();
            $this->request->data['Category']['slug'] = $this->Tool->slug($this->request->data['Category']['name']);
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }

        }
        $categories = $this->Category->generateTreeList();
        $this->set(compact('categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Category']['slug'] = $this->Tool->slug($this->request->data['Category']['name']);
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
            $categories = $this->Category->generateTreeList();
            $this->set(compact('categories'));
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('The category has been deleted.'));
        } else {
            $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function index($category)
    {
        $data_cat = $this->Category->findBySlug($category);
        if (!empty($data_cat)) {
            $this->loadModel('Product');
			$sub_cat_id = array();
			$get_parent = $this->Category->find('all',array(
					'conditions' => array(
						'parent_id' => $data_cat['Category']['id']
					)
				));
			if($get_parent)
			{
				$data_cat_id = array($data_cat['Category']['id']);
				foreach($get_parent as $val_p)
				{
					$parent_id[] = $val_p['Category']['id'];
				}
			
				$sub_cat_id = array_merge($data_cat_id, $parent_id);
			}
			else
			{
				$sub_cat_id = array($data_cat['Category']['id']);
			}
			/* $parent_id = $data_cart['Category']['parent_id'];
			if($parent_id == NULL)
			{
				$s = $this->Category->find('all',array(
					'conditions' => array(
						'id' => $data_cat['Category']['id']
					)
				));
				if()
			} */
			//$sub_cat_id = implode(',', $sub_cat_id);
			//pr($sub_cat_id);
            if ($this->request->is('post')) {
				if(!empty($this->request->data['Product']))
				{
					$check_val = $this->request->data['Product'];
					$arr = implode(',', $this->request->data['Product']);
						
					$this->Paginator->settings = array(
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
						'limit' => 16,
						'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'sale_artifacts', 'discount', 'discount_status','weight','publish'),
						'contain' => array(
							'Category' => array(
								'fields' => array('id', 'name', 'slug')
							)
						),
						'order' => array('Product.created' => 'desc'),
						'conditions' => array(
							'Value.id' => array($arr),
							'Product.status' => 1,
							'Product.category_id' => $sub_cat_id
						)
					);
					$products = $this->Paginator->paginate('Product');
					// pr($products); exit;
					if ($products) {
						$this->set('check_val',$check_val);
						$this->set('products', $products);
					} else {
						$this->Session->setFlash(SYS_MSG16,'default',array('class'=>'alert alert-info'),'cat');
					}
				}else
				{
					$this->Session->setFlash(SYS_MSG16,'default',array('class'=>'alert alert-info'),'cat');
					$this->redirect($this->referer());
				}
            } else {
				pr($sub_cat_id);
				
                $this->Paginator->settings = array(
                    'conditions' => array(
						'Product.category_id' => $sub_cat_id,
						// 'Category.slug' => $category,
						'Product.status' => 1
					),
                    'contain' => array(
                        'Category' => array(
                            'fields' => array('id', 'name', 'slug')
                        )
                    ),
					'order' => array('Product.created' => 'desc'),
                    'limit' => 16,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'sale_artifacts', 'discount', 'discount_status','weight','publish'),
                    'paramType' => 'querystring'
                );
                $products = $this->Paginator->paginate('Product');
                if ($products) {
                    $this->set('title_for_layout', $products[0]['Category']['name']);
                    $this->set(compact('products'));
                } else {
                    $this->redirect('/err');
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
                    'conditions' => array(
						'Category.slug' => $category
					),
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
            $data = array_map("unserialize", array_unique(array_map("serialize", $param_search)));
            $this->set('searchs', $data);
            $this->set('categories',$data_cat);
        } else {
            $this->redirect('/err');
        }

    }

    /*public function load_all_categories()
    {
        $categories = $this->Category->find('all',
            array(
                'recursive' => -1,
                'fields' => array('id', 'slug', 'name'),
                'order' => array('Category.lft'=>'asc'),
            )
        );
        return $categories;
    }*/
    
    public function test()
    {
        
    }
	
	/* public function load_parent_cat($category_id = null)
	{
		$cat_data = $this->Category->find('first',array(
			'conditions' => array(
				'parant_'
			)
		));
	} */
}
