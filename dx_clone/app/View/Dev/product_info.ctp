<?php echo $this->Html->css('JRating.jquery');?>
<?php echo $this->Html->script('JRating.jquery');?>
<?php
$values = $product['Value'];

foreach ($values as $value) {
    $arr[$value['attribute_id']][$value['id']] = $value['name'];
}
//pr($arr);
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
                    <li><?php echo $this->Html->link('Home', DOMAIN_ROOT,
                            array('escape' => false, 'class' => 'pathway')); ?></li>
                    <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">

                    <li>
                        <a href="/category/<?php echo $product['Category']['slug']; ?>.html"
                           class="pathway"><?php echo $product['Category']['name']; ?></a>
                    </li>
                    <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">
                    <li class="active"><?php echo $product['Product']['name']; ?></li>
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
<section id="product-details-page">
<article id="product-details" class="row-fluid">
<div class="span5">
    <figure class="product-image-gallery row-fluid">
        <?php
        $arr_img = json_decode($product['Product']['image_more']);
        $count_img = count($arr_img);
        ?>
        <div class="larger-image-top-wrap span12">
			<?php if($product['Product']['discount_status'] == 1):?>
				<div class="tags right sale"></div>
			<?php endif;?>
            <div>
                <div class="large-image-container">
                    <a href="<?php echo $arr_img[0]; ?>" class="cloud-zoom" id="zoom1" rel="adjustX: 10, adjustY:-4">
                        <img class="large-images" src="<?php echo $arr_img[0]; ?>"
                             alt="<?php echo $product['Product']['name']; ?>"/>
                    </a>
                </div>
            </div>
						<span class="modal-zoom">
                        <?php for ($i = 1; $i < $count_img; $i++): ?>
                            <?php if ($i == 1): ?>
                                <a class="modal-zoom-link show" href="<?php echo $arr_img[1]; ?>"
                                   rel="prettyPhoto[gal1]"></a>
                            <?php else: ?>
                                <a class="modal-zoom-link hide" href="<?php echo $arr_img[$i]; ?>"
                                   rel="prettyPhoto[gal1]"></a>

                            <?php
                            endif;
                        endfor;
                        ?>
                        
                        </span>
        </div>
        <div class="row-fluid">
            <div class="span12 thumbnails-container">
                <div id="thumb-carousel" class="flexslider p-thumb-carousel">
                    <ul class="slides
                                <?php for ($i = 0;
                    $i < $count_img;
                    $i++): ?>">
                        <li class="image-thumbnails">
                            <a href="<?php echo $arr_img[$i]; ?>" class="cloud-zoom-gallery <?php if ($i == 0) {
                                echo 'active ';
                            }; ?>" title="" rel="useZoom: 'zoom1', smallImage: '<?php echo $arr_img[$i]; ?>'">
                                <img class="thumbnail-image" src="<?php echo $arr_img[$i]; ?>"
                                     alt="<?php echo $product['Product']['name']; ?>"/>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </figure>
