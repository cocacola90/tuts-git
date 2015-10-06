<style>
	.checkbox {margin-left: 23px;}
</style>
<div class="page-header">
    <h1>Sửa thuộc tính</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Attribute', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<?php echo $this->Form->input('id'); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tên thuộc tính:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
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
	<div class="form-group">
	    <label class="col-sm-2 control-label no-padding-right">Ảnh đại diện:</label>
	    <div class="col-sm-10">
			<?php echo $this->Form->input('thumbnail', array('class' => 'col-xs-7 col-sm-7', 'id' => 'thumbnail')); ?>
	        <input type="button" value="Chọn..." onclick="BrowseServer();" class="col-xs-2 col-sm-2" />
	    </div>
	</div>
	
	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Trạng thái:</label>
		<div class="col-sm-10">
			<label>
				<?php echo $this->Form->checkbox('status', array('hiddenField' => false, 'class' => 'ace', 'checked' => true)); ?>
				<span class="lbl"> Hoạt động</span>
			</label>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Menu:</label>
		<div class="col-sm-10">
			<label>
				<?php echo $this->Form->checkbox('menu', array('hiddenField' => false, 'class' => 'ace')); ?>
				<span class="lbl"> Hiển thị trên menu</span>
			</label>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Tìm kiếm:</label>
		<div class="col-sm-10">
			<label>
				<?php echo $this->Form->checkbox('search', array('hiddenField' => false, 'class' => 'ace')); ?>
				<span class="lbl"> Cho phép tìm kiếm</span>
			</label>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Danh mục:</label>
		<div class="col-sm-10">
			<label for="">
				<?php echo $this->Form->input('Category', array('class' => '','type' => 'select','multiple' => 'checkbox','options' => $categories,'div'=>false)); ?> 
			</label>
			
		</div>
	</div>
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Thêm thuộc tính
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Nhập lại
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>