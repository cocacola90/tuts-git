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
                <li class="active">login</li>
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
<section class="vm-login-panel row-fluid">

	<?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false,'div'=>false))); ?>
        <div>
            <h2 class="span12 login-title">When you are already registered, please login directly here</h2>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="input-prepend" id="com-form-login-username">
                    <span class="add-on"><i class="icon-user"></i></span>
					<?php echo $this->Form->input('email',array('type' => 'email','class'=>'inputbox input-medium','size'=>18,'alt'=>'E-Mail','onblur'=>"if(this.value=='') this.value='E-Mail';",'onfocus' => "if(this.value=='E-Mail') this.value='';")); ?>
                </div>
                <div class="input-prepend add-margin" id="com-form-login-password">
                    <span class="add-on"><i class="icon-lock"></i></span>
					<?php echo $this->Form->input('password',array('id' => 'modlgn-passwd','type'=>'password','class'=>'inputbox input-medium','size'=>18,'alt'=>'Password','onblur'=>"if(this.value=='') this.value='Password';",'onfocus' => "if(this.value=='Password') this.value='';")); ?>
                </div>
				<input type="submit" name="Submit" class="default btn btn-primary" value="Login">
				
               <!-- <input type="submit" name="Submit" class="default btn" value="Login">
                <label for="remember" class="checkbox inline">
                    <input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me">
                    Remember me </label>-->

                <div class="row-fluid username-password-recovery">
                    <div class="span12">
			      <span>
		          <a href="/users/forgot_password">
                      Forgot your password?</a>
			      </span>
                    </div>
                </div>
        </div>
    <?php echo $this->Form->end();?>
</section>


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
                    <!--<form action="">
                        <input id="txtsubscribe" type="text" placeholder="Email address"/>
                        <input id="btnsubscribe" type="submit" value="Subscribe"/>
                    </form>-->
                    <?php echo $this->Form->create('Subscriber',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
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

                        