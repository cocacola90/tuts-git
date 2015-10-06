<?php
App::uses('AppController', 'Controller');
/**
 * Giftcards Controller
 *
 * @property Giftcard $Giftcard
 * @property PaginatorComponent $Paginator
 */
class GiftcardsController extends AppController {

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
		$this->Giftcard->recursive = 0;
		$this->set('giftcards', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Giftcard->exists($id)) {
			throw new NotFoundException(__('Invalid giftcard'));
		}
		$options = array('conditions' => array('Giftcard.' . $this->Giftcard->primaryKey => $id));
		$this->set('giftcard', $this->Giftcard->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Giftcard->create();
			if ($this->Giftcard->save($this->request->data)) {
				$this->Session->setFlash(__('The giftcard has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The giftcard could not be saved. Please, try again.'));
			}
		}
		$users = $this->Giftcard->User->find('list');
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
		if (!$this->Giftcard->exists($id)) {
			throw new NotFoundException(__('Invalid giftcard'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Giftcard->save($this->request->data)) {
				$this->Session->setFlash(__('The giftcard has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The giftcard could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Giftcard.' . $this->Giftcard->primaryKey => $id));
			$this->request->data = $this->Giftcard->find('first', $options);
		}
		$users = $this->Giftcard->User->find('list');
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
		$this->Giftcard->id = $id;
		if (!$this->Giftcard->exists()) {
			throw new NotFoundException(__('Invalid giftcard'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Giftcard->delete()) {
			$this->Session->setFlash(__('The giftcard has been deleted.'));
		} else {
			$this->Session->setFlash(__('The giftcard could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
