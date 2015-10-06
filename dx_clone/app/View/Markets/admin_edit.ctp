<div class="page-header">
    <h1>Sửa siêu thị</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Market', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tên siêu thị:</label>
        <div class="col-sm-10">
        	<?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Mô tả:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('meta_description', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Từ khóa:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('meta_keyword', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Sửa siêu thị
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Nhập lại
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>