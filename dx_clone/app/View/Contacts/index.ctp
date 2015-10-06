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
                <li class="active">Contact Us</li>
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
<div id="system-message-container">
<?php echo $this->Session->flash('contact');?>
</div>
	<div class="contact">
	<dd class="tabs contact_email_copy-checkbox submit-contact-form" style="display: block;">
		<div class="contact-form">
		<?php echo $this->Form->create('Contact',array('id' => 'formID','action' => 'index','inputDefaults' => array('div'=> false, 'label' => false)));?>
				<fieldset>
					<legend>Send an email. All fields with an * are required.</legend>
					<dl>
						<?php 
							if(isset($user_info)){
								$full_name = $user_info['firstname'] . ' ' . $user_info['lastname'];
								$email = $user_info['email'];
								$user_id = $user_info['id'];
								$task = "ask";
							}
							else
							{
								$full_name = "";
								$email = "";
								$user_id = "";
								$task = "send";
							}
						?>
						<?php echo $this->Form->input('task',array('type'=>'hidden','value'=>$task));?>
						<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$user_id));?>
						<dt><label id="jform_contact_name-lbl" for="jform_contact_name"
								   class="hasTip required invalid" title="" aria-invalid="true">Full Name<span
									class="star">&nbsp;*</span></label>
						</dt>
						<dd>
							<?php echo $this->Form->input('full_name',array('class'=>'form-control','placeholder' => 'Full name','id' =>'jform_contact_name','class'=>'validate[required]','value' => $full_name));?>
						</dd>
						<dt><label id="jform_contact_email-lbl" for="jform_contact_email"
								   class="hasTip required invalid" title="" aria-invalid="true">Email<span
									class="star">&nbsp;*</span></label></dt>
						<dd>
							<?php echo $this->Form->input('email',array('class'=>'form-control','placeholder' => 'Email' ,'type' =>'email','class'=>'validate[required,custom[email]]','id'=>'jform_contact_email','value' =>$email));?>
						</dd>
						<dt><label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg"
								   class="hasTip required invalid" title="" aria-invalid="true">Subject<span
									class="star">&nbsp;*</span></label>
						</dt>
						<dd>
						<?php echo $this->Form->input('subject',array('class'=>'form-control','placeholder' => 'Subject','id' =>'jform_contact_name','class'=>'validate[required]'));?>
						</dd>
						<dt><label id="jform_contact_message-lbl" for="jform_contact_message"
								   class="hasTip required invalid" title="" aria-invalid="true">Message<span
									class="star">&nbsp;*</span></label></dt>
						<dd>
							<?php echo $this->Form->textarea('content',array('class'=>'form-control','rows' => '10','cols'=>'50','id'=>'jform_contact_message','class'=>'validate[required]'));?>
						</dd>
						<dt class="clear"></dt>
						<dd class="submit-contact-form">
							<button class="validate btn btn-primary" type="submit">Send Email</button>
						</dd>
					</dl>
				</fieldset>
			<?php echo $this->Form->end();?>
		</div>
	</dd>
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
                    <!--<form action="">
                        <input id="txtsubscribe" type="text" placeholder="Email address"/>
                        <input id="btnsubscribe" type="submit" value="Subscribe"/>
                    </form>-->
                    <?php echo $this->Form->create('Subscriber',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
                    <?php echo $this->Form->input('email',array('placeholder'=>'Email address','id'=>'txtsubscribe','class'=>'inactive','div'=>false,'style'=>'width: 163px;')); ?>
                    <?php echo $this->Form->input('Subscriber',array('type'=>'submit','id'=>'btnsubscribe','class' =>'btn btn-primary')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
          <?php echo $this->element('facebook');?>
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


                        