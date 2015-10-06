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
        <div id="spotlight"><h2>Từ khóa tìm kiếm : <span style="color: green;"><?php echo $keywords;?></span></h2></div>
        <div class="row">

            <?php if(isset($products)):?>
                <?php foreach($products as $item):?>
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
                                $this->Html->image($item['Product']['thumbnail'],array('alt' => 'no-img','class'=>'img_product img-responsive')),
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


                            <div class="free-shipping">

                                <!--   <i>Giá ship small-packet: </i><div id="ship_small-<?php echo  $item['Product']['id'];?>"></div>
                      <i> Giá ship parcel:</i><div id="ship_parcel-<?php echo  $item['Product']['id'];?>"></div>
                       <script type="text/javascript">
                           cost(<?php echo  $item['Product']['weight'];?>, <?php echo  $item['Product']['id'];?>);
                       </script>-->

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
                    <!--End .box_product-->
                <?php endforeach;?>
            <?php endif;?>

            <!--End .box_product-->
        </div>

        <?php
        if($this->Paginator->hasPage(2)){
            echo $this->element('pagination');
        };?>

    </div>
    <!--End .products-->



</div>