<div class="page-header">
    <h1>Danh mục tin tức</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Category',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>
				<label class="pos-rel">
					<input type="checkbox" class="ace" id="checkAll">
					<span class="lbl"></span>
				</label>
			</th>
			<th><?php echo $this->Paginator->sort('STT'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Tên danh mục'); ?></th>
            <th><?php echo $this->Paginator->sort('slug'); ?></th>
            <th><?php echo $this->Paginator->sort('type', 'Loại danh mục'); ?></th>
			<th><?php echo $this->Paginator->sort('main', 'Menu chính'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Trạng thái'); ?></th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>

            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1 ; foreach ($categories as $category): ?>
            <tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="data[Category][cid][]" class="ace" value="<?php echo $category['Category']['id'];?>">
						<span class="lbl"></span>
					</label>
				</td>
				<td> 
					<?php echo $i++; ?>
				</td>
                <td>
				<?php if($category['Category']['parent_id'] != null):?>
				__
				<?php endif;?>	
                    <?php echo h($category['Category']['name']); ?>
                </td>
                <td><?php echo h($category['Category']['slug']); ?></td>
                <td>
                	<?php
                		$type = $this->Tool->status('type');
                		echo $type[$category['Category']['type']];
                	?>
                </td>
				<td>
					<?php if($category['Category']['main'] == 1){
							echo '<span class="label label-success">Hiển thị</span>';
					}else{
						echo '<span class="label label-danger">Không hiển thị</span>';
					}
					?>
				</td>
				<td>
					<?php if($category['Category']['status'] == 1){
							echo '<span class="label label-success">Hiển thị</span>';
					}else{
						echo '<span class="label label-danger">Không hiển thị</span>';
					}
					?>
				</td>
                <td class="hidden-480"><?php echo date('d/m/Y', $category['Category']['created']); ?></td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $category['Category']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit', $category['Category']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $category['Category']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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
<div class="clearfix"></div>

<div class="col-xs-12 col-sm-12">
	<div class="col-xs-4 col-sm-4">
		
		<?php $status = GlobalVar::read('status');?>
		<?php echo $this->Form->input('status',array('class' => 'form-control search-query','type' => 'select','options' => $status,'empty' => '-- Chọn thiết lập trạng thái -- '))?>
	</div>
	<!--<div class="col-xs-4 col-sm-4">
		
		<?php $main = GlobalVar::read('main');?>
		<?php echo $this->Form->input('main',array('class' => 'form-control search-query','type' => 'select','options' => $main,'empty' => '-- Chọn thiết lập menu chính -- '))?>
	</div> -->
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