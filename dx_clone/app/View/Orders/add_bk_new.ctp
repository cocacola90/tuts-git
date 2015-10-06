<div class="row">
<?php echo $this->element('nav_profile');?>
<div class="col-lg-9 col-md-9 col-sm-8">
<div id="breadcrumb">
    <ul>
        <li>
            <?php echo $this->Html->link('<span>' . $this->Html->image('icon-homeb.png') . '</span>', DOMAIN_ROOT,
            array('escape' => false)); ?>
        </li>
        <li>»</li>
        <li><a href="/gio-hang">Giỏ hàng</a></li>
        <li>»</li>
        <li><a href="/thanh-toan">Thanh toán</a></li>
    </ul>
</div>
<?php if(!empty($arr_ship)):?>
	<section class="payment">
    <h3 class="title-payment">Thông tin người nhận</h3>
    <?php echo $this->Form->create('Order',array('action'=>'add'));?>
    <?php echo $this->Form->input('user_id',array('type'=>'hidden','value' => $users['id'],'label'=>false,'div' =>
    false));?>
	<?php echo $this->Form->input('ship_type',array('type' =>'hidden','id' => 'type_ship','value'=>$arr_ship['ship_type']));?>
    <?php echo $this->Form->input('code',array('type' =>'hidden','id' => 'ship_to','value' => $arr_ship['code_country']));?>
    <?php echo $this->Form->input('total_weight',array('type' =>'hidden','id' => 'weight','value' => $arr_ship['total_weight']));?>
	
	<!------->
	

			
		<div class="col-md-9 col-md-offset-2">

          <form method="post" id="payment-form" class="require-validation" action="/" >
            <div class="col-md-12 form-row">
				<div class="col-md-7 form-group">
					<label class="control-label">Full name <em>*</em></label>
					 <?php echo $this->
					Form->input('full_name',array('type'=>'text','class'=>'form-control','required'=>'','label'=>false,'div'
					=> false));?>
				</div>
            </div>
            <div class="col-md-12 form-row">
              <div class="col-md-7 form-group">
                <label class="control-label">Phone Number <em>*</em></label>
				<?php echo $this->Form->input('tel',array('class'=>'form-control','required'=>'','label'=>false,'div' =>
                false,'type'=>'number','autocomplete'=>'off'));?>
              
              </div>
            </div>
             <div class="col-md-12 form-row">
				<div class="col-md-7 form-group">
					<label class="control-label">Email <em>*</em></label>
					<?php echo $this->Form->input('email',array('class'=>'form-control','required'=>'','label'=>false,'div' => false,'type'=>'email','autocomplete'=>'off'));?>
				</div>
            </div>
            <div class="col-md-12 form-row">
              <div class="col-md-7 form-group">
                <label class="control-label">Address <em>*</em></label>
				<?php echo $this->
                Form->input('address',array('type'=>'text','class'=>'form-control','required'=>'','label'=>false,'div' =>
                false,'autocomplete'=>'off'));?>
               
              </div>
            </div>
			<div class="col-md-12 form-row">
              <div class="col-md-7 form-group">
                <label class="control-label">Birthday<em>*</em></label>
				<?php echo $this->
                Form->input('date_of_birth',array('type'=>'text','class'=>'form-control','required'=>'','label'=>false,'div'
                => false,'id'=>'datetimepicker2','autocomplete' => 'off'));?>
              </div>
            </div>
			<div class="col-md-12 form-row">
              <div class="col-md-7 form-group">
                <label class="control-label">Sex <em>*</em></label>
                <label class="btn btn-default">
                    <input type="radio" id="q156" name="data[Order][sex]" required="" value="1"/> male
                </label>
				<label class="btn btn-default">
                    <input type="radio" id="q156" name="data[Order][sex]" required="" value="0" /> female
                </label>
              </div>
            </div>
			<div class="col-md-12 form-row">
              <div class="col-md-7 form-group">
                <label class="control-label">Note<em>*</em></label>
				<?php echo $this->
                Form->input('note',array('class'=>'form-control ckeditor','required'=>'','label'=>false,'div'
                => false ,'autocomplete' => 'off'));?>
              </div>
            </div>
			 <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <div class="pull-right">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

            

          </form>
        </div>
	

	
	<!------->
	

    <?php echo $this->Form->end();?>
	</section>
<?php endif;?>
</div>
</div>
<script type="text/javascript"> 
$('#datetimepicker2').datetimepicker({
	timepicker:false,
	format:'m/d/Y'
});
</script>