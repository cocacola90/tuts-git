<?php
if (isset($currency)) {
    $to_currency = $currency['code'];
} else {
    $to_currency = "";
}

if (isset($country_info)) {
    $destination = $country_info['Country']['code'];
    $continent = $country_info['Country']['continent'];
}
?>
<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/" class="pathway">Home</a></li>
                    <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                                               class="breadcrumbs-separator" alt="separator"></span>
                    <li class="active">Search</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
<div class="row-fluid">
<div class="span12 main-column">

<div id="system-message-container">
</div>
<section id="product-list" class="browse-view product-listing">
<div id="ajax-products">
<h1 class="category-page-title"></h1>

<div class="product-sorting-cont row-fluid">
   <!-- <div class="normal-sort">
        <div class="orderlistcontainer">
            <div class="title">
                Sort by
            </div>
            <div class="activeOrder">
                <a title=" +/-" href="/en/shop/orderDesc?language=en-GB">Product Name +/-</a>
            </div>
            <div class="orderlist">
                <div>
                    <a title="Category" href="/en/shop/by,category_name?language=en-GB">Category</a>
                </div>
                <div>
                    <a title="Manufacturer name" href="/en/shop/by,mf_name?language=en-GB">Manufacturer name</a>
                </div>
                <div>
                    <a title="Product Price" href="/en/shop/by,product_price?language=en-GB">Product Price</a>
                </div>
            </div>
        </div>
    </div>-->
</div>
<div class="row-fluid counter-pagination">
    <div class="product-counter span6">
        <div id="spotlight">Keyword: <span style="color: green;"><?php echo $keywords; ?></span></div>
    </div>
