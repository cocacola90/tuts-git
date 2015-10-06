<?php 
//Xu ly attribute value de dua len server
	if(isset($this->request->data['Value']) && !empty($this->request->data['Value']))
	{
		// pr($this->request->data['Value']);
		foreach($this->request->data['Value'] as $attribute)
		{
			$arr_id[$attribute['attribute_id']][$attribute['id']] = $attribute['name'];
		}
		//Chuyen mang thanh chuoi
		//pr($arr_id);
		$value = serialize($arr_id);
		
	}
	else
	{
		$value = 0;
	}	
?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#add_image").on("click", function() {
			var count_input = $("#ajax_load_input .form-group").length;
			var next_id = count_input + 1;
			var text = "<div class='form-group'>";
					text += "<label class='col-sm-2 control-label no-padding-right'>" + "Ảnh " + next_id + ":</label>";
						text += "<div class='col-sm-10'>";
							text += "<input type='text' class='col-xs-7 col-sm-7' id='Image" + next_id + "'  name=\"data[Image][image_more][]\" />";
							text += "<input type='button' value='Chọn...'' onclick=\"LoiBrowseServer('Images:/', 'Image" + next_id + "');\" class='col-xs-2 col-sm-2' />";
						text += "</div>";
					text += "</div>";
				text += "</div>";

			$("#ajax_load_input").append(text);
		});

		//load attribute and attribute value to selectbox	
		var id = $("#ProductCategoryId option:selected").val();
		// alert(id);
		if(id != "")
		{
			$.ajax({
				type:'post',
				url: '<?php echo DOMAIN_ROOT; ?>/products/get_attribute_value',
				data:{category: id, value: '<?php echo $value; ?>', type: 'edit'},
				
				success:function(data)
				{
					$("#attribute_product").html(data);
				},
				
				error:function()
				{
					alert('loi');
				}
			});	
			$.ajax({
                type: 'post',
                url: '<?php echo DOMAIN_ROOT; ?>/products/load_related_product',
                dataType: 'html',
                data: {cat_id: id},

                success: function (data) {
                    $("#carousel-related").html(data);
                },

                error: function () {
                    alert('loi');
                }
            });
		}
		
		//load attribute and attribute value to selectbox
		$("#ProductCategoryId").on('change', function(){
			var id = this.value;
			if(id != "")
			{
				$.ajax({
					type:'post',
					url: '<?php echo DOMAIN_ROOT; ?>/products/get_attribute_value',
					dataType: 'html',
					data:{category: id, type: 'add'},
					
					success:function(data)
					{
						$("#attribute_product").html(data);
					},
					
					error:function()
					{
						alert('loi');
					}
				});
				$.ajax({
                    type:'post',
                    url: '<?php echo DOMAIN_ROOT; ?>/products/load_related_product',
                    dataType: 'html',
                    data:{cat_id: id},

                    success:function(data)
                    {
                        $("#carousel-related").html(data);
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

<script type="text/javascript">

	function LoiBrowseServer( startupPath, functionData )
	{
		var finder = new CKFinder();
		finder.basePath = '/';
		finder.startupPath = startupPath;
		finder.selectActionFunction = SetFileField;
		finder.selectActionData = functionData;

		finder.selectThumbnailActionFunction = ShowThumbnails;
		finder.popup();
	}

	function SetFileField( fileUrl, data )
	{
		document.getElementById( data["selectActionData"] ).value = fileUrl;
	}

	function ShowThumbnails( fileUrl, data )
	{
		var sFileName = this.getSelectedFile().name;
		document.getElementById( 'thumbnails' ).innerHTML +=
				'<div class="thumb">' +
					'<img src="' + fileUrl + '" />' +
					'<div class="caption">' +
						'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
					'</div>' +
				'</div>';

		document.getElementById( 'preview' ).style.display = "";
		return false;
	}
</script>
<div class="page-header">
    <h1>Sửa thông tin sản phẩm</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Product', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<div class="tabbable">
		<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
			<li class="active">
				<a data-toggle="tab" href="#info_product">Thông tin sản phẩm</a>
			</li>

			<li>
				<a data-toggle="tab" href="#image_product">Ảnh sản phẩm</a>
			</li>

			<li>
				<a data-toggle="tab" href="#attribute_product" id="get_attribute">Thuộc tính sản phẩm</a>
			</li>
			
			<li>
				<a data-toggle="tab" href="#related_product" id="get_related">Sản phẩm liên quan</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="info_product" class="tab-pane in active">
				<div class="form-group">
					<label for="" class="col-sm-2 control-label no-padding-right">Danh mục:</label>
					<div class="col-sm-10">
						<?php echo $this->Form->input('id'); ?>
						<?php echo $this->Form->input('category_id', array('empty' => '-- Vui lòng chọn một danh mục --','class' => 'col-xs-10 col-sm-10')); ?>
					</div>
				</div>
			    <div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Tên sản phẩm:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->input('name', array('class' => 'col-xs-10 col-sm-10')); ?>
			        </div>
			    </div>
				<div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Mã sản phẩm:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->input('sku', array('class' => 'col-xs-10 col-sm-10','type'=>'text')); ?>
			        </div>
			    </div>
				<div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Giá bán:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->input('price', array('class' => 'col-xs-10 col-sm-10')); ?>
			        </div>
			    </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Giá khuyến mại: (%)</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('discount', array('class' => 'col-xs-10 col-sm-10')); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Tình trạng khuyến mại</label>
                    <div class="col-sm-10">
                        <?php $discount_status = GlobalVar::read('discount_status');?>
                        <?php echo $this->Form->input('discount_status', array('class' => 'col-xs-10 col-sm-10','type' => 'select','options' => $discount_status,'default' => '0')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Khối lượng (gram):</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('weight', array('class' => 'col-xs-10 col-sm-10')); ?>
                    </div>
                </div>
				<div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Tặng kèm:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->textarea('sale_artifacts', array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
			        </div>
			    </div>

				<div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Mô tả ngắn:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->textarea('description', array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="col-sm-2 control-label no-padding-right">Mô tả chi tiết sản phẩm:</label>
			        <div class="col-sm-10">
			            <?php echo $this->Form->textarea('content', array('class' => 'col-xs-10 col-sm-10 ckeditor')); ?>
			        </div>
			    </div>
				
				<div class="form-group">
				    <label class="col-sm-2 control-label no-padding-right">Ảnh đại diện:</label>
				    <div class="col-sm-10">
						<?php echo $this->Form->input('thumbnail', array('class' => 'col-xs-7 col-sm-7', 'id' => 'thumbnail')); ?>
				        <input type="button" value="Chọn..." onclick="BrowseServer();" class="col-xs-2 col-sm-2" />
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
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Tags:</label>

                    <div class="col-sm-10">
                        <?php echo $this->Form->input('Tag', array('class' => 'col-xs-10 col-sm-10','type'=>'text','data-role'=>'tagsinput','value'=>$tags)); ?>

                    </div>
                </div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label no-padding-right">Sản phẩm nổi bật:</label>
					<div class="col-sm-10">
						<label>
							<?php echo $this->Form->checkbox('prominent', array('hiddenField' => false, 'class' => 'ace')); ?>
							<span class="lbl"> Hiển thị trên trang chủ</span>
						</label>
					</div>
				</div>
				<div class="form-group" id="select_type">
					<label class="col-sm-2 control-label no-padding-right">Trạng thái:</label>

					<div class="col-sm-10">
						<?php $status = GlobalVar::read('status');?>
						<?php echo $this->Form->input('status', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$status,'default'=>1)); ?>
					</div>
				</div>
				<div class="form-group" id="select_type">
					<label class="col-sm-2 control-label no-padding-right">Tình trạng:</label>

					<div class="col-sm-10">
						<?php $publish = GlobalVar::read('publish');?>
						<?php echo $this->Form->input('publish', array('class' => 'col-xs-10 col-sm-10','type'=>'select','options'=>$publish,'default'=>1)); ?>
					</div>
				</div>
				
			</div>
			<!-- End Info product -->

			<div id="image_product" class="tab-pane">
				<div id="ajax_load_input">

					<?php
						//Xu ly json va dua vao cac input
						$image = json_decode($this->request->data['Product']['image_more'], true);
						$count_image = count($image);
						$j = 0;
						for($i = 0; $i < $count_image; $i++)
						{
							$j++;
							echo '<div class="form-group">';
								echo '<label for="" class="col-sm-2 control-label no-padding-right">Ảnh ' . $j . ':</label>';
								echo '<div class="col-sm-10">';
									echo '<input type="text" class="col-xs-7 col-sm-7" id="Image0' . $j . '" name="data[Image][image_more][]" value="' . $image[$i] . '" />';
									echo '<input type="button" value="Chọn..." onclick="LoiBrowseServer(\'Images:/\', \'Image0' . $j . '\');" class="col-xs-2 col-sm-2" />';
								echo '</div>';
							echo '</div>';
						}
					?>
						
				</div>
				<div class="form-group">
					<input type="button" id="add_image" class="btn btn-primary col-sm-offset-2" value="Thêm ảnh mới" />
				</div>
			</div>

			<!-- end image product -->

			<div id="attribute_product" class="tab-pane">
				<?php //pr($this->request->data); ?>
					
			</div>
			
			<!-- end attribute product -->
			<!-- related product --->
			<div id="related_product" class="tab-pane">
				<div class="row">
					<div class="row">
						<div class="col-md-3">
							<div class="controls pull-right hidden-xs">
								<a class="left fa fa-chevron-left btn btn-success" href="#carousel-related"
								   data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-related" data-slide="next"></a>
							</div>
						</div>
					</div>
					<div id="carousel-related" class="carousel slide hidden-xs" data-ride="carousel">
						
					</div>
				</div>
			</div>
			<!-- end related product -->
<!--
			<div id="select_market" class="tab-pane">
				
				<div class="form-group">
					<?php foreach($markets as $market): ?>
					<div class="col-sm-10 <col-sm-offset-2></col-sm-offset-2>">
						<label>
							<?php echo $this->Form->checkbox('Market', array('hiddenField' => false, 'class' => 'ace', 'value' => $market['Market']['id'])); ?>
							<span class="lbl"><?php echo $market['Market']['name']; ?></span>
						</label>
					
					</div>
					<?php endforeach; ?>
				</div>
				
			</div>-->
	    </div>
	</div>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Sửa thông tin
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Nhập lại
        </button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<style>
	@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);

	.col-item {
		border: 1px solid #E1E1E1;
		border-radius: 5px;
		background: #FFF;
	}

	.col-item .photo img {
		margin: 0 auto;
		/* width: 100%; */
	}

	.col-item .info {
		padding: 10px;
		border-radius: 0 0 5px 5px;
		margin-top: 1px;
	}

	.col-item:hover .info {
		background-color: #F5F5DC;
	}

	.col-item .price {
		/*width: 50%;*/
		float: left;
		margin-top: 5px;
	}

	.col-item .price h5 {
		line-height: 20px;
		margin: 0;
	}

	.price-text-color {
		color: #219FD1;
	}

	.col-item .info .rating {
		color: #777;
	}

	.col-item .rating {
		/*width: 50%;*/
		float: left;
		font-size: 17px;
		text-align: right;
		line-height: 52px;
		margin-bottom: 10px;
		height: 52px;
	}

	.col-item .separator {
		border-top: 1px solid #E1E1E1;
	}

	.clear-left {
		clear: left;
	}

	.col-item .separator p {
		line-height: 20px;
		margin-bottom: 0;
		margin-top: 10px;
		text-align: center;
	}

	.col-item .separator p i {
		margin-right: 5px;
	}

	.col-item .btn-add {
		width: 50%;
		float: left;
	}

	.col-item .btn-add {
		border-right: 1px solid #E1E1E1;
	}

	.col-item .btn-details {
		width: 50%;
		float: left;
		padding-left: 10px;
	}

	.controls {
		margin-top: 20px;
	}

	[data-slide="prev"] {
		margin-right: 10px;
	}

</style>