		<section class="payment">
			<h2 class="title-payment">Thông tin ngu?i nh?n</h2>
			<?php echo $this->Form->create('Order',array('action'=>'order_product'));?>
				
				<table>
					<tbody>
					<tr>
						<th></th>
						<td><span>(*) Thông tin b?t bu?c</span></td>
					</tr>
					<tr>
						<th>H? và tên:</th>
						<td>
						<?php echo $this->Form->input('full_name',array('type'=>'text','class'=>'txt-payment','required'=>'','label'=>false,'div' => false));?>
						<span> (*)</span></td>
					</tr>
					<tr>
						<th>S? di?n tho?i:</th>
						<td>
						<?php echo $this->Form->input('tel',array('class'=>'txt-payment','required'=>'','label'=>false,'div' => false,'type'=>'number'));?>
						
						<span> (*)</span></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td>
						<?php echo $this->Form->input('email',array('class'=>'txt-payment','required'=>'','label'=>false,'div' => false,'type'=>'email'));?>
						
						<span> (*)</span></td>
					</tr>
					<tr>
						<th>Ð?a ch?:</th>
						<td>
						<?php echo $this->Form->input('address',array('type'=>'text','class'=>'txt-payment','required'=>'','label'=>false,'div' => false));?>
						
						<span> (*)</span></td>
					</tr>
					<tr>
						<th>Ngày sinh:</th>
						<td>
						<?php echo $this->Form->input('date_of_birth',array('type'=>'date','class'=>'txt-payment','required'=>'','label'=>false,'div' => false));?>

						<span> (*)</span></td>
					</tr>
					<tr>
						<th>Gi?i tính:</th>
						<td>
							<section class="genter-payment">
								<input name="data[Order][sex]" required="" value="1" type="radio"><span>Nam</span>
								<input name="data[Order][sex]" required="" value="0" type="radio"><span>N?</span>
							</section><span> (*)</span>
						</td>
					</tr>
					<tr>
						<th style="vertical-align: top;padding: 10px 5px 5px 30px;">Ghi chú:</th>
						<td>
						<?php echo $this->Form->textarea('note',array('class'=>'area-payment'));?>
						</td>
					</tr>
					<tr>
						<th></th>
						<td>
						<?php echo $this->Form->input('G?i don d?t hàng',array('class'=>'btn-payment','type'=>'submit','label'=>false));?>
						
						</td>
					</tr>
				</tbody>
				</table>
			<?php echo $this->Form->end();?>
		</section>