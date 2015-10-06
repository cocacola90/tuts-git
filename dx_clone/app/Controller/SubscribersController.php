<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Validation', 'Utility');
App::uses('File', 'Utility');
class SubscribersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add_email');
	}
	public $components = array('Paginator');
	public function add_email(){
		$this->layout = "index";
		if($this->request->is('post'))
		{
			if($this->Subscriber->save($this->request->data))
			{
				$this->Session->setFlash('Gui email thanh cong');
			}
			else
			{
				$this->Session->setFlash('Gui email khong thanh cong');
			}
		}
	}
	
	
	public function index()
	{
		$this->layout = 'admin';
		/*if($this->request->is('post'))
		{	
			$subject = $this->request->data['Subscriber']['subject'];
			$content = $this->request->data['Subscriber']['content'];
			$this->loadModel('Video');
			$data_email = $this->Subscriber->find('all');
			$products = $this->Video->find('all',array(
				'limit' => 4,
				'order' => array('created' => 'desc'),
				'recursive' => -1
			));
			
			foreach($data_email as $item)
			{
				$email[] = $item['Subscriber']['email'];
			}
			// $list_email = array_push($email,$list_email);
			//pr($email);exit;
			
				//$email = $item['Subscriber']['email'];
				$sendEmail  = new CakeEmail();
				$sendEmail 	-> config('smtp')
							-> bcc($email)
							-> subject($subject)
							-> template('products')
							-> emailFormat('html')
							-> viewVars(array('products' => $products,'content' => $content))
							-> send(); 
			
		}*/
		if($this->request->is('post'))
		{	
			$this->loadModel('Product');
			$subject = $this->request->data['Subscriber']['subject'];
			$content = $this->request->data['Subscriber']['content'];
			$list = $this->Subscriber->find('list',array(
			'fields' => array('email')
			));
		pr($list); exit;
		$Email->layout('default');
		$Email = new CakeEmail();
		$Email->config('smtp');
		$Email->bcc($list);
		$Email->subject('New products');
		$Email->send('List new products');
		exit;
		}
	}
	public function sub() //them
	{
		if($this->Auth->loggedIn())
		{
			$data = $this->request->data;
			if(!empty($data)){
				$tmp = $this->Subscriber->find('first',array(
						'conditions' => array('Subscriber.email' => $data['Subscriber']['email'])
						));
				if(!empty($tmp)) $this->Session->setFlash('Email đã đăng ký','default',array('class' => 'alert alert-info'));
					else
					{
						$email['Subscriber']['email'] = $data['Subscriber']['email'];
						$this->Subscriber->create();
						if($this->Subscriber->save($email['Subscriber'])) $this->Session->setFlash('subscribe thành công','default',array('class' => 'alert alert-info'));
						else $this->Session->setFlash('Lỗi','default',array('class' => 'alert alert-info'));
					}
					
			}
			else
			{
				$this->Session->setFlash('Data empty!');
			}
			
		/*
			$user = $this->Session->read('Auth.User');
			if($user['status']!=1) $this->Sesion->setFlash('verify email before subscribe!');
			else
			{
				$tmp = $this->Subscriber->find('first',array(
					'conditions' => array('Subscriber.email' => $user['email'])
					));
				if(!empty($tmp)) $this->Session->setFlash('you have subscribe');
				else
				{
					$email['Subscriber']['email'] = $user['email'];
					$this->Subscriber->create();
					if($this->Subscriber->save($email['Subscriber'])) $this->Session->setFlash('subscribe combleted');
					else $this->Session->setFlash('have error');
				}
			}*/
			$this->redirect($this->referer());
		}
		else
		{
			$this->redirect('/');
		}
	}
	
	public function admin_info()
	{
		$this->theme = 'Admin';
		if($this->request->is('post'))
		{
			$data = $this->request->data;
			if($data['Email']['type']==0)
			{
				$data = $this->request->data;
				$list = $this->Subscriber->find('list',array(
				'fields' => array('email')
				));
				$Email = new CakeEmail();
				$Email->config('smtp');
				$Email->emailFormat('html');
				$Email->template('info');
				$Email->viewVars(array('data'=>$data));
				$Email->bcc($list);
				$Email->subject($data['Email']['subject']);
				$Email->send();
				$this->Session->setFlash('Gửi thành công');
				$this->redirect('/admin/subscribers/info');
			}
			if($data['Email']['type']==1)
			{
				$this->redirect('/products/email_newproducts1');
			}
			if($data['Email']['type']==2)
			{
				$this->redirect('/products/email_discount1');
			}
		}
	}
	
	public function admin_list_email()
	{
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('created' => 'desc')
		);
		$this->set('list_email',$this->Paginator->paginate('Subscriber'));
	}
	public function admin_delete($id = null) {
		$this->Subscriber->id = $id;
		if (!$this->Subscriber->exists()) {
			throw new NotFoundException(__('Invalid Subscriber'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->Subscriber->delete()) {
			$this->Session->setFlash(__('The Subscriber has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Subscriber could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'list_email'));
	}
}
?>