<div class="page-header">
    <h1>Danh sách sản phẩm</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>

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

        <th>Tác vụ</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
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
        <td>
            <div class="hidden-sm hidden-xs btn-group">

                <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $product['Product']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $product['Product']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>

            </div>

            <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                        <li>
                            <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $product['Product']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                        </li>

                        <li>
                            <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $product['Product']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
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