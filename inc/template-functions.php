<?php
    function developersite_get_avatar_image($avatar_image){
        
        if(!$avatar_image){
            $avatar_image =  trailingslashit(get_template_directory_uri()).'/assets/images/user.jpg';
        }
        return esc_url($avatar_image);
    }
?>