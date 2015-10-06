		<section id="slideshow">
			<section class="flexslider">
				<ul class="slides">
					<li><a onclick="return false" href="#"><?php echo $this->Html->image('img-slideshow-1.jpg'); ?></a></li>
					<li><a onclick="return false" href="#"><?php echo $this->Html->image('img-slideshow-2.jpg'); ?></a></li>
					<li><a onclick="return false" href="#"><?php echo $this->Html->image('img-slideshow-3.jpg'); ?></a></li>
					<li><a onclick="return false" href="#"><?php echo $this->Html->image('img-slideshow-4.jpg'); ?></a></li>
					<li><a onclick="return false" href="#"><?php echo $this->Html->image('img-slideshow-5.jpg'); ?></a></li>
				</ul>
			</section>
			<section class="control">
				<ul id="control-flex">
					<li class="prev-flex"><?php echo $this->Html->image('next-slideshow.png',array('title'=>'next','alt'=>'next')); ?></li>
					<li class="next-flex"><?php echo $this->Html->image('prev-slideshow.png',array('title'=>'prev','alt'=>'prev')); ?></li>
				</ul>
			</section>
		</section>