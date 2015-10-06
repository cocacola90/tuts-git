/*------------------------------------------------------------------------------------------------------------
# VP One Page Checkout! Joomla 2.5 Plugin for VirtueMart 2.0
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2013 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
if(typeof ProOPC === "undefined") {	
	var jq = jQuery.noConflict();
	var ProOPC = {
		spinnervars : function() {
			// Button Process Spinner
			var SpinnerOpts = {
			  lines: 13, // The number of lines to draw
			  length: 3, // The length of each line
			  width: 2, // The line thickness
			  radius: 5, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: '#FFF', // #rgb or #rrggbb or array of colors
			  speed: 1.5, // Rounds per second
			  trail: 60, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: false, // Whether to use hardware acceleration
			  className: 'proopc-spinner', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: 'auto', // Top position relative to parent in px
			  left: 'auto' // Left position relative to parent in px
			};
			proopc_spinner = new Spinner(SpinnerOpts).spin();	
			
			// Page Loader Spinner
			var LoaderOpts = {
			  lines: 10, // The number of lines to draw
			  length: 10, // The length of each line
			  width: 4, // The line thickness
			  radius: 15, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: ProOPCVars.SPINNER_COLOR, // #rgb or #rrggbb or array of colors
			  speed: 1.5, // Rounds per second
			  trail: 60, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: true, // Whether to use hardware acceleration
			  className: 'proopc-page-loader', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: 20, // Top position relative to parent in px
			  left: 14 // Left position relative to parent in px
			};	
			proopc_loader = new Spinner(LoaderOpts).spin();	
			
			// Area Loader Spinner
			var AreaLoaderOpts = {
			  lines: 10, // The number of lines to draw
			  length: 5, // The length of each line
			  width: 3, // The line thickness
			  radius: 8, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: ProOPCVars.SPINNER_COLOR, // #rgb or #rrggbb or array of colors
			  speed: 1.5, // Rounds per second
			  trail: 40, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: true, // Whether to use hardware acceleration
			  className: 'proopc-area-loader', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: 20, // Top position relative to parent in px
			  left: 14 // Left position relative to parent in px
			};	
			proopc_area_loader = new Spinner(AreaLoaderOpts).spin();				
		},
		opcmethod : function() {
			var method = jq('input:radio[name="proopc-method"]:checked').val();
			if(method == 'guest') {
				jq('.proopc-reg-form').hide();
				jq('.proopc-reg-advantages, .proopc-guest-form').show();
				ProOPC.inputwidth();
			} else {
				jq('.proopc-reg-form').show();
				jq('.proopc-reg-advantages, .proopc-guest-form').hide();
				ProOPC.inputwidth();				
			}
		},
		guestcheckout : function() {
			jq.ajax({
				type: "POST",
				url: ProOPCVars.URI,
				data: jq('#GuestUser').serialize(),
				beforeSend:function(){
					if(ProOPC.validateForm('#GuestUser') == false) {
						return false;
					}					
					jq("#proopc-guest-process").append(proopc_spinner.el);	   
				},						
				success: function(data) {
					jq("#proopc-guest-process .proopc-spinner").remove();
					var msg_html = '<div class="proopc-alert proopc-success-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('PLG_VPONEPAGECHECKOUT_EMAIL_SAVED')+'</div>';
					jq('#proopc-system-message').html(msg_html);					
					ProOPC.processCheckout({"error": 0});								 
				}
			});	
			return false;			
		},
		verifyRegForm: function() {
			jq('#UserLogin input[type="text"], #UserLogin input[type="password"]').keyup(function(e){
				if(jq(this).val() == '') {
					jq(this).siblings('.status').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_REQUIRED_FIELD'));
				} else {
					jq(this).siblings('.status').removeClass('invalid').removeAttr('title');
				}
			});
			jq('#GuestUser input[type="text"]').keyup(function(e){
				var guestField = jq(this);	
				if(jq(this).attr('id') == 'email_field') {
					var guestEmail = jq(guestField).val();
					if(ProOPC.validateEmail(guestEmail)) {
						jq(guestField).removeClass('invalid').addClass('valid');
						jq(guestField).siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));	
					}	else {		
						jq(guestField).removeClass('valid').addClass('invalid');
						jq(guestField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_EMAIL_INVALID'));	
					}				
				}			
			});			
			jq('#UserRegistration input[type="text"], #UserRegistration input[type="password"]').keyup(function(e){
				var thisField = jq(this);				
				if(jq(this).attr('id') == 'email_field') {					
					var thisEmail = jq(thisField).val();
					if(ProOPC.validateEmail(thisEmail)) {
						if(ProOPCVars.AJAXVALIDATION == 1) {							
							jq.ajax({
								beforeSend: function(jqXHR) {							
									jq.emailPool.abortAll();
									jq.emailPool.push(jqXHR);
									jq(thisField).siblings('.status').removeClass('hover-tootip').removeClass('invalid').removeClass('valid').addClass('validating');								
								},
								dataType: 'json',
								url: ProOPCVars.URI,
								data: 'ctask=checkemail&email='+thisEmail,
								success: function(data){
									if(data.valid !== 1) {
										jq(thisField).removeClass('valid').addClass('invalid');
										jq(thisField).siblings('.status').removeClass('valid').removeClass('validating').addClass('hover-tootip').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_EMAIL_ALREADY_REGISTERED'));
									} else {
										jq(thisField).removeClass('invalid').addClass('valid');
										jq(thisField).siblings('.status').removeClass('validating').removeClass('invalid').addClass('hover-tootip').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
									}
								},
								complete: function(jqXHR) {								
									var index = jq.emailPool.indexOf(jqXHR);
									if (index > -1) {
										jq.emailPool.splice(index, 1);
									}				
								}								
							});	
						} else {
							jq(thisField).removeClass('invalid').addClass('valid');
							jq(thisField).siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));							
						}					
					} else {
						jq(thisField).removeClass('valid').addClass('invalid');
						jq(thisField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_EMAIL_INVALID'));
					}
				}
				else if(jq(this).attr('id') == 'username_field') {
					var thisUsername = jq(thisField).val();
					if(ProOPC.validateUsername(thisUsername)) {
						if(ProOPCVars.AJAXVALIDATION == 1) {				
							jq.ajax({
								dataType: 'json',
								url: ProOPCVars.URI,
								data: 'ctask=checkuser&username='+thisUsername,
								beforeSend: function(jqXHR) {
									jq.userPool.abortAll();
									jq.userPool.push(jqXHR);
									jq(thisField).siblings('.status').removeClass('hover-tootip').removeClass('invalid').removeClass('valid').addClass('validating');
								},								
								success: function(data){							
									if(data.valid !== 1) {
										jq(thisField).removeClass('valid').addClass('invalid');
										jq(thisField).siblings('.status').removeClass('valid').removeClass('validating').addClass('hover-tootip').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_USERNAME_ALREADY_REGISTERED'));
									} else {
										jq(thisField).removeClass('invalid').addClass('valid');
										jq(thisField).siblings('.status').removeClass('invalid').removeClass('validating').addClass('hover-tootip').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
									}
								},
								complete: function(jqXHR) {
									var index = jq.userPool.indexOf(jqXHR);
									if (index > -1) {
										jq.userPool.splice(index, 1);
									}				
								}								
							});		
						} else {
							jq(thisField).removeClass('invalid').addClass('valid');
							jq(thisField).siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));							
						}					
					} else {
						jq(thisField).removeClass('valid').addClass('invalid');
						jq(thisField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_USERNAME_INVALID'));
					}
				}
				else if(jq(this).attr('id') == 'password_field') {
					var thisPassword = jq(thisField).val();
					if(thisPassword == '') {
						jq('#password-stregth, #meter-status').removeClass().addClass('invalid');
						jq(thisField).removeClass('valid').addClass('invalid');
						jq(thisField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_INVALID'));
						jq('#password-stregth').text('');					
					} else {
						ProOPC.checkStrength(thisPassword);
					}					
				}	
				else if(jq(this).attr('id') == 'password2_field') {
					var actualPassword = jq('#password_field').val();
					var confirmPassword = jq(thisField).val();
					if(confirmPassword !== actualPassword || confirmPassword == '') {
						jq(thisField).removeClass('valid').addClass('invalid');
						jq(thisField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_INVALID'));			
					} else {
						jq(thisField).removeClass('invalid').addClass('valid');
						jq(thisField).siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
					}					
				}
				else if(jq(this).attr('id') == 'name_field') {
					var thisName = jq(thisField).val();
					if(thisName.length == 0) {
						jq(thisField).removeClass('valid').addClass('invalid');
						jq(thisField).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_INVALID'));						
					} else {
						jq(thisField).removeClass('invalid').addClass('valid');
						jq(thisField).siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));						
					}
				}				
			});
		},
		validateEmail : function(emailCheck) {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(!emailReg.test(emailCheck) || emailCheck.length < 5) {
				return false;
			} else {
				return true;
			}				
		},
		validateUsername : function(usernameCheck) {
		  var usernameReg = /^[a-zA-Z0-9]+$/;
		  if(!usernameReg.test(usernameCheck) ) {
		    return false;
		  } else {
		    return true;
		  }				
		},
		checkStrength : function(passwordCheck) {
			var strength = 0
			//if the password length is less than 4, return message.
			if (passwordCheck.length < 4) {
				jq('#password-stregth, #meter-status').removeClass().addClass('short');
				jq('#password_field').removeClass('valid').addClass('invalid');
				jq('#password_field').siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_INVALID'));
				jq('#password-stregth').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_TOO_SHORT'));
				return false;
			}
			//if length is 5 characters or more, increase strength value
			if (passwordCheck.length > 4) strength += 1
			//if password contains both lower and uppercase characters, increase strength value
			if (passwordCheck.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
			//if it has numbers and characters, increase strength value
			if (passwordCheck.match(/([a-zA-Z])/) && passwordCheck.match(/([0-9])/))  strength += 1
			//if it has one special character, increase strength value
			if (passwordCheck.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
			//if it has two special characters, increase strength value
			if (passwordCheck.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1
			//now we have calculated strength value, we can return messages
			//if value is less than 2
			if (strength < 2 ) {
				jq('#password-stregth, #meter-status').removeClass().addClass('weak');
				jq('#password_field').removeClass('invalid').addClass('valid');
				jq('#password_field').siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
				jq('#password-stregth').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_WEAK'));
			} else if (strength == 2 ) {
				jq('#password-stregth, #meter-status').removeClass().addClass('good');
				jq('#password_field').removeClass('invalid').addClass('valid');
				jq('#password_field').siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
				jq('#password-stregth').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_GOOD'));
			} else {
				jq('#password-stregth, #meter-status').removeClass().addClass('strong');
				jq('#password_field').removeClass('invalid').addClass('valid');
				jq('#password_field').siblings('.status').removeClass('invalid').addClass('valid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_VALIDATED'));
				jq('#password-stregth').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_STRONG'))
			}	
		},
		registerCheckout : function() {				
			jq.ajax({
				type: 'POST',
				beforeSend:function(){
					if(ProOPC.validateForm('#UserRegistration') == false) {
						return false;
					}
					jq("#proopc-register-process").append(proopc_spinner.el);	   
				},					
				url: ProOPCVars.URI,
				data: jq('#UserRegistration').serialize(),
				success: function(data) {
					if(data.error == 1) {
						jq("#proopc-register-process .proopc-spinner").remove();
						var msg_html = '<div class="proopc-alert proopc-alert-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+data.msg.join('<br/>')+'</div>';
						jq('#proopc-system-message').html(msg_html);	
						jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-50}, 500);
					} else {
						var msg_html = '<div class="proopc-alert proopc-success-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+data.msg.join('<br/>')+'</div>';
						jq('#proopc-system-message').html(msg_html);	
						jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-50}, 500);
						setTimeout(function() {
							jq("#proopc-register-process .proopc-spinner").remove();				
							ProOPC.processCheckout(data);
						}, 3000);					
					}
				},
				error: function() {
					jq("#proopc-register-process .proopc-spinner").remove();
					var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>Error submiting registration form (registerCheckout). Reload the page and try again.</div>';
					jq('#proopc-system-message').html(msg_html);
          jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-50}, 500);
				}
			});
			return false;					
		},
		processCheckout : function(data) {
			ProOPC.addpageloader();
			jq('#proopc-page-spinner').after('<div id="proopc-order-process"></div>');				
			jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_PLEASE_WAIT'));			
			if(data.error == 0) {
				var data = jq('#ProOPC').html();
				jq.ajax({
					url: ProOPCVars.URI,
					data: 'task=procheckout',
					success: function(data){						
						var html = jq(data).find('#ProOPC').html();
						if(html == null) {
							var html = data;
						} 
						jq('html, body').animate({scrollTop: 0}, 500);
						jq('#ProOPC').html(html);
					}, 
					complete : function() {
						var BT_STATE_ID = jq('input#BTStateID').val();
						var ST_STATE_ID = jq('input#STStateID').val();						
						jq("#virtuemart_country_id").vm2front("list",{dest : "#virtuemart_state_id", ids : BT_STATE_ID, prefiks : ""});
						jq("#shipto_virtuemart_country_id").vm2front("list",{dest : "#shipto_virtuemart_state_id", ids : ST_STATE_ID, prefiks : "shipto_"});						
						ProOPC.style();	
						ProOPC.tooltip();						
						ProOPC.inputwidth();
						ProOPC.selectwidth();
						jq('#proopc-order-process').remove();
						ProOPC.removepageloader();
						ProOPC.defaultSP();						
					}					
				});				
			} 
			else {
				var msg_html = '';
				jq.each(data.msg, function(key,value){
					msg_html = msg_html+'<div class="error-msg">'+value+'</div>';
				});				
				jq('#proopc-system-message').html(msg_html);
				jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
				jq('#proopc-system-message').children('span').animate({opacity: 0},2000);
			}		
		},
		loginAjax : function() {
			if(ProOPC.validateForm('#UserLogin') == false) {
				return false;
			}		
			var token = jq('.proops-login-inputs input:last').attr("name");
			var value_token = encodeURIComponent(jq('.proops-login-inputs input:last').val()); 
			var datasubmit= "ctask=login&username="+encodeURIComponent(jq("#proopc-username").val())+"&passwd=" + encodeURIComponent(jq("#proopc-passwd").val())+ "&"+token+"="+value_token+"&return="+ encodeURIComponent(jq("#proopc-return").val());			
			if(jq("#proopc-remember").is(":checked")){
				datasubmit += '&remember=yes';
			}
			jq.ajax({
			   type: "POST",
			   beforeSend:function(){
			   		jq("#proopc-login-process").append(proopc_spinner.el);	   
			   },
			   url: ProOPCVars.URI,
			   data: datasubmit,
			   success: function (html, textstatus, xhrReq){
						if(html == "1" || html == 1){
							jq("#proopc-login-process .proopc-spinner").remove();
							var msg_html = '<div class="proopc-alert proopc-success-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('PLG_VPONEPAGECHECKOUT_LOGIN_COMPLETED')+'</div>';
							jq('#proopc-system-message').html(msg_html);							
							ProOPC.processCheckout({"error": 0});	
				   	} else {
							if(html.indexOf('</head>')==-1){
								jq("#proopc-login-process .proopc-spinner").remove();
								var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('JLIB_LOGIN_AUTHENTICATE')+'</div>';
								jq('#proopc-system-message').html(msg_html);
							}
							else {
								jq("#proopc-login-process .proopc-spinner").remove();
								var msg_html = '<div class="proopc-alert proopc-success-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('PLG_VPONEPAGECHECKOUT_LOGIN_COMPLETED')+'</div>';
								jq('#proopc-system-message').html(msg_html);								
								ProOPC.processCheckout({"error": 0});	
							}
						}
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						jq("#proopc-login-process .proopc-spinner").remove();
						var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>Login failed. Please refersh the page and try again.</div>';
						jq('#proopc-system-message').html(msg_html);
			   	}
			});
			return false;			
		},
		updateBTaddress : function(element) {
			jq('#proopc-order-submit').attr('disabled', 'disabled');
			if(jq(element).attr('id') == 'virtuemart_country_id' || jq(element).attr('id') == 'virtuemart_state_id') {
				var selectedVal = jq(element).val();
				jq(element).find('[selected="selected"]').removeAttr('selected');
				jq(element).find('option[value="'+selectedVal+'"]').attr('selected', 'selected');
			}
			var BTformData = [];
			jq('#EditBTAddres input, #EditBTAddres select').each(function(){
				var BT_field_name = jq(this).attr('name');
				var BT_field_value = jq(this).val();
				BTformData.push(BT_field_name+'='+BT_field_value);
			});
			var BT_formSubmit = BTformData.join('&');
			var tokenName = jq('#formToken input').attr('name');
			var tokenValue = jq('#formToken input').val();
			var dataSubmit = '&option=com_virtuemart&task=saveUser&controller=user&ctask=savebtaddress&'+tokenName+'='+tokenValue;
			jq.ajax({
				type: "POST",
				url: ProOPCVars.URI,
				data: BT_formSubmit + dataSubmit, // serializes the form's elements.
				success: function(data) {
					ProOPC.getshipmentpaymentcartlist();									 
				}
			});		
		},
		updateSTaddress : function(element) {
			jq('#proopc-order-submit').attr('disabled', 'disabled');
			if(jq(element).attr('id') == 'shipto_virtuemart_country_id' || jq(element).attr('id') == 'shipto_virtuemart_state_id') {
				var selectedVal = jq(element).val();
				jq(element).find('[selected="selected"]').removeAttr('selected');
				jq(element).find('option[value="'+selectedVal+'"]').attr('selected', 'selected');
			}	
			var formData = [];
			jq('#EditSTAddres input, #EditSTAddres select').each(function(){
				var field_name = jq(this).attr('name');
				var field_value = jq(this).val();
				formData.push(field_name+'='+field_value);
			});
			var formSubmit = formData.join('&');
			var tokenName = jq('#formToken input').attr('name');
			var tokenValue = jq('#formToken input').val();			
			var dataSubmit = '&option=com_virtuemart&task=saveUser&controller=user&ctask=savestaddress&'+tokenName+'='+tokenValue;	
			jq.ajax({
				type: "POST",
				url: ProOPCVars.URI,
				data: formSubmit + dataSubmit, // serializes the form's elements.
				success: function(data) {
					ProOPC.getshipmentpaymentcartlist();
				}
			});		
		},	
		setst : function (checkbox) {
			jq('#proopc-order-submit').attr('disabled', 'disabled');
			if(jq(checkbox).length > 0 ) {
				if(checkbox.checked) {
					jq.ajax({
						beforeSend: function(jqXHR) {
							jq('.proopc-st-address .edit-address').slideUp();
							jq.xhrPool.abortAll();
							jq.xhrPool.push(jqXHR);							
						},
						type: 'post',
						url: ProOPCVars.URI,
						data: 'ctask=btasst',
						cache: false,
						success : function() {							
							ProOPC.getshipmentpaymentcartlist();
						},
						complete: function(jqXHR) {
							var index = jq.xhrPool.indexOf(jqXHR);
							if (index > -1) {
								jq.xhrPool.splice(index, 1);
							}							
						}
					});
				} else {
					jq.ajax({
						beforeSend: function(jqXHR) {
							jq('.proopc-st-address .edit-address').slideDown();
							jq.xhrPool.abortAll();
							jq.xhrPool.push(jqXHR);								
							ProOPC.inputwidth();
							ProOPC.selectwidth();							
						},
						type: 'post',
						url: ProOPCVars.URI,
						data: 'ctask=btnotasst',
						cache: false,
						success : function(jqXHR) {
							ProOPC.updateSTaddress();
						},
						complete: function(jqXHR) {
							var index = jq.xhrPool.indexOf(jqXHR);
							if (index > -1) {
								jq.xhrPool.splice(index, 1);
							}							
						}					
					});				
				}
			}		
		},
		getshipmentpaymentcartlist: function() {
			ProOPC.addloader('#proopc-pricelist, #proopc-payments, #proopc-shipments');
			jq.ajax({
				dataType: 'json',
				url: ProOPCVars.URI,
				data:'ctask=getshipmentpaymentcartlist',
				success: function(data){
					jq('#proopc-shipments').html(data.shipments);
					jq('#proopc-payments').html(data.payments);
					jq('#proopc-pricelist').html(data.cartlist);						
				},
				complete: function() {
					ProOPC.style();	
					ProOPC.tooltip();
					ProOPC.removeloader('#proopc-pricelist, #proopc-payments, #proopc-shipments');
					ProOPC.defaultSP();
				},
				error: function() {
					console.log('Error: Error gettings Shipments, Payments and Cartlist (getshipmentpaymentcartlist).');
				}
			});				
		},
		defaultSP : function() {
			var datasubmit = '';
			if(ProOPCVars.AUTOSHIPMENT) {	
				if(jq('#proopc-shipments input:radio[name=virtuemart_shipmentmethod_id]').length) {
					var shipment_checked = true;
					jq('#proopc-shipments input:radio[name=virtuemart_shipmentmethod_id]').each(function(){
						shipment_checked = shipment_checked && jq(this).is(':checked');
						if(jq(this).is(':checked')) {
								return false;
						}						 
					});
					if (!shipment_checked) {
						jq('#proopc-shipments input:radio[name=virtuemart_shipmentmethod_id]:first').attr('checked', true);						
						var virtuemart_shipmentmethod_id = jq('#proopc-shipments input:radio[name=virtuemart_shipmentmethod_id]:checked').val();	
						datasubmit = datasubmit+'&virtuemart_shipmentmethod_id='+virtuemart_shipmentmethod_id;	
						// For USPS Plugin 
						var usps = jq('#proopc-shipments input:radio[name=virtuemart_shipmentmethod_id]:checked').data('usps');	
						if(jq('#usps_name-'+virtuemart_shipmentmethod_id).length) {
							var usps_name = 'usps_name-'+virtuemart_shipmentmethod_id+'='+usps.service;
							datasubmit = datasubmit+'&'+usps_name;
						}
						if(jq('#usps_rate-'+virtuemart_shipmentmethod_id).length) {
							var usps_rate = 'usps_rate-'+virtuemart_shipmentmethod_id+'='+usps.rate;
							datasubmit = datasubmit+'&'+usps_rate;
						}								
					}	
			
								
				}
			}
			if(ProOPCVars.AUTOPAYMENT) {				
				if(jq('#proopc-payments input:radio[name=virtuemart_paymentmethod_id]').length) {
					var payment_checked = true;
					jq('#proopc-payments input:radio[name=virtuemart_paymentmethod_id]').each(function(){
						payment_checked = payment_checked && jq(this).is(':checked');
						if(jq(this).is(':checked')) {
								return false;
						}
					});
					if (!payment_checked)	 {
						jq('#proopc-payments input:radio[name=virtuemart_paymentmethod_id]:first').attr('checked', true);
						if(jq('#proopc-payments input:radio[name=virtuemart_paymentmethod_id]:checked').attr('rel') == 'authorizenet') {
							jq('.vmpayment_cardinfo.authorizenet').removeClass('hide').addClass('show');
						} else {
							jq('.vmpayment_cardinfo.authorizenet').removeClass('show').addClass('hide');
						}					
						var virtuemart_paymentmethod_id = jq('#proopc-payments input:radio[name=virtuemart_paymentmethod_id]:checked').val();					
						datasubmit = datasubmit+'&virtuemart_paymentmethod_id='+virtuemart_paymentmethod_id;						
					}
				}				
			}
			if (datasubmit !== '') {
				jq.ajax({
					dataType: 'json',
					url: ProOPCVars.URI,
					data: 'ctask=setdefaultsp'+datasubmit,
					cache: false,
					beforesend: function() {
						jq('#proopc-order-submit').attr('disabled', 'disabled');
					},
					success: function(data) {
						if(data.error !== 0) {
							alert('Error: Setting default Shipment & Payment Method. Please select manually.');
						} else {
							ProOPC.getcartlist();
						}					
					}
				});	
			}			
		},
		setshipment : function(radio) {
			jq('#proopc-order-submit').attr('disabled', 'disabled');
			if (jq(radio).length > 0) {
				var virtuemart_shipmentmethod_id = jq(radio).val();					
				var datasubmit = '&virtuemart_shipmentmethod_id='+virtuemart_shipmentmethod_id;			
				var usps = jq(radio).data('usps');	
				if(jq('#usps_name-'+virtuemart_shipmentmethod_id).length) {
					var usps_name = 'usps_name-'+virtuemart_shipmentmethod_id+'='+usps.service;
					datasubmit = datasubmit+'&'+usps_name;
				}
				if(jq('#usps_rate-'+virtuemart_shipmentmethod_id).length) {
					var usps_rate = 'usps_rate-'+virtuemart_shipmentmethod_id+'='+usps.rate;
					datasubmit = datasubmit+'&'+usps_rate;
				}
				jq.ajax({
					dataType: 'json',
					url: ProOPCVars.URI,
					data: 'ctask=setshipments'+datasubmit,
					cache: false,
					success: function(data) {
						if(data.error !== 0) {
							alert('Error: Selecting Shipment Method');
						} else {
							ProOPC.getcartlist();
						}					
					}
				});	
			}				
		},
		setpayment : function(radio) {
			jq('#proopc-order-submit').attr('disabled', 'disabled');
			if(jq(radio).is(':checked') && jq(radio).attr('rel') == 'authorizenet') {
				jq('.vmpayment_cardinfo.authorizenet').removeClass('hide').addClass('show');
			} else {
				jq('.vmpayment_cardinfo.authorizenet').removeClass('show').addClass('hide');
			}
			if(jq(radio).length > 0) {
				var virtuemart_paymentmethod_id = jq(radio).val();	
				jq.ajax({
					dataType: 'json',
					url: ProOPCVars.URI,
					data: 'ctask=setpayment&virtuemart_paymentmethod_id='+virtuemart_paymentmethod_id,
					cache: false,
					success: function(data) {
						if(data.error !== 0) {
							alert('Error: Selecting Payment Method');
							console.log(data);
						} else {
							ProOPC.getcartlist();
						}				
					}
				});	
			}					
		},
		getcartlist: function() {
			ProOPC.addloader('#proopc-pricelist');
			jq.ajax({
				dataType: 'json',
				url: ProOPCVars.URI,
				data: 'ctask=getcartlist',
				cache: false,
				success: function(data) {
					jq('#proopc-pricelist').html(data.cartlist);
				},
				complete: function() {
					ProOPC.style();	
					ProOPC.removeloader('#proopc-pricelist');
				},
				error: function() {
					console.log('Carlist Error: Error getting Cartlist Data (getcartlist).');
				}
			});				
		},
		deleteproduct: function(pdel) {
			var delPID = jq(pdel).attr('data-vpid');
			jq.ajax({
				beforeSend: function() {
					ProOPC.addloader('#proopc-pricelist, #proopc-payments, #proopc-shipments');
				},
				type: 'POST',
				url: ProOPCVars.URI,
				data: 'ctask=deleteproduct&id='+delPID,
				cache: false,	
				success: function(data) {
					console.log(data);
					jq('#proopc-system-message').html('');
					jq('.proopc-product-hover').addClass('hide');
					if(data.pqty == 0) {
						window.location.reload();
						return false;
					}
					if(jq('input#proopc-cart-summery').length > 0) {
						ProOPC.getcartsummery();
						jq('#proopc-cart-totalqty').text(data.pqty);
					} else {
						ProOPC.getshipmentpaymentcartlist();
						if(jq('#proopc-cart-totalqty').length > 0) {
							jq('#proopc-cart-totalqty').text(data.pqty);
						}						
					}						
					var mod = jq(".vmCartModule");
					jq.getJSON(vmSiteurl+'index.php?option=com_virtuemart&nosef=1&view=cart&task=viewJS&format=json'+vmLang,
						function(datas, textStatus) {
							if (datas.totalProduct >0) {
								mod.find('.vm_cart_products').html('');
								jq.each(datas.products, function(key, val) {
									jq('#hiddencontainer .container').clone().appendTo('.vmCartModule .vm_cart_products');
									jq.each(val, function(key, val) {
										if (jq('#hiddencontainer .container .'+key)) mod.find('.vm_cart_products .'+key+':last').html(val) ;
									});
								});
								mod.find('.total').html(datas.billTotal);
								mod.find('.show_cart').html(datas.cart_show);
							} else {
								mod.find('.vm_cart_products').html('');
								mod.find('.total').html(datas.billTotal);
							}
							mod.find('.total_products').html(datas.totalProductTxt);
						}
					);					
				}
			});	
			return false;					
		},
		updateproductqty: function(pupdate) {
			var updatePID =jq(pupdate).parent('.proopc-input-append').find('input[name="quantity"]').attr('data-vpid');
			var quantity = jq(pupdate).parent('.proopc-input-append').find('input[name="quantity"]').val();
			jq.ajax({
				beforeSend: function() {
					ProOPC.addloader('#proopc-pricelist, #proopc-payments, #proopc-shipments');
				},
				dataType: 'JSON',
				url: ProOPCVars.URI,
				data: 'ctask=updateproduct&id='+updatePID+'&quantity='+quantity,
				cache: false,	
				success: function(data) {
					if(data.error !== 0) {
						if(data.pqty == 0) {
							window.location.reload();
							return false;
						}						
						ProOPC.removeloader('#proopc-pricelist, #proopc-payments, #proopc-shipments');
						var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+data.msg+'</div>';
						jq('#proopc-system-message').html(msg_html);
						jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);						
					} else {
						jq('#proopc-system-message').html('');
						jq('.proopc-product-hover').addClass('hide');				
						if(jq('input#proopc-cart-summery').length > 0) {
							ProOPC.getcartsummery();
							jq('#proopc-cart-totalqty').text(data.pqty);
						} else {
							ProOPC.getshipmentpaymentcartlist();
						}
	                    if (jq(".vmCartModule")[0]) {
	                        Virtuemart.productUpdate(jq(".vmCartModule"));
	                    }							
					}
				}
			});	
			return false;					
		},	
		getcartsummery: function(){
			ProOPC.addloader('#proopc-pricelist');
			jq.ajax({
				dataType: 'json',
				url: ProOPCVars.URI,
				data: 'ctask=getcartsummery',
				cache: false,
				success: function(data) {
					jq('#proopc-cart-qty').text(data.pqty);
					jq('#proopc-pricelist').html(data.cartsummery);
				},
				complete: function() {
					ProOPC.style();	
					ProOPC.removeloader('#proopc-pricelist');
				},
				error: function() {
					console.log('Carlist Error: Error getting Cartlist Data (getcartlist).');
				}
			});					
		},
		inputwidth : function() {
			if(ProOPCVars.GROUPING) {
				jq('.title-group, .first_name-group').wrapAll('<div class="proopc-row group-enabled" />');
				jq('.middle_name-group, .last_name-group').wrapAll('<div class="proopc-row group-enabled" />');
				jq('.zip-group, .city-group').wrapAll('<div class="proopc-row group-enabled" />');
				jq('.shipto_middle_name-group, .shipto_last_name-group').wrapAll('<div class="proopc-row group-enabled" />');
				jq('.shipto_zip-group, .shipto_city-group').wrapAll('<div class="proopc-row group-enabled" />');				
			}
			jq('.proopc-bt-address input, .proopc-st-address input').each(function(){
				var width = jq(this).parent('.inner').width();
				jq(this).width(width-15);
			});			
			jq('.proopc-register-login input').each(function(){
				var width = jq(this).parent('.proopc-input').width();
				jq(this).width(width-27);
			});	
			jq('.proopc-register-login button').each(function(){
				var width = jq(this).parent('.proopc-input').width();
				jq(this).width(width);
			});				
			var couponAreaWidth = jq('#proopc-coupon .proopc-input-append').width();
			var couponSaveBtnWidth = jq('#proopc-coupon').find('button.proopc-btn').outerWidth(true);
			jq('#proopc-coupon-code').width((couponAreaWidth - couponSaveBtnWidth)-20).css('margin-right', 5);
		},
		selectwidth : function() {
			jq('.proopc-bt-address select, .proopc-st-address select').each(function(){
				var width = jq(this).parent('.inner').width();
				jq(this).width(width-3);
			});
		},
		productdetails : function() {
			var productdetailsConfig = {
			   interval: 100,
			   sensitivity: 4,
			   over: ProOPC.openproductdetails,
			   timeout: 200,
			   out: ProOPC.closeproductdetails
			};
			jq('.proopc-cart-product').hoverIntent(productdetailsConfig);
		},
		openproductdetails : function(){
			var entryID = jq(this).attr('data-details');
			jq(this).addClass('open');	
			var wrapWidth = jq(this).width();
			jq(this).find('.proopc-p-info-table').width(wrapWidth);
			var thisPosition = jq(this).position().top;
			var thisHeight = jq(this).height();
			jq('#'+entryID).css('top', (thisPosition+thisHeight)).removeClass('hide').animate({opacity:1}, 300, "easeOutExpo");
		},		
		closeproductdetails : function(){
			var closeEntryID = jq(this).attr('data-details');		
			jq(this).removeClass('open');
			jq('#'+closeEntryID).addClass('hide').animate({opacity:0}, 300, "easeInExpo");
		},
		savecoupon : function(button) {
			var couponCode = jq('#proopc-coupon-code').val();
			var defaultValue = jq('#proopc-coupon-code').attr('data-default');
			if(couponCode == defaultValue) {				
				ProOPC.setmsg(1, Joomla.JText._('PLG_VPONEPAGECHECKOUT_COUPON_EMPTY'));
			} else {
				var dataSubmit = 'ctask=setcoupon&coupon_code='+couponCode;	
				jq.ajax({
					beforeSend: function() {
						jq('#proopc-order-submit').attr('disabled', 'disabled');
						ProOPC.addloader('#proopc-coupon');
						jq("#proopc-coupon-process").append(proopc_spinner.el);
					},
					dataType: 'json',
					url: ProOPCVars.URI,
					data: dataSubmit,
					success: function(data) {
						ProOPC.setmsg(data.error, data.msg);
						ProOPC.getcartlist();										
					},
					error: function() {
						ProOPC.removeloader('#proopc-coupon');
						ProOPC.setmsg(1, 'Coupon Error: Data could not be fetched.');
					},
					complete: function() {
						ProOPC.removeloader('#proopc-coupon');
					}
				});				
			}	
			return false;	
		},
		setmsg : function(type, message) {
			if(type == '1') {
				var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+message+'</div>';
			} else {
				var msg_html = '<div class="proopc-alert proopc-success-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+message+'</div>';
			}
			jq('#proopc-system-message').html(msg_html);
			jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);			
		},
		addloader: function(addprocess) {
			var loaderHTML = '<div class="proopc-loader-overlay"></div><div class="proopc-area-loader"><span></span></div>';
			jq(addprocess).each(function() {
				if(jq(this).find('.proopc-area-loader').length == 0) {
					jq(this).append(loaderHTML);
					jq('.proopc-area-loader > span').append(proopc_area_loader.el);
				}					
			});	
			jq('#header .navigation.sticky').css('z-index', 2000000000);
			jq('#proopc-order-submit').attr('disabled', 'disabled');
		},
		removeloader: function(removeprocess) {
			jq(removeprocess).each(function() {
				if(jq(this).find('.proopc-loader-overlay').length > 0) {
					jq(this).find('.proopc-loader-overlay').remove();
					jq(this).find('.proopc-area-loader').remove();
				}				
			});
			jq('#header .navigation.sticky').css('z-index', '');
			jq('#proopc-order-submit').removeAttr('disabled');
		},
		addpageloader: function() {
			if(jq('#proopc-page-overlay').length == 0) {
				jq('body').append('<div id="proopc-page-overlay"></div><div id="proopc-page-spinner"><span></span></div>');
			}		
			jq('#header .navigation.sticky').css('z-index', 2000000000);	
			var bodyHeight = jq('body').outerHeight();
			jq('#proopc-page-overlay').css({display: 'block', height: bodyHeight}).animate({opacity: 0.7}, 300);
			jq('#proopc-page-spinner > span').append(proopc_loader.el);			
		},
		removepageloader: function() {
			if(jq('#proopc-page-overlay').length > 0) {
				jq('#proopc-page-overlay, #proopc-page-spinner').remove();				
			}
			jq('#header .navigation.sticky').css('z-index', '');		
		},		
		tooltip: function() {
			jq('.hover-tootip').hover(function(){
				var title = jq(this).attr('title');
				jq(this).data('tipText', title).removeAttr('title');
				if(title.indexOf('::') >= 0) {
					var title = title.split('::');
					var tipHTML = '<div class="tooltip-title">'+title[0]+'</div><div class="tooltip-body">'+title[1]+'</div>';
				  jq('<p class="proopc-tooltip"></p>')
				  .html(tipHTML)
				  .appendTo('body')
				  .fadeIn('slow');									
				} else {			
					var tipHTML = '<div class="tooltip-body">'+title+'</div>';					
				  jq('<p class="proopc-tooltip"></p>')
				  .html(tipHTML)
				  .appendTo('body')
				  .fadeIn('slow');								
				}	
			}, function() {
			        jq(this).attr('title', jq(this).data('tipText'));
			        jq('.proopc-tooltip').remove();
			}).mousemove(function(e) {
			        var mousex = e.pageX + 20; //Get X coordinates
			        var mousey = e.pageY + 10; //Get Y coordinates
			        jq('.proopc-tooltip')
			        .css({ top: mousey, left: mousex })
			});				
		},
		style: function() {
			var biggestHeight = 0; 
			jq('.proopc-register > .proopc-inner, .proopc-login > .proopc-inner').each(function(){  
				if(jq(this).height() > biggestHeight){  
					biggestHeight = jq(this).height();  
				}  
			});  
			jq('.proopc-register > .proopc-inner, .proopc-login > .proopc-inner').css('min-height',biggestHeight);
			jq('.proopc-p-price > div, .proopc-taxcomponent > div, .proopc-p-discount > div').each(function() {
				if(jq(this).is(':visible')) {
					jq(this).css('display','inline');
				}
			});
			jq('.proopc-login-message-cont').hover(function() {
				jq('.proopc-logout-cont').removeClass('hide');
			}, function(){
				jq('.proopc-logout-cont').addClass('hide');
			});
			jq('.proopc-logout-cont').width(jq('.proopc-loggedin-user').width());
		},
		close: function(close) {
			jq(close).parent('.proopc-alert').remove();
		},
		validateForm: function(formID) {
			var FormMsg = '';
			var okay = true;
			jq(formID+' input[type="text"],'+formID+' input[type="password"]').each(function(){
				if(jq(this).val() == '' || jq(this).hasClass('invalid')) {
					jq(this).siblings('.status').removeClass('valid').addClass('invalid').attr('title', Joomla.JText._('PLG_VPONEPAGECHECKOUT_REQUIRED_FIELD'));
					FormMsg = Joomla.JText._('PLG_VPONEPAGECHECKOUT_REQUIRED_FIELDS_MISSING');
					okay = false; 
				} 
			});
			if(okay == false) {
				var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+FormMsg+'</div>';	
				jq('#proopc-system-message').html(msg_html);
				jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);							
			} 
			return okay;
		},
		submitOrder: function() {
			jq('#proopc-system-message').html('');
			var missingField = false;
			if(jq('#virtuemart_state_id optgroup').length > 0 && jq('#virtuemart_state_id').val() == ''){
				jq('#virtuemart_state_id').addClass('required');
			}
			if(jq('#shipto_virtuemart_state_id optgroup').length > 0 && jq('#shipto_virtuemart_state_id').val() == ''){
				jq('#shipto_virtuemart_state_id').addClass('required');
			}			
			jq('#EditBTAddres select, #EditBTAddres input').each(function() {
				if(jq(this).hasClass('required') && jq(this).val() == '') {
					jq(this).addClass('invalid');
					var thisID = jq(this).attr('id');
					jq('label[for="'+thisID+'"]').addClass('invalid');
					missingField = true;					
				}	
			});	
			jq('#EditBTAddres select, #EditBTAddres input').change(function() {
				if(jq(this).hasClass('invalid') && jq(this).val() !== '') {
					jq(this).removeClass('invalid');
					var thisID = jq(this).attr('id');
					jq('label[for="'+thisID+'"]').removeClass('invalid');					
				}	
			});			
			if(jq('#STsameAsBT').is(':checked')) {
				jq('#EditBTAddres input').each(function() {
					var thisID = jq(this).attr('id');
					jq('#shipto_'+thisID).val(jq(this).val());
				});
			} else {
				jq('#EditSTAddres select, #EditSTAddres input').each(function() {
					if(jq(this).hasClass('required') && jq(this).val() == '') {
						jq(this).addClass('invalid');
						var thisID = jq(this).attr('id');
						jq('label[for="'+thisID+'"]').addClass('invalid');
						missingField = true;					
					}	
				});	
				jq('#EditSTAddres select, #EditSTAddres input').change(function() {
					if(jq(this).hasClass('invalid') && jq(this).val() !== '') {
						jq(this).removeClass('invalid');
						var thisID = jq(this).attr('id');
						jq('label[for="'+thisID+'"]').removeClass('invalid');					
					}	
				});						
			}	
			if(missingField) {
				var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('COM_VIRTUEMART_USER_FORM_MISSING_REQUIRED_JS')+'</div>';
				jq('#proopc-system-message').html(msg_html);
				jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
				return false;				
			}
			if(jq('#proopc-shipments input[name="virtuemart_shipmentmethod_id"]').is(':checked') == false) {
				var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('COM_VIRTUEMART_CART_NO_SHIPMENT_SELECTED')+'</div>';
				jq('#proopc-system-message').html(msg_html);
				jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
				return false;				
			}

			if(jq('#proopc-payments input[name="virtuemart_paymentmethod_id"]').is(':checked') == false) {
				var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('COM_VIRTUEMART_CART_NO_PAYMENT_SELECTED')+'</div>';
				jq('#proopc-system-message').html(msg_html);
				jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
				return false;				
			}					
			if(ProOPCVars.VMCONFIGTOS) {
				if(jq('#tosAccepted').is(':checked') == false) {
					var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+Joomla.JText._('COM_VIRTUEMART_CART_PLEASE_ACCEPT_TOS')+'</div>';
					jq('#proopc-system-message').html(msg_html);
					jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
					return false;
				}
			}	
			// All fields verified. Now save the addresses
			var BTformData = [];
			jq('#EditBTAddres input, #EditBTAddres select').each(function(){
				var BT_field_name = jq(this).attr('name');
				var BT_field_value = jq(this).val();
				BTformData.push(BT_field_name+'='+BT_field_value);
			});
			var BT_formSubmit = BTformData.join('&');
			var checkoutFormData = jq('#checkoutForm').serialize();
			var tokenName = jq('#formToken input').attr('name');
			var tokenValue = jq('#formToken input').val();
			var dataSubmit = '&'+checkoutFormData+'&'+'option=com_virtuemart&task=saveUser&controller=user&ctask=savebtaddress&'+tokenName+'='+tokenValue;
			jq.ajax({
				beforeSend: function() {
					// Load Page Spinner
					ProOPC.addpageloader();
					jq('#proopc-page-spinner').after('<div id="proopc-order-process"></div>');				
					jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_SAVING_BILLING_ADDRESS'));
				},
				type: "POST",
				url: ProOPCVars.URI,
				data: BT_formSubmit + dataSubmit, // serializes the form's elements.
				success: function(data) {
					jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_BILLING_ADDRESS_SAVED'));
					// Save ST Address
					if(jq('#STsameAsBT').is(':checked') == false) {
						var ST_formData = [];
						jq('#EditSTAddres input, #EditSTAddres select').each(function(){
							var ST_field_name = jq(this).attr('name');
							var ST_field_value = jq(this).val();
							ST_formData.push(ST_field_name+'='+ST_field_value);
						});
						var ST_formSubmit = ST_formData.join('&');
						var tokenName = jq('#formToken input').attr('name');
						var tokenValue = jq('#formToken input').val();			
						var dataSubmit = '&option=com_virtuemart&task=saveUser&controller=user&ctask=savestaddress&'+tokenName+'='+tokenValue;
						jq.ajax({
							beforeSend: function() {
								jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_SAVING_SHIPPING_ADDRESS'));
							},							
							type: "POST",
							url: ProOPCVars.URI,
							data: ST_formSubmit + dataSubmit, // serializes the form's elements.
							success: function(data) {
								jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_SHIPPING_ADDRESS_SAVED'));
								// If authorizenet save CC data 
								if(jq('#proopc-payments input[name="virtuemart_paymentmethod_id"]:checked').attr('rel') == 'authorizenet') {
									var authorizenetID = jq('#proopc-payments input[name="virtuemart_paymentmethod_id"]:checked').val();
									if(ProOPC.saveCCdata(authorizenetID) == false) {
										return false;
									}
								}										
								ProOPC.verifyCheckout();
							}
						});					
					}	
					else {
						// If authorizenet save CC data 
						if(jq('#proopc-payments input[name="virtuemart_paymentmethod_id"]:checked').attr('rel') == 'authorizenet') {
							var authorizenetID = jq('#proopc-payments input[name="virtuemart_paymentmethod_id"]:checked').val();
							ProOPC.saveCCdata(authorizenetID)
						}	else {
							ProOPC.verifyCheckout();	
						}								
												
					}															 
				}
			});					
			return false;		
		},
		saveCCdata: function(authorizenetID) {			
			var cc_type = 'cc_type_'+authorizenetID+'='+jq('#cc_type_'+authorizenetID).val();
			if(jq('#cc_name_'+authorizenetID).length > 0) {
				var cc_name = 'cc_name_'+authorizenetID+'='+jq('#cc_name_'+authorizenetID).val();
			} else {
				var cc_name = '';
			}			
			var cc_number = 'cc_number_'+authorizenetID+'='+jq('#cc_number_'+authorizenetID).val();
			var cc_cvv = 'cc_cvv_'+authorizenetID+'='+jq('#cc_cvv_'+authorizenetID).val();
			var cc_expire_month = 'cc_expire_month_'+authorizenetID+'='+jq('#cc_expire_month_'+authorizenetID).val();
			var cc_expire_year = 'cc_expire_year_'+authorizenetID+'='+jq('#cc_expire_year_'+authorizenetID).val();
			var cc_data = '&'+cc_type+'&'+cc_name+'&'+cc_number+'&'+cc_cvv+'&'+cc_expire_month+'&'+cc_expire_year;			
			jq.ajax({
				beforeSend: function() {
					jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_SAVING_CREDIT_CARD'));
				},
				dataType: 'json',
				url: ProOPCVars.URI,
				data: 'ctask=setpayment&savecc=1&virtuemart_paymentmethod_id='+authorizenetID+cc_data,
				cache: false,
				success: function(data) {
					if(data.error !== 0) {
						alert(data.msg);
						return false;
					} else {
						jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_CREDIT_CARD_SAVED'));
						ProOPC.verifyCheckout();	
						return true;
					}				
				}
			});				
		},
		verifyCheckout: function() {
			jq.ajax({
				beforeSend: function() {
					jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_VERIFYING_ORDER'));
				},							
				type: "POST",
				url: ProOPCVars.URI,
				data: 'ctask=verifycheckout',
				success: function(data) {
					if(data.error == 0) {
						jq('#proopc-order-process').text(Joomla.JText._('PLG_VPONEPAGECHECKOUT_PLACING_ORDER'));
						jq('#checkoutForm').submit();
					} else {
						ProOPC.removepageloader();
						var msg_html = '<div class="proopc-alert proopc-error-msg"><button type="button" class="close" onclick="ProOPC.close(this);">×</button>'+data.msg+'</div>';
						jq('#proopc-system-message').html(msg_html);
						jq('html,body').animate({scrollTop: jq('#proopc-system-message').offset().top-100}, 500);
						return false;						
					}
				}
			});					
		}
	}
	
	jq.xhrPool = [];
	jq.xhrPool.abortAll = function() {
		jq(this).each(function(idx, jqXHR) {
			jqXHR.abort();
		});
    	jq.xhrPool.length = 0	
	};	
	jq.emailPool = [];
	jq.emailPool.abortAll = function() {
		jq(this).each(function(idx, jqXHR) {
			jqXHR.abort();
		});
    	jq.emailPool.length = 0	
	};
	jq.userPool = [];
	jq.userPool.abortAll = function() {
		jq(this).each(function(idx, jqXHR) {
			jqXHR.abort();
		});
    	jq.userPool.length = 0	
	};				
	jq(document).ready(function() {
		ProOPC.spinnervars();
		ProOPC.verifyRegForm();
		ProOPC.tooltip();		
		ProOPC.inputwidth();
		ProOPC.selectwidth();
		ProOPC.defaultSP();
		//ProOPC.setst(jq('#STsameAsBT')[0]);			
	});	
	jq(document).ajaxStop(function() {	
		ProOPC.productdetails();
	});
	jq(window).load(function () { 
		ProOPC.style();		
	});
	jq(window).resize(function(){
		ProOPC.style();
		ProOPC.inputwidth();	
		ProOPC.selectwidth();	
	});
}