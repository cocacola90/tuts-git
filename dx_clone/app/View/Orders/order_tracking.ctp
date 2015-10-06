<div class="banner-breadcrumb">
	<div class="container">
		<div class="inner-wrap">
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
					<span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li class="active">My orders</li>
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
						<?php echo $this->Session->flash('mss_order');?>
						</div>
						<div class="proopc-finalpage">
							<div class="proopc-row">
								<h1 class="cart-page-title">My Orders</h1>
							</div>
							
							<div id="proopc-pricelist">
								<fieldset>
									<table class="cart-summary proopc-table-striped">
									<thead>
									<tr>
										<th class="col-price" align="left">
											Order Number
										</th>
										<th class="col-price" align="left">
											Order Date
										</th>
										<th class="col-price" align="left">
											Grand Total
										</th>
										<th class="col-price" align="center">
											Tracking Number
										</th>
										<th class="col-qty" align="right">
											Payment Status
										</th>
										<th class="col-action" align="right">
											Operation
										</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($orders as $order): ?> 
									<tr valign="top" class="sectiontableentry1 my-order">
										<td class="col-price" align="left">
											<?php echo $this->Html->link($order['Order']['order_number'],'/orders/order_detail/'.$order['Order']['order_number']) ?>
										</td>
										<td class="col-price" align="left">
											<?php echo date('d-m-Y H:i:s',$order['Order']['created']); ?>
										</td>
										<td class="col-price" align="center">
											<div class="PricebasePrice" style="display : block;">
												<span class="PricebasePrice"><?php echo $this->Tool->number_format($order['Order']['total']) .' '. $order['Order']['currency']; ?> </span>
											</div>
										</td>
										<td class="col-qty cart-p-qty" align="right">
											<?php echo $this->Html->link($order['Order']['code_vnpost'],'http://www.vnpost.vn/TrackandTrace/tabid/130/n/'.$order['Order']['code_vnpost'].'/t/0/s/1/Default.aspx',array('target' => '_blank')); ?>	
										</td>
										<td class="col-discount" align="right">
											<?php echo $order['Order']['pay_status'];?>
										</td>
										<td> 
											<a operation="View" class="cblueulin" href="/orders/order_detail/<?php echo $order['Order']['order_number'];?>">View</a>
											<?php if($order['Order']['pay_status'] == ""):?>
												<a operation="View" class="cblueulin" href="/orders/re_checkout/<?php echo $order['Order']['order_number'];?>">Pay Now</a>
												<?php echo $this->Html->link('Cancel', array('action' => 'cancel_order', $order['Order']['order_number']), array( 'title' => 'Cancel this order'), __('Are you sure you want cancel this order # %s?', $order['Order']['order_number']));?>
											<?php endif;?>
										</td>
									</tr>
									<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
									<?php endforeach;?>
									<?php
										if($this->Paginator->hasPage(2)){
										$this->Paginator->options(array(
										'url' => array(
										'controller' => 'orders',
											'action' => 'order_tracking',
											'sort' => 'created', 'direction' => 'desc'

										)
										));
										echo $this->element('pagination');
										};?>
									</tbody>
									</table>
								</fieldset>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
