<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<base href="" />
	<title><?php echo $this->fetch('title'); ?></title>
	<!---- SEO ----> 
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="canonical" href="" />

	<!-- Share preview snippet -->
	<meta itemprop="url" href="" />
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<!-- for Facebook -->    
	<meta property="og:title" content="" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="fb:admins" content="100001283187916"/>

	<!-- for Twitter -->       
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:url" content="">
	<meta name="twitter:title" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />

	<!---- End SEO ---->
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->css(array('style', 'flexslider', 'lightbox')); ?>
	<!-- End CSS -->
	<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery.flexslider', 'jcarousellite_1.0.1', 'lightbox', 'tooltip')); ?>
	<!-- End JAVASCRIPT -->

</head>

<body>
	<header>
		<figure class="logo"><a href="#" title=""><?php echo $this->Html->image('logo.png'); ?> </a></figure>
		<section class="form-search">
			<select name="parentid" id="parentid_ajax">
				<option value="0">Tất Cả</option>
				<option value="0">Điện thoại</option>
				<option value="0">Máy ảnh</option>
			</select>
			<input type="text" id="txt-search-ajax" name="keyword" placeholder="Tìm kiếm..." autocomplete="off" />
			<button type="button" class="btn-search"><button>
		</section>
		<div id="load-ajax-search"></div>
		<aside>
			<ul>
				<li><a href="#" title="">Trang chủ</a></li>
				<li><a href="#" title="">Giới thiệu</a></li>
				<li><a href="#" title="">Tin tức</a></li>
				<li><a href="lien-he.html" title="Liên hệ">Liên hệ</a></li>
			</ul>
		</aside>
		<section class="social">
			<a href="https://www.facebook.com/thegioididonga" title="https://www.facebook.com/thegioididonga" target="_blank">
				<?php echo $this->Html->image('icon-facebook.jpg'); ?>
			</a>
			<a href="https://plus.google.com" title="https://plus.google.com" target="_blank">
				<?php echo $this->Html->image('icon-google.jpg'); ?>
			</a>
			<a href="https://twitter.com/" title="https://twitter.com/" target="_blank">
				<?php echo $this->Html->image('icon-twitter.jpg'); ?>
			</a>
			<a href="http://www.amazon.com/" title="http://www.amazon.com/" target="_blank">
				<?php echo $this->Html->image('icon-amazon.jpg'); ?>
			</a>
		</section>
		<p class="cart">
			<a href="gio-hang.html" title="Giỏ hàng">
				Giỏ hàng: <strong>1</strong> sản phẩm | <strong> 1.000.000đ</strong>
				<!-- echo 'Giỏ hàng: 0 sản phẩm | 0 vnđ' -->
			</a>
		</p>
	</header><!-- end headers -->
	<nav>
		<ul class="level-1">
			<li class="level-1">
				<a class="level-1" href="http://localhost/the-gioi-cong-nghe/" title="Trang chủ">
					<?php echo $this->Html->image('icon-home.png'); ?>
				</a>
			</li>
			<li class="level-1">
				<a class="level-1 " href="dien-thoai-11.html">Điện thoại</a>
				<section class="level-2" style="width: 405px;">
					<section class="cate-product">
						<h3>Loại máy</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=24">Cao cấp</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=26">Siêu cấp</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=25">Trung cấp</a>
							</li>
						</ul>
					</section>
														
					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 230px; -webkit-column-count: 2;">
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=17">Apple</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=27">Asus</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=29">FPT</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=30">HTC</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=31">Huawei</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=32">Lenovo</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=18">LG</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=19">Nokia</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=34">Oppo</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=20">Samsung</a>
							</li>
							<li class="level-2">
								<a href="dien-thoai-11.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=33">Sony</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="may-tinh-bang-12.html">Máy tính bảng</a>
				<section class="level-2" style="width: 285px;">
					<section class="cate-product">
						<h3>Hệ điều hành</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=240">Android</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=241">IOS</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=242">Windows Phone</a>
							</li>
						</ul>
					</section>

					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=81">Acer</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=21">Apple</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=82">BlackBerry</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=83">FPT</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=85">Lenovo</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-bang-12.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=84">Samsung</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="may-tinh-xach-tay-13.html">Máy tính xách tay</a>
				<section class="level-2" style="width: 405px;">
					<section class="cate-product">
						<h3>Dòng máy</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=145">Netbook</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=146">Notebook</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=144">Ultrabook</a>
							</li>
						</ul>
					</section>
					
					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 230px; -webkit-column-count: 2;">
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=154">Acer</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=155">Apple</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=156">Asus</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=157">Dell</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=158">HP</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=159">Lenovo</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=160">Samsung</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-xach-tay-13.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=161">Sony</a>
							</li>
						</ul>
					</section>								
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="may-tinh-de-ban-14.html">Máy tính để bàn</a>
				<section class="level-2" style="width: 285px;">
					<section class="cate-product">
						<h3>Loại máy</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=194">All in one</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=193">Case</a>
							</li>
						</ul>
					</section>
					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=186">Apple</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=187">Asus</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=188">Dell</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=189">FPT</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=191">HP</a>
							</li>
							<li class="level-2">
								<a href="may-tinh-de-ban-14.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=192">Lenovo</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="may-anh-15.html">Máy ảnh</a>
				<section class="level-2">
					<section class="cate-product">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="may-anh-15.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=213">Canon</a>
							</li>
							<li class="level-2">
								<a href="may-anh-15.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=214">Sony</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="tai-nghe-16.html">Tai nghe</a>
				<section class="level-2" style="width: 285px;">
					<section class="cate-product">
						<h3>Loại máy</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=226">Cao cấp</a>
							</li>
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=227">Phổ thông</a>
							</li>
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=225">Trung cấp</a>
							</li>
						</ul>
					</section>
					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=221">Apple</a>
							</li>
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=223">Sam sung</a>
							</li>
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=224">Sony</a>
							</li>
							<li class="level-2">
								<a href="tai-nghe-16.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=222">Sony</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
							
			<li class="level-1">
				<a class="level-1 " href="usb-17.html">USB</a>
				<section class="level-2" style="width: 285px;">
					<section class="cate-product">
						<h3>Loại máy</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=238">USB 3G</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=239">USB Flash</a>
							</li>
						</ul>
					</section>
															
					<section class="makers">
						<h3>Hãng sản xuất</h3>
						<ul class="level-2" style="width: 110px; -webkit-column-count: 1;">
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=235">Apacer</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=231">Kingston</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=230">Mobiphone</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=234">PNY</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=233">Transcend</a>
							</li>
							<li class="level-2">
								<a href="usb-17.html?btn-filter=Tìm+kiếm&amp;filter%5B%5D=228">Viettel</a>
							</li>
						</ul>
					</section>
				</section>
			</li>
		</ul>
	</nav><!-- end nav -->
	
	<section id="slideshow">
		<section class="flexslider">
			<ul class="slides">
				<!--slide-- >
				<?php 
					$slides = $this->Session->read('slide');
					foreach($slides as $slide):
				?>
					<li>
						<a href="<?php echo $slide['Slide']['link']; ?>">
							<?php echo $this->Html->image($slide['Slide']['link']); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<section class="control">
			<ul id="control-flex">
				<li class="prev-flex">
					<?php echo $this->Html->image('next-slideshow.png'); ?>
				</li>
				<li class="next-flex">
					<?php echo $this->Html->image('prev-slideshow.png'); ?>
				</li>
			</ul>
		</section>
	</section><!-- end #slideshow -->

	<section id="content">
		<?php echo $this->fetch('content'); ?>
		<section id="partent">
			<section class="list-partent">
				<ul class="jacrose">
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-1.jpg'); ?>
							</a>
						</figure>
					</li>
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-2.jpg'); ?>
							</a>
						</figure>
					</li>
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-3.jpg'); ?>
							</a>
						</figure>
					</li>
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-4.jpg'); ?>
							</a>
						</figure>
					</li>
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-5.jpg'); ?>
							</a>
						</figure>
					</li>
					<li class="jacrose">
						<figure>
							<a href="http://fptshop.com.vn/" title="FPT">
								<?php echo $this->Html->image('logo-6.jpg'); ?>
							</a>
						</figure>
					</li>
					
				</ul>
			</section><!-- end #list-partent -->
			<?php echo $this->Html->image('prev-cate.png', array('class' => 'prev')); ?>
			<?php echo $this->Html->image('next-cate.png', array('class' => 'next')); ?>
		</section><!-- end #partent -->
		<script type="text/javascript">
			/* jCarouselLite */
			$("#content #partent .list-partent").jCarouselLite({
				auto: 2500,
				speed: 1000,
				visible:6,
				btnNext: "#content #partent img.next",
				btnPrev: "#content #partent img.prev"
			});
		</script>
	</section><!-- end #content -->
	<footer>
		<section id="footer">
			<section class="list-newsf">
				<section class="item-newsf">
					<h2>Thông tin công ty</h2>
					<hgroup>
						<h3><a href="#" title="">Giới thiệu công ty</a></h3>
						<h3><a href="#" title="">Góc báo chí</a></h3>
						<h3><a href="#" title="">Hệ thống cửa hàng</a></h3>
						<h3><a href="lien-he.html" title="Liên hệ">Liên hệ</a></h3>
					</hgroup>
				</section><!-- end .item-newsf -->
				<section class="item-newsf">
					<h2>Tin tức</h2>
					<hgroup>
						<h3><a href="#" title="">Tin khuyến mại</a></h3>
						<h3><a href="#" title="">Tin tuyển dụng</a></h3>
					</hgroup>
				</section><!-- end .item-newsf -->
				<section class="item-newsf">
					<h2>Hỗ trợ khách hàng</h2>
					<hgroup>
						<h3><a href="#" title="">Hướng dẫn mua hàng</a></h3>
						<h3><a href="#" title="">Hướng dẫn thanh toán</a></h3>
						<h3><a href="#" title="">Chính sách đổi sản phẩm</a></h3>
						<h3><a href="#" title="">Chính sách bảo hành</a></h3>
					</hgroup>
				</section><!-- end .item-newsf -->
			</section><!-- end .list-newsf -->
			<section class="send-email">
				<h2>Nhận bản tin khuyến mại mỗi ngày</h2>
				<p>Đăng ký email để nhận bản tin khuyến mại đặc biệt và các chương trình khuyến mại.</p>
				<form action="." method="post">
					<input type="text" name="txt-email" placeholder="Nhập email nhận bản tin..." />
					<input type="submit" name="btn-email" value="Đăng ký" />
				</form>
			</section><!-- end .send-email -->
			<address>
				Công Ty Cổ Phần Bán Lẻ Kỹ Thuật Số FPT - 261 Khánh Hội, P5, Q4, TP. Hồ Chí Minh. <br />
				GPĐKKD số 0311609355 do Sở KHĐT TP.HCM cấp ngày 08/03/2012.
			</address>
			<h3 class="copyring">Design by Trieulvph00746</h3>
		</section><!-- end #footer -->
	</footer><!-- end footer -->
	
