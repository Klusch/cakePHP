
$(function polling() {
    $.ajax({
        url: '/Messages/index',
        success: function(data) {
           $('.result').html(data); // An das Element .result anhängen
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(polling, 50000);
        }
    });
})();

