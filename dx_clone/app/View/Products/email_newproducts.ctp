<?php //pr($products); ?>
<div class="page-header">
    <h1>Danh sách sản phẩm</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>chon</th>
            <th><?php echo $this->Paginator->sort('category_id', 'Danh mục'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Tên sản phẩm'); ?></th>
			<th><?php echo $this->Paginator->sort('price', 'Giá tiền'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Trạng thái'); ?></th>
			<th><?php echo $this->Paginator->sort('prominent', 'SP nổi bật'); ?></th>
			<th><?php echo $this->Paginator->sort('publish', 'Tình trạng'); ?></th>
			<th><?php echo $this->Paginator->sort('thumbnail', 'Ảnh'); ?></th>
			
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>
        </tr>
    </thead>
    
    <tbody>
        <?php echo $this->Form->create('Email'); ?>
        <button type="submit" class="btn btn-success">Submit</button>
        <?php $d = 0; ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td class="center">
                    <label>
                        <?php //echo $product['Product']['id']; ?>              
                        <?php echo $this->Form->select($product['Product']['id'], array(1=>''),
                        array('multiple' => 'checkbox','class'=>'ace')); ?>
                        <span class="lbl"></span>
                        <?php $d++; ?>
                    </label>
                </td>
                <td><?php echo h($product['Category']['name']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
				<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
				<td>
					<?php
                		$type = $this->Tool->status('status');
                		echo $type[$product['Product']['status']];
                	?>
					
				</td>
				<td>
					<?php
                		$type = $this->Tool->status('status1');
                		echo $type[$product['Product']['prominent']];
                	?>
					
				</td>
				<td>
					<?php
                		$type = $this->Tool->status('publish');
                		echo $type[$product['Product']['publish']];
                	?>
				</td>
				<td><?php echo $this->Html->image($product['Product']['thumbnail'], array('width' => 80)); ?>&nbsp;</td>
                <td class="hidden-480"><?php echo date('d/m/Y', $product['Product']['created']); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php echo $this->Form->end(); ?>
    </tbody>
</table>
<?php echo $this->element('admin/paginator'); ?>