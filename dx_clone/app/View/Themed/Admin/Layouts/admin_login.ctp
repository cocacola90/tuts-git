<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Shop Account Login & Register</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<?php
			echo $this->Html->meta('icon');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<!-- bootstrap & fontawesome -->
		<?php echo $this->Html->css('bootstrap.min'); ?>
		<?php echo $this->Html->css('/font-awesome/4.2.0/css/font-awesome.min'); ?>
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<?php echo $this->Html->css('/fonts/fonts.googleapis.com'); ?>
		<!-- ace styles -->
		<?php echo $this->Html->css('ace.min'); ?>
		<!--[if lte IE 9]>
		  <?php echo $this->Html->css('/ace-ie.min'); ?>
		<![endif]-->

		<!--[if lte IE 9]>
			<?php echo $this->Html->css('ace-part2.min'); ?>
		<![endif]-->
		<!-- ace settings handler -->
		<?php echo $this->Html->css('ace-rtl.min'); ?>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<?php echo $this->Html->script('html5shiv.min'); ?>
		<?php echo $this->Html->script('respond.min'); ?>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<?php echo $this->Session->flash();?>
						<?php echo $this->fetch('content');?>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<!--[if !IE]> -->
		<?php echo $this->Html->script('jquery.2.1.1.min'); ?>
		<!-- <![endif]-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/theme/Admin/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- basic scripts -->
		<?php echo $this->Html->script('jquery.mobile.custom.min'); ?>

		<?php echo $this->Html->script('bootstrap.min'); ?>
		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<!-- inline scripts related to this page -->
		<?php echo $this->Html->script('ace-elements.min'); ?>
		<?php echo $this->Html->script('ace.min'); ?>
	</body>
	<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
</html>
