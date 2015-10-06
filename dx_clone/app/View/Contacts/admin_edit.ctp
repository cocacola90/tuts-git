<div class="page-header">
    <h1>Phản hồi</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Contact', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<?php echo $this->Form->input('id');?>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
			<?php echo $this->Form->input('full_name',array('class'=>'form-control','readonly' =>true));?>
        </div>
    </div>
<div class="form-group" >
    <label class="col-sm-2 control-label no-padding-right">To:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('email', array('class' => 'col-xs-10 col-sm-10','type'=>'text','value'=>$this->request->data['Contact']['email'],'readonly' => true)); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Subject:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('subject', array('class' => 'col-xs-10 col-sm-10','type'=>'text')); ?>
    </div>
</div>
<div class="form-group" >

    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Message:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->textarea('message',array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
    </div>

</div>
<div class="form-group" id="select_type">
    <label class="col-sm-2 control-label no-padding-right">Trạng thái:</label>

    <div class="col-sm-10">
        <?php $status = GlobalVar::read('contact_status');?>
        <?php echo $this->Form->input('status', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$status,'default'=>1)); ?>
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
