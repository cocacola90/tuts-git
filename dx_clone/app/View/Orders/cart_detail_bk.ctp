<?php

    if(isset($currency)){
        $to_currency = $currency['code'];
        $rate =  $currency['rate'];
    }else
    {
        $to_currency = "";
        $rate = 1;
    }
?>
<div class="row">
        <div id="bread_crumb">
            <ul>
                <li><?php echo $this->Html->link('Home', DOMAIN_ROOT,
				array('escape' => false)); ?></li>
                <li>&gt;&gt;</li>
      
                <li><a href="" class="current_page">Cart Detail</a></li>
            </ul>
        </div>
</div>
<div class="row">
    <?php echo $this->Form->create('Product',array('url'=>'/products/update_once'));?>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Color</th>
						<th class="text-center">Weight</th>
                        <th class="text-center">Price</th>      
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
				
                <tbody>
				<?php
				$total = 0;
				$weight = 0;
				foreach ($cart as $item): 
					foreach($item as $key => $value):
					$data=$this->requestAction(array('controller'=>'products','action'=>'get_info',$value['slug']));
				?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
							<?php
								echo $this->Html->link(
								$this->Html->image($data['Product']['thumbnail'],array('class'=>'media-object','width'=>'72','height'=>'72')),
								array(
									'controller' => 'products',
									'action' => 'view_product',
									'category' => $data['Category']['slug'],
									'product' => $data['Product']['slug'],
									'id' => $data['Product']['id'],
									'ext' => 'html'
								),
								array(
									'escape' => false,
									'class' => 'thumbnail pull-left'
									)
								);
								?>
                            <div class="media-body">
                                <h5 class="media-heading">
								<?php
								echo $this->Html->link(
									$data['Product']['name'],
									array(
										'controller' => 'products',
										'action' => 'view_product',
										'category' => $data['Category']['slug'],
										'product' => $data['Product']['slug'],
										'id' => $data['Product']['id'],
										'ext' => 'html'
									),
									array(
										'title' => $data['Product']['name'],
										'class' => ''
									)
								);
								?>
								
								</h5>
                                
                            </div>
                        </div></td>
						
                        <td class="col-sm-1 col-md-1" style="text-align: center">
							<input type="number" onkeyup="Check(this)"
							   name="product_<?php echo $data['Product']['id'];?>_<?php echo $value['key'];?>"
							   id="product_<?php echo $data['Product']['id'];?>" value="<?php echo $value['quantity']; ?>"
							   maxlength="3" size="2" class="form-control">
                        </td>
						 <?php $detail = json_decode($value['detail'],true);?>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong><?php echo $detail['color'];?></strong></td>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong> <?php echo $data['Product']['weight'];?> gr </strong></td>
                        <td class="col-sm-1 col-md-1 text-center">
							<strong>
							<?php 
							if($data['Product']['discount_status'] == 1){
								 echo  $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount']));
							}
							else
							{
								echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency));	
							}
							?>
							</strong>
						</td>
                        <td class="col-sm-1 col-md-1 text-center">
							<strong>
							<?php if(isset($data['Product']['price']))
								{
									if($data['Product']['discount_status'] == 1)
									{
										echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount'],$value['quantity']));
									}
									else
									{
										echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,'0',$value['quantity']));
									}
								}
							?>
							</strong>
						</td>
                        <td class="col-sm-1 col-md-1">
						<a title="Xóa" class="btn btn-danger" href="javascript:redirectUrl('<?php echo $this->Html->url('/products/delete_once/'.$data['Product']['id'].'/'.$value['key']); ?>','Bạn muốn xóa sản phẩm này không?')">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
                       </td>
                    </tr>
                    <?php if($data['Product']['discount_status'] == 1):?>
						 <?php  $total += $this->Tool->get_price($data['Product']['price'],$data['Product']['discount']) * $value['quantity'];?>
					<?php else:?>
						 <?php  $total += $data['Product']['price'] * $value['quantity'];?>
					<?php endif;?>
					<?php $weight += (int)$data['Product']['weight'] *  (int)$value['quantity'];?>
					<?php 
						endforeach;
					endforeach;
					?>
					
					<tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<td>	
						<?php
							echo $this->Form->button('<span class="glyphicon glyphicon-refresh"></span>  Update',
								array(
									'type' => 'submit',
									'class' => 'btn btn-info'
								),
								array(
									'escape' => false
								)
							);
						?>
						</td>
                        <td><h5>Total weight</h5></td>
                        <td class="text-right">
							<h5>
							<strong> 
								 <div id="total_weight"><?php echo $weight; ?></div> gram
							</strong>
							</h5>
						</td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right" ><h5><strong id="order_subtotal">
						<?php
						if($total>0){
							echo $this->Tool->number_format($this->Tool->price($total,$to_currency));
						}?>
						<?php echo $currency['prefix'];?>
						</strong></h5></td>
                    </tr>
                    <tr id="control_ship">
                        <td> 
							<div class="form-group">
								<select class="form-control" id="ship_type" >
									<option value="">-- Select service --</option>
									<option value="1">Small Packet</option>
									<option value="2">Price</option>
								</select> 
							</div>
						
						</td>
                        
                        <td colspan="4"> 
							<div class="form-group">
								<select id="shipping_to" name="" class="form-control">
									<option value=""> --- Chọn nước chuyển đến ---</option>
									<?php foreach($country as $item):?>
									<option value="<?php echo $item['Country']['code'];?>"><?php echo $item['Country']['country'];?>
									</option>
									<?php endforeach;?>
								</select>
							</div>
						</td>
                       
						
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong id="shipping_cost">0</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<td></td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong id="grand_total"></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a class="btn btn-default" href="/">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                        <a class="btn btn-success" href="/orders/add">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
                </tbody>
            </table>
			<?php echo $this->Form->end();?>
        </div>
		
    </div>

