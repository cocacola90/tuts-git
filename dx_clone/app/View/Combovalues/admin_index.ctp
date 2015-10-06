
<div id="content" class="col-lg-12 col-sm-12">
    <!-- content starts -->
    <?php echo $this->Session->flash(); ?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">

                <div class="box-content">

                    <a href="/admin/combovalues/add" class="btn btn-success" style="margin-bottom: 10px;float:right;"><i class="glyphicon glyphicon-pencil icon-white"></i> Thêm Mới</a>
                    <div class="clearfix"></div>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Percent</th>
								<th>Status</th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($combovalues)): ?>
                                <?php foreach ($combovalues as $item): ?>
                                    <tr>
										
                                        <td><?php echo $item['Combovalue']['id'] ?></td>
                                        <td><?php echo $item['Combovalue']['name'] ?></td>
                                        <td><?php echo $item['Combovalue']['from_quantity'];?> -  <?php echo $item['Combovalue']['to_quantity'];?></td>
                                        <td><?php echo $item['Combovalue']['percent'];?> %</td>
										 <td class="center">
                                            <?php if ($item['Combovalue']['status'] == 1): ?>
                                                <span class="label-success label label-default">Active</span>
                                            <?php else: ?>
                                                <span class="label-danger label label-default">Banned</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center" style ="width:30%;">
                                            <?php
                                            $options = array(
                                                'controller' => 'combovalues',
                                                'action_view' => '',
                                                'action_edit' => 'edit',
                                                'action_delete' => 'delete',
                                                'id' => $item['Combovalue']['id']
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
