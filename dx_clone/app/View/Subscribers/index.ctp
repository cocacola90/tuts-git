<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Form Add News</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Form Elements</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php echo $this->Form->create('Subscriber', array('role' => 'form')); ?>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <?php echo $this->Form->input('subject', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'title...', 'label' => false, 'div' => false)); ?>

                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <?php echo $this->Form->textarea('content', array('class' => 'form-control ckeditor', 'placeholder' => 'content...', 'label' => false, 'div' => false)); ?>

                    </div>


                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="data[Subscriber][type]" id="inlineRadio1" value="1"> Sản phẩm mới nhất
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="data[Subscriber][type]" id="inlineRadio2" value="2" > Sản phẩm được quan tâm
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <?php echo $this->Form->end() ?>

                </div>
            
        </div>
        <!--/span-->
    </div>
</div><!--/row-->
</div>
