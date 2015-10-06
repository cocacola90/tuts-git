<?php if(!empty($action_view)):?>
<?php echo $this->Html->link(' <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View', array('controller' => $controller, 'action' => $action_view, $id), array('class' => "btn btn-success btn-sm", 'escape' => false)); ?>
<?php endif;?>
<?php echo $this->Html->link(' <i class="glyphicon glyphicon-edit icon-white"></i>
    Edit', array('controller' => $controller, 'action' => $action_edit, $id), array('class' => "btn btn-info btn-sm", 'escape' => false)); ?>

<?php //echo $this->Html->link(' <i class="glyphicon glyphicon-trash icon-white"></i>
   // Delete', array('controller' => $controller, 'action' => $action_delete, $id), array('class' => "btn btn-danger", 'escape' => false)); ?>

<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash icon-white"></i>
    Delete'),  array('controller' => $controller, 'action' => $action_delete, $id), array('class' => "btn btn-danger btn-sm", 'escape' => false), null, __('Bạn chắc chắn muốn xóa  # %s?', $id)); ?>