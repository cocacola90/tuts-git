
<div class="mods" style="background: #fff">
    <div class="bghelper">
        <h3 style="margin-left: 20px;">REVIEWS</h3>

        <div class="modulcontent" style="margin: 0px 20px; overflow: hidden;">
			<div id="content_review">
				<?php $reviews = $this->requestAction('/comments/show_review');?>
				
				<div class="css-slideshow">
					<?php foreach($reviews as $review):?>
					<figure>
					<p><?php echo $review['Comment']['comment'];?></p>
						
						<small style="float: right;"><?php echo $review['User']['firstname'].' '.$review['User']['lastname'];?></small>
					</figure>
					<?php endforeach;?>
				</div> 
			</div>
			<div id="content_image">
				<?php echo $this->Html->image('thumb_wws.jpg',array('width'=>'450','height' => '263')); ?> 
			</div>
        </div>
    </div>
</div>
<style type="text/css"> 
.css-slideshow{
  position: relative;
  max-width: 400px;
  height: 370px;
  margin: 5em auto .5em auto;
}
.css-slideshow figure{
  margin: 0;
  max-width: 400px;
  height: 200px;
  background: #fff;
  position: absolute;
}
.css-slideshow img{
  box-shadow: 0 0 2px #666;
}

.css-slideshow-attr{
  max-width: 400px;
  text-align: right;
  font-size: .7em;
  font-style: italic;
  margin:0 auto;
}
.css-slideshow-attr a{
  color: #666;
}
.css-slideshow figure{
  opacity:0;
}
.css-slideshow figure:nth-child(1) {
  animation: xfade 20s 14s infinite;
}
.css-slideshow figure:nth-child(2) {
  animation: xfade 20s 7s infinite;
}
.css-slideshow figure:nth-child(3) {
  animation: xfade 20s 0s infinite;
}

@keyframes xfade{
  0%{
    opacity: 1;
  }
  10.5% {
    opacity: 1;
  }
  12.5%{
    opacity: 0;
  }
  98% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>