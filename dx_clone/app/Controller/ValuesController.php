<?php
App::uses('AppController', 'Controller');
/**
 * Values Controller
 *
 * @property Value $Value
 * @property PaginatorComponent $Paginator
 */
class ValuesController extends AppController {

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
		$this->Value->recursive = 0;
		$this->set('Values', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Value->exists($id)) {
			throw new NotFoundException(__('Invalid attribute value'));
		}
		$options = array('conditions' => array('Value.' . $this->Value->primaryKey => $id));
		$this->set('Value', $this->Value->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Value']['slug'] = $this->Tool->slug($this->request->data['Value']['name']);
			// pr($this->request->data);exit;
			$this->Value->create();
			if ($this->Value->save($this->request->data)) {
				$this->Session->setFlash(__('The attribute value has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attribute value could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('Category');
		$categories = $this->Category->find('list', array('conditions' => array('Category.type' => 0)));
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Value->exists($id)) {
			throw new NotFoundException(__('Invalid attribute value'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Value']['slug'] = $this->Tool->slug($this->request->data['Value']['name']);
			if ($this->Value->save($this->request->data)) {
				$this->Session->setFlash(__('The attribute value has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attribute value could not be saved. Please, try again.'));
			}
		} else {
			$options = array(
				'conditions' => array('Value.' . $this->Value->primaryKey => $id),
				// 'recursive' => -1
				'contain' => array('Attribute')
			);
			$attribute_value = $this->Value->find('first', $options);
			// pr($attribute_value); exit;
			
			// pr($attribute); exit;
			$this->request->data = $attribute_value;
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
		$this->Value->id = $id;
		if (!$this->Value->exists()) {
			throw new NotFoundException(__('Invalid attribute value'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Value->delete()) {
			$this->Session->setFlash(__('The attribute value has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attribute value could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * get_list_attributes method
 *
 * @return void
*/
	public function get_list_attributes()
	{
		$this->autoRender = false;
		// if($this->request->is('post'))
		// {

			// $category_id = $this->request->data['category'];
			$category_id = 1;
			$this->loadModel('Attribute');
			$attributes = $this->Attribute->find('list',
				array(
					'fields' => array('id', 'name'),
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
						)
					)
				)
			);

			if($attributes)
			{
				$str = '<select name="data[Value][attribute_id]" id="AttributeAttributeId">';
				foreach($attributes as $key=>$value)
				{
					$str .= '<option value="' . $key . '">' . $value . '</option>';
				}
				$str .= '</select>';
			}
			else
			{
				$str = 'Chưa có thuộc tính cho danh mục này. <a href=""> Click vào đây</a> để thêm mới';
			}
			echo $str;
		// }
	}
}
