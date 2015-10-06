<div class="banner-breadcrumb">
    <div class="container">
        <div class="inner-wrap">
            <div class="pathway row-fluid">
                <ul class="breadcrumb span12">
                    <li><a href="/" class="pathway">Home</a></li>
                    <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif"
                                               class="breadcrumbs-separator" alt="separator"/></span>
                    <li class="active">Inbox</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-wrap">
    <div id="main-site" class="container">
        <div class="inner-wrap">
            <div class="row-fluid">

                <!--- content-->
                <div class="span12 main-column">
					
                    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
                    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                    <script>
                        $(function () {
                            $("#codopm_tabs").tabs();
                        });
                    </script>


                    <div id="codopm_tabs" class="codopm_tabs">
                        <ul>
							<li class="active"><a href="#codopm_tab-1" id="codopm_inbox_a">Inbox</a></li>
                            <li class=""><a id="codopm_compose_a" href="#codopm_tab-2">Compose</a></li>
                        </ul>
                        <div id="codopm_tabs" class="codopm_tabs">
                            <div class="codopm_tab_content">
								<div class="codopm_tabs_divs" id="codopm_tab-1" style="display: block;">
									<div id="codopm_inbox" class="codopm_inbox">
										<?php if (isset($data_quest)): ?>
											<?php //pr($data_quest);?>
											<?php foreach ($data_quest as $ask): ?>
												<div class="codopm_inbox_msg codopm_inbox_msg_read">
													<div
														class="codopm_inbox_from_name"><?php echo $ask['User']['firstname']; ?></div>
													<div
														class="codopm_inbox_content"><?php echo $ask['Contact']['subject']; ?></div>
													<div
														class="codopm_inbox_time"><?php echo date('m/d/Y H:i', $ask['Contact']['created']); ?></div>
													<div class="codopm_inbox_edit">
														<?php 
														$check_new_inbox = $this->requestAction('/contacts/check_new_inbox/'.$ask['Contact']['id'].'/'.$ask['User']['id']);
														if($check_new_inbox)
														{
															echo '<i class="icon-new"></i>';
														}
														?>
														<!--<i class="icon-new"></i>-->
													<a href="/contacts/view_ask/<?php echo $ask['Contact']['id']; ?>" class="btn btn-primary">view</a>
													</div>
												</div>
											<?php endforeach; ?>
											<?php
												if($this->Paginator->hasPage(2)){
												$this->Paginator->options(array(
												'url' => array(
												'controller' => 'contacts',
													'action' => 'list_ask',
													'sort' => 'created', 'direction' => 'desc'

												)
												));
												echo $this->element('pagination');
												};?>
										<?php endif; ?>
									</div>
								</div>
                                <div class="codopm_tabs_divs" id="codopm_tab-2" style="">

                                    <div class="codopm_compose">
									<?php 
										if(isset($user_info)){
											$full_name = $user_info['firstname'] . ' ' . $user_info['lastname'];
											$email = $user_info['email'];
											$user_id = $user_info['id'];
											
										}
										else
										{
											$full_name = "";
											$email = "";
											$user_id = "";
										
										}
									?>
									
                                    <?php echo $this->Form->create('Contact',array('action' => 'compose','id'=>'formID', 'class'=>'cmxform','type'=>'file','inputDefaults' => array('div'=>false,'label'=>false)));?>
										<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$user_id));?>
										<fieldset>
										<legend>Compose</legend>
										<ul>
											<li>
												<label for="name">Your Full Name<em> *</em></label>
												<?php echo $this->Form->input('full_name',array('class'=>'validate[required]','id'=>'iname','size' => '40','maxlength' => '50','value' => $full_name));?>
											   
											</li>
											<li>
												<label for="name">Email Address<em> *</em></label>
												<?php echo $this->Form->input('email',array('class'=>'validate[required,custom[email]]','id'=>'iemail','size' => '40','maxlength' => '50','value' => $email));?>
											</li>
											
											<li>
												<label for="iaddress">Subject</label>
												<?php echo $this->Form->input('subject',array('id'=>'subject','size' => '40','maxlength' => '100'));?>
											</li>
											<li>
												<label for="image">Image Error ('jpg', 'png', 'jpeg','pjpeg','PNG')</label>
												<?php echo $this->Form->input('error_img', array('id' => 'iimage','type'=>'file','class'=>'validate[required]')); ?>
											</li>

											<li>
												<label for="imessage">Message<em> *</em></label>
												<?php echo $this->Form->textarea('content',array('class'=>'validate[required]','id'=>'imessage','cols' => '40','rows' => '4'));?>
											</li>
											<?php echo $this->Form->input('Submit',array('class'=>'btn btn-primary','type' =>'submit'));?>
											
										</ul>
									</fieldset>
									<?php echo $this->Form->end();?>
                                    </div>


                                </div>
                            </div>
                            
                        </div>

                    </div>

                </div>
                <!-- end content-->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
#codopm_tabs {
    font-size: 90%;
    margin: 20px 0;
    border: 1px solid #ccc;
    padding: 8px;
    border-radius: 2px;
    background: #fff;
}

#codopm_tabs a:active {
    background: #eee;
}

