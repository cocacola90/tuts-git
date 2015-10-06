<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/" class="pathway">Home</a></li>
                    <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">
                    <li><a href="/my-profile" class="pathway">My Profile</a></li>
                    <span class="divider">
                        <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                             class="breadcrumbs-separator" alt="separator"></span>
                    <li class="active">Gift card Redeem</li>
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
                        <?php echo $this->Session->flash('giftcard'); ?>
                    </div>
                    <h1 class="user-page-title">Gift Card</h1>
                    <section class="vm-login-panel">
						Hello <b><?php echo $user_info['firstname'];?></b>  <a href="/logout">[Logout]</a>
					</section>

                    <div class="myorders">
                        <div class="mac_tab">
                            <ul class="clearfix">
                                <li><a href="/users/my_point">Volga Points</a><span></span></li>
                                <li class="active"><a href="/users/gift_card">Gift Card Redeem</a> <span></span></li>
                                <li><a href="/users/history">Transaction History </a> <span></span></li>
                            </ul>
                        </div>

                        <div class="mac_tab_content">
                            <div class="mypoints_wrap">
                                <div class="points_title clearfix">
                                    <div class="points_num">
                                    <span class="Available">Available Points:
                                        <em><?php echo $points['Account']['point'];?></em></span>
                                    </div>
                                </div>
                                <div class="success_warn">You must enter password before Gift Card transaction
                                </div>
                                <form action="/users/gift_card" method="post" novalidate="novalidate">
                                    <table class="gift_card_table">
                                        <tbody>
                                        <tr>
                                            <td class="t">Gift Card Value:
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="radio" name="data[User][point]" value="<?php echo $exchange_point;?>"
                                                           checked="checked">
                                                    <?php echo $exchange_point;?> points to 1 USD
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="radio" name="data[User][point]" value="<?php echo (2 * $exchange_point);?>">
                                                    <?php echo (2 * $exchange_point);?> points to 2 USD
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="radio" name="data[User][point]" value="<?php echo (3 * $exchange_point);?>">
                                                    <?php echo (3 * $exchange_point);?> points to 3 USD
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="t"> Password
                                            </td>
                                            <td colspan="3">
                                                <input class="long_txt valid" data-val="true"
                                                       data-val-required="Please enter the payment password then submit again."
                                                       id="PaymentPassword" maxlength="100" name="data[User][password]"
                                                       type="password">
                                                <a class="find_pwd" href="/users/forgot_password" target="_blank">Find
                                                    your password</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="t">
                                            </td>
                                            <td colspan="3">
                                                <span class="field-validation-valid" data-valmsg-for="PaymentPassword"
                                                      data-valmsg-replace="true"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td colspan="3">
                                                <button type="submit" class="btn btn-primary" <?php if($points['Account']['point'] < $exchange_point){ echo 'disabled="disabled"';};?>>
                                                    Confirm
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <table class="gift_redeem_list" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr class="hd">
                                <th>
                                    Redeem time
                                </th>
                                <th>
                                    Gift Card Number
                                </th>
                                <th>
                                    Transaction Date
                                </th>
                                <th>
                                    Redeem Value
                                </th>
                                <th>
                                    Point deducted
                                </th>
                            </tr>
                            <?php if(isset($list_gift_code)):?>
                                <?php foreach($list_gift_code as $item):?>
                                    <tr>
                                        <td><?php echo date('m/d/Y H:i', $item['Giftcard']['created']);?></td>
                                        <td><?php echo $item['Giftcard']['code'];?></td>
                                        <td>
                                            <?php if($item['Giftcard']['used'] != null):?>
                                                <?php echo date('m/d/Y H:i', $item['Giftcard']['used']);?>
                                            <?php else:?>
                                                Not Uesd
                                            <?php endif;?>
                                        </td>
                                        <td><?php echo $item['Giftcard']['value'];?>$</td>
                                        <td><?php echo $item['Giftcard']['point_deducted'];?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <td colspan="5" align="center">
                                        Empty data
                                    </td>
                                </tr>
                            <?php endif;?>

                            </tbody>
                        </table>
						<div class="page_wrapper bt">
                                <?php
                                if($this->Paginator->hasPage(2)){
                                    $this->Paginator->options(array(
                                        'url' => array(
                                            'controller' => 'users',
                                            'action' => 'gift_card',
                                            'sort' => 'created', 'direction' => 'desc'

                                        )
                                    ));
                                    echo $this->element('pagination');
                                };?>

                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
    .myorders {
        margin-top: 10px;
        width: 100%;
    }

    .mac_tab {
        position: relative;
        z-index: 3;
        bottom: -1px;
    }

    .mac_tab li {
        font-size: 12px;
        background-position: right -152px;
        position: relative;
        float: left;
        margin-right: 5px;
        padding: 0 15px;
        line-height: 32px;
        font-weight: bold;
        list-style: none;
        background-color: papayawhip;
    }

    .mac_tab li.active {
        color: #f60;
        font-size: 12px;
    }

    .mypoints_wrap {
        border-bottom-width: 2px;
        border: solid 1px #d5d5d5;
    }

    .points_title {
        border-bottom: solid 1px #d5d5d5;
        background: #f0f0ef;
        padding: 5px 0;
        position: relative;
    }

    .points_num {
        width: 70%;
        float: left;
        padding-left: 10px;
        font-size: 11px;
        padding-top: 7px;
        padding-bottom: 7px;
        line-height: 150%;
    }

    .points_num em {
        font-size: 16px;
        font-style: italic;
    }


    .mypoints_table tr {
        border-bottom: solid 1px #d5d5d5;
    }

    .mypoints_table th {
        color: #666;
        line-height: 150%;
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .mypoints_table th, .mypoints_table td {
        padding: 0 10px;
        font-size: 12px;
        text-align: center;
    }

    .total_points span {
        margin-left: 25px;
        font-size: 12px;
        color: #333;
    }

    .total_points em {
        font-weight: bold;
        font-style: normal;
    }


    .points-switchable-inner li {
        width: 695px;
        overflow: hidden;
        list-style: none;
    }



    .gift_card_table {
        margin: 10px;
        line-height: 20px;
    }

    .gift_card_table td.t {
        font-weight: bold;
        text-align: right;
        padding-right: 10px;
    }

    .gift_card_table td label {
        padding-right: 15px;
        height: 13px;
        line-height: 13px;
        display: inline-block;
    }

    .gift_card_table td {
        padding: 5px 0;
    }
    .gift_redeem_list {
        border: 1px solid #d5d5d5;
        margin-top: 20px;
        text-align: center;
    }
    .gift_redeem_list .hd th, .rule .hd {
        font-weight: bold;
        font-size: 12px;
        background: #f0f0ee;
        padding: 8px 0;
    }
    .gift_redeem_list td {
        padding: 7px 0;
        border-top: 1px solid #d5d5d5;
    }
</style>