<script type="text/javascript">




    function redirectUrl(url, mess) {
        if (confirm(mess)) {
            window.location.href = url;
        }
    }

    var total_cart = "<?php echo ($total * $rate);?>";
   // alert(total_cart);
    var to_currency = "<?php echo $to_currency;?>";
    if(to_currency == "")
    {
        to_currency = "USD";
    }
    var order_subtotal = $('#order_subtotal').text();
    //alert(order_subtotal);
    $('#grand_total').text(order_subtotal);
    $('#control_ship').change(function () {
        var code_country = $('#shipping_to').val();
        if (code_country == "") {
            code_country = destination;
        }
        var total_weight = $('#total_weight').text();
       
        /*  alert(total_weight);
         alert(code_country);*/
        var ship_type = $('#ship_type').val();
		if(ship_type === "")
		{
			alert('Service shipping is required !');
			return;
		}

        $.ajax({
            url: "/products/ship_cost",
            type: "POST",
            data: {
                code_country: code_country,
                weight: total_weight,
                ship_type: ship_type
            },

            success: function (data) {

                data = ceil(data);
                var format_data = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(data);
                document.getElementById("shipping_cost").innerHTML = addCommas(format_data);

                var grand_total = data + parseFloat(total_cart);

                var format_grand_total = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(grand_total);
                //alert(format_grand_total);
                $('#grand_total').text(format_grand_total);

                $("#type_ship").val(ship_type);
                $("#ship_to").val(code_country);
                $("#weight").val(total_weight);
            },
            error: function () {
                alert('ERROR');
            }

        });
    });

    function ceil(nStr)
    {
        var num = Math.ceil(nStr * 100) / 100;
        return num;
    }
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    /* $('#ship_cost').click(function(){
     var ship_cost = $("input:radio[name='data[Order][ship_type]']:checked").val();
     alert(ship_cost);

     });*/
</script>