#codopm_tabs textarea {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 18px;
    margin-bottom: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;

    display: inline-block;
    padding: 4px 6px;
    font-size: 13px;
    line-height: 18px;
    color: #555;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    vertical-align: middle;
    max-width: 100%;

}

#codopm_tabs input {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 28px;
    /* border: 1px solid #ccc; */
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;

    display: inline-block;
    height: 28px;
    padding: 0 6px;
    margin-bottom: 9px;
    font-size: 13px;
    line-height: 18px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    vertical-align: middle;

}

#codopm_tabs textarea:focus {
    border-color: rgba(82, 168, 236, 0.8);
    outline: 0;
    outline: thin dotted 9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
}

#codopm_tabs input:focus {

    border-color: rgba(82, 168, 236, 0.8);
    outline: 0;
    outline: thin dotted 9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(82, 168, 236, .6);
}

#codopm_tabs label {

    color: #222;
    display: block;
    font-size: 13px;
    font-weight: normal;
    line-height: 18px;
}

#codopm_tabs ul {
    float: left;
    background: #fff;
    width: 22%;
    padding-top: 4px !important;
    margin-bottom: 0px !important;
    margin-left: 0px !important;
    padding-left: 0px !important;
    margin-top: 0 !important;
}

#codopm_tabs li {

    border-top: 2px white solid;
    margin-right: 8px !important;
    list-style: none;
    color: #333;

}

#codopm_tabs li {
    display: inline;
}

#codopm_tabs li, #codopm_tabs li a {
    float: left;
}

#codopm_tabs li a:hover {
    background: #efefef;
    color: #333 !important;
}

#codopm_tabs a:hover li {

    border-color: #ccc;
}

#codopm_tabs ul li.active {
    border-color: #ddd;
    background: #efefef;
    color: #333 !important;
    outline: none;
}

#codopm_tabs ul li.active a {
    color: #333 !important;
    background: #efefef;
    outline: none;
}

#codopm_tabs div {
    clear: both;
}

#codopm_tabs ul li a {
    text-decoration: none;
    padding: 8px;
    color: #000;
    font-weight: bold;
    outline: none;
}

.codopm_inbox {

    margin-top: 2px;
    cursor: pointer;
}

.codopm_inbox_msg:first-child {

    border-top: 1px solid #ccc;
}

.codopm_inbox_msg {

    background: whitesmoke;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.codopm_inbox_msg > div {

    display: inline-block;
}

.codopm_inbox_from_name {

    text-align: left;
    width: 20%;
}

.codopm_inbox_content {

    width: 45%;
}

.codopm_inbox_content br {
    display: none;
}

.codopm_inbox_time {

    text-align: right;
    width: 20%;
}

.codopm_inbox_edit {
    text-align: right;
    width: 10%;
}

.codopm_reply_box > form {

    margin: 0 !important;
}

.codopm_reply_area > textarea {

    border: 0 !important;
    width: 98.5%;
    height: 20px;
    margin-bottom: -1px;
    border-radius: 0;
    resize: vertical;
    overflow: hidden;

    box-sizing: border-box;
    width: 100%;
    margin: 0px;
}

.codopm_reply_area > textarea:focus {

    box-shadow: none /*1px 1px 1px #eee*/ !important;
    border: 0 /*1px solid #ccc*/ !important;
    overflow: auto !important;
    resize: vertical;
    max-height: 300px !important;
}

.codopm_tabs i {

    font-size: 1.2em;
    line-height: 18px;
    background-position: center;

}

.codopm_refresh > span {

    display: inline-block;
    width: 16px;
    height: 16px;
    vertical-align: middle;
}

.codopm_navigator_navigate > span {
    display: inline-block;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    margin: 0 8px;
}

#codopm_compose_attach > span {
    display: inline-block;
}

#codopm_reply_attachments > input {

    width: 67px !important;
    position: absolute;
    left: 71px;
    top: 8px;
    height: 19px !important;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    opacity: 0;
    cursor: pointer;
}

#codopm_compose_attachments > input {

    width: 92px !important;
    position: absolute;
    left: 0px;
    top: -33px;
    height: 23px !important;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    opacity: 0;
    cursor: pointer;
}

.codopm_tab_content {
    border-top: 1px solid #ccc;
}

#codopm_inbox {
    color: #555555 !important;
    font-size: 12px;
}

.codopm_inbox_attachment:hover > img {

    border-color: #08c;
}

.codopm_inbox_attachment img {
    float: left;
    border: 1px solid white;
    background: #fff;
    width: 270px;
    height: 200px;
    box-shadow: 1px 2px 2px #ccc;

}

.codopm_inbox_attachment_file a {
    color: #3b5998;
    cursor: pointer;
    text-decoration: none;
    background: inherit;
}

.codopm_inbox_attachment_file a:hover {

    text-decoration: underline;
    background: inherit !important;
    color: #3b5998 !important;
}

.codopm_inbox_attachment_file:hover > a {
    text-decoration: underline;
    background: inherit !important;
    color: #3b5998 !important;
}

.codopm_autocomplete .ui-menu .ui-menu-item a:hover {

    background: #3794db;
    border-bottom: 1px solid #1f71af;
    color: white;
}

</style>
