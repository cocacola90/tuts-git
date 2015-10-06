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
<div class="main-wrap">
	<div id="main-site" class="container">
		<div class="inner-wrap">
			<div class="row-fluid">
				<div class="span12 main-column">
					<div id="print">
                        <div id="print_btnbox">
                            <input type="button" value="Print" class="btn_print" onclick="window.print();"></div>
                        <div id="print_head">
                            <div class="logo">
                                <a href="/"></a>
                            </div>
							
                            <div class="address">
                               <?php if(isset($supports)):?>
								<?php echo $supports['address_shop']['value'];?>
                                <br>
                                TEL: <?php echo $supports['+84-1689-974-832']['value'];?>
								<?php endif;?>
                            </div>

                        </div>
                        <div id="print_body">
                            <div class="print_box_title">
                                <span>Order Placed:<em field="CreatedOn"><?php echo date('d-m-Y H:i:s', $order['Order']['created']); ?></em></span><br>
                                <span>Order number: <em field="OrderID"><?php echo $order['Order']['order_number']; ?></em></span><br>
								<?php $currency_detail = $this->Tool->country_info($order['Order']['currency']);?>
                                <span>Total: <em field="Total"><?php echo $currency_detail['Country']['prefix'];?> <?php echo $order['Order']['total'];?></em></span>
                            </div>
                            <div class="invoice">
                                Order:<em class="InvoiceNumber"><?php echo $order['Order']['order_number']; ?></em>
                            </div>
                            <div class="clear">
                            </div>
                            <div class="print_box">
                                <dl>
                                    <dt>Shipping Address:</dt>
                                    <div class="order_con_txt" id="shippingaddressdiv">
                                        <em class="profile_name" id="name"><?php echo $order['Order']['first_name'].' '.$order['Order']['middle_name'].' '.$order['Order']['last_name'];?></em>
                                        <br>
                                        <em class="profile_address1" id="address1"><?php echo $order['Order']['address'];?></em> 
										<em class="profile_address1" id="address2">- <?php echo $order['Order']['state']?><em>
                                        <br>
                                        <em class="profile_area" id="city"><?php echo $order['Order']['city'].', '. $order['Order']['zipcode'];?></em>
                                        <br>
                                        <em class="profile_area" id="country"><?php echo $order['Order']['country'];?></em>
                                        <br>
                                        <em class="profile_country" id="phone">Phone: <?php echo $order['Order']['tel'];?></em>
                                        <br>
                                    </div>
                                    <dt>Shipping Method:</dt>
                                    <dd field="ShipMethod">
										<?php
											$ship_type = GlobalVar::read('ship_type');
											foreach($ship_type as $ks => $vs){
												if($ks == $order['Order']['ship_type'])
												{
													echo $vs;
												}
											}
										?>
									</dd>
                                </dl>
                                <dl>
                                    <dt>Payment Method:</dt>
                                    <dd field="PayMethod">Paypal</dd>
                                </dl>
								<div class="clear"></div>
                                <div class="print_box_con">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"
                                           id="order_table">
                                        <thead>
                                        <tr>
                                            <th width="55%">
                                                Items Ordered
                                            </th>
											<th width="15%">
                                                Tracking Number
                                            </th>
                                            <th width="10%">
                                                Unit Price
                                            </th>
                                            <th width="10%">
                                                Quantity
                                            </th>
                                            <th width="10%">
                                                Subtotal
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($order['Product'] as $item): ?> 
                                        <tr>
                                            <td field="Name"
                                                href="">
                                               <?php
													$detail = json_decode($item['OrdersProduct']['detail'],true);
													echo $this->Tool->substr($item['name'],0,60).','. $detail['color'];
												?>
                                            </td>
											<td field="Tracking">
												<?php echo $this->Html->link($order['Order']['code_vnpost'],'http://www.vnpost.vn/TrackandTrace/tabid/130/n/'.$order['Order']['code_vnpost'].'/t/0/s/1/Default.aspx',array('target' => '_blank')); ?>	
											</td>
                                            <td field="Price"><?php echo $currency_detail['Country']['prefix'] . number_format(($item['OrdersProduct']['price'] * $currency_detail['Country']['rate']),2);?></td>
                                            <td field="Quantity"><?php echo $item['OrdersProduct']['quantity'];?></td>
                                            <td field="Total"><?php echo $currency_detail['Country']['prefix'] . number_format(($item['OrdersProduct']['price'] * $currency_detail['Country']['rate']) * $item['OrdersProduct']['quantity'],2) ;?></td>
                                        </tr>
										<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="print_box_con">
                                    <div class="print_box_price">
										<dl>
                                            <dt>Shipping cost:</dt>
                                            <span id="shiping_cost" class="db" style="line-height: 24px"><?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format(($order['Order']['shipping_cost']),2);?></span>
                                        </dl>	
										<dl>
                                            <dt>Coupon saving:</dt>
                                            <span id="coupon_saving" class="db" style="line-height: 24px">-  <?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($order['Order']['coupon_saving'],2);?></span>
                                        </dl>
                                        <dl>
                                            <dt>Total:</dt>
                                            <span id="LastTotal" class="db" style="line-height: 24px"><?php echo $currency_detail['Country']['prefix'];?> <?php echo number_format($order['Order']['total'],2);?></span>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 810px; background: #eee; height: 50px; line-height: 50px; font-size: 14px;
                text-align: center">
                                THANK YOU FOR YOUR BUSSINESS!
                            </div>
                            <div id="print_btnbox">
                                <input type="button" value="Print" class="btn_print" onclick="window.print();"></div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
    @charset "utf-8";
    /* CSS Document */
    #print					{width:810px; height:auto; margin:10px auto; border:#eee solid 5px; padding:10px;}
    #print_btnbox			{ height:30px; width:810px;}
    #print_head				{border-bottom:#ccc solid 1px; height:60px; padding-bottom:10px;}
    #print_head .logo		{width:290px; height:80px; background:url(/theme/Volga/images/logo.png) 10px 0 no-repeat; float:left;}
    #print_head .logo a		{width:120px; height:60px; display:block; cursor:pointer;}
    .print_box				{ width:778px; height:auto; overflow:hidden; padding:0; margin:5px 0; padding:10px 15px;background:#fafafa; border:#ddd solid 1px;}
    .address				{float:left; width:500px; padding:10px 0 0 15px;}
    .invoice				{float:right; width:200px; height:40px; text-align:right}
    .print_box dl			{ width:250px; float:left; height:auto; margin:}
    .print_box dl dt		{ font-size:13px; height:20px; color:#000;font-family:'Microsoft YaHei',Verdana,sans-serif;}
    .print_box dl dd		{ font-size:11px; line-height:18px;padding:0 0 10px 0;font-family:Segoe UI,"Microsoft YaHei",Verdana,sans-serif;}
    .print_box_con			{ width:760px; height:auto; margin:0 auto; overflow:hidden; border-top:#ddd solid 1px;}
    .print_box_title		{font-size:13px; line-height:15px; padding:10px 0; width:600px; float:left;}
    .print_box_title span	{font-size:13px;}
    .print_box_title span em{ color:#c00000;}
    .print_box_con table	{ text-align:left; padding-bottom:10px;}
    .print_box_con table th	{height:30px; font-size:12px;background-color:#f8f8f8; color:#000;}
    .print_box_con table td	{font-size:12px; padding:2px 0;}
    .print_box_price		{width:243px; height:auto; overflow:hidden; float:right; padding:10px;}
    .print_box_price dl		{width:243px; height:auto;overflow:hidden;}
    .print_box_price dl	dt,	.print_box_price dl	dd
    {height:20px; line-height:20px; float:left; font-size:13px; padding:2px;}
    .print_box_price dl	dt.add_border,	.print_box_price dl	dd.add_border
    {border-bottom: #aaa solid 1px; padding-bottom:5px;}
    .print_box_price dl	dt	{width:173px;text-align:right;}
    .print_box_price dl	dd	{width:60px;text-align:right;}
    .btn_print				{ float:right; cursor:pointer;background:#ccc; font-size:13px; border-bottom:#999 solid 1px; border-right:#999 solid 1px; border-top:#CCC solid 1px; border-left:#CCC solid 1px; padding:2px; text-align:center; width:60px;}
	.clear{clear: both;}
</style>