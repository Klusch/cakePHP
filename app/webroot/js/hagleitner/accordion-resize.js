function resizeHelper() {

    width = $(".grid").width() - 45;
    if (width > 1060) {
        width = 1060;
    }


    $("div #accordion-list").css({"width": ""}).attr("style", function(i, s) {
        return s + ";width: " + width + "px !important;";
    })

    if (width < 230) {
        $("div #accordion-summary").hide();
    } else {
        $("div #accordion-summary").show();
    }
}

(function execute() {
    $(document).ready(function() {
        resizeHelper();
    });

    $(window).resize(function() {
        resizeHelper();
    });
})();
