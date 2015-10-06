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
                <li class="active">Change password</li>
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
<?php echo $this->Form->create('User',array('action' =>'change_password','id'=>'formID','inputDefaults'=>array('label'=>false,'div'=> false))); ?>
	<table class="adminForm user-details">
	<tr> 
		<?php echo $this->Session->flash('re_pass');?>
	</tr>
	<tr>
		<td class="key" title="">
			<label class="username" for="username">
				Email </label>
		</td>
		<td>
			<?php echo $this->Form->input('email',array('value' =>$user_info['email'],'readonly' => true)); ?>
		</td>
	</tr>
	<tr>
		<td class="key" title="">
			<label class="username" for="username">
				Username </label>
		</td>
		<td>
			<?php echo $this->Form->input('username',array('value' =>$user_info['username'],'readonly' => true)); ?>
		</td>
	</tr>
	<tr>
		<td class="key" title="">
			<label class="username" for="username">
				Old password * </label>
		</td>
		<td>
			<?php echo $this->Form->input('oldpassword',array('placeholder'=>'old password','class'=>'validate[required]','type'=>'password')); ?>
		</td>
	</tr>
	
	<tr>
		<td class="key" title="">
			<label class="username" for="username">
				New password * </label>
		</td>
		<td>
			<?php echo $this->Form->input('newpassword',array('placeholder'=>'new password','class'=>'validate[required]','type'=>'password')); ?>
		</td>
	</tr>
	<tr>
		<td class="key" title="">
			<label class="username" for="username">
				Confirm password * </label>
		</td>
		<td>
			<?php echo $this->Form->input('re_password',array('placeholder'=>'confirm passqord','class'=>'validate[required]','type'=>'password')); ?>
		</td>
	</tr>
	<tr>
		<td class="key" title="">

		</td>
		<td>
			<?php echo  $this->Form->input('Save', array('type' => 'submit', 'class' => 'btn btn-primary'));?>
		</td>
	</tr>

	</table>
	<?php echo $this->Form->end();?>
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
