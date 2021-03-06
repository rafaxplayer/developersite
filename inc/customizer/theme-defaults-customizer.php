<?php

    if( !function_exists('developersite_default_theme_options' )){

        function developersite_default_theme_options(){

            $defaults = array();

            $defaults['developersite_header_color'] = '#253e44';

            $defaults['developersite_social_menu_color'] = '#27292B';

            $defaults['developersite_aside_nav_color'] = '#0e0e0e';

            $defaults['developersite_links_color'] = '#39879a';

            $defaults['developersite_titles_color'] = '#0e0e0e';
           
            $defaults['developersite_show_menu_social'] = false;

            $defaults['developersite_show_social_share']=true;

            $defaults['developersite_empty_string'] = '';

            $defaults['developersite_blog_title'] = esc_html__('Blog','developersite');

            $defaults['developersite_blog_excerpt'] = 40;

            $defaults['developersite_footer_text'] = sprintf(esc_html__('&copy;%s Developer&Site Theme.','developersite'), date('Y'));

            $defaults['developersite_show_related_posts'] = true;
                                   
            $defaults['developersite_avatar_show'] = true;

            $defaults['developersite_avatar_header_show'] = true;

            $defaults['developersite_avatar'] = esc_url( trailingslashit(get_template_directory_uri()).'/assets/images/user.jpg');

            return $defaults;
        }
        


    }