<script type="text/javascript">
	
	
	$(window).load(function(){
		$('#txt-search-ajax').keyup(function(){
			if($(this).val()){
				$('#load-ajax-search').show();
				$('#load-ajax-search').html('<img class="img-ajax" src="img/ajax-products.gif" />');
				
				$.get('controller/frontend/product.php', { loadajax_list : $(this).val(), parentid_ajax : $('#parentid_ajax').val() }, function(data){ $('#load-ajax-search').html(data); });
			} else{
				$('#load-ajax-search').hide();
			}
		});
	});
	
	$(document).ready(function(){
		/* Menu */
		$('nav li.level-1').each(function(){
			var child_li = $(this).find('.makers ul.level-2 li.level-2').length;
			if(child_li > 6){
				if(child_li < 13){
					$(this).find('.makers ul.level-2').css({
						'width' : '230px',
						'column-count': '2',
						'-o-column-count': '2',
						'-ms-column-count': '2',
						'-moz-column-count': '2',
						'-webkit-column-count': '2'
					});
				}else if(child_li < 19){
					$(this).find('.makers ul.level-2').css({
						'width' : '350px',
						'column-count': '3',
						'-o-column-count': '3',
						'-ms-column-count': '3',
						'-moz-column-count': '3',
						'-webkit-column-count': '3'
					});
				}else if(child_li < 25){
					$(this).find('.makers ul.level-2').css({
						'width' : '470px',
						'column-count': '4',
						'-o-column-count': '4',
						'-ms-column-count': '4',
						'-moz-column-count': '4',
						'-webkit-column-count': '4'
					});
				}
			}else{
				$(this).find('.makers ul.level-2').css({
					'width' : '110px',
					'column-count': '1',
					'-o-column-count': '1',
					'-ms-column-count': '1',
					'-moz-column-count': '1',
					'-webkit-column-count': '1'
				});
			}
			
			
			var child_li_2 = $(this).find('.cate-product ul.level-2 li.level-2').length;
			if(child_li_2 > 6){
				if(child_li_2 < 13){
					$(this).find('.cate-product ul.level-2').css({
						'width' : '230px',
						'column-count': '2',
						'-o-column-count': '2',
						'-ms-column-count': '2',
						'-moz-column-count': '2',
						'-webkit-column-count': '2'
					});
				}else if(child_li_2 < 19){
					$(this).find('.cate-product ul.level-2').css({
						'width' : '350px',
						'column-count': '3',
						'-o-column-count': '3',
						'-ms-column-count': '3',
						'-moz-column-count': '3',
						'-webkit-column-count': '3'
					});
				}else if(child_li_2 < 25){
					$(this).find('.cate-product ul.level-2').css({
						'width' : '470px',
						'column-count': '4',
						'-o-column-count': '4',
						'-ms-column-count': '4',
						'-moz-column-count': '4',
						'-webkit-column-count': '4'
					});
				}
			}else{
				$(this).find('.cate-product ul.level-2').css({
					'width' : '110px',
					'column-count': '1',
					'-o-column-count': '1',
					'-ms-column-count': '1',
					'-moz-column-count': '1',
					'-webkit-column-count': '1'
				});
			}
			
			var width_cate = $(this).find('.cate-product ul.level-2').width();
			var width_makers = $(this).find('.makers ul.level-2').width();
			
			if((width_makers !== null) && (width_cate !== null)){
				var total_width = width_cate + width_makers + 65;
				$(this).find('section.level-2').width(total_width);
			}
			
		});
		
		/* Tab */
		$('.list-content-tab .tab-item:not(:first)').hide();
		$('.content-deltail .tabs li a').click(function(){
			$('.content-deltail .tabs li a').removeClass('active');
			$(this).addClass('active');
			$('.list-content-tab .tab-item').hide();
			var active = $(this).attr('href');
			$(active).fadeIn();
			return false;
		});
		
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
		
		/* Tooltip */
		$(".tooltip").tooltip();
		
	});
	
	$(window).load(function(){
	
		/* Flexslider */
		$('.flexslider').flexslider({
			animation: "slide",
			directionNav: false,
			contolNav: false
		});
		$('#control-flex .prev-flex').click(function(){
			$('.flexslider').flexslider('prev');
		});
		$('#control-flex .next-flex').click(function(){
			$('.flexslider').flexslider('next');
		})
		
		//Chiều cao chi tiết sản phẩm
		var heigth_content_deltail = $("#content #left-content #deltail .img-info").height();
		$('#content #left-content #deltail .img-info .info-detail').css('height', heigth_content_deltail);
		/*
		//Chiều cao danh mục sản phẩm
		var heigth_content_list_product = $("#content #list-product").height();
		$('#content #list-product .list-breadcrumb').css('height', heigth_content_list_product);
		*/
	});
	
</script>
	
</body>
</html>
