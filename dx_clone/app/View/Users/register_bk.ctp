<?php echo $this->Form->create('User',array('id'=>'formID','inputDefaults'=>array('label'=>false))); ?>
<?php echo $this->Form->input('email',array('placeholder'=>'Email','class'=>'validate[required,custom[email]]')); ?>
<?php echo $this->Form->input('username',array('placeholder'=>'username','class'=>'validate[required],minSize[4]')); ?>
<?php echo $this->Form->input('password',array('placeholder'=>'password','class'=>'validate[required]')); ?>
<?php echo $this->Form->input('re_password',array('placeholder'=>'retype password','type'=>'password','class'=>'validate[required]')); ?>
<?php echo $this->Form->input('firstname',array('placeholder'=>'firstname','class'=>'validate[required]')); ?>
<?php echo $this->Form->input('lastname',array('placeholder'=>'lastname','class'=>'validate[required]')); ?>
 <?php
echo $this->Html->image($this->Html->url(array('controller' => 'users', 'action' => 'captcha'), true), array('id' => 'img-captcha', 'vspace' => 2));
echo '<p><a id="a-reload">Chọn mã kiểm tra khác.</a></p>';
?>
 <?php echo $this->Form->input('User.captcha', array('autocomplete' => 'off', 'label' => 'Captcha', 'class' => 'form-control validate[required]','placeholder'=>'Nhập mã xác nhận')); ?>
<?php echo $this->Form->input('Register',array('type'=>'submit')); ?>
<?php echo $this->Form->end(); ?>
<script>
	$('#a-reload').click(function () {
		var $captcha = $("#img-captcha");
		$captcha.attr('src', $captcha.attr('src') + '?' + Math.random());
		return false;
	});
</script>