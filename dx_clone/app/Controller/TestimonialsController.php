<?php
App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class TestimonialsController extends AppController {

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
			$cid = $this->request->data['Testimonial']['cid'];
			$status = $this->request->data['Testimonial']['status'];
			$this->changeStatus($cid,'Testimonial','testimonials','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Testimonial->recursive = 0;
		$this->set('testimonials', $this->Paginator->paginate('Testimonial'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Testimonial->create();
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The Testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Testimonial could not be saved. Please, try again.'));
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
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The Testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Testimonial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
			$this->request->data = $this->Testimonial->find('first', $options);
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
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('The Testimonial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Testimonial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_unpublish($id = null){
		$this->loadModel('Testimonial');
		if($this->request->is('post'))
		{
			$this->Testimonial->id = $id;
			$this->Testimonial->saveField('status', 0);
			$this->redirect($this->referer());
		}
	}
	public function admin_publish($id = null){
		$this->loadModel('Testimonial');
		if($this->request->is('post'))
		{
			$this->Testimonial->id = $id;
			$this->Testimonial->saveField('status', 1);
			$this->redirect($this->referer());
		}
	}
	
	public function get_testimonial()
	{
		$testimonials = $this->Testimonial->find('all',array(
			'conditions' => array(
				'Testimonial.status' => 1
			),
			'recursive' => '-1',
			'limit' => 3,
			'order' => array('created'=>'desc')
		));
		return $testimonials;
	}
	public function captcha()
	{
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
	public function submit_testimonial(){
		
		if($this->request->is('post'))
		{
			if (!isset($this->Captcha)) { //if Component was not loaded throug $components array()
				$this->Captcha = $this->Components->load('Captcha'); //load it
			}
			$this->Testimonial->setCaptcha($this->Captcha->getVerCode());
            $this->Testimonial->set($this->request->data);
			if ($this->Testimonial->matchCaptcha($this->request->data['Testimonial'])) {
				$save = true;
				if(!empty($this->request->data['Testimonial']['thumbnail']['name'])){
					$this->request->data['Testimonial']['slug'] = $this->Tool->slug($this->request->data['Testimonial']['full_name']);
					$result = $this->UploadFile('testimonials','Testimonial','thumbnail');
					$save = true;
					if($result['status']==true){
						$filename = '/uploads/testimonials/'.$result['filename'];
						$this->request->data['Testimonial']['thumbnail'] = $filename;
					}else{
						$this->Session->setFlash('Do not upload the photos!','default',array('class'=>'alert alert-info'));
						$save =false;
					}
				}else{
					unset($this->request->data['Testimonial']['thumbnail']);
				}
				if($save)
				{
					if ($this->Testimonial->save($this->request->data)) {
						$this->Session->setFlash('The testimonial has been saved.','default',array('class'=>'alert alert-info'));
					}else
					{
						$this->Session->setFlash('The testimonial could not be saved. Please, try again.','default',array('class'=>'alert alert-info'));
					}
					$this->redirect($this->referer());
				}
			}
			else
			{
				$this->Session->setFlash(SYS_MSG3, 'default', array('class' => 'alert alert-danger'));
				$this->redirect($this->referer()); 
			}
		}
	}
}
