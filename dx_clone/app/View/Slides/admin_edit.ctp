<div class="page-header">
    <h1>Sửa slide</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Slide', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<div class="form-group">
    <label for="" class="col-sm-2 control-label no-padding-right">Link:</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('id'); ?>
        <?php echo $this->Form->input('link', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Ảnh đại diện:</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('image', array('class' => 'col-xs-7 col-sm-7', 'id' => 'thumbnail')); ?>
        <input type="button" value="Chọn..." onclick="BrowseServer();" class="col-xs-2 col-sm-2"/>
    </div>
</div>

<div class="form-group">
    <label for="" class="col-sm-2 control-label no-padding-right">Trạng thái:</label>

    <div class="col-sm-10">
        <label>
            <?php echo $this->Form->checkbox('publish', array('hiddenField' => false, 'class' => 'ace', 'checked' =>
            true)); ?>
            <span class="lbl"> Hoạt động</span>
        </label>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label no-padding-right">Thể loại:</label>
    <?php $type_slide = GlobalVar::read('type_slide'); ?>
    <div class="col-sm-10">

        <?php
            echo $this->Form->input(
        'type', array('options' => $type_slide,'class' => 'form-control','empty' => '--
        Chọn loại Slide --')
        )
        ; ?>


    </div>
</div>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Sửa slide
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Nhập lại
        </button>
    </div>
</div>
<?php echo $this->Form->end(); ?>