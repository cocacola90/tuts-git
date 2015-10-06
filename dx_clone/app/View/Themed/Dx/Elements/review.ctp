<div class="row">
    <div id="box_review">
        <h2 class="title_review">REVIEWS</h2>

        <div class="col-md-7 wow fadeInLeft animated" id="left_review">
		<?php $reviews = $this->requestAction('/comments/show_review');?>
		
            <div class="content_review">
			<?php echo $reviews['Comment']['comment'];?>

            </div>
        </div>

        <div class="col-md-5 wow fadeInRight animated" id="right_review">
            <?php echo $this->Html->image('wws.jpg',array('class'=>'img-responsive','alt'=>'no-img'));?>

        </div>
    </div>
</div>