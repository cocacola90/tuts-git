<div class="giftcards view">
<h2><?php echo __('Giftcard'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($giftcard['Giftcard']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($giftcard['Giftcard']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($giftcard['User']['id'], array('controller' => 'users', 'action' => 'view', $giftcard['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Used'); ?></dt>
		<dd>
			<?php echo h($giftcard['Giftcard']['used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($giftcard['Giftcard']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Giftcard'), array('action' => 'edit', $giftcard['Giftcard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Giftcard'), array('action' => 'delete', $giftcard['Giftcard']['id']), array(), __('Are you sure you want to delete # %s?', $giftcard['Giftcard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Giftcards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Giftcard'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
