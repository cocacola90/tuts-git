<?php
	$values = $product['Value'];
	foreach ($values as $value)
	{
		$arr[$value['attribute_id']][$value['id']] = $value['name'];
	}
	foreach($product['Market'] as $value)
	{
		$market[$value['id']] = $value['name'];
	}


    if(isset($currency)){
        $to_currency = $currency['code'];
    }else
    {
        $to_currency = "";
    }

?>
<div id="breadcrumb">
    <ul>
        <li>
            <?php echo $this->Html->link('<span>' . $this->Html->image('icon-homeb.png') . '</span>', DOMAIN_ROOT, array('escape' => false)); ?>
        </li>
        <li>»</li>
        <li><a href="#">Điện thoại</a></li>
        <li>»</li>
        <li><h1><a href="dien-thoai/htc-windows-phone-8s-2146.html" title="<?php echo $product['Product']['name'];?>"><span><?php echo $product['Product']['name'];?></span></a></h1></li>
    </ul>
</div>
<!-- End #breadcrumb -->
<div id="view-product">
    <?php echo $this->element('left_product');?>
    <!-- End #left-product-->

    <div id="right-product">
        <section id="deltail">
            <section class="img-info">
                <section class="img-detail">
                    <div class="imagesChinh">
                        <?php $arr_img = json_decode($product['Product']['image_more']);?>
                        <?php $count_img = count($arr_img);?>
                        <figure class="img-main">
                            <a href="<?php echo $arr_img[0];?>" rel="lightbox[roadtrip]">
                                <img src="<?php echo $arr_img[0];?>">
                            </a>
                        </figure>
                        <div class="thumbai">
                            <?php for($i = 1 ; $i< $count_img ; $i++):?>
                            <a href="<?php echo $arr_img[$i];?>" rel="lightbox[roadtrip]"></a>
                            <?php endfor;?>
                        </div>

                    </div>
                    <div class="slideshow-img">
                        <div class="anhPhu">
                            <ul class="jacrose">
                                <?php for($i = 0 ; $i< $count_img ; $i++):?>
                                <li class="<?php if($i==0) { echo 'active ';};?> jacrose">
                                    <div class="anhPhu-in">
                                        <img src="<?php echo $arr_img[$i];?>">
                                    </div>
                                </li>
                                <?php endfor;?>

                            </ul>
                        </div>

                        <!--if(isset($image_more) && (count($image_more) > 3))-->
                        <?php echo $this->Html->image('next-deltail.png',array('title'=>'Next','alt'=>'Next','class'=>'next-deltail'));?>
                        <?php echo $this->Html->image('prev-deltail.png',array('title'=>'Next','alt'=>'Next','class'=>'prev-deltail'));?>


                    </div>
                    <!--if(isset($image_more) && (count($image_more) > 3))-->
                    <script type="text/javascript">
                        /* jCarouselLite */
                        $("#deltail .img-info .img-detail .slideshow-img .anhPhu").jCarouselLite({
                            speed: 1000,
                            visible:3,
                            btnNext: "#deltail .img-info .img-detail .slideshow-img img.prev-deltail",
                            btnPrev: "#deltail .img-info .img-detail .slideshow-img img.next-deltail"
                        });

                        $(document).ready(function()
                        {
                            /* Click ảnh */
                            $(".anhPhu img").click(function () {
                                var anhPhu = $(this).attr("src");
                                var anhChinh = $(".imagesChinh img").attr("src");
                                $('.anhPhu li').removeClass('active');
                                $(this).parents("li").addClass('active');

                                if (anhPhu !== anhChinh) {
                                    $(".imagesChinh img").stop(true, false, false).
                                            animate({ opacity: "0" }, 500).
                                            queue(function () {
                                                $(".imagesChinh img").attr("src", anhPhu).dequeue();
                                            }).
                                            animate({ opacity: "1" }, 500)
                                };
                            });
                            $(".imagesChinh img").click(function(){
                                var linkAnhTheA = $(this).parent().attr("href");
                                var linkAnhTheImg = $(this).attr("src");
                                $(".thumbai a[href='"+ linkAnhTheImg +"']").attr("href", linkAnhTheA);
                                $(this).parent().attr("href", linkAnhTheImg);
                            });

                        });
                    </script>
                </section>
                <section class="info-detail">
                    <h1><?php echo $product['Product']['name'];?></h1>
                    <section class="config-deltail">
                        <?php echo $product['Product']['description'];?>

                    </section>
                    <?php if($product['Product']['discount_status'] == 1 ): ?>
                    <p class="price"> Giá thị trường: <strike><?php echo $this->Tool->price($product['Product']['price'],$to_currency);?></strike></p>
                    <p class="price"> Giá tại muaA: <?php echo  $this->Tool->price($product['Product']['price'],$to_currency,$product['Product']['discount']);?></p>
                    <?php else:?>
                    <p class="price"> Giá tại muaA: <?php echo $this->Tool->price($product['Product']['price'],$to_currency);?></p>
                    <?php endif; ?>


                    <p class="price">
                        Được bán tại:
                        <select name="" id="">
                            <?php foreach($market as $m => $v): ?>
                            <option value="<?php echo $m; ?>"><?php echo $v; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <div id="choose">
                        <!--<label for="color-product">Màu</label>
                        <select name="" id="color-product">
                            <option value="">Vui lòng chọn màu</option>
                        </select>-->
                        <?php echo $this->Form->create('Product',array('action'=>'add_cart_for_detail'));?>
                        <?php echo $this->Form->input('id',array('value'=>$product['Product']['id'],'type'=>'hidden'));?>

                        <label for="quantity">Số lượng</label>
                        <?php
										$options = array(
											'1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5',

                        );
                        echo $this->Form->input(
                        'quantity',
                        array(
                        'type'=>'select',
                        'options'=>$options,
                        'id'=>'quantity',
                        'empty'=>'Vui lòng chọn số lượng',
                        'label'=>false
                        )
                        );
                        ?>
                        <label for="dungluong">Dung lượng</label>
                        <?php
										echo $this->Form->input(
                        'storage',
                        array(
                        'type' => 'select',
                        'options' => $arr[12],
                        'id' => 'dungluong',
                        'label' => false
                        )
                        );
                        ?>
                        <label for="mausac">Màu sắc</label>
                        <?php
										echo $this->Form->input(
                        'color',
                        array(
                        'type' => 'select',
                        'options' => $arr[10],
                        'id' => 'mausac',
                        'label' => false
                        )
                        );
                        echo $this->Form->input('Đặt mua',array('type'=>'submit','label'=>false));
                        echo $this->Form->end();
                        ?>
                    </div>
                </section>
                <?php echo $this->Html->link('Thêm vào giỏ hàng',array('controller'=>'products','action'=>'add_cart',$product['Product']['id']),array('class'=>'addcart','label'=>false));?>
            </section>

        </section><!-- end #ldeltail -->

        <div id="mota">
            <p id="tieudemota">Mô tả sản phẩm</p>
            <p id="noidungmota">
                <?php echo $product['Product']['content'];?>

            </p>
        </div>

        <div id="danhgia">
            <input type="text" id="tieudedanhgia" />
            <textarea name="" id="noidungdanhgia" cols="30" rows="10"></textarea>
            <button id="nhanxet"></button>
        </div>


    </div>
</div>