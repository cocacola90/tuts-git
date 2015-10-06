<?php $list_product = $this->requestAction('/products/get_list_item');?>

<div id="left-product">
	<p id="title-left">Danh mục sản phẩm</p>
	<?php if(!empty($list_product)):?>
	<?php foreach($list_product as $item):?>
	<div class="related-product">
			<?php 
				echo $this->Html->link(
					$this->Html->image($item['Product']['thumbnail']),
					array(
						'controller' => 'products',
						'action' => 'view_product',
						'category' => $item['Category']['slug'],
						'product' => $item['Product']['slug'],
						'id' => $item['Product']['id'],
						'ext' => 'html'
					),
					array(
						'escape' => false,
						'class' => 'img-productc'
					)
				);
			?>
	
	
	
	
	
		<!--<a href="">
		
			<img src="<?php echo $item['Product']['thumbnail'];?>" alt="" />
			<b><?php echo $item['Product']['name'];?></b>
		</a>-->
		
		<p class="price-related"><?php echo number_format($item['Product']['price']);?> VND</p>
		<div class="wish">
			<a href="#" class="icon-wish wishlist"></a>
			<?php echo $this->Html->link('',array('controller'=>'products','action'=>'add_cart',$item['Product']['id']),array('class'=>'icon-wish add-cart'));?>
			<!--<a href="#" class="icon-wish add-cart"></a>-->
		</div>
	</div>
	<?php endforeach;?>
	<?php endif;?>
	
</div>