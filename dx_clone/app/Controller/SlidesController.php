<?php
App::uses('AppController', 'Controller');
/**
 * Slides Controller
 *
 * @property Slide $Slide
 * @property PaginatorComponent $Paginator
 */
class SlidesController extends AppController {

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
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Slide']['cid'];
			$status = $this->request->data['Slide']['status'];
			$this->changeStatus($cid,'Slide','slides','publish',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Slide->recursive = 0;
		$this->set('slides', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
		$this->set('slide', $this->Slide->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slide->create();
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
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
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
			$this->request->data = $this->Slide->find('first', $options);
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
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Slide->delete()) {
			$this->Session->setFlash(__('The slide has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slide could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function get_advs(){
		$advs = Cache::read('cache_quangcao','short');
        //pr($slides);exit;
        if(!$advs)
        {
            $this->loadModel('Slide');
            $advs = $this->Slide->find('all',
                array('conditions' => array('publish' => 1,'type' => 1))
            );
            Cache::write('cache_quangcao',$advs,'short');
        }

		return $advs;
		
	}
}
