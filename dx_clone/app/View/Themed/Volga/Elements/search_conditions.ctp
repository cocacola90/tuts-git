<div class="span3 left-mod">
	<div class="hidden-phone"></div>
    
		<div id="vp_product_filter">
 	    <?php echo $this->Form->create('Product', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
		 <?php
			if(!isset($check_val)){
				$check_val = array();
			}
			foreach($searchs as $s): 
		?>
			<div class="moduletable cont">
				<div class="mods">
					<div class="bghelper">
						<h3><?php echo $s['Attribute']['name']; ?></h3>
						<ul id="mfgFilter">
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
            								<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" checked="checked"/><p><?php echo $currency['prefix']. ' ' .$this->Tool->number_format($fromPrice) . ' ~ ' .$currency['prefix']. $this->Tool->number_format($toPrice)  ; ?></p>
            							</label>
            						</li>
            						
            					<?php else:?>
            						<li>
            							<label>
            								<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" /><p><?php echo $currency['prefix']. ' ' .$this->Tool->number_format($fromPrice) . ' ~ ' .$currency['prefix']. $this->Tool->number_format($toPrice)  ; ?></p>
            							</label>
            						</li>
            					<?php endif;?>
            				<?php endforeach;?>
            			<?php else:?>
            				<?php foreach($s['Value'] as $v): ?>
            				<?php if(in_array($v['id'],$check_val)):?>
            					<li>
            						<label>
            							<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox" checked="checked"/><p><?php echo $v['name']; ?></p>
            						</label>
            					</li>
            					
            				<?php else:?>
            					<li>
            						<label>
            							<input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox"/><p><?php echo $v['name']; ?></p>
            						</label>
            					</li>
            				<?php endif;?>
            				<?php endforeach; ?>
            			<?php endif;?>
						</ul>
					</div>
				</div>
			</div>
			
		<?php endforeach;?>
		<?php echo $this->Form->button('Search', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>
		<?php echo $this->Form->end();?>
			
    </div>
    <div class="hidden-phone">
    </div>
</div>