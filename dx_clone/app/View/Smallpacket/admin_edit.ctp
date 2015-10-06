<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Gia cuoc Small Packet</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Form Gia cuoc Small Packet</h2>

                </div>
                <div class="box-content">
                    <?php echo $this->Form->create('Smallpacket', array('role' => 'form')); ?>
                    <?php echo $this->Form->input('id');?>
					<div class="form-group">
                        <label for="title">Cân nặng từ :</label>
                        <?php echo $this->Form->input('to_weight', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'cân nặng từ...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Cân nặng đến :</label>
                        <?php echo $this->Form->input('from_weight', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Cân nặng đến...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Giá cước châu Á :</label>
                        <?php echo $this->Form->input('asia', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước châu Á ...', 'label' => false, 'div' => false)); ?>

                    </div>
					
					<div class="form-group">
                        <label for="title">Giá cước châu Âu :</label>
                        <?php echo $this->Form->input('europe', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước châu Âu...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Giá cước châu Phi :</label>
                        <?php echo $this->Form->input('africa', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước châu Phi...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Giá cước châu Mỹ :</label>
                        <?php echo $this->Form->input('america', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước châu Mỹ...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Giá cước các nước APPU :</label>
                        <?php echo $this->Form->input('appu', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Giá cước các nước APPU...', 'label' => false, 'div' => false)); ?>

                    </div>
					
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="data[Smallpacket][status]" id="inlineRadio1" value="1"> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="data[Smallpacket][status]" id="inlineRadio2" value="0" > Banned
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










