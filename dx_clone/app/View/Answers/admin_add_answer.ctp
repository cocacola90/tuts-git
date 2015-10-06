<div class="page-header">
    <h1>Trả lời câu hỏi</h1>
</div><!-- /.page-header -->
<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#info_contack">Nội dung câu hỏi</a>
		</li>

		<li>
			<a data-toggle="tab" href="#ans_contack">Trả lời</a>
		</li>

	</ul>
	<div class="tab-content">
		<div id="info_contack" class="tab-pane in active">
			<div class="">
			<div class="timeline-container">
				<div class="timeline-items">
					<div class="timeline-item clearfix">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small">
								<h5 class="widget-title smaller"><?php echo $data_quest['Contact']['subject'];?></h5>

								<span class="widget-toolbar no-border">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									<?php echo date('d/m/Y', $data_quest['Contact']['created']); ?>
								</span>

								<span class="widget-toolbar">
									<a href="#" data-action="reload">
										<i class="ace-icon fa fa-refresh"></i>
									</a>

									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>
								</span>
							</div>

							<div class="widget-body">
								<div class="widget-main">
										<?php echo $data_quest['Contact']['content'];?>
										<?php if(!empty($data_quest['Contact']['error_img'])):?>
											<div class="block_ans_img">
												<img alt="" src="<?php echo DOMAIN_ROOT ;?>/timthumb.php?src=<?php echo $data_quest['Contact']['error_img'];?>&w=500&h=260">
											</div>
										<?php endif;?>
									<div class="space-6">
										
									</div>

									<div class="widget-toolbox clearfix">
										<div class="pull-right action-buttons">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if(isset($data_answer)):?>
					<?php foreach($data_answer as $answer):?>
					<div class="timeline-item clearfix">
					
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small">
								<h5 class="widget-title smaller">
									<?php if($answer['Answer']['staff_id'] !=  0):?>
										<a href="#" class="blue">Admin</a>
									<?php else:?>
										<a href="#" class="blue"><?php echo $answer['User']['firstname']?></a>
									<?php endif;?>
									
									<span class="grey"></span>
								</h5>

								<span class="widget-toolbar no-border">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									<?php echo date('d-m-Y' , $data_quest['Contact']['created']); ?>
								</span>

								<span class="widget-toolbar">
									<a href="#" data-action="reload">
										<i class="ace-icon fa fa-refresh"></i>
									</a>

									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>
								</span>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<?php echo $answer['Answer']['answer'];?>
									<div class="space-6"></div>

									<div class="widget-toolbox clearfix">
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php 
						endforeach;
						endif;
					?>
					<?php if($data_quest['Contact']['status'] == 1):?>
					<div class="timeline-item clearfix">
						<div class="widget-box transparent">
							<div class="widget-body">
								<div class="widget-main">
									<span style="color: red;">Customer closed questions</span>
								</div>
							</div>
						</div>
					</div>
					<?php endif;?>
				</div><!-- /.timeline-items -->
			</div>
			</div>
		</div>
		<div id="ans_contack" class="tab-pane">
			<?php echo $this->Form->create('Answer', array('role' => 'form', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Tiêu đề câu hỏi:</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('subject', array('class' => 'col-xs-10 col-sm-10','readonly'=>true, 'value'=>$data_quest['Contact']['subject'])); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Nội dung câu hỏi:</label>
				<div class="col-sm-10">
					<?php echo $data_quest['Contact']['content'];?>
					
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Trả lời:</label>
				<div class="col-sm-8">
					<?php echo $this->Form->textarea('answer', array('class' => 'ckeditor col-xs-8 col-sm-8')); ?>
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
					   Gửi câu trả lời
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Nhập lại
					</button>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

