<?php

    if(isset($currency)){
        $to_currency = $currency['code'];
        $rate =  $currency['rate'];
    }else
    {
        $to_currency = "";
        $rate = 1;
    }
	$coupon = $this->Session->read('Coupon');
	if($coupon)
	{
		$coupon_percent = $coupon['coupon_discount'];

	}
	else
	{
		$coupon_percent = 0;
	}

?>
<div class="banner-breadcrumb">
	<div class="container">
		<div class="inner-wrap">
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
					<img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					<li><a href="#" class="pathway">Cart</a></li>
					<span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li class="active">Shopping cart</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="main-wrap">
	<div id="main-site" class="container">
		<div class="inner-wrap">
			<div class="row-fluid">
				<div class="span12 main-column">
					
					<div id="system-message-container">
					</div>
					<div id="ProOPC" class="cart-view proopc-row">
						<div class="clear">
						</div>
						<div class="proopc-row">
							<div class="cart-promo-mod last-mod">
								<div class="moduletable ">
									<div class="mods">
										<div class="bghelper">
											<div class="modulcontent">
												<div class="custom">
													<img src="/theme/Volga/images/banners/cart-promo.png" alt="Cart Promo" width="980" height="123"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="proopc-system-message">
						<?php echo $this->Session->flash('cart');?>
						</div>
						<div class="proopc-finalpage">
							<div class="proopc-row">
								<h1 class="cart-page-title">Cart&nbsp;</h1>
							</div>
							<div class="proopc-row">
								<div class="proopc-login-message-cont">
									
								</div>
								<div class="proopc-continue-link">
									<a class="continue_link" href="/"><span>Continue Shopping</span></a>
								</div>
							</div>
							<div id="proopc-pricelist">
                              <?php echo $this->Form->create('Product',array('url'=>'/products/update_once'));?>
								<fieldset>
									<table class="cart-summary proopc-table-striped">
									<thead>
									<tr>
										<th class="col-name" align="left">
											Name
										</th>
										<th class="col-sku" align="left">
											Weight
										</th>
										<th class="col-price" align="center">
											Price
										</th>
										<th class="col-qty" align="right">
											Quantity / Update
										</th>
										<th class="col-discount" align="right">
											Discount
										</th>
										<th class="col-total" align="right">
											Total
										</th>
									</tr>
									</thead>
									<tbody>
                                	<?php
                    				$total = 0;
                    				$weight = 0;
                    				foreach ($cart as $item): 
                    					foreach($item as $key => $value):
                    					$data=$this->requestAction(array('controller'=>'products','action'=>'get_info',$value['slug']));
                    				?>
									<tr valign="top" class="sectiontableentry1 cart-p-list">
										<td class="col-name" align="left">
											<div class="proopc-row">
												<div class="cart-images">
                                                  <?php echo $this->Html->image($data['Product']['thumbnail'],array('alt'=>$data['Product']['name'],'width'=>'88','height'=>'88'));?>
												
												</div>
												<div class="cart-product-description">
													<div>
														<?php
                            								echo $this->Html->link(
                            									$this->Tool->substr($data['Product']['name'],0,30),
                            									array(
                            										'controller' => 'products',
                            										'action' => 'view_product',
                            										'category' => $data['Category']['slug'],
                            										'product' => $data['Product']['slug'],
                            										'id' => $data['Product']['id'],
                            										'ext' => 'html'
                            									),
                            									array(
                            										'title' => $data['Product']['name']
                            									)
                            								);
                            								?>
                                                        <?php $detail = json_decode($value['detail'],true);?>   
														<div class="vm-customfield-cart">
															<span class="product-field-type-S">Color
															<p>
																<?php echo $detail['color'];?>
															</p>
															</span>
                                                           <!-- <br/><span class="product-field-type-S">Shipping Cost
															<p>
																<?php 
                                                                    if($detail['ship_type'] == 1)
                                                                    {
                                                                        echo 'Small packet';
                                                                       
                                                                    }
                                                                    else if($detail['ship_type'] == 2)
                                                                    {
                                                                        echo 'Parcel';
                                                                    }
                                                                ?>
															</p>-->
															</span><br/>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td class="col-sku" align="left">
                                           <?php echo $data['Product']['weight'];?> gram
										</td>
										<td class="col-price" align="center">
											<div class="PricebasePrice" style="display : block;">
												<span class="PricebasePrice">
                                                    <?php echo $currency['prefix'] .  $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency));?>
                                                </span>
											</div>
										</td>
                                      
										<td class="col-qty cart-p-qty" align="right">
											<div class="proopc-input-append">
                                            	<input type="text" onkeyup="Check(this)" name="product_<?php echo $data['Product']['id'];?>_<?php echo $value['key'];?>" id="product_<?php echo $data['Product']['id'];?>" value="<?php echo $value['quantity']; ?>" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4"/>
												<!--<input type="text" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4" name="quantity" value="<?php echo $value['quantity'];?>" data-pid="<?php echo $data['Product']['id'];?>" data-pkey="<?php echo $value['key'];?>"/>
												<button class="proopc-btn" name="update" title="Update Quantity In Cart" onclick="return updateproductqty();"><i class="proopc-icon-refresh"></i></button>-->
											</div>
											<a class="remove_from_cart proopc-btn" title="Delete Product From Cart" href="javascript:redirectUrl('<?php echo $this->Html->url('/products/delete_once/'.$data['Product']['id'].'/'.$value['key']); ?>','You want to remove this product?')"><i class="proopc-icon-trash"></i></a>
										</td>
										<?php
                                            /* doan code lay % cua combo */
                                            $percent_combo = 0;
											$percent_combo = $this->Tool->get_percent($value['quantity']);
                                            /*  if(($data['Product']['pro_combo'] == 1) && ($data['Product']['cat_combo'] == 0)){

                                                 $percent_combo = $this->Tool->combo($data['Product']['id'], null, $value['quantity']);
                                             }
                                             else if(($data['Product']['pro_combo'] == 0) && ($data['Product']['cat_combo'] == 1))
                                             {
                                                 $percent_combo = $this->Tool->combo(null, $data['Product']['category_id'], $value['quantity']);
                                             }else if(($data['Product']['pro_combo'] == 1) && ($data['Product']['cat_combo'] == 1))
                                             {
                                                 $percent_combo = $this->Tool->combo($data['Product']['id'], $data['Product']['category_id'], $value['quantity']);
                                             } */
                                           //echo $percent_combo;
                                        ?>
										<td class="col-discount" align="right">
											<span class='priceColor2'>
											<div class="PricediscountAmount" style="display : block;">
												<span class="PricediscountAmount">
													
                                                    <?php if($data['Product']['discount_status'] == 1):?>
                                                        <?php echo ($data['Product']['discount'] + $percent_combo);?>%
													<?php else:?>
														<?php if($percent_combo > 0){
															echo $percent_combo.'%';
														}?>
                                                    <?php endif;?>
                                                </span>
											</div>
											</span>
										</td>

										
										
										<td class="col-total" colspan="1" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span class="PricesalesPrice" >
                                                    <?php 
                                                        $pro_price = 0;
                                                        if($data['Product']['discount_status'] == 1)
                                                        {
                                                            $discount_price = $this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount']);
                                                        }
                                                        else
                                                        {
                                                            $discount_price = $this->Tool->price($data['Product']['price'],$to_currency);
                                                        }
                                                        $pro_price = $discount_price ;
                                                        $sum_price = $pro_price * $value['quantity'];
                                                        $price_combo = $sum_price * ($percent_combo / 100);
                                                        $sum = $sum_price - $price_combo;
                                                         echo $currency['prefix'] .$this->Tool->number_format(($sum))  ;
                                                    ?>
                                                </span>
											</div>
										</td>
									</tr>
                                <?php  
                                   $total += $sum;
                                ?>
                               
            					<?php $weight += (int)$data['Product']['weight'] *  (int)$value['quantity'];?>
            					<?php 
            						endforeach;
            					endforeach;
            					?>
                                <?php
									/* tinh gia tri coupon*/
									$coupon_price = ($coupon_percent/100) * $total;
									$total = $total - $coupon_price;
									# tinh gia tri khi co giftcard
									$c_arr_gift = $this->Session->check('Giftcard');
									if($c_arr_gift){
										$arr_gift = $this->Session->read('Giftcard');
										$value_gift = number_format(($arr_gift['value'] * $currency['rate']),2);

										if($value_gift > 0)
										{
											$total  =  $total - $value_gift;
										}
									}
								?>
									<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
									<tr class="blank-row">
										<td colspan="4" align="left">
										  <div id="proopc-coupon">
                                                <div class="inner-wrap">
                                                    <div class="proopc-input-append proopc-row">
                                                        <input type="text" size="20" maxlength="50" id="proopc-coupon-code"
                                                               alt="Enter your Coupon code" value="Enter your Coupon code"
                                                               onblur="if(this.value=='') this.value='Enter your Coupon code';"
                                                               onfocus="if(this.value=='Enter your Coupon code') this.value='';"
                                                               data-default="Enter your Coupon code" style="width: 201px; margin-right: 5px;">
                                                        <a class="btn btn-primary" title="Save" onclick="savecoupon();">Apply Coupon</a>
                                                    </div>
                                                </div>
                                            </div>
										</td>
										<td colspan="2"  align="right">
										<?php
                							echo $this->Form->button('<span class="glyphicon glyphicon-refresh"></span>  Update',
                								array(
                									'type' => 'submit',
                									'class' => 'btn btn-info'
                								),
                								array(
                									'escape' => false
                								)
                							);
                						?>
										<a class="btn btn-primary"
										   href="javascript:redirectUrl('<?php echo $this->Html->url(array
										   ('controller' => 'products', 'action' => 'delete_all_cart')); ?>','You want to delete all your shopping cart?')"
										   title="Xóa hết">Delete all</a>
										</td>
									</tr>
                                    <tr class="cart-sub-total">
										<td class="sub-headings" colspan="4" align="right">
											Total weight
										</td>
										<td class="col-discount" align="right">
											
										</td>
										<td class="col-total" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span id="total_weight">
                                                    <?php echo $weight; ?>
                                                </span>
                                                gram
											</div>
										</td>
									</tr>
									<tr class="cart-sub-total">
										<td class="sub-headings" colspan="4" align="right">
											Product prices result
										</td>
										<td class="col-discount" align="right">
											<div class="PricediscountAmount" style="display : none;">
												<span class="PricediscountAmount"></span>
											</div>
										</td>
										<td class="col-total" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span class="PricesalesPrice" id="order_subtotal">
                                                <?php
                            						if($total>0){
                            							echo $currency['prefix'] . $this->Tool->number_format($total);
                                                }?>
                                                </span>
											</div>
										</td>
									</tr>
									<tr>
                                        <td class="sub-headings" colspan="4" align="right">
                                            <?php
                                                $us_total =(float)($total / $currency['rate']);
                                                $point = number_format(($us_total / $rate_to_point),2);
												//echo $us_total;
												//echo $point;
                                            ?>
                                            <p class="earned_points">This order earned <b class="points"><?php echo $point;?></b> Volga points</p>
                                        </td>
                                        <td></td>
                                        <td class="col-total" align="right">
                                        </td>
                                    </tr>
									<tr id="control_ship" class="sectiontableentry1 shipping-row">
                                        <td class="sub-headings" align="right">
											Shipping Method
										</td>
										<td class="shipping-payment-heading" colspan="2" align="left">
                                            <?php $ship_method = GlobalVar::read('ship_type');?>
                                            <select class="form-control" id="ship_type" >
												<?php foreach($ship_method as $smt => $val_smt):
													if($smt == 1):
												?>
													<option value="<?php echo $smt?>" selected="selected"><?php echo $val_smt;?></option>
													<?php else:?>
													<option value="<?php echo $smt?>"><?php echo $val_smt;?></option>
													<?php endif;?>
												<?php endforeach;?>
            									
            								</select> 
										</td>
                                        <td class="sub-headings" align="right">
											Ship to
										</td>
										<td class="shipping-payment-heading" colspan="2" align="right">
                                        <select id="shipping_to" name="" class="form-control">
        									<option value=""> --- Select country ---</option>
                                            
        									<?php foreach($country as $item):?>
                                            <?php if($item['Country']['code'] == $country_info['Country']['code']):?>
                                            <option value="<?php echo $item['Country']['code'];?>" selected="selected"><?php echo $item['Country']['country'];?>
        									</option>
                                            <?php else:?>   
                                            
        									<option value="<?php echo $item['Country']['code'];?>"><?php echo $item['Country']['country'];?>
        									</option>
                                            <?php endif;?>
        									<?php endforeach;?>
        								</select>
										</td>
									</tr>
									<tr class="sectiontableentry1 payment-row">
										<td class="sub-headings" colspan="4" align="right">
											Estimated shipping
										</td>
										<td>
										</td>
										<td class="shipping-payment-heading col-total" colspan="1" align="right">
                                            <div class="PricesalesPrice" style="display : block;">
												<span id="shipping_cost">
                                                    0
                                                </span>
											</div>
                                           
										</td>
									</tr>
									<tr class="blank-row">
										<td class="sub-headings" colspan="4" align="right">
											Coupon
										</td>
										<td colspan="2" class="col-total" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span>
													- <?php echo $this->Tool->number_format($coupon_price). $currency['prefix'];?>
													<?php 
														if($coupon_percent >0)
														{
															echo '('. $coupon_percent .'%)';
														}
													?>
												</span>
											</div>
										</td>
									</tr>
									<tr class="blank-row">
										<td class="sub-headings" colspan="4" align="left">
											<a href="javascript:openGiftCardForm()" id="openGift">Have a Gift Card?</a>
											<div id="proopc-giftcard" style="display: none;">
												<div class="inner-wrap">
													<div class="proopc-input-append proopc-row">
														<input type="text" size="20" maxlength="50" id="proopc-giftcard-code"
															   alt="Enter your giftcard code" value="Enter your giftcard code"
															   onblur="if(this.value=='') this.value='Enter your giftcard code';"
															   onfocus="if(this.value=='Enter your giftcard code') this.value='';"
															   data-default="Enter your giftcard code" style="width: 201px; margin-right: 5px;">
														<a class="btn btn-primary" title="Save" onclick="savegiftcard();">Apply giftcard</a>
													</div>
												</div>

											</div>

										</td>
										<td colspan="2" class="shipping-payment-heading" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span>
												<?php
													if(isset($value_gift) && ($value_gift > 0)){
														echo '-'. $value_gift . $currency['prefix'];
													}
												?>
												</span>
											</div>
										</td>
									</tr>
									
									<tr class="sectiontableentry2 grand-total">
										<td class="sub-headings" colspan="4" align="right">
											Total:
										</td>
										<td class="col-discount" align="right">
										</td>
										<td class="col-total" align="right">
											<div class="PricebillTotal" style="display : block;">
												<span class="PricebillTotal" id="grand_total">
                                                 <?php
                            						if($total>0){
                            							echo $currency['prefix'] . $this->Tool->number_format($total);
                                                }?>
                                                </span>
											</div>
										</td>
									</tr>
                                    
                                    <tr>
                                        <td class="sub-headings" colspan="3" align="right">  
                                            <a class="btn btn-default" href="/">
                                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                            </a>
                                        </td>
                                    
                                     <?php echo $this->Form->end();?>
										
                                        <td class="col-total col-paypan"  colspan="3">
											<form action='/orders/checkout?step=express_checkout' id="submitpaypan" METHOD='POST' style="float: left;margin-left: 40px;">
											<input type='image' name='submit'  src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png' border='0' align='top' alt='Check out with PayPal'/>
											</form>
											<b>- OR -</b>
											<a class="btn btn-success btn-checkout" href="/orders/add">
												Checkout <span class="glyphicon glyphicon-play"></span>
											</a>
                                        </td>
                                    </tr>
                                                    
									</tbody>
									</table>
								</fieldset>
                                
							</div>
							
						</div>
						<div id="formToken">
							<input type="hidden" name="727a47939e83a9d6ecaf20811071495f" value="1"/>
						</div>
						<input type="hidden" id="BTStateID" name="BTStateID" value="65"/><input type="hidden" id="STStateID" name="STStateID" value="0"/>
					</div>
				</div>
			</div>
		</div>
	</div>	
 </div>

