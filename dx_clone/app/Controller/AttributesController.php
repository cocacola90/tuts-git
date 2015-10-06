<?php
App::uses('AppController', 'Controller');
/**
 * Attributes Controller
 *
 * @property Attribute $Attribute
 * @property PaginatorComponent $Paginator
 */
class AttributesController extends AppController {

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
		$this->Attribute->recursive = 0;
		$this->set('attributes', $this->Paginator->paginate());
		$this->set('title_for_layout', 'Danh sách các thuộc tính hiện có');
		$this->set('menu', 1);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Attribute->exists($id)) {
			throw new NotFoundException(__('Invalid attribute'));
		}
		$options = array('conditions' => array('Attribute.' . $this->Attribute->primaryKey => $id));
		$this->set('attribute', $this->Attribute->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Attribute->create();
			$this->request->data['Attribute']['slug'] = $this->Tool->slug($this->request->data['Attribute']['name']);
			if ($this->Attribute->save($this->request->data)) {
				$this->Session->setFlash(__('The attribute has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attribute could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Attribute->Category->find('list', array('conditions' => array('Category.type' => 0)));
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
		if (!$this->Attribute->exists($id)) {
			throw new NotFoundException(__('Invalid attribute'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Attribute']['slug'] = $this->Tool->slug($this->request->data['Attribute']['name']);
			if ($this->Attribute->save($this->request->data)) {
				$this->Session->setFlash(__('The attribute has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attribute could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Attribute.' . $this->Attribute->primaryKey => $id));
			$this->request->data = $this->Attribute->find('first', $options);
		}
		$categories = $this->Attribute->Category->find('list', array('conditions' => array('Category.type' => 0)));
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Attribute->id = $id;
		if (!$this->Attribute->exists()) {
			throw new NotFoundException(__('Invalid attribute'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Attribute->delete()) {
			$this->Session->setFlash(__('The attribute has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attribute could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
