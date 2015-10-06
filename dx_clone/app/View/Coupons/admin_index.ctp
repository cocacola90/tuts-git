<div class="page-header">
    <h1>Danh sach review</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>

        <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
        <th><?php echo $this->Paginator->sort('code', 'Code'); ?></th>
        <th><?php echo $this->Paginator->sort('percent', 'Percent'); ?></th>
        <th><?php echo $this->Paginator->sort('description', 'Description'); ?></th>
        <th><?php echo $this->Paginator->sort('time_start', 'Time Start'); ?></th>
        <th><?php echo $this->Paginator->sort('time_end', 'Time End'); ?></th>
        <th>
            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
            <?php echo $this->Paginator->sort('created', 'Created'); ?>
        </th>
        <th>Tác vụ</th>

    </tr>
    </thead>

    <tbody>
    <?php foreach ($coupons as $coupon): ?>
        <tr>
            <td><?php echo h($coupon['Coupon']['id']); ?>&nbsp;</td>
            <td><?php echo h($coupon['Coupon']['code']); ?>&nbsp;</td>
            <td><?php echo h($coupon['Coupon']['percent']); ?>&nbsp;</td>
            <td><?php echo h($coupon['Coupon']['description']); ?>&nbsp;</td>
            <td class="hidden-480"><?php echo date('d/m/Y', $coupon['Coupon']['time_start']); ?></td>
            <td class="hidden-480"><?php echo date('d/m/Y', $coupon['Coupon']['time_end']); ?></td>
            <td class="hidden-480"><?php echo date('d/m/Y', $coupon['Coupon']['created']); ?></td>
            <td>
                <div class="hidden-sm hidden-xs btn-group">

                    <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $coupon['Coupon']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                    <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $coupon['Coupon']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>

                </div>

                <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <li>
                                <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $coupon['Coupon']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                            </li>

                            <li>
                                <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$coupon['Coupon']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>
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
