<?php
    if(isset($currency)){
        $to_currency = $currency['code'];
    }else
    {
        $to_currency = "";
    }
?>
<section id="left-content">
<section id="index">
<section class="product-cate product-feature-top">
    <section class="title-cate">
        <h2><a href="#" title="">Sản phẩm nổi bật</a></h2>
        <ul>
            <li><a href="#" title="">Xem hết</a></li>
        </ul>
    </section><!-- end .title-cate -->
    <section class="list-productc">
        <ul class="jacrose noibat">
            <?php if(isset($quan_tam)):?>
            <?php foreach($quan_tam as $item):?>
            <li class="jacrose">
                <article>
                    <section class="tooltip-target" id="<?php echo $item['Product']['id'];?>">
                        <figure style="position: relative">
                            <?php
												echo $this->Html->link(
                            $this->Html->image($item['Product']['thumbnail']),
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
                            'class' => 'img-productc'
                            )
                            );
                            ?>
                            <figcaption>
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
                                )
                                );
                                ?>
                            </figcaption>
                            <?php
												echo $this->Html->link(
                            '',
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
                            'class' => 'chi-tiet'
                            )
                            );
                            ?>
                        </figure>
                        <!--<strong><?php echo number_format($item['Product']['price'],0,',','.');?>đ</strong><div class="clear"></div> -->
                        <section class="example-content" id="data_<?php echo $item['Product']['id'];?>">
                            <h3><?php echo $item['Product']['name'];?></h3>


                            <!--<p class="title-sale">Khuyến mãi:</p>-->
                            <section class="content-sale">
                                <?php echo $item['Product']['content'];?>
                            </section>

                            <p class="price">

                                <?php if($item['Product']['discount_status'] == 1):?>
                                <strike>
                                    <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                </strike>
                                <br />
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']);?>
                                <?php else:?>
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                <?php endif;?>
                            </p>
                        </section>

                    </section>

                </article>
            </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <div class="clearout"></div>
    </section><!-- end .list-productc -->

</section><!-- end .product-cate -->

<section class="product-cate product-feature-top1">
    <section class="title-cate">
        <h2><a href="#" title="">Sản phẩm nhiều người mua</a></h2>
        <ul>
            <li><a href="#" title="">Xem hết</a></li>
        </ul>
    </section><!-- end .title-cate -->
    <section class="list-productc">
        <ul class="jacrose muanhieu">
            <?php if(isset($ban_chay)):?>
            <?php foreach($ban_chay as $item):?>
            <?php $data_category = $this->requestAction("/products/get_category/{$item['Product']['category_id']}");?>
            <li class="jacrose">
                <article>
                    <section class="tooltip-target" id="<?php echo $item['Product']['id'];?>">
                        <figure style="position: relative">
                            <?php
												echo $this->Html->link(
                            $this->Html->image($item['Product']['thumbnail']),
                            array(
                            'controller' => 'products',
                            'action' => 'view_product',
                            'category' => $data_category['Category']['slug'],
                            'product' => $item['Product']['slug'],
                            'id' => $item['Product']['id'],
                            'ext' => 'html'
                            ),
                            array(
                            'escape' => false,
                            'class' => 'img-productc'
                            )
                            );
                            ?>
                            <figcaption>
                                <?php
													echo $this->Html->link(
                                $item['Product']['name'],
                                array(
                                'controller' => 'products',
                                'action' => 'view_product',
                                'category' => $data_category['Category']['slug'],
                                'product' => $item['Product']['slug'],
                                'id' => $item['Product']['id'],
                                'ext' => 'html'
                                ),
                                array(
                                'title' => $item['Product']['name'],
                                )
                                );
                                ?>
                            </figcaption>
                            <?php
												echo $this->Html->link(
                            '',
                            array(
                            'controller' => 'products',
                            'action' => 'view_product',
                            'category' => $data_category['Category']['slug'],
                            'product' => $item['Product']['slug'],
                            'id' => $item['Product']['id'],
                            'ext' => 'html'
                            ),
                            array(
                            'title' => $item['Product']['name'],
                            'class' => 'chi-tiet'
                            )
                            );
                            ?>
                        </figure>
                        <!--<strong><?php echo number_format($item['Product']['price'],0,',','.');?>đ</strong><div class="clear"></div> -->
                        <section class="example-content" id="data_<?php echo $item['Product']['id'];?>" style="display:none;">
                            <h3><?php echo $item['Product']['name'];?></h3>



                            <section class="content-sale">
                                <?php echo $item['Product']['content'];?>
                            </section>
                            <p class="price">
                                <?php if($item['Product']['discount_status'] == 1):?>
                                <strike>
                                    <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                </strike>
                                <br />
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']);?>
                                <?php else:?>
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                <?php endif;?>
                            </p>
                        </section>
                    </section>

                </article>
            </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <div class="clearout"></div>
    </section><!-- end .list-productc -->
</section><!-- end .product-cate -->

<section class="product-cate product-feature-top2">
    <section class="title-cate">
        <h2><a href="#" title="">Sản phẩm mới nhất</a></h2>
        <ul>
            <li><a href="#" title="">Xem hết</a></li>
        </ul>
    </section><!-- end .title-cate -->
    <section class="list-productc">
        <ul class="jacrose moinhat">
            <?php if(isset($product_new)):?>
            <?php foreach($product_new as $item):?>
            <li class="jacrose">
                <article>
                    <section class="tooltip-target" id="<?php echo $item['Product']['id'];?>">
                        <figure style="position: relative">
                            <?php
												echo $this->Html->link(
                            $this->Html->image($item['Product']['thumbnail']),
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
                            'class' => 'img-productc'
                            )
                            );
                            ?>
                            <figcaption>
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
                                )
                                );
                                ?>
                            </figcaption>
                            <?php
												echo $this->Html->link(
                            '',
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
                            'class' => 'chi-tiet'
                            )
                            );
                            ?>
                        </figure>
                        <!--<strong><?php echo number_format($item['Product']['price'],0,',','.');?>đ</strong><div class="clear"></div> -->
                        <section class="example-content" id="data_<?php echo $item['Product']['id'];?>" style="display:none;">
                            <h3><?php echo $item['Product']['name'];?></h3>


                            <section class="content-sale">
                                <?php echo $item['Product']['sale_artifacts'];?>
                            </section>
                            <p class="price">
                                <?php if($item['Product']['discount_status'] == 1):?>
                                <strike>
                                    <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                </strike>
                                <br />
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency,$item['Product']['discount']);?>
                                <?php else:?>
                                <?php echo $this->Tool->price($item['Product']['price'],$to_currency);?>
                                <?php endif;?>

                            </p>
                        </section>
                    </section>

                </article>
            </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <div class="clearout"></div>
    </section><!-- end .list-productc -->

</section><!-- end .product-cate -->
</section>
</section>

<script type="text/javascript">
    /* jCarouselLite */
    $(".noibat").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        },
        visibleItems: 5
    });

    $(".muanhieu").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        },
        visibleItems: 5
    });

    $(".moinhat").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        },
        visibleItems: 5
    });


</script>