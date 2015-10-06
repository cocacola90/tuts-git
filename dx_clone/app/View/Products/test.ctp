<?php
	$country_info = $this->Session->read('Country');
	$destination  = $country_info['Country']['code'];
	$continent = $country_info['Country']['continent'];
 ?>
<script type="text/javascript">
	/* jCarouselLite */
	$(".noibat").flexisel({
		enableResponsiveBreakpoints: true,
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1
			}, 
			landscape: { 
				changePoint:640,
				visibleItems: 2
			},
			tablet: { 
				changePoint:768,
				visibleItems: 3
			}
		},
		visibleItems: 5
	});
/* 	var code = "<?php echo $destination;?>";
	
	
	function cost(weight, id)
	{
		//alert(weight); 
		//var weight = $("#weight").val();
		var cost_parcel = get_cost_parcel(weight);
		
		var cost_smallpacket = get_cost_smallpacket(weight);
		document.getElementById("ship_small-" + id).innerHTML = cost_smallpacket;
		document.getElementById("ship_parcel-" + id).innerHTML = cost_parcel;
	}
	function get_cost_smallpacket(weight)
	{
		var continent = "<?php echo $continent;?>"
		var cookie_smallpacket = getCookie("smallpacket");
		var json_smallpacket = unescape(cookie_smallpacket);

		var parsed = JSON.parse(json_smallpacket);
		var arr = [];
		for(var x in parsed){
		  arr.push(parsed[x]);
		}
		console.log(arr);
		if(weight <= 2000)
		{
			var shipping_cost = get_small_cost(arr,weight,continent);
		}
		else if(weight > 2000)
		{
			var last_packet = weight % 2000 ;
			var first_packet =  Math.floor(weight / 2000);
			var cost_last_packet = get_small_cost(arr,last_packet, continent);
			var cost_first_packet = get_small_cost(arr,2000, continent);
			var shipping_cost = (first_packet * cost_first_packet) + cost_last_packet;
		}
		
		return  shipping_cost;
	}
	
	function get_small_cost(arr,weight,continent)
	{
		for(var i = 0 ; i < arr.length ; i++)
		{
			//console.log(weight);
			var to_weight =  parseInt(arr[i]['Smallpacket']['to_weight']);
			var from_weight = parseInt(arr[i]['Smallpacket']['from_weight']);
			if((weight >= to_weight) && (weight <= from_weight))
			{
				if(continent == 1)
				{
					var shipping_cost = parseInt(arr[i]['Smallpacket']['asia']);
				}
				else if(continent == 2)
				{
					var shipping_cost = parseInt(arr[i]['Smallpacket']['europe']);
				}
				else if(continent == 3)
				{
					var shipping_cost = parseInt(arr[i]['Smallpacket']['africa']);
				}
				else if(continent == 4)
				{
					var shipping_cost = parseInt(arr[i]['Smallpacket']['america']);
					//console.log(shipping_cost);
				}else if (continent == 5)
				{
					var shipping_cost = parseInt(arr[i]['Smallpacket']['appu']);
				}
			}

		}
		return shipping_cost;
	}
	
	
	function get_cost_parcel(weight)
	{
		var cookie_parcel = getCookie("parcel");
		var json_parcel = unescape(cookie_parcel);

		var parsed = JSON.parse(json_parcel);
		var arr = [];
		for(var x in parsed){
		  arr.push(parsed[x]);
		}
		var first_weight = parseInt(arr[0]['first_weight']);
		var next_weight =  parseInt(arr[0]['next_weight']);

		if(weight <= 500)
		{
			var shipping_cost = first_weight;
		}
		else if(weight > 500)
		{
			var shipping_cost = first_weight + next_weight * ((Math.ceil(weight / 500)) -1);
		}
		return shipping_cost;
	}

	
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
		}
		return "";
	}
	
	 */
	
</script>

<div class="category">Sản phẩm nhiều người quan tâm</div>
<div class="list-product">
<?php if(isset($quan_tam)):?>
<?php foreach($quan_tam as $item):?>
	<article>
		<section class="tooltip" id="7">
			<figure>
			<?php 
				echo $this->Html->link(
					$this->Html->image($item['Product']['thumbnail'],array('width' => '120',
						'height' => '120')),
					array(
						'controller' => 'products',
						'action' => 'view_product',
						'category' => $item['Category']['slug'],
						'product' => $item['Product']['slug'],
						'id' => $item['Product']['id'],
						'ext' => 'html'
					),
					array(
						'escape' => false,
						'class' => 'img-productc',
						
					)
				);
			?>
				<figcaption>
					<?php 
						echo $this->Html->link(
							$item['Product']['name'],
							array(
								'controller' => 'products',
								'action' => 'view_product',
								'category' => $item['Category']['slug'],
								'product' => $item['Product']['slug'],
								'id' => $item['Product']['id'],
								'ext' => 'html'
							),
							array(
								'title' => $item['Product']['name'],
							)
						);
					?>

				</figcaption>
			</figure>
			<p class="description-product">If you want to know more information about our goods, terms, guarantee...</p>
			<strong><?php echo number_format($item['Product']['price'],0,',','.');?> đ</strong><div class="clear"></div>

			<!--<a href="javascript:void(0)">xem giá ship</a>-->
				
			<div id="ship_small-<?php echo  $item['Product']['id'];?>"><?php echo  $item['Product']['weight'];?></div>
			<div id="ship_parcel-<?php echo  $item['Product']['id'];?>">--<?php echo  $item['Product']['id'];?></div>
			<a href="#" class="add-to-cart btn-info">Mua ngay</a>
			<a href="#" class="view-detail btn-info">Chi tiết</a>
			<script type="text/javascript">
				cost(<?php echo  $item['Product']['weight'];?>, <?php echo  $item['Product']['id'];?>);
			</script>
		</section>
		<section class="hidden-tip" id="data_7" style="display:none;">
			<h3><?php echo $item['Product']['name'];?></h3>
			<p class="price"><?php echo number_format($item['Product']['price'],0,',','.');?> đ</p>
			
			<p class="title-sale">Khuyến mãi:</p>
			<section class="content-sale">
			<?php echo $item['Product']['description'];?>
		
			</section>

		</section>

	</article>
	<?php endforeach;?>
	<?php endif;?>

</div>
<!-- End .list-product -->


