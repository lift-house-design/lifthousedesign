$(function(){
	$('#estimates').dataTable({
		bLengthChange: false,
		bInfo: false,
		bFilter: false,
		bPaginate: false,
	});

	/*$('#billing').contentTable({
		url: '/dashboard/project',
		contentClass: 'billing-content',
		onComplete: function(response,plugin)
		{
			console.log(this);
			console.log(response);
			console.log(plugin);
		}
	});*/

	$('#billing-invoices').dataTable({
		bLengthChange: false,
		bInfo: false,
		bFilter: false,
		bPaginate: false,
	});
	
	$('#projects').dataTable({
		bLengthChange: false,
		bInfo: false,
		bFilter: false,
		bPaginate: false,
	});

	$('.phone').mask('(999) 999-9999');

	$('#admin').validate({
		rules: {
			first_name: {
				required: true,
				maxlength: 64,
			},
			last_name: {
				required: true,
				maxlength: 64,
			},
			company_name: {
				maxlength: 64,
			},
			phone_number: {
				phoneUS: true,
				maxlength: 14,
			},
			fax_number: {
				phoneUS: true,
				maxlength: 14,
			},
		},
	});
});