<table border="1">
	<tr>
		<td>Name</td>
		<td>Image</td>
		<td>Information</td>
		<td>Price</td>
	</tr>
	<?php foreach ($products as $product ): ?>
	<tr>
		<td><?php echo $this->Html->link($product['Product']['name'],'#'); ?></td>
		<td><?php echo $this->Html->image('http://dx.nguyenpham.info'.$product['Product']['thumbnail'],array('height'=>200,'width'=>200)); ?></td>
		<td><?php echo $product['Product']['description']; ?></td>
		<td><?php echo $this->Number->currency($product['Product']['price'], 'USD '); ?></td>
	</tr>
<?php endforeach; ?>
</table>