<div class="page-header">
    <h1>Sửa giá trị thuộc tính</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Value', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<?php echo $this->Form->input('id'); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Thuộc tính:</label>
        <div class="col-sm-10">
        	<label for="" class="control-label"><?php echo $this->request->data['Attribute']['name']; ?></label>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Giá trị của thuộc tính:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    
	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Trạng thái:</label>
		<div class="col-sm-10">
			<label>
				<?php echo $this->Form->checkbox('publish', array('hiddenField' => false, 'class' => 'ace', 'checked' => true)); ?>
				<span class="lbl"> Hoạt động</span>
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