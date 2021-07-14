$('#btn').on('click', function(e) {
    e.preventDefault();

    $('.error').remove();
	$('.success').remove();

    let city = $('#city');
    let cityCode = $('#city-code');
    let streetName = $('#street-name');
    let streetNum = $('#street-num');
    let body = $('body');
    let pTags = $('p');

    let containsNumbers = false;
    city.val().toString().split('').forEach(e => {
        if (isNumber(e)) {
            containsNumbers = true;
        }
    });

    let notValidCity = city.val().toString().length < 3 || containsNumbers;
    if (notValidCity) {
        let errorMessgage = $('<p></p>').addClass('error').text('Invalid city, no numbers are allowed and minimum length is 3.');
        pTags.eq(0).append(errorMessgage);
    }

    let notValidCode = cityCode.val().toString().length == 0;
    if (notValidCode) {
        let errorMessgage = $('<p></p>').addClass('error').text('Invalid city code, mustn\'t be empty.');
        pTags.eq(1).append(errorMessgage);
    }

    let notValidStreetName =  streetName.val().toString().length == 0;
    if (notValidStreetName) {
        let errorMessgage = $('<p></p>').addClass('error').text('Invalid street name, mustn\'t be empty.');
        pTags.eq(2).append(errorMessgage)
    }

    let containsNumbersOnly = true;
    streetNum.val().toString().split('').forEach(e => {
        if (!isNumber(e)) {
            containsNumbersOnly = false;
        }
    });

    let notValidStreetNum = streetNum.val().toString().length > 0 && !containsNumbersOnly;
    if (notValidStreetNum) {
        let errorMessgage = $('<p></p>').addClass('error').text('Invalid street number, should contain numbers only.');
        pTags.eq(2).append(errorMessgage);
    }

    if (!notValidCity && !notValidCode && !notValidStreetName && !notValidStreetNum) {
        let successMessgage = $('<h1></h1>').addClass('success').text('Успешно записани данни!');
        body.prepend(successMessgage);
    }
});

function isNumber(n) { 
    return /^-?[\d.]+(?:e-?\d+)?$/.test(n);
} 