</div>
<div class="span7">
<div class="row-fluid top-content-area">
    <div class="span7">
        <div class="brief-info">
            <div class="titile-ratings-container">
                <header>
                    <h1 itemprop="name"><?php echo $product['Product']['name']; ?></h1>
                </header>
                <div class="vote small">
                     <div class="basic" data-average="<?php echo $product['Product']['avg_mark'] ?>" data-id="<?php echo $product['Product']['id']; ?>"></div>
                                        <div id="box-message"></div>
                </div>
					<span class="social-button-container">
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
						<a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript"
							src="//s7.addthis.com/js/300/addthis_widget.js"></script>
					<!-- AddThis Button END -->
					</span>

                <div class="clear">
                </div>
            </div>
            <div class="price-container" id="productPrice104" >
              
                <div class="price-class-move"> </div>
                    <?php if ($product['Product']['discount_status'] == 1): ?>
						<span class="price-before-discount-class-restore">
							<span class="PricebasePriceWithTax"><?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($product['Product']['price'], $to_currency)); ?></span>
						</span>
						<span class="final-price-class-restore final-price">
							<span class="PricesalesPrice"><?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($product['Product']['price'], $to_currency, $product['Product']['discount'])); ?></span>
						</span>
						<div class="product-discount-class-restore">
							<div class="product-discount">
							 (Discount: <?php echo $product['Product']['discount']; ?>.00%)						
							</div>
						</div>
                       
                    <?php else: ?>
					<span class="final-price-class-restore final-price">
						<span class="PricesalesPrice"><?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($product['Product']['price'], $to_currency)); ?></span>
					</span>
                      
                    <?php endif; ?>
               
                <span class="final-price-class-restore final-price"></span>
                <meta itemprop="availability" content="Out of Stock"/>
            </div>
			<span class="stock-status availability">
				<?php if($product['Product']['publish'] == 0 ) {?>
					<span class="text-error">product out of stock</span>
				<?php }else{?>
					<span class="text-success">In stock - Ship within 24 hours</span>	
				<?php }?>
			</span>
			<br />
			<span class="sku">SKU: <?php echo $product['Product']['sku'];?></span>
            <div class="product-short-description">
                <?php echo $product['Product']['description']; ?>
            </div>
        </div>
        <div class="addtocart-area">
            <form class="product" id="addCartForm">
                <div class="product-fields">
                    <div class="product-field product-field-type-S">
                        <div class="product-fields-title-group">
                            <span class="product-fields-title title-tip" rel="tooltip" title="Please choose Color">Color:</span>
                        </div>
                        <div class="product-field-display">

                            <?php foreach ($arr[10] as $ky => $va): ?>
                                <input id="color" checked="checked" type="radio" value="<?php echo $ky; ?>"
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
                            <span class="product-fields-title title-tip" rel="tooltip"
                                  title="Please choose Shipping Method">Shipping Cost:</span>
                        </div>
                        <div class="product-field-display">
                            <?php
                            $small_packet = $this->Tool->get_amount_shipping($product['Product']['weight'], 1, $continent);
                            $parcel = $this->Tool->get_amount_shipping($product['Product']['weight'], 2, $destination);
                            // echo $parcel;exit;
                            $convert_smallpacket_to_usd = $small_packet / $currency_vn['Country']['rate'];
                            $convert_parcel_to_usd = $parcel / $currency_vn['Country']['rate'];
                            // echo $currency_vn['Country']['rate'];exit;
                            ?>
                            <input id="ship_type" checked="checked" type="radio" value="1" name="pship_type"/><label
                                for="34" class="other-customfield">
                                <p>
                                    Small Packet
                                </p>
                                +<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($convert_smallpacket_to_usd, $to_currency)); ?>
                            </label>
                            <input id="ship_type" type="radio" value="2" name="pship_type"/><label for="34"
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
                    <div id="qaunity-selector">
						<span class="quantity-controls js-recalculate">
						<input type="button" class="quantity-controls quantity-plus"/>
						</span>
						<span class="quantity-box">
						<input type="text" class="quantity-input js-recalculate" id="pquantity"
							   name="pquantity" value="1" readonly="readonly"/>
						</span>
						<span class="quantity-controls js-recalculate">
						<input type="button" class="quantity-controls quantity-minus"/>
						</span>
                    </div>
					
						<span class="addtocart-button btn btn-large btn-primary">
						<?php if($product['Product']['publish'] == 1):?>
							<a href="javascript:void(0);" class="addtocart-button submit" title="Add to Cart">Add to Cart</a>
						<?php else:?>
							<a href="/contacts" class="notify btn btn-info">Notify Me</a>
							<div class="clear"></div>
						<?php endif;?>
						</span>
                    <div class="clear">
                    </div>
                </div>
                <input type="hidden" id="pname" value="<?php echo $product['Product']['name']; ?>"/>
                <input type="hidden" id="continent" name="pcontinent" value="<?php echo $continent; ?>"/>
                <input type="hidden" id="destination" name="pdestination" value="<?php echo $destination; ?>"/>
                <input type="hidden" name="pid" value="<?php echo $product['Product']['id']; ?>"/>
                <input type="hidden" name="virtuemart_product_id[]" value="<?php echo $product['Product']['id']; ?>"/>
            </form>
            <div class="clear">
            </div>
        </div>
        <div id="ordels_tatus"></div>
		<div class="ask-a-question" id="ask_question">
		 <a class="ask-a-question" href="javascript:void(0)"><div class="icon-ask"></div>Ask a question about this product</a>
		</div>
		<a href="/category/<?php echo $product['Category']['slug']; ?>.html" style="color: #7B7A7A;"><i class="icon-back"></i>Back to:<?php echo $product['Category']['name']; ?></a>
		<br />
		<a href="/products/addtowishlist/<?php echo $product['Product']['id']; ?>.html" style="color: #7B7A7A;"><i class="icon-wishlist"></i>Add Wishlist</a>
    </div>
	<!-- related product-->
	<?php if($product['Product']['related'] != null):?>
	<div class="span5">
		<div id="related-products">
			<div class="product-related-products product-side-bar">
				<div class="inner-cont">
					<h3 class="related-item-title">Related Products</h3>
					<div class="related-products">
						<div class="r-products-viewport" style="overflow: hidden; position: relative;">
						<?php 
							$json_related = $product['Product']['related'];
							$related = json_decode($json_related, true);
							//pr($related);exit;
						?>
						<?php foreach($related as $rel):?>
							<div class="product-field product-field-type-R">
								<span class="product-field-display">
								<?php
								$image = $this->Html->image($this->Tool->get_thumbs($rel['Product']['thumbnail']), array('alt' => $rel['Product']['name'], 'width' => '65','height' => '84', 'border' => '0'));
								$title = $this->Tool->substr($rel['Product']['name'],0,30);
                                echo $this->Html->link(
                                    $image . '<br><span class="product-name">'. $title .'</span>',
                                    array(
                                        'controller' => 'products',
                                        'action' => 'view_product',
                                        'category' => $rel['Category']['slug'],
                                        'product' => $rel['Product']['slug'],
                                        'id' => $rel['Product']['id'],
                                        'ext' => 'html'
                                    ),
                                    array(
                                        'escape' => false
                                    )
                                );
                                ?>
								</span>
								<span class="product-field-desc"> </span>
								<span class="product-price">
								<?php if ($rel['Product']['discount_status'] == 1): ?>
									<span class="PricesalesPrice">
									<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($rel['Product']['price'], $to_currency, $rel['Product']['discount'])); ?>
									</span>
								<?php else:?>
									<span class="PricesalesPrice">
										<?php echo $currency['prefix'] . $this->Tool->number_format($this->Tool->price($rel['Product']['price'], $to_currency)); ?>
									</span>	
								<?php endif;?>
								</span>

								<div class="clear"></div>
							</div>
						<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
	<!-- end related product-->
