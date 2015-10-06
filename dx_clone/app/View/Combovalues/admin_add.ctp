<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div class="row">
        <div class="box col-md-10">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Form add mức combo</h2>

                </div>
                <div class="box-content">
                    <?php echo $this->Form->create('Combovalue', array('role' => 'form')); ?>
                   
                    <div class="form-group">
                        <label for="title">Name:</label>
                        <?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'name', 'label' => false, 'div' => false)); ?>
                    </div>
					<div class="form-group">
                        <label for="title">From Quantity:</label>
                        <?php echo $this->Form->input('from_quantity', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'from_quantity', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">To Quantity:</label>
                        <?php echo $this->Form->input('to_quantity', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'to_quantity', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
                        <label for="title">Percent:</label>
                        <?php echo $this->Form->input('percent', array('type' => 'number', 'class' => 'form-control', 'placeholder' => 'Percent ...', 'label' => false, 'div' => false)); ?>

                    </div>
					<div class="form-group">
						<label>Status:</label>
						<?php $status = GlobalVar::read('status');?>
						<?php echo $this->Form->input('status', array('class' => 'form-control','type'=>'select','options'=>$status,'default'=>1,'label' => false)); ?>
						
					</div>
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <?php echo $this->Form->end() ?>

                </div>
            
        </div>
        <!--/span-->
    </div>
</div><!--/row-->
</div>










