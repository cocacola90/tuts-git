<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="en-gb" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="en-gb" dir="ltr"><![endif]-->
<!--[if gt IE 8]><html class="ie" lang="en-gb" dir="ltr"><![endif]-->
<!--[if !IE]><!-->
<html dir="ltr" lang="en-gb">
<!--<![endif]-->
<head>
<base href=""/>
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo $title_for_layout;?></title>
<?php echo $this->Html->meta('icon');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php echo $this->Html->css('/templates/vp_supermart/css/cache/template.min');?>
<?php echo $this->Html->css('/modules/mod_bt_login/tmpl/css/style2.0');?>
<?php //echo $this->Html->css('/media/mod_languages/css/template');?>
<?php echo $this->Html->css('page');?>
<?php echo $this->Html->css('sweetalert');?>
<?php echo $this->Html->css('/plugins/system/vponepagecheckout/assets/css/light-checkout');?>
<?php echo $this->Html->css('/plugins/system/vponepagecheckout/assets/css/responsive-procheckout');?>
<?php //echo $this->Html->css('jquery.datetimepicker');?>
<?php echo $this->Html->css('validationEngine.jquery');?>
<?php echo $this->Html->css('template');?>

<?php echo $this->Html->script('languages/jquery.validationEngine-en');?>
<?php echo $this->Html->script('jquery.validationEngine');?>
<?php echo $this->Html->script('sweetalert.min'); ?>
<?php echo $this->Html->script('/templates/vp_supermart/js/cache/template.min');?>
<?php echo $this->Html->script('jquery.mobile.customized.min');?>
<?php echo $this->Html->script('vmprices');?>
<?php echo $this->Html->script('/modules/mod_bt_login/tmpl/js/default');?>
<?php //echo $this->Html->script('jquery.datetimepicker');?>
<?php echo $this->Html->script('shipping_cost');?>
<script type="text/javascript">
$(document).ready(function(){
	// binds form submission and fields to the validation engine
	$("#formID").validationEngine();
	$("#form-register").validationEngine();
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-close, #overlay').click(function ()
		{
			$('#loi_popup').hide(200);
		});
		$('#login_link').on('click', function() 
		{
			$('#form-login').show();
			$('#form-register').hide();
			$('#loi_popup').show(200);
		});
		$('#register_link').on('click', function() 
		{
			$('#form-login').hide();
			$('#form-register').show();
			$('#loi_popup').show(200);
		});
		
		//popup message
		var atext = $('.alert').text();
		if(atext)
		{
			$(".alert-info").fadeOut(12000);
			$(".alert-success").fadeOut(12000);
			$(".alert-danger").fadeOut(12000);
		
		}
	});
	function explode(delimiter, string, limit) {
        //  discuss at: http://phpjs.org/functions/explode/
        // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        //   example 1: explode(' ', 'Kevin van Zonneveld');
        //   returns 1: {0: 'Kevin', 1: 'van', 2: 'Zonneveld'}

        if (arguments.length < 2 || typeof delimiter === 'undefined' || typeof string === 'undefined') return null;
        if (delimiter === '' || delimiter === false || delimiter === null) return false;
        if (typeof delimiter === 'function' || typeof delimiter === 'object' || typeof string === 'function' || typeof string ===
            'object') {
            return {
                0: ''
            };
        }
        if (delimiter === true) delimiter = '1';

        // Here we go...
        delimiter += '';
        string += '';

        var s = string.split(delimiter);

        if (typeof limit === 'undefined') return s;

        // Support for limit
        if (limit === 0) limit = 1;

        // Positive limit
        if (limit > 0) {
            if (limit >= s.length) return s;
            return s.slice(0, limit - 1)
                .concat([s.slice(limit - 1)
                    .join(delimiter)
                ]);
        }

        // Negative limit
        if (-limit >= s.length) return [];

        s.splice(s.length + limit);
        return s;
    }
