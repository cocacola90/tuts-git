<div class="page-header">
    <h1>Thêm Combo</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Combo', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<div class="form-group" id="select_type">
    <label class="col-sm-2 control-label no-padding-right">Loại combo:</label>

    <div class="col-sm-10">
        <?php $type_combo = GlobalVar::read('type_combo');?>
        <?php echo $this->Form->input('type', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$type_combo,'empty'=>'-- Chọn loại combo --')); ?>
    </div>
</div>

<div class="form-group" id="select_product" style="display: none">

    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Sản phẩm</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('product_id',array('label' => FALSE, 'class'=>'chosen-select form-control col-xs-10 col-sm-10','type' => 'select', 'options' => $products,'empty'=>'Chọn sản phẩm...','style' => 'display: none;','id' => 'form-field-select-3')); ?>

    </div>

</div>


<div class="form-group" id="select_category" style="display: none">

    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Mục hàng hóa</label>
    <div class="col-sm-10">
        <?php echo $this->Form->input('category_id',array('label' => FALSE, 'class'=>'chosen-select form-control col-xs-10 col-sm-10','type' => 'select', 'options' => $categories,'empty'=>'Chọn mục hàng...','style' => 'display: none;','id' => 'form-field-select-3')); ?>

    </div>

</div>


<!--div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Số sản phẩm cho combo</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('quantity', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right">Phần trăm giảm giá</label>

    <div class="col-sm-10">
        <?php echo $this->Form->input('percent', array('class' => 'col-xs-10 col-sm-10')); ?>
    </div>
</div>-->
<div class="form-group" id="select_type">
    <label class="col-sm-2 control-label no-padding-right">Trạng thái:</label>

    <div class="col-sm-10">
        <?php $status = GlobalVar::read('status');?>
        <?php echo $this->Form->input('status', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$status,'default'=>1)); ?>
    </div>
</div>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Thêm combo
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Nhập lại
        </button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<script type="text/javascript">

    $(document).ready(function(){
        $('#select_type').change(function(){
            var type = $('#ComboType').val();
            alert(type);
            if(type == 1)
            {
                $( "#select_product" ).show();
            }else if(type == 2)
            {
                $( "#select_category" ).show();
            }

        });
    });
</script>