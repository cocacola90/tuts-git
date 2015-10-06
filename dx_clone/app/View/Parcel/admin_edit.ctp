<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Gia cuoc Parcel</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Form Gia cuoc Parcel</h2>

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
                    <?php echo $this->Form->create('Parcel', array('role' => 'form')); ?>
                    <?php echo $this->Form->input('id');?>
                    <div class="form-group">
                        <label for="title">Code :</label>
                        <?php echo $this->Form->input('code', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'code...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Tên nước :</label>
                        <?php echo $this->Form->input('country', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Tên nước...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Giá cước cho 500gr đầu :</label>
                        <?php echo $this->Form->input('first_weight', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước cho 500gr đầu ...', 'label' => false, 'div' => false)); ?>

                    </div>
					
					<div class="form-group">
                        <label for="title">Giá cước cho 500gr tiếp theo :</label>
                        <?php echo $this->Form->input('next_weight', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước cho 500gr tiếp theo...', 'label' => false, 'div' => false)); ?>

                    </div>
					
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="data[Parcel][status]" id="inlineRadio1" value="1"> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="data[Parcel][status]" id="inlineRadio2" value="0" > Banned
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Lưu dữ liệu</button>
                    <?php echo $this->Form->end() ?>

                </div>
            
        </div>
        <!--/span-->
    </div>
</div><!--/row-->
</div>










