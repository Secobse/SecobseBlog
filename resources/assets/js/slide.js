$(document).ready(function(){
    $(".wel-header-finger").click(function() {
        var href = $(this).attr("href");
        var pos = $(href).offset().top;
        $("html, body").animate({
            scrollTop: pos
        }, 1000);
        return false;
    });

    $(".wel-content-finger").click(function() {
        var href = $(this).attr("href");
        var pos = $(href).offset().top;
        $("html, body").animate({
            scrollTop: pos
        }, 1000);
        return false;
    });
});
