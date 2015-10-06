<?php
App::uses('AppController', 'Controller');
/**
 * ProductsUsers Controller
 *
 * @property ProductsUser $ProductsUser
 * @property PaginatorComponent $Paginator
 */
class ProductsUsersController extends AppController {

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
	public function index() {
		$this->ProductsUser->recursive = 0;
		$this->set('productsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsUser->exists($id)) {
			throw new NotFoundException(__('Invalid products user'));
		}
		$options = array('conditions' => array('ProductsUser.' . $this->ProductsUser->primaryKey => $id));
		$this->set('productsUser', $this->ProductsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsUser->create();
			if ($this->ProductsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The products user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products user could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductsUser->Product->find('list');
		$users = $this->ProductsUser->User->find('list');
		$this->set(compact('products', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductsUser->exists($id)) {
			throw new NotFoundException(__('Invalid products user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The products user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsUser.' . $this->ProductsUser->primaryKey => $id));
			$this->request->data = $this->ProductsUser->find('first', $options);
		}
		$products = $this->ProductsUser->Product->find('list');
		$users = $this->ProductsUser->User->find('list');
		$this->set(compact('products', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductsUser->id = $id;
		if (!$this->ProductsUser->exists()) {
			throw new NotFoundException(__('Invalid products user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductsUser->delete()) {
			$this->Session->setFlash(__('The products user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
