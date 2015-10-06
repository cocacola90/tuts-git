<fieldset>
	<legend>Tìm kiếm</legend>
	<?php echo $this->Form->create('Order', array('novalidate' => true,'url'=>'get_keyword','class'=>'form-horizontal')); ?>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Mã đơn hàng</label>
		<?php echo $this->Form->input('order_number',array('novalidate' => true,'type'=>'text','class'=>'col-xs-10 col-sm-5','label'=>false)); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Mã tracking</label>
                <?php echo $this->Form->input('code_vnpost',array('novalidate' => true,'type'=>'text','label'=>FALSE,'class'=>'col-xs-10 col-sm-5')); ?>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label class="col-sm-4">Loại shipping</label>
				<?php $ship_type = GlobalVar::read('ship_type');?>
                <?php echo $this->Form->input('ship_type',array('novalidate' => true,'type'=>'select','label'=>FALSE,'options'=>$ship_type,'class'=>'col-xs-10 col-sm-5','empty' => 'Chọn loại ship')); ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4 ">
            <div class="form-group">
                <label class="col-sm-4">Nhập từ ngày</label>
		<?php echo $this->Form->input('fromdate',array('id' =>'id-date-picker-1','type'=>'text','data-date-format'=>'mm/dd/yyyy','label'=>FALSE,'class'=>'col-xs-10 col-sm-5 date-picker-start')); ?>
            </div>
        </div>
        <div class="col-xs-4 ">
            <div class="form-group">
                <label class="col-sm-4">Nhập đến ngày</label>
		<?php echo $this->Form->input('todate',array('id' =>'id-date-picker-2','type'=>'text','data-date-format'=>'mm/dd/yyyy','label'=>false,'class'=>'col-xs-10 col-sm-5 date-picker-end')); ?>
            </div>
        </div>
        <div class="clearfix"></div>
	<div class="div_search center">
		<?php echo $this->Form->button('Tìm kiếm',array('class'=>'btn btn-info'));?>
	</div>

		<?php echo $this->Form->end();?>
	
</fieldset>
	

<div class="page-header">
    <h1>Danh sách đơn hàng</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
			<th><?php echo $this->Paginator->sort('order_number','Order Number'); ?></th>
			<th><?php echo $this->Paginator->sort('full_name'); ?></th>
			<th><?php echo $this->Paginator->sort('code_vnpost','Shipping code'); ?></th>	
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('ship_type'); ?></th>
			<th><?php echo $this->Paginator->sort('shipping_cost'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pay_status'); ?></th>
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
            <th>Tác vụ</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($orders as $order): ?>

            <tr>
				<td><?php echo h($order['Order']['order_number']); ?>&nbsp;</td>
				<td><?php echo h($order['Order']['first_name'] . ' ' . $order['Order']['middle_name'] .' '. $order['Order']['last_name']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($order['Order']['code_vnpost'],'http://www.vnpost.vn/TrackandTrace/tabid/130/n/'.$order['Order']['code_vnpost'].'/t/0/s/1/Default.aspx',array('target' => '_blank','class'=>'label label-success')); ?>&nbsp;</td>
				<td><?php echo h($order['Order']['address']. ' ' . $order['Order']['state'] .' '. $order['Order']['city'].' '. $order['Order']['country']); ?>&nbsp;</td>
                <td>
                    <?php
                        $ship_type = GlobalVar::read('ship_type');
                        foreach($ship_type as $k => $val)
                        {
                            if($k == $order['Order']['ship_type'])
                            {
                                echo $val;
                            }
                        }
                    ?>
                </td>
                <td><?php echo $this->Tool->number_format($order['Order']['shipping_cost']);?>&nbsp; <?php echo $order['Order']['currency']?></td>
				<td><?php echo $this->Tool->number_format($order['Order']['total']);?>&nbsp; <?php echo $order['Order']['currency']?></td>
				<td><?php echo $order['Order']['transaction_id'];?></td>
				<td><span class="label label-info"><?php echo $order['Order']['pay_status'];?></span></td>
				<td><?php echo date('d-m-Y H:i:s',$order['Order']['created']); ?>&nbsp;</td>
                <td>
                    <?php
                        $order_status = GlobalVar::read('order_status');
                        foreach($order_status as $k => $val)
                    {
                    if($k == $order['Order']['status'])
                    {
                        if($k == 1)
                        {
                            echo '<span class="label label-success">'.$val.'</span>';
                        }
                        else
                        {
                             echo '<span class="label label-danger">'.$val.'</span>';
                        }
                    }
                    }
                    ?>
                </td>

                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>', array('action' => 'order_detail',$order['Order']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-info', 'title' => 'Sửa thông tin')); ?>
						  <?php echo $this->Html->link('<i class="ace-icon fa fa-inbox bigger-120"></i>', array('controller' => 'contacts','action' => 'send_to_inbox', $order['Order']['id'],'admin' => true), array('escape' => false, 'class' => 'btn btn-xs btn-warning', 'title' => 'Gửi tin qua Inbox')); ?>
                        <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$order['Order']['id']), array('escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => 'Xóa bản ghi'), __('Are you sure you want to delete # %s?',$order['Order']['id'])); ?>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <?php echo $this->Html->link('<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span>', array('action' => 'order_detail',$order['Order']['id']), array('escape' => false, 'class' => 'tooltip-success', 'data-rel' => 'tooltip', 'title' => 'Sửa thông tin')); ?>
                                </li>
								<li> 
									<?php echo $this->Html->link('<i class="ace-icon fa fa-inbox bigger-120"></i>', array('controller' => 'contacts','action' => 'send_to_inbox', $order['Order']['id'],'admin' => true), array('escape' => false, 'class' => 'btn btn-xs btn-warning', 'title' => 'Gửi tin qua inbox')); ?>
								</li>
                                <li>
                                     <?php echo $this->Form->postLink('<i class="ace-icon fa fa-trash-o bigger-120"></i>', array('action' => 'delete',$order['Order']['id']), array('escape' => false, 'class' => 'tooltip-error', 'title' => 'Xóa bản ghi', 'data-rel' => 'tooltip'), __('Are you sure you want to delete # %s?',$order['Order']['id'])); ?>
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
