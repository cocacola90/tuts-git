<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

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
			$cid = $this->request->data['Post']['cid'];
			$status = $this->request->data['Post']['status'];
			$this->changeStatus($cid,'Post','posts','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['Post']['slug'] = $this->Tool->slug($this->request->data['Post']['title']);
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Post->Category->find('list', array('conditions' => array('type' => 1)));
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Post']['slug'] = $this->Tool->slug($this->request->data['Post']['title']);
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$categories = $this->Post->Category->find('list', array('conditions' => array('type' => 1)));
		$this->set(compact('categories', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function index(){
		$this->loadModel('Product');
		$this->Post->recursive = 0;
		$quan_tam = Cache::read('sp_quan_tam_left', 'short');
        if (!$quan_tam) {
            $quan_tam = $this->Product->find('all',
                array(
                    'recursive' => -1,
                    'limit' => 2,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'discount', 'discount_status', 'weight'),
                    'contain' => array(
                        'Category' => array(
                            'fields' => array('id', 'name', 'slug')
                        ),
                        'Value' => array(
                            'fields' => array('id', 'name', 'attribute_id')
                        )
                    ),
                    'order' => array('view_count' => 'desc'),
                    'conditions' => array('Product.status' => 1)
                )
            );
           
            Cache::write('sp_quan_tam_left', $quan_tam, 'short');
        }
		
		$this->Paginator->settings = array(
			'conditions' => array(
				'Post.status' => 1,
				'Post.category_id' => 11
			),
			'order' => array('Post.created' => 'desc'),
			'limit' => 5
		);
		$this->set('posts',$this->Paginator->paginate('Post'));
		$this->set(compact('quan_tam'));
		$this->set('title_for_layout', 'Blogs');
	}
	
	public function view($slug_post = null, $id = null)
	{
		$post = $this->Post->find('first',array(
			'conditions' => array(
				'Post.slug' => $slug_post,
				'Post.id' => $id
			),
			'contain' => array(
				'Category' => array(
					'id','slug','name'
				)
			),
			'recursive' => -1
		));
		if($post)
		{
			$this->loadModel('Product');
			$quan_tam = Cache::read('sp_quan_tam_left', 'short');
			if (!$quan_tam) {
				$quan_tam = $this->Product->find('all',
					array(
						'recursive' => -1,
						'limit' => 2,
						'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'discount', 'discount_status', 'weight'),
						'contain' => array(
							'Category' => array(
								'fields' => array('id', 'name', 'slug')
							),
							'Value' => array(
								'fields' => array('id', 'name', 'attribute_id')
							)
						),
						'order' => array('view_count' => 'desc'),
						'conditions' => array('Product.status' => 1)
					)
				);
			   
				Cache::write('sp_quan_tam_left', $quan_tam, 'short');
			}
			// pr($post);exit;
			#update view count
            $AlreadyRead = $this->Session->check('post_' . $id);
            if (!$AlreadyRead) {
                $this->Post->updateAll(
                    array('Post.view_count' => 'Post.view_count+1'),
                    array('Post.id' => $id)
                );
                $this->Session->write('post_' . $id, $id);
            }
			
			$related = $this->Post->find('all',array(
					'conditions' => array(
						'Post.id <>' => $post['Post']['id'],
						'Post.category_id' => $post['Category']['id'],
						'Post.status' =>1
					),
					'limit' => 5,
					'order' => 'rand()',
					'contain' => array(
						'Category' => array('id','slug','name')
					)
				)	
			);
			$this->set(compact('post','related'));
			$this->set('title_for_layout', $post['Post']['title']);
		}
		else
		{
			$this->redirect('/err');
		}
	}
	
	public function latest_post(){
		$posts = Cache::read('cache_latest_post_1','short');
		if(!$posts)
		{
			$posts = $this->Post->find('all',array(
					'conditions' => array(
						'Post.status' =>1,
						'Post.category_id' => 11
					),
					'limit' => 4,
					'order' => array('created' => 'desc'),
					'contain' => array(
						'Category' => array('id','slug','name')
					)
				)	
			);
			Cache::write('cache_latest_post_1',$posts,'short');
		}
		return $posts;
	}
	public function policies(){
		$policies = Cache::read('cache_policies','short');
		if(!$policies)
		{
			$policies = $this->Post->find('all',array(
					'conditions' => array(
						'Post.status' =>1,
						'Post.category_id' => 13
					),
					'limit' => 4,
					'order' => array('created' => 'asc'),
					'contain' => array(
						'Category' => array('id','slug','name')
					)
				)	
			);
			Cache::write('cache_policies',$policies,'short');
		}
		return $policies;
	}
	public function faq(){
		//Configure::write('debug',2);
		$this->Paginator->settings = array(
			'conditions' => array(
				'Post.status' =>1,
				'Post.category_id' => 14
			),
			'limit' => 40,
			'order' => array('created' => 'asc'),
			'contain' => array(
				'Category' => array('id','slug','name')
			)
		);
		$this->set('faqs',$this->Paginator->paginate('Post'));
		$this->set('title_for_layout','FAQs - All FAQs');
	}
	
	public function search()
    {
        $keywords = $this->request->query('keyword');
        $slug_keyword = $this->Tool->slug($keywords);
        $this->Paginator->settings = array(
            'conditions' => array(
                'Post.status' => 1,
                'OR' => array(
                    'Post.title LIKE' => "%$keywords%",
                    'Post.slug LIKE' => "%$slug_keyword%",
                    'Post.content LIKE' => "%$keywords%",
                ),
				'Post.category_id' => 14
            ),
         
            'limit' => 40,
            'order' => array(
                'Post.created' => 'asc'
            ),
            'paramType' => 'querystring'
        );
        $this->set('faqs', $this->Paginator->paginate('Post'));
		$this->set('title_for_layout','FAQs - Search FAQs');
        $this->set('keywords', $keywords);
    }

}
