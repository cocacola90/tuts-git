<div class="banner-breadcrumb">		
	<div class="container">
		<div class="inner-wrap">				
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
						<img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					<li><a href="#" class="pathway">Testimonial</a></li>
					<span class="divider">
						<img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					</span>
					<li class="active">Submit Testimonial</li>
				</ul>
			</div>	
		</div>		
	</div>	
</div>
<script type="text/javascript">
$(document).ready(function(){
	// binds form submission and fields to the validation engine
	$("#testimonialForm").validationEngine();
});
</script>
<div class="main-wrap">
    <div id="main-site" class="container">
        <div class="inner-wrap">
		<div class="row-fluid">
                <div class="span12 main-column">
                    <div id="system-message-container">
                    </div>
                    <div id="myResult"></div>
					<?php echo $this->Form->create('Testimonial',array('id'=>'testimonialForm', 'class'=>'cmxform','type'=>'file','inputDefaults' => array('div'=>false,'label'=>false)));?>
                    
                        <fieldset>
                            <legend>Add Testimonial</legend>
                            <ol>
                                <li>
                                    <label for="name">Your Full Name<em> *</em></label>
									<?php echo $this->Form->input('full_name',array('class'=>'validate[required]','id'=>'iname','size' => '40','maxlength' => '50'));?>
                                   
                                </li>
                                <li>
                                    <label for="name">Email Address<em> *</em></label>
									<?php echo $this->Form->input('email',array('class'=>'validate[required,custom[email]]','id'=>'iemail','size' => '40','maxlength' => '50'));?>
                                </li>
                                <li>
                                    <label for="iaddress">Location (Eg : Roppongi, Tokyo)<em> *</em></label>
									<?php echo $this->Form->input('country',array('class'=>'validate[required]','id'=>'iaddress','size' => '40','maxlength' => '50'));?>
                                </li>
                                <li>
                                    <label for="iaddress">Website (If Any)</label>
									<?php echo $this->Form->input('website',array('id'=>'iwebsite','size' => '40','maxlength' => '100'));?>
                                </li>
                                <li>
                                    <label for="image">Image (If Any)</label>
									<?php echo $this->Form->input('thumbnail', array('id' => 'iimage','type'=>'file','class'=>'validate[required]')); ?>
                                </li>

                                <li>
                                    <label for="imessage">Testimonial<em> *</em></label>
									<?php echo $this->Form->textarea('testimonial',array('class'=>'validate[required]','id'=>'imessage','cols' => '40','rows' => '4'));?>
                                </li>
								<li>
									<label for=""></label>
									 <?php
										echo $this->Html->image($this->Html->url(array('controller' => 'testimonials', 'action' => 'captcha'), true), array('id' => 'img-testimonial-captcha', 'vspace' => 2));
										echo '<p><a id="a-reload">reload</a></p>';
									?>
								</li>
                                <li>
                                    <label for="iboutme">Captcha<em> *</em></label>
									<?php echo $this->Form->input('Testimonial.captcha', array('autocomplete' => 'off','class' => 'form-control validate[required]','placeholder'=>'captcha')); ?>
                                </li>
                               
                                <li>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </li>

                            </ol>
                        </fieldset>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$('#a-reload').click(function () {
		var $captcha = $("#img-testimonial-captcha");
		$captcha.attr('src', $captcha.attr('src') + '?' + Math.random());
		return false;
	});
</script>