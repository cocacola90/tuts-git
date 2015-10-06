
<div id="top-bar">
    <div class="container top-bar">
        <div class="inner-wrap">
            <div class="row-fluid">
                <div class="span9">

                    <div class="top-mods">
                        <!-- Currency Selector Module -->
                        <div class="currency-mod top-switch">
                            <span class="cur-mod-title">Currency: <span class="selected"></span></span>

                            <div class="top-dropdown">
								<ul class="currencies" id="other_countries">
                                    <?php
                                    $show_country = $this->requestAction('/countries/show_currency');
                                    if (isset($show_country)):
                                        foreach ($show_country as $item):
                                            ?>

                                            <li <?php if ($item['Country']['currency'] == $currency['code']) {
                                                echo "class='curr-active'";
                                            }; ?>>
                                                <a href="#" data-currency="<?php echo $item['Country']['currency']; ?>"
                                                   class="vm-currency-submit">
                                                    <img src="<?php echo $item['Country']['flag'];?>" alt="<?php echo $item['Country']['country'];?>"
                                                         title="<?php echo $item['Country']['country'];?>" width="18" height="12">
                                                    <span class="curr-name"> </span>
                                                    <span class="curr-code"><?php echo $item['Country']['currency']; ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
					<?php if(isset($supports)):?>
					<div class="top-mods ">
                        <div class="custom">
                            <span><span class="muted"><a href="viber://<?php echo $supports['+84-1689-974-832']['value'];?>" style="color: #333333;"><i class="icon-viber"></i><?php echo $supports['+84-1689-974-832']['name'];?></a></span></div>
                    </div>
					<div class="top-mods ">
                        <div class="custom">
                            <span><span class="muted"><a href="skype:<?php echo $supports['Volgashop']['value'];?>" style="color: #333333;"><i class="icon-skype"></i> <?php echo $supports['Volgashop']['name']?></a></span></div>
                    </div>
					<?php endif;?>
                </div>
                <div class="span3 right">
                    <div class="top-mods ">
                        <div id="btl">
                            <!-- Panel top -->
                            <?php
                            if(isset($user_info)):
                                ?>
                                <div class="btl-panel">
                                    <!-- Profile button -->
								<span id="btl-panel-profile" class="btl-dropdown">
								Hi, <?php echo $user_info['firstname'];?> </span>
                                </div>
                                <!-- content dropdown/modal box -->
                                <div id="btl-content">
                                    <!-- Profile module -->
                                    <div id="btl-content-profile" class="btl-content-block">
                                        <div id="module-in-profile">
                                            <div class="moduletable">
                                                <ul class="list ">
                                                    <li class="item-232"><a href="/my-profile">My Profile</a></li>
                                                    <li class="item-210"><a href="/tracking">My Orders</a></li>
                                                    <li class="item-210"><a href="/my-wishlist">My Wishlist</a></li>
                                                    <li class="item-210"><a href="/users/change_password">Change password</a></li>
                                                    <li class="item-210"><a href="/users/my_point">My Points</a></li>
                                                    <li class="item-210"><a href="/users/gift_card">Gift Card Redeem</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="btl-buttonsubmit">
                                            <a name="Submit" class="btl-buttonsubmit"
                                                   href="/logout">Log out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear">
                                </div>
                            <?php else: ?>

                                <div class="btl-panel">
                                    <!-- Profile button -->
									<span id="login_link">
										<a href="javascript:void(0)" style="color:#FFFFF !important;">Login</a>
									</span>
									<span id="register_link" >
										<a href="javascript:void(0)" style="color:#FFFFF !important;">Register</a>
									</span>
                                </div>
								
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


  var btlOpt =
	{
		BT_AJAX: '',
		BT_RETURN: '/',
		RECAPTCHA: '2',
		LOGIN_TAGS: '',
		REGISTER_TAGS: '',
		EFFECT: 'btl-modal',
		ALIGN: 'right',
		BG_COLOR: '#24CDFB',
		MOUSE_EVENT: 'click',
		TEXT_COLOR: '#FFFFF'
	}
	if (btlOpt.ALIGN == "center") {
		BTLJ(".btl-panel").css('textAlign', 'center');
	} else {
		BTLJ(".btl-panel").css('float', btlOpt.ALIGN);
	}
	BTLJ("input.btl-buttonsubmit,button.btl-buttonsubmit").css({
		"color": btlOpt.TEXT_COLOR,
		"background": btlOpt.BG_COLOR
	});
	BTLJ("#btl .btl-panel > span").css({
		"color": btlOpt.TEXT_COLOR,
		"background-color": btlOpt.BG_COLOR,
		"border": btlOpt.TEXT_COLOR
	});
	BTLJ("#btl .btl-panel > span > a").css({
		"color": btlOpt.TEXT_COLOR,
		"background-color": btlOpt.BG_COLOR,
		"border": btlOpt.TEXT_COLOR
	});
    var $items = $('#other_countries li a');
    $items.click(function () {
        $items.removeClass('currency');
        $(this).addClass('currency');
        var finance = $('.currency').attr('data-currency');
        $.ajax({
            url: "/products/get_finance",
            data: "finance=" + finance,
            type: "POST",
            success: function (smg) {
                console.log(smg);
                if (smg == "OK") {

                    location.reload();
                }
            },
            error: function () {
                alert("Sorry, there was a problem!");
            }

        });
    });

</script>