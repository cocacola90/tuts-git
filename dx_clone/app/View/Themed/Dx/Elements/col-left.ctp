<div class="col-lg-3 col-md-3 col-sm-4" id="left">
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
    <div class="image-qc" style="margin-top:10px;">
		<?php $advs = $this->requestAction('/slides/get_advs');?>
		<?php foreach($advs as $item):?>
		<a href="<?php echo $item['Slide']['link'];?>">
		<?php echo $this->Html->image($item['Slide']['image'],array('width' => '267','style' =>
            'margin-top:10px;'));?></a>
		<?php endforeach;?>
        
    </div>

    <div class="fb-page"
         data-href="https://www.facebook.com/pages/Tin-Ch%E1%BA%A5n-%C4%90%E1%BB%99ng/1576744515890821"
         data-width="260" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
        <div class="fb-xfbml-parse-ignore">
            <blockquote
                    cite="https://www.facebook.com/pages/Tin-Ch%E1%BA%A5n-%C4%90%E1%BB%99ng/1576744515890821"><a
                    href="https://www.facebook.com/pages/Tin-Ch%E1%BA%A5n-%C4%90%E1%BB%99ng/1576744515890821">Tin
                Chấn Động</a></blockquote>
        </div>
    </div>
    <div class="clearbox"></div>
</div>