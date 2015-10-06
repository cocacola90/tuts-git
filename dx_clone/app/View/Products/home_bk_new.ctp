<?php
    if(isset($currency)){
        $to_currency = $currency['code'];
    }else
    {
        $to_currency = "";
    }

    if(isset($country_info))
    {
        $destination  = $country_info['Country']['code'];
	    $continent = $country_info['Country']['continent'];
    }
?>
<?php echo $this->element('col-left');?>   <!-- load col-left-->
<div class="col-lg-9 col-md-9 col-sm-8" id="right">
<div class="products wow fadeInUp animated">
    <div id="spotlight"><h2>Sản phẩm bán chạy</h2></div>
    <div class="row remove-margin"> 
        <?php 
			if(isset($ban_chay)):
			$stt = 0;
			foreach($ban_chay as $item):
			$stt++;
			if($stt == 1)
			{
				echo '<div class="row">';
			}
		?>
		
			<div class="col-lg-3 col-md-3 col-sm-4 box">
				<div class="box_product">
					<?php if($item['Product']['discount_status'] == 1):?>
					<div class="discount">
						<div class="discount_sale"></div>
						<p class="sale_percent"><?php echo $item['Product']['discount']?>% <span>off</span></p>
					</div>
					<?php endif;?>
					<?php
					echo $this->Html->link(
						 $this->Html->image($this->Tool->get_thumbs($item['Product']['thumbnail']),array('alt' => 'no-img','class'=>'img_product img-responsive')),
					array(
						'controller' => 'products',
						'action' => 'view_product',
						'category' => $item['Category']['slug'],
						'product' => $item['Product']['slug'],
						'id' => $item['Product']['id'],
						'ext' => 'html'
					),
					array(
						'escape' => false,
						'class' => 'box_img',

						)
					);
					?>
					<?php
					echo $this->Html->link(
						$item['Product']['name'],
					array(
						'controller' => 'products',
						'action' => 'view_product',
						'category' => $item['Category']['slug'],
						'product' => $item['Product']['slug'],
						'id' => $item['Product']['id'],
						'ext' => 'html'
					),
					array(
						'title' => $item['Product']['name'],
						'class' => 'title_product'
						)
					);
					?>



						<?php if($item['Product']['discount_status'] == 1):?>
						<span class="price">

							<strike>
								<?php echo $currency['prefix']; ?>
								<?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
							</strike>
						 </span>
						 <span class="price" >
							 <?php echo $currency['prefix']; ?>
							 <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']));?>
						 </span>
						<?php else:?>
						 <span class="price" >
							 <?php echo $currency['prefix']; ?>
							 <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
						 </span>

						<?php endif;?>


					<div class="free-shipping" style="font-size:10px;">

						<i>ship small-packet: </i><div id="ship_small_mb-<?php echo  $item['Product']['id'];?>"></div>
					    <i>ship parcel:</i><div id="ship_parcel_mb-<?php echo  $item['Product']['id'];?>"></div>
						<script type="text/javascript">
							cost(<?php echo  $item['Product']['weight'];?>, <?php echo  $item['Product']['id'];?>);
						</script>

						<?php echo $this->Html->image('free-shipping.jpg',array('alt' => ''));?>
					  
					</div>
					<?php echo $this->Html->link(
						$item['Category']['name'],
					array(
						'controller' => 'categories',
						'action' => 'index',
						'category' => $item['Category']['slug'],
						'ext' => 'html'
					),
					array(
						'class' => 'link_category'
					)

					);?>
					<!--<a class="link_category" href="#">Travelling Needs</a>-->
				</div>
			</div>
			
		<?php 
			if($stt == 4)
			{
				echo '</div>';
				$stt = 1;
			}
		?>
        
        <!--End .box_product-->
        <?php 
			endforeach;
			if($stt > 1 && $stt < 4)
			{
				echo '</div>';
			}
			endif;
		?>

        <!--End .box_product-->
    </div>
</div>
<!--End .products-->

