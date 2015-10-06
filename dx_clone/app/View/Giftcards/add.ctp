<div class="giftcards form">
<?php echo $this->Form->create('Giftcard'); ?>
	<fieldset>
		<legend><?php echo __('Add Giftcard'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('user_id');
		echo $this->Form->input('used');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Giftcards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
