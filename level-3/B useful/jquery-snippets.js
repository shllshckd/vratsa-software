val(); // get the value of a text box or other form control
val(value); // set the value of a text box or other form control

text(); // get the text of an element
text(value); // set the text of an element

next([selector]); // get the next sibling of an element or the next sibling of a specified type if the parameter is coded
prev([selector]) // prevoius sibling

attr(attributeName) // get the value of the specified attribute from the first selected item
attr(attributeName, newValue) // set the value of the specified property for each selected element

$('p.my-class').parent('div'); // immediate parent
$('p.my-class').parents('div'); // all parents

html() // get the html
html(content) // set inner html

find();

submit(); // submit the form
focus(); // move the focus to the selected form control or link

$("<ul><li>Hello</li></ul>").appendTo("body");
$("body").prepend("<h1>header</h1>");

$('p').remove(); //will remove all p-elements from the document
$('.inner').remove();

addClass(className) // add one or more classes, create them when necessary - separated with spaces
removeClass(className) // remove one or more classes, when classes are more than one, separate them with spaces 
toggleClass(className) // if the class is present, remove it - otherwise, add it

hide(duration) // hide the selected element
show(duration) // show the selected element

on('event', callback) // for events listening and handling 
animate()
fadeIn()

css("color") // get the value of the specified property from the first selected element
css("color", "#f3f") // set the value of the specified property for each selected element

ready(handler), unload(handler), error(handler), click(handler), dblclick(handler)
mouseenter(handler), mouseover(handler), mouseout(handler), hover(handlerIn, handlerOut), preventDefault()

// ---

$('#creature').on('change', function (e) {
    $('li').css('color', 'black');
    let color = $('#color').val();
    let selectedOption = $('select option:selected').val();
    $('.' + selectedOption).css('color', color);
});

// ---

let selectedEl = $('#myDiv').prev('.my-class').css('color', 'red')
// first(selector) 
// last(selector) 

console.log($('#notMe').last())
console.log($('div').first())

$('.my-class').text('value');
$('.my-class').html('<p>asd</p>');

let anchor = $('<a></a>');
anchor.text('Anchor tag');
anchor.attr('href', 'dir.bg');
anchor.addClass('myClass');

// ---

let ul = $('#list');
let li = $('li');
li.on('click', function () {
    $(this).css('background-color', 'blue');
});

// ul.on('click', 'li' ,function (e){
//     alert('Clicked');
// });

// ---

$('.my-class').css('backgroundColor', 'red');
$('div').css({
    color: 'green',
    textTransform: 'uppercase',
    fontWeight: 'bold',
});

// ---

// jQuery has methods for adding on() and removing events off()
function onButtonClick() {
    $(".selected").removeClass("selected"); 
    $(this).addClass("selected");
}

$('<button>') 
    .addClass('btn-success')
    .html('Click me for success') 
    .on('click', onSuccessButtonClick) 
    .appendTo(document.body);

$("a.button").on("click", onButtonClick)

// $(this) is the event target

ul.append('<li>Hello, I\'m new Li</li>');

// --- https://github.com/VratsaSoftware/php_20_21/blob/master/03_JavaScript/13_jQuery_Events_and_Lab/Demo/Task2/index.html

// --- https://github.com/VratsaSoftware/php_20_21/blob/master/03_JavaScript/13_jQuery_Events_and_Lab/Demo/Task4/index.html