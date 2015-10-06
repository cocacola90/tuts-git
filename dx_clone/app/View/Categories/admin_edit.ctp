<div class="page-header">
    <h1>Sửa danh mục</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Category', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Danh mục cha:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->select('parent_id',$categories, array('class' => 'col-xs-10 col-sm-10','empty' => '--- Chọn danh mục ---')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tên danh mục:</label>
        <div class="col-sm-10">
        	<?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Loại danh mục:</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('type', array('type' => 'select', 'options' => $this->Tool->status('type'), 'empty' => '-- Vui lòng chọn loại danh mục --','class' => 'col-xs-10 col-sm-10')); ?>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Mô tả:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('description', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Từ khóa:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('keyword', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	
	<div class="form-group" id="select_type">
		<label class="col-sm-2 control-label no-padding-right">Trạng thái:</label>

		<div class="col-sm-10">
			<?php $status = GlobalVar::read('status');?>
			<?php echo $this->Form->input('status', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$status)); ?>
		</div>
	</div>
	<div class="form-group" id="select_type">
		<label class="col-sm-2 control-label no-padding-right">HIển thị trên menu chính:</label>

		<div class="col-sm-10">
			<?php $main = GlobalVar::read('main');?>
			<?php echo $this->Form->input('main', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$main)); ?>
		</div>
	</div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Thêm danh mục
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Nhập lại
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>