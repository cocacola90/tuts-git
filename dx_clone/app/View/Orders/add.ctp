<div class="banner-breadcrumb">
	<div class="container">
		<div class="inner-wrap">
			<div class="pathway row-fluid">
				<ul class="breadcrumb span12">
					<li><a href="/" class="pathway">Home</a></li>
					<img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
					<li><a href="#" class="pathway">Cart</a></li>
					<span class="divider"><img src="http://volgashop.com/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"></span>
					<li class="active">Shopping cart</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($arr_ship)):?>
<div class="main-wrap">
    <div id="main-site" class="container">
        <div class="inner-wrap">
            <div class="row-fluid">
                <div class="span12 main-column">
                    <div id="ProOPC" class="cart-view proopc-row">
                    <div class="proopc-finalpage">
                        <div class="proopc-column3">
								<div class="proopc-bt-address">
									<h3 class="proopc-process-title">
									<!--<div class="proopc-step">
										1
									</div>-->
									Ship To</h3>
									<div class="inner-wrap">
                                    <?php echo $this->Form->create('Order',array('action'=>'add','inputDefaults'=>array('label'=>false,'div'=>false),'id'=>'formID'));?>
                                    <?php echo $this->Form->input('user_id',array('type'=>'hidden','value' => $users['id'],'label'=>false,'div' =>
                                    false));?>
                                	<?php echo $this->Form->input('ship_type',array('type' =>'hidden','id' => 'type_ship','value'=>$arr_ship['ship_type']));?>
                                    <?php //echo $this->Form->input('code',array('type' =>'hidden','id' => 'ship_to','value' => $arr_ship['code_country']));?>
                                    <?php echo $this->Form->input('total_weight',array('type' =>'hidden','id' => 'weight','value' => $arr_ship['total_weight']));?>
	
										<div class="edit-address">
											<div id="EditBTAddres" class="form-validate">
												<div class="email-group">
													<div class="inner">
														<label class="email" for="email_field">E-Mail *</label>
                                                        <?php echo $this->Form->input('email',array('id' =>'email_field','type'=>'email','size'=>'30','class'=>'validate[required,custom[email]]','maxlength'=>'100','value' => $users['email']));?>
													</div>
												</div>
												<div class="company-group">
													<div class="inner">
														<label class="company" for="company_field">Company Name</label>
                                                        <?php echo $this->Form->input('company',array('id'=>'company_field','size'=>'30','maxlength'=>'64'))?>
													</div>
												</div>
												<div class="title-group">
													<div class="inner">
														<label class="title" for="title_field">Title</label>
													   <select id="title" name="data[Order][sex]">
															<option value="1" selected="selected">Mr</option>
															<option value="2">Mrs</option>
														</select>
													</div>
												</div>
												<div class="first_name-group">
													<div class="inner">
														<label class="first_name" for="first_name_field">First Name *</label>
                                                         <?php echo $this->Form->input('first_name',array('id'=>'first_name_field','size'=>'30','maxlength'=>'64','class' => 'validate[required]','value' => $users['firstname']))?>
													</div>
												</div>
												<div class="middle_name-group">
													<div class="inner">
														<label class="middle_name" for="middle_name_field">Middle Name</label>
                                                        <?php echo $this->Form->input('middle_name',array('id'=>'middle_name_field','size'=>'30','maxlength'=>'64'))?>
                                                        
													</div>
												</div>
												<div class="last_name-group">
													<div class="inner">
														<label class="last_name" for="last_name_field">Last Name *</label>
                                                        <?php echo $this->Form->input('last_name',array('id'=>'last_name_field','size'=>'30','maxlength'=>'64','class'=>'validate[required]','value' => $users['lastname']))?>
                                                        
													</div>
												</div>
												<div class="address_1-group">
													<div class="inner">
														<label class="address_1" for="address_1_field">Address 1 *</label>
                                                        <?php echo $this->Form->input('address',array('class'=>'validate[required]','size'=>'30','maxlength' => '200','value' => $users['address']));?>
                                                        
													</div>
												</div>
												<div class="address_2-group">
													<div class="inner">
														<label class="address_2" for="address_2_field">Address 2</label>
														<?php echo $this->Form->input('address2',array('size'=>'30','maxlength' => '200','value' => $users['address2']));?>
													</div>
												</div>
												<div class="zip-group">
													<div class="inner">
														<label class="zip" for="zip_field">Zip / Postal Code *</label>
                                                        <?php echo $this->Form->input('zipcode',array('class'=>'validate[required,custom[zip]]','size'=>'30','maxlength' => '32','value' => $users['zip_code']));?>
                                                        
													</div>
												</div>
												<div class="city-group">
													<div class="inner">
														<label class="city" for="city_field">City *</label>
                                                         <?php echo $this->Form->input('city',array('class'=>'validate[required]','size'=>'30','maxlength' => '32','id'=>'city_field','value'=>$users['city']));?>
                                                        
													</div>
												</div>
												<div class="virtuemart_country_id-group">
													<div class="inner">
														<label class="virtuemart_country_id" for="virtuemart_country_id_field">Country *</label>
														<select  id="virtuemart_country_id" name="data[Order][code]" class="virtuemart_country_id validate[required]">
														<?php foreach($country as $item):?>
                                                        <?php if($item['Country']['code'] == $arr_ship['code_country']):?>
                                                        <option value="<?php echo $item['Country']['code'];?>" selected="selected"><?php echo $item['Country']['country'];?>
                    									</option>
                                                        <?php else:?>   
                                                        
                    									<option value="<?php echo $item['Country']['code'];?>"><?php echo $item['Country']['country'];?>
                    									</option>
                                                        <?php endif;?>
                    									<?php endforeach;?>
														</select>
													</div>
												</div>
												<div class="address_2-group">
													<div class="inner">
														<label class="state" for="state">State</label>
														<?php echo $this->Form->input('state',array('id' =>'phone_1_field','size' => '30','value' => $users['state'],'class'=> 'validate[required]'));?>
													</div>
												</div>
												<div class="phone_1-group">
													<div class="inner">
														<label class="phone_1" for="phone_1_field">Phone</label>
														<?php echo $this->Form->input('tel',array('id' =>'phone_1_field','size' => '30','value' => $users['phonenumber']));?>
													</div>
												</div>
												<!--<div class="phone_2-group">
													<div class="inner">
														<label class="phone_2" for="phone_2_field">Birth Day</label>
                                                        <?php echo $this->Form->input('date_of_birth',array('type'=>'text','class'=>'form-control','required'=>'','id'=>'datetimepicker2','autocomplete' => 'off'));?>
                                                       
													</div>
												</div>-->
												<div class="checkout-button-top"> 
													<label for="tosAccepted" class="checkbox prooopc-tos-label proopc-row">
														<input class="terms-of-service validate[required]" id="tosAccepted" type="checkbox" name="tosAccepted" value="1" style="width: 24px;">
														<div class="terms-of-service-cont">
															<a href="<?php echo DOMAIN_ROOT .'/blogs/terms-of-use-4.html'?>" class="terms-of-service" target="_blank">Click here to read terms of service and check the box to accept them.</a>
														</div>						
													</label>
												</div>
												
                                                <div class="proopc-row proopc-checkout-box">			
                                    				<button type="submit" class="proopc-btn n proopc-btn-info" id="proopc-order-submit">Continue Checkout</button>							
                                    			</div>
											</div>
										</div>
										<input type="hidden" name="billto" value="0"/>
									</div>
                                    <?php echo $this->Form->end();?>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif;?>


