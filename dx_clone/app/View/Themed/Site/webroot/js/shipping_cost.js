// alert(destination);

	var code = destination;
	
	function cost(weight, id)
	{
		var cost_parcel = get_cost_parcel(weight);
		
		var cost_smallpacket = get_cost_smallpacket(weight);
		document.getElementById("ship_small-" + id).innerHTML = cost_smallpacket;
		document.getElementById("ship_parcel-" + id).innerHTML = cost_parcel;
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
	
	


