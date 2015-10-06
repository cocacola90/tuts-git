<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Paypal', 'Paypal.Lib');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function beforeFilter()
    {
		parent::beforeFilter();
		//$this->Auth->allow('cart_detail'); 
		$this->loadModel('Param');
/* 	$pr_admin_email = $this->param_value('Sys','email_admin');
						$email_admin = $pr_admin_email['Param']['value'];
		echo $email_admin;exit; */
		$sandboxMode = $this->param_value('Paypal','sandboxMode');
		$nvpUsername = $this->param_value('Paypal','nvpUsername');
		$nvpPassword = $this->param_value('Paypal','nvpPassword');
		$nvpSignature = $this->param_value('Paypal','nvpSignature');
        $this->Paypal = new Paypal(array(
            'sandboxMode' => $sandboxMode['Param']['value'],
            'nvpUsername' => $nvpUsername['Param']['value'],
            'nvpPassword' => $nvpPassword['Param']['value'],
            'nvpSignature' => $nvpSignature['Param']['value'],
			/* 'sandboxMode' => false,
			'nvpUsername' => 'nguyenpham490_api1.gmail.com',
            'nvpPassword' => 'ZLE9H3LABH2WNMNS',
            'nvpSignature' => 'A1Z20SIx.oM62o8Rx2uFG0eXtmEUAl-YD6bOP.-YeOWPfmzu6vZ.ngAv' */
        ));
	
    }
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->theme="Admin";
		$ArrSubmit = array();
		if(isset($this->request->params['named']['keyword'])){
			$dataSubmit=$this->request->params['named']['keyword'];
			foreach ($dataSubmit as $ab => $value)
			{
				$ArrSubmit['Order.'.$ab] = $value;
			}
			if(isset($dataSubmit['todate']) || isset($dataSubmit['fromdate'])){
				$todate = $dataSubmit['todate'];
				$fromdate = $dataSubmit['fromdate'];
				unset($ArrSubmit['Order.todate']);
				unset($ArrSubmit['Order.fromdate']);
				if($todate != null || $fromdate != null){
				
					$data_date = array(
						'Order.created >=' =>$fromdate,
						'Order.created <=' => $todate
					);
					$ArrSubmit = array_merge($ArrSubmit,$data_date);
				}
			}
		}
		
		$conditions = $ArrSubmit;
		$this->Order->recursive = 0;
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('created' => 'desc'),
			'conditions' => $conditions
		);
		$this->set('orders', $this->Paginator->paginate('Order'));
	}
	public function admin_get_keyword(){
		$keyword = array();
		if($this->request->is('post')){
			$dataCondition=array();
				$this->Order->set($this->request->data);
				$dataSubmit=$this->request->data['Order'];
				
				$fromdate = $this->request->data['Order']['fromdate'];
				$todate = $this->request->data['Order']['todate'];
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
	public function admin_view($id = null) {
		$this->theme="Volga";
		$this->layout = "invoice";
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		//$this->set('order', $this->Order->find('first', $options));
		$order = $this->Order->find('first',array(
			'conditions' => array('Order.id' => $id),
			'joins' => array(
				array(
					'table' => 'orders_products',
					'alias' => 'OrdersProduct',
					'type' => 'inner',
					'conditions' => array('Order.id = OrdersProduct.order_id')
				),
				array(
					'table' => 'products',
					'alias' => 'Product',
					'type' => 'inner',
					'conditions' => array('OrdersProduct.product_id = Product.id')
				)
			)
		));
		$this->set('order',$order);
	}
	public function admin_order_detail($id = null) {
		$this->theme="Admin";
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		//$this->set('order', $this->Order->find('first', $options));
		$order = $this->Order->find('first',array(
			'conditions' => array('Order.id' => $id),
			'joins' => array(
				array(
					'table' => 'orders_products',
					'alias' => 'OrdersProduct',
					'type' => 'inner',
					'conditions' => array('Order.id = OrdersProduct.order_id')
				),
				array(
					'table' => 'products',
					'alias' => 'Product',
					'type' => 'inner',
					'conditions' => array('OrdersProduct.product_id = Product.id')
				)
			)
		));
		$this->set('order',$order);
		//pr($order);exit;
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->theme="Admin";
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->theme="Admin";
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function add()
	{
		//$this->layout = "view_item";
        $users = $this->Auth->user();

        if($users)
        {
            $this->loadModel('Product');
            $this->loadModel('Order');
            $this->loadModel('OrdersProduct');
            if($this->request->is('post'))
            {
					
                    //$this->request->data['Order']['date_of_birth'] = strtotime($this->request->data['Order']['date_of_birth']);
					$this->request->data['Order']['order_number'] = 'OD'. rand(0,9999) . time();
					// pr($this->request->data);exit;
                    $this->loadModel('Country');
                    $data_country = $this->Country->find('first',array(
                        'conditions' => array(
                            'Country.status' => 1,
                            'Country.code' => $this->request->data['Order']['code']
                        )
                    ));
					
                    $coupon = $this->Session->read('Coupon');
					if($coupon)
					{
						$coupon_percent = $coupon['coupon_discount'];
					}
					else
					{
						$coupon_percent = 0;
					}
					//pr($this->request->data);exit;
                    if ($this->Order->save($this->request->data)) {
						$currency = $this->Session->read('Currency');
                        //echo 'asdfasdfdfasdf';exit;
                        $idOrder = $this->Order->getLastInsertID();
						$this->Session->write('Order',$idOrder);
                        $cart = $this->Session->read('Cart');
                        $total = 0;
                        $total_weight = 0;
                        $shipping_cost = 0;
                        foreach($cart as $item){
                            foreach($item as $key => $value){
                                $this->OrdersProduct->create();
                                $findData = $this->Product->find('first', array(
                                    'conditions' => array(
                                        'Product.status' => 1,
                                        'Product.name' => $value['name']
                                    ),
                                    'recursive' => '-1'
                                ));
								if($findData['Product']['discount_status'] == 0){
									$findData['Product']['discount'] = 0;
								}
								$price_o_pro = $this->Tool->get_price($findData['Product']['price'],$findData['Product']['discount']);
                                $total_weight +=($findData['Product']['weight'] * $value['quantity']);
								 /* doan code lay % cua combo */
								$percent_combo = 0;
								$percent_combo = $this->Tool->get_percent($value['quantity']);
							    $pro_price = 0;
								if($findData['Product']['discount_status'] == 1)
								{
									$discount_price = $this->Tool->price($findData['Product']['price'],$currency['code'],$findData['Product']['discount']);
								}
								else
								{
									$discount_price = $this->Tool->price($findData['Product']['price'],$currency['code']);
								}
								$pro_price = $discount_price ; # gia cua tung san pham
								
								$sum_price = $pro_price * $value['quantity']; # gia tong cua san phan do nhan so luong
								$price_combo = $sum_price * ($percent_combo / 100); # gia tien giam cho combo
								$sum = $sum_price - $price_combo; # tong gia tie
								
								$total += $sum;

                                $dataDetail['OrdersProduct'] = array(
                                    'order_id' => $idOrder,
                                    'product_id' => $findData['Product']['id'],
                                    'quantity' => $value['quantity'],
                                    'detail' =>  $value['detail'],
									'price' => $price_o_pro
                                );
                                $this->OrdersProduct->saveAssociated($dataDetail['OrdersProduct']);

                            }
                        }
						$coupon_price = ($coupon_percent/100) * $total; # gia tien giam cho coupon
						$giftcard = $this->Session->read('Giftcard');
						if($giftcard)
						{
							$value_gift = $giftcard['value'];
						}
						else
						{
							$value_gift = 0;
						}
						$total = $total - $coupon_price - $value_gift; # gia cuoi khi da tru coupon va gift card
                        # shipping_cost
						
                        $continent = $data_country['Country']['continent'];
                        $code = $data_country['Country']['code'];
						$ship_method = $this->request->data['Order']['ship_type'];
                        if($ship_method == 1)
                        {
                            $shipping_cost = $this->get_amount_shipping($total_weight, 1, $continent);
                        }else if($ship_method == 2 || $ship_method == 3 || $ship_method == 4)
                        {
                            $shipping_cost = $this->get_amount_shipping($total_weight, $ship_method, $code);
                        }

                        $cur_ship_info = $this->get_country_info("VN"); // lay rate cua dong vietnam
                        $convert_to_usd = $shipping_cost / $cur_ship_info['Country']['rate'];

                        $grand_total = $total + $convert_to_usd;
						
						
						$grand_total = $grand_total * $currency['rate'];
						$shipping_cost = $convert_to_usd * $currency['rate'];
						$coupon_saving = $coupon_price * $currency['rate'];
						$gift_saving = $value_gift * $currency['rate'];
                        #update total
                        if($this->Order->updateAll(
                            array('Order.total'=> $grand_total,'Order.weight' => $total_weight,'Order.code' => '"'.$code.'"','Order.shipping_cost' => $shipping_cost,'Order.currency'=>'"'.$currency['code'].'"','Order.coupon_saving' => $coupon_saving, 'Order.gift_saving' => $gift_saving),
                            array('Order.id'=>$idOrder)
                        ))
						{
 							$shippingDetail = array(
								'firstname' => $this->request->data['Order']['first_name'],
								'lastname' => $this->request->data['Order']['last_name'],
								'address' => $this->request->data['Order']['address'],
								'address2' => $this->request->data['Order']['address2'],
								'city' => $this->request->data['Order']['city'],
								'zipcode' => $this->request->data['Order']['zipcode'],
								'code' => $this->request->data['Order']['code'],
								'state' => $this->request->data['Order']['state'],
								'tel' => $this->request->data['Order']['tel'],
							); 
							$this->Session->write('shippingDetail',$shippingDetail);
							// $this->Session->setFlash('Đặt hàng thành công, chúng tôi sẽ liên lạc với bạn trong vòng 24h.','default',array('class' => 'alert alert-info'));
							$this->redirect('/orders/checkout?task=bill');
							
						}
						
						/*  send email to admin */
						# send email
						$pr_admin_email = $this->param_value('Sys','email_admin');
						$email_admin = $pr_admin_email['Param']['value'];
						$sendEmail  = new CakeEmail();
						$sendEmail 	-> config('smtp')
									-> to(array($email_admin => 'Admin'))
									-> subject("New Order")
									-> template('notification')
									-> emailFormat('html')
									//-> viewVars(array('cart' => $arrOrder,'order'=>$order_dt,'currency' => $arr_currency))
									-> send(); 
						
						/* end */
						
                    }else{
						$this->Session->setFlash('Error processing your order. Please try again later!.','default',array('class' => 'alert alert-info'));
						$this->redirect($this->referer());
                        //echo 'dfasdfasdf';exit;
                    }

                /* }else
                {
                    $messages = $this->Order->invalidFields(array('fieldList' => $fieldList));
                    $this->set(compact('messages'));
                } */
            }else
            {
                $this->loadModel('Country');
                $country = $this->Country->find('all', array(
                    'conditions' => array(
                        'Country.status' => 1
                    ),
                    'fields' => array('code', 'country')
                ));
				$arr_ship = $this->Session->read('Shipping');
                $cart = $this->Session->read('Cart');
                if($cart)
                {
                    $this->set('cart', $cart);
					$this->set('arr_ship',$arr_ship);
                    $this->set('country',$country);
                }
                else
                {
                    $this->Session->setFlash(CART_MSG1,'default',array('class'=>'alert alert-info'));
                    $this->redirect('/');
                }
            }
            $this->set('title_for_layout', 'Shopping Cart');
			$this->set('users',$users);
        }else{
           $this->Session->setFlash(SYS_MSG1,'default',array('class' =>'alert alert-info'));
            $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
        }

	}
	
	public function cart_detail()
    {
		//$this->theme = "Dx";
	//	$this->layout = "view_item";
		$this->loadModel('Product');
        $users = $this->Auth->user();
		
        $this->loadModel('Country');
        $country = $this->Country->find('all', array(
            'conditions' => array(
                'Country.status' => 1
            ),
            'fields' => array('code', 'country')
        ));
        $cart = $this->Session->read('Cart');
		//pr($cart);
        if (isset($cart)) {
			if (!array_filter($cart)) {
				$this->Session->setFlash(CART_MSG1,'default',array('class'=>'alert alert-info'));
				$this->redirect('/');
			}
			$count = count($cart);
			if($count > 0)
			{
				$gift_params = $this->Tool->params('GIFT','rate_to_point'); # lay gia tri quy doi tu $ sang point
                $rate_to_point = $gift_params['Param']['value'];
				$this->set(compact('users', 'cart', 'country','rate_to_point'));
				$check_currency = $this->Session->check('Currency');
				if ($check_currency) {
					$currency = $this->Session->read('Currency');
					$this->set('currency', $currency);
				}
			}
			else
			{
				$this->Session->setFlash(CART_MSG1,'default',array('class'=>'alert alert-info'));
				$this->redirect('/');
			}
            
        } else {
			
            $this->Session->setFlash(CART_MSG1,'default',array('class'=>'alert alert-info'));
            $this->redirect('/');
        }
		$this->set('title_for_layout','Shopping Cart');
    }

	public function admin_order_success($id = null)
	{	
		$this->loadModel('Order');
		if($this->request->is('post'))
		{
			$this->Order->id = $id;
			$this->Order->saveField('status', 1);
			$this->redirect($this->referer());
		}
	}
	public function admin_order_draf($id = null)
	{	
		$this->loadModel('Order');
		if($this->request->is('post'))
		{
			$this->Order->id = $id;
			$this->Order->saveField('status', 0);
			$this->redirect($this->referer());
		}
	}
    public function update_vnpost($id = null){
        $this->theme = 'Admin';
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }

        if ($this->request->is(array('post', 'put'))) {
			$this->loadModel('User');
            if ($this->Order->save($this->request->data)) {
                $this->Order->id = $id;
                $data_order = $this->Order->find('first',array(
                    'conditions' => array(
                        'Order.id' => $id
                    ),
                    'recursive' => -1
                ));
                $user_id = $data_order['Order']['user_id'];
				if($user_id){
					$users = $this->User->find('first',array(
						'conditions' => array(
							'User.id' => $user_id
						),
						'recursive' => -1
					));
					$user_email = $users['User']['email'];
					$user_name = $users['User']['username'];
				}
				else
				{
					$user_email = $data_order['Order']['email'];
					$user_name = $data_order['Order']['first_name'] . ' ' . $data_order['Order']['last_name'];
				}
                
				
                $this->Session->setFlash(__('The order has been saved.'));
                #gui mail cho khach hang
                   $sendEmail  = new CakeEmail();
                    $sendEmail 	-> config('smtp')
                        -> to(array($user_email => $user_name))
                        -> subject("Hóa đơn mua sản phẩm tại Muaa.vn")
                        -> template('code_vnpost')
                        -> emailFormat('html')
                        -> viewVars(array('data_order' => $data_order))
                        -> send();

                return $this->redirect('/admin/orders/index');
            } else {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }

        $products = $this->Order->Product->find('list');
        $this->set(compact('users', 'products'));
    }
	
	public function order_tracking()
    {
		
        $user = $this->user_login();
        if(!empty($user))
        {
			$this->Paginator->settings = array(
				'conditions'=>array('Order.user_id'=>$user['id']),
                'recursive'=> -1,
				'limit' => 10,
				'order' => array('created' => 'desc'),
				'paramType' => 'querystring'
			);
			$this->set('orders',$this->Paginator->paginate('Order'));

            $this->set(compact('user'));
        } else
        $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
    }

	
	
	public function checkout(){
		//$this->layout = "view_item";
		$this->loadModel('Product');
		$arr_ship = $this->Session->read('Shipping');
		$arr_currency = $this->Session->read('Currency');
        $currency = $arr_currency['code'];
		$return_url = $this->param_value('Paypal','return_url');
		$cancel_url = $this->param_value('Paypal','cancel_url');
		if($this->request->query('task'))
		{
			$task = $this->request->query('task');
		}
		else
		{
			$task = "press";
		}
		
		$cart = $this->Session->read('Cart');
		if($this->request->query('step')){
			$task = $this->request->query('task');
			$coupon = $this->Session->read('Coupon');
            if($coupon)
            {
                $coupon_percent = $coupon['coupon_discount'];
            }
            else
            {
                $coupon_percent = 0;
            }
			//echo $task; exit;
			$total_amount =0;
			$items_pro = array();
			foreach($cart as $item){
				foreach($item as $key => $value){
					$findData = $this->Product->find('first', array(
						'conditions' => array(
							'Product.status' => 1,
							'Product.name' => $value['name']
						),
						'recursive' => '-1'
					));
					$detail = json_decode($value['detail'],true);
					if($findData['Product']['discount_status'] == 1)
					{
						$total = $findData['Product']['price'] - ($findData['Product']['price'] * ($findData['Product']['discount'] / 100));
					}
					else
					{
						$total = $findData['Product']['price'] ;
					}
					$percent_combo = 0;
                    $percent_combo = $this->Tool->get_percent($value['quantity']);
					 // echo $percent_combo;
                    $sum_price = $total * $value['quantity'];
                    $price_combo = $sum_price * ($percent_combo / 100);
					
                    $sum_price_combo = $sum_price - $price_combo;
					$total_amount += $sum_price_combo;
                    $total = round(($sum_price_combo / $value['quantity']), 2);
                    
					$product_info = array(
						'name' => $findData['Product']['name'],
						'description' => $detail,
						'tax' => 0,
						'subtotal' => (float)(number_format(($total * $arr_currency['rate']),2)),
						'qty' => $value['quantity'],
					);
					 array_push($items_pro, $product_info);
				
				}
				
			}
			 /* tinh gia tri coupon*/
            $coupon_price = ($coupon_percent/100) * $total_amount;
			if($coupon_price > 0)
            {
                $arr_coupon = array(
                    'name' => "Coupon",
                    'description' => "Coupon",
                    'tax' => 0,
                    'subtotal' =>  -(float)(number_format(($coupon_price * $arr_currency['rate']), 2)),
                    'qty' => 1,
                );
                array_push($items_pro,$arr_coupon);
            }
			# add gia tri giftcard vao don hang
			$giftcard = $this->Session->read('Giftcard');
            if($giftcard)
            {
                $value_gift = $giftcard['value'];
            }
            else
            {
                $value_gift = 0;
            }
			if($value_gift > 0)
            {
                $arr_gift = array(
                    'name' => "Gift Card Redeem",
                    'description' => "Gift Card Redeem",
                    'tax' => 0,
                    'subtotal' =>  -(float)(number_format(($value_gift * $arr_currency['rate']),2)),
                    'qty' => 1,
                );
                array_push($items_pro,$arr_gift);
            }
			#--------------------------------------------------#
			$ship = (float)number_format($arr_ship['shipping_cost'],2);
			$shippingDetail = $this->Session->read('shippingDetail');
			$order = array(
				'description' => 'Your purchase with Acme clothes store',
				'currency' => $currency,
				'return' => $return_url['Param']['value']."?task=$task",
				'cancel' => $cancel_url['Param']['value'],
				'custom' => 'bingbong',
				'shipping' => $ship,
				'items' => $items_pro,
				'shippingDetail' => $shippingDetail
			);
			
			try {
				$a = $this->Paypal->setExpressCheckout($order);
				//var_dump($a);
				$this->redirect($a);
			} catch (Exception $e) {
				 $e->getMessage();
			}
			
		}
		else
		{
			$this->loadModel('Country');
			$country = $this->Country->find('first', array(
				'conditions' => array(
					'Country.status' => 1,
					'Country.code' => $arr_ship['code_country']
				),
				'fields' => array('code', 'country',)
			));
			$this->set(compact('cart','country','arr_ship','task'));
			$check_currency = $this->Session->check('Currency');
			if ($check_currency) {
				$currency = $this->Session->read('Currency');
				$this->set('currency', $currency);
			}
			
		}
		$this->set('title_for_layout','Checkout Cart');
	}

	public function return_item(){
		//$this->autoRender = false;
		$task = $this->request->query('task');
		if(empty($task)){
			$task="press";
		}
		$this->loadModel('Product');
		$arr_ship = $this->Session->read('Shipping');
        $arr_currency = $this->Session->read('Currency');
        $currency = $arr_currency['code'];
		$shipping_cost = $arr_ship['shipping_cost'];
		$return_url = $this->param_value('Paypal','return_url');
		$cancel_url = $this->param_value('Paypal','cancel_url');
		$cart = $this->Session->read('Cart');
		$total_amount =0;
		$items_pro = array();
		$coupon = $this->Session->read('Coupon');
        if($coupon)
        {
            $coupon_percent = $coupon['coupon_discount'];
        }
        else
        {
            $coupon_percent = 0;
        }
		// pr($cart);exit;
		foreach($cart as $item){
			foreach($item as $key => $value){
				$findData = $this->Product->find('first', array(
					'conditions' => array(
						'Product.status' => 1,
						'Product.name' => $value['name']
					),
					'recursive' => '-1'
				));
				$detail = json_decode($value['detail'],true);
				if($findData['Product']['discount_status'] == 1)
				{
					$total = $findData['Product']['price'] - ($findData['Product']['price'] * ($findData['Product']['discount'] / 100));
				}
				else
				{
					$total = $findData['Product']['price'] ;
				}
				$percent_combo = 0;
				$percent_combo = $this->Tool->get_percent($value['quantity']);
				 // echo $percent_combo;
				$sum_price = $total * $value['quantity'];
				$price_combo = $sum_price * ($percent_combo / 100);
				/* tinh gia tri coupon*/
                $coupon_price = ($coupon_percent/100) * $sum_price;
                $sum_price_combo = $sum_price - $price_combo; #tong gia tri cua item
				$total_amount += $sum_price_combo;
				$total = round(($sum_price_combo / $value['quantity']), 2);
				
				$product_info = array(
					'name' => $findData['Product']['name'],
					'description' => $detail,
					'tax' => 0,
                    'subtotal' => (float)number_format(($total * $arr_currency['rate']),2),
                    'qty' => $value['quantity'],
				);
				 array_push($items_pro, $product_info);
				
			}
	
		}
		$coupon_price = ($coupon_percent / 100) * $total_amount;
		if($coupon_price > 0)
		{
			$arr_coupon = array(
				'name' => "Coupon",
				'description' => "Coupon",
				'tax' => 0,
				'subtotal' =>  -(float)number_format(($coupon_price * $arr_currency['rate']),2),
				'qty' => 1,
			);
			array_push($items_pro,$arr_coupon);
		}
		# add gia tri giftcard vao don hang
		$giftcard = $this->Session->read('Giftcard');
		if($giftcard)
		{
			$value_gift = $giftcard['value'];
		}
		else
		{
			$value_gift = 0;
		}
		if($value_gift > 0)
		{
			$this->loadModel('Giftcard');
			$this->Giftcard->updateAll(
				array('Giftcard.used' => time()),
				array('Giftcard.code' => $giftcard['gift_code'])
			);
			$arr_gift = array(
				'name' => "Gift Card Redeem",
				'description' => "Gift Card Redeem",
				'tax' => 0,
				'subtotal' =>  -(float)number_format(($value_gift * $arr_currency['rate']),2),
				'qty' => 1,
			);
			array_push($items_pro,$arr_gift);
		}
		$ship = (float)number_format($shipping_cost,2);
		$shippingDetail = $this->Session->read('shippingDetail');
        $order = array(
            'description' => 'Your purchase with Acme clothes store',
            'currency' => $currency,
            'return' => $return_url['Param']['value'],
			'cancel' => $cancel_url['Param']['value'],
            'custom' => 'bingbong',
            'shipping' => $ship,
            'items' => $items_pro,
			'shippingDetail' => $shippingDetail
        );
		
		try {
            $token = $this->request->query('token');
            $data= $this->Paypal->getExpressCheckoutDetails($token);
			//pr($data);exit;
			
            $result_payerID = $data['PAYERID'];
            $result_token = $data['TOKEN'];
            try {
                $do_checkout_pay = $this->Paypal->doExpressCheckoutPayment($order, $result_token, $result_payerID);
				//pr($do_checkout_pay);exit;
				if($task == "press"){
					//echo $task; exit;
					$user_info = $this->Auth->user();
					$bill_to = array();
					if(!isset($user_info)){   #chua dang ky lay theo dia chi Paypal
						$bill_to = array(
							'first_name' => $data['FIRSTNAME'],
							'last_name' => $data['LASTNAME'],
							'shiptoname' => $data['SHIPTONAME'],
							'address' => $data['SHIPTOSTREET'],
							'city' => $data['SHIPTOCITY'],
							'state' => $data['SHIPTOSTATE'],
							'zipcode' => $data['SHIPTOZIP'],
							'code' => $data['SHIPTOCOUNTRYCODE'],
							'country' => $data['SHIPTOCOUNTRYNAME'],
							'email' => $data['EMAIL'],
							'phone' => '',
							'user_id' => '',
							'currency' => $data['CURRENCYCODE']
							
						);

					}else
					{
						# khi nguoi dung da login nhung chua cap nhat thong tin;
						if(!isset($user_info['city']) || !isset($user_info['country'])){
						  //  echo 'asdasd';exit;
							$this->redirect(array(
								'controller' => 'users', 'action' => 'edit_profile', '?' => array(
									'token' => $result_token,
									'PayerID' => $result_payerID
								)
							));
						}
						$bill_to = array(
							'first_name' => $user_info['firstname'],
							'last_name' => $user_info['lastname'],
							'shiptoname' => $user_info['firstname'] .' '. $user_info['lastname'],
							'address' => $user_info['address'],
							'city' => $user_info['city'],
							'state' => $user_info['state'],
							'zipcode' => $user_info['zip_code'],
							'code' => "",
							'phone' => $user_info['phonenumber'],
							'country' => $user_info['country'],
							'email' => $user_info['email'],
							'user_id' => $user_info['id'],
							'currency' => $data['CURRENCYCODE']
						);
					}
					$this->loadModel('Country');
					$country = $this->Country->find('first', array(
						'conditions' => array(
							'Country.status' => 1,
							'Country.code' => $arr_ship['code_country']
						),
						'fields' => array('code', 'country',)
					));
					$this->set(compact('cart','country','arr_ship'));
					$check_currency = $this->Session->check('Currency');
					if ($check_currency) {
						$currency = $this->Session->read('Currency');
						$this->set('currency', $currency);
					}
					$this->set('bill_to',$bill_to);

					$order_data = array(
						'order_number' => 'OD'. rand(0,9999) . time(),
						'ship_type' => $arr_ship['ship_type'],
						'weight' => $arr_ship['total_weight'],
						'total' => $data['AMT'],
						'shipping_cost' => $arr_ship['shipping_cost'],
						'transaction_id' => $do_checkout_pay['PAYMENTINFO_0_TRANSACTIONID'],
						'pay_status' => $do_checkout_pay['PAYMENTINFO_0_PAYMENTSTATUS'],
						'coupon_saving' => number_format(($coupon_price * $arr_currency['rate']), 2),
						'gift_saving' => number_format(($value_gift * $arr_currency['rate']), 2)
					);

					$arrOrder = array_merge($bill_to,$order_data);
					//pr($arrOrder);exit;
					# luu thong tin khach hang vao bang order
					$this->loadModel('OrdersProduct');
					if($this->Order->save($arrOrder)){
						$idOrder = $this->Order->getLastInsertID();
						$this->Session->write('Order',$idOrder);
						foreach($cart as $item){
							foreach($item as $key => $value){
								$this->OrdersProduct->create();
								$findData = $this->Product->find('first', array(
									'conditions' => array(
										'Product.status' => 1,
										'Product.name' => $value['name']
									),
									'recursive' => '-1'
								));
								if($findData['Product']['discount_status'] == 0){
									$findData['Product']['discount'] = 0;
								}
								$price_o_pro = $this->Tool->get_price($findData['Product']['price'],$findData['Product']['discount']);
								$dataDetail['OrdersProduct'] = array(
									'order_id' => $idOrder,
									'product_id' => $findData['Product']['id'],
									'quantity' => $value['quantity'],
									'detail' =>  $value['detail'],
									'price' => $price_o_pro
								);
								$this->OrdersProduct->saveAssociated($dataDetail['OrdersProduct']);
							}
						}
						# khi luu thanh cong thi hoan tat giao dich
						if($do_checkout_pay['ACK'] == "Success" || $do_checkout_pay['ACK'] == "SuccessWithWarning")
						{
							$this->loadModel('Order');
							$idOrder = $this->Session->read('Order');
							//pr($idOrder);
							
								$this->Order->updateAll(
									array(
									'Order.transaction_id'=> '"'.$do_checkout_pay['PAYMENTINFO_0_TRANSACTIONID'].'"',
									'Order.pay_status' => '"'.$do_checkout_pay['PAYMENTINFO_0_PAYMENTSTATUS'].'"'
									),
									array('Order.id'=>$idOrder)
								);
								
								/* Gui email cho khach hang khi mua hang xong */
								
								$order_dt = $this->Order->find('first',array(
									'conditions' => array('Order.id' => $idOrder),
									'joins' => array(
										array(
											'table' => 'orders_products',
											'alias' => 'OrdersProduct',
											'type' => 'inner',
											'conditions' => array('Order.id = OrdersProduct.order_id')
										),
										array(
											'table' => 'products',
											'alias' => 'Product',
											'type' => 'inner',
											'conditions' => array('OrdersProduct.product_id = Product.id')
										)
									)
								));
								# add point
								if(!empty($order_dt['Order']['user_id']))
								{

									$gift_params = $this->Tool->params('GIFT','rate_to_point'); # lay gia tri quy doi tu $ sang point
									$rate_to_point = $gift_params['Param']['value'];
									$total_item = $data['ITEMAMT'];      # $data['ITEMAMT'] tong gia tri cua toan sp
									$us_total = (float)($total_item / $arr_currency['rate']);
									$point = number_format(($us_total / $rate_to_point),2);
									$this->loadModel('Account');
									$this->loadModel('Accountlog');
									$check_acc = $this->Account->find('first',array(
										'conditions' => array('Account.user_id' => $order_dt['Order']['user_id']),
										'recursive' => '-1'
									));

									if(empty($check_acc))    # nguoi dung chua co thong tin trong bang account
									{
										$arrAccount = array(
											'user_id' => $order_dt['Order']['user_id'],
											'point' => $point
										);

										$this->Account->create();
										$this->Account->save($arrAccount);
									}else     # nguoi dung da ton taithong tin trong bang account
									{
										$new_point = $check_acc['Account']['point'] + $point;
										$this->Account->id = $check_acc['Account']['id'];
										$this->Account->saveField('point',$new_point);
									}
									# luu ban ghi log vao bang account log
									$arrAccountLog = array(
										'user_id' => $order_dt['Order']['user_id'],
										'order_number' => $order_dt['Order']['order_number'],
										'detail' => "Your purchase with Volga store",
										'point' => $point,
										'type' => 1,    #type = 1; mua hang      - $type = 2: doi lay giftcard
									);
									$this->Accountlog->create();
									$this->Accountlog->save($arrAccountLog);
								}
								# send email
								$sendEmail  = new CakeEmail();
								$sendEmail 	-> config('smtp')
											-> to(array($arrOrder['email'] => $arrOrder['shiptoname']))
											-> subject("Hóa đơn mua sản phẩm tại dx")
											-> template('checkout_paypal')
											-> emailFormat('html')
											-> viewVars(array('cart' => $arrOrder,'order'=>$order_dt,'currency' => $arr_currency))
											-> send();
								
								$this->Session->setFlash('Checkout Success!','default',array('class'=>'alert alert-info'));
								$this->Session->delete('Cart');
								$this->Session->delete('Shipping');
								$this->Session->delete('Order');
								$this->Session->delete('Coupon');
								$this->Session->delete('Giftcard');
								$this->Session->delete('quantity');
								$this->redirect('/');
							
							
						}
						else
						{
							$this->Session->setFlash($do_checkout_pay['ACK'],'default',array('class'=>'alert alert-info'));
							$this->redirect('/cart-details');
						}

					}
					else
					{
						$this->Session->setFlash('Có lỗi khi lưu thông tin đơn hàng!','default',array('class'=>'alert alert-info'));
						$this->redirect('/cart-details');
					}
				}
				elseif($task == "bill"){
					//echo $task; exit;
					if($do_checkout_pay['ACK'] == "Success" || $do_checkout_pay['ACK'] == "SuccessWithWarning")
					{
						$this->loadModel('Order');
						$idOrder = $this->Session->read('Order');
						# update transaction_id va status paypal
						$this->Order->updateAll(
							array(
							'Order.transaction_id'=> '"'.$do_checkout_pay['PAYMENTINFO_0_TRANSACTIONID'].'"',
							'Order.pay_status' => '"'.$do_checkout_pay['PAYMENTINFO_0_PAYMENTSTATUS'].'"'
							),
							array('Order.id'=>$idOrder)
						);
						# gui email khi thanh cong
						$order_dt = $this->Order->find('first',array(
							'conditions' => array('Order.id' => $idOrder),
							'joins' => array(
								array(
									'table' => 'orders_products',
									'alias' => 'OrdersProduct',
									'type' => 'inner',
									'conditions' => array('Order.id = OrdersProduct.order_id')
								),
								array(
									'table' => 'products',
									'alias' => 'Product',
									'type' => 'inner',
									'conditions' => array('OrdersProduct.product_id = Product.id')
								)
							)
						));
						  # chuc nang tich diem
                        $gift_params = $this->Tool->params('GIFT','rate_to_point'); # lay gia tri quy doi tu $ sang point
                        $rate_to_point = $gift_params['Param']['value'];
                        $total_item = $data['ITEMAMT'];      # $data['ITEMAMT'] tong gia tri cua toan sp
                        $us_total = (float)($total_item / $arr_currency['rate']);
                        $point = number_format(($us_total / $rate_to_point),2);
                        $this->loadModel('Account');
                        $this->loadModel('Accountlog');
                        $check_acc = $this->Account->find('first',array(
                            'conditions' => array('Account.user_id' => $order_dt['Order']['user_id']),
                            'recursive' => '-1'
                        ));

                        if(empty($check_acc))    # nguoi dung chua co thong tin trong bang account
                        {
                            $arrAccount = array(
                                'user_id' => $order_dt['Order']['user_id'],
                                'point' => $point
                            );

                            $this->Account->create();
                            $this->Account->save($arrAccount);
                        }else     # nguoi dung da ton taithong tin trong bang account
                        {
                            $new_point = $check_acc['Account']['point'] + $point;
                            $this->Account->id = $check_acc['Account']['id'];
                            $this->Account->saveField('point',$new_point);
                        }
                        # luu ban ghi log vao bang account log
                        $arrAccountLog = array(
                            'user_id' => $order_dt['Order']['user_id'],
                            'order_number' => $order_dt['Order']['order_number'],
                            'detail' => "Your purchase with Volga store",
                            'point' => $point,
                            'type' => 1,    #type = 1; mua hang      - $type = 2: doi lay giftcard
                        );
                        $this->Accountlog->create();
                        $this->Accountlog->save($arrAccountLog);
                        # --------------------end ----------------------------------#
						$sendEmail  = new CakeEmail();
						$bill_username = $order_dt['Order']['first_name'].' '.$order_dt['Order']['middle_name'].' '.$order_dt['Order']['last_name'];
						$bill_email = $order_dt['Order']['email'];
						$sendEmail 	-> config('smtp')
									-> to(array($bill_email => $bill_username))
									-> subject("Hóa đơn mua sản phẩm tại dx")
									-> template('checkout_paypal')
									-> emailFormat('html')
									-> viewVars(array('order'=>$order_dt,'currency' => $arr_currency))
									-> send();
								
						
						$this->Session->setFlash('Checkout Success!','default',array('class'=>'alert alert-info'));
						$this->Session->delete('Cart');
						$this->Session->delete('Shipping');
						$this->Session->delete('Order');
						$this->Session->delete('Coupon');
						$this->Session->delete('Giftcard');
						$this->Session->delete('quantity');
						$this->redirect('/');
						
						
					}
					else if($do_checkout_pay['ACK'] == "Failure" && isset($do_checkout_pay['L_LONGMESSAGE0']))
					{
						$this->Session->setFlash($do_checkout_pay['ACK'],'default',array('class'=>'alert alert-info'));
						$this->redirect('/cart-details');
					}
				}
            } catch (PaypalRedirectException $e) {
                $this->redirect($e->getMessage());
            } catch (Exception $e) {
                $e->getMessage();
            }
        } catch (Exception $e) {
             $e->getMessage();
        }
	}
	public function cancel(){
		$this->Session->setFlash('Your order has been cancelled','default',array('class' => 'alert alert-info'));
		$this->redirect('/');
		
		
	}
	
	public function re_checkout($order_number = null)
	{
		
		$this->autoRender = false;
		$user = $this->Auth->user();
		if($user)
		{
			$data_order = $this->Order->find('first',array(
				'conditions' => array(
					'Order.order_number' => $order_number,
					'Order.pay_status' => null,
					'Order.user_id' => $user['id']
				)
			));
			if(!empty($data_order))
			{
				$this->loadModel('Product');
				$arr_ship = $this->Session->read('Shipping');
				$arr_currency = $this->Tool->country_info($data_order['Order']['currency']);
				//pr($arr_currency);exit;
				$currency = $data_order['Order']['currency'];
				$return_url = $this->param_value('Paypal','return_url');
				$cancel_url = $this->param_value('Paypal','cancel_url');
				
				//pr($data_order);exit;
				$total_amount = 0;
				$items_pro = array();
				foreach($data_order['Product'] as $item){
					$OrderProduct = $item['OrdersProduct'];
					$percent_combo = 0;
                    $percent_combo = $this->Tool->get_percent($OrderProduct['quantity']); // lay % discount combo
					$p_price = $OrderProduct['price']; // gia cua 1 sp
					$sum_price = $p_price * $OrderProduct['quantity']; # gia cua nhieu sp
					$price_combo = $sum_price * ($percent_combo / 100);
					$total_p_price = $sum_price - $price_combo;
					
					$total_amount += $total_p_price;  #gia cua tat ca cac sp
                    $total = round(($total_p_price / $OrderProduct['quantity']), 2);
                    $detail = json_decode($OrderProduct['detail'],true);
					$color = $detail['color'];
					$product_info = array(
						'name' => $item['name'],
						'description' => $color,
						'tax' => 0,
						'subtotal' => (float)($total * $arr_currency['Country']['rate']),
						'qty' => $OrderProduct['quantity'],
					);
					array_push($items_pro, $product_info);
				} 
				$coupon_price = $data_order['Order']['coupon_saving'];
				if($coupon_price > 0)
				{
					$arr_coupon = array(
						'name' => "Coupon",
						'description' => "Coupon",
						'tax' => 0,
						'subtotal' =>  -(float)$coupon_price,
						'qty' => 1,
					);
					array_push($items_pro,$arr_coupon);
				}
				$ship = number_format($data_order['Order']['shipping_cost'],2);
				$order = array(
					'description' => 'Your purchase with Acme clothes store',
					'currency' => $currency,
					'return' => DOMAIN_ROOT . '/orders/re_return_item?order_number=' . $data_order['Order']['order_number'],
					'cancel' => $cancel_url['Param']['value'],
					'custom' => 'bingbong',
					'shipping' => $ship,
					'items' => $items_pro
				);
				//pr($order);exit; 
				try {
					//echo 'sd';
					$a = $this->Paypal->setExpressCheckout($order);
					echo $a;
					$this->redirect($a);
				} catch (Exception $e) {
					 $e->getMessage();
				}
			}
			else
			{
				$this->redirect('/err');
			}
		}
		else
		{
			 $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		}
		
	}
	
	public function re_return_item()
	{
		$order_number = $this->request->query('order_number');
		//echo $order_number ;exit;
		$data_order = $this->Order->find('first',array(
				'conditions' => array(
					'Order.order_number' => $order_number,
					'Order.pay_status' => null
					
				)
			));
		if(!empty($data_order))
		{
			$this->loadModel('Product');
			$arr_ship = $this->Session->read('Shipping');
			$arr_currency = $this->Tool->country_info($data_order['Order']['currency']);
			//pr($arr_currency);exit;
			$currency = $data_order['Order']['currency'];
			$return_url = $this->param_value('Paypal','return_url');
			$cancel_url = $this->param_value('Paypal','cancel_url');
			
			//pr($data_order);exit;
			$total_amount = 0;
			$items_pro = array();
			foreach($data_order['Product'] as $item){
				$OrderProduct = $item['OrdersProduct'];
				$percent_combo = 0;
				$percent_combo = $this->Tool->get_percent($OrderProduct['quantity']); // lay % discount combo
				$p_price = $OrderProduct['price']; // gia cua 1 sp
				$sum_price = $p_price * $OrderProduct['quantity']; # gia cua nhieu sp
				$price_combo = $sum_price * ($percent_combo / 100);
				$total_p_price = $sum_price - $price_combo;
				
				$total_amount += $total_p_price;  #gia cua tat ca cac sp
				$total = round(($total_p_price / $OrderProduct['quantity']), 2);
				$detail = json_decode($OrderProduct['detail'],true);
				$color = $detail['color'];
				$product_info = array(
					'name' => $item['name'],
					'description' => $color,
					'tax' => 0,
					'subtotal' => (float)($total * $arr_currency['Country']['rate']),
					'qty' => $OrderProduct['quantity'],
				);
				array_push($items_pro, $product_info);
			} 
			$coupon_price = $data_order['Order']['coupon_saving'];
			if($coupon_price > 0)
			{
				$arr_coupon = array(
					'name' => "Coupon",
					'description' => "Coupon",
					'tax' => 0,
					'subtotal' =>  -(float)$coupon_price,
					'qty' => 1,
				);
				array_push($items_pro,$arr_coupon);
			}
			$ship = number_format($data_order['Order']['shipping_cost'],2);
			$order = array(
				'description' => 'Your purchase with Acme clothes store',
				'currency' => $currency,
				'return' => DOMAIN_ROOT . '/orders/re_return_item',
				'cancel' => $cancel_url['Param']['value'],
				'custom' => 'bingbong',
				'shipping' => $ship,
				'items' => $items_pro
			);
			//pr($order);
			try {
				$token = $this->request->query('token');
				$data= $this->Paypal->getExpressCheckoutDetails($token);
				//pr($data);exit;
			
				$result_payerID = $data['PAYERID'];
				$result_token = $data['TOKEN'];
				try {
					$do_checkout_pay = $this->Paypal->doExpressCheckoutPayment($order, $result_token, $result_payerID);
					if($do_checkout_pay['ACK'] == "Success" || $do_checkout_pay['ACK'] == "SuccessWithWarning")
					{
						$this->loadModel('Order');
						$idOrder = $data_order['Order']['id'];
						# update transaction_id va status paypal
						$this->Order->updateAll(
							array(
							'Order.transaction_id'=> '"'.$do_checkout_pay['PAYMENTINFO_0_TRANSACTIONID'].'"',
							'Order.pay_status' => '"'.$do_checkout_pay['PAYMENTINFO_0_PAYMENTSTATUS'].'"'
							),
							array('Order.id'=>$idOrder)
						);
						# gui email khi thanh cong
						
						$sendEmail  = new CakeEmail();
						$bill_username = $data_order['Order']['first_name'].' '.$data_order['Order']['middle_name'].' '.$data_order['Order']['last_name'];
						$bill_email = $data_order['Order']['email'];
						$sendEmail 	-> config('smtp')
									-> to(array($bill_email => $bill_username))
									-> subject("Hóa đơn mua sản phẩm tại dx")
									-> template('re_checkout_paypal')
									-> emailFormat('html')
									-> viewVars(array('order'=>$data_order,'currency_detail' => $arr_currency))
									-> send();
								
						
						$this->Session->setFlash('Checkout Success!','default',array('class'=>'alert alert-info'));
						$this->Session->delete('Cart');
						$this->Session->delete('Shipping');
						$this->Session->delete('Order');
						$this->Session->delete('Coupon');
						$this->Session->delete('quantity');
						$this->redirect('/');
						
						
					}
					else
					{
						$this->Session->setFlash($do_checkout_pay['ACK'],'default',array('class'=>'alert alert-info'));
						$this->redirect('/cart-details');
					}
				}
				catch (PaypalRedirectException $e) {
					$this->redirect($e->getMessage());
				} catch (Exception $e) {
					$e->getMessage();
				}
			} catch (Exception $e) {
				 $e->getMessage();
			}
		}
		else
		{
			$this->redirect('/err');
		}
	}
	
	
	public function order_detail($number= null)
	{
		
		if(isset($number))
		{
			$order = $this->Order->find('first',array(
				'conditions' => array('Order.order_number' => $number),
				'joins' => array(
					array(
						'table' => 'orders_products',
						'alias' => 'OrdersProduct',
						'type' => 'inner',
						'conditions' => array('Order.id = OrdersProduct.order_id')
					),
					array(
						'table' => 'products',
						'alias' => 'Product',
						'type' => 'inner',
						'conditions' => array('OrdersProduct.product_id = Product.id')
					)
				)
			));
			
			$this->set(compact('order','number'));
			$this->set('title_for_layout','Order Detail');
		}
		else
		{
			$this->redirect('/err');
		}
		
	}
	public function invoice($number= null)
	{
		$this->layout = "invoice";
		if(isset($number))
		{
			$order = $this->Order->find('first',array(
				'conditions' => array('Order.order_number' => $number),
				'joins' => array(
					array(
						'table' => 'orders_products',
						'alias' => 'OrdersProduct',
						'type' => 'inner',
						'conditions' => array('Order.id = OrdersProduct.order_id')
					),
					array(
						'table' => 'products',
						'alias' => 'Product',
						'type' => 'inner',
						'conditions' => array('OrdersProduct.product_id = Product.id')
					)
				)
			));
			
			$this->set(compact('order','number'));
			$this->set('title_for_layout','Order Detail');
		}
		else
		{
			$this->redirect('/err');
		}
		
	}
	
	public function cancel_order($order_number = null) {
		$this->autoRender = false;
		$user = $this->Auth->user();
		if($user)
		{
			$data_order = $this->Order->find('first',array(
				'conditions' => array(
					'Order.order_number' => $order_number,
					'Order.pay_status' => null,
					'Order.user_id' => $user['id']
				)
			));
			if(!empty($data_order))
			{
				$this->Order->id = $data_order['Order']['id'];	
				
				if ($this->Order->delete()) {
					$this->Session->setFlash('The order has been canceled.','default',array('class'=>'alert alert-success'),'mss_order');
				} else {
					$this->Session->setFlash('The order could not be canceled. Please, try again.','default',array('class'=>'alert alert-danger'),'mss_order');
				}
				return $this->redirect('/tracking');
			}
			else
			{
				$this->redirect('/err');
			}
		}
		else
		{
			 $this->redirect(ADMIN_ROOT_URL . 'login?return_url=' . urlencode(RETURN_URL));
		}
	}
}


