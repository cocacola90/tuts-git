

<header>
    <div id="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div id="shipping_currency">
                        <a href="#" id="shipping">Free shipping to VN</a>

                        <div id="current_country">
							<?php 
								$sess_currency = $this->Session->read('Currency');
							?>
                            <span id="flag">
                                <?php echo $this->Html->image($sess_currency['flag'],array('width'=>'16','height'=>'11'));?>
                            </span>
                            <?php echo $sess_currency['code'];?>
                        </div>

                        <div class="clearfix"></div>
						
                        <ul id="other_countries">
							<?php 
								$show_country = $this->requestAction('/countries/show_currency');
								if(isset($show_country)):
								foreach($show_country as $item):
							?>
							<li><a href="#" class="country flag-us" data-currency="<?php echo $item['Country']['currency'];?>"><?php echo $item['Country']['currency'];?></a></li>
							<?php 
								endforeach;
								endif;
							?>
                        </ul>
						
                    </div>
                </div>
                <!--End shipping_currency-->

                <div class="col-lg-8 col-md-7 col-sm-6">
                    <ul id="menu">
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="/tracking">Order tracking</a></li>
                        <li><a href="/users/profile">My Account</a></li>
						<?php if(isset($user_info)):?>
						
						<li><a href="/logout">[&nbsp;Logout&nbsp; ]</a></li>
						<li>
							<a class="e" href="/users/profile" title="Hi,&nbsp;<?php echo $user_info['username'];?>" target="_blank">Hi,&nbsp;<?php echo $user_info['username'];?></a>
						</li>
						<?php else:?>
                        <li><a href="#" data-toggle="modal" data-target="#formLogin">Login </a> </li>
						<li><a href="#" data-toggle="modal" data-target="#formRegister">Register</a></li>
						<?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End #top-nav-->
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-3">
                    <div id="logo">
                        <h1><a href="/">Logo</a></h1>
                    </div>
                </div>

                <div class="col-lg-7 col-md-8 col-sm-9">
                    <div id="right_header">
                        <div id="search">
                            <form action="" method="POST" onsubmit="doSearch(); return false;">
                                <input type="text" id="txtsearch" placeholder="Bạn đang tìm kiếm sản phẩm..." />
                                <input type="button" id="btnsearch" value="Search" onclick="doSearch(); return false;" />
                            </form>

                            <script type="text/javascript">
                                function doSearch() {
                                    var keyword = document.getElementById('txtsearch');

                                    var sURL = '';

                                    if (keyword.value.length < 2) {
                                        alert('Từ khóa phải nhiều hơn 1 ký tự.', 'Thông báo');
                                        return;
                                    }
                                    else if (keyword.value != 'Từ khóa tìm kiếm...') sURL += ((sURL == '') ? '' : '&') + 'keyword=' + keyword.value;
                                    //if (cate.value > 0) sURL += ((sURL == '') ? '' : '&') + 'cate=' + cate.value;

                                    window.location.href = '/tim-kiem/p?' + sURL;
                                }
                            </script>
                        </div>
                        <?php $check_cart = $this->Session->check('Cart');?>
                        <?php if($check_cart):?>
                        <?php
                            if(isset($currency)){
                                $to_currency = $currency['code'];
                            }else
                            {
                                $to_currency = "";
                            }
                            $cart = $this->Session->read('Cart');
                        ?>
						<div id="cartdiv">
							<a href="/cart-details">
							<div id="cart">
								cart
								<span id="quantity"><?php echo $this->Session->read('quantity'); ?></span>
							</div>
							</a>

							<div id="cart_detail" >
								
							</div>
						</div>

                        <?php else:?>
                        <div id="cart">
                            <a href="#">cart<div id="quantity_status"></div></a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <!--End search and cart-->
            </div>
			<?php echo $this->Session->flash(); ?>
        </div>
    </div>
</header>
<?php echo $this->element('login'); ?>
<?php echo $this->element('register'); ?>
<script type="text/javascript"> 
    /* function openMiniCart()
    {
        $(".cart_detail").slideToggle();
    } */
	var $items = $('#other_countries li a' );
	$items.click(function () {
		$items.removeClass('currency');
		$(this).addClass('currency');
		var finance = $('.currency').attr('data-currency');
		$.ajax({
			url: "/products/get_finance",
			data: "finance=" + finance,
			type: "POST",
			success: function(smg) {
				console.log(smg);
				if(smg == "OK"){

                    location.reload();
				}
			},
			error: function( ) {
				alert( "Sorry, there was a problem!" );	
			}
			
		}); 
	});
	
    $(document).ready(function() {
        $("#cartdiv").on("mouseenter", function() {
                $("#cart_detail").css('display','block');
                $("#cart_detail").html('<img src="img/loading.gif" height=150; width=150; >');
                $.ajax({
                    type:'post',
                    url: '/products/cart_detail_ajax',
                    success:function(data)
                    {
						console.log(data);
                        $("#cart_detail").html(data);
                    },
                    
                    error:function()
                    {
                        alert('loi');
                    }
                }); 

                $.ajax({
                    type:'post',
                    url: '/products/cart_quantity',
                    success:function(data)
                    {
                        $("#quantity").html(data);
                    },
                    
                    error:function()
                    {
                        alert('loi');
                    }
                }); 

        });

        $("#cartdiv").on("mouseleave", function() {
            $("#cart_detail").css('display','none');
        });
       
    });

</script>
