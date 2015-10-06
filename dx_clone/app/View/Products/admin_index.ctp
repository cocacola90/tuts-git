<fieldset>
	<legend>Tìm kiếm</legend>
	<?php echo $this->Form->create('Product', array('novalidate' => true,'url'=>'get_keyword','class'=>'form-horizontal')); ?>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Tên thiết bị</label>
		<?php echo $this->Form->input('name',array('novalidate' => true,'type'=>'text','class'=>'col-xs-10 col-sm-5','label'=>false)); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Mã sản phẩm</label>
                <?php echo $this->Form->input('sku',array('novalidate' => true,'type'=>'text','label'=>FALSE,'class'=>'col-xs-10 col-sm-5')); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Danh mục</label>
                <?php echo $this->Form->input('category_id',array('novalidate' => true,'type'=>'select','label'=>FALSE,'options'=>$categories,'class'=>'col-xs-10 col-sm-5','empty' => 'Chọn danh mục')); ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4 ">
            <div class="form-group">
                <label class="col-sm-4">Nhập từ ngày</label>
		<?php echo $this->Form->input('fromdate',array('id' =>'id-date-picker-1','type'=>'text','data-date-format'=>'mm/dd/yyyy','label'=>FALSE,'class'=>'col-xs-10 col-sm-5 date-picker-start')); ?>
            </div>
        </div>
        <div class="col-xs-4 ">
            <div class="form-group">
                <label class="col-sm-4">Nhập đến ngày</label>
		<?php echo $this->Form->input('todate',array('id' =>'id-date-picker-2','type'=>'text','data-date-format'=>'mm/dd/yyyy','label'=>false,'class'=>'col-xs-10 col-sm-5 date-picker-end')); ?>
            </div>
        </div>
        <div class="clearfix"></div>
	<div class="div_search center">
		<?php echo $this->Form->button('Tìm kiếm',array('class'=>'btn btn-info'));?>
	</div>

		<?php echo $this->Form->end();?>
	
</fieldset>
	

<div class="page-header">
    <h1>Danh sách sản phẩm</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Product',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th>
				<label class="pos-rel">
					<input type="checkbox" class="ace" id="checkAll">
					<span class="lbl"></span>
				</label>
			</th>
			<th><?php echo $this->Paginator->sort('sku', 'Mã sản phẩm'); ?></th>
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
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="data[Product][cid][]" class="ace" value="<?php echo $product['Product']['id'];?>">
						<span class="lbl"></span>
					</label>
				</td>
				<td><?php echo h($product['Product']['sku']); ?>&nbsp;</td>
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
                        <?php echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $product['Product']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>

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
<script>
    //link
    $(document).ready(function(){
        $('.date-picker-start').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        $('.date-picker-end').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    });

</script>