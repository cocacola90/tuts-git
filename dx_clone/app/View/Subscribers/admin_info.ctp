<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    <?php echo $this->Form->create('Email', array('role' => 'form')); ?>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <?php echo $this->Form->input('subject', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'title...', 'label' => false, 'div' => false)); ?>

                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <?php echo $this->Form->textarea('content', array('class' => 'form-control ckeditor', 'placeholder' => 'content...', 'label' => false, 'div' => false)); ?>

                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->radio('type', array(0 => 'Thông tin chung <br>' ,1 => 'Sản phẩm mới   ', 2 => 'Sản phẩm khuyến mại') ,array('legend' => false, 'value'=>0, 'separator' => '<br>')); ?>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <?php echo $this->Form->end() ?>

                </div>
            
        </div>
        <!--/span-->
    </div>
</div><!--/row-->
</div>