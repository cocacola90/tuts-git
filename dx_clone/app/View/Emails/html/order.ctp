<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<table border="1"> 
		<thead>
			<tr>
				
				<th>Tên sản phẩm</th>
				<th>Ảnh đại diện</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody> 
			<?php $total = 0;?>
						
			<?php foreach ($cart as $item): ?>
				
			
				<?php foreach($item as $key => $value):?>
				<?php //$data=$this->requestAction(array('controller'=>'products','action'=>'get_info',$value['name'])); ?> 
				<?php //pr($data); exit;?>
						<tr>
							<td align="center"> <?php echo $value['name'];?></td>
							<td> <img src="http://dx.nguyenpham.info/<?php echo $value['thumbnail']?>" alt="no-img" width="50" height="50"/></td>
							<td align="right"><?php echo $value['quantity'];?></td>
							<?php if($value['discount'] != 0):?>
								<td align="right"><?php echo number_format($value['price'] - ($value['price'] * ($value['discount'] / 100)),2);?> US$</td>
							<?php else:?>
								<td align="right"><?php echo number_format($value['price'],2);?> US$</td>
							<?php endif;?>
						</tr>
						<tr> 
							<td></td>
							<td>Tổng khối lượng: <?php echo $data_order['total_weight'];?> gram</td>
							<td>
								<?php 
								if($data_order['ship_type'] == 1){
									echo 'shipping to ' . $data_order['country'] . ' Smallpacket cost:';
								}
								else if($data_order['ship_type'] == 2)
								{
									echo 'shipping to ' . $data_order['country'] . ' Parcel cost:';
								}
								?>
							</td>
							
							<td> 
								<?php echo $this->Tool->number_format($data_order['shipping_cost']);?> US$
							</td>
						</tr>
					<?php  $total +=($value['price'] * $value['quantity']);?>
			
				<?php endforeach;?>
			
			 
			<?php endforeach;?>
				<tr>
					<td colspan="2"></td>
					<td>
						<b>Tổng tiền:</b>
					</td>
					
					<td align="center">
						 <strong class="total-cart"><?php if($total>0){ echo number_format($data_order['grand_total'],2);}?> US$</strong>
					</td>
				</tr>
		</tbody>
	</table>
</body>
</html>