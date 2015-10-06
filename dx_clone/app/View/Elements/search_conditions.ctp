<aside class="custom-search">
	<h3 class="title-search">Tìm kiếm</h3>
	<?php echo $this->Form->create('Product', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
		<!--<section class="list-searched">
			<ul>
				<li>Chưa có tùy chọn nào!</li>						
			</ul>
		</section> end .list-searched -->
		
		<section class="list-search">
			<?php foreach($searchs as $s): ?>
				<section class="item-search">
					<h3><?php echo $s['Attribute']['name']; ?></h3>
					<ul>
						<?php foreach($s['Value'] as $v): ?>	
							<li><input name="data[Product][]" value="<?php echo $v['id']; ?>" type="checkbox"><?php echo $v['name']; ?></li>
						<?php endforeach; ?>
					</ul>
				</section><!-- end .item-search -->
			<?php endforeach; ?>
		</section><!-- end .list-search -->
		
		<?php echo $this->Form->button('Tìm kiếm', array('class' => 'sub-fillter', 'type' => 'submit')); ?>
	<?php echo $this->Form->end(); ?>
</aside><!-- end .custom-search -->