</div>

<div id="ask_popup">
	<div id="overlay_popup"></div>
	<div id="modal-overall">
    <div id="main_site_popup">
		<a href="javascript:void(0)" class="close quick-close"><span aria-hidden="true" data-icon="x">x</span></a>
        <div id="system-message-container">
		
        </div>

        <div id="ask-question" class="ask-a-question-view">
            <div class="modal-header">
                <h1 class="ask-page-title">Ask a question</h1>
            </div>
            <div class="modal-body">
                <div class="ask-product-name">
                    <h2><?php echo $product['Product']['name']; ?></h2>
                </div>
                <div class="form-field">
					<?php echo $this->Form->create('Contact',array('action'=>'add_ask','class'=>'form-validate form-horizontal','id'=>'askform','inputDefaults'=>array('div'=>false,'label'=>false)));?>
						<?php 
							if(isset($user_info)){
								$full_name = $user_info['firstname'] . ' ' . $user_info['lastname'];
								$email = $user_info['email'];
								$user_id = $user_info['id'];
								$task = "ask";
							}
							else
							{
								$full_name = "";
								$email = "";
								$user_id = "";
								$task = "send";
							}
						?>
						<?php echo $this->Form->input('task',array('type'=>'hidden','value'=>$task));?>
						<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$user_id));?>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
							<?php echo $this->Form->input('full_name',array('id'=>'name','size'=>'30','placeholder'=>'Name','class'=>'validate[required,minSize[4],maxSize[64]]','value'=>$full_name));?>
                        </div>
                        <br>

                        <div class="input-prepend ask-email-box">
                            <span class="add-on"><i class="icon-envelope"></i></span>
							<?php echo $this->Form->input('email',array('id'=>'email','size'=>'30','placeholder'=>'E-Mail','class'=>'validate[required,custom[email]]','value' =>$email));?>
                        </div> 
				
							<?php echo $this->Form->input('subject',array('id'=>'subject','placeholder'=>'Subject','type' => 'hidden',"value" => "I have a question about {$product['Product']['name']}"));?>
                       
                        <label class="comment-box">
                            <div class="ask-text">
                                Please write your question....(min. 50, max. 2000 characters)
                            </div>
                           
						  <?php echo $this->Form->textarea('content', array('class' => 'validate[required,minSize[50],maxSize[2000]] field', 'title' => 'Submit Review', 'id' => 'comment', 'rows' => '5', 'cols' => '60', 'div' => false, 'label' => false)); ?>
                        </label>

                        <div class="form-inline align-left">
                            <div class="control-group align-left">
                                <label class="control-label align-left" for="counter">Characters written: </label>

                                <div class="controls">
                                    <input class="input-small" type="text" value="0" size="4" id="counter"
                                           name="counter" maxlength="4" readonly="readonly">
                                </div>
                            </div>
                        </div>
					<div class="ask_submit">
						<input class="highlight-button btn btn-primary" type="submit" name="submit_ask" title="Send your question"
							   value="Send your question">
					</div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>

        </div>

    </div>
