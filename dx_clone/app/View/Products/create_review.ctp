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

<div id="product_detail">
    <div class="row">
        <?php if(isset($products)):?>

        <div class="col-lg-3 col-md-3 col-sm-4 box">
            <div class="box_product">
                <?php if($products['Product']['discount_status'] == 1):?>
                <div class="discount">
                    <div class="discount_sale"></div>
                    <p class="sale_percent"><?php echo $products['Product']['discount']?>% <span>off</span></p>
                </div>
                <?php endif;?>
                <?php
				echo $this->Html->link(
                $this->Html->image($this->Tool->get_thumbs($products['Product']['thumbnail']),array('alt' =>
                'no-img','class'=>'img_product img-responsive')),
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $products['Category']['slug'],
                'product' => $products['Product']['slug'],
                'id' => $products['Product']['id'],
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
                $products['Product']['name'],
                array(
                'controller' => 'products',
                'action' => 'view_product',
                'category' => $products['Category']['slug'],
                'product' => $products['Product']['slug'],
                'id' => $products['Product']['id'],
                'ext' => 'html'
                ),
                array(
                'title' => $products['Product']['name'],
                'class' => 'title_product'
                )
                );
                ?>


                <?php if($products['Product']['discount_status'] == 1):?>
                    <span class="price">

                        <strike>
                            <?php echo $currency['prefix']; ?>
                            <?php echo $this->
                            Tool->number_format($this->Tool->price($products['Product']['price'],$to_currency));?>
                        </strike>
                     </span>
                     <span class="price">
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->
                         Tool->number_format($this->Tool->price($products['Product']['price'],$to_currency,$products['Product']['discount']));?>
                     </span>
                <?php else:?>
                     <span class="price">
                         <?php echo $currency['prefix']; ?>
                         <?php echo $this->
                         Tool->number_format($this->Tool->price($products['Product']['price'],$to_currency));?>
                     </span>

                <?php endif;?>


                <div class="free-shipping">

                    <i>Giá ship small-packet: </i>

                    <div id="ship_small_new-<?php echo  $products['Product']['id'];?>"></div>
                    <i> Giá ship parcel:</i>

                    <div id="ship_parcel_new-<?php echo  $products['Product']['id'];?>"></div>
                    <script type="text/javascript">
                        cost( <?php echo $products['Product']['weight'];?> ,  <?php echo $products['Product']['id'];?>);

                    </script>

                    <?php echo $this->Html->image('free-shipping.jpg',array('alt' => ''));?>
                    <!-- <img src="img/free-shipping.jpg" alt=""/>-->
                </div>
                <?php echo $this->Html->link(
                $products['Category']['name'],
                array(
                'controller' => 'categories',
                'action' => 'index',
                'category' => $products['Category']['slug'],
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

        <?php endif;?>

        <!--End .box_product-->
    </div>
</div>
<div id="review">
    <?php if($ck == 1):?>
    <div id="danhgia">
        <div class="basic" data-average="<?php echo $products['Product']['avg_mark']?>" data-id="<?php echo $products['Product']['id'];?>"></div>
        <div id="box-message"></div>
        <div id="pop-message"></div>
        <div id="change_avg"></div>
    </div>
    <div class="content-comment">
        <div class="text-comment">
            <?php echo $this->Session->flash('comment');?>
            <?php echo $this->Form->create('Comment',array('action'=>'add'));?>
            <?php echo $this->Form->input('product_id',array('type'=>'hidden','value'=>$products['Product']['id']));?>
            <?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$users['id']));?>
            <?php echo $this->Form->input('name',array('type'=>'text','class'=>'txt-comment','placeholder'=>'Họ
            tên','label'=>false));?>
            <?php echo $this->
            Form->input('email',array('type'=>'email','class'=>'txt-comment','placeholder'=>'Email','label'=>false));?>
            <?php echo $this->
            Form->textarea('comment',array('type'=>'email','cols'=>'70','rows'=>'5','placeholder'=>'Viết bình
            luận','label'=>false));?>

            <input type="submit" class="btn-comment" name="btn-comment" value="Bình luận"/>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <?php else:?>
    <p>Bạn chưa mua sản phẩm này! Hãy mua sản phẩm này
        <?php
		echo $this->Html->link(
       'tại đây',
        array(
        'controller' => 'products',
        'action' => 'view_product',
        'category' => $products['Category']['slug'],
        'product' => $products['Product']['slug'],
        'id' => $products['Product']['id'],
        'ext' => 'html'
        ),
        array(
        'title' => $products['Product']['name'],
        'class' => 'title_product'
        )
        );
        ?>
        để thực hiện review sản phẩm.</p>
    <?php endif;?>

</div>


<script type="text/javascript">
    $(document).ready(function(){
        // simple jRating call
        $(".basic").jRating();
    });
</script>