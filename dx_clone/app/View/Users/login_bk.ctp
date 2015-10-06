<?php echo $this->Form->create('User',array('inputDefaults'=>array('label'=>false))); ?>
<?php echo $this->Form->input('username',array('placeholder'=>'Username')); ?>
<?php echo $this->Form->input('password',array('placeholder'=>'Password')); ?>
<?php echo $this->Form->input('Login',array('type'=>'submit')); ?>
<?php echo $this->Form->end();