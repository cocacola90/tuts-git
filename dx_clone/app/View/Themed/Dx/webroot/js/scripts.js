$(document).ready(function() {
	$("#current_country").on('mouseover', function() {
		$('#other_countries').slideDown(100);
		$(this).addClass('current_country_hover');
	}).mouseout(function() { 
		if ($('#other_countries').is(':hover')) {
			
		}
		else
		{
			$("#current_country").removeClass('current_country_hover');
			$('#other_countries').slideUp(0);
		}
	});
	$("#other_countries").mouseleave(function() { 
		
			$("#current_country").removeClass('current_country_hover');
			$('#other_countries').slideUp(0);
		
	});
	
});