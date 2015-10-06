<section id="bottom">
<div class="container">
	<div class="inner-container">
		<div class="row-fluid bottom-mods first">
			<div class="moduletable span3">
				<div class="mods">
					<div class="bghelper">
						<h3>Policies</h3>
						<div class="modulcontent">
						<?php $policies = $this->requestAction('/posts/policies');?>
							<ul class="list ">
							<?php foreach($policies as $policy):?>
								<li class="item-<?php echo $policy['Post']['id'];?>">
								<?php 
									echo $this->Html->link(
										$policy['Post']['title'],array(
											'controller' => 'posts',
											'action' => 'view',
											'slug_post' => $policy['Post']['slug'],
											'id' => $policy['Post']['id'],
											'ext' => 'html'
										),
										array(
											'title' => $policy['Post']['title'],
											'escape' => false
										)
									);		
								?>
								</li>
								
							<?php endforeach;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="moduletable span3">
				<div class="mods">
					<div class="bghelper">
						<h3>Services</h3>
						<div class="modulcontent">
							<ul class="list ">
								<li class="item-234"><a href="/contacts">Contact Us</a></li>
								<!--<li class="item-236"><a href="#">Site Map</a></li>-->
								<li class="item-247"><a href="/faq">FAQs</a></li>
								<li class="item-248"><a href="http://www.vnpost.vn/" target="_blank">Tracking Online</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="moduletable span3">
				<div class="mods">
					<div class="bghelper">
						<h3>Latest Blogs</h3>
						<div class="modulcontent">
							<ul class="latestnews">
							<?php
								$latest_posts = $this->requestAction('/posts/latest_post');
								if(!empty($latest_posts)):
									foreach($latest_posts as $item):
							?>
							<li> 
								<?php 
								echo $this->Html->link(
									$this->Tool->substr($item['Post']['title'],0,20),array(
										'controller' => 'posts',
										'action' => 'view',
										'slug_post' => $item['Post']['slug'],
										'id' => $item['Post']['id'],
										'ext' => 'html'
									),
									array(
										'title' => $item['Post']['title']
									)
								);			
								?>
							</li>
							<?php 
									endforeach;
								endif;
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="moduletable span3">
				<div class="mods">
					<div class="bghelper">
						<h3>Follow Us</h3>
						<div class="modulcontent">
							<div class="custom">
								<?php if(isset($supports)):?>
								<div class="stay-in-touch-icons">
									<a class="twitter" title="Follow us on Twitter" href="<?php echo $supports['twitter']['value'];?>" target="_blank">Follow us on Twitter</a><a class="facebook" title="Follow us on Facebook" href="<?php echo $supports['facebook']['value'];?>" target="_blank">Follow us on Facebook</a><a class="google-plus" title="Follow us on Google Plus" href="<?php echo $supports['google+']['value'];?>" target="_blank">Follow us on Google Plus</a>
								</div>
								<?php endif;?>
								<p>
									&nbsp;
								</p>
								<div>
									<img src="/theme/Volga/images/vs/policies/payment.png">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>