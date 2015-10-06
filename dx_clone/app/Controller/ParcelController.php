<?php 
App::uses('AppController','Controller');
class ParcelController extends AppController{	
	public $components = array('Paginator');
	public function admin_index()
	{
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Parcel']['cid'];
			$status = $this->request->data['Parcel']['status'];
			$this->changeStatus($cid,'Parcel','parcels','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Paginator->settings = array(
			'limit' => 200,
			'order' => array('created' => 'asc'),
			'conditions' => array('type' => 2)
		);
		$this->set('parcels' , $this->Paginator->paginate('Parcel'));
	}
	public function admin_ems()
	{
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Parcel']['cid'];
			$status = $this->request->data['Parcel']['status'];
			$this->changeStatus($cid,'Parcel','parcels','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Paginator->settings = array(
			'limit' => 200,
			'order' => array('created' => 'asc'),
			'conditions' => array('type' => 3)
		);
		$this->set('ems' , $this->Paginator->paginate('Parcel'));
	}
	
	public function admin_dhl()
	{
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Parcel']['cid'];
			$status = $this->request->data['Parcel']['status'];
			$this->changeStatus($cid,'Parcel','parcels','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Paginator->settings = array(
			'limit' => 200,
			'order' => array('created' => 'asc'),
			'conditions' => array('type' => 4)
		);
		$this->set('dhl' , $this->Paginator->paginate('Parcel'));
	}
	
	public function admin_add(){
		if($this->request->is('post'))
		{
			if($this->Parcel->save($this->request->data))
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
		if (!$this->Parcel->exists($id)) {
                throw new NotFoundException(__('Invalid Parcel'));
        }
		if ($this->request->is(array('post', 'put'))) {
           
                if ($this->Parcel->save($this->request->data)) {
                        $this->Session->setFlash(__('Thay doi gia cuoc thanh cong'));
                        return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Session->setFlash(__('Thay doi gia cuoc khong thanh cong'));
                }
        } else {
                $options = array('conditions' => array('Parcel.' . $this->Parcel->primaryKey => $id));
                $this->request->data = $this->Parcel->find('first', $options);
        }
	}
	
	public function admin_delete($id = null) {
		$this->Parcel->id = $id;
		if (!$this->Parcel->exists()) {
			throw new NotFoundException(__('Invalid Parcel'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parcel->delete()) {
			$this->Session->setFlash(__('Xoa gia cuoc thanh cong'));
		} else {
			$this->Session->setFlash(__('Xoa gia cuoc khong thanh cong.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
?>