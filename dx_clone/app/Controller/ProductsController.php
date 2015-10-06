<?php
App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
	public function test1()
	{
		// $this->layout = false;
	}
    /**
     * index method
     *
     * @return void
     */
    public function admin_index()
    {
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Product']['cid'];
			$status = $this->request->data['Product']['status'];
			$this->changeStatus($cid,'Product','products','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
		
		$ArrSubmit = array();
		if(isset($this->request->params['named']['keyword'])){
			$dataSubmit=$this->request->params['named']['keyword'];
			foreach ($dataSubmit as $ab => $value)
			{
				$ArrSubmit['Product.'.$ab] = $value;
			}
			if(isset($dataSubmit['todate']) || isset($dataSubmit['fromdate'])){
				$todate = $dataSubmit['todate'];
				$fromdate = $dataSubmit['fromdate'];
				unset($ArrSubmit['Product.todate']);
				unset($ArrSubmit['Product.fromdate']);
				if($todate != null || $fromdate != null){
				
					$data_date = array(
						'Product.created >=' =>$fromdate,
						'Product.created <=' => $todate
					);
					$ArrSubmit = array_merge($ArrSubmit,$data_date);
				}
			}
		}
		
		$conditions = $ArrSubmit;
        $this->Product->recursive = 0;
        $this->Paginator->settings = array(
			'limit' => '15',
			'order' => array('created' => 'desc'),
			'conditions' => $conditions
		);
        $this->set('products', $this->Paginator->paginate('Product'));
		$categories = $this->Category->generateTreeList(null, null, null, '___');
		$this->set(compact('categories'));
    }

	public function admin_get_keyword(){
		$keyword = array();
		if($this->request->is('post')){
			$dataCondition=array();
				$this->Product->set($this->request->data);
				$dataSubmit=$this->request->data['Product'];
				
				$fromdate = $this->request->data['Product']['fromdate'];
				$todate = $this->request->data['Product']['todate'];
				//----------- format date -------------------------//
				if ($fromdate != null || $fromdate != ''){
					$fromdate1 = explode('/',$fromdate);
					$frformat = $fromdate1[2].'-'.$fromdate1[0].'-'.$fromdate1[1].' '.'00:00:00';
					$frdate = strtotime($frformat);                
				}
				
				if ($todate != null || $todate != ''){
					$todate1 = explode('/',$todate);
					$toformat = $todate1[2].'-'.$todate1[0].'-'.$todate1[1].' '.'23:59:59';
					
					$tdate = strtotime($toformat);                
				}
				if($todate ==''){
					$tdate = time();
				}
				foreach ($dataSubmit as $dt => $dtVal)
				{
					if($dtVal !== null && $dtVal!=='')
					{
						$dataCondition[$dt]=$dtVal;
					}
					if($fromdate != null || $todate != null){
						$dataCondition['todate'] =  $tdate;
						$dataCondition['fromdate'] =  $frdate;
					} 
				}
				$keyword = $dataCondition;
				$this->redirect(array('action'=>'index','keyword'=>$keyword));
		}
	
	}
	
	
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Product']['slug'] = $this->Tool->slug($this->request->data['Product']['name']);
            //Xu ly hinh anh lien quan, chuyen thanh json
             if($this->request->data['Image']['image_more'] == "")
            {
                $this->Session->setFlash('Chưa có hình ảnh cho sản phẩm!','default',array('class'=>'alert alert-danger'));
                $this->redirect($this->referer());
            }
            $this->request->data['Product']['image_more'] = json_encode($this->request->data['Image']['image_more']);
            //Xu ly attribute value
            if($this->request->data['Attribute']['attribute_value'] == "")
            {
                $this->Session->setFlash('Chưa chọn thuộc tính cho sản phẩm!','default',array('class'=>'alert alert-danger'));
                $this->redirect($this->referer());
            }
            $this->request->data['Value']['Value'] = $this->request->data['Attribute']['attribute_value'];
            //Unset cac gia tri khong can thiet
            unset($this->request->data['Image']);
            unset($this->request->data['Attribute']);
            //Va roi thu luu du lieu xem co loi gi khong nao
            
			if (isset($this->request->data['Product']['rel_pro_id'])) {
                foreach ($this->request->data['Product']['rel_pro_id'] as $k => $v) {
                    $data_relate[] = $this->get_pro_info($v);

                }
                // pr($data_relate);
                $this->request->data['Product']['related'] = json_encode($data_relate);
            }
            $this->check_tags($this->request->data['Tag']['Tag']); # add tags
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Product->Category->find('list', array('conditions' => array('Category.type' => 0)));
        //$markets = $this->Product->Market->find('all', array('recursive' => -1));
        $this->set(compact('categories', 'markets'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            // pr($this->request->data['Tag']['Tag']);exit;
            $this->check_tags($this->request->data['Tag']['Tag']); # add tags
            $this->request->data['Product']['slug'] = $this->Tool->slug($this->request->data['Product']['name']);
            //Xu ly hinh anh lien quan, chuyen thanh json
            $this->request->data['Product']['image_more'] = json_encode($this->request->data['Image']['image_more']);
            //Xu ly attribute value
            $this->request->data['Value']['Value'] = $this->request->data['Attribute']['attribute_value'];
            //Unset cac gia tri khong can thiet
            unset($this->request->data['Image']);
            unset($this->request->data['Attribute']);
			if (isset($this->request->data['Product']['rel_pro_id'])) {
                foreach ($this->request->data['Product']['rel_pro_id'] as $k => $v) {
                    $data_relate[] = $this->get_pro_info($v);

                }
                // pr($data_relate);
                $this->request->data['Product']['related'] = json_encode($data_relate);
            }
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
            if (!empty($this->request->data['Tag'])) {
                foreach ($this->request->data['Tag'] as $tags) {
                    $tags_list[] = $tags['name'];
                }
                $tags = implode(',', $tags_list);
            } else {
                $tags = null;
            }
            $this->set('tags', $tags);
        }
        $categories = $this->Product->Category->find('list', array('conditions' => array('Category.type' => 0)));
        //$markets = $this->Product->Market->find('all', array('recursive' => -1));
        $this->set(compact('categories', 'markets'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        // $this->request->allowMethod('post', 'delete');
        // if ($this->Product->delete()) {
            // $this->Session->setFlash(__('The product has been deleted.'));
        // }
		if ($this->Product->ProductsUser->deleteAll(array('ProductsUser.product_id' => $id),false)) {
            $this->Product->delete($id);
            $this->Session->setFlash(__('The product has been deleted.'));
        }else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function get_attribute_value()
    {
        $this->autoRender = false;
        $this->loadModel('Category');
        $this->loadModel('Attribute');
        $this->loadModel('Value');
        if ($this->request->is('post')) {
            $category_id = $this->request->data['category'];
            $type = $this->request->data['type'];
            $attributes = $this->Attribute->find('all',
                array(

                    'joins' => array(
                        array(
                            'table' => 'categories_attributes',
                            'alias' => 'CategoriesAttribute',
                            'type' => 'inner',
                            'conditions' => array('Attribute.id = CategoriesAttribute.attribute_id')
                        ),
                        array(
                            'table' => 'categories',
                            'alias' => 'Category',
                            'type' => 'inner',
                            'conditions' => array('CategoriesAttribute.category_id = Category.id')
                        )
                    ),
                    'conditions' => array('Category_id' => $category_id),
                    'contain' => array('Value'),
                    'order' => array('Attribute.id' => 'DESC')
                )

            );
            // pr($attributes);
            // exit;
            foreach ($attributes as $a) {
                // pr($a); continue;
                if (count($a['Value']) > 0) {
                    $data = $this->Value->find('all', array(
                        'conditions' => array('Value.attribute_id' => $a['Attribute']['id']),
                        'recursive' => -1
                    ));
                    // pr($data );
                    foreach ($data as $value) {
                        if ($a['Attribute']['id'] == $value['Value']['attribute_id']) {
                            $attribute[$a['Attribute']['id']] = $a['Attribute']['name'];
                            $arr[$a['Attribute']['id']][$value['Value']['id']] = $value['Value']['name'];
                            $arr[$a['Attribute']['id']]['name'] = $a['Attribute']['name'];
                        }
                    }
                }
            }

            if (isset($arr) && !empty($arr)) {
                // pr($arr);
                $str = '';
                $lol = 0;
                if ($type == 'edit') {

                    $val = $this->request->data['value']; // cac giai tri duoc checked

                    if ($val != "") {
                        //echo 'fasdfasdf';exitl
                        $check_val = unserialize($val);

                        foreach ($check_val as $k => $v) {

                            $check_val[$k]['name'] = $arr[$k]['name'];
                            //pr($check_val);
                            //pr($arr);
                            foreach ($v as $a => $b) {
                                if ($check_val[$k][$a] === $arr[$k][$a]) {
                                    unset($arr[$k][$a]);
                                    unset($arr[$k]['name']);
                                }
                            }
                            if (count($arr[$k]) > 0) {

                                $arr1[$k] = $arr[$k];

                            }
                            unset($arr[$k]);

                        }
                        $last_str = '';


                        $str_non_check = '';
                        if (isset($arr)) {
                            // pr($arr);
                            foreach ($arr as $k => $v) {

                                $name = $v['name'];
                                unset($v['name']);
                                $str_non_check .= '<div class="form-group">';
                                $str_non_check .= '<label class="col-sm-2 control-label no-padding-right">' . $name . ':</label>';
                                $str_non_check .= '<div class="col-sm-10">';
                                foreach ($v as $d => $e) {
                                    $str_non_check .= '<div class="checkbox">';
                                    $str_non_check .= '<label>';
                                    $str_non_check .= '<input name="data[Attribute][attribute_value][]" value="' . $d . '" type="checkbox" class="ace" id="">';
                                    $str_non_check .= '<span class="lbl">' . $e . '</span>';
                                    $str_non_check .= '</label>';
                                    $str_non_check .= '</div>';
                                }
                                $str_non_check .= '</div>';
                                $str_non_check .= '</div>';
                                // break;
                            }
                        }
                        //pr($check_val);
                        foreach ($check_val as $k => $v) {

                            $name = $v['name'];
                            unset($v['name']);
                            $str .= '<div class="form-group">';
                            $str .= '<label class="col-sm-2 control-label no-padding-right">' . $name . ':</label>';
                            $str .= '<div class="col-sm-10">';
                            foreach ($v as $d => $e) {
                                $str .= '<div class="checkbox">';
                                $str .= '<label>';
                                $str .= '<input name="data[Attribute][attribute_value][]" value="' . $d . '" type="checkbox" class="ace" id="" checked="checked" >';
                                $str .= '<span class="lbl">' . $e . '</span>';
                                $str .= '</label>';
                                $str .= '</div>';
                            }
                            if (isset($arr1[$k]) && !empty($arr1[$k])) {
                                foreach ($arr1[$k] as $kk => $vv) {

                                    $str .= '<div class="checkbox">';
                                    $str .= '<label>';
                                    $str .= '<input name="data[Attribute][attribute_value][]" value="' . $kk . '" type="checkbox" class="ace" id="">';
                                    $str .= '<span class="lbl">' . $vv . '</span>';
                                    $str .= '</label>';
                                    $str .= '</div>';

                                }
                            }
                            $str .= $last_str;
                            $str .= '</div>';
                            $str .= '</div>';
                            // break;
                        }
                        $str .= $str_non_check;
                    } else {

                        foreach ($arr as $k => $v) {
                            $name = $v['name'];
                            unset($v['name']);
                            $str .= '<div class="form-group">';
                            $str .= '<label class="col-sm-2 control-label no-padding-right">' . $name . ':</label>';
                            $str .= '<div class="col-sm-10">';
                            foreach ($v as $d => $e) {
                                $str .= '<div class="checkbox">';
                                $str .= '<label>';
                                $str .= '<input name="data[Attribute][attribute_value][]" value="' . $d . '" type="checkbox" class="ace" id="">';
                                $str .= '<span class="lbl">' . $e . '</span>';
                                $str .= '</label>';
                                $str .= '</div>';
                            }
                            $str .= '</div>';
                            $str .= '</div>';
                            // break;
                        }
                    }
                } else {
                    foreach ($arr as $k => $v) {
                        $name = $v['name'];
                        unset($v['name']);
                        $str .= '<div class="form-group">';
                        $str .= '<label class="col-sm-2 control-label no-padding-right">' . $name . ':</label>';
                        $str .= '<div class="col-sm-10">';
                        foreach ($v as $d => $e) {
                            $str .= '<div class="checkbox">';
                            $str .= '<label>';
                            $str .= '<input name="data[Attribute][attribute_value][]" value="' . $d . '" type="checkbox" class="ace" id="">';
                            $str .= '<span class="lbl">' . $e . '</span>';
                            $str .= '</label>';
                            $str .= '</div>';
                        }
                        $str .= '</div>';
                        $str .= '</div>';
                        // break;
                    }
                }

            } else {
                $str = 'Chưa có thuộc tính của danh mục này. Vui lòng thêm thuộc tính và giá trị thuộc tính';
            }
            echo $str;
        }
    }


    //Front-end
    /**
     *
     */
    public function home()
    {
        /* $dienthoai = Cache::read('dienthoai', 'short');
        if (!$dienthoai) {
            $dienthoai = $this->Product->get_product_by_category(1);
            Cache::write('dienthoai', $dienthoai, 'short');
        } */
        //$dienthoai = $this->Product->get_product_by_category(1);

        $quan_tam = Cache::read('sp_quan_tam', 'short');
        if (!$quan_tam) {
            $quan_tam = $this->Product->find('all',
                array(
                    'recursive' => -1,
                    'limit' => 8,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'discount', 'discount_status', 'weight','publish'),
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
            // pr($quan_tam);exit;
            Cache::write('sp_quan_tam', $quan_tam, 'short');
        }

        $ban_chay = Cache::read('sp_ban_chay', 'short');
        if (!$ban_chay) {
            $this->loadModel('OrdersProduct');
            $ban_chay = $this->OrdersProduct->find('all', array(
                'limit' => 1,
                'fields' => array('OrdersProduct.*', 'COUNT(`OrdersProduct`.`product_id`) as `count`', 'Product.*', 'Category.slug', 'Category.name'),
                'group' => 'OrdersProduct.product_id',
                'order' => array('count' => 'desc'),
                'joins' => array(
                    'LEFT JOIN `products` AS Product ON `Product`.`id` = `OrdersProduct`.`product_id`',
                    'LEFT JOIN `categories` AS Category ON `Category`.`id` = `Product`.`category_id`'
                ),
                'conditions' => array('Product.status' => 1)
            ));
             Cache::write('sp_ban_chay', $ban_chay, 'short');
        }
        // pr($ban_chay);exit;
        $product_new = Cache::read('sp_moi', 'short');
        if (!$product_new) {
            $product_new = $this->Product->find('all',
                array(
                    'recursive' => -1,
                    'limit' => 8,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'sale_artifacts', 'id', 'category_id', 'slug', 'discount', 'discount_status', 'weight','publish'),
                    'contain' => array(
                        'Category' => array(
                            'fields' => array('id', 'name', 'slug')
                        ),
						'Value' => array(
                            'fields' => array('id', 'name', 'attribute_id')
                        )
                    ),
                    'order' => array('Product.created' => 'desc'),
                    'conditions' => array('Product.status' => 1)
                )
            );
            Cache::write('sp_moi', $product_new, 'short');
        }

        $check_currency = $this->Session->check('Currency');
        if ($check_currency) {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }
        //pr($product_new); exit;
        $this->set(compact('product_new', 'quan_tam', 'ban_chay'));
        $this->set('title_for_layout', 'Vietnamese Goods Online Store');
    }

    /* lay thong tin chi tiet san pham*/
    public function product_info($slug = null, $id = null)
    {
        $product = $this->Product->find('first',
            array(
                'conditions' => array('Product.slug' => $slug, 'Product.id' => $id),
                'contain' => array(
                    'Value' => array(
                        'fields' => array('id', 'name', 'attribute_id')
                    ),
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                )

            )
        );
        return $product;
    }

    /* san pham moi nhat*/

    public function product_new()
    {
        if ($this->request->is('post')) {

        } else {
            $this->Paginator->settings = array(
                'recursive' => -1,
                'limit' => 16,
                'fields' => array('name', 'price', 'thumbnail', 'description', 'sale_artifacts', 'id', 'category_id', 'slug', 'discount', 'discount_status', 'weight','publish'),
                'contain' => array(
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    ),
					'Value' => array(
                            'fields' => array('id', 'name', 'attribute_id')
                        )
                ),
                'order' => array('Product.created' => 'desc'),
                'conditions' => array('Product.status' => 1),
                'paramType' => 'querystring'
            );
        }


        $check_currency = $this->Session->check('Currency');
        if ($check_currency) {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }

        $this->set('products', $this->Paginator->paginate('Product'));
        $this->set('title_for_layout', 'New Arrivals');
    }

    /*top - seller san pham ban chay*/
    public function top_seller()
    {
		Configure::write('debug',2);
        $this->loadModel('OrdersProduct');
        $this->Paginator->settings = array(
            'limit' => 16,
            'fields' => array('OrdersProduct.*', 'COUNT(`OrdersProduct`.`product_id`) as `count`', 'Product.*', 'Category.slug', 'Category.name'),
            'group' => 'OrdersProduct.product_id',
            'order' => array('count' => 'desc'),
            'joins' => array(
                'LEFT JOIN `products` AS Product ON `Product`.`id` = `OrdersProduct`.`product_id`',
                'LEFT JOIN `categories` AS Category ON `Category`.`id` = `Product`.`category_id`',
            ),
            'conditions' => array('Product.status' => 1),
            'paramType' => 'querystring'
        );

        $check_currency = $this->Session->check('Currency');
        if ($check_currency) {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }
        $this->set('products', $this->Paginator->paginate('OrdersProduct'));
        $this->set('title_for_layout', 'Top Sellers');
    }

    /* san pham duoc giam gia*/

    public function gift_ideas()
    {
        $this->Paginator->settings = array(
            'recursive' => -1,
            'limit' => 16,
            'fields' => array('name', 'price', 'thumbnail', 'description', 'sale_artifacts', 'id', 'category_id', 'slug', 'discount', 'discount_status', 'weight','publish'),
            'contain' => array(
                'Category' => array(
                    'fields' => array('id', 'name', 'slug')
                ),
				'Value' => array(
					'fields' => array('id', 'name', 'attribute_id')
				)
            ),
            'order' => array('Product.created' => 'desc'),
            'conditions' => array('Product.status' => 1, 'Product.discount_status' => 1),
            'paramType' => 'querystring'
        );
        $check_currency = $this->Session->check('Currency');
        if ($check_currency) {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }
        $this->set('products', $this->Paginator->paginate('Product'));
        $this->set('title_for_layout', 'Sale');
    }
	# san pham duoc quan tam
	public function featured_item()
	{
		$quan_tam = $this->Product->find('all',
			array(
				'recursive' => -1,
				'limit' => 16,
				'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'discount', 'discount_status', 'weight','publish'),
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
		$check_currency = $this->Session->check('Currency');
        if ($check_currency) {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }
        $this->set('products', $this->Paginator->paginate('Product'));
        $this->set('title_for_layout', 'Featured Item');
	}

    #lay gia tri category
    public function get_category($category_id = null)
    {
        $this->loadModel('Category');
        $data_category = $this->Category->find('first', array(
            'fields' => array('id', 'name', 'slug'),
            'conditions' => array('Category.id' => $category_id)
        ));
        return $data_category;
    }

    public function view_product($category, $product, $id)
    {

        $product = $this->Product->find('first',
            array(
                'conditions' => array('Product.slug' => $product, 'Product.id' => $id),
                'contain' => array(
                    'Value' => array(
                        'fields' => array('id', 'name', 'attribute_id')
                    ),
                    'Tag' => array('id', 'name', 'slug'),
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                )/*,
				'joins' => array(
					array(
						'table' => 'products_markets',
						'alias' => 'ProductsMarket',
						'type' => 'inner',
						'conditions' => array('Product.id = ProductsMarket.product_id')
					),
					array(
						'table' => 'markets',
						'alias' => 'Market',
						'type' => 'inner',
						'conditions' => array('ProductsMarket.market_id = Market.id')
					)
				)*/
            )
        );


        //pr($attribute);exit;
        if ($product) {
            #update view count
            $AlreadyRead = $this->Session->check('sp_' . $id);
            if (!$AlreadyRead) {
                $this->Product->updateAll(
                    array('Product.view_count' => 'Product.view_count+1'),
                    array('Product.id' => $id)
                );
                $this->Session->write('sp_' . $id, $id);
            }
            #lay thong so ky thuat cua san pham
            $this->loadModel('Category');
            $this->loadModel('Value');
            $this->loadModel('Attribute');
            $attribute_id = array();
            foreach ($product['Value'] as $val) {
                array_push($attribute_id, $val['attribute_id']);

            }

            $attribute = $this->Attribute->find('all', array(
                'conditions' => array('Attribute.id' => $attribute_id,'Attribute.view' => 1),

                'fields' => array('id', 'name'),
                'recursive' => -1

            ));
            $this->loadModel('Comment');

            #==== comment product ====

            $comments = $this->Comment->find('all', array(
                'conditions' => array(
                    'Comment.product_id' => $id),
                'order' => array('Comment.created' => 'DESC'),

            ));

            #======== related product ==============#
            /* $related = $this->Product->find('all', array(
                    'conditions' => array(
                        'Product.status' => 1,
                        'Product.id <>' => $product['Product']['id'],
                        'Product.category_id' => $product['Product']['category_id']
                    ),
                    'limit' => 4,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'sale_artifacts', 'id', 'category_id', 'slug', 'discount', 'discount_status'),
                    'contain' => array(
                        'Category' => array(
                            'fields' => array('id', 'name', 'slug')
                        )
                    ),
                    'order' => 'rand()',
                )
            );
 */
			#========= get combo ==============#
			$combo = $this->get_combo_discount($product['Product']['id'],$product['Product']['category_id']);
			if($combo)
			{
				$this->set('combo',$combo);
			}
            $this->set('attribute', $attribute);
            $this->set('comments', $comments);

            $this->set(compact('product', 'attribute'));
            $this->set('title_for_layout', $product['Product']['name']);
        } else {
           $this->redirect('/err');

        }
    }

	public function get_combo_discount($pro_id,$cat_id)
	{
		$this->loadModel('Combo');
		$combo = $this->Combo->find('first',array(
				'conditions' => array(
					'OR' => array(
						'Combo.product_id' => $pro_id,
						'Combo.category_id' => $cat_id
					)
				),
				'recursive' => 0
			)	
		);
		return $combo;
	}

    public function create_review($id = null)
    {
        $this->layout = "view_item";
        $this->loadModel('Order');
        $users = $this->Auth->user();
        if ($users) {
            $products = $this->Product->find('first', array(
                'conditions' => array(
                    'Product.id' => $id,
                    'Product.status' => 1
                ),
                'recursive' => -1,
                'limit' => 4,
                'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'discount', 'discount_status', 'weight', 'avg_mark'),
                'contain' => array(
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                )
            ));
            $this->set('products', $products);
            $check_buy_item = $this->Order->find('all', array(
                'conditions' => array('Order.user_id')
            ));
            //pr($check_buy_item);exit;
            $ck = 0;
            foreach ($check_buy_item as $val) {
                foreach ($val['Product'] as $v)
                    if ($v['id'] == $id) {
                        $ck = 1;
                    }
            }
            // echo $ck;exit;
            $this->set(compact('ck', 'products', 'users'));
        } else {
            $this->Session->setFlash('Bạn cần đăng nhập để thực hiện chức năng này!' . ' <a href="javascript::void(0)" id="close-message"></a>');
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }

    }
    #=============== add san pham vao gio hàng ========================
    /* 	public function add_cart($id = null) {
            $this->autoRender = false;
            $product = $this->Product->findById($id);
            if ($this->Session->check('Cart')) {
                $cart = $this->Session->read('Cart');
                //spr($cart);exit;
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
                    $this->Session->write('Cart', $cart);
                } else {
                    $cart[$id] = array(
                        'id' => $product['Product']['id'],

                        'quantity' => 1
                    );
                    $this->Session->write('Cart', $cart);
                }
            } else {
                $cart[$id] = array(
                    'id' => $product['Product']['id'],
                    'quantity' => 1
                );
                $this->Session->write('Cart', $cart);
            }
            $this->Session->setFlash('Thêm sản phẩm thành công');
            $this->redirect($this->referer());
        } */

    public function add_cart_for_detail()
    {
        $this->autoRender = false;
        /* $users = $this->Auth->user();
        if($users)
        { */
        if ($this->request->is('post')) {
            // pr($this->request->data);exit;
            $id = $this->request->data['Product']['id'];
            $quantity = $this->request->data['Product']['quantity'];
            $ship_type = $this->request->data['Product']['ship_type'];
            $continent = $this->request->data['Product']['continent'];
            $destination = $this->request->data['Product']['destination'];
//            if (isset($this->request->data['Product']['storage'])) {
//                $storage = $this->get_value($this->request->data['Product']['storage']);
//                $key = $this->request->data['Product']['storage'] . $this->request->data['Product']['color'];
//            } else {
//                $storage = "";
//                $key = $id . $this->request->data['Product']['color'];
//            }
            $key = $id . $this->request->data['Product']['color'];
            $color = $this->get_value($this->request->data['Product']['color']);
            $product = $this->Product->findById($id);

            if ($ship_type == 1) {
                $shipping_to = $this->get_amount_shipping($product['Product']['weight'], 1, $continent);
            } else if ($ship_type == 2) {
                $shipping_to = $this->get_amount_shipping($product['Product']['weight'], 2, $destination);   #ship toi arentina , loai parcel;
            }


            $cur_ship_info = $this->get_country_info("VN"); // lay rate cua dong vietnam
            $ship_cost_by_usd = number_format(($shipping_to / $cur_ship_info['Country']['rate']), 2);
            $storage = "";
            $detail = array(
                'color' => $color,
                'storage' => $storage,
                'ship_type' => $ship_type,
                'ship_cost' => $ship_cost_by_usd
            );

            if ($this->Session->check('Cart')) {
                $cart = $this->Session->read('Cart');
                if (isset($cart[$id][$key])) {
                    $cart[$id][$key]['quantity'] += $quantity;
                } else {
                    $cart[$id][$key] = array(
                        'name' => $product['Product']['name'],
                        'slug' => $product['Product']['slug'],
                        'quantity' => $quantity,
                        'ship_type' => $ship_type,
                        'ship_cost' => $ship_cost_by_usd,
                        'detail' => json_encode($detail),
                        'thumbnail' => $product['Product']['thumbnail'],
                        'price' => $product['Product']['price'],
                        'discount' => $product['Product']['discount'],
                        'discount_status' => $product['Product']['discount_status'],
                        'key' => $key
                    );
                }
                // $this->Session->write('Cart', $cart);
            } else {
                $cart[$id][$key] = array(
                    'name' => $product['Product']['name'],
                    'slug' => $product['Product']['slug'],
                    'quantity' => $quantity,
                    'ship_type' => $ship_type,
                    'ship_cost' => $ship_cost_by_usd,
                    'detail' => json_encode($detail),
                    'thumbnail' => $product['Product']['thumbnail'],
                    'price' => $product['Product']['price'],
                    'discount' => $product['Product']['discount'],
                    'discount_status' => $product['Product']['discount_status'],
                    'key' => $key
                );
            }
            $this->Session->write('Cart', $cart);
            $this->Session->setFlash('Thêm sản phẩm thành công1');
            $this->redirect($this->referer());
        }
        /* }
        else{
            $this->Session->setFlash('Bạn cần đăng nhập để mua hàng');
            $this->redirect('/login');
        } */

    }

    #---------- add cart bang ajax -------------#
    public function add_to_cart()
    {

        $this->autoRender = false;
        //pr($_POST);
        
		if(isset($_POST['pcolor']))
		{
			$var_color = $_POST['pcolor'];
			$quantity = $_POST['pquantity'];
			$id = $_POST['pid'];
			//$ship_type = $_POST['pship_type'];
			$continent = $_POST['pcontinent'];
			$destination = $_POST['pdestination'];
			$storage = "";
			$key = $id . $var_color;
			$color = $this->get_value($var_color);
			$product = $this->Product->findById($id);
			/* if ($ship_type == 1) {
				$shipping_to = $this->get_amount_shipping($product['Product']['weight'], 1, $continent);
			} else if ($ship_type == 2) {
				$shipping_to = $this->get_amount_shipping($product['Product']['weight'], 2, $destination);   #ship toi arentina , loai parcel;
			} */
			//$cur_ship_info = $this->get_country_info("VN"); // lay rate cua dong vietnam
			//$ship_cost_by_usd = number_format(($shipping_to / $cur_ship_info['Country']['rate']), 2);
			$detail = array(
				'color' => $color,
				'storage' => $storage,
				//'ship_type' => $ship_type,
				//'ship_cost' => $ship_cost_by_usd
			);

			if ($this->Session->check('Cart')) {
				$cart = $this->Session->read('Cart');
				if (isset($cart[$id][$key])) {
					$cart[$id][$key]['quantity'] += $quantity;
				} else {
					$cart[$id][$key] = array(
						'name' => $product['Product']['name'],
						'slug' => $product['Product']['slug'],
						'quantity' => $quantity,
						//'ship_type' => $ship_type,
						//'ship_cost' => $ship_cost_by_usd,
						'detail' => json_encode($detail),
						'thumbnail' => $product['Product']['thumbnail'],
						'price' => $product['Product']['price'],
						'discount' => $product['Product']['discount'],
						'discount_status' => $product['Product']['discount_status'],
						'key' => $key
					);
				}
				// $this->Session->write('Cart', $cart);
			} else {
				$cart[$id][$key] = array(
					'name' => $product['Product']['name'],
					'slug' => $product['Product']['slug'],
					'quantity' => $quantity,
					//'ship_type' => $ship_type,
					//'ship_cost' => $ship_cost_by_usd,
					'detail' => json_encode($detail),
					'thumbnail' => $product['Product']['thumbnail'],
					'price' => $product['Product']['price'],
					'discount' => $product['Product']['discount'],
					'discount_status' => $product['Product']['discount_status'],
					'key' => $key
				);
			}
			//$this->Session->write('Cart', $cart);
			if ($this->Session->write('Cart', $cart)) {
				//echo 'Thêm sản phẩm thành công';

				$currency = $this->Session->read('Currency');
				//$currency = $this->get_cur(DEFAULT_CURRENCY);
				$to_currency = $currency['code'];
				$cart = $this->Session->read('Cart');

				$dem = 0;
				$total = 0;
				$str = "";
				foreach ($cart as $item) {
					foreach ($item as $key => $value) {
						$dem++;
						$data = $this->get_info($value['slug']);
						$pro_price = 0;
						if ($data['Product']['discount_status'] == 1) {
							$discount_price = $this->Tool->price($data['Product']['price'], $to_currency, $data['Product']['discount']);
						} else {
							$discount_price = $this->Tool->price($data['Product']['price'], $to_currency);
						}
						//$pro_price = $discount_price + $this->Tool->price($detail['ship_cost'],$to_currency,0);
						$pro_price = $discount_price;

						# ----- cart-mini ----------------
						$detail = json_decode($value['detail'],true);
						$str.= '<div class="container first-child last-child">';
							$str.= '<div class="added-product last-child">';
								$str.= '<div class="prices">' .$currency['prefix'].$pro_price. '</div>';
									$str.= '<div class="product_row">';
									$str.= '<span class="quantity">'. $value['quantity'] .'</span>&nbsp;x&nbsp;';
									$str.= '<span class="product_name">';
									$str.= '<a href="'. $data['Category']['slug'] . '/' . $data['Product']['slug'] . '-'. $data['Product']['id']. '.html">'. $this->Tool->substr($data['Product']['name'],0,20) .'</a></span>';
								$str.= '</div>';
								$str.= '<div class="product_attributes">';
									$str.= '<div class="vm-customfield-mod">';
										$str.= '<span class="product-field-type-S">'. $detail['color'] .'</span><br>';
									$str.= '</div>';		
								$str.= '</div>';					
							$str.= '</div>';
						$str.= '</div>';
						$total += $pro_price * $value['quantity'];
					}
				}

				$this->Session->write('quantity', $dem);
				$amount = $currency['prefix'] . $this->Tool->number_format($total);
				$msg = array(
					'amount' => $amount,
					'message' => 'ok',
					'c_qty' => $dem,
					'cart_mini' => $str
				);
				echo json_encode($msg);
			} else {
				$msg = array(
					'amount' => 0,
					'message' => 'false'
				);
				echo json_encode($msg);
			}
		}
        else
		{
			$msg = array(
				'amount' => 0,
				'message' => 'no color'
			);
			echo json_encode($msg);
		}
        // $this->Session->setFlash('Thêm sản phẩm thành công1');
        // $this->redirect($this->referer());

    }

    #========= lay gia tri thuoc tinh ==========#
    public function get_value($value_id)
    {
        $this->loadModel('Value');
        $name_value = $this->Value->find('first', array(
            'conditions' => array(
                'Value.id' => $value_id
            ),
            'recursive' => '-1',
            'fields' => array('name')
        ));
        $value = $name_value['Value']['name'];
        return $value;
    }

    #========= chi tiết gi�? hàng ===============
    public function cart_detail()
    {
        $users = $this->Auth->user();
        $this->loadModel('Country');
        $country = $this->Country->find('all', array(
            'conditions' => array(
                'Country.status' => 1
            ),
            'fields' => array('code', 'country')
        ));
        $cart = $this->Session->read('Cart');
        if (isset($cart)) {
            $this->set(compact('users', 'cart', 'country'));
        } else {
            $this->Session->setFlash(__('Không tồn tại sản phẩm trong gi�? hàng <a href="javascript:void(0)" id="close-message"></a>'));
            $this->redirect('/');
        }

    }

    public function demo_cart()
    {
        $users = $this->Auth->user();
        $this->loadModel('Country');
        $country = $this->Country->find('all', array(
            'conditions' => array(
                'Country.status' => 1
            ),
            'fields' => array('code', 'country')
        ));
        $cart = $this->Session->read('Cart');
        if (isset($cart)) {
            $this->set(compact('users', 'cart', 'country'));
        } else {
            $this->Session->setFlash(__('Không tồn tại sản phẩm trong gi�? hàng <a href="javascript:void(0)" id="close-message"></a>'));
            $this->redirect('/');
        }

    }


    #============== update gi�? hàng ==============
    public function update_once()
    {
        if ($this->request->is('post')) {
            //pr($this->request->data);exit;
            $data = $this->request->data;
            //pr($data);exit;
            foreach ($data as $key => $val) {
                $arr_product_id = explode('_', $key);
                $id = $arr_product_id[1];
                $key = $arr_product_id[2];
                $number = $val;
                if ($number > 0) {
                    if ($this->Session->check('Cart')) {

                        $cart = $this->Session->read('Cart');
                        if ($number != $cart[$id][$key]['quantity']) {
                            $cart[$id][$key]['quantity'] = $number;
                        }

                        $this->Session->write('Cart', $cart);
                    }
                } else {
                    $this->Session->delete('Cart.' . $id . '.' . $key);
                }
            }
        }
        $this->Session->setFlash('Update cart thành công','default',array('class' => 'alert alert-success'),'cart');
        $this->redirect($this->referer());
    }

    public function update_once_ajax()
    {
        $this->autoRender = false;
        //pr($this->request->data);exit;
        $id = $this->request->data['id'];
        $pro_key = $this->request->data['key'];
        $quantity = $this->request->data['quantity'];

        if ($quantity > 0) {
            if ($this->Session->check('Cart')) {
                $cart = $this->Session->read('Cart');
                if ($quantity != $cart[$id][$pro_key]['quantity']) {
                    $cart[$id][$pro_key]['quantity'] = $quantity;
                }

                $this->Session->write('Cart', $cart);
            }
        } else {
            $this->Session->delete('Cart.' . $id . '.' . $pro_key);
        }
        $msg = array(
            'message' => 'update product success !'
        );
        echo json_encode($msg);
    }
    #============ xóa 1 sản phẩm =====================
    public function delete_once($id = null, $key = null)
    {
        
		$check = $this->Session->read('Cart.' . $id . '.' . $key);
		if($check)
        {
            $this->Session->delete('Cart.' . $id . '.' . $key);
        }
		
        $this->redirect($this->referer());
        $this->autoRender = false;
    }

    #================ xóa tất cả gi�? hàng =============
    public function delete_all_cart()
    {
        $this->Session->delete('Cart');
		$this->Session->write('quantity', 0);
        $this->redirect(array('action' => 'home'));
        $this->Session -> setFlash('Bạn đã xóa giỏ hàng thành công!', 'default', array('alert alert-info'));
        $this->autoRender = false;
    }

    public function delete_all()
    {
        $this->Session->destroy();
        $this->redirect(array('action' => 'home'));
    }

    public function get_info($slug = null)
    {
        $result = $this->Product->find('first', array(
            'recursive' => -1,
            'conditions' => array('Product.slug' => $slug),
            'contain' => array(
                'Category' => array('id', 'name', 'slug')
            )
        ));
        return $result;
    }

    public function order_product()
    {
        //$this->autoRender = false;
        $this->loadModel('Order');
        if ($this->request->is('post')) {
            $fieldList = array('full_name', 'tel', 'email', 'address', 'date_of_birth', 'sex');
            $this->Order->set($this->request->data);
            if ($this->Order->validates(array('fieldList' => $fieldList))) {
                $data_order['Order'] = $this->request->data['Product'];
                $data_order['Order']['user_id'] = 1;

                if ($this->Order->save($data_order['Order'])) {
                    $idOrder = $this->Order->getLastInsertID();
                    $cart = $this->Session->read('Cart');

                    foreach ($cart as $item) {
                        foreach ($item as $key => $value) {
                            $this->OrdersProduct->create();
                            /* $findData = $this->Product->find('first', array(
                                'Product.status' => 1,
                                'Poduct.id' => $value['id']
                            )); */
                            $dataDetail['OrdersProduct'] = array(
                                'invoice_id' => $idOrder,
                                'product_id' => $value['id'],
                                'quantity' => $value['quantity'],
                                'storage' => $value['storage'],
                                'color' => $value['color']
                            );
                            $this->OrdersProduct->save($dataDetail);
                        }

                    }
                    $this->Session->delete('Cart');
                    $this->Session->setFlash(__('�?ặt hàng thành công, chúng tôi sẽ liên lạc với bạn trong vòng 24h.'));
                    $this->redirect(array('action' => 'cart_detail'));
                } else {
                    echo 'dfasdfasdf';
                    exit;
                }

            } else {
                $messages = $this->Order->invalidFields(array('fieldList' => $fieldList));
                $this->set(compact('messages'));
            }
        }
    }

    public function search()
    {
        $keywords = $this->request->query('keyword');
        $slug_keyword = $this->Tool->slug($keywords);
        $this->Paginator->settings = array(
            'conditions' => array(
                'Product.status' => 1,
                'OR' => array(
                    'Product.name LIKE' => "%$keywords%",
                    'Product.slug LIKE' => "%$slug_keyword%",
                    'Product.content LIKE' => "%$keywords%",
                )
            ),
            'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'discount', 'discount_status', 'weight'),
            'contain' => array(
                'Category' => array(
                    'fields' => array('id', 'name', 'slug')
                )
            ),

            'limit' => 16,
            'order' => array(
                'Product.created' => 'desc'
            ),
            'paramType' => 'querystring'
        );
        $this->set('products', $this->Paginator->paginate('Product'));
        $this->set('keywords', $keywords);
    }

    public function get_list_item()
    {
        $list_product = $this->Product->find('all',
            array(

                'recursive' => -1,
                'limit' => 2,
                'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug'),
                'contain' => array(
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                ),
                'order' => 'rand()'
            )
        );
        return $list_product;
    }

    #======= function lay menh gia va dong tien khi nguoi dung chon loai tien te ========
    public function get_finance()
    {
        $this->autoRender = false;
        $finance = $this->request->data('finance');
        //$finance = "GBP";
        if ($finance != "") {
            $this->loadModel('Country');
            $data = $this->Country->find(
                'first', array(
                    'conditions' => array(
                        'Country.currency' => $finance
                    )
                )
            );
            $arr_currency = array(
                'rate' => $data['Country']['rate'],
                'code' => $data['Country']['currency'],
                'flag' => $data['Country']['flag'],
                'prefix' => $data['Country']['prefix']
            );
            $this->Session->write('Currency', $arr_currency);
			$ck_arr_ship = $this->Session->check('Shipping');
			if($ck_arr_ship == 1)
			{
				$arrShip = $this->Session->read('Shipping');
				$arr_ship = array(
					'shipping_cost' => $arrShip['shipping_cost'],
					'ship_type' => $arrShip['ship_type'],
					'code_country' => $data['Country']['code'],
					'total_weight' => $arrShip['total_weight'],
					'currency' => $arr_currency['code']
				);	
				$this->Session->write('Shipping', $arr_ship);
			}
            echo 'OK';
        } else {
            echo 'False';
        }

    }
	
	public function add_coupon(){
        $this->autoRender = false;
        $coupon_code = $this->request->data('coupon_code');
        $this->loadModel('Coupon');
        $coupon = $this->Coupon->findByCode($coupon_code);
        $mess = array();
        if(!empty($coupon))
        {
            $today = time();
            if($this->Tool->between($today,$coupon['Coupon']['time_start'],$coupon['Coupon']['time_end']))
            {
                $coupon_arr = array(
                    'coupon' => $coupon['Coupon']['code'],
                    'coupon_discount' =>$coupon['Coupon']['percent'],
                );
                if($this->Session->write('Coupon',$coupon_arr)){
                    $mess[] = "Add coupon thành công!";
                }

            }
            else
            {
                $mess[] = "Mã giảm giá đã hết hạn!";
            }
        }
        else
        {
            $mess[] = "Sai mã giảm giá!";
        }
        echo json_encode($mess);
    }
	
	public function add_giftcard(){
        $this->autoRender = false;
        $gift_code = $this->request->data('gift_code');
        $this->loadModel('Giftcard');
        $gift_card= $this->Giftcard->find(
            'first',array(
                'conditions' => array(
                    'Giftcard.used' => null,
                    'Giftcard.code' => $gift_code
                ),
                'recursive' => '-1'
            )
        );
        $mess = array();
        if(!empty($gift_card))
        {
            $gift_card_info = array(
                'gift_code' => $gift_card['Giftcard']['code'],
                'value' =>$gift_card['Giftcard']['value']
            );
            if($this->Session->write('Giftcard',$gift_card_info)){
                $mess[] = "Add Giftcode success!";
            }
        }
        else
        {
            $mess[] = "Giftcode has been used!";
        }
        echo json_encode($mess);
    }
    #============= get shipping cost =======================#
    /*	public function get_ship_type()
        {
            $this->autoRender = false;
            $code_country = $this->request->data['code_country'];
            //echo $code_country ;exit;
            $this->loadModel('Country');
            $data_country = $this->Country->find('first',array(
                'conditions' => array(
                    'Country.status' => 1,
                    'Country.code' => $code_country
                )
            ));
            $str = "";
            if($data_country)
            {
                $weight = 234; # dang fix de test
                $continent = $data_country['Country']['continent'];
                $code = $data_country['Country']['code'];
                $result_small = $this->get_amount_shipping($weight, 1, $continent);
                $result_parcel = $this->get_amount_shipping($weight, 2, $code);   #ship toi arentina , loai parcel;

                $str .= '<tr>';
                    $str .=	'<th>Ch�?n loại ship:</th>';
                    $str .=	'<td>';
                        $str .=	'<section id="ship_cost">';
                            $str .=	'<input name="data[Order][ship_type]" required="" value="1" type="radio">Smallpacket :<span>' . $result_small .'</span>';
                            $str .=	'<input name="data[Order][ship_type]" required="" value="2" type="radio">Parcel :<span>' .$result_parcel. '</span>';
                            $str .= '</section><span> (*)</span>';
                        $str .= '</td>';
                    $str .= '</tr>';
            }else
            {
                $str .= 'Error';
            }
            echo $str;
        }

    */
    #============= ham tinh toan gia van chuyen theo 2 loai smallpacket va parcel =======#
    public function ship_cost()
    {

        $this->autoRender = false;
        $code_country = $this->request->data['code_country'];
        $weight = $this->request->data['weight'];
        $ship_type = $this->request->data['ship_type'];
        //echo $code_country ;exit;
        $this->loadModel('Country');
        $data_country = $this->Country->find('first', array(
            'conditions' => array(
                'Country.status' => 1,
                'Country.code' => $code_country
            )
        ));
        $str = "";
        if ($data_country) {
            $continent = $data_country['Country']['continent'];
            $code = $data_country['Country']['code'];
            if ($ship_type == 1) {
                $shipping_to = $this->get_amount_shipping($weight, 1, $continent);
            } else if ($ship_type == 2 || $ship_type == 3|| $ship_type == 4 ) {
                $shipping_to = $this->get_amount_shipping($weight, $ship_type, $code);   #ship toi arentina , loai parcel;
				if($shipping_to == "no_support")
				{
					echo $shipping_to ; die();
				}
            }


            $cur_ship_info = $this->get_country_info("VN"); // lay rate cua dong vietnam
            $convert_to_usd = $shipping_to / $cur_ship_info['Country']['rate'];

            // echo $convert_to_usd;
            $check_currency = $this->Session->check('Currency');
            if ($check_currency) {
                $currency = $this->Session->read('Currency');
                $to_currency = $currency['code'];
            } else {
                $to_currency = "USD";
            }

            $shipping_cost = $this->Tool->price($convert_to_usd, $to_currency);
            $ship = number_format($shipping_cost, 2);
            $arr_ship = array(
                'shipping_cost' => $ship,
                'ship_type' => $ship_type,
                'code_country' => $code_country,
                'total_weight' => $weight,
				'currency' => $currency['code']
            );
            $this->Session->write('Shipping', $arr_ship);
            echo $shipping_cost;
        }
    }



    #=============  tinh toan cuoc shipping ================#
    /*
        weight : khoi luong hang tinh theo gr.
        type : 1 - smallpacket ; 2- parcel
        to_country_code : 1,2,3,4  - smallpacket ; country_code - Parcel
    */
    public function get_amount_shipping($weight = null, $type = null, $to_country_code = null)
    {

        /* $weight = 550;
        $type = 2 - PArcel; type = 3 - EMS ; type =4 - DHL
        $to_country_code = "AR"; */
        $this->loadModel('Smallpacket');
        $this->loadModel('Parcel');
        $dt = array();
        $shipping_cost = "";
		if($type == 1)
		{
			if ($weight <= 2000) {
				$shipping_cost = $this->get_small_cost($weight, $to_country_code);
			} elseif ($weight > 2000) {
				$last_packet = $weight % 2000;
				$first_packet = floor($weight / 2000);
				//echo $first_packet; exit;
				$cost_last_packet = $this->get_small_cost($last_packet, $to_country_code);
				$cost_first_packet = $this->get_small_cost(2000, $to_country_code);
				$shipping_cost = ($first_packet * $cost_first_packet) + $cost_last_packet;
			}
		}
		elseif($type == 2 || $type == 3 || $type == 4)
		{
			$dt = $this->Parcel->find('first', array(
				'conditions' => array(
					'code' => $to_country_code,
					'status' => 1,
					'type' => $type
				)
			));
			if(!empty($dt))
			{
				$first_weight = $dt['Parcel']['first_weight'];  #cuoc goi hang < 500gr
				$next_weight = $dt['Parcel']['next_weight']; #cuoc 500gr tiep theo
				if ($weight <= 500) {
					$shipping_cost = $first_weight;
				} else if ($weight > 500) {
					$shipping_cost = $first_weight + $next_weight * (ceil($weight / 500) - 1);
				}
			}
			else{
				$shipping_cost = "no_support";
			}			
		}
       /*  switch ($type) {
            case 1 :
                if ($weight <= 2000) {
                    $shipping_cost = $this->get_small_cost($weight, $to_country_code);
                } elseif ($weight > 2000) {
                    $last_packet = $weight % 2000;
                    $first_packet = floor($weight / 2000);
                    //echo $first_packet; exit;
                    $cost_last_packet = $this->get_small_cost($last_packet, $to_country_code);
                    $cost_first_packet = $this->get_small_cost(2000, $to_country_code);
                    $shipping_cost = ($first_packet * $cost_first_packet) + $cost_last_packet;
                }
                break;
            case 2 :
                $dt = $this->Parcel->find('first', array(
                    'conditions' => array(
                        'code' => $to_country_code,
                        'status' => 1
                    )
                ));
                $first_weight = $dt['Parcel']['first_weight'];  #cuoc goi hang < 500gr
                $next_weight = $dt['Parcel']['next_weight']; #cuoc 500gr tiep theo
                if ($weight <= 500) {
                    $shipping_cost = $first_weight;
                } else if ($weight > 500) {
                    $shipping_cost = $first_weight + $next_weight * (ceil($weight / 500) - 1);
                }
                //echo $shipping_cost;
                break;
            default:
                echo 'khong tm thay gi';
                break;
        } */
        return $shipping_cost;
    }


    public function get_small_cost($weight, $area_code)
    {
        $this->loadModel('Smallpacket');
        $dt = $this->Smallpacket->find('first', array(
            'conditions' => array(
                'to_weight <=' => $weight,
                'from_weight >=' => $weight,
                'status' => 1
            )
        ));
        //pr($weight);exit;
        if ($area_code == 1) {
            $cost = $dt['Smallpacket']['asia'];
        } elseif ($area_code == 2) {
            $cost = $dt['Smallpacket']['europe'];
        } elseif ($area_code == 3) {
            $cost = $dt['Smallpacket']['africa'];
        } elseif ($area_code == 4) {
            $cost = $dt['Smallpacket']['america'];
        } elseif ($area_code == 5) {
            $cost = $dt['Smallpacket']['appu'];
        }
        return $cost;;
    }

    #============= end tinh toan cuoc shipping ================#

    public function test()
    {
        $this->autoRender = false;
        //if ($this->request->is('post') || $this->request->is('put')) {
        $firstName = 'Nguyen';
        $lastName = 'Pham';
        $creditCardType = 'Visa';
        $creditCardNumber = '4214945800399529';
        $expDateMonth = '09';
        $padDateMonth = '07';
        $expDateYear = '19';
        $cvv2Number = '593';
        $amount = '30';
        $nvp = '&PAYMENTACTION=Sale';
        $nvp .= '&AMT=' . $amount;
        $nvp .= '&CREDITCARDTYPE=' . $creditCardType;
        $nvp .= '&ACCT=' . $creditCardNumber;
        $nvp .= '&CVV2=' . $cvv2Number;
        $nvp .= '&EXPDATE=' . $padDateMonth . $expDateYear;
        $nvp .= '&FIRSTNAME=' . $firstName;
        $nvp .= '&LASTNAME=' . $lastName;
        $nvp .= '&COUNTRYCODE=US&CURRENCYCODE=USD';
        $response = $this->PaypalWPP->wpp_hash('DoDirectPayment', $nvp);
        if ($response['ACK'] == 'Success') {
            $this->Session->setFlash('Payment Successful');
        } else {
            $this->Session->setFlash('Payment Failed');
        }
        debug($response);
        // }
    }

    public function  ajaj()
    {
        //$this->layout = "ajaj";
        $dienthoai = $this->Product->get_product_by_category(1);
        $quan_tam = $this->Product->find('all',
            array(
                'recursive' => -1,
                'limit' => 4,
                'fields' => array('name', 'price', 'thumbnail', 'description', 'id', 'category_id', 'slug', 'content', 'weight'),
                'contain' => array(
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                ),
                'order' => array('view_count' => 'desc')
            )
        );
        // $ab = $this->Tool->test();
        //pr($ab);exit;
        $this->set('quan_tam', $quan_tam);

    }

    /**
     *
     */
    public function ratings()
    {
        $this->autoRender = false;
        $user = $this->Auth->user();


        if ($this->request->is('post')) {
            if (!$user) {

                $arr = array(
                    'status' => false,
                    'message' => '<div id="flashMessage" class="message" style="color:red;">You are not logged in!</div>'
                );
                echo json_encode($arr);
            } else {

                $this->loadModel('ProductsUser');
                $data = $this->request->data;

                $alreadyRate = $this->ProductsUser->find('first',
                    array(
                        'conditions' => array(
                            'user_id' => $user['id'],
                            'product_id' => $data['idBox'],
                            'type' => 2
                        )
                    )
                );
                if (!$alreadyRate) {
                    $arr_rating = array(

                        'product_id' => $data['idBox'],
                        'point' => $data['rate'],
                        'user_id' => $user['id'],
                        'ip' => $this->RequestHandler->getClientIp(),
                        'type' => 2 #danh cho ratings

                    );
                    // pr($arr_rating); exit;
                    $this->ProductsUser->save($arr_rating);


                    //update game
                    $product = $this->Product->find('first',
                        array(
                            'recursive' => -1,
                            'conditions' => array('Product.id' => $data['idBox'])
                        )
                    );
                    $total_mark = $product['Product']['total_mark'] + $data['rate'];
                    $number_mark = $product['Product']['number_mark'] + 1;
                    $avg = $total_mark / $number_mark;
                    $avg = number_format($avg, 2);
                    $arr = array(
                        'total_mark' => $total_mark,
                        'number_mark' => $number_mark,
                        'avg_mark' => $avg
                    );
                    $this->Product->updateAll(
                        array(
                            'Product.total_mark' => $total_mark,
                            'Product.number_mark' => $number_mark,
                            'Product.avg_mark' => $avg
                        ),
                        array('Product.id' => $data['idBox'])

                    );
                    $arr = array(
                        'status' => true,
                        'message' => $avg
                    );
                    echo json_encode($arr);
                    //echo $avg;
                }
            }
        }
    }


    /*     public function gift_ideas($price = null)
        {
            $products = $this->Product->find('all', array(
                'conditions' => array('price <' => $price, 'price >=' => $price - 1)
                //'recursive' => -1
            ));

            $check_currency = $this->Session->check('Currency');
            if ($check_currency) {
                $currency = $this->Session->read('Currency');
                $this->set('currency', $currency);
            }
            $this->set('products', $products);
        } */

    public function email_newproducts1()
    {

        $products = $this->Product->find('all', array(
            'order' => array(
                'created' => 'desc'),
            'limit' => 5,
            'fields' => array('name', 'thumbnail', 'description', 'price'),
            'recursive' => -1
        ));
        $this->loadModel('Subscriber');
        $list = $this->Subscriber->find('list', array(
            'fields' => array('email')
        ));
        $Email = new CakeEmail();
        $Email->config('smtp');
        $Email->emailFormat('html');
        $Email->template('new_products');
        $Email->viewVars(array('products' => $products));
        $Email->bcc($list);
        $Email->subject('Sản phẩm mới');
        $Email->send();
        $this->redirect('/admin/subscribers/info');
    }


    public function email_newproducts()
    {
        $this->theme = 'Admin';
        $this->Product->recursive = 0;
        $this->set('products', $this->Paginator->paginate());
        $products = array();
        if ($this->request->is('post')) {
            $data = $this->request->data;
			
            foreach ($data['Email'] as $key => $value) {
                if (!empty($value)) {
                    $tmp = $this->Product->find('first', array(
                        'conditions' => array('id' => $key),
                        'fields' => array('name', 'thumbnail', 'description', 'price'),
                        'recursive' => -1
                    ));
                    $products[] = $tmp;
                }
            }
			
            $this->loadModel('Subscriber');
            $list = $this->Subscriber->find('list', array(
                'fields' => array('email')
            ));
			//pr($list);exit;
            $Email = new CakeEmail();
            $Email->config('smtp');
            $Email->emailFormat('html');
            $Email->template('new_products');
            $Email->viewVars(array('products' => $products));
            $Email->bcc($list);
            $Email->subject('new products');
            $Email->send();
            $this->Session->setFlash('Gửi thành công','default',array('class'=>'alert alert-success'));
            $this->redirect('/products/email_newproducts');
        }
    }

    public function email_discount1()
    {

        $products = $this->Product->find('all', array(
            'conditions' => array('discount_status' => 1),
            'order' => array(
                'created' => 'desc'),
            'limit' => 5,
            'fields' => array('name', 'thumbnail', 'description', 'price'),
            'recursive' => -1
        ));

        $this->loadModel('Subscriber');
        $list = $this->Subscriber->find('list', array(
            'fields' => array('email')
        ));
        $Email = new CakeEmail();
        $Email->config('smtp');
        $Email->emailFormat('html');
        $Email->template('new_products');
        $Email->viewVars(array('products' => $products));
        $Email->bcc($list);
        $Email->subject('Sản giảm giá');
        $Email->send();
        $this->redirect('/admin/subscribers/info');
    }

    public function email_discount()
    {
        $this->theme = 'Admin';
        $this->Product->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('discount_status' => 1)
        );
        $this->set('products', $this->Paginator->paginate());
        $products = array();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            foreach ($data['Email'] as $key => $value) {
                if (!empty($value)) {
                    $tmp = $this->Product->find('first', array(
                        'conditions' => array('id' => $key),
                        'fields' => array('name', 'thumbnail', 'description', 'price'),
                        'recursive' => -1
                    ));
                    $products[] = $tmp;
                }
            }
            $this->loadModel('Subscriber');
            $list = $this->Subscriber->find('list', array(
                'fields' => array('email')
            ));
            $Email = new CakeEmail();
            $Email->config('smtp');
            $Email->emailFormat('html');
            $Email->template('new_products');
            $Email->viewVars(array('products' => $products));
            $Email->bcc($list);
            $Email->subject('Sản phẩm giảm giá');
            $Email->send();
            $this->Session->setFlash('Gửi thành công');
            $this->redirect('/products/email_newproducts');
        }
    }


    // ham check,xu ly du lieu khi them ,edit Tag
    private function check_tags($tags_list = null)
    {
        $this->loadModel('Tag');
        $tags = explode(',', $tags_list);
        foreach ($tags as $tag) {
            $slug = $this->Tool->slug($tag);
            $tag_info = $this->Tag->findBySlug($slug);
            if (empty($tag_info)) {

                $data_tag = array(
                    'name' => ucwords(trim($tag)),
                    'slug' => $slug,
                    'type' => 1,
                    'description' => $tag
                );
                $this->Tag->create();
                $this->Tag->save($data_tag);
                $save_info[] = $this->Tag->id;
            } else {

                $save_info[] = $tag_info['Tag']['id'];
            }
        }
        $this->request->data['Tag']['Tag'] = $save_info;
    }

    # cac san pham dang duoc giam gia
    public function admin_list_item_discount()
    {
        $this->Paginator->settings = array(
            'conditions' => array(
                'Product.discount_status' => 1
            ),
            'limit' => 15,
            'order' => array('Product.created' => 'desc'),
            'recursive' => -1
        );
        $this->set('products', $this->Paginator->paginate('Product'));
    }

    # them san pham vao wishlist
    public function addtowishlist($id = null)
    {
        if ($this->Auth->loggedIn()) {
            $this->loadModel('ProductsUser');
            $user = $this->user_login();
            $pu = $this->ProductsUser->find('first', array(
                    'conditions' => array(
                        'ProductsUser.product_id' => $id,
                        'ProductsUser.user_id' => $user['id'],
                        'ProductsUser.type' => 1
                    )
                )
            );
            if (empty($pu)) {
                $tmp['ProductsUser']['product_id'] = $id;
                $tmp['ProductsUser']['user_id'] = $user['id'];
                $tmp['ProductsUser']['type'] = 1; # danh cho wishlist
                $this->ProductsUser->create();
                if ($this->ProductsUser->save($tmp)) $this->Session->setFlash('Thêm thành công');
                else $this->Session->setFlash('Lỗi');

            } else {
                $this->Session->setFlash('SP đã tồn tahi trong wish list');

            }
            $this->redirect($this->referer());
        } else {
            $this->redirect('/');
        }
    }


    public function cart_detail_ajax()
    {

        $this->autoRender = false;
        $currency = $this->Session->read('Currency');
        $to_currency = $currency['code'];
        $cart = $this->Session->read('Cart');
        echo '<ul class="minicart_item_list">';
        $dem = 0;
        echo '<div id="products_detail">';
        foreach ($cart as $key1 => $item) {
            foreach ($item as $key => $value) {
                $dem++;
                $data = $this->get_info($value['slug']);
                echo '<div class="item">
							<div class="item_thum">
								<img src="' . $data['Product']['thumbnail'] . '" class="img-cart" width="50" height="50" alt="">
							</div>
							<div class="item_detail">
								<div class="item_name">
									<a href="/' . $data['Category']['slug'] . '/' . $data['Product']['slug'] . '-' . $data['Product']['id'] . '" title="' . $data['Product']['name'] . '" class="name-cart">' . $data['Product']['name'] . '</a>
								</div>
								<div class="item_price">
								<p>
								' . $currency['prefix'], '  ';
                if ($data['Product']['discount_status'] == 1)
                    echo $this->Tool->number_format($this->Tool->price($data['Product']['price'], $to_currency, $data['Product']['discount'], $value['quantity']));
                else
                    echo $this->Tool->number_format($this->Tool->price($data['Product']['price'], $to_currency, '0', $value['quantity']));
                echo ' x ' . $value['quantity'] . '</p>';
                echo '<a href="/products/delete_once/' . $key1 . '/' . $key . '">X</a>';
                echo '</div>
					</div>
				</div>';
            }
        }
        echo '	</div>
				<div id="linkcart">
					<a href="/cart-details">
						<div id="btn_cart">
							View cart
						</div>
					</a>
				</div>';
        $this->Session->write('quantity', $dem);
    }

    public function cart_quantity()
    {
        $this->autoRender = false;
        $cart = $this->Session->read('Cart');
        $dem = 0;
        foreach ($cart as $item) {
            foreach ($item as $key => $value) {
                $dem++;
            }
        }
        echo $dem;
    }
	
	# lay gia tri cua product related
	
    public function get_pro_info($id)
    {
        $data = $this->Product->find('first', array(
            'conditions' => array(
                'Product.id' => $id
            ),
            'recursive' => '-1',
            'fields' => array('id', 'name', 'slug', 'thumbnail','price','discount','discount_status'),
            'contain' => array(
                'Category' => array('id', 'name', 'slug')
            )
        ));
        return $data;
    }
	# chuc nang cho admin tu chon related product
	public function load_related_product()
    {
        $this->autoRender = false;
        $cat_id = $this->request->data['cat_id'];
        $data = $this->Product->find('all', array(
            'conditions' => array(
                'Product.category_id' => $cat_id,
                'Product.status' => 1
            ),
            'recursive' => '-1',
            'limit' => 8,
            'order' => 'rand()',
            'contain' => array(
                'Category' => array('id', 'name', 'slug')
            )
        ));
        $str = "";
        if (!empty($data)) {
            $str .= '<div class="carousel-inner" >';
                $str .= '<div class="item active" >';
                    $str .= '<div class="row" >';
                        for($i=0; $i< 4; $i++){
                            if(count($data) <= $i){
                                break;
                            }
                            $str .= '<div class="col-sm-3" >';
                            $str .= '<div class="col-item" >';
                            $str .= '<div class="photo" >';
                            $str .= '<img src = "'. $this->Tool->get_thumbs($data[$i]['Product']['thumbnail']).'" class="img-responsive" alt = "a" width="140px" height="250px"/>';
                            $str .= '</div >';
                            $str .= '<div class="info" >';
                            $str .= '<div class="row" >';
                            $str .= '<div class="price col-md-12" >';
                            $str .= '<h5 >'. $data[$i]['Product']['name'].'</h5 >';
                            $str .= '</div >';
                            $str .= '</div >';
                            $str .= '<div class="separator clear-left" >';
                            $str .= '<p class="btn-add" >';
                            $str .= '<i class="fa fa-tags" ></i >';
                            $str .= '<input type = "checkbox" value = "'. $data[$i]['Product']['id'].'" name = "data[Product][rel_pro_id][]" class="hidden-sm" />';
                            $str .= '</p >';
                            $str .= '</div >';
                            $str .= '<div class="clearfix" >';
                            $str .= '</div >';
                            $str .= ' </div >';
                            $str .= '</div >';
                            $str .= '</div >';
                        }
                    $str .= '</div >';
                $str .= '</div >';
			if(count($data) <= 4)
			{
				$str .= '<div class="item" >';
					$str .= '<div class="row" >';
						for($i=4; $i<8; $i++)
						{
							if(count($data) <= $i){
								break;
							}
							$str .= '<div class="col-sm-3" >';
							$str .= '<div class="col-item" >';
							$str .= '<div class="photo" >';
							$str .= '<img src = "'.  $this->Tool->get_thumbs($data[$i]['Product']['thumbnail']).'" class="img-responsive" alt = "a" width="140px" height="250px"/>';
							$str .= '</div >';
							$str .= '<div class="info" >';
							$str .= '<div class="row" >';
							$str .= '<div class="price col-md-12" >';
							$str .= '<h5 > '. $data[$i]['Product']['name'].'</h5 >';
							$str .= '</div >';
							$str .= '</div >';
							$str .= '<div class="separator clear-left" >';
							$str .= '<p class="btn-add" >';
							$str .= '<i class="fa fa-tags" ></i >';
							$str .= '<input type = "checkbox" value = "'. $data[$i]['Product']['id'].'" name = "data[Product][rel_pro_id][]" class="hidden-sm" />';
							$str .= '</p >';
							$str .= '</div >';
							$str .= '<div class="clearfix" >';
							$str .= '</div >';
							$str .= '</div >';
							$str .= '</div >';
							$str .= '</div >';
						}
					$str .= '</div >';
				$str .= '</div >';
			}
            $str .= '</div >';
        } else {
            $str .= '<span>Không có sản phẩm nào cùng loại!</span>';
        }
        echo $str;
    }


}
