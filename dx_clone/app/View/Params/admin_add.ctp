<div class="page-header">
    <h1>Add Params</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Param', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Type:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('type', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Name:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Value:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('value', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Description:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('description', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	<div class="form-group" id="select_type">
		<label class="col-sm-2 control-label no-padding-right">Status:</label>

		<div class="col-sm-10">
			<?php $status = GlobalVar::read('status');?>
			<?php echo $this->Form->input('status', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$status,'default'=>0)); ?>
		</div>
	</div>
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Add Param
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Refresh
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>