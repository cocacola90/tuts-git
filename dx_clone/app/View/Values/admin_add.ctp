<script type="text/javascript">
	$(document).ready(function() {
		
		$("#categories").on('change', function(){
			var id = this.value;
			if(id != "")
			{
				$.ajax({
					type:'post',
					url: '<?php echo DOMAIN_ROOT; ?>/values/get_list_attributes',
					dataType: 'html',
					data:{category: id},
					
					success:function(data)
					{
						$("#ajax_load").html(data);
					},
					
					error:function()
					{
						alert('loi');
					}
				});	
			}
			
		});
	});
</script>

<div class="page-header">
    <h1>Thêm giá trị thuộc tính</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Value', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<div class="form-group">
		<label for="" class="col-sm-2 control-label no-padding-right">Danh mục:</label>
		<div class="col-sm-10">
			<?php echo $this->Form->input('category_id', array('empty' => '-- Vui lòng chọn một danh mục --', 'options' => $categories, 'class' => 'col-xs-10 col-sm-10', 'id' => 'categories')); ?>
		</div>
	</div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Thuộc tính:</label>
        <div class="col-sm-10">
        	<div id="ajax_load">
	            <select name="" id="">
	            	<option value="">-- Vui lòng chọn một danh mục ở trên --</option>
	            </select>
	        </div>
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