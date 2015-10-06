<div class="accountlogs form">
<?php echo $this->Form->create('Accountlog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Accountlog'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('order_number');
		echo $this->Form->input('detail');
		echo $this->Form->input('point');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accountlog.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Accountlog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accountlogs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
