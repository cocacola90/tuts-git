<div class="page-header">
    <h1>Contact</h1>
</div><!-- /.page-header -->
<?php echo $this->Form->create('Contact',array('inputDefaults' => array('div' => false,'label' => false)));?>
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
		<th>
			<label class="pos-rel">
				<input type="checkbox" class="ace" id="checkAll">
				<span class="lbl"></span>
			</label>
		</th>
        <th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
        <th><?php echo $this->Paginator->sort('full_name','Người gửi'); ?></th>
        <th style="width:10%;"><?php echo $this->Paginator->sort('email','Email'); ?></th>
        <th><?php echo $this->Paginator->sort('subject','Tiêu đề'); ?></th>
        <th><?php echo $this->Paginator->sort('content', 'Nội dung'); ?></th>
        <th><?php echo $this->Paginator->sort('status','Trạng thái'); ?></th>
        <th>
            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
            <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
        </th>

        <th>Tác vụ</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($contacts as $contact): ?>
        <tr>
			<td>
				<label class="pos-rel">
					<input type="checkbox" name="data[Contact][cid][]" class="ace" value="<?php echo $contact['Contact']['id'];?>">
					<span class="lbl"></span>
				</label>
				</td>
            <td>
                <?php echo h($contact['Contact']['id']); ?>
            </td>
            <td>
                <?php echo h($contact['Contact']['full_name']); ?>
            </td>
			<td>
                <?php echo h($contact['Contact']['email']); ?>
            </td>
			<td>
                <?php echo $this->Tool->substr($contact['Contact']['subject'],0,200); ?>
            </td>
			<td>
                <?php echo $this->Tool->substr($contact['Contact']['content'],0,200); ?>
            </td>
            <td>
                <?php
					$status = GlobalVar::read('contact_status');
					foreach($status as $k => $v)
					{
						if($k == $contact['Contact']['status'])
						{
							echo $v;
						}
					}
                    
                ;?>
            </td>
            <td class="hidden-480"><?php echo date('d/m/Y H:i', $contact['Contact']['created']); ?></td>
            <td>
                <div class="hidden-sm hidden-xs btn-group">
				<?php if($contact['Contact']['user_id'] != ""):?>
					<?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('controller' => 'answers','action' => 'add_answer', $contact['Contact']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Trả lời qua Inbox')); ?>
                <?php endif;?>
					<?php echo $this->Html->link('<i class="ace-icon fa fa-envelope-o bigger-120"></i>', array('action' => 'edit', $contact['Contact']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-warning', 'title' => 'Trả lời qua Email')); ?>
                    <?php echo $this->Html->link('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete', $contact['Contact']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>

                </div>
                <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <?php if($contact['Contact']['user_id'] != ""):?>
							<li>
								<?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('controller' => 'answers','action' => 'add_answer', $contact['Contact']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Trả lời qua Inbox')); ?>
                            </li>
							<?php endif;?>
							<li> 
								<?php echo $this->Html->link('<i class="ace-icon fa fa-envelope-o bigger-120"></i>', array('action' => 'edit', $contact['Contact']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-warning', 'title' => 'Trả lời qua Email')); ?>
							</li>
                            <li>
                                <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$contact['Contact']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->element('admin/paginator'); ?>
<div class="col-xs-12 col-sm-12">
	<div class="col-xs-4 col-sm-4">
		
		<?php $contact_status = GlobalVar::read('contact_status');?>
		<?php echo $this->Form->input('status',array('class' => 'form-control search-query','type' => 'select','options' => $contact_status,'empty' => '-- Chọn thiết lập trạng thái -- '))?>
	</div>
	<div class="col-xs-4 col-sm-4"> 
		<span class="input-group-btn">
			<button type="input" class="btn btn-purple btn-sm">
				<span class="ace-icon fa fa-cog icon-on-right bigger-110"></span>
				Thiết lập
			</button>
		</span>
	</div>
</div>

<?php echo $this->Form->end();?>
