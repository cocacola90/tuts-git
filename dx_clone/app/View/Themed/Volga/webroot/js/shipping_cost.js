	

	var code = destination;

	function cost(weight, id)
	{
		//alert(weight);
		var cost_parcel = get_cost_parcel(weight);
		var cost_smallpacket = get_cost_smallpacket(weight);
		//alert(cost_parcel);
        /* chuyen doi gia ship thanh USD*/
        var sm_convert_to_usd = cost_smallpacket / rate_vnd;
        var pa_convert_to_usd = cost_parcel / rate_vnd;
        /* gia ship duoc tinh lai theo menh gia nguoi sung chon loai tien te nao*/
        var sm_shipping = price(sm_convert_to_usd , root_rate);
        var pa_shipping = price(pa_convert_to_usd , root_rate);
		
		var free_shipping = '/theme/Dx/img/free-shipping.jpg';
		
        if(cost_parcel == 0 && cost_smallpacket == 0)
        {
            document.getElementById("ship_small_new-" + id).innerHTML = free_shipping;
        }
        else if(cost_parcel == 0 && cost_smallpacket != 0 )
        {
			$("#ship_small_mb-" + id).text(format(sm_shipping,root_to_currency));
			$("#ship_small_view-" + id).text(format(sm_shipping,root_to_currency));
			$("#ship_small_new-" + id).text(format(sm_shipping,root_to_currency));
           /*  document.getElementById("ship_small_mb-" + id).innerHTML = format(sm_shipping,root_to_currency);
            document.getElementById("ship_small_view-" + id).innerHTML = format(sm_shipping,root_to_currency);
            document.getElementById("ship_small_new-" + id).innerHTML = format(sm_shipping,root_to_currency); */
        }
		else if(cost_smallpacket == 0 && cost_parcel != 0)
        {
			$("#ship_parcel_mb-" + id).text("+ " + format(pa_shipping,root_to_currency));
			$("#ship_parcel_view-" + id).text("+ " + format(pa_shipping,root_to_currency));
			$("#ship_parcel_new-" + id).text("+ " + format(pa_shipping,root_to_currency));
           /*  document.getElementById("ship_parcel_mb-" + id).innerHTML = format(pa_shipping,root_to_currency);
            document.getElementById("ship_parcel_view-" + id).innerHTML = format(pa_shipping,root_to_currency);
            document.getElementById("ship_parcel_new-" + id).innerHTML = format(pa_shipping,root_to_currency); */
        }
        else
        {
			$("#ship_small_mb-" + id).text("+ " + format(sm_shipping,root_to_currency));
			$("#ship_small_view-" + id).text("+ " + format(sm_shipping,root_to_currency));
			$("#ship_small_new-" + id).text("+ " + format(sm_shipping,root_to_currency));
			if(pa_shipping != "NaN")
			{
				$("#ship_parcel_mb-" + id).text("+ " + format(pa_shipping,root_to_currency));
				$("#ship_parcel_view-" + id).text("+ " + format(pa_shipping,root_to_currency));
				$("#ship_parcel_new-" + id).text("+ " + format(pa_shipping,root_to_currency));
			}
			
			/* document.getElementById("ship_small_mb-" + id).innerHTML = format(sm_shipping,root_to_currency);
            document.getElementById("ship_parcel_mb-" + id).innerHTML = format(pa_shipping,root_to_currency);
			document.getElementById("ship_small_view-" + id).innerHTML = format(sm_shipping,root_to_currency);
            document.getElementById("ship_parcel_view-" + id).innerHTML = format(pa_shipping,root_to_currency);
            document.getElementById("ship_small_new-" + id).innerHTML = format(sm_shipping,root_to_currency);
            document.getElementById("ship_parcel_new-" + id).innerHTML = format(pa_shipping,root_to_currency); */
            //alert()
        }
	}

/*     function format(price,to_currency)
    {
        var num = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(price);
        return num;
    }
 */
	function format(price,to_currency)
    {
       // var num = new Intl.NumberFormat('de-DE', { style: 'currency', currency: to_currency }).format(price);
        var num = symbol + price.toFixed(2);
        return num;
    }

    function price(amount, root_rate){
        var price = amount * root_rate;
        return price;
    }
	function get_cost_smallpacket(weight)
	{
		var continent = root_continent;
		var cookie_smallpacket = getCookie("smallpacket");
		var json_smallpacket = unescape(cookie_smallpacket);

		var parsed = JSON.parse(json_smallpacket);
		var arr = [];
		for(var x in parsed){
		  arr.push(parsed[x]);
		}
		
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
        var arr_to_weight = "";
        var arr_from_weight = "";
		for(var i = 0 ; i < arr.length ; i++)
		{
			//console.log(arr);
            var a = arr[i];
            arr_to_weight = !!a['Smallpacket'] ? parseInt(a['Smallpacket']['to_weight']) : 0;
            arr_from_weight = !!a['Smallpacket'] ? parseInt(a['Smallpacket']['from_weight']) : 0;
           // arr_to_weight =  parseInt(arr[i]['Smallpacket']['to_weight'].valueOf());
           // arr_from_weight = parseInt(arr[i]['Smallpacket']['from_weight'].valueOf());
            //console.log(arr_to_weight);
            //console.log(arr_from_weight);
			if((weight >= arr_to_weight) && (weight <= arr_from_weight  ))
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
		//console.log(json_parcel);
		var parsed = JSON.parse(json_parcel);
		var arr = [];
		for(var x in parsed){
		  arr.push(parsed[x]);
		}
		//console.log(arr);
		if(arr != "")
		{
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
			
		}else
		{
			var shipping_cost = 0;
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
	
	


