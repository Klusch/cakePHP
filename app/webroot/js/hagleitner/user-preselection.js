function addSequenzToAdd(sequenz) {
    $('#preselection').attr('href', '/users/add/' + sequenz);
}

$('#parent-accordion').click(function() {
    $(this).children('div').each(function() {
        $(this).children('a').each(function() {
            var myClass = $(this).attr('class');
            if (myClass.indexOf("collapsed") < 0) {
                var heading = $(this).find('#accordion-heading').text();
                heading = $.trim(heading);
                switch (heading) {
                    case ('Hagleitner-Techniker') :
                        addSequenzToAdd(1);
                        break;
                    case 'Lokaler Administrator' :
                        addSequenzToAdd(2);
                        break;
                    case 'Reinigungs-Koordinator' :
                        addSequenzToAdd(3);
                        break;
                    default:
                        addSequenzToAdd(4);
                }
            }
        });
    });
});