<?php

App::uses('Component', 'Controller');
//App::uses('Product','Model');
App::uses('Country', 'Model');
App::import(array('Security'));
App::uses('Combo', 'Model');
App::uses('Combovalue','Model');
App::uses('Param','Model');
class ToolComponent extends Component
{
    //public $name = 'Product';
    public function stripUnicode($string)
    {
        $unicode = array(
            'a' => 'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ|Đ',
            'e' => 'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'ì|í|ị|ỉ|ĩ|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ',
            'y' => 'ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ'
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $string = preg_replace("/($uni)/", $nonUnicode, $string);
        }
        return $string;
        //exit;
    }

	
    public function substr($string, $start, $length) {
        $cut = mb_substr($string, $start, $length, 'UTF-8');
        $str_length = strlen($string);
        if ($str_length > $length) {
            $cut .= '...';
        }
        return $cut;
    }
    public function slug($string, $character = '-')
    {
        $string = $this->stripUnicode($string);
        APP::uses('Inflector', 'Utility');
        $string = Inflector::slug($string, $character);
        return strtolower($string);
    }

    public function generate_code()
    {
        $rand_number = rand(1000000, 9999999);
        $code = md5($rand_number);
        return $code;
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function get_price($price = null, $discount = null)
    {
        $result_price = $price - $price * ($discount / 100);
        return $result_price;
    }

    public function test()
    {
        /*      $productObj = new Product();
                $data = $productObj->query('SELECT * FROM products');*/

        $dtObj = new Product();
        $data = $dtObj->find('all', array(
            'conditions' => array(
                'Product.id' => 13
            )
        ));

        return $data;
    }

	
	public function country_info($currency){
		$dtObj = new Country();
		$data = $dtObj -> find('first',array(
            'conditions' => array(
                'Country.currency' => $currency
            ),
			'fields'=>array('id','country','rate','prefix'),
			'recursive' => '-1'
        ));
		return $data;
	}
    /* format symbol */
    public function format_currency($price = null, $courrency = null)
    {

        $a = new \NumberFormatter("it-IT", \NumberFormatter::CURRENCY);
        $result_price = $a->formatCurrency($price, $courrency); // outputs $ 12.345,00 and it is formatted using the italian notation (comma as decimal separator)
        return $result_price;
    }

    public function number_format($price = null)
    {
        $num = number_format($price, 2, ',', '.');
        return $num;
    }

    public function price($amount = null, $to_currency = null, $discount = null)
    {
        $dtObj = new Country();
        $data = $dtObj->find('first', array(
            'conditions' => array(
                'Country.currency' => $to_currency
            )
        ));
        $grand_price = "";
        if ($data) {
            $rate = $data['Country']['rate'];
            $grand_price = $amount * $rate;   // menh  gia da quy doi
            if ($discount > 0) {
                $grand_price = $this->get_price($grand_price, $discount);
            }
            //$format_price = $this->format_currency($grand_price,$to_currency);

        }


        return $grand_price;

    }

    public function ship_cost($amount = null, $to_currency = null)
    {

        $dtObj = new Country();
        $data = $dtObj->find('first', array(
            'conditions' => array(
                'Country.currency' => $to_currency
            )
        ));
        $grand_price = "";
        if ($data) {
            $rate = $data['Country']['rate'];
            $grand_price = $amount * $rate;   // menh  gia da quy doi

        }

        return $grand_price;

    }
	
	public function combo($product_id,$category_id,$quantity)
    {
        $percent_combo  = 0;
        $dtObj = new Combo();

        if($product_id != null && $category_id == null)
        {
            $combo_of_product = $dtObj -> find('first',array(
                'conditions' => array('Combo.product_id' => $product_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
            $combo_quantity = $combo_of_product['Combo']['quantity'];
            if($quantity >= $combo_quantity)
            {
                $percent_combo = $combo_of_product['Combo']['percent'];
            }
        }
        elseif($category_id != null && $product_id == null)
        {
            $combo_of_category = $dtObj -> find('first',array(
                'conditions' => array('Combo.category_id' => $category_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
            $combo_quantity = $combo_of_category['Combo']['quantity'];
            if($quantity >= $combo_quantity)
            {
                $percent_combo = $combo_of_category['Combo']['percent'];
            }
        }
        elseif($product_id != null && $category_id != null)
        {
            /* echo 'fasdfasdfasdf';exit;
             echo $product_id; echo $category_id;exit;*/
            $combo_of_product = $dtObj -> find('first',array(
                'conditions' => array('Combo.product_id' => $product_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
            $percent_of_pro = $combo_of_product['Combo']['percent'];
            $qty_of_pro = $combo_of_product['Combo']['quantity'];


            $combo_of_category = $dtObj -> find('first',array(
                'conditions' => array('Combo.category_id' => $category_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
            $percent_of_cat = $combo_of_category['Combo']['percent'];
            $qty_of_cat = $combo_of_category['Combo']['quantity'];
            if($quantity >= $qty_of_pro && $quantity >= $qty_of_cat)
            {
                if($percent_of_pro <= $percent_of_cat)
                {
                    $percent_combo = $percent_of_pro;
                }
                else
                {
                    $percent_combo = $percent_of_cat;
                }
            }
            elseif($quantity >= $qty_of_pro && $quantity <= $qty_of_cat)
            {
                $percent_combo = $percent_of_pro;
            }
            else if($quantity <= $qty_of_pro && $quantity >=$qty_of_cat)
            {
                $percent_combo = $percent_of_cat;
            }
        }

        return $percent_combo;
    }
	public function get_percent($quantity)
    {
        $dtObj = new Combovalue();
        $dt = $dtObj->find('first', array('conditions' => array(
                'from_quantity <=' => $quantity,
                'to_quantity >=' => $quantity,
                'status' => 1)));
		if($dt)
		{
			$percent = $dt['Combovalue']['percent'];
		}
		else
		{
			$percent = 0;
		}
        return $percent;
    }
	public function get_thumbs($image = null)
    {
        $thumbs = str_replace("/uploads/images","/uploads/_thumbs/Images",$image);
        return $thumbs;
    }
	public function between($date,$start,$end,$timezone="Asia/Ho_Chi_Minh"){
        date_default_timezone_set($timezone);
        if($date >= $start && $date <= $end)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	public function params($type, $name){
        $dtObj = new Param();
        $params = $dtObj -> find('first',array(
            'conditions' => array(
                'status' => 1,
                'type' => $type,
                'name' => $name
            ),
            'recursive' => '-1'
        ));
        return $params;
    }
}
