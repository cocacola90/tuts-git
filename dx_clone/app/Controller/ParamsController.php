<?php 
App::uses('AppControler','Controller');
class ParamsController extends AppController{
	
	public $components = array('Paginator');
	
	public function admin_index(){
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Param']['cid'];
			$status = $this->request->data['Param']['status'];
			$this->changeStatus($cid,'Param','params','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Paginator->settings = array(
			'order' => array('created' => 'desc'),
			'limit' => 10
		);
		$this->set('params',$this->Paginator->paginate('Param'));
	}
	/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Param->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Param.' . $this->Param->primaryKey => $id));
		$this->set('param', $this->Param->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Param->create();
			if ($this->Param->save($this->request->data)) {
				$this->Session->setFlash(__('The Param has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Param could not be saved. Please, try again.'));
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
		if (!$this->Param->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Param->save($this->request->data)) {
				$this->Session->setFlash(__('The Param has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Param could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Param.' . $this->Param->primaryKey => $id));
			$this->request->data = $this->Param->find('first', $options);
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
		$this->Param->id = $id;
		if (!$this->Param->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Param->delete()) {
			$this->Session->setFlash(__('The Param has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Param could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
?>