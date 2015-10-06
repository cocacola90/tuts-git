<div class="page-header">
    <h1>Add Testimonial</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Testimonial', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Name:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('full_name', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Country:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('country', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Testimonial:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('testimonial', array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
        </div>
    </div>
	
    <div class="form-group">
	    <label class="col-sm-2 control-label no-padding-right">Thumbnail:</label>
	    <div class="col-sm-10">
			<?php echo $this->Form->input('thumbnail', array('class' => 'col-xs-7 col-sm-7', 'id' => 'thumbnail')); ?>
	        <input type="button" value="Chọn..." onclick="BrowseServer();" class="col-xs-2 col-sm-2" />
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
                Add Testimonial
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Refresh
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>