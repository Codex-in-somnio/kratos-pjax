$(function () {
    $(window).resize(resizeVideo);
	resizeVideo();
});

function resizeVideo() {
	$.each($(".kWidgetIframeContainer"), function() {
        aspectRatio = $(this).data("aspect-ratio")
        if ($(this).data("aspect-ratio") === undefined) {
            width = $(this).width();
            height = $(this).height();
            aspectRatio = width / height;
            $(this).data("aspect-ratio", aspectRatio);
            $(this).css("max-width", "100%");
        }
        width = $(this).width();
        $(this).css("height", width / aspectRatio + "px");
	});
}