<div class="products wow fadeInUp animated">
    <div id="spotlight"><h2>Sản được quan tâm</h2></div>

        <?php
		if(isset($quan_tam)):
		$stt = 0;
        foreach($quan_tam as $item):
		$stt++;
		if($stt == 1)
		{
			echo '<div class ="row">';
		}
		?>
        <div class="col-lg-3 col-md-3 col-sm-4 box">
            <div class="box_product">
                <?php if($item['Product']['discount_status'] == 1):?>
                <div class="discount">
                    <div class="discount_sale"></div>
                    <p class="sale_percent"><?php echo $item['Product']['discount']?>% <span>off</span></p>
                </div>
                <?php endif;?>
                <?php
				echo $this->Html->link(
                $this->Html->image($this->Tool->get_thumbs($item['Product']['thumbnail']),array('alt' => 'no-img','class'=>'img_product img-responsive')),
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $item['Category']['slug'],
                'product' => $item['Product']['slug'],
                'id' => $item['Product']['id'],
                'ext' => 'html'
                ),
                array(
                'escape' => false,
                'class' => 'box_img',

                )
                );
                ?>
                <?php
				echo $this->Html->link(
                $item['Product']['name'],
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $item['Category']['slug'],
                'product' => $item['Product']['slug'],
                'id' => $item['Product']['id'],
                'ext' => 'html'
                ),
                array(
                'title' => $item['Product']['name'],
                'class' => 'title_product'
                )
                );
                ?>


                <?php if($item['Product']['discount_status'] == 1):?>
                    <span class="price">

                        <strike>
                            <?php echo $currency['prefix']; ?>
                            <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
                        </strike>
                     </span>
                     <span class="price" >
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']));?>
                     </span>
                <?php else:?>
                     <span class="price" >
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
                     </span>

                <?php endif;?>


               		<div class="free-shipping" style="font-size:10px;">

						<i>ship small-packet: </i><div id="ship_small_view-<?php echo  $item['Product']['id'];?>"></div>
					    <i>ship parcel:</i><div id="ship_parcel_view-<?php echo  $item['Product']['id'];?>"></div>
						<script type="text/javascript">
							cost(<?php echo  $item['Product']['weight'];?>, <?php echo  $item['Product']['id'];?>);
						</script>

						<?php echo $this->Html->image('free-shipping.jpg',array('alt' => ''));?>
					   <!-- <img src="img/free-shipping.jpg" alt=""/>-->
					</div>
                <?php echo $this->Html->link(
                $item['Category']['name'],
                array(
                'controller' => 'categories',
                'action' => 'index',
                'category' => $item['Category']['slug'],
                'ext' => 'html'
                ),
                array(
                'class' => 'link_category'
                )

                );?>
                <!--<a class="link_category" href="#">Travelling Needs</a>-->
            </div>
		<?php 
			if($stt == 4)
			{
				echo '</div>';
				$stt = 0;
			}
		?>
        </div>
        <!--End .box_product-->
        <?php 
		endforeach;
        if( $stt >1 && $stt < 4)
		{
			echo '</div>';
		}
		endif;
		?>

        <!--End .box_product-->

</div>
<!--End .products-->
<div class="products wow fadeInUp animated">
    <div id="spotlight"><h2>Sản phẩm mới</h2></div>

        <?php 
		if(isset($product_new)):
		$stt = 0;
        foreach($product_new as $item):
		$stt++;
		if($stt == 1)
		{
			echo '<div class="row">';
		}
		?>
		
        <div class="col-lg-3 col-md-3 col-sm-4 box">
            <div class="box_product">

                <?php if($item['Product']['discount_status'] == 1):?>
                <div class="discount">
                    <div class="discount_sale"></div>
                    <p class="sale_percent"><?php echo $item['Product']['discount']?>% <span>off</span></p>
                </div>
                <?php endif;?>
                <?php
				echo $this->Html->link(
                $this->Html->image($this->Tool->get_thumbs($item['Product']['thumbnail']),array('alt' => 'no-img','class'=>'img_product img-responsive')),
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $item['Category']['slug'],
                'product' => $item['Product']['slug'],
                'id' => $item['Product']['id'],
                'ext' => 'html'
                ),
                array(
                'escape' => false,
                'class' => 'box_img',

                )
                );
                ?>
                <?php
				echo $this->Html->link(
                $item['Product']['name'],
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $item['Category']['slug'],
                'product' => $item['Product']['slug'],
                'id' => $item['Product']['id'],
                'ext' => 'html'
                ),
                array(
                'title' => $item['Product']['name'],
                'class' => 'title_product'
                )
                );
                ?>


                <?php if($item['Product']['discount_status'] == 1):?>
                    <span class="price">

                        <strike>
                            <?php echo $currency['prefix']; ?>
                            <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
                        </strike>
                     </span>
                     <span class="price" >
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']));?>
                     </span>
                <?php else:?>
                     <span class="price" >
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->Tool->number_format($this->Tool->price($item['Product']['price'],$to_currency));?>
                     </span>

                <?php endif;?>


                <div class="free-shipping" style="font-size:10px;">

						<i>ship small-packet: </i><div id="ship_small_new-<?php echo  $item['Product']['id'];?>"></div>
					   <i> ship parcel:</i><div id="ship_parcel_new-<?php echo  $item['Product']['id'];?>"></div>
						<script type="text/javascript">
							cost(<?php echo $item['Product']['weight'];?>,<?php echo  $item['Product']['id'];?>);
						</script>

						<?php echo $this->Html->image('free-shipping.jpg',array('alt' => ''));?>
					   <!-- <img src="img/free-shipping.jpg" alt=""/>-->
				</div>
                <?php echo $this->Html->link(
                $item['Category']['name'],
                array(
                'controller' => 'categories',
                'action' => 'index',
                'category' => $item['Category']['slug'],
                'ext' => 'html'
                ),
                array(
                'class' => 'link_category'
                )

                );?>
                <!--<a class="link_category" href="#">Travelling Needs</a>-->
            </div>

			
        </div>
		<?php 
			if($stt == 4)
			{
				
				echo '</div>';
				$stt = 0;
			}
			
		?>
        
        <!--End .box_product-->
        <?php
		endforeach;
		if($stt > 1 && $stt < 4)
			{
				echo '</div>';
			}
        endif;
		?>

    
</div>
<!--End .products-->


</div>