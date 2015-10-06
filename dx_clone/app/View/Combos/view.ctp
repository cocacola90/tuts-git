<div class="combos view">
<h2><?php echo __('Combo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($combo['Product']['name'], array('controller' => 'products', 'action' => 'view', $combo['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($combo['Category']['name'], array('controller' => 'categories', 'action' => 'view', $combo['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percent'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['percent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Discount'); ?></dt>
		<dd>
			<?php echo h($combo['Combo']['type_discount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Combo'), array('action' => 'edit', $combo['Combo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Combo'), array('action' => 'delete', $combo['Combo']['id']), array(), __('Are you sure you want to delete # %s?', $combo['Combo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Combos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Combo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
