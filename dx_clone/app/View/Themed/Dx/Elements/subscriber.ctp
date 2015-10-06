<div class="box-left" id="subscribes">
    <h3>SIGN UP FOR SAVINGS!</h3>

    <p class="mar_b5">Get $3 Gift Card delivered to your inbox!</p>

    <div id="form-subscribes">
        <!--<form action="">
            <input id="txtsubscribe" type="text" placeholder="Email address"/>
            <input id="btnsubscribe" type="submit" value="Subscribe"/>
        </form>-->
		<?php echo $this->Form->create('subscribers',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
		<?php echo $this->Form->input('email',array('placeholder'=>'Email address','id'=>'txtsubscribe')); ?>
		<?php echo $this->Form->input('Subscribe',array('type'=>'submit','id'=>'btnsubscribe')); ?>
		<?php echo $this->Form->end(); ?>
    </div>
</div>