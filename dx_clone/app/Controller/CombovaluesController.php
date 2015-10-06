<?php 
App::uses('AppController','Controller');
class CombovaluesController extends AppController{
	
	public $components = array('Paginator');
	public function admin_index()
	{
		Configure::write('debug',2);
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('created' => 'asc')
		);
		$this->set('combovalues' , $this->Paginator->paginate('Combovalue'));
	}
	
	public function admin_add(){
		if($this->request->is('post'))
		{
			if($this->Combovalue->save($this->request->data))
			{
				$this->Session->setFlash('The combo value has been saved.!');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('The combo value could not be saved.!');
			}
		}
	}
	public function admin_edit($id = null)
	{
		if (!$this->Combovalue->exists($id)) {
                throw new NotFoundException(__('Invalid Combovalue'));
        }
		if ($this->request->is(array('post', 'put'))) {
           
                if ($this->Combovalue->save($this->request->data)) {
                        $this->Session->setFlash(__('The combo value has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Session->setFlash(__('The combo value could not be saved.'));
                }
        } else {
                $options = array('conditions' => array('Combovalue.' . $this->Combovalue->primaryKey => $id));
                $this->request->data = $this->Combovalue->find('first', $options);
        }
	}
	
	public function admin_delete($id = null) {
		$this->Combovalue->id = $id;
		if (!$this->Combovalue->exists()) {
			throw new NotFoundException(__('Invalid Combovalue'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Combovalue->delete()) {
			$this->Session->setFlash(__('The combo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The combo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function get_value_combo(){
		
		$combovalues = $this->Combovalue->find('all',array(
			'conditions' => array('Combovalue.status' => 1),
			'limit' => 3
		));
		return $combovalues;
		pr($dt);exit;
	}
}
?>