let images = $('#container img');
let main = $('#img-container img');
let container = $('#img-container');

images.mouseover(function() {
    $('#img-container h1').empty();

    let src = $(this).attr("src");
    main.attr("src", src);
    main.css({ "width": "600px"});

    //let heading = src.split('.')[0].split('/')[1];
    let heading = $(this).attr("alt");
    let elementToPrepend = $('<h1></h1>').text(heading).css({ 'font-weight': 'lighter' });
    container.prepend(elementToPrepend);
});