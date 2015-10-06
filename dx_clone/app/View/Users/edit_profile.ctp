<?php echo $this->Html->css('tcal');?>
<?php echo $this->Html->script('tcal');?>
<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/" class="pathway">Home</a></li>
                    <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">
                    <li><a href="/my-profile" class="pathway">My Profile</a></li>
                    <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                                               class="breadcrumbs-separator" alt="separator"></span>
                    <li class="active">Edit Profile</li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
<div class="row-fluid">
<div class="span12 main-column">
<div class="compare-mod visible-desktop">
    <div class="vmCompareModule " id="vmCompareModule">
        <div id="compare_hiddencontainer" style=" display: none; ">
            <li class="products">
                <div class="product_image"></div>
                <div class="texts">
                    <div class="product_name"></div>
                    <div class="price"></div>
                </div>
            </li>
        </div>
        <div class="vm_compare_products">
            <ul class="container slides">
                <li class="products">
                    <div class="product_image"></div>
                    <div class="texts">
                        <div class="product_name"></div>
                        <div class="price"></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="total_products">
            <a href="/en/compare-products" title="Compare">
                Compare <span class="total">0</span> Products </a>
        </div>
        <a class="hide-compare-module" href="#" title="Hide"><i class="icon-close"></i></a>

        <noscript>
            MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT
        </noscript>
    </div>
</div>
<div id="system-message-container">
</div>
<h1 class="user-page-title">Edit profile</h1>
<section class="vm-login-panel">
	Hello <b><?php echo $user_info['firstname'];?></b>  <a href="/logout">[Logout]</a>
</section>

<fieldset>
<?php echo $this->Form->create('User',array('type'=>'file','id'=>'formID','name'=>'userForm','inputDefaults' => array('div'=>false,'label'=>false)));?>
<?php echo $this->Form->input('id');?>

<table class="adminForm user-details">
<tr>
    <td class="key" title="">
        <label class="shipto_first_name" for="shipto_first_name_field">
        </label>
    </td>
    <td>
	<div class="gravatar-wrapper-128">
	<?php $avatar = $this->request->data['User']['avatar'];?>
	 <?php if(!empty($avatar)):?>
		<img src="<?php echo DOMAIN_ROOT ;?>/timthumb.php?src=<?php echo $avatar;?>&w=100" alt="no-avarta"  class="img-responsive"/>
	<?php else:?>
		<?php echo $this->Html->image('avatar.jpg',array('width'=>'100','height'=>'100','class'=>'img-responsive'));?>	
	<?php endif;?>
	</div>
	</td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_first_name" for="shipto_first_name_field">
            First Name * </label>
    </td>
    <td>
        <?php echo $this->Form->input('firstname',array('id'=>'shipto_first_name_field','class'=>'validate[required]','size'=>30,'maxlength'=>32));?>
        </td>
</tr>

<tr>
    <td class="key" title="">
        <label class="shipto_last_name" for="shipto_last_name_field">
            Last Name * </label>
    </td>
    <td>
        <?php echo $this->Form->input('lastname',array('id'=>'shipto_last_name_field','class'=>'validate[required]','size'=>30,'maxlength'=>32));?>

    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="shipto_address_1_field">
            Address  * </label>
    </td>
    <td>
        <?php echo $this->Form->textarea('address',array('id'=>'shipto_address_1_field','class'=>'validate[required]','size'=>30,'maxlength'=>64));?>
        </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_2" for="shipto_address_2_field">
            Address2  * </label>
    </td>
    <td>
        <?php echo $this->Form->textarea('address2',array('id'=>'shipto_address_2_field','class'=>'validate[required]','size'=>30,'maxlength'=>64));?>
        </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="Zip code">
        Zip / Postal Code *</label>
    </td>
    <td>
		<?php echo $this->Form->input('zip_code',array('id'=>'zip_code','class'=>'validate[required,custom[zip]]','size'=>30,'maxlength'=>64));?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="city">
        City *</label>
    </td>
    <td>
		<?php echo $this->Form->input('city',array('id'=>'city','class'=>'validate[required]','size'=>30,'maxlength'=>64));?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="country">
            Country  * </label>
    </td>
    <td>
		<select name="data[User][country]" id="" class="validate[required]">
			<option value="">--- select country ---</option>
			<?php if($country){
				foreach($country as $cty){?>
					<option value="<?php echo $cty['Country']['country'];?>"><?php echo $cty['Country']['country'];?></option>
			<?php }};?>
		</select>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_address_1" for="state">
       State / Province / Region *</label>
    </td>
    <td>
		<?php echo $this->Form->input('state',array('id'=>'state','class'=>'validate[required]','size'=>30,'maxlength'=>64));?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_virtuemart_state_id" for="shipto_virtuemart_state_id_field">
           Gender </label>
    </td>
    <td>
       <?php echo  $this->Form->input('sex', array('type' => 'select', 'options' => array(0 => 'Male', 1 => 'Female'),'empty' => 'Please Select','class'=>'validate[required]'));?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="shipto_phone_1" for="shipto_phone_1_field">
            Phone </label>
    </td>
    <td>
        <?php echo $this->Form->input('phonenumber',array('id'=>'shipto_phone_1_field','size'=>'30','maxlength'=>32));?>
        </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="birth_day" for="birth_day">
            Birth date </label>
    </td>
    <td>
        <?php echo $this->Form->input('birthdate', array('placeholder' => 'Birthday', 'class' => 'tcal', 'type' => 'text', 'value' => date('m/d/Y', $this->request->data['User']['birthdate'])));;?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="email" for="email">
            Email </label>
    </td>
    <td>
        <?php echo $this->Form->input('email',array('readonly'=>true ,));?>
    </td>
</tr>
<tr>
    <td class="key" title="">
        <label class="email" for="email">
            Avatar </label>
    </td>
    <td>
         <?php echo $this->Form->input('avatar', array('id' => 'thumbnail', 'label' => false, 'class' => 'col-xs-10 col-sm-10','type'=>'file')); ?>
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
</fieldset>



</div>
</div>
</div>

</div>
</div>
