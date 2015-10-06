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
<div class="banner-breadcrumb">		
    <div class="container">
    	<div class="inner-wrap">						
            <div class="pathway row-fluid">
            <ul class="breadcrumb span12">
                <li><a href="/" class="pathway">Home</a></li>
                <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"/></span>
				<li><a href="/blogs" class="pathway">Blogs</a></li>
                <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"/></span>
                <li class="active"><?php echo $post['Post']['title'];?></li>
           	</ul>
            </div>			
    	</div>		
    </div>	
</div>
<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
<div class="row-fluid">

<!--- content - right-->
<div class="span9 main-column">
<article class="item-page">
	<h2>Blogs </h2>
	<h1 style="font-size: 2.2em; margin: 0.271em 0px; color: #5c5551; font-family: arial, sans-serif; font-weight: bold; line-height: 1.1em;"><?php echo $post['Post']['title'];?></h1>
	<p style="font-family: arial, sans-serif; font-size: 1.125em; line-height: 1.4; margin: 0.2em 0px 1em; color: #878280;">
		Updated: <?php echo date('m/d/Y H:i', $post['Post']['created']);?>
	</p>
	<p style="font-family: arial, sans-serif; font-size: 1.125em; line-height: 1.4; margin: 0.2em 0px 1em; color: #878280;">
		<?php echo $post['Post']['description'];?>
	</p>
	<?php echo $post['Post']['content'];?>
	</article>
	<?php if(isset($related)):?>
	<div class="moduletable span9">
		<div class="mods">
			<div class="bghelper">
				<h3>Relateds</h3>
				<div class="modulcontent">
					<ul class="list ">
					<?php foreach($related as $item):?>
						<li class="item">
						<?php
							echo $this->Html->link(
								 $item['Post']['title'],array(
									'controller'=>'posts',
									'action' => 'view',
									'slug_post' => $item['Post']['slug'],
									'id' => $item['Post']['id'],
									'ext' => 'html'
								)
							);
						?>
						</li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
</div>
<!-- end content-right-->
<div class="span3 right-mod">
<div class="hidden-phone">
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
<?php
if (isset($quan_tam)):

    ?>
    <div class="moduletable ">
    <div class="mods">
    <div class="bghelper">
    <h3>Best Sale</h3>

    <div class="modulcontent">
    <?php foreach ($quan_tam as $item): ?>
        <?php //$product_info = $this->requestAction('/products/product_info/' . $item['Product']['slug'] . '/' . $item['Product']['id']);
        // pr($item);exit;
        $values = $item['Value'];
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
                                   data-id="<?php echo $item['Product']['id']; ?>"><span class="icon-bubble"></span></a>

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
                                                    <?php foreach ($arr[10] as $ky => $va): ?>
                                                        <input id="<?php echo $ky; ?>" checked="checked"
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
<?php
endif;
?>
<div class="moduletable cont">
    <div class="mods">
        <div class="bghelper">
            <h3>Subcribers</h3>

            <div class="modulcontent">
                <div id="form-subscribes">
                    <!--<form action="">
                        <input id="txtsubscribe" type="text" placeholder="Email address"/>
                        <input id="btnsubscribe" type="submit" value="Subscribe"/>
                    </form>-->
                    <?php echo $this->Form->create('Subscriber',array('inputDefaults'=>array('label'=>false),'action'=>'/sub')); ?>
                    <?php echo $this->Form->input('email',array('placeholder'=>'Email address','id'=>'txtsubscribe','class'=>'inactive','div'=>false,'style'=>'width: 163px;')); ?>
                    <?php echo $this->Form->input('Subscriber',array('type'=>'submit','id'=>'btnsubscribe','class' => 'btn btn-primary')); ?>
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
<div class="span3 left-mod">
<div class="visible-phone">

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
            <?php foreach ($quan_tam as $item): ?>
                <?php //$product_info = $this->requestAction('/products/product_info/' . $item['Product']['slug'] . '/' . $item['Product']['id']);
                //  pr($product_info);exit;
                $values = $item['Value'];
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
                                                aria-hidden="true" data-icon="&#xe003;"></span></a>

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
                                                            <?php foreach ($arr[10] as $ky => $va): ?>
                                                                <input id="<?php echo $ky; ?>" checked="checked"
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
<div class="moduletable ">
    <div class="mods">
        <div class="bghelper">
            <h3>Facebook</h3>

            <div class="modulcontent">

            </div>
        </div>
    </div>
</div>
</div>
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
               
                var obj = jQuery.parseJSON(msg_data);
                if (obj.message === "ok") {
                    // alert('Item added to cart!');
                    $("#total-cart-mini").html('<strong>' + obj.amount + '</strong>');
					$("#cart-mini").html(obj.cart_mini);
					$("#cart_quantity").text(obj.c_qty);
					loi_sweet('Item added to cart!', 'success',3000);
                }
                else if (obj.message === "false") {
                     loi_sweet('Item add false!', 'warning',3000);
                }
               
            }

        });
    }
</script>
                        