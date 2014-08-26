function addSequenzToAdd(sequenz) {
    $('#preselection').attr('href', '/users/add/' + sequenz);
}

$('#parent-accordion').click(function() {
    $(this).children('div').each(function() {
        $(this).children('a').each(function() {
            var myClass = $(this).attr('class');
            
            if (myClass.indexOf("collapsed") < 0) {  
                
                var str = $(this).attr('id');
              
                if (str.toLowerCase().indexOf("hagleitner") >= 0) {
                    addSequenzToAdd(1);
                }
                if (str.toLowerCase().indexOf("administrator") >= 0) {
                    addSequenzToAdd(2);
                }                    
                if (str.toLowerCase().indexOf("supervisor") >= 0) {
                    addSequenzToAdd(3);
                }
                if (str.toLowerCase().indexOf("worker") >= 0) {
                    addSequenzToAdd(4);
                }
                
            }
        });
    });
});