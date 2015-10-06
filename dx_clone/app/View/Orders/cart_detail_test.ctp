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
<section id="left-content">
<section id="deltail">
<section class="breadcrumb-box">
    <ul class="breadcrumb">
        <li><a href="/"
                                                                             title="Trang chủ" itemprop="url"><span
                itemprop="title"><img src="img/icon-homeb.png" title="Trang chủ" alt="Trang chủ"></span></a></li>
        <li class="separator">»</li>
        <li><h1>
		<a href="#" title="Cart Detail"
                                                                                 itemprop="url"><span itemprop="title">Thanh toán</span></a>
        </h1></li>
    </ul>
</section>
<!-- end .breadcrumb-box -->


<section class="cart">
    <?php echo $this->Form->create('Product',array('url'=>'/products/update_once'));?>
    <table border="1">
        <thead>
        <tr>
            <th width="80">Ảnh</th>
            <th width="80">Tên sản phẩm</th>
            <th width="80">Màu sắc</th>
            <th width="80">Dung lượng</th>
            <th width="80">Đơn giá</th>
            <th width="60">Số lượng</th>
            <th width="80">Thành tiền</th>
            <th>Khối lượng</th>
            <th width="40">Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0;?>
        <?php $weight = 0;?>
        <?php foreach ($cart as $item): ?>
        <?php foreach($item as $key => $value):?>
        <?php $data=$this->requestAction(array('controller'=>'products','action'=>'get_info',$value['slug'])); ?>
		
        <tr>
            <td align="center">
                <?php
				echo $this->Html->link(
                $this->Html->image($data['Product']['thumbnail'],array('class'=>'img-cart','width'=>'80','height'=>'80')),
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
                'class' => ''
                )
                );
                ?>

            </td>
            <td>
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
                'class' => 'name-cart'
                )
                );
                ?>
            </td>
            <?php $detail = json_decode($value['detail'],true);?>
            <td align="right"><?php echo $detail['color'];?></td>
            <td align="right"><?php echo $detail['storage'];?></td>
            <td align="right">
                <?php if($data['Product']['discount_status'] == 1):?>
                    <?php echo  $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount']));?>

                <?php else:?>

                    <?php echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency));?>
                <?php endif;?>

            </td>
            <td align="center">
                <input type="number" onkeyup="Check(this)"
                       name="product_<?php echo $data['Product']['id'];?>_<?php echo $value['key'];?>"
                       id="product_<?php echo $data['Product']['id'];?>" value="<?php echo $value['quantity']; ?>"
                       maxlength="3" size="2" class="txt-cart">
                <!--<input class="txt-cart" required="" value="6" name="count[158]" type="number">-->
            </td>
            <td align="right">
                <?php if(isset($data['Product']['price']))
                {
                    if($data['Product']['discount_status'] == 1)
                    {
                         //echo number_format($this->Tool->get_price($data['Product']['price'],$data['Product']['discount']) * $value['quantity'],0,',','.');
                            echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,$data['Product']['discount'],$value['quantity']));
                    }
                    else
                    {
                            echo $this->Tool->number_format($this->Tool->price($data['Product']['price'],$to_currency,'0',$value['quantity']));
                         //echo number_format(($data['Product']['price'] * $value['quantity']),0,',','.');
                    }
                }?>

            </td>
            <td align="right"><?php echo $data['Product']['weight'];?> gr</td>
            <td align="center">
                <a title="Xóa"
                   href="javascript:redirectUrl('<?php echo $this->Html->url('/products/delete_once/'.$data['Product']['id'].'/'.$value['key']); ?>','Bạn muốn xóa sản phẩm này không?')">
                    <section class="track">
                        <figure class="track_nap"><img src="/img/track_nap.png"></figure>
                        <figure class="track_box"><img src="/img/track_box.png"></figure>
                    </section>
                </a>
            </td>
        </tr>
        <?php if($data['Product']['discount_status'] == 1):?>
             <?php  $total += $this->Tool->get_price($data['Product']['price'],$data['Product']['discount']) * $value['quantity'];?>

        <?php else:?>
             <?php  $total += $data['Product']['price'] * $value['quantity'];?>
        <?php endif;?>
        <?php $weight += (int)$data['Product']['weight'] *  (int)$value['quantity'];?>
        <?php endforeach;?>


        <?php endforeach;?>
        <tr>
            <td colspan="5"></td>
            <td>Order Subtotal:</td>
            <?php echo $to_currency;?>
            <td id="order_subtotal">
                <strong>
                <?php
                    if($total>0){
                        echo $this->Tool->number_format($this->Tool->price($total,$to_currency));
                    }?>
					<?php echo $currency['prefix'];?>
             </strong>
            </td>
            <td>  <?php echo $this->Form->input('Cập
                nhật',array('type'=>'submit','class'=>'update-cart','label'=>false));?>
            </td>
            <td></td>
        </tr>
        <?php echo $this->Form->end();?>
        <tr id="control_ship">
            <td colspan="3"></td>

            <td>
                <select name="" id="ship_type">
                    <option value="">Chọn loại ship</option>
                    <option value="1">SmallPacket</option>
                    <option value="2">Parcel</option>
                </select>

            </td>
            <td>
                <select id="shipping_to" name="">
                    <option value=""> --- Chọn nước chuyển đến ---</option>
                    <?php foreach($country as $item):?>
                    <option value="<?php echo $item['Country']['code'];?>"><?php echo $item['Country']['country'];?></option>
                    <?php endforeach;?>
                </select>

            </td>
            <td>Shipping Cost:</td>
            <td><b>
                <div id="shipping_cost">0</div>
            </b></td>
            <td><b>Tổng KL:</b>

                <div id="total_weight"><?php echo $weight; ?></div>
                gr
            </td>
            <td>
			</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td><a class="buy-next-cart" href="/" title="Xóa hết">Mua tiếp</a></td>
            <td>
            </td>
            <td><p>Grand Total:</p></td>
            <td><strong id="grand_total"></strong></td>
            <!--<td>
				<form action='/orders/checkout' METHOD='POST'>
				<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
				</form>

            </td>-->
			<td> 
				<a class="buy-next-cart" href="/orders/add" title="Xóa hết">Thông tin người nhận</a>
			</td>
            <td align="center">
                <a class="del-cart"
                   href="javascript:redirectUrl('<?php echo $this->Html->url(array('controller'=>'products','action'=>'delete_all_cart')); ?>','Bạn muốn xóa toàn bộ giỏ hàng?')"
                   title="Xóa hết">Xóa hết</a>
            </td>

        </tr>

        </tbody>

    </table>

</section>
<!--<section class="payment">
    <h2 class="title-payment">Thông tin người nhận</h2>
    <?php echo $this->Form->create('Order',array('action'=>'add'));?>
    <?php echo $this->Form->input('user_id',array('type'=>'hidden','value' => $users['id'],'label'=>false,'div' =>
    false));?>
    <?php echo $this->Form->input('ship_type',array('type' =>'hidden','id' => 'type_ship'));?>
    <?php echo $this->Form->input('code',array('type' =>'hidden','id' => 'ship_to'));?>
    <?php echo $this->Form->input('total_weight',array('type' =>'hidden','id' => 'weight'));?>
    <table>
        <tbody>
        <tr>
            <th></th>
            <td><span>(*) Thông tin bắt buộc</span></td>
        </tr>
        <tr>
            <th>Họ và tên:</th>
            <td>
                <?php echo $this->
                Form->input('full_name',array('type'=>'text','class'=>'txt-payment','required'=>'','label'=>false,'div'
                => false));?>
                <span> (*)</span></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td>
                <?php echo $this->Form->input('tel',array('class'=>'txt-payment','required'=>'','label'=>false,'div' =>
                false,'type'=>'number'));?>

                <span> (*)</span></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>
                <?php echo $this->Form->input('email',array('class'=>'txt-payment','required'=>'','label'=>false,'div'
                => false,'type'=>'email'));?>

                <span> (*)</span></td>
        </tr>
        <tr>
            <th>Địa chỉ:</th>
            <td>
                <?php echo $this->
                Form->input('address',array('type'=>'text','class'=>'txt-payment','required'=>'','label'=>false,'div' =>
                false));?>

                <span> (*)</span></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td>
                <?php echo $this->
                Form->input('date_of_birth',array('type'=>'text','class'=>'txt-payment','required'=>'','label'=>false,'div'
                => false));?>

                <span> (*)</span></td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td>
                <section class="genter-payment">
                    <input name="data[Order][sex]" required="" value="1" type="radio"><span>Nam</span>
                    <input name="data[Order][sex]" required="" value="0" type="radio"><span>Nữ</span>
                </section>
                <span> (*)</span>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top;padding: 10px 5px 5px 30px;">Ghi chú:</th>
            <td>
                <?php echo $this->Form->textarea('note',array('class'=>'area-payment'));?>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <?php echo $this->Form->input('Gủi đơn đặt
                hàng',array('class'=>'btn-payment','type'=>'submit','label'=>false));?>

            </td>
        </tr>
        </tbody>
    </table>
    <?php echo $this->Form->end();?>
</section>-->
</section>

</section><!-- end #left-content -->


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