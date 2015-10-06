<div id="load"></div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#view-list').click(function(){
				$('#load').html('<link href="<?php echo DOMAIN_ROOT; ?>/theme/Site/css/view-list.css" type="text/css" rel="stylesheet" />');
			});
			
			$('#view-girl').click(function(){
				$('#load').html('');
			});
		});
	</script>
<div id="breadcrumb">
	<ul>
		<li>
			<?php echo $this->Html->link('<span>' . $this->Html->image('icon-homeb.png') . '</span>', DOMAIN_ROOT, array('escape' => false)); ?>
		</li>
		<li>»</li>
		<li><a href="/sieu-thi/<?php echo $products[0]['Market'][0]['slug']; ?>.html"><?php echo $products[0]['Market'][0]['name']; ?></a></li>
		
	</ul>
</div>
<?php 
	$stt = 0; 
	if(!empty($products)): 
	
?>
	
	<?php foreach($products as $item):$stt++;?>
<?php if($stt === 1): ?>
<div class="list-product" style="margin-top: 30px;">
<?php endif; ?>
	<article>
		<section class="tooltip" id="<?php echo $item['Product']['id']; ?>">
			<figure>
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
				<figcaption>
					<?php 
						echo $this->Html->link(
							$item['Product']['name'],
							array(
								'controller' => 'products',
								'action' => 'view_product',
								'category' => $item['Category']['slug'],
								'product' => $item['Product']['slug'],
								'id' => $item['Product']['id'],
								'ext' => 'html'
							),
							array(
								'title' => $item['Product']['name'],
							)
						);
					?>

				</figcaption>
			</figure>
			<p class="description-product">If you want to know more information about our goods, terms, guarantee...</p>
			<strong><?php echo number_format($item['Product']['price'],0,',','.');?> đ</strong><div class="clear"></div>
			
			<a href="#" class="add-to-cart btn-info">Mua ngay</a>
			<a href="#" class="view-detail btn-info">Chi tiết</a>
		</section>
		<section class="hidden-tip" id="data_<?php echo $item['Product']['id']; ?>" style="display:none;">
			<h3><?php echo $item['Product']['name'];?></h3>
			<p class="price"><?php echo number_format($item['Product']['price'],0,',','.');?> đ</p>
			
			<p class="title-sale">Khuyến mãi:</p>
			<section class="content-sale">
			<?php echo $item['Product']['description'];?>
			
			</section>
		</section>
	</article>
		
<?php if($stt === 4): $stt = 0;?>
</div>
<?php  endif; ?>
	<?php endforeach;?>
<?php endif;?>
<?php if($stt > 0 && $stt < 4): ?>
</div>
<?php endif; ?>
<div class="clear:both;"></div>
<?php 
	if($this->Paginator->hasPage(2)){
		echo $this->element('pagination');
	}
?>
<!-- End .list-product -->