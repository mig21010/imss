function postAjax(url = '', data = '', callback) {
	var csrf = $("input[name ='imss_token']").val();
	data.imss_token = csrf;
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		data: data,
	})
	.done(function(data) {
		/*regresa un objeto json*/
		$("input[name|='imss_token']").val(data.csrf);
		if (callback) callback(data);			
	})
	.fail(function() {
		/*sweet alerts*/
		swal(
		  'Oops...',
		  'Something went wrong!',
		  'error'
		)	
	});	
}