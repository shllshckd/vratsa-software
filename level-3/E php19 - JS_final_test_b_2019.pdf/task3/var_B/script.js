$('#btn').on('click', function(e) {
    e.preventDefault();

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
        pTags.eq(0).append(' Invalid city, no numbers are allowed and minimum length is 3')
        pTags.eq(0).addClass('error');
    }

    let notValidCode = cityCode.val().toString().length == 0;
    if (notValidCode) {
        pTags.eq(1).append(' Invalid city code, mustn\'t be empty')
        pTags.eq(1).addClass('error');
    }

    let notValidStreetName =  streetName.val().toString().length == 0;
    if (notValidStreetName) {
        pTags.eq(2).append(' Invalid street name, mustn\'t be empty')
        pTags.eq(2).addClass('error');
    }

    let containsNumbersOnly = true;
    streetNum.val().toString().split('').forEach(e => {
        if (!isNumber(e)) {
            containsNumbersOnly = false;
        }
    });

    let notValidStreetNum = streetNum.val().toString().length > 0 && !containsNumbersOnly;
    if (notValidStreetNum) {
        pTags.eq(2).append(' Invalid street number, should contain numbers only')
        pTags.eq(2).addClass('error');
    }

    if (!notValidCity && !notValidCode && !notValidStreetName && !notValidStreetNum) {
        body.prepend('<h1>Успешно записани данни!</h1>')
    }

});

function isNumber(n) { 
    return /^-?[\d.]+(?:e-?\d+)?$/.test(n);
} 