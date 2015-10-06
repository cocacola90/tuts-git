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
$advs = $this->requestAction('/slides/get_advs');
?>

<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
<div class="row-fluid">
<div class="span3 left-mod">
<div class="hidden-phone">
<?php if (!empty($list_categories)): ?>
    <div class="moduletable cont">
        <div class="mods">
            <div class="bghelper">
                <h3>Categories</h3>

                <div class="modulcontent">
                    <ul class="VM-menu" id="promart-VMmenu601_0713">
                        <?php $sub_menu = $this->Tool->RecursiveLeftCategories($list_categories); ?>
                        <?php echo $sub_menu; ?>
						<li class="inactive">
							<span class="opener">-</span><a href="/new-arrivals.html">New Arrivals</a>	
						</li>
						<li class="inactive">
							<span class="opener">-</span><a href="/top-sellers.html">Top Sellerss</a>	
						</li>
						<li class="inactive">
							<span class="opener">-</span><a href="/sale.html">Sale</a>	
						</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
if (!empty($advs)):
    ?>
    <div class="moduletable ">
        <div class="mods">
            <div class="bghelper">
                <div class="modulcontent">
                    <div class="custom">
                        <?php foreach ($advs as $item): ?>
                            <p>
                                <a href="<?php echo $item['Slide']['link']; ?>">
                                    <?php echo $this->Html->image($item['Slide']['image'], array('width' => '219', 'height' => '132', 'class' => 'img-responsive')); ?>
                                </a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
            </div>
        </div>
    </div>
</div>

