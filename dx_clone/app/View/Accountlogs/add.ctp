<div class="accountlogs form">
<?php echo $this->Form->create('Accountlog'); ?>
	<fieldset>
		<legend><?php echo __('Add Accountlog'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Accountlogs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
