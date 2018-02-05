(function($) {
    // Allow real-time updating of the theme customizer
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title').text(to);
        });
    });
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    wp.customize('developersite_blog_title', function(value) {
        value.bind(function(to) {
            $('.blog-section h1').text(to);
        });
    });

    wp.customize('developersite_footer_text', function(value) {
        value.bind(function(to) {
            $('.site-info').text(to);
        });
    });

    wp.customize('developersite_contact_address', function(value) {
        value.bind(function(to) {
            $('#contact-address a').text(to);
        });
    });

    wp.customize('developersite_contact_phone', function(value) {
        value.bind(function(to) {
            $('#contact-phone a').text(to);
        });
    });

    wp.customize('developersite_contact_whatsapp', function(value) {
        value.bind(function(to) {
            $('#contact-whatsapp a').text(to);
        });
    });

    wp.customize('developersite_contact_email', function(value) {
        value.bind(function(to) {
            $('#contact-email a').text(to);
        });
    });

})(jQuery);