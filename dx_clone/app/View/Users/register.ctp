<?php
if (isset($currency)) {
    $to_currency = $currency['code'];
} else {
    $to_currency = "";
}

if (isset($country_info)) {
    $destination = $country_info['Country']['code'];
    $continent = $country_info['Country']['continent'];
}
$advs = $this->requestAction('/slides/get_advs');
?>
<div class="banner-breadcrumb">		
    <div class="container">
    	<div class="inner-wrap">						
            <div class="pathway row-fluid">
            <ul class="breadcrumb span12">
                <li><a href="/" class="pathway">Home</a></li>
                <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"/></span>
                <li class="active">register</li>
           	</ul>
            </div>			
    	</div>		
    </div>	
</div>
<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
<div class="row-fluid">

<!--- content - right-->
<div class="span9 main-column">
	<div class="row-fluid">
		
	<?php echo $this->Form->create('User',array('id'=>'formID','inputDefaults'=>array('label'=>false))); ?>
		<table class="adminForm user-details">

		<tr>
			<td class="key" title="">
				<label class="email" for="email">
					Email * </label>
			</td>
			<td>
				<?php echo $this->Form->input('email',array('placeholder'=>'Email','class'=>'validate[required,custom[email]]')); ?>
			</td>
		</tr>
		<tr>
			<td class="key" title="">
				<label class="username" for="username">
					Username * </label>
			</td>
			<td>
				<?php echo $this->Form->input('username',array('placeholder'=>'username','class'=>'validate[required,custom[onlyLetterNumber]],minSize[4]')); ?>
			</td>
		</tr>
		<tr>
			<td class="key" title="">
				<label class="password" for="password">
					Password * </label>
			</td>
			<td>
				<?php echo $this->Form->input('password',array('placeholder'=>'password','class'=>'validate[required]')); ?>
			</td>
		</tr>
			<tr>
			<td class="key" title="">
				<label class="repassword" for="repassword">
					Confirm Password * </label>
			</td>
			<td>
				<?php echo $this->Form->input('re_password',array('placeholder'=>'retype password','type'=>'password','class'=>'validate[required]')); ?>
			</td>
		</tr>
			<tr>
			<td class="key" title="">
				<label class="first_name" for="first_name">
					First name * </label>
			</td>
			<td>
			<?php echo $this->Form->input('firstname',array('placeholder'=>'firstname','class'=>'validate[required]')); ?>
			</td>
		</tr>
		<tr>
			<td class="key" title="">
				<label class="last_name" for="last_name">
					Last name * </label>
			</td>
			<td>
				<?php echo $this->Form->input('lastname',array('placeholder'=>'lastname','class'=>'validate[required]')); ?>
			</td>
		</tr>
		<tr>
			<td class="key" title="">
				<label class="last_name" for="last_name">
				</label>
			</td>
			<td>
				 <?php
					echo $this->Html->image($this->Html->url(array('controller' => 'users', 'action' => 'captcha'), true), array('id' => 'img-captcha', 'vspace' => 2));
					echo '<p><a id="a-reload">reload</a></p>';
					?>
			</td>
		</tr>
			<tr>
			<td class="key" title="">
				<label class="last_name" for="last_name">
					Captcha * </label>
			</td>
			<td>
				 <?php echo $this->Form->input('User.captcha', array('autocomplete' => 'off','class' => 'form-control validate[required]','placeholder'=>'captcha')); ?>
			</td>
		</tr>
		<tr>
			<td class="key" title="">

			</td>
			<td>
				<?php echo  $this->Form->input('Register', array('type' => 'submit', 'class' => 'btn btn-primary'));?>
			</td>
		</tr>

		</table>
	<?php echo $this->Form->end();?>
	</div>
</div>
<!-- end content-right-->
<div class="span3 right-mod">
<div class="hidden-phone">
<?php
if (!empty($advs)):
    ?>
    <div class="moduletable ">
        <div class="mods">
            <div class="bghelper">
                <div class="modulcontent">
                    <div class="custom">
                        <?php foreach ($advs as $item): ?>
                            <p>
                                <a href="<?php echo $item['Slide']['link']; ?>">
                                    <?php echo $this->Html->image($item['Slide']['image'], array('width' => '219', 'height' => '132', 'class' => 'img-responsive')); ?>
                                </a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
            </div>
        </div>
    </div>
</div>
<div class="moduletable cont">
    <div class="mods">
        <div class="bghelper">
            <h3>Subcribers</h3>

            <div class="modulcontent">
                <div id="form-subscribes">

                    <?php echo $this->Form->create('subscribers',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
                    <?php echo $this->Form->input('email',array('placeholder'=>'Email address','id'=>'txtsubscribe','class'=>'inactive','div'=>false,'style'=>'width: 163px;')); ?>
                    <?php echo $this->Form->input('Subscribe',array('type'=>'submit','class'=>'btn btn-primary')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <h3>Facekbook</h3>

            <div class="modulcontent">

            </div>
        </div>
    </div>
</div>
</div>
<div class="hidden-phone">
</div>
</div>
<div class="span3 left-mod">
<div class="visible-phone">

<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
                <div class="custom">
                    <?php foreach ($advs as $item): ?>
                        <p>
                            <a href="<?php echo $item['Slide']['link']; ?>">
                                <?php echo $this->Html->image($item['Slide']['image'], array('width' => '219', 'height' => '132', 'class' => 'img-responsive')); ?>
                            </a>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
            </div>
        </div>
    </div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>

<script>
	$('#a-reload').click(function () {
		var $captcha = $("#img-captcha");
		$captcha.attr('src', $captcha.attr('src') + '?' + Math.random());
		return false;
	});
</script>