function changeImage(imageSrc) {
    // Update the main image source
    $("#main-image").attr("src", imageSrc);

    // Remove the "active" class from all thumbnails
    $(".thumbnail-container img").removeClass("active");

    // Add the "active" class to the clicked thumbnail
    $(".thumbnail-container img").each(function() {
        if ($(this).attr("src").includes(imageSrc)) {
            $(this).addClass("active");
        }
    });
}

// Set the first thumbnail as active by default
$(function() {
    var $thumbnails = $(".thumbnail-container img");
    if ($thumbnails.length > 0) {
        $thumbnails.first().addClass("active");
    }
});