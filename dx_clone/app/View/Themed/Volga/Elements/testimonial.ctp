
<style>
	
    .testimonials-thumbnail {
        margin: 0px 0px 15px;
    }

   .testimonials-title {
        text-align: center;
        margin: 25px 15px 3px;
        font-size: 24px;
        line-height: 1;
    }
    .testimonials-carousel-thumbnail {
        max-width: 35%;
        float: left;
        margin-right: 20px;
    }

   .testimonials-carousel-thumbnail img {
        display: block;
        margin-right: 20px;
        width: 100px;
        height: 100px;
       -moz-border-radius: 100px;
       -webkit-border-radius: 100px;
        border-radius: 100px;
		
    }

    .testimonials-carousel-context {
       overflow: hidden;
		
    }

    .testimonials-name {
        font-size: 14px;
        margin-bottom: 15px;
        color: #D2CECE;
        font-weight: 400;
    }
    .testimonials-name span{
        font-size: 14px;
        margin-bottom: 15px;
        color: #DADADA;
        font-weight: 400;
    }
	.testimonials-carousel-content{
		font-size: 12px;
		font-style: italic;
		font-family: Arial, Helvetica, sans-serif;
	}
	.testimonial .flex-direction-nav {
		border: 1px solid red;
		height: 15px;
		list-style: outside none none;
		margin: 0;
		padding: 0;
		width: 15px;
		display: none;
	}
</style>


<div class="mods" style="background: #fff">
    <div class="bghelper">
        <h3 style="margin-left: 20px;">REVIEWS</h3>
        <div class="modulcontent" style="margin: 0px 20px; overflow: hidden;">
            <div class="testimonial">
                <ul class="slides">
					<?php $testimonials = $this->requestAction('/testimonials/get_testimonial');?>
					<?php foreach($testimonials as $item):?>
						<li>
							<div class="testimonials-carousel-thumbnail">
							<img width="120" alt="" src="<?php echo DOMAIN_ROOT ;?>/timthumb.php?src=<?php echo $item['Testimonial']['thumbnail'];?>&w=120"></div>
							<div class="testimonials-carousel-context">
								<div class="testimonials-carousel-content" data-alignment="center">
								<blockquote ><?php echo $item['Testimonial']['testimonial'];?></blockquote >
								</div>
								<div class="testimonials-name">- <?php echo $item['Testimonial']['full_name'];?>, <span><?php echo $item['Testimonial']['country'];?></span></div>
							</div>
						</li>
					<?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>


<script>
    // Can also be used with $(document).ready()
	jQuery(document).ready(function($){
    //$(window).load(function() {
        $('.testimonial').flexslider({
            animation: 'slide',
			reverse: false,
			controlNav: false,
			animationLoop: true,
			slideshow: true,
			//directionNav: false;
		});
    });
</script>