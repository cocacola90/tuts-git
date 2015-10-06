<!-- Modal --> 
<div class="modal fade" id="formRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
		<?php echo $this->Form->create('User', array('action' => 'register', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Username:</label>
					<?php echo $this->Form->input('username', array('placeholder' => 'Enter your username', 'class' => 'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label for="">Password:</label>
					<?php echo $this->Form->input('password', array('placeholder' => 'Enter your password', 'class' => 'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label for="">Confirm password:</label>
					<?php echo $this->Form->input('re_password', array('placeholder' => 'Enter your password', 'class' => 'form-control', 'type' => 'password')); ?>
				</div>
				
				<div class="form-group">
					<label for="">Email:</label>
					<?php echo $this->Form->input('email', array('placeholder' => 'Enter your email', 'class' => 'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label for="">First name:</label>
					<?php echo $this->Form->input('firstname', array('placeholder' => 'Enter your first name', 'class' => 'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label for="">Last name:</label>
					<?php echo $this->Form->input('lastname', array('placeholder' => 'Enter your last name', 'class' => 'form-control')); ?>
				</div>
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" data-target="#formLogin">Close</button>
				<?php echo $this->Form->button('Register', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>