<div class="page-header">
    <h1>Add Coupon</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Coupon', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">code:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('code', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Percent:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('percent', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Description:</label>
    <div class="col-sm-10">
        <?php echo $this->Form->textarea('description', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>
<div class="form-group" id="select_type">
    <label class="col-sm-2 control-label no-padding-right">Time start:</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('time_start',array('class'=>'col-xs-5 col-sm-5 date-picker-start','id' =>'id-date-picker-1','type'=>'text','data-date-format'=>'mm/dd/yyyy'));?>
    </div>
</div>
<div class="form-group" id="select_type">
    <label class="col-sm-2 control-label no-padding-right">Time End:</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('time_end',array('class'=>'col-xs-5 col-sm-5 date-picker-end','id' =>'id-date-picker-2','type'=>'text','data-date-format'=>'mm/dd/yyyy'));?>
    </div>
</div>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Add Coupon
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Refresh
        </button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
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
