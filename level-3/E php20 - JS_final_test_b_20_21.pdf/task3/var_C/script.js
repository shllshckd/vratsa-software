$('#btn').on('click', function (e) {
	e.preventDefault();
	$('.error').remove();
	$('.success-msg').remove();

	let form = $('form');
	let city = $('#city').val();
	let cityCode = $('#city-code').val();
	let streetName = $('#street-name').val();
	let streetNum = $('#street-num').val();

	$.ajax({
		url: './file.php',
		type: 'post',
		data: 'city=' + city + '&city-code=' + cityCode + '&street-name=' + streetName + '&street-num=' + streetNum,
		dataType: 'json',
		success: function (response) {
			console.log(response);

			if (response.success) {
				form.prepend("<h1 class='success-msg'>Success!</h1>");
			} 
			else {
				if (response.error) {
					let error = response.error;

					for (let index in error) {
						console.log(index);
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