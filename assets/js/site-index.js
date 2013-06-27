$(function(){
	$('.phone').mask('(999) 999-9999');
	$('.url').change(function(){
		var val=$.trim($(this).val());
		if(val!='' && val.substring(0,7)!='http://' && val.substring(0,8)!='https://')
		{
			var newVal='http://'+val;
			$(this).val(newVal);
		}
	});
	$('#quote-form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 64,
			},
			company: {
				maxlength: 64,
			},
			website: {
				url: true,
				maxlength: 64,
			},
			email: {
				required: true,
				email: true,
				maxlength: 32,
			},
			phone: {
				phoneUS: true,
				maxlength: 14,
			},
			project_info: {
				required: true,
			},
		},
	});

	var messages=$('.errors, .info');
	if(messages.length>0)
	{
		var offset=messages.offset();
		console.log(offset);
		$('html, body').animate({
			scrollTop: offset.top,
		},{
			duration: 1000,
		});
	}

	$('nav a, #footer-bottom a').fancybox({
		type: 'ajax',
		autoWidth: false,
		width: 400,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
	});
});