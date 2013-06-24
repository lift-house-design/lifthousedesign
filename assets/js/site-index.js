$(function(){
	$('#latest .work .caption').fadeOut(0);

	$('#latest .work').mouseover(function(){
		$(this).find('.caption').fadeIn(500);
	});
	$('#latest .work').mouseout(function(){
		$(this).find('.caption').fadeOut(500);
	});
});