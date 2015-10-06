<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP Helper
 * @author Loi
 */
App::uses('Product','Model');
App::uses('Country','Model');
App::uses('Smallpacket','Model');
App::uses('Parcel','Model');
App::uses('Combo','Model');
App::uses('Combovalue','Model');
class ToolHelper extends AppHelper {

    public function substr($string, $start, $length) {
        $cut = mb_substr($string, $start, $length, 'UTF-8');
        $str_length = strlen($string);
        if ($str_length > $length) {
            $cut .= '...';
        }
        return $cut;
    }

    public function loi_public($status) {
        if ($status == 1) {
            $public = 'Hoạt động';
        } else {
            $public = 'Không hoạt động';
        }
        return $public;
    }

    public function loi_status($status) {
        if ($status == 1) {
            $public = 'Đã kiểm duyệt';
        } else {
            $public = 'Chưa kiểm duyệt';
        }
        return $public;
    }

    public function loi_radio_checked($check, $in) {
        if ($check == $in) {
            echo 'checked';
        }
    }

   
    public function status($status) {
        switch ($status) {
            case 'type':
                $arr = array(
                    0 => 'Sản phẩm',
                    1 => 'Tin tức'
                );
                break;
            case 'status' :
                $arr = array(
                    0 => 'Không hoạt động',
                    1 => 'Hoạt động'
                );
                break;
            case 'menu' :
                $arr = array(
                    0 => 'Không hiện trên trang chủ',
                    1 => 'Hiển thị trên trang chủ'
                );
                break;
             case 'search' :
                $arr = array(
                    0 => 'Không cho tìm kiếm',
                    1 => 'Cho phép tìm kiếm'
                );
                break;
            case 'status1' :
                $arr = array(
                    0 => 'Không',
                    1 => 'Có'
                );
                break;
            case 'publish' :
                $arr = array(
                    0 => 'Hết hàng',
                    1 => 'Còn hàng'
                );
                break;

        
        }
        return $arr;
    }

    public function get_price($price = null , $discount = null){
        $result_price = $price - $price * ($discount / 100) ;
        return $result_price;
    }
    public function test()
    {
        /*      $productObj = new Product();
                $data = $productObj->query('SELECT * FROM products');*/

        $dtObj = new Product();
        $data = $dtObj -> find('all',array(
            'conditions' => array(
                'Product.id' => 13
            )
        ));

        return $data;
    }



    /* format symbol */
    public function format_currency($price = null ,  $courrency = null){
        if($courrency == null)
        {
            $courrency = "USD";
        }
        $a = new \NumberFormatter("it-IT", \NumberFormatter::CURRENCY);
        $result_price =  $a->formatCurrency($price, $courrency) ; // outputs $ 12.345,00 and it is formatted using the italian notation (comma as decimal separator)
        return $result_price;
    }

    public function number_format($price = null)
    {
        $num = number_format($price,2,',','.');
        return $num;
    }
    public function price($amount = null , $to_currency = null , $discount = null ,$quantity = 1){
        if($to_currency == null)
        {
            $to_currency = "USD";
        }
        $dtObj = new Country();
        $data = $dtObj -> find('first',array(
            'conditions' => array(
                'Country.currency' => $to_currency
            )
        ));
        $grand_price = "";
        if($data)
        {
            $rate = $data['Country']['rate'];
            $grand_price = $amount * $rate * $quantity;   // menh  gia da quy doi
            if($discount > 0)
            {
                $grand_price = $this->get_price($grand_price , $discount);
            }
          //  $format_price = $this->format_currency($grand_price,$to_currency);

        }

        return $grand_price;

    }



