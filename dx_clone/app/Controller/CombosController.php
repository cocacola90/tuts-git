<?php
App::uses('AppController', 'Controller');
/**
 * Combos Controller
 *
 * @property Combo $Combo
 * @property PaginatorComponent $Paginator
 */
class CombosController extends AppController {

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
		$this->Combo->recursive = 0;
		$this->set('combos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
		$this->set('combo', $this->Combo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
           // pr($this->request->data);exit;
			$this->Combo->create();
            $this->loadModel('Product');
			if ($this->Combo->save($this->request->data)) {
                if($this->request->data['Combo']['status'] == 1)
                {
                    if(!empty($this->request->data['Combo']['product_id'])){

                        $this->Product->id = $this->request->data['Combo']['product_id'];
                        $this->Product->saveField('pro_combo', 1);
                    }
                    else if(!empty($this->request->data['Combo']['category_id']))
                    {
                        $this->loadModel('Category');
                        /*$arr_data = $this->Product->find('all',array(
                            'conditions' => array('Product.category_id' => $this->request->data['Combo']['category_id']),
                            'recursive' => '-1',
                            'fields' => array('id')
                        ));*/
                        $this->Product->updateAll(
                            array('Product.cat_combo' => 1),
                            array('Product.category_id' => $this->request->data['Combo']['category_id'])
                        );
                    }
                }
				$this->Session->setFlash(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The combo could not be saved. Please, try again.'));
			}
		}
		$products = $this->Combo->Product->find('list');
		$categories = $this->Combo->Category->find('list');
		$this->set(compact('products', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Combo->exists($id)) {
			throw new NotFoundException(__('Invalid combo'));
		}
        $this->loadModel('Product');
		if ($this->request->is(array('post', 'put'))) {
           // pr($this->request->data);exit;
			if ($this->Combo->save($this->request->data)) {
                if($this->request->data['Combo']['status'] == 1)
                {
                    if(!empty($this->request->data['Combo']['product_id'])){

                        $this->Product->id = $this->request->data['Combo']['product_id'];
                        $this->Product->saveField('pro_combo', 1);
                    }
                    else if(!empty($this->request->data['Combo']['category_id']))
                    {
                        $this->loadModel('Category');
                        /*$arr_data = $this->Product->find('all',array(
                            'conditions' => array('Product.category_id' => $this->request->data['Combo']['category_id']),
                            'recursive' => '-1',
                            'fields' => array('id')
                        ));*/
                        $this->Product->updateAll(
                            array('Product.cat_combo' => 1),
                            array('Product.category_id' => $this->request->data['Combo']['category_id'])
                        );
                    }
                }
                else
                {
                    if(!empty($this->request->data['Combo']['product_id'])){

                        $this->Product->id = $this->request->data['Combo']['product_id'];
                        $this->Product->saveField('pro_combo', 0);
                    }
                    else if(!empty($this->request->data['Combo']['category_id']))
                    {
                        $this->loadModel('Category');
                        /*$arr_data = $this->Product->find('all',array(
                            'conditions' => array('Product.category_id' => $this->request->data['Combo']['category_id']),
                            'recursive' => '-1',
                            'fields' => array('id')
                        ));*/
                        $this->Product->updateAll(
                            array('Product.cat_combo' => 0),
                            array('Product.category_id' => $this->request->data['Combo']['category_id'])
                        );
                    }
                }
				$this->Session->setFlash(__('The combo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The combo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Combo.' . $this->Combo->primaryKey => $id));
			$this->request->data = $this->Combo->find('first', $options);
		}
		$products = $this->Combo->Product->find('list');
		$categories = $this->Combo->Category->find('list');
		$this->set(compact('products', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
        $this->loadModel('Product');
		$this->Combo->id = $id;
		if (!$this->Combo->exists()) {
			throw new NotFoundException(__('Invalid combo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Combo->delete()) {
            $arr_data = $this->Combo->find('first',array(
                'conditions' => array('Combo.id' => $id) ,
                'recursive' => '-1'
            ));
            if(!empty($arr_data['Combo']['product_id'])){

                $this->Product->id = $arr_data['Combo']['product_id'];
                $this->Product->saveField('pro_combo', 0);
            }
            else if(!empty($arr_data['category_id']))
            {
                $this->loadModel('Category');

                $this->Product->updateAll(
                    array('Product.cat_combo' => 0),
                    array('Product.category_id' => $arr_data['Combo']['category_id'])
                );
            }
			$this->Session->setFlash(__('The combo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The combo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
