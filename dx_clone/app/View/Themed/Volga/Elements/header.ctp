<header id="header">
    <div class="container top-header">
        <div class="inner-wrap">
            <div class="row-fluid">
                <div class="span4 logo">
                    <div class="custom">
                        <p>
                            <a href="/"><img src="/theme/Volga/images/logo.png" border="0" alt="Logo"/></a>
                        </p>
                    </div>
                </div>
                <div class="span8 right">
                    <div class="row-fluid">
                        <div class="search-container span5">
                            <div class="welcome-text">
                                <div class="custom">
                                    <p>
                                        Fast Worldwide Shipping
                                    </p>
                                </div>
                            </div>
                            <form class="search-form" method="POST" onsubmit="doSearch(); return false;">
                                <div class="search search-bar ">
                                    <input name="searchword" id="txtsearch" maxlength="20"
                                           class="inputbox search-bar search-bar-inputbox " type="search" size="20"
                                           value="Search..." onblur="if (this.value=='') this.value='Search...';"
                                           onfocus="if (this.value=='Search...') this.value='';"/>
                                    <input type="image" value="Search" class="search-bar-btn " src="/theme/Volga/templates/vp_supermart/images/search-icon.png" onclick="doSearch(); return false;"/>

                                </div>
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

                                    window.location.href = '/serach/p?' + sURL;
                                }
                            </script>
                        </div>
                        <div class="logo-right span7 pull-right">
                            <div class="mini-cart hidden-phone">
                                <div class="vm-mini-cart">
                                    <?php $cart = $this->Session->read('Cart');?>
                                    <div class="vmCartModule vm-mini-cart-module" id="vmCartModule">
                                        <div class="hidden-cart-content">
                                            <div class="custom">
                                                <p>
                                                    <a href="/cart-details">
                                                        <img src="/theme/Volga/images/banners/mini-cart-promo.jpg" alt="mini-cart-promo"/>
                                                    </a>
                                                </p>
                                            </div>
                                            <div id="hiddencontainer">
                                                <div class="container">
                                                    <div class="added-product">
                                                        <div class="prices">
                                                        </div>
                                                        <div class="product_row">
                                                            <span class="quantity"></span>&nbsp;x&nbsp;<span
                                                                class="product_name"></span>
                                                        </div>
                                                        <div class="product_attributes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vm_cart_products" id="cart-mini">

                                                <?php
                                                    if(isset($currency)){
                                                        $to_currency = $currency['code'];
                                                    }else
                                                    {
                                                        $to_currency = "";
                                                    }
                                                    $total = 0;
                                                    if($cart):
													$c_qty = 0;
                                                    foreach($cart as $item):
                                                        foreach($item as $key => $value):
														$c_qty ++;
                                                        $data=$this->requestAction(array('controller'=>'products','action'=>'get_info',$value['slug']));
                                                ?>
                                                    <div class="container first-child">
                                                        <div class="added-product last-child">
                                                            <div class="prices">
                                                                <?php
                                                                $pro_price = 0;
                                                                if($data['Product']['discount_status'] == 1)
                                                                {
                                                                    $discount_price = $this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount']);
                                                                }
                                                                else
                                                                {
                                                                    $discount_price = $this->Tool->price($data['Product']['price'],$to_currency);
                                                                }
                                                                //$pro_price = $discount_price + $this->Tool->price($detail['ship_cost'],$to_currency,0);
                                                                $pro_price = $discount_price ;
                                                                echo $currency['prefix'] . ($this->Tool->number_format($pro_price * $value['quantity'])) ;
                                                                ?>

                                                            </div>
                                                            <div class="product_row">
                                                                <span class="quantity"><?php echo $value['quantity'];?></span>
                                                                &nbsp;x&nbsp;
                                                                <span class="product_name">
                                                                    <?php
                                                                    echo $this->Html->link(
                                                                        $this->Tool->substr($data['Product']['name'],0,20),
                                                                        array(
                                                                            'controller' => 'products',
                                                                            'action' => 'view_product',
                                                                            'category' => $data['Category']['slug'],
                                                                            'product' => $data['Product']['slug'],
                                                                            'id' => $data['Product']['id'],
                                                                            'ext' => 'html'
                                                                        ),
                                                                        array(
                                                                            'title' => $data['Product']['name'],
                                                                        )
                                                                    );
                                                                    ?>

                                                                </span>
                                                            </div>
                                                            <div class="product_attributes">
                                                                <div class="vm-customfield-mod">
                                                                    <?php $detail = json_decode($value['detail'],true);?>
                                                                    <span class="product-field-type-S">Color <p><?php echo $detail['color'];?></p>
                                                                    </span><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                            $total += $pro_price * $value['quantity'];
                                                        endforeach;
                                                    endforeach;
                                                else:
                                                ?>
                                                <div class="container first-child last-child">
                                                    Cart empty
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="visible-cart-content">
                                            <a class="mini-cart-title" href="/cart-details" title="Cart detail">
                                                <span class="mini-cart-title">Cart Total :</span>
													<span class="total" id="total-cart-mini"> 
														<strong>
															<?php
															if($total>0){
																echo $currency['prefix'] . $this->Tool->number_format($total);
															}
															else{
																echo $currency['prefix'] . '0.00';
															}
															?>
														</strong>
														<i class="icon-cart"></i>
													</span>
													<span class="minicart_item_count">
													<span class="num" id="cart_quantity">
													<?php 
														if(isset($c_qty))
														{
															echo $c_qty;
														}
														else{
															echo 0;
														}
													?>
													</span><i class="c_r"></i></span>
                                            </a>

                                        </div>
                                        <noscript>
                                            Please wait
                                        </noscript>
                                    </div>
                                </div>
                            </div>
                            <div class="top-mods ">
                                <ul class="list ">
									
                                    <li class="item-206"><a href="/tracking">Track Order</a></li>
                                    <li class="item-207 deeper parent"><a href="javascript::void(0);">My Messages</a>
									<?php 
										$count = $this->requestAction('/answers/count_answer');
										if($count > 0):
									?>
										<span class="minicart_item_count_mss"><span class="num_mss"><?php echo $count?></span><i class="c_r_mss"></i></span>
									<?php endif;?>
									
                                        <ul class="submenu sublevel-1">
                                            <li class="item-212"><a href="/contacts/list_ask#codopm_tab-2">Compose</a>
                                            </li>
                                            <li class="item-213"><a href="/contacts/list_ask">Inbox</a></li>
                                        </ul>
                                    </li>
									
                                    <li class="item-224 deeper parent"><a href="/contacts">Contact</a>
                                        <ul class="submenu sublevel-1">
                                            <li class="item-205"><a href="/contacts">Send us a Message</a></li>
                                            <li class="item-225"><a href="/submit-testimonial">Submit Testimonial</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <div class="navigation-inner">
            <div class="container">
                <div class="row-fluid">
                    <div class="navbar span12">
                        <div class="navbar-inner">
                            <div class="hidden-desktop mobile-bar">
                                <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <a class="cart-page-link" href="/cart-details" title="Show Cart"><span class="icon-cart"></span></a>
                            </div>
                            <div class="nav-collapse collapse">
                                <div class="visible-desktop">
                                    <nav>
                                        <ul class="menu nav ">
                                            <li class="item-104"><a href="/">Home</a></li>
                                            <?php $list_menu = $this->Tool->RecursiveMainCategories($list_categories, 'desktop'); ?>
                                            <?php echo $list_menu; ?>
											<li class="item-104 pull-right"><a href="/blogs.html">Blogs</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="hidden-desktop">
                                    <div class="mobile">
                                        <ul class="menu mobile">
                                            <li class="item-104 current active"><a href="/">Home</a></li>
                                            <?php $list_menu = $this->Tool->RecursiveMainCategories($list_categories, 'mobile'); ?>
                                            <?php echo $list_menu; ?>
											 <li class="item-104"><a href="/blogs.html">Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
