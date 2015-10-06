<div class="page-header">
    <h1>Nhóm thành viên</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
        <th><?php echo $this->Paginator->sort('type'); ?></th>
        <th><?php echo $this->Paginator->sort('name', 'Combo'); ?></th>
        <th><?php echo $this->Paginator->sort('status'); ?></th>
        <th>
            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
            <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
        </th>

        <th>Tác vụ</th>
    </tr>
    </thead>
	
    <tbody>
    <?php foreach ($combos as $combo): ?>
        <tr>
            <td>
                <?php echo h($combo['Combo']['id']); ?>
            </td>
            <td>
                <?php if($combo['Combo']['type'] == 1){
					echo 'Combo cho sản phẩm';
				}elseif($combo['Combo']['type'] == 2){
					echo 'Combo cho danh mục';
				}
				?>
            </td>
            <td>
                <?php
                    if($combo['Combo']['type'] == 1){
                          echo $combo['Product']['name'];
                    }
                    else{
                        echo $combo['Category']['name'];
                    }
                ;?>
            </td>
           
			<td> 
			<?php
				if($combo['Combo']['status'] == 1){
					  echo '<span class="label label-success">Hoạt động</span>';
				}
				else{
					echo '<span class="label label-danger">Không hoạt động</span>';
				}
			;?>
			</td>
			
            <td class="hidden-480"><?php echo date('d/m/Y', $combo['Combo']['created']); ?></td>
            <td>
                <div class="hidden-sm hidden-xs btn-group">

                    <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $combo['Combo']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                    <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $combo['Combo']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $combo['Combo']['id'])); ?>

                </div>

                <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <li>
                                <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $combo['Combo']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                            </li>

                            <li>
                                <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$combo['Combo']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $combo['Combo']['id'])); ?>
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

