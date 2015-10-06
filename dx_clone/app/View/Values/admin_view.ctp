<div class="Values view">
<h2><?php echo __('Attribute Value'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo $this->Html->link($Value['Attribute']['name'], array('controller' => 'attributes', 'action' => 'view', $Value['Attribute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($Value['Value']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attribute Value'), array('action' => 'edit', $Value['Value']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attribute Value'), array('action' => 'delete', $Value['Value']['id']), array(), __('Are you sure you want to delete # %s?', $Value['Value']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attribute Values'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attribute Value'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attributes'), array('controller' => 'attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>
