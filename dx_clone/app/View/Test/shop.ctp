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
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
						
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong> Black </strong></td>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong> 30 gr </strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                            </div>
                        </div></td>
						
                        <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                        </td>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong> Black </strong></td>
						<td class="col-sm-1 col-md-1" style="text-align: center"><strong> 30 gr </strong></td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button></td>
                    </tr>
					<tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<td>
							<button type="button" class="btn btn-info">
								<span class="glyphicon glyphicon-refresh"></span>  Update
							</button> 
						</td>
                        <td><h5>Total weight</h5></td>
                        <td class="text-right"><h5><strong>  <div id="total_weight"> 700 gram</div>
                </strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
						<td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right" ><h5><strong id="order_subtotal">$24.59</strong></h5></td>
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
									<option value="AF">AFGHANISTAN</option>
									<option value="AL">ALBANIA</option>
									<option value="DZ">ALGERIA</option>
									<option value="AR">ARGENTINA</option>
									<option value="VN">VIETNAMESE</option>
									<option value="USA">United States of America </option>
									<option value="UK">England</option>
									<option value="MO">MACAO</option>
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
                        <td class="text-right"><h3><strong id="grand_total">$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>