</script>
<style type="text/css">
	
	@media (max-width: 767px) {
		.cart-p-list td:nth-of-type(1):before { content: 'Name'; }
		.cart-p-list td:nth-of-type(2):before { content: 'Weight'; }
		.cart-p-list td:nth-of-type(3):before { content: 'Price: '; }
		.cart-p-list td:nth-of-type(4):before { content: 'Quantity/Update'; }
		.cart-p-list td:nth-of-type(5):before { content: 'Discount'; }
		.cart-p-list td:nth-of-type(6):before { content: 'Total'; }
		.cart-sub-total td:nth-of-type(1):before { content: ''; }
		.cart-sub-total td:nth-of-type(2):before { content: 'Discount'; }
		.cart-sub-total td:nth-of-type(3):before { content: 'Total'; }
		.tax-per-bill td:nth-of-type(1):before { content: ''; }
		.tax-per-bill td:nth-of-type(2):before { content: 'Total'; }	
		.grand-total td:nth-of-type(1):before { content: ''; }
		.grand-total td:nth-of-type(2):before { content: 'Discount'; }
		.grand-total td:nth-of-type(3):before { content: 'Total'; }			
		.grand-total-p-currency td:nth-of-type(1):before { content: ''; }
		.grand-total-p-currency td:nth-of-type(2):before { content: 'Total'; }						
	}	
	@media (max-width: 767px) {
		.my-order td:nth-of-type(1):before { content: 'Order Number'; }
		.my-order td:nth-of-type(2):before { content: 'Order date'; }
		.my-order td:nth-of-type(3):before { content: 'Grand Total: '; }
		.my-order td:nth-of-type(4):before { content: 'NUMBER VNPOST'; }
		.my-order td:nth-of-type(5):before { content: 'STATUS PAYPAL'; }			
	}
	@media (max-width: 767px) {
		.cart-coupon-row td:nth-of-type(1):before { content: ''; }
		.cart-coupon-row td:nth-of-type(2):before { content: 'Total'; }
	}	
	@media (max-width: 767px) {
		.shipping-row td:nth-of-type(1):before { content: ''; }
		
	}	
	@media (max-width: 767px) {
		.payment-row td:nth-of-type(1):before { content: ''; }
		
	}
</style>
<?php   
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
?>

<?php
	$country_info = $this->Session->read('Country'); // dat nuoc ban dang song
	$currency_vn = $this->Session->read('currency_vn');
    $destination = $country_info['Country']['code'];
    $continent = $country_info['Country']['continent'];
    $currency = $this->Session->read('Currency'); //nguoi dung chon menh gia tien
    $to_currency = $currency['code'];
    $rate = $currency['rate'];
	
?>
	
<script type="text/javascript">
    var destination = "<?php echo $destination;?>";
    var root_continent = "<?php echo $continent;?>";
    var root_to_currency = "<?php echo $to_currency;?>";
    var root_rate = "<?php echo $rate;?>";
    var rate_vnd = "<?php echo $currency_vn['Country']['rate'];?>";
	var symbol = "<?php echo $currency['prefix'];?>";
</script>

<script type="text/javascript">
/* window.addEvent('load', function() {
				new JCaption('img.caption');
			}); */
	//<!--[CDATA[
	if(typeof vmSiteurl === 'undefined') {
		vmSiteurl = 'http://dx.nguyenpham.info';
	}
	if(typeof vmLang === 'undefined') {
		vmLang = '';
	}	
	if(typeof usefancy === 'undefined') {
		usefancy = 'oldie';
	}
	//]]-->
	vpSEF = 1;
	vpCompareText = 'was added to compare list';
	jQuery(document).ready(function($){
	$('#header .menu.nav > li:last-child').addClass('pull-right');});

  </script>

<!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="apple-touch-icon-precomposed" href="/theme/Volga/templates/vp_supermart/apple-touch-icon-57x57.png"/>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/theme/Volga/templates/vp_supermart/apple-touch-icon-72x72.png"/>
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/theme/Volga/templates/vp_supermart/apple-touch-icon-114x114.png"/>
<!--[if lte IE 8]>
   <!--<style>
    {behavior:url(/theme/Volga/templates/vp_supermart/js/pie/PIE.htc);}
   </style>
  <![endif]-->
