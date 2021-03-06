<div class="page-header">
    <h1>Danh sách bài viết</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Post',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>
				<label class="pos-rel">
					<input type="checkbox" class="ace" id="checkAll">
					<span class="lbl"></span>
				</label>
			</th>
           	<th><?php echo $this->Paginator->sort('category_id', 'Danh mục'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Người đăng'); ?></th>
			<th><?php echo $this->Paginator->sort('title', 'Tiêu đề'); ?></th>
			<th><?php echo $this->Paginator->sort('thumbnail', 'Ảnh đại diện'); ?></th>
			
			<th><?php echo $this->Paginator->sort('status', 'Trạng thái'); ?></th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>

            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="data[Post][cid][]" class="ace" value="<?php echo $post['Post']['id'];?>">
						<span class="lbl"></span>
					</label>
				</td>
               	<td>
					<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				</td>
				<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
				<td>
					<?php if($post['Post']['thumbnail'] != ""):?>
						<?php echo $this->Html->image($post['Post']['thumbnail'], array('width' => 80)); ?>&nbsp;
					<?php else:?>
						
						<?php echo $this->Html->image('/theme/Volga/img/no-image.jpg',array('width'=>80));?>
					<?php endif;?>
				</td>
				
				<td>
					<?php if($post['Post']['status'] == 1){
							echo '<span class="label label-success">Hiển thị</span>';
					}else{
						echo '<span class="label label-danger">Không hiển thị</span>';
					}
					?>
				</td>
                <td class="hidden-480"><?php echo date('d/m/Y',$post['Post']['created']); ?></td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit',$post['Post']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$post['Post']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?',$post['Post']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit',$post['Post']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$post['Post']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?',$post['Post']['id'])); ?>
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

<div class="col-xs-6 col-sm-6">
	<div class="input-group">
		<span class="input-group-addon">
			<i class="ace-icon fa fa-check"></i>
		</span>
		<?php $status = GlobalVar::read('status');?>
		<?php echo $this->Form->input('status',array('class' => 'form-control search-query','type' => 'select','options' => $status,'empty' => '-- Chọn thiết lập -- '))?>
		<span class="input-group-btn">
			<button type="input" class="btn btn-purple btn-sm">
				<span class="ace-icon fa fa-cog icon-on-right bigger-110"></span>
				Thiết lập
			</button>
		</span>
	</div>
</div>

<?php echo $this->Form->end();?>