<?php
	$values = $product['Value'];

	foreach ($values as $value)
	{
		$arr[$value['attribute_id']][$value['id']] = $value['name'];
	}
	//pr($arr);
    if(isset($currency)){
        $to_currency = $currency['code'];
    }else
    {
        $to_currency = "";
    }

?>

<div class="row">
        <div id="bread_crumb">
            <ul>
                <li><?php echo $this->Html->link('Home', DOMAIN_ROOT,
				array('escape' => false)); ?></li>
                <li>&gt;&gt;</li>
                <li>
					<a href="/danh-muc/<?php echo $product['Category']['slug'];?>.html"><?php echo $product['Category']['name'];?></a>
				</li>
                <li>&gt;&gt;</li>
                <li><a href="" class="current_page"><?php echo $product['Product']['name'];?></a></li>
            </ul>
        </div>
</div>
<div class="row">
	    <div class="col-lg-4 col-md-4">
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
                   <?php echo $this->
					Html->image('next-deltail.png',array('title'=>'Next','alt'=>'Next','class'=>'next-deltail'));?>
					<?php echo $this->
					Html->image('prev-deltail.png',array('title'=>'Next','alt'=>'Next','class'=>'prev-deltail'));?>

                </div>
            <!--if(isset($image_more) && (count($image_more) > 3))-->
            </section>
        </div>
        <!-- End img product-->
		<div class="col-md-8 col-lg-8">
            <div id="detail_product">
                <h2><?php echo $product['Product']['name'];?></h2>
                <div id="group_shipping">
                    <div id="box_shipping_price">
						<?php if($product['Product']['discount_status'] == 1 ): ?>
						<strike><span>List Price:</span> <?php echo $currency['prefix'];?> <?php echo $this->
							Tool->number_format($this->Tool->price($product['Product']['price'],$to_currency));?>
						</strike>
						<span>Price:</span>
                        <span id="current_currency"><?php echo $currency['prefix'];?> <?php echo  $this->
							Tool->number_format($this->Tool->price($product['Product']['price'],$to_currency,$product['Product']['discount']));?></span>

						<?php else:?>
						<span>Price:</span>
                        <span id="current_currency"><?php echo $currency['prefix'];?><?php echo $this->
							Tool->number_format($this->Tool->price($product['Product']['price'],$to_currency));?></span>
						
						<?php endif; ?>
                    </div>

                    <p class="shipping_type">Shipping to <?php echo $country_info['Country']['country']?> with small-packet service : <div id="ship_small_new-<?php echo  $product['Product']['id'];?>"></div>
					</p>
					
                    <p class="shipping_type">Shipping to <?php echo $country_info['Country']['country']?> with Parcel service : <div id="ship_parcel_new-<?php echo  $product['Product']['id'];?>"></div>
					</p>
					
					<script type="text/javascript">
						cost(<?php echo  $product['Product']['weight'];?>, <?php echo  $product['Product']['id'];?>);
					</script>
                   
				   
                </div>

                <div id="box_cart">
					<div class="wrap-input">
                        <label for="">Color:</label>
                        <div class="product_value">
						
							<?php foreach($arr[10] as $ky => $va):?>
                            <p class="color_product" data-id="<?php echo $ky;?>"><?php echo $va;?></p>
							<?php endforeach;?>
                           
                        </div>
                    </div>

                    <div class="wrap-input">
                        <label for="">Quantity:</label>
                        <div class="product_value">
                            <input type="text" id="quantity_item"/>
							<input type="hidden" id="product_id" value="<?php echo $product['Product']['id'];?>" />
                        </div>
                    </div>
					
                    <div id="add_to_cart">Add to cart</div>
					<div id="s"></div>
					<div id="ordels_tatus"></div>
					<?php echo $this->Html->link('add to wishlist','/products/addtowishlist/'.$product['Product']['id']); ?>
					<a href="/products/create_review/<?php echo $product['Product']['id']; ?>"> Create Review</a>
                </div>
            </div>
        </div>
		<script type="text/javascript"> 
		$("#box_cart").ready(function(){
				var $items = $('.color_product');
				$items.click(function () {
					$items.removeClass('product_selected');
					$(this).addClass('product_selected');
					
				});
			$("#add_to_cart").click(function(){
				var product_id = $('#product_id').val();
				var color = $('.product_selected').attr('data-id');
				var quantity = $('#quantity_item').val();
				var regex = /^[\-\+]?\d+$/;
				
				
				if(color === "" || color == undefined)
				{
					alert('Color is required !');
					return;
				}
				
			
				if(quantity === "")
				{
					alert('Quantity is required !');
					return;
				}else
				{
					if(!regex.test(quantity))
					{
						alert("Quantity not a valid integer");
						quantity.focus();
						return(false);
					}
				}
				if((color !="") && (quantity !=""))
				{
					$("#ordels_tatus").html('<img src="/theme/Dx/img/loader.gif" align="absmiddle">&nbsp;Checking...');
					$.ajax({
						url: '/products/add_to_cart',
						type: 'POST',
						data: {color: color , qty: quantity , id: product_id},
						//dataType: json,
						success: function(msg_data){
							
							if(msg_data != "")
							{
								var str = '<div class="con">';
										str +=	'<p class="title">';
											str += '<i class="icon_success_27x27"></i> ' + quantity + ' item added to cart';
										str += '</p>';
										str += '<p class="subtitle">';
											str += '<b>' + msg_data + '</b> total items in your Cart';
										str += '</p>';
									str += '</div>';
								$("#ordels_tatus").html(str);
							}
							$("#quantity_status").html('<span id="quantity">' + msg_data + '</span>');
							//$("#cart_detail").html(msg_data);
						}

					});
				}
				
			});
		});
		
		</script>
		
	<div class="row">
        <div class="col-md-12" id="box_info">
            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" style="margin-left: 20px;" class="active"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                    <li role="presentation"><a href="#specifications" aria-controls="profile" role="tab" data-toggle="tab">Specifications</a></li>
                    <li role="presentation"><a href="#reviews" aria-controls="messages" role="tab" data-toggle="tab">Reviews</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="fade tab-pane active" id="overview">
                        <div class="content-attribute">
                            <?php echo $product['Product']['description'];?>
                        </div>
                    </div>
                    <div role="tabpanel" class="fade tab-pane" id="specifications">
                        <div class="content-attribute">
                            <?php echo $product['Product']['content'];?>
							
							
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
                    <div role="tabpanel" class="fade tab-pane" id="reviews">
                        <div class="content-attribute">
                            <div class="row">
							<?php if(isset($comments)):?>
								<?php foreach($comments as $item):?>
                                <div class="col-md-6">
                                    <div class="box-comment">
                                        <div class="info-comment">
                                            <img src="../img/star.png" alt="" class="info-rate"/>
                                            <span class="user-comment"><?php echo $item['Comment']['name'];?></span>
                                            <span class="created-comment">Post on: <span><?php echo date('d/m/Y', $item['Comment']['created']);?></span></span>
                                        </div>

                                        <p class="content-comment">
										<?php echo $item['Comment']['comment'];?>
                                    </div>
								</div>
								<?php endforeach;?>
							<?php endif;?>	

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
	


<script type="text/javascript">
    $(document).ready(function(){
        // simple jRating call
        $(".basic").jRating();
    });
	
</script>
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
	  background: url(/theme/Dx/img/ok.png) 0 50% no-repeat;
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