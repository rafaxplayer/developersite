<?php
    function admin_options(){
        add_theme_page( 'Dev&Site Options', 'Theme Options','administrator', 'admin_options','developersite_options_function' );
        add_action( 'admin_init', 'register_options' );
    }
         
    function register_options(){
        
        register_setting( 'theme_optionsgroup1', 'developersite_footer_text' );
        register_setting( 'theme_optionsgroup2', 'developersite_maps_show');
        register_setting( 'theme_optionsgroup2', 'developersite_maps_lat');
        register_setting( 'theme_optionsgroup2', 'developersite_maps_long');
        register_setting( 'theme_optionsgroup2', 'developersite_maps_zoom');
        register_setting( 'theme_optionsgroup2', 'developersite_maps_apikey');
        register_setting( 'theme_optionsgroup2', 'developersite_contact_address');
        register_setting( 'theme_optionsgroup2', 'developersite_contact_phone');
        register_setting( 'theme_optionsgroup2', 'developersite_contact_whatsapp');
        register_setting( 'theme_optionsgroup2', 'developersite_contact_email' );
    }

    //Set General settings function
    function developersite_options_function(){ 

        require_once(get_template_directory().'/inc/admin-page/adminpage-settings.php');
        require_once(get_template_directory().'/inc/admin-page/adminpage-settings-template-contact.php');
    }
    
    add_action( 'admin_menu', 'admin_options');
?>