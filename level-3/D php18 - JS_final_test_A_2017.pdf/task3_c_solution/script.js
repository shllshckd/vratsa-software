$('#btn').on('click', function (e) {
	$('#success-msg').remove();
	$('.error').remove();

	e.preventDefault();

	let form = $('form');
	let username = $('#name').val();
	let password = $('#pd').val();

	$.ajax({
		url: './file.php',
		type: 'post',
		data: 'username=' + username + '&password=' + password,
		dataType: 'json',
		success: function (response) {
			console.log(response);
			if (response.success) {
				form.prepend("<h1 id='success-msg'>Success!</h1>");
				// alert('Success!');
			} 
			else {
				if (response.error) {
					console.log(response.error);
					let error = response.error;

					for (let index in error) {
						$('#' + index).before('<p class="error">' + error[index] + '</p>');
					}
				}
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError)
		}
	});
})