</head>
<body class="supermart megamart style-1">
	<!-- facebook-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=686318281473379";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- end facebook--> 
<div class="theme-container container">
<?php echo $this->element('top_bar');?>
<?php echo $this->element('header');?>
	<div id="overall">
    <?php echo $this->Session->flash();?>
    <?php echo $this->fetch('content');?>
	<?php //echo $this->element('info_manufacture')?>	
	<?php echo $this->element('bottom');?>
	<?php echo $this->element('footer');?>
		
	</div>
	<div class="visible-desktop">
		<div class="vp-navigation-top">
			<div id="scroll-top" title="Back to top">
				Top
			</div>
		</div>
	</div>
</div>
<?php if (!isset($user_info) || empty($user_info)): ?>
<div id="loi_popup">
	<div id="overlay"></div>

	<div class="form-setup btl-content-login-block" id="form-login">
		<a href="javascript:void" class="btn-close" title="Close form"></a>
		<div id="btl-content-login-block" class="btl-content-login-block">
            <!-- if not integrated any component -->
			<?php echo $this->Form->create('User',array('url' => '/login','inputDefaults'=>array('div'=>false, 'label' => false),'class'=>'btl-formlogin')); ?>
    
                <div id="btl-login-in-process"></div>
                <h3>Login to your account</h3>
                <div id="register-link">
                    Don't have an account yet? <a href="/register"> Register now! </a></div>
                <div class="btl-error" id="btl-login-error"></div>
                <div class="btl-field">
                    <div class="btl-label">E-Mail *</div>
                    <div class="btl-input">
                       <?php echo $this->Form->input('email',array('placeholder'=>'E-Mail','type' => 'text')); ?>
                    </div>
                </div>
                <div class="btl-field">
                    <div class="btl-label">Password *</div>
                    <div class="btl-input">
                        <?php echo $this->Form->input('password',array('placeholder'=>'Password','type' => 'password')); ?> 
                    </div>
                </div>
                <div class="clear"></div>
                <div class="btl-field">
                    <div class="btl-input" id="btl-input-remember">
                        <input id="btl-checkbox-remember"  type="checkbox" name="remember" value="yes" />
                        Remember Me	
					</div>
                </div>
                <div class="clear"></div>
                <div class="btl-buttonsubmit">
				<?php echo $this->Form->submit('Log in', array('class' => 'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
			<ul id ="bt_ul">
				<li>
					<a href="/users/forgot_password">
						Forgot your password?</a>
				</li>
			</ul>
				<!-- if integrated with one component -->
			</div>
		</div>
		
	</div>

	<div class="form-setup" id="form-register">
		<a href="javascript:void" class="btn-close" title="Close form"></a>
		<?php echo $this->Form->create('User',array('url' => '/register','inputDefaults'=>array('id'=>'formID', 'div'=>false, 'label' => false))); ?>
		<div class="form-group">
			<label for="">Email</label>
			<?php echo $this->Form->input('email',array('placeholder'=>'Email', 'class' => 'form-control validate[required,custom[email]]','id'=>'reg_email')); ?>
			<div id="emailstatus"></div>
		</div>
		
		<!--<div class="form-group">
			<label for="">Username</label>
			<?php echo $this->Form->input('username',array('placeholder'=>'Username', 'class' => 'form-control validate[required,custom[onlyLetterNumber]],minSize[4]','id' => 'reg_username')); ?>
			<div id="namestatus"></div>			
		</div>
		-->
		<div class="form-group">
			<label for="">Password</label>
			<?php echo $this->Form->input('password',array('placeholder'=>'Password', 'class' => 'form-control validate[required]')); ?> 
		</div>

		<div class="form-group">
			<label for="">Confirm Password</label>
			<?php echo $this->Form->input('re_password',array('placeholder'=>'Confirm Password', 'class' => 'form-control validate[required]', 'type' => 'password')); ?> 
		</div>
		
		<div class="form-group">
			<label for="">First Name</label>
			<?php echo $this->Form->input('firstname',array('placeholder'=>'First Name', 'class' => 'form-control validate[required]')); ?> 
		</div>
		
		<div class="form-group">
			<label for="">Last Name</label>
			<?php echo $this->Form->input('lastname',array('placeholder'=>'Last Name', 'class' => 'form-control validate[required]')); ?> 
		</div>
	
		<div class="form-group">
			<label for="">Captcha</label>
			<?php echo $this->Html->image($this->Html->url(array('controller' => 'users', 'action' => 'captcha'), true), array('id' => 'img-captcha-pop', 'vspace' => 2));
			echo '<p><a id="a-reload-pop">reload</a></p>'; ?>
			
		</div>
		<div class="form-group">
			<label for="">Captcha</label>
			<?php echo $this->Form->input('User.captcha', array('autocomplete' => 'off', 'label' => false, 'class' => 'form-control validate[required]','placeholder'=>'captcha')); ?> 
		</div>
		<div class="form-group">
			<?php echo $this->Form->button('Register', array('class' => 'btn btn-primary','onclick'=>'onfrmRegisterclick()')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
<!-- Validate register -->
<script type="text/javascript"> 

	var blemail = false;
	function onfrmRegisterclick(){
		if(blemail){
			  document.forms["form-register"].submit();
		}else{
			alert("Bạn nhập thông tin mật khẩu hoặc tên không đủ tiêu chuẩn \n Hoặc tên đăng ký ,mã xác nhận sai!");
		}
	}
	$(document).ready(function() {
		$("#reg_email").change(function() { 
		var email = $("#reg_email").val();
		$("#emailstatus").html('<img src="/theme/Volga/img/loader.gif" align="absmiddle">&nbsp;Checking...');
		$.ajax({  
				type: "POST",  
				url: "/users/checkemail",  
				data: "email="+ email,  
				success: function(msg){  
					if(msg == 'OK')
						{ 
						 $("#emailstatus").html('');
						 blemail = true;
					}  
					else  
						{  
						$('#emailstatus').html('<i style="color: red; font-size:10px; margin-left: 50%;">Email already exists.</i>');
						blemail = false;
					}  
					//});
				} 
			});
		});	
		/* $("#reg_username").change(function() { 
		var username = $("#reg_username").val();
		$("#namestatus").html('<img src="/theme/Volga/img/loader.gif" align="absmiddle">&nbsp;Checking...');
		$.ajax({  
				type: "POST",  
				url: "/users/checkusername",  
				data: "username="+ username,  
				success: function(msg){  
					if(msg == 'OK')
						{ 
						$("#namestatus").html('');
						bluser = true;
					}  
					else  
						{  
						$('#namestatus').html('<i style="color: red; font-size:10px; margin-left: 50%;">Username already exist.</i>');
						bluser = false;
					}  
					//});
				} 
			});
		});	 */
	});

</script>

<?php endif; ?>

<script>
	$('#a-reload-pop').click(function () {
		var $captcha = $("#img-captcha-pop");
		$captcha.attr('src', $captcha.attr('src') + '?' + Math.random());
		return false;
	});
	/* function loi_sweet(title, type, time)
	    {
	        swal({   title: title, 
	            type: type,   
	            timer: time,   
	            showButton: true 
	        });
	    } */
	function loi_sweet(title, type, time)
	{
		swal({  
			title: title, 
			type: type,   
			timer: time,   
			showButton: true ,
			showCancelButton: true,   
			confirmButtonColor: '#FE5252',   
			cancelButtonColor: '#333333',   
			confirmButtonText: 'Show Cart',
			cancelButtonText: 'Continue Shopping',
			closeOnConfirm: false,   
			closeOnCancel: true
		},
			function(isConfirm){   
				if (isConfirm) {     
					 window.location = "/cart-details.html";
				}  
			}
		);
	}
</script>
<!--Start of Zopim Live Chat Script-->
<script lang="javascript">var ga = document.createElement('script'); ga.type = 'text/javascript';ga.src = 'http://chat.anhtonghop.com/cclient?cid=55fbcfcc480a97a83192faa8';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);</script>	
			
<!--End of Zopim Live Chat Script-->
</body>
</html>