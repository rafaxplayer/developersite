(function($) {
    // Obliga a crear post con imagen destacada
    $(function() {
        $('#post').submit(function() {

            if ($("#set-post-thumbnail").find('img').size() > 0) {
                return true;
            } else {
                alert("¡No olvides establecer una imagen destacada!");
                return false;
            }
            return false;

        });
    });
})(jQuery);