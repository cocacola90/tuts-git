<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="UTF-8">
    <title>Trang chu</title>
    <?php
		$country_info = $this->Session->read('Country');
    $destination  = $country_info['Country']['code'];
    $continent = $country_info['Country']['continent'];
    ?>

    <script type="text/javascript">
        var destination = "<?php echo $destination;?>";
        var root_continent = "<?php echo $continent;?>";
    </script>
    <!---- End SEO ---->
    <?php
		echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <?php echo $this->Html->css(array('style','menu', 'flexslider', 'lightbox','page', 'style-slider')); ?>
    <!-- End CSS -->
    <?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery.flexslider', 'jcarousellite_1.0.1', 'lightbox', 'tooltip', 'jquery.flexisel','shipping_cost','angular.min')); ?>
    <!-- End JAVASCRIPT -->
    <script type="text/javascript" src="/theme/Site/js/angular.min.js.map"></script>

    <!--<link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/menu.css" type="text/css" />
    <link href="css/flexslider.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.flexslider.js" type="text/javascript"></script>
    <script src="js/tooltip.js" type="text/javascript"></script>-->
    <style type="text/css">
        .example-content {
            position:absolute;
            top: 0px;
            left: 150px;
            height: auto;
            width: 200px;
            height: 270px;
            background:#c2c2c2;
            color: #FFFFFF;
            display:none;
            text-shadow: none;
            z-index: 10000000000000;
            padding: 10px;

            text-align: justify;
            opacity: 0.8;
        }

        .example-content h3 {
            font-size: 14px;
            color: #015996;
            font-weight: bold;
        }
        .content-sale {
            color: #181818;
            font-size: 12px;
        }
        .price {
            color: #181818;
            font-size: 14px;
            font-weight: bold;
        }
        .tooltip-target {
            display: block; /* required */
            position: relative; /* required */
        }
        .chi-tiet {
            width: 101px;
            height: 37px;
            background: url(../img/chitiet.png) no-repeat top left;
            position: absolute;
            top: 20px;
            left: 25%;
            z-index: 9999px;
            display: none;
        }
        .tooltip-target figure:hover .chi-tiet{
            display: block;
        }
    </style>
</head>
<body>

<div id="container">
    <?php echo $this->element('header');?>
    <div class="clean"></div>
    <!-- End header-->


    <!-- end #slideshow -->

    <div id="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content');?>
        <!-- End .list-product -->


        <!--<div id="support">

        </div>-->
    </div>
    <!-- end #content -->

    <div style="clear:both;"></div>
</div>

<div id="support">
    <ul>
        <li class="">Hỗ trợ khách hàng</li>
        <li class="icon-support icon-support-tel">xx.xx.xx.xx.xxx</li>
        <li class="icon-support icon-support-tel">xx.xx.xx.xx.xxx</li>
        <li class="icon-support icon-support-tel">xx.xx.xx.xx.xxx</li>
        <li class="icon-support icon-support-skype">skype1</li>
        <li class="icon-support icon-support-skype">skype2</li>
    </ul>
</div>

<footer>
    <div id="footer">
        <div class="link-footer">
            <h3>Hỗ trợ trực tuyến</h3>
            <ul>
                <li><a href="">Hotline: 1900-6035</a></li>
                <li><a href="">Các câu hỏi thường gặp</a></li>
                <li><a href="">Chính sách đổi trả</a></li>
                <li><a href="">Phương thức vận chuyển</a></li>
                <li><a href="">Hướng dẫn đặt hàng</a></li>
            </ul>
        </div>

        <div class="link-footer">
            <h3>Tài khoản của bạn</h3>
            <ul>
                <li><a href="">Xem trạng thái đơn hàng</a></li>
                <li><a href="">Lịch sử đơn hàng</a></li>
                <li><a href="">Quên mật khẩu</a></li>
                <li><a href="">Thông tin tài khoản</a></li>
                <li><a href="">Điều khoản sử dụng</a></li>
            </ul>
        </div>

        <div class="link-footer">
            <h3>Về muaA.vn</h3>
            <ul>
                <li><a href="">Giới thiệu Mua@</a></li>
                <li><a href="">Tuyển Dụng</a></li>
                <li><a href="">Mua@ phiên bản Mobile</a></li>
                <li><a href="">Thông tin tham khảo</a></li>
                <li><a href="">Ưu đãi doanh nghiệp</a></li>
            </ul>
        </div>
    </div>
</footer>
<script type="text/javascript">
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
        $(".tooltip-target").mouseenter(function(e){
            e.preventDefault();
            $(this).children(".example-content").fadeIn("slow");
        });
        $(".tooltip-target").mouseleave(function(e){
            e.preventDefault();
            $(this).children(".example-content").fadeOut("fast");
        });


    });
</script>
</body>
</html>