<?php echo $this->Form->create('Smallpacket',array('inputDefaults' => array('div' => false,'label' => false)));?>
<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <?php echo $this->Session->flash(); ?>
    <div>

        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Gia cuoc Small Packet</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">

                <div class="box-content">

                    <a href="/admin/smallpacket/add" class="btn btn-success" style="margin-bottom: 10px;float:right;"><i class="glyphicon glyphicon-pencil icon-white"></i> Thêm Mới</a>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
								<th>
									<label class="pos-rel">
										<input type="checkbox" class="ace" id="checkAll">
										<span class="lbl"></span>
									</label>
								</th>
                                <th>ID</th>
                                <th>Cân nặng</th>
                                <th>Châu Á</th>
                                <th>Châu Âu</th>
                                <th>Châu Phi</th>
								<th>Châu Mỹ</th>
								<th>APPU</th>
								<th>Trạng thái</th>
								<th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($smallpackets)): ?>
                                <?php foreach ($smallpackets as $item): ?>
                                    <tr>
										<td>
											<label class="pos-rel">
												<input type="checkbox" name="data[Smallpacket][cid][]" class="ace" value="<?php echo $item['Smallpacket']['id'];?>">
												<span class="lbl"></span>
											</label>
										</td>
                                        <td><?php echo $item['Smallpacket']['id'] ?></td>
                                        <td><?php echo $item['Smallpacket']['to_weight'] . '-' . $item['Smallpacket']['from_weight'];?></td>
										<td><?php echo number_format("{$item['Smallpacket']['asia']}");?></td>
										<td><?php echo number_format("{$item['Smallpacket']['europe']}");?></td>
										<td><?php echo number_format("{$item['Smallpacket']['africa']}");?></td>
										<td><?php echo number_format("{$item['Smallpacket']['america']}");?></td>
										<td><?php echo number_format("{$item['Smallpacket']['appu']}");?></td>
                                        <td class="center">
                                            <?php if ($item['Smallpacket']['status'] == 1): ?>
                                                <span class="label-success label label-default">Active</span>
                                            <?php else: ?>
                                                <span class="label-danger label label-default">Banned</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center" style ="width:30%;">
                                            <?php
                                            $options = array(
                                                'controller' => 'smallpacket',
                                                'action_view' => '',
                                                'action_edit' => 'edit',
                                                'action_delete' => 'delete',
                                                'id' => $item['Smallpacket']['id']
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



