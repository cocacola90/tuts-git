<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Country</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
               
                <div class="box-content">
                    <?php echo $this->Form->create('Country', array('role' => 'form')); ?>
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
						<label for="title">Cờ hiệu :</label>
						
							<?php echo $this->Form->input('flag', array('class' => 'form-control', 'id' => 'thumbnail','label' => false, 'div' => false)); ?>
							<input type="button" value="Chọn..." onclick="BrowseServer();" class="col-xs-2 col-sm-2" />
					</div>
					</br>
					<div class="form-group">
                        <label for="title">Tiền tệ :</label>
                        <?php echo $this->Form->input('currency', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Currency...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Ký hiệu tiền tệ :</label>
                        <?php echo $this->Form->input('prefix', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Tên nước...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Rate (USD/Currency) :</label>
                        <?php echo $this->Form->input('rate', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'rate...', 'label' => false, 'div' => false)); ?>
                    </div>
					<div class="form-group">
                        <?php $continent = GlobalVar::read('continent'); ?>
                        <?php
                        echo $this->Form->input(
                                'continent', array('options' => $continent,'class' => 'form-control', 'label' => 'Trạng thái','empty' => '-- Chọn châu lục--')
                        );
                        ?>
                    </div>
					<div class="form-group">
                        <?php $status = GlobalVar::read('status'); ?>
                        <?php
                        echo $this->Form->input(
                                'status', array('options' => $status, 'default' => '1', 'class' => 'form-control', 'label' => 'Trạng thái')
                        );
                        ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg">Lưu dữ liệu</button>
                    <?php echo $this->Form->end() ?>

                </div>
            
        </div>
        <!--/span-->
    </div>
</div><!--/row-->
</div>










