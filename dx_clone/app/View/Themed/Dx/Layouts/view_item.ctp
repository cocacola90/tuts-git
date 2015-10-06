<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title_for_layout;?></title>
    <?php
	$country_info = $this->Session->read('Country'); // dat nuoc ban dang song
	$currency_vn = $this->Session->read('currency_vn');
    $destination = $country_info['Country']['code'];
    $continent = $country_info['Country']['continent'];
    $currency = $this->Session->read('Currency'); //nguoi dung chon menh gia tien
    $to_currency = $currency['code'];
    $rate = $currency['rate'];

    ?>

    <script type="text/javascript">
        var destination = "<?php echo $destination;?>";
        var root_continent = "<?php echo $continent;?>";
        var root_to_currency = "<?php echo $to_currency;?>";
        var root_rate = "<?php echo $rate;?>";
        var rate_vnd = "<?php echo $currency_vn['Country']['rate'];?>";
    </script>
    <!-- Bootstrap -->
    <?php echo $this->Html->css(array('bootstrap.min','style','cart_style','animate','style-slider','flexslider','JRating.jquery','page','lightbox','jquery.datetimepicker'));?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php echo $this->Html->script(array('wow.min','bootstrap.min','shipping_cost','accounting.min','jquery.flexslider','jquery.flexisel', 'JRating.jquery','jcarousellite_1.0.1','lightbox', 'scripts','jquery.datetimepicker'));?>

    <script type="text/javascript">
        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();
		    /* jCarouselLite */

		$(".img-detail .slideshow-img .anhPhu").jCarouselLite({
			speed: 2000,
			visible: 5,
			btnNext: ".img-detail .slideshow-img img.prev-deltail",
			btnPrev: ".img-detail .slideshow-img img.next-deltail"
		});

		$(document).ready(function () {
			/* Click ảnh */
			$(".anhPhu img").click(function () {
				var anhPhu = $(this).attr("src");
				var anhChinh = $(".imagesChinh img").attr("src");
				$('.anhPhu li').removeClass('active');
				$(this).parents("li").addClass('active');

				if (anhPhu !== anhChinh) {
					$(".imagesChinh img").stop(true, false, false).
							animate({opacity: "0"}, 500).
							queue(function () {
								$(".imagesChinh img").attr("src", anhPhu).dequeue();
							}).
							animate({opacity: "1"}, 500)
				}
				;
			});
			$(".imagesChinh img").click(function () {
				var linkAnhTheA = $(this).parent().attr("href");
				var linkAnhTheImg = $(this).attr("src");
				$(".thumbai a[href='" + linkAnhTheImg + "']").attr("href", linkAnhTheA);
				$(this).parent().attr("href", linkAnhTheImg);
			});

		});

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var atext = $('.alert').text();
            if(atext)
            {
                $(".alert-info").fadeOut(5000);
                // $(".alert-note").fadeOut(90000);
            }
        });
    </script>
    <script type="text/javascript">
        $(window).load(function () {

            /* Flexslider */
            $('.flexslider').flexslider({
                animation: "slide",
                directionNav: false,
                contolNav: false
            });
            $('#control-flex .prev-flex').click(function () {
                $('.flexslider').flexslider('prev');
            });
            $('#control-flex .next-flex').click(function () {
                $('.flexslider').flexslider('next');
            })

        });
    </script>


    <!--[endif]-->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=686318281473379";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
<?php echo $this->element('header');?>
<!--End header-->
<?php echo $this->element('view_nav_menu');?>



<div class="container">

 

        <!--End left column-->
        <?php echo $this->fetch('content');?>

        <!--End right column-->
   


    <!--En review-->
    <div class="row wow fadeInUp animated">
        <div id="block_menu_bottom">
            <div class="block_item">
                <h3 class="title_menu">Customer Service Express</h3>
                <ul>
                    <li><a href="">Ticket Service</a></li>
                    <li><a href="">Frequently Asked Questions</a></li>
                    <li><a href="">Help & Knowledge Base</a></li>
                    <li><a href="fff">Order Tracking</a></li>
                </ul>
            </div>

            <div class="block_item">
                <h3 class="title_menu">Partner with DX</h3>
                <ul>
                    <li><a href="">Affiliate Program</a></li>
                    <li><a href="">Dropship</a></li>
                    <li><a href="">Wholesale</a></li>
                    <li><a href="">See All</a></li>
                </ul>
            </div>

            <div class="block_item">
                <h3 class="title_menu">DX Everywhere</h3>
                <ul>
                    <li><a href="">IPHONE App</a></li>
                    <li><a href="">Android App</a></li>
                    <li><a href="">Mobile Site</a></li>
                    <li><a href="">RSS Feed</a></li>
                </ul>
            </div>

            <div class="block_item">
                <h3 class="title_menu">Follow Us</h3>

                <div class="social_img">
                    <?php echo $this->Html->image('social.png');?>

                </div>
            </div>
        </div>
    </div>
    <!--End menu bottom-->

    <footer class=" wow fadeInUp animated">
        <p class="copyright">© 2006~2015 DX.com. All rights reserved.</p>

        <p class="copyright_content">
            Note:Stock and Availability shown on this site is for your reference only. While we strive to provide the
            most accurate and timely stock and availability information, availability information may become out of date
            and may change between the time you added an item to cart and the time your order is received.
            Quantities on clearance items are limited. Prices are current at time of posting. DX Reserves the right to
            change prices at any time without notice.
        </p>
    </footer>


    <div class="row wow fadeInUp animated">
       <?php echo $this->Html->image('pay.png',array('class'=>'img-responsive'));?>

    </div>
    <div id="google_translate_element"></div><script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!--
    <div class="row">
        <div id="box_review">
            <h2 class="title_review"></h2>
        </div>
    </div>-->
</div>

</body>
</html>