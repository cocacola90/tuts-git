<div class="banner-breadcrumb">		
    <div class="container">
    	<div class="inner-wrap">						
            <div class="pathway row-fluid">
            <ul class="breadcrumb span12">
                <li><a href="/" class="pathway">Home</a></li>
                <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"/></span>
				<li><a href="/contacts/list_ask" class="pathway">Inbox</a></li>
                <span class="divider"><img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator"/></span>
                <li class="active"><?php echo $data_quest['Contact']['subject'];?></li>
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
	
	<div class="support_ans"> 
		<div class="hidden-xs col-sm-12 col-md-8 col-lg-8">
			<h2 class="title-header">Customer care System</h2>
			<section id="info">
				<div class="cont_ans">
			<div class="support_info">
				<div class="fleft">
					<b>Created:</b> <span class="date_ans"><?php echo date('d/m/Y', $data_quest['Contact']['created']); ?></span>
				</div>

				<div class="num_comm fright">
					<?php echo $count_answer;?> Comment
				</div>

				<div class="clearfix"></div>

				<div class="block_ans">
					Contents: <p><?php echo $data_quest['Contact']['content'];?></p>
				</div>
				<?php if(!empty($data_quest['Contact']['error_img'])):?>
					<div class="block_ans_img">
						<a title="<?php echo $data_quest['Contact']['subject'];?>" href="<?php echo $data_quest['Contact']['error_img'];?>" rel="prettyPhoto">
							<img class="img-polaroid" alt="<?php echo $data_quest['Contact']['subject'];?>" src="<?php echo $data_quest['Contact']['error_img'];?>" width="80" height="80">
						</a>
					</div>
					
				<?php endif;?>
			</div>
		<?php if(isset($data_answer)):?>
		<?php foreach($data_answer as $answer):?>
			
		<?php if($answer['Answer']['staff_id'] !=  0):?>
			<div class="comment-supporter">
		<?php else:?>
			<div class="comment-user">
		<?php endif;?>
			
				<div class="message m-t-medium">
					<div class="info-icon fleft"></div>

					<div class="info-comment fright">
						<span class="name">
							<?php if($answer['Answer']['staff_id'] !=  0):?>
							<b>Admin</b>
							<?php else:?>
							<b><?php echo $answer['User']['firstname']?></b>
							<?php endif;?>
						</span>
					
						<span class="date">by <?php echo date('d-m-Y' , $data_quest['Contact']['created']); ?></span>
					</div>

					<div class="clearfix"></div>

					<div class="info-comment-content">
						<?php echo $answer['Answer']['answer'];?>
					</div>

					<div class="text-right"></div>
				</div>
			</div>
			
		
			<?php endforeach;?>
			<?php endif;?>
			<div class="clearfix"></div>
			<?php if($data_quest['Contact']['status'] != 1):?>
			<?php echo $this->Form->create('Answer');?>

				<div class="form-group">

					<?php echo $this->Form->textarea('answer',array('class'=>'ckeditor form-control','label'=>false,'rows'=> '5','cols'=>'50','id' =>'jform_contact_message',"style"=>"margin: 0px 0px 10px; height: 136px; width: 534px;"));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Send',array('class'=>'btn btn-primary','label'=>false,'type'=>'submit'))?>
					
				</div>
			<?php echo $this->Form->end();?>
			
			<a href="/contacts/list_ask"><i class="icon-back"></i>Back to : Inbox</a> <br />
			<?php echo $this->Form->postLink('<i class="icon-close"></i> Close questions',array('conditions' => 'contacts','action'=>'close_quest',$data_quest['Contact']['id']),array('escape' => false));?>
			
			<?php else:?>
			<div class="closed-2">
				<h1>Customer closed questions</h1>
				<div class="reason">You've closed this question. If you still need support, please submit a new question.</div>
			</div>
			<?php endif;?>
			</div>
			</section>
		</div>
	</div>
	
</div>
<!-- end content-->
</div>
</div>
</div>
</div>

<script type="text/javascript"> 
	$window = $(window);
	$(document).ready(function(){
		$window.on('scroll', function (eS){
			var quest_id = "<?php echo $data_quest['Contact']['id']; ?>";
			$.ajax({
				url: '/answers/update_status',
				type: 'POST',
                data: {quest_id: quest_id, },
                success: function(data){
					console.log(data);
					if(data == 0)
					{
						$(".minicart_item_count_mss").css("display","none");
					}
					else
					{
						$('.num_mss').text(data);
					}
				},
				timeout: 3000 
			});
			
		});
	});
</script>
