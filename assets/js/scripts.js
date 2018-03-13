(function($, root, undefined) {

    $(function() {

        var $sidebar = $('.main-sidebar');
        var top = $sidebar.offset().top;
        var barHeight = $sidebar.outerHeight(true);
        var mainHeight = $('main').outerHeight(true);
        var winHeight = $(window).outerHeight(true);
        var gap = 0;


        if ($(window).width() > 768) {

            $(window).on('scroll', function() {

                var scrollTop = $(this).scrollTop();
                // sidebar reached the (end - viewport height)
                if (scrollTop + winHeight >= top + barHeight + gap) {
                    // if so, fix the sidebar and make sure that offset().top will not give us results which would cancel the fixation
                    $sidebar.addClass('fixed').css('top', winHeight - barHeight + 'px');
                } else {
                    // otherwise remove it
                    $sidebar.removeClass('fixed').css('top', '0px');
                }

            });

            if (barHeight => mainHeight) {
                $('main').css('min-height', barHeight + 'px');
            }

        }

        $('.site-footer .icon-chevron-up').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });

        $('.gallery a').each(function() {
            $(this).attr({ 'data-lightbox': $(this).parent().parent().parent().attr('id') });
        });

        $('.icon-menu').on('click', function(e) {
            $('.navigation-bar').toggleClass('open');
            
        });

        AOS.init();

    });

})(jQuery, this);