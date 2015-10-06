<div class="giftcards form">
<?php echo $this->Form->create('Giftcard'); ?>
	<fieldset>
		<legend><?php echo __('Edit Giftcard'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Giftcard.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Giftcard.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Giftcards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
