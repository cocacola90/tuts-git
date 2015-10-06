<div class="page-header">
    <h1>Danh sách giá trị thuộc tính</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th><?php echo $this->Paginator->sort('attribute_id', 'Tên thuộc tính'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Giá trị thuộc tính'); ?></th>
			<th><?php echo $this->Paginator->sort('publish', 'Trạng thái'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Values as $Value): ?>
            <tr>
                <td>
					<?php echo $this->Html->link($Value['Attribute']['name'], array('controller' => 'attributes', 'action' => 'view', $Value['Attribute']['id'])); ?>
				</td>
				<td><?php echo h($Value['Value']['name']); ?>&nbsp;</td>
				<td>
					<?php
                		$type = $this->Tool->status('status');
                		echo $type[$Value['Value']['publish']];
                	?>
				</td>
				<td><?php echo h($Value['Value']['created']); ?>&nbsp;</td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $Value['Value']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $Value['Value']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $Value['Value']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $Value['Value']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $Value['Value']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $Value['Value']['id'])); ?>
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