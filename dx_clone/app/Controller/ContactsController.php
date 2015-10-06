<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

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
	public function index(){
		if ($this->request->is('post')) {
			$this->loadModel('Param');
			$params = $this->param_value('Sys','email_admin');
			//pr($params);
			$task = $this->request->data['Contact']['task'];
			$subject = $this->request->data['Contact']['subject'];
			$email = $this->request->data['Contact']['email'];
			$content = $this->request->data['Contact']['content'];
			$full_name = $this->request->data['Contact']['full_name'];
			
			if ($this->Contact->save($this->request->data)) {
				$mail_admin =  $params['Param']['value'];
				//echo $mail_admin;exit;
				$sendEmail  = new CakeEmail();
				$sendEmail 	-> config('smtp')
					-> from(array($email => $full_name .'- Volgashop'))
					-> to(array($mail_admin => "Admin"))
					-> subject($subject)
					-> template('contact')
					-> emailFormat('html')
					-> viewVars(array('message' => $content))
					-> send(); 
				$this->Session->setFlash('The ask has been saved.','default',array('class'=>'alert alert-success'),'contact');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('The ask could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'),'contact');
			}
			
			// if($task == "send") # danh cho nguoi dung chua dang nhap
			// {
				// $mail_admin =  $params['Param']['value'];
				// $sendEmail  = new CakeEmail();
				// $sendEmail 	-> config('smtp')
						// -> to(array($mail_admin => "Admin"))
						// -> subject($subject)
						// -> template('contact')
						// -> emailFormat('html')
						// -> viewVars(array('message' => $content))
						// -> send(); 
			// }
			// elseif($task == "ask") 
			// {
				// //pr($this->request->data);exit;
				// if ($this->Contact->save($this->request->data)) {
					// $this->Session->setFlash('The contact has been saved.','default',array('class'=>'alert alert-success'),'contact');
					// $this->redirect($this->referer());
				// } else {
					// $this->Session->setFlash('The contact could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'),'contact');
				// }
			// }
		}
	}
	public function compose(){
		$user = $this->Auth->user();
		if($user)
		{
			if ($this->request->is('post')) {
				$save = true;
				//pr($this->request->data);exit;
				if(!empty($this->request->data['Contact']['error_img']['name'])){
					$this->request->data['Contact']['slug'] = $this->Tool->slug($this->request->data['Contact']['subject']);
					$result = $this->UploadFile('compose','Contact','error_img');
					$save = true;
					if($result['status']==true){
						$filename = '/uploads/compose/'.$result['filename'];
						$this->request->data['Contact']['error_img'] = $filename;
					}else{
						$this->Session->setFlash('Do not upload the photos!','default',array('class'=>'alert alert-info'));
						$this->redirect('/contacts/list_ask');
						$save =false;
					}
				}else
				{
					unset($this->request->data['Contact']['error_img']);
				}
				if($save)
				{
					if ($this->Contact->save($this->request->data)) {
						$this->Session->setFlash('The contact has been saved.','default',array('class'=>'alert alert-success'),'contact');
						$this->redirect('/contacts/list_ask');
					} else {
						$this->Session->setFlash('The contact could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'),'contact');
					}
				}
			}	
		}
		else
		{
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		}
	}
	
	public function add_ask(){
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$this->loadModel('Param');
			$params = $this->param_value('Sys','email_admin');
			//pr($params);
			$task = $this->request->data['Contact']['task'];
			$subject = $this->request->data['Contact']['subject'];
			$email = $this->request->data['Contact']['email'];
			$content = $this->request->data['Contact']['content'];
			$full_name = $this->request->data['Contact']['full_name'];
			if ($this->Contact->save($this->request->data)) {
				$mail_admin =  $params['Param']['value'];
				//echo $mail_admin;exit;
				$sendEmail  = new CakeEmail();
				$sendEmail 	-> config('smtp')
					-> from(array($email => $full_name .'- Volgashop'))
					-> to(array($mail_admin => "Admin"))
					-> subject($subject)
					-> template('contact')
					-> emailFormat('html')
					-> viewVars(array('message' => $content))
					-> send(); 
				$this->Session->setFlash('The ask has been saved.','default',array('class'=>'alert alert-success'));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('The ask could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
			}
			// if($task == "send") # danh cho nguoi dung chua dang nhap
			// {
				
				// $mail_admin =  $params['Param']['value'];
				// //echo $mail_admin;exit;
				// $sendEmail  = new CakeEmail();
				// $sendEmail 	-> config('smtp')
						// -> to(array($mail_admin => "Admin"))
						// -> subject($subject)
						// -> template('contact')
						// -> emailFormat('html')
						// -> viewVars(array('message' => $content))
						// -> send(); 
				// /* $this->Session->setFlash('The ask has been saved.','default',array('class'=>'alert alert-success'));
				// $this->redirect($this->referer()); */
				// if ($this->Contact->save($this->request->data)) {
					// $this->Session->setFlash('The ask has been saved.','default',array('class'=>'alert alert-success'));
					// $this->redirect($this->referer());
				// } else {
					// $this->Session->setFlash('The ask could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
				// }
			// }
			// elseif($task == "ask") 
			// {
				// //pr($this->request->data);exit;
				// if ($this->Contact->save($this->request->data)) {
					// $this->Session->setFlash('The ask has been saved.','default',array('class'=>'alert alert-success'));
					// $this->redirect($this->referer());
				// } else {
					// $this->Session->setFlash('The ask could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
				// }
			// }
		}
	}
	
	# danh sach cac cau hoi ma nguoi dung da gui
	public function list_ask(){
		//Configure::write('debug', 2);
		if (!($this->Auth->loggedIn())) {
            $this->Session->setFlash(SYS_MSG1, 'default', array('class' => 'alert alert-info'));
			$this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }
		$user_info = $this->Auth->user();
		$this->Paginator->settings = array(
			'conditions' => array(
				'Contact.user_id' => $user_info['id'],
			),
			'limit' => 10,
			'order' => array('Contact.created'=>'desc')
		);
		
		$this->set('data_quest',$this->Paginator->paginate('Contact'));	
		$this->set('title_for_layout','Inbox');
	}
	public function check_new_inbox($contact_id,$user_id)
	{
		$this->loadModel('Answer');
		$check = $this->Answer->find('first',array(
			'conditions' => array(
				'Answer.user_id' => $user_id,
				'Answer.contact_id' => $contact_id,
				'Answer.status' => 1
			),
			'recursive' => '-1'
		));
		if(!empty($check))
		{
			return true;
		}
		else{
			return false;
		}
	}
	# chi tiet cau hoi va tra loi
	public function view_ask($id = null)
	{
		$this->loadModel('Answer');
		if (!($this->Auth->loggedIn())) {
            $this->redirect('/');
            $this->Session->setFlash(SYS_MSG1, 'default', array('class' => 'alert alert-info'));
        }
		$user_info = $this->Auth->user();
		#check nguoi dung da dong cau hoi chua
		$data_quest = $this->Contact->find('first',array(
			'conditions' => array(
				'Contact.user_id' => $user_info['id'],
				'Contact.id' => $id
			)
		));
		
		$data_answer = $this->Answer->find('all',array(
			'conditions' => array(
				'Answer.contact_id' => $data_quest['Contact']['id'],	
			),
			'order' => array('Answer.created' => 'asc')
		));
		// pr($data_answer);exit;	
		$count_answer = count($data_answer);
		
		if($this->request->is('post'))
		{
			$this->request->data['Answer']['user_id'] = $user_info['id'];
			$this->request->data['Answer']['contact_id'] = $id;
			
			if($this->Answer->save($this->request->data))
			{
				$this->Session->setFlash('Gửi câu hỏi thành công!','default',array('class'=>'alert alert-info'));
				$this->redirect($this->referer());
			}
			else{
				$this->Session->setFlash('Không gửi được câu hỏi!','default',array('class'=>'alert alert-info'));
			}
		}

		$this->set(compact('data_quest','count_answer','data_answer'));	
	}
	# dong cau hoi
	public function close_quest($id = null)
	{
		$this->loadModel('Contact');
		if($this->request->is('post'))
		{
			$this->Contact->id = $id;
			$this->Contact->saveField('status', 1);
			$this->redirect($this->referer());
		}
	}
	public function admin_index() {
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Contact']['cid'];
			$status = $this->request->data['Contact']['status'];
			$this->changeStatus($cid,'Contact','contacts','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('class'=>'alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Contact->recursive = 0;
		$this->Paginator->settings = array(
			'limit' => 10,
			'order' => array('created' => 'desc')
		);
		$this->set('contacts', $this->Paginator->paginate('Contact'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid Contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('Contact', $this->Contact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The Contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'));
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
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid Contact'));
		}
       
		if ($this->request->is(array('post', 'put'))) {
			#send email
			$full_name = $this->request->data['Contact']['full_name'];
			$to = $this->request->data['Contact']['email'];
			$subject = $this->request->data['Contact']['subject'];
			$message = $this->request->data['Contact']['message'];
			$sendEmail  = new CakeEmail();
			$sendEmail 	-> config('smtp')
						-> to(array($to => $full_name))
						-> subject($subject)
						-> template('contact')
						-> emailFormat('html')
						-> viewVars(array('message' => $message))
						-> send(); 
			 
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The Contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
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
		$this->Contact->id = $id;
		// if (!$this->Contact->exists()) {
			// throw new NotFoundException(__('Invalid Contact'));
		// }
		// $this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('The Contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_send_email()
	{
		if ($this->request->is(array('post', 'put'))) {
			#send email
			$full_name = $this->request->data['Contact']['full_name'];
			$to = $this->request->data['Contact']['email'];
			$subject = $this->request->data['Contact']['subject'];
			$message = $this->request->data['Contact']['message'];
			$sendEmail  = new CakeEmail();
			$sendEmail 	-> config('smtp')
						-> to(array($to => $full_name))
						-> subject($subject)
						-> template('contact')
						-> emailFormat('html')
						-> viewVars(array('message' => $message))
						-> send(); 
			$this->Session->setFlash('Gửi Email thành công','default',array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
	}
	public function admin_send_to_inbox($order_id)
	{
		$this->loadModel('Order');
		$data_order = $this->Order->find('first',array(
			'conditions' => array(
				'Order.id' => $order_id
			),
			'recursive' => '-1'
		));
		if(!empty($data_order))
		{
			if(!empty($data_order['Order']['user_id']))
			{
				if($this->request->is('post'))
				{
					$subject = $this->request->data['Contact']['subject'];
					$content = $this->request->data['Contact']['content'];
					$user_id = $data_order['Order']['user_id'];
					$full_name = $data_order['Order']['first_name'] . ' ' . $data_order['Order']['middle_name'] . ' '. $data_order['Order']['last_name'];
					$dtContact = array(
						'full_name' => $full_name,
						'user_id' => $user_id,
						'subject' => $subject,
						'content' => $content,
						'email' => $data_order['Order']['email'],
						'status' => 0,
						'error_img' => ""
					);
					$this->Contact->create();
					if($this->Contact->save($dtContact))
					{
						$contact_id = $this->Contact->id;
						$this->loadModel('Answer');
						$user = $this->Auth->user();
						$dtAnswer = array(
							'user_id' => $user['id'],
							'contact_id' => $contact_id,
							'answer' => $content,
							'staff_id' => $user['id'],
							'status' => 1
						);
						$this->Answer->create();
						if($this->Answer->save($dtAnswer))
						{
							$this->Session->setFlash('Gủi tin nhắn tới Inbox khách hàng thành công!','default',array('class'=>'alert alert-success'));
						}
						else
						{
							$this->Session->setFlash('Không thể gủi tin nhắn tới Inbox','default',array('class'=>'alert alert-danger'));
						}
					}
					$this->redirect($this->referer());
				}
			}
			else
			{
				$this->Session->setFlash('Đơn hàng dành cho Guest,Không thể gủi tin nhắn tới Inbox','default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
			}
		}
		else
		{
			$this->redirect('/err');
		}
	}
}
