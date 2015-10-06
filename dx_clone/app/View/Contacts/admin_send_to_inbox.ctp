<div class="page-header">
    <h1>Phản hồi</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Contact', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Subject:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('subject', array('class' => 'col-xs-10 col-sm-10','type'=>'text')); ?>
    </div>
</div>
<div class="form-group" >

    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Message:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->textarea('content',array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
    </div>

</div>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
			Gửi
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Nhập lại
        </button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
