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
                    <img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					<li><a href="#" class="pathway">Shopping Cart</a></li>
					<span class="divider"><img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li class="active">Checkout</li>
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
                                            	<input type="text" onkeyup="Check(this)" name="product_<?php echo $data['Product']['id'];?>_<?php echo $value['key'];?>" id="product_<?php echo $data['Product']['id'];?>" value="<?php echo $value['quantity']; ?>" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4" readonly="readonly"/>
												<!--<input type="text" title="Update Quantity In Cart" class="inputbox input-ultra-mini" size="3" maxlength="4" name="quantity" value="<?php echo $value['quantity'];?>" data-pid="<?php echo $data['Product']['id'];?>" data-pkey="<?php echo $value['key'];?>"/>
												<button class="proopc-btn" name="update" title="Update Quantity In Cart" onclick="return updateproductqty();"><i class="proopc-icon-refresh"></i></button>-->
											</div>
											
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
                                                        //$pro_price = $discount_price + $this->Tool->price($detail['ship_cost'],$to_currency,0);
                                                        $pro_price = $discount_price ;
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
										 
										</td>
										<td colspan="2"  align="right">
                                        
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
                            							echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($total,$to_currency));
                                                }?>
                                                </span>
											</div>
										</td>
									</tr>
								
									<tr class="sectiontableentry1 payment-row">
										<td class="sub-headings" colspan="4" align="right">
										<?php 
            								if($arr_ship['ship_type'] == 1){
            									echo 'Estimated shipping ' . $country['Country']['country'] . ' Shipping Smallpacket';
            								}
            								else if($arr_ship['ship_type'] == 2)
            								{
            									echo 'Estimated shipping ' . $country['Country']['country'] . ' Shipping Parcel ';
            								}
            							?>  
										</td>
										<td class="col-total" colspan="2" align="right">
                                            <div class="PricesalesPrice" style="display : block;">
												<span id="shipping_cost">
                                                    <?php echo $currency['prefix'];?> <?php echo $this->Tool->number_format($arr_ship['shipping_cost']);?>
                                                </span>
											</div>
                                           
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
												<span class="PricebillTotal" id="grand_total">
                                                 <?php echo $currency['prefix'];?> <?php echo $this->Tool->number_format(($total * $currency['rate']) + $arr_ship['shipping_cost']);?>
                                                </span>
											</div>
										</td>
									</tr>
                                    
                                    <tr>
                                        <td class="sub-headings" colspan="4" align="right">  
                                            <a class="btn btn-default" href="/orders/cart_detail">
                                                <span class="glyphicon glyphicon-shopping-cart"></span> Edit cart
                                            </a>
                                        </td>
                                    
                                        
                                        <td class="col-total"  colspan="2" align="right">
                                            <form action='/orders/checkout?step=checkout' METHOD='POST'>
                    						<input type='image' name='submit' src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png' border='0' align='top' alt='Check out with PayPal'/>
                    						</form>
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

