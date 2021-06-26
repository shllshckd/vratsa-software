let images = $('#container img');
let main = $('#img-container img');
let container = $('#img-container');

images.hover(function() {
    $('#img-container h1').empty();

    let src = $(this).toArray()[0].getAttribute("src");
    main.attr("src", src);
    main.css({ "width": "600px"});

    let heading = src.split('.')[0].split('/')[1];
    let elementToPrepend = $('<h1></h1>').text(heading);

    container.prepend(elementToPrepend);
});