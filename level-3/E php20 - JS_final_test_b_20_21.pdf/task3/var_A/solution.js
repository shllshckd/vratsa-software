let container = $("#container");
let images = $("#container img");
let imageSize = "";
let currentImage;

images.on("mouseenter", function () {
  currentImage = $(this);
  images.hide();
  let heading = $("<h1></h1>").text(currentImage.eq(0).attr("alt"));
  heading.css({ "background-color": "black", "color": "white", "font-size": "20px" });
  container.prepend(heading);
  currentImage.show();
  currentImage.css({ width: "800px" });
})
.on("mouseleave", function () {
  $("#container h1").remove();
  currentImage.css({ width: "150px" });
  images.show();
});
