<?php
    if(isset($currency)){
        $to_currency = $currency['code'];
        $rate =  $currency['rate'];
    }else
    {
        $to_currency = "";
        $rate = 1;
    }
?>
<div class="banner-breadcrumb">
	<div class="container">
		<div class="inner-wrap">
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
					<img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					<li><a href="#" class="pathway">Cart</a></li>
					<span class="divider"><img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
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
					<div class="compare-mod visible-desktop">
						<div class="vmCompareModule " id="vmCompareModule">
							<div id="compare_hiddencontainer" style=" display: none; ">
								<li class="products">
								<div class="product_image">
								</div>
								<div class="texts">
									<div class="product_name">
									</div>
									<div class="price">
									</div>
								</div>
								</li>
							</div>
							<div class="vm_compare_products">
								<ul class="container slides">
									<li class="products">
									<div class="product_image">
									</div>
									<div class="texts">
										<div class="product_name">
										</div>
										<div class="price">
										</div>
									</div>
									</li>
								</ul>
							</div>
							<div class="total_products">
								<a href="/en/compare-products" title="Compare">
								Compare <span class="total">0</span> Products </a>
							</div>
							<a class="hide-compare-module" href="#" title="Hide"><i class="icon-close"></i></a>
							<noscript>
							 MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT
							</noscript>
						</div>
					</div>
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
													<img src="/images/banners/cart-promo.png" alt="Cart Promo" width="980" height="123"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="proopc-system-message">
						</div>
						<div class="proopc-finalpage">
							<div class="proopc-row">
								<h1 class="cart-page-title">Cart&nbsp;<span class="septa">/</span>&nbsp;<span><span id="proopc-cart-totalqty">1</span> products</span></h1>
							</div>
							<div class="proopc-row">
								<div class="proopc-login-message-cont">
									<form action="/en/cart" method="post" name="login" id="form-login">
										<div class="proopc-loggedin-user">
											Welcome to Test <b class="caret"></b>
										</div>
										<div class="proopc-logout-cont hide">
											<div class="proopc_arrow_box">
												<div class="proopc-arrow-inner">
													<button class="proopc-btn" type="submit">Log out</button>
												</div>
											</div>
										</div>
										<input type="hidden" name="option" value="com_users"/>
										<input type="hidden" name="task" value="user.logout"/>
										<input type="hidden" name="727a47939e83a9d6ecaf20811071495f" value="1"/><input type="hidden" name="return" value="L2VuL2NhcnQ="/>
										<input type="hidden" name="ctask" value="login"/>
									</form>
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
											Shipping cost
										</th>
										<th class="col-price" align="center">
											Price:
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
															</span><br/><span class="product-field-type-S">Shipping Cost
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
															</p>
															</span><br/>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td class="col-sku" align="left">
                                           <?php 
                                                 $shipping_cost = $detail['ship_cost'] * $currency['rate'];
                                                 echo $currency['prefix'] . $shipping_cost;
                                            ?>
										</td>
										<td class="col-price" align="center">
											<div class="PricebasePrice" style="display : block;">
												<span class="PricebasePrice">
                                                    <?php echo $currency['prefix'] .  $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency));?>
                                                </span>
											</div>
										</td>
                                        <input type="hidden" value="<?php echo $data['Product']['weight'];?>" id="total_weight" />
										<td class="col-qty cart-p-qty" align="right">
											<div class="proopc-input-append">
                                            	<input type="text" onkeyup="Check(this)" name="product_<?php echo $data['Product']['id'];?>_<?php echo $value['key'];?>" id="product_<?php echo $data['Product']['id'];?>" value="<?php echo $value['quantity']; ?>" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4"/>
												<!--<input type="text" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4" name="quantity" value="<?php echo $value['quantity'];?>" data-pid="<?php echo $data['Product']['id'];?>" data-pkey="<?php echo $value['key'];?>"/>
												<button class="proopc-btn" name="update" title="Update Quantity In Cart" onclick="return updateproductqty();"><i class="proopc-icon-refresh"></i></button>-->
											</div>
											<a class="remove_from_cart proopc-btn" title="Delete Product From Cart" href="javascript:redirectUrl('<?php echo $this->Html->url('/products/delete_once/'.$data['Product']['id'].'/'.$value['key']); ?>','You want to remove this product?')"><i class="proopc-icon-trash"></i></a>
										</td>
										<td class="col-discount" align="right">
											<span class='priceColor2'>
											<div class="PricediscountAmount" style="display : block;">
												<span class="PricediscountAmount">
                                                    <?php if($data['Product']['discount_status'] == 1):?>
                                                        <?php echo $data['Product']['discount'];?>.00%
                                                    <?php endif;?>
                                                </span>
											</div>
											</span>
										</td>
										<td class="col-total" colspan="1" align="right">
											<div class="PricesalesPrice" style="display : block;">
												<span class="PricesalesPrice" id="order_subtotal">
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
                                                        $pro_price = $discount_price + $this->Tool->price($detail['ship_cost'],$to_currency,0);
                                                        echo $currency['prefix'] . ($pro_price * $value['quantity']) ;
                                                    ?>
                                                </span>
											</div>
										</td>
									</tr>
                                <?php  
                                    $total += $pro_price * $value['quantity'];
                                ?>
                               
            					<?php $weight += (int)$data['Product']['weight'] *  (int)$value['quantity'];?>
            					<?php 
            						endforeach;
            					endforeach;
            					?>
                                    
									<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
									<tr class="blank-row">
										<td colspan="4">
											&nbsp;
										</td>
										<td colspan="2">
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
												<span class="PricesalesPrice">
                                                <?php
                            						if($total>0){
                            							echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($total,$to_currency));
                                                }?>
                                                </span>
											</div>
										</td>
									</tr>
									<tr class="sectiontableentry1 shipping-row">
										<td class="shipping-payment-heading" colspan="4" align="left">
											 No shipment selected
										</td>
										<td class="col-total" colspan="2" align="right">
										</td>
									</tr>
									<tr class="sectiontableentry1 payment-row">
										<td class="shipping-payment-heading" colspan="4" align="left">
											<span class="vmCartPaymentLogo"><img align="middle" src="http://volgashop.com/images/stories/virtuemart/payment/paypal.png" alt="paypal"/></span><span class="vmpayment_name">PayPal</span>
										</td>
										<td class="col-total" colspan="2" align="right">
										</td>
									</tr>
									<tr class="blank-row">
										<td colspan="4">
											&nbsp;
										</td>
										<td colspan="2">
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
												<span class="PricebillTotal">
                                                <?php
                            						if($total>0){
                            							echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($total,$to_currency));
                                                }?>
                                                </span>
											</div>
										</td>
									</tr>
									</tbody>
									</table>
								</fieldset>
                                <?php echo $this->Form->end();?>
							</div>
							<div class="proopc-column3">
								<div class="proopc-bt-address">
									<h3 class="proopc-process-title">
									<div class="proopc-step">
										1
									</div>
									Bill To</h3>
									<div class="inner-wrap">
                                    <?php echo $this->Form->create('Order',array('action'=>'add','inputDefaults'=>array('label'=>false,'div'=>false)))?>
                                    <form method="POST" action="" id="FormShipTo">
										<div class="edit-address">
											<div id="EditBTAddres" class="form-validate">
												<div class="email-group">
													<div class="inner">
														<label class="email" for="email_field">E-Mail *</label>
                                                        <?php echo $this->Form->input('email',array('id' =>'email_field','type'=>'email','size'=>'30','class'=>'required','maxlength'=>'100'));?>
                                                        
													</div>
												</div>
												<div class="company-group">
													<div class="inner">
														<label class="company" for="company_field">Company Name</label>
                                                        <?php echo $this->Form->input('company',array('id'=>'company_field','size'=>'30','maxlength'=>'64'))?>
                                                        
													</div>
												</div>
												<div class="title-group">
													<div class="inner">
														<label class="title" for="title_field">Title</label>
														<select id="title" name="data[Order][sex]">
															<option value="1" selected="selected">Mr</option>
															<option value="2">Mrs</option>
														</select>
													</div>
												</div>
												<div class="first_name-group">
													<div class="inner">
														<label class="first_name" for="first_name_field">Full Name *</label>
                                                        <?php echo $this->Form->input('full_name',array('size'=>'30','class' =>'required','maxlength'=>'32'));?>
                                                        
													</div>
												</div>
												
											
												<div class="address_1-group">
													<div class="inner">
														<label class="address_1" for="address_1_field">Address 1 *</label>
                                                        <?php echo $this->Form->input('address',array('class'=>'required','size'=>'30','maxlength' => '200'));?>
                                                        
													</div>
												</div>
												<div class="address_2-group">
													<div class="inner">
														<label class="address_2" for="address_2_field">Address 2</label>
                                                        <?php echo $this->Form->input('address2',array('class'=>'required','size'=>'30','maxlength' => '200'));?>
                                                        
													</div>
												</div>

												<div class="phone_1-group">
													<div class="inner">
														<label class="phone_1" for="phone_1_field">Phone</label>
                                                        <?php echo $this->Form->input('phone',array('class'=>'required','size'=>'30','maxlength' => '32','id'=>'phone_1_field'));?>
                                                        
													</div>
												</div>
												<div class="phone_2-group">
													<div class="inner">
														<label class="phone_2" for="phone_2_field">Mobile Phone</label>
                                                        <?php echo $this->Form->input('mobiphone',array('class'=>'required','size'=>'30','maxlength' => '32','id'=>'phone_2_field'));?>
													</div>
												</div>
												<div class="fax-group">
													<div class="inner">
														<label class="fax" for="fax_field">Fax</label>
                                                        <?php echo $this->Form->input('fax',array('class'=>'required','size'=>'30','maxlength' => '32','id'=>'fax_field'));?>
                                                        
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="billto" value="0"/>
                                                <div class="proopc-row proopc-checkout-box">			
                                		      <button type="submit" class="proopc-btn n proopc-btn-info" id="proopc-order-submit">Submit Bill To</button>							
       			                              </div>
                                       <?php echo $this->Form->end();?>
									</div>
         
								</div>
							</div>
							<div class="proopc-column3">
								<div class="proopc-st-address">
									<h3 class="proopc-process-title">
									<div class="proopc-step">
										2
									</div>
									Ship To</h3>
									<div class="inner-wrap">
										<label for="BTasST">
										<input class="inputbox" type="checkbox" name="STsameAsBT" id="STsameAsBT"  onclick=""/>
										Use for the shipto same as billto address </label>
										<div class="edit-address-ship-to" style="display: none;">
                                        <form method="POST" action="" id="FormShipTo">
                                        	<div id="EditSTAddres" class="form-validate">
												<div class="shipto_company-group">
													<div class="inner">
														<label class="shipto_company" for="shipto_company_field">Company Name</label><input type="text" id="shipto_company_field" name="shipto_company" size="30" value="" maxlength="64"/>
													</div>
												</div>
												<div class="shipto_first_name-group">
													<div class="inner">
														<label class="shipto_first_name" for="shipto_first_name_field">First Name *</label><input type="text" id="shipto_first_name_field" name="shipto_first_name" size="30" value="" class="required" maxlength="32"/>
													</div>
												</div>
												<div class="shipto_middle_name-group">
													<div class="inner">
														<label class="shipto_middle_name" for="shipto_middle_name_field">Middle Name</label><input type="text" id="shipto_middle_name_field" name="shipto_middle_name" size="30" value="" maxlength="32"/>
													</div>
												</div>
												<div class="shipto_last_name-group">
													<div class="inner">
														<label class="shipto_last_name" for="shipto_last_name_field">Last Name *</label><input type="text" id="shipto_last_name_field" name="shipto_last_name" size="30" value="" class="required" maxlength="32"/>
													</div>
												</div>
                                                <div class="shipto_virtuemart_country_id-group">
													<div class="inner">
														<label class="shipto_virtuemart_country_id" for="shipto_virtuemart_country_id_field">Country *</label>
														<select  id="shipping_to"  class="virtuemart_country_id required">
															<option value="" selected="selected">-- Select --</option>
															<?php foreach($country as $item):?>
                        									<option value="<?php echo $item['Country']['code'];?>"><?php echo $item['Country']['country'];?>
                        									</option>
                        									<?php endforeach;?>
														
														</select>
													</div>
												</div>
												<!--<div class="shipto_virtuemart_state_id-group">
													<div class="inner">
														<label class="shipto_virtuemart_state_id" for="shipto_virtuemart_state_id_field">State / Province / Region *</label>
														<select onchange="return ProOPC.updateSTaddress(this);" class="inputbox multiple" id="virtuemart_state_id" size="1" name="shipto_virtuemart_state_id" required>
														
														</select>
													</div>
												</div>-->
                                                
												<div class="shipto_address_1-group">
													<div class="inner">
														<label class="shipto_address_1" for="shipto_address_1_field">Address 1 *</label><input type="text" id="shipto_address_1_field" name="shipto_address_1" size="30" value="" class="required" maxlength="64"/>
													</div>
												</div>
												<div class="shipto_address_2-group">
													<div class="inner">
														<label class="shipto_address_2" for="shipto_address_2_field">Address 2</label><input type="text" id="shipto_address_2_field" name="shipto_address_2" size="30" value="" maxlength="64"/>
													</div>
												</div>
												<div class="shipto_zip-group">
													<div class="inner">
														<label class="shipto_zip" for="shipto_zip_field">Zip / Postal Code *</label><input onchange="return ProOPC.updateSTaddress(this);" type="text" id="shipto_zip_field" name="shipto_zip" size="30" value="" class="required" maxlength="32"/>
													</div>
												</div>
												<div class="shipto_city-group">
													<div class="inner">
														<label class="shipto_city" for="shipto_city_field">City *</label><input onchange="return ProOPC.updateSTaddress(this);" type="text" id="shipto_city_field" name="shipto_city" size="30" value="" class="required" maxlength="32"/>
													</div>
												</div>
												
												<div class="shipto_phone_1-group">
													<div class="inner">
														<label class="shipto_phone_1" for="shipto_phone_1_field">Phone</label><input type="text" id="shipto_phone_1_field" name="shipto_phone_1" size="30" value="" maxlength="32"/>
													</div>
												</div>
												<div class="shipto_phone_2-group">
													<div class="inner">
														<label class="shipto_phone_2" for="shipto_phone_2_field">Mobile Phone</label><input type="text" id="shipto_phone_2_field" name="shipto_phone_2" size="30" value="" maxlength="32"/>
													</div>
												</div>
												<div class="shipto_fax-group">
													<div class="inner">
														<label class="shipto_fax" for="shipto_fax_field">Fax</label><input type="text" id="shipto_fax_field" name="shipto_fax" size="30" value="" maxlength="32"/>
													</div>
												</div>
                                                <div class="proopc-row proopc-checkout-box">			
                                    				<button type="submit" class="proopc-btn n proopc-btn-info" id="proopc-order-submit">Submit Shipping To</button>							
                                    			</div>
                                                
											</div>
										</div>
                                        </form>

									</div>
								</div>
						
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
    function redirectUrl(url, mess) {
        if (confirm(mess)) {
            window.location.href = url;
        }
    }
    
    $(document).ready(function() {
        $('#STsameAsBT').click(function(){
            if ($(this).is(':checked')) {
                //$(this).parent().find('input:checkbox').attr('checked', true);
                $('.edit-address-ship-to').show();
            }
            else{
               // $(this).parent().find('input:checkbox').attr('checked', false);
               $('.edit-address-ship-to').hide();
            }
            
        });
    });
    
    function setst(){
        $('#STsameAsBT').click(function(){
            if ($(this).is(':checked')) {
                //$(this).parent().find('input:checkbox').attr('checked', true);
                $('.edit-address-ship-to').show();
            }
            else{
               // $(this).parent().find('input:checkbox').attr('checked', false);
               $('.edit-address-ship-to').hide();
            }
            
        });
       
    }
    
    function updateproductqty() {
           // alert('asdasd');
           
			var updatePID = $('.proopc-input-append').parent().find('input[name="quantity"]').attr('data-pid');
            var updateKEY = $('.proopc-input-append').parent().find('input[name="quantity"]').attr('data-pkey');
			var quantity = $('.proopc-input-append').parent().find('input[name="quantity"]').val();
            //alert(updatePID);
            //alert(quantity);
			$.ajax({
                type : 'POST',
				url: '/products/update_once_ajax',
				data:  {key:updateKEY, id:updatePID, quantity:quantity},
				dataType: 'JSON',
				success: function(data) {
				    //console.log(data);
       	            window.location.reload();
					//if(data.error !== 0) {
//						if(data.pqty == 0) {
//							window.location.reload();
//							return false;
//						}						
//						ProOPC.removeloader('#proopc-pricelist');
//						var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+data.msg+'</div>';
//						$('#proopc-system-message').html(msg_html);
//						$('html,body').animate({scrollTop: $('#proopc-system-message').offset().top-100}, 500);						
//					} else {
//					   console.log(data);
//						//$('#proopc-system-message').html('');
////						$('.proopc-product-hover').addClass('hide');				
////						if($('input#proopc-cart-summery').length > 0) {
////							ProOPC.getcartsummery();
////							$('#proopc-cart-totalqty').text(data.pqty);
////						} else {
////							ProOPC.getshipmentpaymentcartlist();
////						}
////	                    if ($(".vmCartModule")[0]) {
////	                        Virtuemart.productUpdate($(".vmCartModule"));
////	                    }							
//					}
				}
			});	
							
		}

    function addloader(addprocess) {
			var loaderHTML = '<div class="proopc-loader-overlay"></div><div class="proopc-area-loader"><span></span></div>';
			$(addprocess).each(function() {
				if($(this).find('.proopc-area-loader').length == 0) {
					$(this).append(loaderHTML);
					$('.proopc-area-loader > span').append(proopc_area_loader.el);
				}					
			});	
			$('#header .navigation.sticky').css('z-index', 2000000000);
			$('#proopc-order-submit').attr('disabled', 'disabled');
		}
        function removeloader(removeprocess) {
    		$(removeprocess).each(function() {
    			if($(this).find('.proopc-loader-overlay').length > 0) {
    				$(this).find('.proopc-loader-overlay').remove();
    				$(this).find('.proopc-area-loader').remove();
    			}				
    		});
    		$('#header .navigation.sticky').css('z-index', '');
    		$('#proopc-order-submit').removeAttr('disabled');
    	}
        
       
        
        
        
   var total_cart = "<?php echo ($total * $rate);?>";
   
    var to_currency = "<?php echo $to_currency;?>";
    if(to_currency == "")
    {
        to_currency = "USD";
    }
    var order_subtotal = $('#order_subtotal').text();
    
    $('#grand_total').text(order_subtotal);
    
    
    
    $('.shipto_virtuemart_country_id-group').change(function () {
        
        var code_country = $('#shipping_to').val();
        
        if (code_country == "") {
            code_country = destination;
        }
        var total_weight = $('#total_weight').val();
        alert(total_weight);
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

                data = ceil(data);
                var format_data = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(data);
                document.getElementById("shipping_cost").innerHTML = addCommas(format_data);

                var grand_total = data + parseFloat(total_cart);

                var format_grand_total = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(grand_total);
                //alert(format_grand_total);
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