</div>
<div id="product-list-container" class="product-list-page">
<?php if (isset($products)): ?>
    <?php
    $stt = 0;
    foreach ($products as $item):
        $stt++;
        if ($stt == 1) {
            echo '<div class="row-fluid product-bunch">';
        }
        ?>
        <?php $product_info = $this->requestAction('/products/product_info/' . $item['Product']['slug'] . '/' . $item['Product']['id']);
        //  pr($product_info);exit;
        $values = $product_info['Value'];
        foreach ($values as $value) {
            $arr[$item['Product']['id']][$value['attribute_id']][$value['id']] = $value['name'];
        }
        ?>
        <div class="product product-hover span3 vertical-separator">
            <article class="spacer">
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
                    )
                );
                if ($item['Product']['discount_status'] == 1) {
                    echo '<div class="tags right sale"></div>';
                }
                ?>
                <div class="image-cont">
                    <?php
                    echo $this->Html->link(
                        $this->Html->image($this->Tool->get_thumbs($item['Product']['thumbnail']), array('alt' => $item['Product']['name'], 'class' => 'product-image img-responsive', 'border' => '0', 'width' => '141', 'height' => '141')),
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
                        )
                    );
                    ?>
                </div>
                <div class="title-container">
                    <h3 class="cat-product-title">
                        <?php
                        echo $this->Html->link(
                            $this->Tool->substr($item['Product']['name'], 0, 40),
                            array(
                                'controller' => 'products',
                                'action' => 'view_product',
                                'category' => $item['Category']['slug'],
                                'product' => $item['Product']['slug'],
                                'id' => $item['Product']['id'],
                                'ext' => 'html'
                            ),
                            array(
                                'title' => $item['Product']['name']
                            )
                        );
                        ?>
                    </h3>
                </div>
                <div class="product-price price" id="productPrice110" style="opacity: 0.75;">
                    <div class="price-class">
                        <?php if ($item['Product']['discount_status'] == 1): ?>
                            <span class="price-before-dicount">
							<div class="PricebasePriceWithTax" style="display : block;">
								<span class="PricebasePriceWithTax">
									<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($item['Product']['price'], $to_currency)); ?>
								</span>
                            </div>
						</span>
                            <div class="PricesalesPrice" style="display : block;">
							<span class="PricesalesPrice">
								<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($item['Product']['price'], $to_currency, $item['Product']['discount'])); ?>
							</span>
                            </div>
                            <div class="product-discount">
                                (Discount: <?php echo $item['Product']['discount']; ?>.00%)
                            </div>
                        <?php else: ?>
                            <div class="PricesalesPrice" style="display : block;">
							<span class="PricesalesPrice">
							<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($item['Product']['price'], $to_currency)); ?>
							</span>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

             <div class="add-to-cart-view-container">
                    <a href="#" class="add-to-cart-button" rel="add-to-cart-view"
                       data-title="Add to Cart"
                       data-id="<?php echo $item['Product']['id']; ?>"><span
                            aria-hidden="true" data-icon="&#xe003;" class="icon-cart"></span></a>

                    <div id="product-id-<?php echo $item['Product']['id'] ?>"
                         class="add-to-cart-details-view hide">
                        <div class="addtocart-area ">
                            <?php echo $this->Form->create('Product', array('class' => 'product js-recalculate', 'id' => "addCartForm-{$item['Product']['id']}")) ?>

                            <div class="product-fields">
                                <div class="product-field product-field-type-S">
                                    <div class="product-fields-title-group">
                                                     <span class="product-fields-title title-tip"
                                                           rel="tooltip" title="Please choose Color">Color:</span>
                                    </div>

                                    <div class="product-field-display">
									
                                        <?php foreach ($arr[$item['Product']['id']][10] as $ky => $va): ?>
                                            <input id="<?php echo $ky; ?>"
                                                   type="radio" value="<?php echo $ky; ?>"
                                                   name="pcolor"/>
                                            <label for="32" class="other-customfield">
                                                <p>
                                                    <?php echo $va; ?>
                                                </p>
                                                No additional charge</label>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                                <div class="product-field product-field-type-S">
                                    <div class="product-fields-title-group">
                                                                    <span class="product-fields-title title-tip"
                                                                          rel="tooltip"
                                                                          title="Please choose Shipping Method">Shipping Cost:</span>
                                    </div>
                                    <div class="product-field-display">
                                        <?php
                                       /*  $small_packet = $this->Tool->get_amount_shipping($item['Product']['weight'], 1, $continent);
                                        $parcel = $this->Tool->get_amount_shipping($item['Product']['weight'], 2, $destination);
                                        // echo $parcel;exit;
                                        $convert_smallpacket_to_usd = $small_packet / $currency_vn['Country']['rate'];
                                        $convert_parcel_to_usd = $parcel / $currency_vn['Country']['rate']; */
                                        // echo $currency_vn['Country']['rate'];exit;
                                        ?>
                                        <input id="341" checked="checked" type="radio"
                                               value="1" name="pship_type"/><label for="34"
                                                                                   class="other-customfield">
                                            <p>
                                                Small Packet
                                            </p>
                                            +<div id="ship_small_new-<?php echo  $item['Product']['id'];?>"></div>
											<?php //echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_smallpacket_to_usd, $to_currency)); ?>
                                        </label>
                                        <input id="341" type="radio" value="2"
                                               name="pship_type"/><label for="34"
                                                                         class="other-customfield">
                                            <p>
                                                Parcel
                                            </p>
                                            +<div id="ship_parcel_new-<?php echo  $item['Product']['id'];?>"></div>
											<?php //echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_parcel_to_usd, $to_currency)); ?>
                                        </label>
										 <script type="text/javascript">
                                            cost(<?php echo  $item['Product']['weight'];?>, <?php echo  $item['Product']['id'];?>);
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="addtocart-bar">
                                <div id="qaunity-selector"
                                     class="input-prepend input-append hide">
                                    <input type="hidden" name="pid"
                                           value="<?php echo $item['Product']['id']; ?>"/>
                                    <input type="hidden" name="pcontinent"
                                           value="<?php echo $continent; ?>"/>
                                    <input type="hidden" name="pdestination"
                                           value="<?php echo $destination; ?>"/>
                                    <input type="text" class="quantity-input js-recalculate"
                                           id="appendedPrependedInput" name="pquantity"
                                           value="1" type="hidden"/>
                                </div>
                                <?php //echo $this->Form->button('Submit',array('class'=>'addtocart-button btn btn-inverse','type'=>'submit','label'=>false))?>

                                <a id="submit-<?php echo $item['Product']['id']; ?>"
                                   class="addtocart-button btn btn-inverse submit-<?php echo $item['Product']['id']; ?>"
                                   onClick="addCart('<?php echo $item['Product']['id']; ?>');">Submit</a>

                                <div class="clear">
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
            </article>
        </div>
        <?php
        if ($stt == 4) {
            echo '</div>';
            $stt = 0;
        }
        ?>
    <?php
    endforeach;
    if ($stt > 1 && $stt < 4) {
        echo '</div>';
    }

    ?>
    <div class="clear">
    </div>
    <?php
    if ($this->Paginator->hasPage(2)) {
        echo $this->element('pagination');
    };?>
<?php endif; ?>

<!-- end of row -->
<div class="NextPageLink">
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
<script>

    function addCart(product_id) {
        //alert(product_id);
        var arr_data = $('form#addCartForm-' + product_id).serialize();
        var exp = explode('_method=POST&',arr_data);
        //console.log(exp);
        var data  = exp[1];
        var quantity = $('#pquantity').val();
        $("#ordels_tatus").html('<img src="/theme/Dx/img/loader.gif" align="absmiddle">&nbsp;Checking...');
        $.ajax({
            url: '/products/add_to_cart',
            type: 'POST',
            data: data,
            //dataType: json,
            success: function (msg_data) {
                console.log(msg_data);
                var obj = jQuery.parseJSON(msg_data);
                if (obj.message === "ok") {
                    // alert('Item added to cart!');
                    $("#total-cart-mini").html('<strong>' + obj.amount + '</strong>');
					loi_sweet('Item added to cart!', 'success',3000);
					$("#cart-mini").html(obj.cart_mini);
                }
                else if (obj.message === "false") {
                   loi_sweet('Item add false!', 'warning',3000);
                }
               
            }

        });
        console.log(arr_data);


    }
</script>
                        