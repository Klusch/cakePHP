(function execute() {
    $(document).ready(function() {
        browserResizeHelper();
    });

    $(window).resize(function() {
        browserResizeHelper();
    });
})();

function browserResizeHelper() {
    var winwidth = $(window).width();
    var infoWidth = 260;
    var width = winwidth - 20 - infoWidth;
    if (width > 1280) {
        width = 1280;
    }

    $("#content-hgl").css({'width': ''}).attr('style', function(i, s) {
        return s + '; width: ' + width + 'px !important;'
    })
    
    $(".FlexibleWidthObject").css({'width': ''}).attr('style', function(i, s) {
        return s + '; width: ' + width + 'px !important;'
    })

    if (width < 1000) {
        if (width < 600) {
            $("nav.breadcrumbs").addClass('mini');
        } else {
            $("nav.breadcrumbs").addClass('small');
        }
    }
}
