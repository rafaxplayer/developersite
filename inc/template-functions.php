<?php
    function developersite_get_avatar_image($avatar_image){
        
        if(!isset($avatar_image) || empty($avatar_image)){
            $avatar_image =  get_template_directory_uri().'/assets/images/user.jpg';
        }
        return esc_url($avatar_image);
    }

    function developersite_get_svg($iconid){
        return "<svg class='icon icon-$iconid'><use xlink:href='#icon-$iconid'></use></svg>";
    }

    function developersite_get_separator($mode=''){

        $style = 'separator';
        if($mode === 'dark'){
            $style = 'separator dark';

        }
        return "<div class='$style'><div><svg class='icon-rombo'><use xlink:href='#icon-rombo'></use></svg></div></div>";
    }
?>