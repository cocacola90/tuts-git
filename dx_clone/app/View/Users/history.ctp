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
                    <h1 class="user-page-title">Transaction History</h1>
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

                        <table class="gift_redeem_list" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr class="hd">
                                <th>
                                    Date
                                </th>
                                <th>
                                    Order Number
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Point
                                </th>
                               
                            </tr>
                            <?php if(isset($account_logs)):?>
                                <?php foreach($account_logs as $item):?>
                                    <tr>
                                        <td><?php echo date('m/d/Y H:i', $item['Accountlog']['created']);?></td>
                                        <td><?php echo $item['Accountlog']['order_number'];?></td>
                                        <td><?php echo $item['Accountlog']['detail'];?></td>
                                        <td>
										<?php  
											if($item['Accountlog']['type'] == 1)
											{
												echo '+'.  $item['Accountlog']['point'];
											}
											else if($item['Accountlog']['type'] == 2)
											{
												echo '-'.  $item['Accountlog']['point'];
											}
										?>
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
						<div class="total_points">
							<span>Available:<em><?php echo $account['Account']['point'];?> </em>Points</span>
						</div>
						<div class="page_wrapper bt">
							<?php
							if($this->Paginator->hasPage(2)){
								$this->Paginator->options(array(
									'url' => array(
										'controller' => 'users',
										'action' => 'history',
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
	.page_wrapper.bt {
        border-bottom: solid 1px #d5d5d5;
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