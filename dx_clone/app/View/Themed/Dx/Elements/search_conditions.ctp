<div class="col-lg-3 col-md-3 col-sm-4" id="left">
	<div class="box-left">
		<div id="filter">
			<h3>Tìm kiếm</h3>
		</div>
		<?php echo $this->Form->create('Product', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
		 <?php
			if(!isset($check_val)){
				$check_val = array();
			}
			foreach($searchs as $s): 
		?>
		<div class="box_filter wow fadeInUp animated">
			<p class="title_filter"><?php echo $s['Attribute']['name']; ?></p>
			
			<ul class="content_filter">
			<?php if($s['Attribute']['id'] == 13):?>
				<?php
				foreach($s['Value'] as $v):
				$arr_price = explode('|',$v['name']);
				$fromPrice = $arr_price[0] * $currency['rate'];
				$toPrice  = $arr_price[1] * $currency['rate'];
				?>	
					<?php if(in_array($v['id'],$check_val)):?>
						<li>
							<label>
								<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" checked="checked"/><span><?php echo $currency['prefix']. ' ' .$this->Tool->number_format($fromPrice) . ' ~ ' .$currency['prefix']. $this->Tool->number_format($toPrice)  ; ?></span>
							</label>
						</li>
						
					<?php else:?>
						<li>
							<label>
								<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" /><span><?php echo $currency['prefix']. ' ' .$this->Tool->number_format($fromPrice) . ' ~ ' .$currency['prefix']. $this->Tool->number_format($toPrice)  ; ?></span>
							</label>
						</li>
					<?php endif;?>
				<?php endforeach;?>
			<?php else:?>
				<?php foreach($s['Value'] as $v): ?>
				<?php if(in_array($v['id'],$check_val)):?>
					<li>
						<label>
							<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" checked="checked"/><span><?php echo $v['name']; ?></span>
						</label>
					</li>
					
				<?php else:?>
					<li>
						<label>
							<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox"/><span><?php echo $v['name']; ?></span>
						</label>
					</li>
				<?php endif;?>
				<?php endforeach; ?>
			<?php endif;?>

			   
			</ul>
		</div>

		<?php endforeach;?>
		<?php echo $this->Form->button('Tìm kiếm', array('class' => 'sub-fillter', 'type' => 'submit')); ?>
		<?php echo $this->Form->end();?>
	</div>
</div>

