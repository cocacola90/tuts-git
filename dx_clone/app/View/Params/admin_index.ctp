<div class="page-header">
    <h1>List Params</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Param',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>
				<label class="pos-rel">
					<input type="checkbox" class="ace" id="checkAll">
					<span class="lbl"></span>
				</label>
			</th>
           	<th><?php echo $this->Paginator->sort('type', 'Loại'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Têm'); ?></th>
			<th><?php echo $this->Paginator->sort('value', 'Giá trị'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Ghi chú'); ?></th>
			<th><?php echo $this->Paginator->sort('status', 'Trạng thái'); ?></th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>

            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($params as $param): ?>
            <tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="data[Param][cid][]" class="ace" value="<?php echo $param['Param']['id'];?>">
						<span class="lbl"></span>
					</label>
				</td>
               	<td>
					<?php echo $param['Param']['type'];?>
				</td>
				
				<td>
					<?php echo $param['Param']['name'];?>
				</td>
				<td>
					<?php echo $param['Param']['value'];?>
				</td>
				<td>
					<?php echo $param['Param']['description'];?>
				</td>
				<td> 
				<?php
					if($param['Param']['status'] == 1)
					{
						echo $this->Form->postLink('<span class="label label-success">Hiển thị</span>', array('action' => 'unpublish', 'admin' => true, $param['Param']['id']), array('class' => 'congbo','escape'=>false));
					}
					elseif($param['Param']['status'] == 0)
					{
						echo $this->Form->postLink('<span class="label label-danger">Không hiển thị</span>', array('action' => 'publish', 'admin' => true, $param['Param']['id']), array('class' => 'kocongbo','escape'=>false));
					}
					
				?>
				</td>
                <td class="hidden-480"><?php echo date('d/m/Y',$param['Param']['created']); ?></td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'edit',$param['Param']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$param['Param']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?',$param['Param']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'edit',$param['Param']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>

                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$param['Param']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?',$param['Param']['id'])); ?>
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