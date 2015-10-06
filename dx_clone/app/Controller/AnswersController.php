<?php 
App::uses('AppController','Controller');
class AnswersController extends AppController{
	public $uses = array('Contact','Answer','User');
	public function admin_add_answer($id = null){
		//$Contact_id = $this->request->query('Contact_id');
		$data_quest = $this->Contact->find('first',array(
			'conditions' => array(
				'Contact.id' => $id
			),
			'recursive' => 0,
			'Contact.status' => 0
		));
		
		$user = $this->Auth->user();
		if($data_quest)
		{
			$data_answer = $this->Answer->find('all',array(
				'conditions' => array(
					'Answer.contact_id' => $data_quest['Contact']['id'],	
				),
				'order' => array('Answer.created' => 'asc')
			));
			if($this->request->is('post'))
			{
				$this->request->data['Answer']['user_id'] = $data_quest['Contact']['user_id'];
				$this->request->data['Answer']['contact_id'] = $data_quest['Contact']['id'];
				$this->request->data['Answer']['staff_id'] = $user['id'];
				$this->request->data['Answer']['status'] = 1;
				if($this->Answer->save($this->request->data))
				{
					$this->Session->setFlash('Trả lời câu hỏi thành công!','default',array('class'=>'alert alert-success'));
					$this->redirect($this->referer());
				}
				else
				{
					$this->Session->setFlash('Trả lời câu hỏi không thành công!','default',array('class'=>'alert alert-danger'));
				}
			}		
			$this->set(compact('data_quest','data_answer'));
		}
		else
		{
			$this->Session->setFlash('Câu hỏi đã được người dùng đóng lại','default',array('class'=>'alert alert-info'));
		}			
	}
	
	public function count_answer()
	{
		$user = $this->Auth->user();
		$count = $this->Answer->find('count',array(
			'conditions' => array(
				'Answer.status' => 1,
				'Answer.user_id' => $user['id']
			)
			
		));
		return $count;
	}
	public function update_status()
	{
		$this->autoRender = false;
		$contact_id = $this->request->data('quest_id');
		$user = $this->Auth->user();
		if($this->Answer->updateAll(
			array('Answer.status' => 0),
			array('Answer.contact_id' => $contact_id,'Answer.user_id' => $user['id'])
		)){
			$count = $this->Answer->find('count',array(
				'conditions' => array(
					'Answer.status' => 1,
					'Answer.user_id' => $user['id']
				)
			));
			echo $count;
		}else
		{
			echo 'False';
		}
		
	}
}
?>