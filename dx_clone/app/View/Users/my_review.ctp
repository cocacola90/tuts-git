
<?php
    if(isset($currency)){
        $to_currency = $currency['code'];
    }else
    {
        $to_currency = "";
    }

    if(isset($country_info))
    {
        $destination  = $country_info['Country']['code'];
        $continent = $country_info['Country']['continent'];
    }
?>
<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/" class="pathway">Home</a></li>
                    <img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                         class="breadcrumbs-separator" alt="separator">
                    <li><a href="/my-profile" class="pathway">My Profile</a></li>
                    <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                                               class="breadcrumbs-separator" alt="separator"></span>
                    <li class="active">My reviews</li>
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
                    <h1 class="user-page-title">Your reviews</h1>
                    <section class="vm-login-panel">
                        Hello <?php echo $user_info['username'];?> 
                    </section>
                    <fieldset>
					<?php if(isset($comments)):?>
						<?php foreach($comments as $item):?>
						<div class="col-md-6">
							<div class="box-comment">
								<div class="info-comment">
									<?php echo $this->Html->image($item['Product']['thumbnail'],array('class'=>'info-rate','width'=>'40','height'=>'40','alt' => ''));?>
									<span class="user-comment">
										<?php
										echo $this->Html->link(
											$item['Product']['name'],
												array(
												'controller' => 'products',
												'action' => 'view_product',
												'category' => $item['Product']['Category']['slug'],
												'product' => $item['Product']['slug'],
												'id' => $item['Product']['id'],
												'ext' => 'html'
												),
												array(
												'title' => $item['Product']['name'],
												'class' => 'title_product'
												)
											);
										?>
									</span>
								</div>
								<p class="content-comment">
									<span class="user-comment"><?php echo $item['Comment']['name'];?></span>
									<span class="created-comment">Post on: <span><?php echo date('d/m/Y', $item['Comment']['created']);?></span></span>
									<br />
								<?php echo $item['Comment']['comment'];?>
							</div>
						</div>
						<?php endforeach;?>
					<?php endif;?>	
					<?php
						if($this->Paginator->hasPage(2)){
							$this->Paginator->options(array(
							'url' => array(
							'controller' => 'users',
								'action' => 'my_review',
								'sort' => 'created', 'direction' => 'desc'

							)
							));
							echo $this->element('pagination');
						};
					?>
                    </fieldset>
					
                </div>
            </div>
        </div>

    </div>
</div>

