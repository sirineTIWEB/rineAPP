// mobile's menu

jQuery(document).ready(function($) {
    $('#burger').click(function() {
        var menu = $('.mobilemenu');
        if (menu.height() === 0) {
            // Open menu: animate from 0 to auto height
            var autoHeight = menu.css('height', 'auto').height();
            menu.height(0).animate({ height: autoHeight }, 300);
        } else {
            // Close menu: animate height back to 0
            menu.animate({ height: 0 }, 300);
        }

        var expanded = $(this).attr('aria-expanded') === 'true' ? 'false' : 'true';
        $(this).attr('aria-expanded', expanded);
    });

});
