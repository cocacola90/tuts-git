<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {


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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	} 

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if(!empty($this->request->data['Comment']['comment']))
			{
				if ($this->Comment->save($this->request->data)) {
					$this->Session->setFlash('Your Review Has Been Sent Successfully!.','default',array('class'=>'alert alert-info'),'comment');
					//return $this->redirect(array('action' => 'index'));,
					$this->redirect($this->referer());
				} else {
					$this->Session->setFlash('Your Review Has Been Sent not Successfully!','default',array('class'=>'alert alert-info'),'comment');
				}
			}else
			{
				$this->Session->setFlash('Your Review empty!','default',array('class'=>'alert alert-info'),'comment');
			}
			$this->redirect($this->referer());
		}
		
		//$users = $this->Comment->User->find('list');
		//$books = $this->Comment->Book->find('list');
		//$this->set(compact('users', 'books'));
	}

		
	public function admin_unpublish($id = null){
		$this->loadModel('Comment');
		if($this->request->is('post'))
		{
			$this->Comment->id = $id;
			$this->Comment->saveField('status', 0);
			$this->redirect($this->referer());
		}
	}
		public function admin_publish($id = null){
		$this->loadModel('Comment');
		if($this->request->is('post'))
		{
			$this->Comment->id = $id;
			$this->Comment->saveField('status', 1);
			$this->redirect($this->referer());
		}
	}
	
	
	public function show_review(){
		$reviews = Cache::read('cache_reviews','short');
		if(!$reviews){
			$reviews = $this->Comment->find('all',
                array('conditions' => array(
						'Comment.status' => 1
					),
					'recursive' => 1,
					'limit' => 3,
					'order' => array('Comment.created' => 'desc'),
					// 'contain' => array(
						// 'User' => array('username','firtname','lastname')
					// )
				)
            );
			
            Cache::write('cache_reviews',$reviews,'short');
		}
		return $reviews;
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/* public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$books = $this->Comment->Book->find('list');
		$this->set(compact('users', 'books'));
	} */

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/* public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	} */
}
