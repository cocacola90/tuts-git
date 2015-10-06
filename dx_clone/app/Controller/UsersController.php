<?php
App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public function beforeFilter() {
		parent::beforeFilter();
      $this->Auth->allow('admin_login');
    }
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->validator()->remove('password');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['User']['password'] == '')
			{
				unset($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);

		}

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_login()
	{
		//$this->layout = false;
		if($this->request->is('post'))
		{
			if($this->Auth->login())
			{
				$this->Session->setFlash('Đăng nhập thành công');
				$this->redirect($this->Auth->redirect());
			}
			else
			{
				$this->Session->setFlash('Đăng nhập thất bại');
			}
		}
	}
	/*public function login()
	{
		if($this->request->is('post'))
        {
			
			if($this->request->data['type'] == 1)
			{
				
				if($this->Auth->login())
				{
					$this->Session->setFlash('Đăng nhập thành công', 'default', array('class' => 'alert alert-success'));
					
					$this->redirect('/');
				}
				else
				{
					$this->Session->setFlash('Đăng nhập thất bại', 'default', array('class' => 'alert alert-danger'));
				}
			}
			else{
				
				$this->redirect('/users/register');
			}
		}
	}
	
	public function logout()
    {
        if($this->Auth->logout())
        {
            // $this->Session->setFlash('Bạn đã thoát ra');
			$this->redirect('/');
        }
    }*/
	#================ captcha ========================#

    public function captcha() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        if (!isset($this->Captcha)) { //if Component was not loaded throug $components array()
            $this->Captcha = $this->Components->load('Captcha', array(
                'width' => 150,
                'height' => 50,
                'theme' => 'default', //possible values : default, random ; No value means 'default'
            )); //load it
        }
        $this->Captcha->create();
    }
	public function register() {
        
        $user = $this->get_user();
        if ($user) {
            $this->Session->setFlash(SYS_MSG10, 'default', array('class' => 'alert alert-success'));
            $this->redirect('/');
        }
        if ($this->request->is('post')) {
            if (strtolower($this->request->data['User']['password']) == strtolower($this->request->data['User']['re_password'])) {
                if (!isset($this->Captcha)) { //if Component was not loaded throug $components array()
                    $this->Captcha = $this->Components->load('Captcha'); //load it
                }
                $this->User->setCaptcha($this->Captcha->getVerCode());
                $this->User->set($this->request->data);
                $this->request->data['User']['group_id'] = 2;            # danh cho user
               
                if ($this->User->matchCaptcha($this->request->data['User'])) {
					$tmp = $this->User->find('first',array(
						'conditions'=>array('username'=>$user['User']['username'])
					));
					if(!empty($tmp)) 
					{
						$this->Session->setFlash(SYS_MSG18);
					}else{
						$tmp = $this->User->find('first',array(
							'conditions'=>array('email'=>$user['User']['email'],'status'=>1)
							));
						if(!empty($tmp)) {
							$this->Session->setFlash(SYS_MSG17);
						}
						else
						{
							if ($this->User->save($this->request->data)) {
								$id = $this->User->id;
								$this->request->data['User'] = array_merge(
										$this->request->data['User'], array('id' => $id)
								);
								unset($this->request->data['User']['password']);
								$this->Auth->login($this->request->data['User']);
								$this->loadModel('Account');
								$data = array(
									'user_id' => $id
								);
								# send email de verify 
								
								$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
								$randstring = ""; //random string
								for ($i = 0; $i < 100; $i++)
								{
									$randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
								}
								$user = $this->Auth->user();
								$link_verify = DOMAIN_ROOT.'/users/verify_email/'.$randstring;
								$sendEmail  = new CakeEmail();
								$sendEmail 	-> config('smtp')
									-> to(array($user['email'] => $user['firstname']))
									-> subject("Xác minh email")
									-> template('verify_email')
									-> emailFormat('html')
									-> viewVars(array('link'=>$link_verify))
									-> send();
								/* $Email = new CakeEmail();
								$Email->config('smtp');
								$Email->to($user['User']['email']);
								$Email->subject('Xác minh email');
								$Email->send('Bấm vào link sau để xác minh cho tài khoản '.$user['User']['username'].' http://dx.nguyenpham.info/users/verify_email/'.$randstring); */
								$user['User']['verification_code'] = $randstring;
								$this->User->saveField('verification_code',$randstring);
								
								$this->Session->setFlash(SYS_MSG8, 'default', array('class' => 'alert alert-success'));
								$this->redirect('/');
							} else {
								$this->Session->setFlash(SYS_MSG9, 'default', array('class' => 'alert alert-danger'));
								$this->redirect($this->referer());
							}
						}
					}
                } else {
                    $this->Session->setFlash(SYS_MSG3, 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                $this->Session->setFlash(SYS_MSG19, 'default', array('class' => 'alert alert-danger'));
                $this->redirect($this->referer());
            }
        }
		$this->set('title_for_layout','Account Register');
    }
	
	
	public function checkemail(){
		$this->autoRender= false;
		if($this->request->is('post')){
			$email = $_REQUEST['email'];
			$user = $this->User->find('first',array(
				'conditions'=>array('User.email'=>$email)
			));
			if($user)
            {
                echo 'False';
            }
            else
            {
                echo 'OK';
            }
		} 
	}
	public function checkusername(){
		$this->autoRender= false;
		if($this->request->is('post')){
			$username = $_REQUEST['username'];
			$user = $this->User->find('first',array(
				'conditions'=>array('User.username'=>$username)
			));
			if($user)
            {
                echo 'False';
            }
            else
            {
                echo 'OK';
            }
		} 
	}
	
	 public function register_bkup()
	{
		if($this->request->is('post'))
		{
			/*pr($this->request->data); exit;*/
			$user = $this->request->data;
			// $this->theme = 'Dx';
			if(strlen($user['User']['username'])<6) $this->Session->setFlash('Ten dang nhap phai tren 6 kt');
			else
			{
				if($user['User']['password']!=$user['User']['re_password'])
				{
					$this->Session->setFlash('Passwords not match');
				}else
				if(strlen($user['User']['password'])<6) $this->Session->setFlash('Mat khau phai tren 6 kt');
				else
				{
					$tmp = $this->User->find('first',array(
						'conditions'=>array('username'=>$user['User']['username'])
						));
					if(!empty($tmp)) 
					{
						$this->Session->setFlash('Username existing');
					}
					else
					{
						$tmp = $this->User->find('first',array(
							'conditions'=>array('email'=>$user['User']['email'],'status'=>1)
							));
						if(!empty($tmp)) $this->Session->setFlash('Email existing');
						else
						{
							$this->User->create();
							$this->request->data['User']['group_id'] = 2; 
							if($this->User->save($user))
							{
								$this->Session->setFlash('succeed');
								//send mail
								$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
								$randstring = ""; //random string
								for ($i = 0; $i < 100; $i++)
								{
									$randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
								}
								$Email = new CakeEmail();
								$Email->config('smtp');
								$Email->to($user['User']['email']);
								$Email->subject('Xác minh email');
								$Email->send('Bấm vào link sau để xác minh cho tài khoản '.$user['User']['username'].' http://dx.nguyenpham.info/users/verify_email/'.$randstring);
								$user['User']['verification_code'] = $randstring;
								if($this->User->save($user))
								{
									$this->Session->setFlash('Đăng ký thành công, vào email để xác nhận!');
									// $this->redirect('/users/login');
								}
							}else
							{
								$this->Session->setFlash('Có lỗi');
								// $this->redirect('/');
							}
						}
					}
				}	
			}
			$this->redirect($this->referer()); 
		}
	}
	//verify email
	public function send_verify_email()
	{
		if(!$this->Auth->loggedIn()) $this->redirect('/');
		if($this->request->is('post'))
		{
			$email = $this->request->data['User']['email'];
			$tmp = $this->User->find('first',array(
				'conditions'=>array('email'=>$email,'status'=>1),
				'recursive'=>-1
				));
			//pr($tmp);exit;
			if($tmp)
			{
				$this->Session->setFlash(SYS_MSG11,'default',array('class'=>'alert alert-info'));
				$this->redirect($this->referer());
			}				
			else
			{
				$user = $this->user_login();
				$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			    $randstring = ""; //random string
			    for ($i = 0; $i < 100; $i++)
			    {
			        $randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
			    }
			    $this->User->id = $user['id'];
				// echo $randstring;exit;
			    if($this->User->saveField('verification_code', $randstring))
			    {
			    	$this->User->saveField('email', $email);
			    	$user['email'] = $email;
			    	$user['verification_code'] = $randstring;
			    	$this->Session->write('Auth.User', $user);
					$link_verify = DOMAIN_ROOT.'/users/verify_email/'.$randstring;
					$sendEmail  = new CakeEmail();
					$sendEmail 	-> config('smtp')
						-> to(array($user['email'] => $user['firstname']))
						-> subject("Xác minh email")
						-> template('verify_email')
						-> emailFormat('html')
						-> viewVars(array('link'=>$link_verify))
						-> send();
					
					$this->User->saveField('verification_code',$randstring);
					/* $Email = new CakeEmail(array('log' => true));
					$Email->config('smtp');
					$Email->to($email);
					//echo $email;
					$Email->subject('Xác minh email');
					$Email->send('In order to provide you with the best possible service, please take a moment to verify your email at this address by clicking on the following link: '.$user['username'].' http://dx.nguyenpham.info/users/verify_email/'.$randstring); */
					
						// CakeLog::write('debug', $this->Email->smtpError);
					$this->Session->setFlash('Chúng tôi đã gửi 1 E-Mail xác nhận vào hòm thư của bạn!','default',array('class'=>'alert alert-info'));
					$this->redirect('/');
				}else setFlash('ERROR');
			}
		}
	}
	public function verify_email($code = null)
	{
		if(isset($code))
		{
			$user = $this->User->find('first',array(
			'conditions' => array('User.verification_code'=>$code),
			'fields'=>array('id','username','email','status','verification_code'),
			'recursive' => -1
			));
			//pr($user);exit;
			//$this->User->id = $user['User']['id'];
			
			if(empty($user))
			{
				$this->Session->setFlash("Bạn chưa gửi yêu cầu xác nhận Email!",'default',array('class'=>'alert alert-info'));
				$this->redirect('/users/send_verify_email');
			}
			else
			{
				$tmp = $this->User->find('first',array(
					'conditions' => array('email'=>$user['User']['email'],'status'=>1),
					'recursive' => -1
					));
				if(!empty($tmp)) $this->Session->setFlash('this email have used for other account');
				else
				{
					$user['User']['verification_code'] = 'empty';
					$user['User']['status'] = 1;
					//pr($user);exit;
					if($this->User->save($user))
					{
						$this->Session->setFlash('Verify email success!','default',array('class' => 'alert alert-info'));
						$this->redirect('/users/login');
					}
					else{
						$this->Session->setFlash('Verify email Error','default',array('class' => 'alert alert-info'));
					} 
				}
			}
		}
		else
		{
			$this->redirect('/err');
		}
	}
	public function profile()
	{
		//$this->layout = "view_item";
		if(!$this->Auth->loggedIn()){
			$this->Session->setFlash( SYS_MSG1,'default',array('class'=>'alert alert-info'));
			$this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		} 
		$user = $this->user_login();
		$userID = $user['id'];
		$userInfo = $this->User->find('first',array(
			'conditions' => array(
				'User.status' => 1,
				'User.id' => $userID
			),
			'recursive' => '-1'
		));
		
		if($userInfo['User']['status']==1) {
			$this->set('userInfo',$userInfo);
			$this->set('title_for_layout','My Profile');
		}
		else
		{
			$this->redirect('/users/send_verify_email');
		}
	}
	public function edit_profile()
	{
		$user = $this->user_login();
		if(!empty($user))
		{
			//$this->layout = "view_item";
			if ($this->request->is(array('post', 'put'))) {
				//pr($this->request->data);exit;
				$save = true;
				if(!empty($this->request->data['User']['avatar']['name'])){
					$this->request->data['User']['slug'] = $this->Tool->slug($this->request->data['User']['firstname']);
					$result = $this->UploadFile('avatars','User','avatar');
					$save = true;
					if($result['status']==true){
						$filename = '/uploads/avatars/'.$result['filename'];
						$this->request->data['User']['avatar'] = $filename;
					}else{
						$this->Session->setFlash('Do not upload the photos!','default',array('class'=>'alert alert-info'));
						$save =false;
					 }
				}else{
					unset($this->request->data['User']['avatar']);
				}
				$this->request->data['User']['birthdate'] = strtotime($this->request->data['User']['birthdate']);
				if($save)
				{
					if ($this->User->save($this->request->data)) {
						$tmp = $this->request->data;
						$user = $this->User->find('first',array(
							'conditions'=>array('User.id'=>$tmp['User']['id'])
						));

						$this->Session->write('Auth.User', $user['User']);
						$this->Session->setFlash('The user has been saved.','default',array('class'=>'alert alert-info'));
						$token = $this->request->query('token');
						$PayerID = $this->request->query('PayerID');
						if(isset($token) && isset($PayerID)){
							$this->redirect(array(
								 'controller' => 'orders', 'action' => 'return_item', '?' => array(
										'token' => $token,
										'PayerID' => $PayerID
									)
								)
							);
						}
					} else {
						$this->Session->setFlash('The user could not be saved. Please, try again.','default',array('class'=>'alert alert-info'));
					}
					$this->redirect('/users/profile');
				}
			} else {
				$user = $this->user_login();
				$this->request->data = $this->User->find('first', array(
					'conditions' => array('User.id'=>$user['id'])
					));
				$this->loadModel('Country');
				$country = $this->Country->find('all', array(
					'conditions' => array(
						'Country.status' => 1
					),
					'fields' => array('code', 'country')
				));
				$this->set('country',$country);
			}
		} else{
			$this->Session->setFlash(SYS_MSG1,'default',array('class'=>'alert alert-info'));
			$this->redirect('/');
		}

	}

	public function login()
	{
		
		if($this->Auth->loggedIn()){
			$this->redirect('/');
		} 
		else
		{
			if ($this->request->is('post')) 
			{
                
	            if ($this->Auth->login()) 
	            {
					if (isset($this->request->query['return_url'])) {
                    $return_url = $this->request->query['return_url'];
					} else {
						$return_url = ROOT_URL;
					}
	                $this->Session->setFlash(SYS_MSG7, 'default', array('class' => 'alert alert-info'));
	                $this->redirect($return_url);
	            } else 
	            {
	                $this->Session->setFlash(SYS_MSG2, 'default', array('class' => 'alert alert-info'));
	            }
	        }
			//$this->redirect($this->referer());
		}
		$this->set('title_for_layout','Account Login');
	}
	public function logout()
	{
		if ($this->Auth->loggedIn()) {

            $this->Session->setFlash(SYS_MSG12, 'default', array('class' => 'alert alert-info'));

            $this->Auth->logout();

            if (isset($this->params['url']['redirect'])) {

                $a = $this->params['url']['redirect'];

                $this->redirect($a);

            } else {

                $this->redirect('/login');

            }

        }else {
            $this->redirect('/');

        }
	}

	public function change_password()
	{
		if($this->request->is('post'))
		{
			$user = $this->request->data;
			if($user['User']['newpassword']!=$user['User']['re_password'])
				$this->Session->setFlash('The new password is incorrect','default',array('class'=>'alert alert-danger'),'re_pass');
			else
			{
				if(strlen($user['User']['newpassword'])<6) {
					$this->Session->setFlash('Mật khẩu ít nhất 6 kt!','default',array('class'=>'alert alert-danger'),'re_pass');
				}
				else
				{
					$id = $this->user_login();
					$tmp = $this->User->find('first',array(
						'conditions'=>array('User.id'=>$id['id'])
						));
					$user['User']['oldpassword'] = AuthComponent::password($user['User']['oldpassword']);
					if($tmp['User']['password']!=$user['User']['oldpassword'])
						$this->Session->setFlash(SYS_MSG4,'default',array('class'=>'alert alert-info'),'re_pass');
					else
					{
				    	$this->User->id = $tmp['User']['id'];
						if($this->User->saveField('password', $user['User']['re_password']))
						{
							$this->Session->setFlash(SYS_MSG5,'default',array('class'=>'alert alert-info'));
							$this->redirect('/users/profile');
						}
						else
						{
							$this->Session->setFlash(SYS_MSG6,'default',array('class'=>'alert alert-info'),'re_pass');
							$this->redirect($this->referer());
						}
					}
				}
			}

		}
	}
	public function test()
	{

	}

	public function forgot_password()
	{
		if($this->request->is('post'))
		{
			$email = $this->request->data;
			$user = $this->User->find('first',array(
				'conditions'=>array('User.email'=>$email['User']['email'],'status'=>1)
				));
			if(empty($user))
			{
				$this->Session->setFlash(SYS_MSG13,'default',array('class'=>'alert alert-info'));
			}				
			else
			{
				$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$randstring = ""; //random string
				for ($i = 0; $i < 100; $i++)
				{
				    $randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
				}
				$this->User->id = $user['User']['id'];
				if($this->User->saveField('verification_code', $randstring))
				{
					$this->Session->setFlash('Login '.$user['User']['email'].' to verify');
					$Email = new CakeEmail();
					$Email->config('smtp');
					$Email->to($user['User']['email']);
					$Email->subject('Xác minh lấy lại mật khẩu');
					$Email->send('Xác nhận lấy lại mật khẩu tài khoản '.$user['User']['username'].'http://dx.nguyenpham.info/users/re_password/'.$randstring);
					
				}
			}
		}
	}
	public function re_password($code = null)
	{
		if(isset($code))
		{		
			$user = $this->User->find('first',array(
				'conditions'=>array('User.verification_code'=>$code)
				));
			if(empty($user)) $this->Session->setFlash('ERROR');
			else
			{
				$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$ranpass = "";
				for ($i = 0; $i < 10; $i++)
				{
				    $ranpass = $ranpass.$characters[rand(0, strlen($characters)-1)];
				}
				$tmp = $ranpass;
				$this->User->id = $user['User']['id'];
				if($this->User->saveField('password', $ranpass))
				{
					$Email = new CakeEmail();
					$Email->config('smtp');
					$Email->to($user['User']['email']);
					//echo AuthComponent::password($ranpass);
					$Email->subject('Verification Email ');
					$Email->send('Account '.$user['User']['username'].' the new password is: '.$tmp);
					$this->Session->setFlash(SYS_MSG14,'default',array('class'=>'alert alert-info'));
					$this->redirect('/login');					
				}	
			}
		}
	}
	
	#hien thi wishlist
	public function wishlist()
	{

		$users = $this->Auth->user();
		if($users)
		{
			$id = $this->Session->read('Auth.User.id');
			$this->loadModel('ProductsUser');
			$this->Paginator->settings = array(
				'conditions' => array(
					'ProductsUser.user_id'=>$id,'ProductsUser.type' =>1
				),
				'recursive' => 2,
				'limit' => 4,
				'order' => array('created'=> 'desc'),
				'paramType' => 'querystring'
			);
			
			/* $wishlists = $this->ProductsUser->find('all',array(
				'conditions' =>array('ProductsUser.user_id'=>$id,'ProductsUser.type' =>1),
				
				'recursive' => 2
				)); */
				
			$this->set('wishlists',$this->Paginator->paginate('ProductsUser'));
		}else{
			$this->Session->setFlash('You must sign in to perform this function!','default',array('alert alert-info'));
			 $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		}
		
		
	}

	
	#hien thi review
	public function my_review()
	{
		
		$users = $this->Auth->user();
		if($users)
		{
			$id = $users['id'];
			$this->loadModel('Comment');
			$this->Paginator->settings = array(
				'conditions' => array(
					'Comment.user_id'=>$id
				),
				'recursive' => 2,
				'limit' => 4,
				'order' => array('created'=> 'desc'),
				'paramType' => 'querystring'
			);

			$this->set('comments',$this->Paginator->paginate('Comment'));
		}else{
			$this->Session->setFlash('You must sign in to perform this function!','default',array('alert alert-info'));
			 $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		}
	}

	
    # hien thi danh sach cac order ma khach hang da thuc hien

    public function list_order(){
        $this->loadModel('Order');
        $users = $this->Auth->user();
        if($users)
        {
            $this->Paginator->settings = array(
                'conditions' => array('Order.user_id' => $users['id']),

                'limit' => 10,
                'order' => array('Order.created' => 'desc')

            ); 

            $this->set('orders',$this->Paginator->paginate('Order'));
        }else
        {
            $this->Session->setFlash('You must sign in to perform this function!');
            $this->redirect('/login');
        }
    }

    # Order tracking  http://www.vnpost.vn/TrackandTrace/tabid/130/n/CP950141884VN/t/0/s/1/Default.aspx

    # hien thi danh sach nguoi dung da danh gia
	
	public function loitest()
	{
		$this->autoRender = false;
		if($this->request->is('post'))
		{
			$this->Session->write('test', 'abcsssss');
			$a = $this->Session->read('test');
			echo $a;
		}
	}
	
    public function my_point()
    {
        $this->loadModel('Account');
        $this->loadModel('Accountlog');
        $user = $this->Auth->user();
        if($user)
        {
            $account = $this->Account->find('first',array(
                'conditions' => array(
                    'Account.user_id' => $user['id']
                ),
                'recursive' => '-1'
            ));
            $this->Paginator->settings = array(
                'conditions' => array(
                    'Accountlog.user_id' => $user['id'],
                    'Accountlog.type' => 1
                ),
                'recursive' => '-1',
                'order' => array('created' => 'desc'),
                'limit' => 10
            );
            $this->set('title_for_layout',"Account manager - My Point");
            $this->set('account_logs' , $this->Paginator->paginate('Accountlog'));
            $this->set('account',$account);
        }
        else
        {
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }
    }
	
	public function history()
	{
		$this->loadModel('Account');
        $this->loadModel('Accountlog');
        $user = $this->Auth->user();
        if($user)
        {
			$account = $this->Account->find('first',array(
                'conditions' => array(
                    'Account.user_id' => $user['id']
                ),
                'recursive' => '-1'
            ));
			$this->Paginator->settings = array(
				'conditions' => array(
                    'Accountlog.user_id' => $user['id'],
                ),
				'limit' => 10,
				'order' => array('created' => 'desc')
			);
			$this->set('title_for_layout',"Account manager - Transaction History");
            $this->set('account_logs' , $this->Paginator->paginate('Accountlog'));
			 $this->set('account',$account);
		}
        else
        {
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }
	}
    public function gift_card()
    {
        //$this->autoRender = false;
        $this->loadModel('Account');
        $this->loadModel('Accountlog');
        $this->loadModel('Giftcard');
        $user = $this->Auth->user();
        if($user) {
            $user_info = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user['id']
                ),
                'recursive' => -1
            ));

            $points = $this->Account->find('first', array(
                    'conditions' => array('Account.user_id' => $user_info['User']['id']),
                    'recursive' => '-1'
                )
            );
            if (!empty($points)) {
                $param_exchange_point = $this->Tool->params('GIFT', 'exchange_point'); # lay gia tri quy doi tu point sang US$
                $param_exchange_rate = $this->Tool->params('GIFT', 'exchange_rate'); # lay ty gia quy doi giua point sang US$ cua gifcode tinh theo $
                // pr($param_exchange_point);exit;
                $exchange_point = $param_exchange_point['Param']['value'];
                $exchange_rate = $param_exchange_rate['Param']['value'];
                if ($this->request->is('post')) {
                    $pass = AuthComponent::password($this->request->data['User']['password']);
                    if ($pass == $user_info['User']['password']) {
                       // pr($this->request->data);exit;
                        $submitPoint  = $this->request->data['User']['point'];
                        if($points['Account']['point'] >= $submitPoint)
                        {
                            $value = $submitPoint / $exchange_point; # gia tri cua gift_code
                            $minus_point = $points['Account']['point'] - $submitPoint;  # point con lai
                            # update lai point trong bang account
                            $this->Account->id = $points['Account']['id'];
                            $this->Account->saveField('point', $minus_point);
                            #tao gift_code add vao bang giftcard
                            $gift_code = $this->Tool->generateRandomString(30);
                            $arrGiftCard = array(
                                'code' => $gift_code,
                                'user_id' => $user_info['User']['id'],
                                'used' => null,
                                'value' => $value,
                                'point_deducted' => $submitPoint
                            );
                            $this->Giftcard->create();
                            if ($this->Giftcard->save($arrGiftCard)) {
                                # luu ban ghi log vao bang account log
                                $arrAccountLog = array(
                                    'user_id' => $user_info['User']['id'],
                                    'order_number' => null,
                                    'detail' => "Your Exchange Points to Gift Card Redeem",
                                    'point' => $exchange_point,
                                    'type' => 2,    #type = 1; mua hang      - $type = 2: doi lay giftcard
                                );
                                $this->Accountlog->create();
                                $this->Accountlog->save($arrAccountLog);

                                $this->Session->setFlash("Exchange Point success! Giftcode: $gift_code", 'default', array('class' => 'alert alert-success'), 'giftcard');
                            }
                        }
                        else
                        {
                            $this->Session->setFlash("Point not enough", 'default', array('class' => 'alert alert-danger'), 'giftcard');
                        }

                    } else {
                        $this->Session->setFlash("Password incorrect", 'default', array('class' => 'alert alert-danger'), 'giftcard');
                    }
                    $this->redirect($this->referer());
                }

                $this->Paginator->settings = array(
                    'limit' => 10,
                    'order' => array('created' => 'desc')
                );
                $this->set('list_gift_code',$this->Paginator->paginate('Giftcard'));
                $this->set('points',$points);
                $this->set('exchange_point',$exchange_point);
				$this->set('title_for_layout',"Account manager - Gift Card Redeem");
            } else {

            }

        }
        else
        {
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }
    }
}
