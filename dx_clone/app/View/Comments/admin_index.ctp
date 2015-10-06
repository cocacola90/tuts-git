<div class="page-header">
    <h1>Danh sach review</h1>
</div><!-- /.page-header -->
<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>

            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id', 'Người dùng'); ?></th>
            <th><?php echo $this->Paginator->sort('product_id', 'Tên sản phẩm'); ?></th>
            <th><?php echo $this->Paginator->sort('thumbnail', 'Ảnh dại diện'); ?></th>
            <th><?php echo $this->Paginator->sort('comment', 'Comment'); ?></th>
            <th><?php echo $this->Paginator->sort('status', 'Trạng thái'); ?></th>         
            <th>
                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                <?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?>
            </th>

           
        </tr>
    </thead>

    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td>
                    <?php echo h($comment['Comment']['id']); ?>
                </td>
                <td><?php echo h($comment['User']['username']); ?></td>
                <td><?php echo h($comment['Product']['name']); ?></td>
                
                <td><img src="<?php echo $comment['Product']['thumbnail'];?>" alt="no-img" width="80" height="80"/></td>
				<td><?php echo h($comment['Comment']['comment']); ?></td>
				<td> 
				<?php
					if($comment['Comment']['status'] == 1)
					{
						echo $this->Form->postLink('<span class="label label-success">Hiển thị</span>', array('action' => 'unpublish', 'admin' => true, $comment['Comment']['id']), array('class' => 'congbo','escape'=>false));
					
					}
					elseif($comment['Comment']['status'] == 0)
					{
						echo $this->Form->postLink('<span class="label label-danger">Không hiển thị</span>', array('action' => 'publish', 'admin' => true, $comment['Comment']['id']), array('class' => 'kocongbo','escape'=>false));
					}
					
				?>
				
				</td>
                <td class="hidden-480"><?php echo date('d/m/Y', $comment['Comment']['created']); ?></td>
 
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->element('admin/paginator'); ?>