<script type="text/javascript">
	function openGiftCardForm() {
        $("#proopc-giftcard").slideToggle();
    }
    function savegiftcard() {
        var gift_code = $('#proopc-giftcard-code').val();
        var defaultValue = $('#proopc-giftcard-code').attr('data-default');
        if (gift_code == defaultValue) {
            alert('giftcard empty!');
        } else {
            var dataSubmit = 'gift_code=' + gift_code;
            $.ajax({
                beforeSend: function () {
                    $('#proopc-order-submit').attr('disabled', 'disabled');
//                    ProOPC.addloader('#proopc-coupon');
//                    jq("#proopc-coupon-process").append(proopc_spinner.el);
                },
                type: 'POST',
                dataType: 'json',
                url: '/products/add_giftcard',
                data: dataSubmit,
                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function () {

                    alert('Gift card Error: Data could not be fetched.');
                }

            });
        }
    }
	function savecoupon() {
        var couponCode = $('#proopc-coupon-code').val();
        var defaultValue = $('#proopc-coupon-code').attr('data-default');
        if (couponCode == defaultValue) {
            alert('coupon empty!');
        } else {
            var dataSubmit = 'coupon_code=' + couponCode;
            $.ajax({
                beforeSend: function () {
                    $('#proopc-order-submit').attr('disabled', 'disabled');
//                    ProOPC.addloader('#proopc-coupon');
//                    jq("#proopc-coupon-process").append(proopc_spinner.el);
                },
                type: 'POST',
                dataType: 'json',
                url: '/products/add_coupon',
                data: dataSubmit,
                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function () {

                    alert('Coupon Error: Data could not be fetched.');
                }
               /* complete: function () {
                    ProOPC.removeloader('#proopc-coupon');
                }*/
            });
        }
        return false;
    }
    function redirectUrl(url, mess) {
        if (confirm(mess)) {
            window.location.href = url;
        }
    }


    $('#proopc-pricelist').ready(function(){
        var total_cart = "<?php echo ($total);?>";
        var to_currency = "<?php echo $to_currency;?>";
        if(to_currency == "")
        {
            to_currency = "USD";
        }
        var order_subtotal = $('#order_subtotal').text();
        $('#grand_total').text(order_subtotal);
        var total_weight = $('#total_weight').text();
        
        
        var load_shiptype = $("#ship_type option:selected").val();        
        var load_shipto = $("#shipping_to option:selected").val();
        
        $.ajax({
            url: "/products/ship_cost",
            type: "POST",
            data: {
                code_country: load_shipto,
                weight: total_weight,
                ship_type: load_shiptype
            },

            success: function (data) {
                console.log(data);
                data = ceil(data);
               // var format_data = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(data);
                //document.getElementById("shipping_cost").innerHTML = addCommas(format_data);
				 var format_data = format(data,to_currency);
                $('#shipping_cost').text(format_data);
                var grand_total = data + parseFloat(total_cart);

                //var format_grand_total = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(grand_total);
                //alert(format_grand_total);
				var format_grand_total = format(grand_total,to_currency);
                $('#grand_total').text(format_grand_total);

                $("#type_ship").val(load_shiptype);
                $("#ship_to").val(load_shipto);
                $("#weight").val(total_weight);
            },
            error: function () {
                alert('ERROR');
            }

        });

        
        $('#control_ship').change(function () {
            var code_country = $('#shipping_to').val();
            if (code_country == "") {
                code_country = destination;
            }
            /*  alert(total_weight);
             alert(code_country);*/
            var ship_type = $('#ship_type').val();
    		if(ship_type === "")
    		{
    			alert('Service shipping is required !');
    			return;
    		}
    
            $.ajax({
                url: "/products/ship_cost",
                type: "POST",
                data: {
                    code_country: code_country,
                    weight: total_weight,
                    ship_type: ship_type
                },
    
                success: function (data) {
					if(data == "no_support")
                    {
                        alert('Do not support shipping method!');
                        location.reload();
                    }
                    data = ceil(data);
                   // var format_data = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(data);
                    //document.getElementById("shipping_cost").innerHTML = addCommas(format_data);
					 var format_data = format(data,to_currency);
                    $('#shipping_cost').text(format_data);
                    var grand_total = data + parseFloat(total_cart);
                    console.log(grand_total);
                    //var format_grand_total = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(grand_total);
                    //alert(format_grand_total);
					var format_grand_total = format(grand_total,to_currency);
                    $('#grand_total').text(format_grand_total);
    
                    $("#type_ship").val(ship_type);
                    $("#ship_to").val(code_country);
                    $("#weight").val(total_weight);
                },
                error: function () {
                    alert('ERROR');
                }
    
            });
        });
        
        
    });

   

    function ceil(nStr)
    {
        var num = Math.ceil(nStr * 100) / 100;
        return num;
    }
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    /* $('#ship_cost').click(function(){
     var ship_cost = $("input:radio[name='data[Order][ship_type]']:checked").val();
     alert(ship_cost);

     });*/
</script>