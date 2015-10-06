<div class="container" id="banner_wrapper">
    <h2 class="menu_banner"><a href="/">ALL DEPARTMENTS</a></h2>

    <div class="row">
        <div class="col-lg-3 col md-4 col-sm-5 row-left">

            <ul id="menu_left">
                <?php $categories = $this->requestAction('/categories/load_all_categories');?>
                <?php if(isset($categories)):?>
                <?php foreach($categories as $c):?>
                     <li>
                         <?php
						    echo $this->Html->link(
                         $c['Category']['name'],
                         array(
                         'controller' => 'categories',
                         'action' => 'index',
                         'category' => $c['Category']['slug'],
                         'ext' => 'html'
                         )
                         );
                         ?>

                     </li>
                <?php endforeach;?>

                <?php endif;?>
            </ul>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-7 row-right">
            <div id="slider">

				<section class="flexslider">
                    <ul class="slides">
                        <?php foreach($slides as $item):?>
                        <li><a onclick="return false" href="<?php echo $item['Slide']['link'];?>"><?php echo $this->Html->image($item['Slide']['image']); ?></a></li>

                        <?php endforeach;?>
                    </ul>
                </section>
<!--               <section class="control">
                    <ul id="control-flex">
                        <li class="prev-flex"><?php echo $this->Html->image('next-slideshow.png',array('title'=>'next','alt'=>'next')); ?></li>
                        <li class="next-flex"><?php echo $this->Html->image('prev-slideshow.png',array('title'=>'prev','alt'=>'prev')); ?></li>
                    </ul>
                </section>-->
            </div>
        </div>
    </div>
    <!--End menu and slider-->

</div>