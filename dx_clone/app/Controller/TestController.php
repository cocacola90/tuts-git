<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::import('Vendor', 'Curl');
App::uses('AppController', 'Controller');
App::import('Vendor', 'facebook-php-sdk/autoload.php');
class TestController extends AppController
{
	/* public $helpers = array('Cache');
	public $cacheAction = array(
         'cache'  => array('callbacks' => true, 'duration' => 36000),
    );  */
    public function beforeFilter()
    {
		//parent::beforeFilter();
         $this->Auth->allow('importcsv','og','finance','am','cache','pay','user','maintenance','success','maintenancedemo','demo');

    }
	public function success()
	{
		$this->theme = "Volga";
		$this->layout = "error";
	}
	public function maintenance()
	{
		$this->layout = "maintenance";
	}
	
	public function maintenancedemo()
	{
		$resutl = 0;
		$this->autoRender = false;
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
	
	
	public function importcsv()
	{
		if($this->request->is('post')){
			$this->loadModel('Country');
			$save = true;
			if(!empty($this->request->data['Country']['file_csv']['name'])){
				$this->request->data['Country']['slug'] = 'CSV'.time();
				$result = $this->UploadFile('avatars','Country','file_csv');
				$save = true;
				if($result['status']==true){
					$filename = '/uploads/avatars/'.$result['filename'];
					$this->request->data['Country']['file_csv'] = $filename;
				}else{
					$this->Session->setFlash('Do not upload the photos!','default',array('class'=>'alert alert-info'));
					$save =false;
				}
			}else{
				unset($this->request->data['Country']['file_csv']);
			}
			if($save)
			{
				$csv = new parseCSV();
				$prefix_path = getcwd(). '/' . $filename;
				echo $prefix_path;
				$csv->auto($prefix_path);
				$data = $csv->data;
				
				pr($data);
			}
		}
	}
	
	public function UploadFile($folder,$model,$name){
		$allow_ext = array('jpg', 'png', 'jpeg','pjpeg','PNG','csv','xlsx');
		
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
	
	public function demo()
	{
		$this->autoRender = false;
		Configure::write('debug',2);
		$this->loadModel('Post');
		$data = $this->Post->find('all');
		//pr($data);
		
		foreach($data as $temp)
		{ 
			pr($temp['Post']);
		}
		
	}
	
	
	// public function pay(){
		// if ($this->request->is('post') || $this->request->is('put')) {
            // $firstName = urlencode($this->request->data['Order']['first_name']);
            // $lastName = urlencode($this->request->data['Order']['last_name']);
            // $creditCardType = urlencode($this->request->data['Order']['card_type']);
            // $creditCardNumber = urlencode($this->request->data['Order']['card_number']);
            // $expDateMonth = $this->request->data['Order']['month'];
            // $padDateMonth = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));
            // $expDateYear = urlencode($this->request->data['Order']['year']);
            // $cvv2Number = urlencode($this->request->data['Order']['cvv2']);
            // $amount = urlencode($this->request->data['Order']['amount']);
            // $nvp = '&PAYMENTACTION=Sale';
            // $nvp .= '&AMT='.$amount;
            // $nvp .= '&CREDITCARDTYPE='.$creditCardType;
            // $nvp .= '&ACCT='.$creditCardNumber;
            // $nvp .= '&CVV2='.$cvv2Number;
            // $nvp .= '&EXPDATE='.$padDateMonth.$expDateYear;
            // $nvp .= '&FIRSTNAME='.$firstName;
            // $nvp .= '&LASTNAME='.$lastName;
            // $nvp .= '&COUNTRYCODE=US&CURRENCYCODE=USD';

            // $response = $this->PaypalWPP->wpp_hash('DoDirectPayment', $nvp);
            // if ($response['ACK'] == 'Success') {
                // $this->Session->setFlash('Payment Successful');
            // } else {
                // $this->Session->setFlash('Payment Failed');
            // }
            // debug($response);
        // }
	// }
	
	
	
    // public function index()
    // {
        // $this->theme = "Dx";
        // $this->autoRender = false;

    // }
	// public function cache()
	// {
		// $this->layout = 'index';
		// $this->loadModel('Smallpacket');
		// $weight = 423;
		// $product_general = Cache::read('product_general_query_2', 'short');
        // if (!$product_general) {
            // echo("test");
			
            // $product_general = $this->Smallpacket->find('first',array(
				// 'conditions' => array(
					// 'to_weight <=' => $weight,
					// 'from_weight >=' => $weight,
					// 'status' => 1
				// )
			// ));
            // Cache::write('product_general_query_2', $product_general, 'short');
        // }

        // $this->set('product_general', $product_general);
		
		// /* $dt = $this->Smallpacket->find('first',array(
			// 'conditions' => array(
				// 'to_weight <=' => $weight,
				// 'from_weight >=' => $weight,
				// 'status' => 1
			// )
		// ));
		// $this->set('dt',$dt); */
	// }
	

	
	
	// public function og(){
		// $this->autoRender = false;
		// $curl  = new cURL();
		// $link = 'http://www.kapanlagi.com/showbiz/selebriti/dipeluk-musdalifah-ultah-nassar-dipenuhi-air-mata-bahagia-74fd71.html';
		// $html = $curl->get($link);
		// echo $html ;exit;
		// $result = array();
		// if(preg_match('#<meta property="fb:app_id" content="(.*?)" />#is',$html, $match))
		// {
			
			// $result['app_id'] = $match[1];
		// }
		// if(preg_match('#<meta property="fb:page_id" content="(.*?)" />#is',$html, $match))
		// {
			// $result['page_id'] = $match[1];
		// }
		// if(preg_match('#<meta property="og:site_name" content="(.*?)" />#is',$html, $match))
		// {
			// $result['site_name'] = $match[1];
		// }
				// if(preg_match('#<meta property="og:image" content="(.*?)" />#is',$html, $match))
		// {
			// $result['image'] = $match[1];
		// }
				// if(preg_match('#<meta property="og:title" content="(.*?)" />#is',$html, $match))
		// {
			// $result['title'] = $match[1];
		// }
				// if(preg_match('#<meta property="og:url" content="(.*?)" />#is',$html, $match))
		// {
			// $result['url'] = $match[1];
		// }
				// if(preg_match('#<meta property="og:type" content="(.*?)" />#is',$html, $match))
		// {
			// $result['type'] = $match[1];
		// }
		// pr($result);
	// }
	
	// public function finance()
	// {
		// $this->autoRender = false;
		// $url = "http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json";
		// $result  = file_get_contents($url);
		// $data = json_decode($result,true);
		// pr($data);
		
		
	// }
	
	// public function am()
	// {
		// $this->autoRender = false;
		// $weight = 10000;
		// $type = 1;
		// $to_country_code = "AR";
		// $result_parcel = $this->get_amount_shipping($weight, 2, $to_country_code);   #ship toi arentina , loai parcel;
		// $result_small = $this->get_amount_shipping($weight, 1, 4);                   #ship toi chau my , loai smallpacket
		// echo $result_parcel . '------------';
		// echo $result_small;
	// }
	
	// public function get_amount_shipping($weight = null, $type = null, $to_country_code = null)
	// {
		
		// /* $weight = 550;
		// $type = 2;
		// $to_country_code = "AR"; */
		// $this->loadModel('Smallpacket');
		// $this->loadModel('Parcel');
		// $dt = array();
		// $shipping_cost = "";
		// switch($type)
		// {
			// case 1 :
				// if($weight <= 2000)
				// {
					// $shipping_cost = $this->get_small_cost($weight, $to_country_code);
				// }
				// elseif($weight >2000){
					// $last_packet = $weight % 2000 ;
					// $first_packet =  floor($weight / 2000);
					// echo $first_packet; exit;
					// $cost_last_packet = $this->get_small_cost($last_packet, $to_country_code);
					// $cost_first_packet = $this->get_small_cost(2000, $to_country_code);
					// $shipping_cost = ($first_packet * $cost_first_packet) + $cost_last_packet;
				// }
				// break;
			// case 2 :
				// $dt = $this->Parcel->find('first',array(
					// 'conditions' => array(
						// 'code' => $to_country_code,
						// 'status' => 1
					// )
				// ));
				// $first_weight = $dt['Parcel']['first_weight'];  #cuoc goi hang < 500gr
				// $next_weight = $dt['Parcel']['next_weight']; #cuoc 500gr tiep theo
				// if($weight <= 500)
				// {
					// $shipping_cost = $first_weight;
				// }else if($weight > 500)
				// {
					// $shipping_cost = $first_weight + $next_weight * (ceil( $weight / 500) - 1);
				// }
				// echo $shipping_cost;
				// break;
			// default:
				// echo 'khong tm thay gi';
				// break;
		// }
		// return $shipping_cost;
	// }
	
	
	// public function get_small_cost($weight , $area_code)
	// {
		// $this->loadModel('Smallpacket');
		// $dt = $this->Smallpacket->find('first',array(
			// 'conditions' => array(
				// 'to_weight <=' => $weight,
				// 'from_weight >=' => $weight,
				// 'status' => 1
			// )
		// ));
		// pr($dt);exit;
		// if($area_code == 1){
			// $cost = $dt['Smallpacket']['asia'];
		// }
		// elseif($area_code == 2)
		// {
			// $cost = $dt['Smallpacket']['europe'];
		// }
		// elseif($area_code == 3)
		// {
			// $cost = $dt['Smallpacket']['africa'];
		// }
		// elseif($area_code == 4)
		// {
			// $cost = $dt['Smallpacket']['america'];
		// }
		// elseif($area_code == 5)
		// {
			// $cost = $dt['Smallpacket']['appu'];
		// }
		// return $cost;	;
	// }

    // public function format(){
        // $this->autoRender = false;
        // $a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
        // echo $a->format(12345.12345) . "<br>"; // outputs 12.345,12
        // $a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
        // $a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 100); // by default some locales got max 2 fraction digits, that is probably not what you want
        // echo $a->format(12345.12345) . "<br>"; // outputs 12.345,12345


        // echo $a->formatCurrency(12345, "USD") . "<br>"; // outputs $ 12.345,00 and it is formatted using the italian notation (comma as decimal separator)


        // echo $a->format(12345.12345) . "<br>"; // outputs €12.345,12

        // $f = new NumberFormatter("vi", NumberFormatter::SPELLOUT);
        // echo $f->format(123456);

        // echo $a -> parseCurrency(12348, "VND");

    // }

    // public function demo()
    // {
		// $this->layout = "view_item";
    // }

    // public function asdf(){
        // session_start();

        // $app_id = '862963927088945';
        // $app_secret = 'a12504ec2fa36c4693f3d0045e1a0dca';
        // $redirect_url = 'http://tinchandong.com/test/';

        // FacebookSession::setDefaultApplication($app_id, $app_secret);
        // $helper = new FacebookRedirectLoginHelper($redirect_url);
        // $sess = $helper->getSessionFromRedirect();
        // if (isset($sess)) {
            // $request = new FacebookRequest($sess, 'GET', '/me');
            // $reponse = $request->execute();
            // $graph = $reponse->getGraphObject(GraphUser::classname());
            // $name = $graph->getName();
            // echo "hi! $name";
        // } else {
            // echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook';
        // }
    // }
	// public function sd(){
		// $this->autoRender = false;
		// $a = "/uploads/images/samsung/11.JPG";
		// $t = str_replace("/uploads/images","/uploads/_thumbs/Images",$a);
		// echo $t;
	// }
	
	// public function user()
	// {
		
	// }
	// public function cart()
	// {
	   // $this->theme = "Volga";
	// }
	// public function shop()
	// {
		// $this->layout = "view_item";
	// }
	// public function form(){
		// $this->theme = "Admin";
		// $this->layout = "admin_login";
	// }
	
	// public function order_detail(){
			// $this->layout = "view_item";
	// }
	
    
    // public function volga(){
       
    // }
	// public function success()
	// {
		// $this->layout = "error";
	// }
	// public function slide(){
		
	// }
	// public function slideshow(){
		
	// }
	
	// public function dev(){
		
	// }
    // public function get_suport()
    // {
		// Configure::write('debug',2);
        // $this->loadModel('Param');
        // $this->autoRender = false;
		// $currency = GlobalVar::read('status');
		// pr($currency);
    	// /* $params = $this->Param->find('all',array(
			// 'conditions' => array(
				// 'Param.type' => 'SUPPORT',
				// 'Param.status' => 1
			// )
		// ));
		// pr($params);
		// foreach($params as $item)
		// {
			// $data[$item['Param']['name']] = array(
				// 'name' => $item['Param']['name'],
				// 'value' => $item['Param']['value']
			// );
		// }
		// pr($data); */
    // }
}