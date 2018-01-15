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

})(jQuery);