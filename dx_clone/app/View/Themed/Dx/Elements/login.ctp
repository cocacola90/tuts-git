<!-- Modal -->
<div class="modal fade" id="formLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
		<?php echo $this->Form->create('User', array('action' => 'login', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Username:</label>
					<?php echo $this->Form->input('username', array('placeholder' => 'Enter your username', 'class' => 'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label for="">Password:</label>
					<?php echo $this->Form->input('password', array('placeholder' => 'Enter your password', 'class' => 'form-control')); ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" data-target="#formLogin">Close</button>
				<?php echo $this->Form->button('Login', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>