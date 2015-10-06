<div class="page-header">
    <h1>Thêm thành viên mới</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('User', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tên nhóm:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('group_id', array('empty' => '-- Vui lòng chọn nhóm --', 'class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tên đăng nhập:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('username', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Mật khẩu:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('password', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Email:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('email', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Thêm thành viên
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Nhập lại
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>