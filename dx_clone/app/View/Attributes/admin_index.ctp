<div class="page-header">
    <h1>Danh sách thuộc tính</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('name', 'Tên thuộc tính'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Hoạt động'); ?></th>
			<th><?php echo $this->Paginator->sort('menu', 'Menu'); ?></th>
			<th><?php echo $this->Paginator->sort('search', 'Tìm kiếm'); ?></th>
			<th><?php echo $this->Paginator->sort('thumbnail', 'Ảnh đại diện'); ?></th>

            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($attributes as $attribute): ?>
            <tr>
                <td><?php echo h($attribute['Attribute']['name']); ?></td>
                <td>
                	<?php
                		$type = $this->Tool->status('status');
                		echo $type[$attribute['Attribute']['status']];
                	?>
                </td>
                <td>
                	<?php
                		$type = $this->Tool->status('menu');
                		echo $type[$attribute['Attribute']['menu']];
                	?>
                </td>
                <td>
                	<?php
                		$type = $this->Tool->status('search');
                		echo $type[$attribute['Attribute']['search']];
                	?>
                </td>
                <td><?php echo $this->Html->image($attribute['Attribute']['thumbnail'], array('width' => 80)); ?></td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $attribute['Attribute']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $attribute['Attribute']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $attribute['Attribute']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $attribute['Attribute']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $attribute['Attribute']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $attribute['Attribute']['id'])); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->element('admin/paginator'); ?>