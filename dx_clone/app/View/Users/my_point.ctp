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
                    <li class="active">My Point</li>
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
                    </div>
                    <h1 class="user-page-title">My Point</h1>
					<section class="vm-login-panel">
						Hello <b><?php echo $user_info['firstname'];?></b>  <a href="/logout">[Logout]</a>
					</section>

                    <div class="myorders">
                        <div class="mac_tab">
                            <ul class="clearfix">
                                <li class="active"><a href="/users/my_point">Volga Points</a><span></span></li>
                                <li><a href="/users/gift_card">Gift Card Redeem</a> <span></span></li>
								<li><a href="/users/history">Transaction History</a> <span></span></li>
                            </ul>
                        </div>
                        <div class="mac_tab_content">
                            <div class="mypoints_wrap">
                                <div class="points_title clearfix">
                                    <div class="points_num">
                                    <span class="Available">Available Points:
                                        <em><?php echo $account['Account']['point'];?></em></span>
                                    </div>

                                </div>
                                <table class="mypoints_table">
                                    <tbody>
                                    <tr>
                                        <th width="15%">
                                            Date
                                        </th>
                                        <th width="23%">
                                            Order Number
                                        </th>
                                        <th width="37%">
                                            Details
                                        </th>
                                        <th width="13%">
                                            Points
                                        </th>
                                    </tr>

                                        <?php if(isset($account_logs)):?>
                                            <?php foreach($account_logs as $item):?>
                                            <tr>
                                                <td><?php echo date('m/d/Y H:i', $item['Accountlog']['created']);?></td>
                                                <td><?php echo $item['Accountlog']['order_number'];?></td>
                                                <td><?php echo $item['Accountlog']['detail'];?></td>
                                                <td><?php echo $item['Accountlog']['point'];?></td>
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
                            </div>
                            <div class="page_wrapper bt">
                                <?php
                                if($this->Paginator->hasPage(2)){
                                    $this->Paginator->options(array(
                                        'url' => array(
                                            'controller' => 'users',
                                            'action' => 'my_point',
                                            'sort' => 'created', 'direction' => 'desc'

                                        )
                                    ));
                                    echo $this->element('pagination');
                                };?>

                            </div>
                            <div class="total_points">
                                <span>Available:<em><?php echo $account['Account']['point'];?> </em>Points</span>
                            </div>
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
    .mypoints_table {
		
        width: 100%;
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
    .page_wrapper.bt {
        border-bottom: solid 1px #d5d5d5;
    }

    .total_points {
        text-align: right;
        line-height: 25px;
        padding: 10px 0 0;
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
</style>