<?php echo $this->Form->create('Parcel',array('inputDefaults' => array('div' => false,'label' => false)));?>
<div id="content" class="col-lg-12 col-sm-12">
    <!-- content starts -->
    <?php echo $this->Session->flash(); ?>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    <a href="/admin/parcel/add" class="btn btn-success" style="margin-bottom: 10px;float:right;"><i class="glyphicon glyphicon-pencil icon-white"></i> Thêm Mới</a>
                    <div class="clearfix"></div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
								<th>
									<label class="pos-rel">
										<input type="checkbox" class="ace" id="checkAll">
										<span class="lbl"></span>
									</label>
								</th>	
                                <th>ID</th>
                                <th>Mã nước</th>
                                <th>Tên nước</th>
                                <th>Giá cước 500gr đầu</th>
                                <th>Giá cước 500gr tiếp theo</th>
								<th>Trạng thái</th>
								<th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($dhl)): ?>
                                <?php foreach ($dhl as $item): ?>
                                    <tr>
										<td>
											<label class="pos-rel">
												<input type="checkbox" name="data[Parcel][cid][]" class="ace" value="<?php echo $item['Parcel']['id'];?>">
												<span class="lbl"></span>
											</label>
										</td>
                                        <td><?php echo $item['Parcel']['id'] ;?></td>
                                        <td><?php echo $item['Parcel']['code'] ;?></td>
                                        <td><?php echo $item['Parcel']['country'] ;?></td>
                                        
										<td><?php echo number_format("{$item['Parcel']['first_weight']}");?></td>
										<td><?php echo number_format("{$item['Parcel']['next_weight']}");?></td>
										<!--<td><?php echo number_format("{$item['Parcel']['next_weight']}",0,",",".");?></td>-->
                                        <td class="center">
                                            <?php if ($item['Parcel']['status'] == 1): ?>
                                                <span class="label-success label label-default">Active</span>
                                            <?php else: ?>
                                                <span class="label-danger label label-default">Banned</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center" style ="width:30%;">
                                            <?php
                                            $options = array(
                                                'controller' => 'parcel',
                                                'action_view' => '',
                                                'action_edit' => 'edit',
                                                'action_delete' => 'delete',
                                                'id' => $item['Parcel']['id']
                                            );
                                            ?>
                                            <?php echo $this->element('action', $options); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->



    <!-- content ends -->
</div><!--/#content.col-md-0-->
<div class="col-xs-12 col-sm-12">
	<div class="col-xs-4 col-sm-4">
		
		<?php $status = GlobalVar::read('status');?>
		<?php echo $this->Form->input('status',array('class' => 'form-control search-query','type' => 'select','options' => $status,'empty' => '-- Chọn thiết lập trạng thái -- '))?>
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


<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

