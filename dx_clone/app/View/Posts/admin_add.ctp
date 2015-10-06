<div class="page-header">
    <h1>Thêm bài viết mới</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Post', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Danh mục:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('category_id', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	<?php echo $this->Form->input('user_id', array('type' => 'hidden','class' => 'col-xs-10 col-sm-10','value'=> $user_info['id'])); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Tiêu đề bài viết:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input('title', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Thẻ mô tả (meta description):</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('meta_description', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Từ khóa (meta keyword):</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('meta_keyword', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Mô tả:</label>
        <div class="col-sm-10">
            <?php echo $this->Form->textarea('description', array('class' => 'col-xs-10 col-sm-10')); ?>
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label no-padding-right">Nội dung:</label>
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
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Thêm bài viết
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Nhập lại
            </button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>