<?php

    if(isset($currency)){
        $to_currency = $currency['code'];
        $rate =  $currency['rate'];
    }else
    {
        $to_currency = "";
        $rate = 1;
    }
	$currency_detail = $this->Tool->country_info($order['Order']['currency']);
?>
<div class="banner-breadcrumb">
	<div class="container">
		<div class="inner-wrap">
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
					<span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li><a href="/tracking" class="pathway">My Order</a></li>
					<span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li class="active"><?php echo $order['Order']['order_number']?></li>
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
								<h1 class="cart-page-title"><?php echo $order['Order']['order_number']?></h1>
							</div>
							
							<div id="proopc-pricelist">
								<fieldset>
									<table class="order_table" id="order_table">
										<thead>
											<tr>
												<th width="75">sku</th>
												<th width="70">Image</th>
												<th width="230">Name</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Discount</th>
												<th>Total</th>
											
											</tr>
										</thead>
										<tbody>
										<?php $p_sum = 0; foreach ($order['Product'] as $item): ?> 
											<tr>
												<td field="SKU"><?php echo $item['sku'];?></td>
												<td field="Image">
													<img alt="" src="<?php echo DOMAIN_ROOT ;?>/timthumb.php?src=<?php echo $item['thumbnail'];?>&w=45&h=35">
												</td>
												<td style="text-align: left">
													<a route-type="www" field="Name" class="cblueulin" href="">
													<?php
													$detail = json_decode($item['OrdersProduct']['detail'],true);
													echo $this->Tool->substr($item['name'],0,60). '('. $detail['color'].')';
													?>
													</a>
												</td>
												<td field="Price" class="c00"><?php echo $currency_detail['Country']['prefix'] . number_format(($item['OrdersProduct']['price'] * $currency_detail['Country']['rate']),2);?></td>
												<td field="Quantity" class="cf50"><?php echo $item['OrdersProduct']['quantity'];?></td>
												<td> 
												<?php 
													$percent_combo = 0;
													$percent_combo = $this->Tool->get_percent($item['OrdersProduct']['quantity']);
													if($percent_combo > 0)
													{
														echo $percent_combo . '%';
													}
												?>
												
												</td>
												<td field="Total" class="cf50"><?php echo $currency_detail['Country']['prefix'] . number_format(($item['OrdersProduct']['price'] * $currency_detail['Country']['rate']) * $item['OrdersProduct']['quantity'],2) ;?></td>
												<?php 
													$p_price = ($item['OrdersProduct']['price'] * $currency_detail['Country']['rate']) * $item['OrdersProduct']['quantity'];
													$p_sum += $p_price;
												?>
											</tr>
										<?php endforeach;?>
										</tbody>
										
									</table>
									<div class="order_track noborder mt10">
										<div class="order_track_r fright mt10" field="OrderAmount">
											<dl>
												<?php 
													$total = $order['Order']['total'];
													$shipping_cost = $order['Order']['shipping_cost'];
													
												?>
												
												<dt class="f14">Product(s) Total:</dt>
												<dd class="f14" field="ProductAmount"><?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($p_sum,2);?></dd>
												<dt class="f14">Shipping:</dt>
												<dd class="f14" field="ShipAmount"><?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($shipping_cost,2);?></dd>
												<dt class="f14" field="CouponTitle">Coupon Saving:</dt>
												<dd class="f14" field="CouponSave">-  <?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($order['Order']['coupon_saving'],2);?></dd>
												<dt class="c00 f18">Order Total:</dt>
												<dd class="cf50 f18" field="OrderTotal"><?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($total,2);?></dd>
											</dl>
											<div class="clear"></div>
										</div>
									</div>
									<a href="/orders/invoice/<?php echo $order['Order']['order_number'];?>" class="btn btn-primary" style="float:right;">Print Invoice</a>
								</fieldset>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css"> 
	table.order_table{border-collapse:collapse;width:100%;}
	table.order_table th{background:#e9e9e9;color:#000;border:#ddd solid 1px;padding:8px 0;font-size:11px;}
	table.order_table td{border:#ddd solid 1px;padding:8px 5px;text-align:center;font-size:11px;word-break:break-all;}
	table.order_table td.alignL{text-align:left}
	table.order_table td.cc20{color:#c20000;}
	table.order_table tr.even{background:#fff8eb;}
	table.order_table td img{border:#ddd solid 1px;}
	.order_track{height:auto;overflow:hidden;border-bottom:#ddd solid 1px;padding-bottom:15px;}
	.order_track.noborder{border-bottom:none}
	.order_track .order_track_l{width:600px;}
	.order_track .order_track_r{width:300px;}
	.order_track_r dl{background:#f5f5f5;border:#ddd solid 1px;width:288px;float:right;height:auto;padding:15px;overflow:hidden;color:#000}
	.order_track_r dl dt,.order_track_r dl dd{height:20px;line-height:20px;float:left;}
	.order_track_r dl dt.add_border,.order_track_r dl dd.add_border{border-bottom:#ddd solid 1px;padding-bottom:10px;margin-bottom:10px}
	.order_track_r dl dt{width:117px;text-align:right;padding-right:10px;}
	.order_track_r dl dd{width:149px;text-align:right;}
</style>
