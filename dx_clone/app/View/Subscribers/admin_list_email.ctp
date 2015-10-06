<div class="page-header">
    <h1>Subscriber</h1>
</div><!-- /.page-header -->

<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
		
        <th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
        <th><?php echo $this->Paginator->sort('email','Email'); ?></th>
        <th>
            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
            <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
        </th>

        <th>Tác vụ</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($list_email as $item): ?>
        <tr>
            <td>
                <?php echo h($item['Subscriber']['id']); ?>
            </td>
            <td>
                <?php echo h($item['Subscriber']['email']); ?>
            </td>
			
            <td class="hidden-480"><?php echo date('d/m/Y H:i', $item['Subscriber']['created']); ?></td>
            <td>
                <div class="hidden-sm hidden-xs btn-group">
					<?php //echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $item['Subscriber']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Edit')); ?>
                
                    <?php echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $item['Subscriber']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $item['Subscriber']['id'])); ?>

                </div>
				<div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <!--<li>
								<?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $item['Subscriber']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Edit')); ?>
                            </li>-->
							<li> 
								 <?php echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $item['Subscriber']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $item['Subscriber']['id'])); ?>
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

