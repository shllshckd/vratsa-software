// get element by id
let elByIdJquery = $('#my-element');
console.log(elByIdJquery);

// get elements by tag name
let elByTagNameJquery = $('h1');
console.log(elByTagNameJquery);

// get p elements which are in div
let elBySelectorJquery = $('div p');
console.log(elBySelectorJquery);

// get div elements which have my-class
let elBySelectorJquery2 = $('div.my-class');
console.log(elBySelectorJquery2);

elBySelectorJquery2.css('backgroundColor', 'yellow');
elBySelectorJquery2.text('changed text');

elBySelectorJquery.html('<h1> cats! </h1>');

$('div').css({
    backgroundColor: 'green',
});

let element = $('.append-here');
let anchor = $('<a></a>');
anchor.html('<h1>text</h1>');
anchor.attr('href', 'https://abv.bg');
anchor.addClass('some-class');

element.append(anchor);