<div class="moduletable cont">
    <div class="mods">
        <div class="bghelper">
            <h3>Subcribers</h3>
            <div class="modulcontent">
                <div id="form-subscribes">
                    <?php echo $this->Form->create('Subscriber',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
                    <?php echo $this->Form->input('email',array('placeholder'=>'Email address','id'=>'txtsubscribe','class'=>'inactive','div'=>false,'style'=>'width: 163px;')); ?>
                    <?php echo $this->Form->input('Subscribe',array('type'=>'submit','id'=>'btnsubscribe','class' => 'btn btn-primary')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
			<?php echo $this->element('facebook');?>
        </div>
    </div>
</div>
</div>
<div class="hidden-phone">
</div>
</div>
<div class="span9 main-column">

<?php if (isset($products)): ?>
    <div class="content-top-mods first row-fluid">
    <div class="moduletable span12">
    <div class="mods">
    <div class="bghelper">
    <h3>New Arrivals</h3>

    <div class="modulcontent">
    <div id="product-list" class="vm-product-module">
    <div class="vm-product-module product-listing">
    <?php
    $stt = 0;
    foreach ($products as $item):
        $stt++;
        if ($stt == 1) {
            echo '<div class="row-fluid">';
        }
		$values = $item['Value'];
        foreach ($values as $value) {
            $arr[$item['Product']['id']][$value['attribute_id']][$value['id']] = $value['name'];
        }
        ?>
        <div class="product product-hover span3">
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
									<div class="PricebasePriceWithTax"
										 style="display : block;">
										<span class="PricebasePriceWithTax">
											<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($item['Product']['price'], $to_currency)); ?>
										</span>
									</div>
								</span>
                            <div class="PricesalesPrice" style="display : block !important;">
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
				<?php if($item['Product']['publish'] == 1):?>
                    <a href="#" class="add-to-cart-button" rel="add-to-cart-view"
                       data-title="Add to Cart"
                       data-id="<?php echo $item['Product']['id']; ?>"><span
                            aria-hidden="true"  class="icon-cart"></span></a>

                    <div id="product-id-<?php echo $item['Product']['id'] ?>"
                         class="add-to-cart-details-view hide">
                        <div class="addtocart-area ">
                            <?php echo $this->Form->create('Product', array('class' => 'product js-recalculate', 'id' => "qt-addCartForm-{$item['Product']['id']}")) ?>

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
                                            +<div id="ship_small_view-<?php echo  $item['Product']['id'];?>"></div>
											<?php //echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_smallpacket_to_usd, $to_currency)); ?>
                                        </label>
                                        <input id="341" type="radio" value="2"
                                               name="pship_type"/><label for="34"
                                                                         class="other-customfield">
                                            <p>
                                                Parcel
                                            </p>
                                            +<div id="ship_parcel_view-<?php echo  $item['Product']['id'];?>"></div>
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
                                   onClick="addCart('<?php echo $item['Product']['id']; ?>','qt-');">Submit</a>

                                <div class="clear">
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
				<?php else:?>
					<a href="/contacts" class="notify-button" title="Notify Me">
					<span aria-hidden="true" data-icon="" class="notify-icon"></span>
					</a>
				<?php endif;?>
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
			if($this->Paginator->hasPage(2)){
			$this->Paginator->options(array(
			'url' => array(
			'controller' => 'products',
				'action' => 'product_new',
				'sort' => 'created', 'direction' => 'desc'

			)
			));
			echo $this->element('pagination');
		};?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php endif; ?>

<div id="system-message-container">
</div>
<section class="blog-featured">
</section>
</div>
<div class="span3 left-mod">
<div class="visible-phone">
<div class="moduletable cont">
    <div class="mods">
        <div class="bghelper">
            <h3>Categories</h3>

            <div class="modulcontent">
                <ul class="VM-menu" id="promart-VMmenu601_0713">
                    <?php $sub_menu = $this->Tool->RecursiveLeftCategories($list_categories); ?>
                    <?php echo $sub_menu; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
                <div class="custom">
                    <?php foreach ($advs as $item): ?>
                        <p>
                            <a href="<?php echo $item['Slide']['link']; ?>">
                                <?php echo $this->Html->image($item['Slide']['image'], array('width' => '219', 'height' => '132', 'class' => 'img-responsive')); ?>
                            </a>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <div class="modulcontent">
            </div>
        </div>
    </div>
</div>
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <h3>Best Sale</h3>

            <div class="modulcontent">
            <?php foreach ($ban_chay as $item): ?>
                <?php $product_info = $this->requestAction('/products/product_info/' . $item['Product']['slug'] . '/' . $item['Product']['id']);
                //  pr($product_info);exit;
                $values = $product_info['Value'];
                foreach ($values as $value) {
                    $arr[$value['attribute_id']][$value['id']] = $value['name'];
                }
                ?>
                <div id="product-list" class="vm-product-module">
                    <div class="vm-product-module product-listing">
                        <div class="row-fluid">
                            <div class="product product-hover span12">
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
                                            $this->Html->image($this->Tool->get_thumbs($item['Product']['thumbnail']), array('alt' => $item['Product']['name'], 'class' => 'product-image img-responsive', 'border' => '0')),
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
                                    <div class="product-price price" id="productPrice110"
                                         style="opacity: 0.75;">
                                        <div class="price-class">
                                            <?php if ($item['Product']['discount_status'] == 1): ?>
                                                <span class="price-before-dicount">
                                            <div class="PricebasePriceWithTax"
                                                 style="display : block;">
                                                <span class="PricebasePriceWithTax">
                                                    <?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($item['Product']['price'], $to_currency)); ?>
                                                </span>
                                            </div>
                                        </span>
                                                <div class="PricesalesPrice" style="display : block !important;">
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
									<?php if($item['Product']['publish'] == 1):?>
                                        <a href="#" class="add-to-cart-button" rel="add-to-cart-view"
                                           data-title="Add to Cart"
                                           data-id="<?php echo $item['Product']['id']; ?>"><span
                                                aria-hidden="true" data-icon="&#xe003;" class="icon-cart"></span></a>

                                        <div id="product-id-<?php echo $item['Product']['id'] ?>"
                                             class="add-to-cart-details-view hide">
                                            <div class="addtocart-area ">
                                                <?php echo $this->Form->create('Product', array('class' => 'product js-recalculate', 'id' => "mb-bc-addCartForm-{$item['Product']['id']}")) ?>

                                                <div class="product-fields">
                                                    <div class="product-field product-field-type-S">
                                                        <div class="product-fields-title-group">
                                                     <span class="product-fields-title title-tip"
                                                           rel="tooltip" title="Please choose Color">Color:</span>
                                                        </div>

                                                        <div class="product-field-display">
                                                            <?php foreach ($arr[10] as $ky => $va): ?>
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
                                                            $small_packet = $this->Tool->get_amount_shipping($item['Product']['weight'], 1, $continent);
                                                            $parcel = $this->Tool->get_amount_shipping($item['Product']['weight'], 2, $destination);
                                                            // echo $parcel;exit;
                                                            $convert_smallpacket_to_usd = $small_packet / $currency_vn['Country']['rate'];
                                                            $convert_parcel_to_usd = $parcel / $currency_vn['Country']['rate'];
                                                            // echo $currency_vn['Country']['rate'];exit;
                                                            ?>
                                                            <input id="341" checked="checked" type="radio"
                                                                   value="1" name="pship_type"/><label for="34"
                                                                                                       class="other-customfield">
                                                                <p>
                                                                    Small Packet
                                                                </p>
                                                                +<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_smallpacket_to_usd, $to_currency)); ?>
                                                            </label>
                                                            <input id="341" type="radio" value="2"
                                                                   name="pship_type"/><label for="34"
                                                                                             class="other-customfield">
                                                                <p>
                                                                    Parcel
                                                                </p>
                                                                +<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_parcel_to_usd, $to_currency)); ?>
                                                            </label>
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
                                                       onClick="addCart('<?php echo $item['Product']['id']; ?>','mb-bc-');">Submit</a>

                                                    <div class="clear">
                                                    </div>
                                                </div>
                                                <?php echo $this->Form->end(); ?>
                                                <div class="clear">
                                                </div>
                                            </div>
                                        </div>
										<?php else:?>
											<a href="/contacts" class="notify-button" title="Notify Me">
											<span aria-hidden="true" data-icon="" class="notify-icon"></span>
											</a>
										<?php endif;?>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </article>
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!--<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
           <?php echo $this->element('facebook');?>
        </div>
    </div>
</div>-->
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo $this->element('testimonial')?>	

<script>

    function addCart(product_id,prefix) {
        //alert(product_id);
        var arr_data = $('form#'+ prefix +'addCartForm-' + product_id).serialize();
		var exp = explode('_method=POST&',arr_data);
		var data  = exp[1];
        var quantity = $('#pquantity').val();
        $("#ordels_tatus").html('<img src="/theme/Dx/img/loader.gif" align="absmiddle">&nbsp;Checking...');
		
        $.ajax({
            url: '/products/add_to_cart',
            type: 'POST',
            data: data,
            //dataType: json,
            success: function (msg_data) {
                
                var obj = jQuery.parseJSON(msg_data);
                if (obj.message === "ok") {
                    
                    $("#total-cart-mini").html('<strong>' + obj.amount + '</strong><i class="icon-cart"></i>');
					$("#cart_quantity").text(obj.c_qty);
					$("#cart-mini").html(obj.cart_mini);
					loi_sweet('Item added to cart!', 'success',3000);
                }
                else if (obj.message === "false") {
                   loi_sweet('Item add false!', 'warning',3000);
                }
				else if(obj.message === "no color")
				{
					loi_sweet('Color is required !', 'warning',3000);
				}
            }
        });
    }

</script>
                        