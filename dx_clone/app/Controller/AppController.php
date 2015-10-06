<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array(
        'Tool',
        'RequestHandler',
        'Session',
        'DebugKit.Toolbar',
        'Captcha',
        'Auth' => array( //them
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login',
				'manager' => false,
				'admin' => false),
			'authError' => 'Bạn cần phải đăng nhập để tiếp tục.',
			'flash' => array(
				'element' => 'default',
				'key' => 'auth',
				'params' => array('class' => 'alert alert-danger')),
			'loginRedirect' => array('action' => 'index'),
			'logoutAction' => array('controller' => 'users', 'action' => 'logout'),
			'authError' => "Bạn chưa đăng nhập hoặc không đủ quyền truy cập vào khu vực này!",
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email')
				)
			)
		),
	);

    public $helpers = array('Tool');

    public function user_login()
    { //them
        $user = $this->Auth->user();
        if ($user) {
            return $user;
        } else {
            $user = null;
        }
        return $user;
    }

    public function beforeFilter()
    {
        if ($this->Auth->loggedIn()) { //them
            $user_info = $this->Auth->user();
            $this->set('user_info', $user_info);
			if(!($this->isAuthorized($user_info))){
				$this->redirect('/test/maintenance');
			}
        }
        if (isset($this->request->params['prefix']) && $this->request->params['prefix'] ==
            'admin') {
            $this->theme = 'Admin';
        } else {
            $this->Auth->allow();
            $this->theme = 'Volga';
			$maintenance = $this->maintenance();
			//echo $maintenance;
			if($maintenance == 1)
			{
				if ($this->Auth->loggedIn()) { //them
					$user_info1 = $this->Auth->user();
					if(!($this->isAuthorized($user_info1))){
						$this->redirect('/test/maintenance');
					}
				}else
				{
					$this->redirect('/err');
				}
			}
			
        }
        #======= get _menu ==========#
        $categories  = $this->load_main_categories();
        $this->set('list_categories', $categories);
		$support = $this->get_suport();
		$this->set('supports',$support);
        #====== get slides ==========#
        $slides = $this->get_slide();
        $this->set('slides', $slides);

        #======================= Lay thong tin tien te viet nam ======================#
        $ck_currency_vnd = $this->Session->check('currency_vn');
        if ($ck_currency_vnd == false) {
            $currency_vn = $this->get_country_info("VN");
            $this->Session->write('currency_vn', $currency_vn);
        }
        $currency_vn = $this->Session->read('currency_vn');
        //pr($currency_vn);
        $this->set('currency_vn', $currency_vn);

        #========================= Check xem nguoi dung thuoc nuoc nao va lay ty gia de tinh gia ship =============#

        $check_destination = $this->Session->check('Country');
        //echo $check_destination;exit;


        if ($check_destination == false) {
           // $ip = $this->request->clientIp(); //"218.100.10.0";////$_SERVER['REMOTE_ADDR']; //"24.232.255.255";    //
            //echo $ip;exit;
            $ip = "104.236.147.107"; // fix Ip cua USA de test
			//$ip = "94.229.76.197";
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
			if(!empty($details))
			{
				$destination = $details->country;
			}
			else
			{
				$destination = DEFAULT_CURRENCY;
			}         
            $country_info = $this->get_country_info($destination);         
            $this->Session->write('Country', $country_info);
        }
        $country_info = $this->Session->read('Country');
        $destination = $country_info['Country']['code'];
        $smallpacket = json_encode($this->smallpacket());
        $parcel = json_encode($this->parcel($destination));
        setcookie("smallpacket", $smallpacket, time() + 5184000, '/', PATH_COOKIE, 0);
        setcookie("parcel", $parcel, time() + 5184000, '/', PATH_COOKIE, 0);
        $this->set('country_info', $country_info);
        #========= Check xem dang dung loai tien gi  =======#
        $check_currency = $this->Session->check('Currency');
        if ($check_currency == false) {
			
            $ck = $this->check_currency_support_for_paypal($country_info['Country']['currency']);
            if($ck)
            {
                $currency = $this->get_cur($country_info['Country']['currency']);
            }
            else
            {
                $currency = $this->get_cur(DEFAULT_CURRENCY);
            }
            $this->Session->write('Currency', $currency);
			$this->set('currency', $currency);
        } else {
            $currency = $this->Session->read('Currency');
            $this->set('currency', $currency);
        }

        $this->set('user', $this->get_user());
    }
	public function check_currency_support_for_paypal($currency)
	{
		$arr_currency = GlobalVar::read('currency_support_for_paypal');
		if(in_array($currency, $arr_currency))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function isAuthorized($user)
	{
		if(isset($this->request->params['prefix']) && $this->request->params['prefix'] === 'admin')
		{
			if($user['Group']['id'] != 1)
			{
				return false;
			}
		}
		// $this->redirect(array('controller' => 'users', 'action' => 'login', 'admin' => false));
		return true;
	}
	
    public function get_user()
    {
        if ($this->Auth->loggedIn()) {
            $user = $this->Auth->user();
        } else {
            $user = null;
        }
        return $user;
    }

    public function get_slide()
    {
        $slides = Cache::read('cache_slide', 'short');
        //pr($slides);exit;
        if (!$slides) {
            $this->loadModel('Slide');
            $slides = $this->Slide->find('all', array('conditions' => array('publish' => 1,
                        'type' => 0)));
            Cache::write('cache_slide', $slides, 'short');
        }
        return $slides;
    }

    public function smallpacket()
    {
        $this->loadModel('Smallpacket');
        $smallpacket = $this->Smallpacket->find('all', array('recursive' => -1));
        return $smallpacket;
    }
    public function parcel($destination = null)
    {
        $this->loadModel('Parcel');
        $parcel = $this->Parcel->find('first', array('recursive' => -1, 'conditions' =>
                array('code' => $destination)));
        return $parcel;
    }

    public function get_cur($currency = null)
    {

        $this->loadModel('Country');
        $data = $this->Country->find('first', array('conditions' => array('Country.currency' =>
                    $currency)));
        $arr_currency = array(
            'rate' => $data['Country']['rate'],
            'code' => $data['Country']['currency'],
            'flag' => $data['Country']['flag'],
            'prefix' => $data['Country']['prefix']);
        return $arr_currency;

    }


    public function get_country_info($destination)
    {
        $this->loadModel('Country');
        $country_info = $this->Country->find('first', array('recursive' => -1,
                'conditions' => array('code' => $destination)));
        return $country_info;
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
        $type = 2;
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
			$dt = $this->Parcel->find('first', array('conditions' => array('code' => $to_country_code,
                            'status' => 1,'type' => $type)));
			$first_weight = $dt['Parcel']['first_weight']; #cuoc goi hang < 500gr
			$next_weight = $dt['Parcel']['next_weight']; #cuoc 500gr tiep theo
			if ($weight <= 500) {
				$shipping_cost = $first_weight;
			} elseif ($weight > 500) {
					$shipping_cost = $first_weight + $next_weight * (ceil($weight / 500) - 1);
			}
		}
       /*  switch ($type) {
            case 1:
               
                break;
            case 2:
               
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
        $dt = $this->Smallpacket->find('first', array('conditions' => array(
                'to_weight <=' => $weight,
                'from_weight >=' => $weight,
                'status' => 1)));
        //pr($dt);exit;
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
        return $cost;
    }
    #============= end tinh toan cuoc shipping ================#
    public function curl($url)
    {
        $ch = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        // display file
        return $file_contents;
    }
    public function load_main_categories()
    {
        $this->loadModel('Category');
        $categories = $this->Category->find('threaded',
            array(
                'recursive' => -1,
                'fields' => array('id', 'slug', 'name','parent_id'),
                'order' => array('Category.lft'=>'asc'),
				'conditions' => array('status' => 1,'main' => 1)
            )
        );
        return $categories;
    }
    
    public function load_all_categories()
    {
        $this->loadModel('Category');
        $categories = $this->Category->find('threaded',
            array(
                'recursive' => -1,
                'fields' => array('id', 'slug', 'name','parent_id'),
                'order' => array('Category.lft'=>'asc'),
				'conditions' => array('status' => 1)
            )
        );
        return $categories;
    }
	public function UploadFile($folder,$model,$name){
		$allow_ext = array('jpg', 'png', 'jpeg','pjpeg','PNG');
		
        $file = new File($this->request->data[$model][$name]['tmp_name']);
        $arr = explode('.',$this->request->data[$model][$name]['name']);
        $ext = end($arr);
		if(in_array($ext, $allow_ext))
		{
			$filename = $this->request->data[$model]['slug'].'.'.$ext;
			if($file->copy(APP . 'webroot/uploads/' .$folder . '/' . $filename))
			{
				$result = array(
					'filename' => $filename,
					'status' => true
				);
			}
			else
			{
				$result = array(
					'status' => false
				);
			}
		}
        else
		{
			$result = array(
				'status' => false
			);
		}
        return $result;
    } 
    public function param_value($type,$name){
		$paypal = $this->Param->find('first',array(
			'conditions' => array(
				'Param.type' => $type,
				'Param.name' => $name,
				'Param.status' => 1
			),
			'recursive' => -1
		));
		return $paypal;
	}
	
	public function changeStatus($arrayID = null,$model = null,$table = null,$field = null,$value){
		$this->loadModel($model);
		if (is_array($arrayID))
		{	
			$parameters = implode(',',$arrayID);
			$this->$model->query("UPDATE $table SET $field = $value WHERE id in ( $parameters )");
		}
		else if(is_numeric($arrayID)) {
			$this->$model->query("UPDATE $table SET $field = $value WHERE id = $arrayID");
		}
	}
	public function get_suport()
    {
		//Configure::write('debug',2);
		$this->loadModel('Param');
		$params = Cache::read('cache_support', 'short');
		if(!$params)
		{
			$params = $this->Param->find('all',array(
				'conditions' => array(
					'Param.type' => 'SUPPORT',
					'Param.status' => 1
				),
				'recursive' => '-1'
			));
			Cache::write('cache_support', $params, 'short');
		} 
		//pr($params);exit;
		foreach($params as $item)
		{
			$data[$item['Param']['name']] = array(
				'name' => $item['Param']['name'],
				'value' => $item['Param']['value']
			);
		}
		return $data;
    }
	
	public function maintenance()
	{
		$resutl = 0;
		//$this->autoRender = false;
		$this->loadModel('Param');
		$params = $this->Param->find('first',array(
				'conditions' => array(
					'Param.type' => 'Sys',
					'Param.status' => 1,
					'Param.name' => 'maintenance'
				),
				'recursive' => '-1'
		));
		if($params)
		{
			$resutl = $params['Param']['value'];
		}
		return $resutl;
	}
}
