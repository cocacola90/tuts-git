<?php if($this->Paginator->hasPage < 1): ?>
	<?php $this->Paginator->options(array('url' => array('controller' => 'categories', 'action' => 'index', 'category' => 'dien-thoai', 'ext' => 'html'))); ?>
	<section class="pagination">
		<?php $params = $this->Paginator->params();?>
		<ul class="page">
			<?php
				if(isset($params['prevPage']) && $params['prevPage'] != '')
				{
					echo $this->Paginator->prev('< ' . __('Trang trước'), array('tag' => 'li'));
				} 
			?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li')); ?>
			<?php
				if(isset($params['nextPage']) && $params['nextPage'] != '')
				{
					echo $this->Paginator->next(__('Trang tiếp') . ' >', array('tag' => 'li'));
				} 
			?>
		</ul>
	</section>
<?php endif; ?>