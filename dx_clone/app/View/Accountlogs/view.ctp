<div class="accountlogs view">
<h2><?php echo __('Accountlog'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accountlog['User']['id'], array('controller' => 'users', 'action' => 'view', $accountlog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Number'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['order_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accountlog['Accountlog']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accountlog'), array('action' => 'edit', $accountlog['Accountlog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accountlog'), array('action' => 'delete', $accountlog['Accountlog']['id']), array(), __('Are you sure you want to delete # %s?', $accountlog['Accountlog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accountlogs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accountlog'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
