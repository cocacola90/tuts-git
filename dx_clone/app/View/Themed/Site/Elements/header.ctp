		<header>
			<div id="top_head">
				<div id="currency">
					<select name="" id="finance">
						<option value="">- Currency -</option> 
						<option value="VND">VND</option>
						<option value="USD">DOLAR</option>
                        <option value="GBP">GBP</option>
					</select>
				</div>
				<div id="language"><?php echo $this->Html->image('flag.png'); ?></div>
				<p id="welcome">Chào mừng bạn đến với MuaA.</p>
			</div>
			<!--End #top-head -->

			<div id="middle-head">
				<div id="logo"><?php echo $this->Html->image('logo.png'); ?></div>

				<div id="navigation">
					<div id="top-nav">
						<ul>
							
							<li><a href="#">Yêu thích</a></li>
							<li><a href="#">Thanh toán</a></li>
							<?php if(isset($user)): ?>
							<li><a href="#">Chào bạn: <?php echo $user['username']; ?></a></li>
							<li><a href="/logout">Thoát</a></li>
							<?php else: ?>
							<li><a href="/register">Đăng ký</a></li>
							<li><a href="/login">Đăng nhập</a></li>
							<?php endif; ?>							
						</ul>
					</div>
					<div class="clean"></div>
                    <div class="cart-info">
                        <?php $check_cart = $this->Session->check('Cart');?>
                        <?php $total = 0;?>
                        <?php if($check_cart):?>

                        <?php
                        if(isset($currency)){
                            $to_currency = $currency['code'];
                        }else
                        {
                            $to_currency = "";
                        }
						$cart = $this->Session->read('Cart');
                        $total = 0;
                        foreach ($cart as $key => $value)
                        {
                            foreach($value as $k)
                            {
                                $total += $this->Tool->get_price($k['quantity'],$k['discount']) * $k['price'];
                            }
                        }
                        ?>

                        <?php $countItem = count($cart);?>
                        <p> <?php echo $countItem ;?> sản phẩm &nbsp; &nbsp; &nbsp;
                            <?php if($total>0){ echo $this->Tool->price($total,$to_currency);}?>
                        </p>
                        <?php else:?>
                        <p>0 sản phẩm &nbsp; &nbsp; &nbsp; 0 VNĐ</p>
                        <?php endif;?>
                    </div>
				</div>
			</div>

			<!-- End #middle-head-->

			<div id="bottom-head">
				
	            <ul id="nav">
	               <li><a class="drop" href="#">Danh mục sản phẩm &darr;</a>
	                    <ul>
							<?php
								$categories = $this->requestAction('/categories/load_all_categories');
								foreach($categories as $c):
							?>
								<li>
									<?php 
										echo $this->Html->link(
											$c['Category']['name'],
											array(
												'controller' => 'categories',
												'action' => 'index',
												'category' => $c['Category']['slug'],
												'ext' => 'html'
											)
										);
									?>
								</li>
								
							<?php endforeach; ?>
	                    </ul>
	               </li>
	            </ul>

		        <div id="search">
		        	<form action="" method="POST" onsubmit="doSearch(); return false;">
		        		<input type="text" id="txtsearch" placeholder="Bạn đang tìm kiếm sản phẩm..." />
		        		<input type="submit" id="btnsubmit" onclick="doSearch(); return false;" />
		        	</form>
		        </div>
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
		        <ul id="nav" style="float: right">
	               <li><a class="drop" href="#">Danh sách siêu thị &darr;</a>
	                    <ul>
	                       <?php
								$markets = $this->requestAction('/markets/load_all_markets');
								foreach($markets as $c):
							?>
								<li>
									<?php 
										echo $this->Html->link(
											$c['Market']['name'],
											array(
												'controller' => 'markets',
												'action' => 'index',
												'category' => $c['Market']['slug'],
												'ext' => 'html'
											)
										);
									?>
								</li>
								
							<?php endforeach; ?>
	                    </ul>
	               </li>
	            </ul>
			</div>
		</header>
		
<script type="text/javascript"> 

	$('#finance').change(function(){
		var finance = $('#finance').val();

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

</script>