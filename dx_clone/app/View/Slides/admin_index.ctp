<div class="page-header">
    <h1>Danh sách slide</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Slide',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>
				<label class="pos-rel">
					<input type="checkbox" class="ace" id="checkAll">
					<span class="lbl"></span>
				</label>
			</th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('publish'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($slides as $slide): ?>
            <tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="data[Slide][cid][]" class="ace" value="<?php echo $slide['Slide']['id'];?>">
						<span class="lbl"></span>
					</label>
				</td>
                <td><?php echo h($slide['Slide']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->image($slide['Slide']['image'], array('width' => 200)); ?>&nbsp;</td>
				<td><?php echo h($slide['Slide']['link']); ?>&nbsp;</td>
                <td>
                    <?php
                        $type_slide = GlobalVar::read('type_slide');
                        foreach($type_slide as $k => $val)
                        {
                            if($k == $slide['Slide']['type'])
                            {
                                echo $val;
                            }
                        }
                    ?>
                </td>
				<td><?php if($slide['Slide']['publish'] == 1){
						echo '<span class="label label-success"> Hiển thị</span>';
					}else if($slide['Slide']['publish'] == 0){
						echo '<span class="label label-danger">Không hiển thị</span>';
					};
					?>&nbsp;</td>
				<td><?php echo date('d/m/Y', $slide['Slide']['created']); ?>&nbsp;</td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $slide['Slide']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $slide['Slide']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $slide['Slide']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $slide['Slide']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?>
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
<div class="col-xs-12 col-sm-12">
	<div class="col-xs-4 col-sm-4">
		
		<?php $status = GlobalVar::read('status');?>
		<?php echo $this->Form->input('status',array('class' => 'form-control search-query','type' => 'select','options' => $status,'empty' => '-- Chọn thiết lập trạng thái -- '))?>
	</div>
	<div class="col-xs-4 col-sm-4"> 
		<span class="input-group-btn">
			<button type="input" class="btn btn-purple btn-sm">
				<span class="ace-icon fa fa-cog icon-on-right bigger-110"></span>
				Thiết lập
			</button>
		</span>
	</div>
</div>

<?php echo $this->Form->end();?>