    public function cost($amount = null , $to_currency = null){
        if($to_currency == null)
        {
            $to_currency = "USD";
        }
        $dtObj = new Country();
        $data = $dtObj -> find('first',array(
            'conditions' => array(
                'Country.currency' => $to_currency
            )
        ));
        $grand_price = "";
        if($data)
        {
            $rate = $data['Country']['rate'];
            $grand_price = $amount * $rate  ;   // menh  gia da quy doi

        }

        return $grand_price;

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
    public function total_price($amount = null , $to_currency = null , $discount = null ,$quantity = 1){
        if($to_currency == null)
        {
            $to_currency = "USD";
        }
        $dtObj = new Country();
        $data = $dtObj -> find('first',array(
            'conditions' => array(
                'Country.currency' => $to_currency
            )
        ));
        $grand_price = "";
        if($data)
        {
            $rate = $data['Country']['rate'];
            $grand_price = $amount * $rate * $quantity;   // menh  gia da quy doi
            if($discount > 0)
            {
                $grand_price = $this->get_price($grand_price , $discount);
            }

        }
        return $grand_price;

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
       // $this->loadModel('Smallpacket');
       // $this->loadModel('Parcel');
        $dt = array();
        $shipping_cost = "";
        switch ($type) {
            case 1:
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
            case 2:
                $dtObj = new Parcel();
                $dt = $dtObj->find('first', array('conditions' => array('code' => $to_country_code,
                            'status' => 1)));
                           
                $first_weight = $dt['Parcel']['first_weight']; #cuoc goi hang < 500gr
                $next_weight = $dt['Parcel']['next_weight']; #cuoc 500gr tiep theo
                if ($weight <= 500) {
                    $shipping_cost = $first_weight;
                } else
                    if ($weight > 500) {
                        $shipping_cost = $first_weight + $next_weight * (ceil($weight / 500) - 1);
                    }
                //echo $shipping_cost;
                break;
            default:
                echo 'khong tm thay gi';
                break;
        }
        return $shipping_cost;
    }


    public function get_small_cost($weight, $area_code)
    {
        $dtObj = new Smallpacket();
        $dt = $dtObj->find('first', array('conditions' => array(
                'to_weight <=' => $weight,
                'from_weight >=' => $weight,
                'status' => 1)));
        $cost = "";
       // echo $area_code ;exit;
        
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




	public function get_thumbs($image = null)
	{
        $thumbs = str_replace("/uploads/images","/uploads/_thumbs/Images",$image);
       return $thumbs;
	}
    
    
    public function RecursiveLeftCategories($array = array()) {
        //pr($array);exit;
        if (count($array)) {
            foreach ($array as $vals) {
				echo '<li class="inactive parent">';
				echo '<span class="opener">&#43;</span><a href="/category/'.$vals['Category']['slug'].'.html">'.$vals['Category']['name'].'</a>'. "\n";
				if (count($vals['children']) > 0) {
					echo '<ul class="submenu level-1 ">';
					   $this->RecursiveLeftCategories($vals['children']); 
					echo '</ul>';
				}
				echo '</li>';
            }
			
        }
    }
	
    public function RecursiveMainCategories($array = array(),$type = null){
		if($type == "desktop")
		{
//			pr($array);exit;
			if (count($array)) {
				foreach ($array as $vals) {
					echo '<li class="inactive parent deeper">';
						 echo '<a href="/category/'.$vals['Category']['slug'].'.html">'.$vals['Category']['name'].'</a>'. "\n";
						if (count($vals['children']) > 0) {
							echo '<ul class="submenu sublevel-1 ">';
							   $this->RecursiveMainCategories($vals['children'],'desktop'); 
							echo '</ul>';
						} 
					echo '</li>';
					
				}
			}
		}
		else if($type == "mobile")
		{
			if (count($array)) {
				foreach ($array as $vals) {
					echo '<li class="inactive">';
						 echo '<a href="/category/'.$vals['Category']['slug'].'.html">'.$vals['Category']['name'].'</a>'. "\n";
						if (count($vals['children']) > 0) {
							echo '<ul class="mob-submenu mob-sublevel-1 ">';
							   $this->RecursiveMainCategories($vals['children'],'desktop'); 
							echo '</ul>';
						} 
					echo '</li>';
				}
			}
		}
		
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
	
    public function combo($product_id,$category_id,$quantity)
    {
        $percent_combo  = 0;
        $dtObj = new Combo();
		
        if($product_id != null && $category_id == null)
        {
			$percent_combo = $this->get_percent($quantity);
			//echo $percent_combo;exit;
           /*  $combo_of_product = $dtObj -> find('first',array(
                'conditions' => array('Combo.product_id' => $product_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
			
            $combo_quantity = $combo_of_product['Combo']['quantity'];
            if($quantity >= $combo_quantity)
            {
                $percent_combo = $combo_of_product['Combo']['percent'];
            } */
        }
        elseif($category_id != null && $product_id == null)
        {
			$percent_combo = $this->get_percent($quantity);
           /*  $combo_of_category = $dtObj -> find('first',array(
                'conditions' => array('Combo.category_id' => $category_id,'Combo.status' => 1),
                'recursive' => '-1'
            ));
			
            $combo_quantity = $combo_of_category['Combo']['quantity'];
            if($quantity >= $combo_quantity)
            {
                $percent_combo = $combo_of_category['Combo']['percent'];
            } */
        }
        elseif($product_id != null && $category_id != null)
        {
			$percent_combo = $this->get_percent($quantity);
           /* echo 'fasdfasdfasdf';exit;
            echo $product_id; echo $category_id;exit;*/
            /* $combo_of_product = $dtObj -> find('first',array(
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
            } */
        }

       return $percent_combo;
    }
    
}