</div>
</div>




<script type="text/javascript">
	
    $('#addCartForm').ready(function () {
        $('.submit').click(function () {

            var arr_data = $('form#addCartForm').serialize();
			var exp = explode('_method=POST&',arr_data);
			var data  = exp[1];
			console.log(data);
            var quantity = $('#pquantity').val();
            $("#ordels_tatus").html('<img src="/theme/Volga/img/loader.gif" align="absmiddle">&nbsp;Checking...');
            $.ajax({
                url: '/products/add_to_cart',
                type: 'POST',
                data: $('form#addCartForm').serialize(),
                //dataType: json,
                success: function (msg_data) {
                    var obj = jQuery.parseJSON(msg_data);
                    if (obj.message === "ok") {
                        var str = '<div class="con">';
                        str += '<p class="title">';
                        str += '<i class="icon_success_27x27"></i> ' + quantity + ' item added to cart';
                        str += '</p>';
                        str += '<p class="subtitle">';
                        str += '<b>' + obj.c_qty + '</b> total items in your Cart';
                        str += '</p>';
                        str += '</div>';
                        $("#ordels_tatus").html(str);
                        $("#total-cart-mini").html('<strong>' + obj.amount + '</strong>');
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
            console.log(arr_data);
        });
    });

	$(document).ready(function()
	{
		$('#ask_question').on('click', function() 
		{
			$('#modal-overall').show();
			$('#ask_popup').show(200);
		});
		
		$('.quick-close, #overlay_popup').click(function ()
		{
			$('#ask_popup').hide(200);
		});
	});
	
</script>

</div>
</div>
<div class="row-fuid">
    <div class="span12 tabular-content-area">
        <ul class="nav nav-tabs" id="MegamartTab">
            <li class="active"><a href="#p_description" data-toggle="tab">Description</a></li>
            <li><a href="#custom-field-1" data-toggle="tab">Specification</a></li>
			<?php if(($product['Product']['pro_combo'] == 1) || ($product['Product']['cat_combo'] == 1)):?>
				<?php pr($combo);?>
				<li><a href="#cust-combo" data-toggle="tab" id="combo-tab">Buy <?php echo $combo['Combo']['quantity'];?>+ and save</a></li>
			<?php endif;?>
            <li><a href="#cust-reviews" data-toggle="tab" id="reviews-tab">Reviews</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="p_description">
                <?php echo $product['Product']['content']; ?>
            </div>
            <div class="tab-pane fade in" id="custom-field-1">
				<div class="content-attribute">
                    <table class="table table-bordered">
                        <?php foreach($attribute as $key => $val):?>
                            <tr>
                                <td class="attributes"><?php echo $val['Attribute']['name'];?></td>
                                <td class="value">
                                    <?php foreach($product['Value'] as $k => $v){
                                        if($val['Attribute']['id'] == $v['attribute_id']){
                                            echo $v['name'] . ', ';
                                        }
                                    }
                                    ?>
                                </td>

                            </tr>

                        <?php endforeach;?>
                    </table>
                </div>
            </div>
			<!-- combo-->
			<?php if(($product['Product']['pro_combo'] == 1) || ($product['Product']['cat_combo'] == 1)):?>
				<div class="tab-pane fade in" id="cust-combo">
					<div class="content-attribute">
						<p class="introduce">
							<span>To enable volume discounts on this site, use coupon code: BULKRATE during checkout.</span>
						You will see a discount applied at the bottom of the shopping cart. Competitive
						pricing is available. Contact us for details.</p>
						<table class="table table-bordered">
							<?php $combovalues = $this->requestAction('/combovalues/get_value_combo');?>
                            <tbody>
                                <tr>
                                    <th>
                                        Quantity
                                    </th>
									<?php foreach($combovalues as $vl_combo):?>
										<td>
											<?php echo $vl_combo['Combovalue']['from_quantity'];?>+ units
										</td> 
									<?php endforeach;?>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Percent</span>
                                    </th>
									<?php foreach($combovalues as $vl_combo):?>
									<td>
										<span>Discount <?php echo $vl_combo['Combovalue']['percent'];?>% </span>
									</td> 
									<?php endforeach;?>
									
                                </tr>
                            </tbody>
                        </table>
					</div>
				</div>
				<?php endif;?>
				<!--end  combo-->
            <div class="tab-pane fade in" id="cust-reviews">
                <div class="list-reviews hReview">
                    <?php if (isset($comments)): ?>
                        <?php foreach ($comments as $item): ?>
                            <div class="normal">
                                <span class="date"><?php echo date('d/m/Y', $item['Comment']['created']); ?></span>
										
                                <blockquote>
                                    <p><?php echo h($item['Comment']['comment']); ?></p>
                                    <small><?php echo $item['User']['firstname'] . ' ' . $item['User']['lastname']; ?></small>
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="write-edit-review row-fluid">
                    <div class="span12">
                        <div class="customer-reviews">
                            <?php if (isset($user_info)): ?>
                                <?php echo $this->Session->flash('comment'); ?>
                                <?php echo $this->Form->create('Comment', array('action' => 'add', 'id' => 'reviewform', 'name' => 'reviewForm')); ?>

                                <div class="write-reviews">
                                    <h4>Submit Review</h4>
                                   <!-- <span class="step">First: Rate the product. Please select a rating between 0 (poorest) and 5 stars (best).</span>

                                    <div class="rating">
                                       
                                        <div id="pop-message"></div>
                                        <div id="change_avg"></div>
                                    </div>-->
                                    <span class="step">Now please write a (short) review....(min. 10, max. 2000 characters) </span>
                                    <br/>
                                    <?php echo $this->Form->textarea('comment', array('class' => 'span8 inputbox', 'title' => 'Submit Review', 'id' => 'mess_review', 'rows' => '5', 'cols' => '60', 'div' => false, 'label' => false)); ?>
                                    <br/>
									<span>Characters written: <input type="text" value="0" size="4"
																	 class="review-counter" name="counter"
																	 maxlength="4" readonly="readonly" id="charLeft"/>
									</span>
                                    <br/><br/>
                                    <input class="btn btn-primary" type="submit" onclick="return( check_reviewform());"
                                           name="submit_review" title="Submit Review" value="Submit Review"/>
                                </div>
                                <?php echo $this->Form->input('product_id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
                                <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user_info['id'])); ?>
                                <?php echo $this->Form->end(); ?>
                            <?php else: ?>
                                <p>Please login now!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</article>
<div class="product-top-nav">
    <span class="previous-product" title="previous"><a
            href="/en/shop/phone2015-05-17-14-20-59_/smart-phone/iphone-5-detail" class="previous-page"><i
                class="icon-arrow-left"></i></a></span><span class="next-product" title="next"><a
            href="/en/shop/phone2015-05-17-14-20-59_/smart-phone/iphone-5-103-104-detail" class="next-page"><i
                class="icon-arrow-right"></i></a></span>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
    .con {
        position: relative;
        padding: 0 30px 0 70px;
    }

    .con .warning {
        margin: -8px 0 15px -40px;
        padding: 5px 0 5px 10px;
        border: 1px solid #e7d076;
        border-radius: 3px 3px 3px 3px;
        background-color: #fffae9;
        color: #f60;
    }

    .con .title {
        color: #079b00;
        font-size: 18px;
        line-height: 27px;
        font-weight: bold;
    }

    .con .opers {
        margin: 20px 0 0;
    }

    .con .icon_success_27x27 {
        position: absolute;
        left: 30px;
    }

    .con .icon_success_27x27 {
        background: url(/theme/Volga/img/ok.png) 0 50% no-repeat;
        display: inline-block;
        min-height: 27px;
        line-height: 27px;
        padding: 0 0 0 35px;
    }

    .con .subtitle {
        font-size: 12px;
        margin: 5px 0;
    }
</style>
<script type="text/javascript">
	jQuery(function($){
		$(".basic").jRating();
	});
   /*  jquery(document).ready(function () {
        // simple jRating call
        $(".basic").jRating();
    }); */
	$('#mess_review').keyup(function() {
                var len = this.value.length;
                if (len >= 2000) {
                    this.value = this.value.substring(0, 2000);
                }
                $('#charLeft').val(2000 - len);
            });
	$('#comment').keyup(function() {
                var len = this.value.length;
                if (len >= 2000) {
                    this.value = this.value.substring(0, 2000);
                }
                $('#counter').val(2000 - len);
            });
</script>