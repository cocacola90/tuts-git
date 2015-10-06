<?php
App::uses('AppController', 'Controller');
/**
 * Accountlogs Controller
 *
 * @property Accountlog $Accountlog
 * @property PaginatorComponent $Paginator
 */
class AccountlogsController extends AppController {

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
		$this->Accountlog->recursive = 0;
		$this->set('accountlogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Accountlog->exists($id)) {
			throw new NotFoundException(__('Invalid accountlog'));
		}
		$options = array('conditions' => array('Accountlog.' . $this->Accountlog->primaryKey => $id));
		$this->set('accountlog', $this->Accountlog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accountlog->create();
			if ($this->Accountlog->save($this->request->data)) {
				$this->Session->setFlash(__('The accountlog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accountlog could not be saved. Please, try again.'));
			}
		}
		$users = $this->Accountlog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Accountlog->exists($id)) {
			throw new NotFoundException(__('Invalid accountlog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Accountlog->save($this->request->data)) {
				$this->Session->setFlash(__('The accountlog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accountlog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Accountlog.' . $this->Accountlog->primaryKey => $id));
			$this->request->data = $this->Accountlog->find('first', $options);
		}
		$users = $this->Accountlog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Accountlog->id = $id;
		if (!$this->Accountlog->exists()) {
			throw new NotFoundException(__('Invalid accountlog'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Accountlog->delete()) {
			$this->Session->setFlash(__('The accountlog has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accountlog could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
