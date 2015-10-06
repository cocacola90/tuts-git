<div class="attributes view">
<h2><?php echo __('Attribute'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attribute['Category']['name'], array('controller' => 'categories', 'action' => 'view', $attribute['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Description'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['meta_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['menu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Search'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['search']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumbnail'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['thumbnail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attribute'), array('action' => 'edit', $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attribute'), array('action' => 'delete', $attribute['Attribute']['id']), array(), __('Are you sure you want to delete # %s?', $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attributes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attribute'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attribute Values'), array('controller' => 'attribute_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attribute Value'), array('controller' => 'attribute_values', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attribute Values'); ?></h3>
	<?php if (!empty($attribute['Value'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Attribute Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Publish'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attribute['Value'] as $Value): ?>
		<tr>
			<td><?php echo $Value['id']; ?></td>
			<td><?php echo $Value['attribute_id']; ?></td>
			<td><?php echo $Value['name']; ?></td>
			<td><?php echo $Value['slug']; ?></td>
			<td><?php echo $Value['publish']; ?></td>
			<td><?php echo $Value['created']; ?></td>
			<td><?php echo $Value['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attribute_values', 'action' => 'view', $Value['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attribute_values', 'action' => 'edit', $Value['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attribute_values', 'action' => 'delete', $Value['id']), array(), __('Are you sure you want to delete # %s?', $Value['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attribute Value'), array('controller' => 'attribute_values', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
