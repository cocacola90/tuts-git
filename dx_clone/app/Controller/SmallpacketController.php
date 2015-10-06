<?php 
App::uses('AppController','Controller');
class SmallpacketController extends AppController{
	
	public $components = array('Paginator');
	public function admin_index()
	{
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Smallpacket']['cid'];
			$status = $this->request->data['Smallpacket']['status'];
			$this->changeStatus($cid,'Smallpacket','smallpackets','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('created' => 'asc')
		);
		$this->set('smallpackets' , $this->Paginator->paginate('Smallpacket'));
	}
	
	public function admin_add(){
		if($this->request->is('post'))
		{
			if($this->Smallpacket->save($this->request->data))
			{
				$this->Session->setFlash('Them gia cuoc thanh cong!');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Them gia cuoc khong thanh cong!');
			}
		}
	}
	public function admin_edit($id = null)
	{
		if (!$this->Smallpacket->exists($id)) {
                throw new NotFoundException(__('Invalid Smallpacket'));
        }
		if ($this->request->is(array('post', 'put'))) {
           
                if ($this->Smallpacket->save($this->request->data)) {
                        $this->Session->setFlash(__('Thay doi gia cuoc thanh cong'));
                        return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Session->setFlash(__('Thay doi gia cuoc khong thanh cong'));
                }
        } else {
                $options = array('conditions' => array('Smallpacket.' . $this->Smallpacket->primaryKey => $id));
                $this->request->data = $this->Smallpacket->find('first', $options);
        }
	}
	
	public function admin_delete($id = null) {
		$this->Smallpacket->id = $id;
		if (!$this->Smallpacket->exists()) {
			throw new NotFoundException(__('Invalid Smallpacket'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Smallpacket->delete()) {
			$this->Session->setFlash(__('Xoa gia cuoc thanh cong'));
		} else {
			$this->Session->setFlash(__('Xoa gia cuoc khong thanh cong.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_test(){
		
		//$this->autoRender = false;
		$weight = 50;
		$dt = $this->Smallpacket->find('all',array(
			'conditions' => array(
				'to_weight <=' => $weight,
				'from_weight >=' => $weight,
			)
		));
		pr($dt);exit;
	}
}
?>