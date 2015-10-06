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
                    <li class="active">Your account details</li>
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
                    <h1 class="user-page-title">Your account details</h1>
                    <section class="vm-login-panel">
                        Hello <b><?php echo $userInfo['User']['firstname'];?></b>  <a href="/logout">[Logout]</a>
                    </section>
                    <fieldset>
                        <div class="all_info">
                           
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center" style="margin-bottom: 10px;">
                                    <?php if(!empty($userInfo['User']['avatar'])):?>
										<img src="<?php echo DOMAIN_ROOT ;?>/timthumb.php?src=<?php echo $userInfo['User']['avatar'];?>&w=100" alt="no-avarta"  class="img-responsive"/>
									<?php else:?>
										<?php echo $this->Html->image('avatar.jpg',array('width'=>'100','height'=>'100','class'=>'img-responsive'));?>	
									<?php endif;?>
                                </div>
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="adminForm user-details">
                                        <tbody>
                                        <tr>
                                            <td>Fullname:</td>
                                            <td><?php echo $userInfo['User']['firstname'] . ' ' . $userInfo['User']['lastname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hire date:</td>
                                            <td><?php echo date('m/d/Y', $userInfo['User']['created']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td><?php echo date('m/d/Y', $userInfo['User']['birthdate']); ?></td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php if ($userInfo['User']['sex'] == 1) echo 'female'; else echo 'Male'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address1</td>
                                            <td><?php echo $userInfo['User']['address']; ?></td>
                                        </tr>
										 <tr>
                                            <td> Address2</td>
                                            <td><?php echo $userInfo['User']['address2']; ?></td>
                                        </tr>
										<tr>
                                            <td>City</td>
                                            <td><?php echo $userInfo['User']['city']; ?></td>
                                        </tr>
										<tr>
                                            <td>Zip / Postal Code </td>
                                            <td><?php echo $userInfo['User']['zip_code']; ?></td>
                                        </tr>
										<tr>
                                            <td>Country </td>
                                            <td><?php echo $userInfo['User']['country']; ?></td>
                                        </tr>
										<tr>
                                            <td>State / Province / Region </td>
                                            <td><?php echo $userInfo['User']['state']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com"><?php echo $userInfo['User']['email']; ?></a>
                                            </td>
                                        </tr>
										<tr>
											<td>Phone Number</td>
											<td><?php echo $userInfo['User']['phonenumber']; ?></td>
                                        </tr>
										<tr> 
											<td></td>
											<td> 
												 <a href="/edit-profile" class="btn btn-primary">Edit Profile</a>
											</td>
										</tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </fieldset>
                </div>
            </div>
        </div>

    </div>
</div>
<script language="javascript">
    function myValidator(f, t) {
        f.task.value = t; //this is a method to set the task of the form on the fTask.
        if (document.formvalidator.isValid(f)) {
            f.submit();
            return true;
        } else {
            var msg = 'Required field is missing';
            alert(msg + ' ');
        }
        return false;
    }

    function callValidatorForRegister(f) {

        var elem = jQuery('#username_field');
        elem.attr('class', "required");

        var elem = jQuery('#name_field');
        elem.attr('class', "required");

        var elem = jQuery('#password_field');
        elem.attr('class', "required");

        var elem = jQuery('#password2_field');
        elem.attr('class', "required");

        var elem = jQuery('#userForm');

        return myValidator(f, 'registercheckoutuser');

    }


</script>
