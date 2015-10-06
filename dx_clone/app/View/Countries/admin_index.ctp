
<?php echo $this->Form->create('Country', array('inputDefaults' => array('div' => false, 'label' => false))); ?>

<div id="content" class="col-lg-12 col-sm-12">
    <!-- content starts -->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">

                    <a href="/admin/countries/add" class="btn btn-success" style="margin-bottom: 10px;float:right;"><i
                            class="glyphicon glyphicon-pencil icon-white"></i> Thêm Mới</a>

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
                            <th>Cờ hiệu</th>
                            <th>Tiền tệ</th>
                            <th>Ký hiệu tiền tệ</th>
                            <th>Mệnh giá theo USD</th>
                            <th>Châu lục</th>
                            <th>Trạng thái</th>
                            <th>Tiền tệ thanh toán</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($countries)): ?>
                            <?php foreach ($countries as $item): ?>
                                <tr>
                                    <td>
                                        <label class="pos-rel">
                                            <input type="checkbox" name="data[Country][cid][]" class="ace"
                                                   value="<?php echo $item['Country']['id']; ?>">
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td><?php echo $item['Country']['id']; ?></td>
                                    <td><?php echo $item['Country']['code']; ?></td>
                                    <td><?php echo $item['Country']['country']; ?></td>
                                    <td><img src="<?php echo $item['Country']['flag']; ?>" alt="" width="50"
                                             height="40"/></td>
                                    <td><?php echo $item['Country']['currency']; ?></td>
                                    <td><?php echo $item['Country']['prefix']; ?></td>
                                    <td><?php echo $item['Country']['rate'] . ' - ' . $item['Country']['description']; ?></td>
                                    <td>
                                        <?php
                                        $continent = GlobalVar::read('continent');
                                        foreach ($continent as $key => $val) {
                                            if ($key == $item['Country']['continent']) {
                                                echo $val;
                                            }
                                        }
                                        ?>

                                    </td>
                                    <td class="center">
                                        <?php if ($item['Country']['status'] == 1): ?>
                                            <span class="label-success label label-default">Public</span>
                                        <?php else: ?>
                                            <span class="label-danger label label-default">Draf</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="center">
                                        <?php
                                        if ($item['Country']['type'] == 1) {
                                            echo $this->Form->postLink('<span class="label label-success">Chấp nhận</span>', array('action' => 'unaccess', 'admin' => true, $item['Country']['id']), array('class' => 'congbo', 'escape' => false));

                                        } elseif ($item['Country']['type'] == 0) {
                                            echo $this->Form->postLink('<span class="label label-danger">Không chấp nhận</span>', array('action' => 'access', 'admin' => true, $item['Country']['id']), array('class' => 'kocongbo', 'escape' => false));
                                        }

                                        ?>
                                    </td>

                                    <td class="center" style="width:30%;">
                                        <?php
                                        $options = array(
                                            'controller' => 'countries',
                                            'action_view' => '',
                                            'action_edit' => 'edit',
                                            'action_delete' => 'delete',
                                            'id' => $item['Country']['id']
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

    </div>
    <!--/row-->


    <!-- content ends -->
</div><!--/#content.col-md-0-->
<div class="clearfix"></div>
<div class="col-xs-12 col-sm-12">
	<div class="col-xs-8 col-sm-8">
		<p> <a href="https://developer.paypal.com/docs/classic/api/country_codes/" target="_blank">Countries and Regions Supported by PayPal</a></p>
    </div>
	<div class="clearfix"></div>
    <div class="col-xs-4 col-sm-4">

        <?php $status = GlobalVar::read('status'); ?>
        <?php echo $this->Form->input('status', array('class' => 'form-control search-query', 'type' => 'select', 'options' => $status, 'empty' => '-- Chọn thiết lập trạng thái -- ')) ?>
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

<?php echo $this->Form->end(); ?>


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