<?php
    
     // Templates customizer
     $wp_customize->add_panel( 'developersite_templates_options', array(
            'title'      => esc_html__( 'Templates settings', 'developersite' ),
            'priority'   => 35,
            'capability' => 'edit_theme_options',
            'active_callback' => 'is_template',
    )); 

    //Template contact
    $wp_customize->add_section( 'developersite_template_contact_section', array(
        'title' => esc_html__( 'Templates contact settings', 'developersite' ),
        'priority' => 100,
        'description' => esc_html__('Enter your contact information and Google maps data', 'developersite'),
        'active_callback' => 'is_template_contact',
        'panel' =>  'developersite_templates_options',
    ));
    //address
    $wp_customize->add_setting( 'developersite_contact_address', array(
        'default'   => $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('developersite_contact_address' , array(
        'label' => esc_html__('Address','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'=>'developersite_contact_address',
        'description' => esc_html__('Set address','developersite'),
        'type' => 'text'
        
    ));
    // phone
    $wp_customize->add_setting( 'developersite_contact_phone', array(
        'default'   => $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('developersite_contact_phone' , array(
        'label' => esc_html__('Phone','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'=>'developersite_contact_phone',
        'description' => esc_html__('Set Phone','developersite'),
        'type' => 'text'
        
    ));

    //whatssap
    $wp_customize->add_setting( 'developersite_contact_whatsapp', array(
        'default'   => $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('developersite_contact_whatsapp' , array(
        'label' => esc_html__('Whatsapp','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'=>'developersite_contact_whatsapp',
        'description' => esc_html__('Set whatsapp','developersite'),
        'type' => 'text'
        
    ));
    //email
    $wp_customize->add_setting( 'developersite_contact_email', array(
        'default'   => $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('developersite_contact_email' , array(
        'label' => esc_html__('Email','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'=>'developersite_contact_email',
        'description' => esc_html__('Set email for contact form, by default the administrator email will be used','developersite'),
        'type' => 'text'
        
    ));

    //Maps data
    // show or hidde map
    $wp_customize->add_setting( 'developersite_maps_show', array(
        'default'   => $defaults['developersite_maps_show'] ,
        'type' => 'option',
        'sanitize_callback' => 'developersite_sanitize_checkbox',
        'transport'	=> 'refresh',
    ));

    $wp_customize->add_control('developersite_maps_show' , array(
        'label' => esc_html__('Google Maps','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'=>'developersite_maps_show',
        'description' => esc_html__('show or hide google map in the contact template','developersite'),
        'type' => 'checkbox'
        
    ));
    
    //Maps latitude
    $wp_customize->add_setting( 'developersite_maps_lat', array(
        'default'   =>  $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'refresh',
    ));
    $wp_customize->add_control('developersite_maps_lat' , array(
        'label' => esc_html__('Google Maps latitude','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'   =>  'developersite_maps_lat',
        'description' => esc_html__('Enter your latitude for the map','developersite'),
    ));

    //Maps longitude
    $wp_customize->add_setting( 'developersite_maps_long', array(
        'default'   =>  $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'refresh',
    ));
    $wp_customize->add_control('developersite_maps_long' , array(
        'label' => esc_html__('Google Maps longitude','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'   => 'developersite_maps_long',
        'description' => esc_html__('Enter your longitude for the map','developersite'),
    ));

     //Maps zoom
     $wp_customize->add_setting( 'developersite_maps_zoom', array(
        'default'   =>  $defaults['developersite_maps_zoom'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'refresh',
    ));
    $wp_customize->add_control('developersite_maps_zoom' , array(
        'label' => esc_html__('Google Maps zoom','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'   => 'developersite_maps_zoom',
        'description' => esc_html__('Enter your zoom value for the map','developersite'),
    ));

    //Maps Api key
    $wp_customize->add_setting( 'developersite_maps_apikey', array(
        'default'   =>  $defaults['developersite_empty_string'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'refresh'
    ));
    $wp_customize->add_control('developersite_maps_apikey' , array(
        'label' => esc_html__('Google Maps api key','developersite'),
        'section' => 'developersite_template_contact_section',
        'setting'   => 'developersite_maps_apikey',
        'description' => esc_html__('Enter your Google maps api key','developersite'),
    ));

    //End Template contact
    //Template About
    $wp_customize->add_section( 'developersite_template_about_section', array(
        'title' => esc_html__( 'Templates about settings', 'developersite' ),
        'priority' => 100,
        'description' =>'',
        'active_callback' => 'is_template_about',
        'panel' =>  'developersite_templates_options',
    ));

    //Show/Hidde avatar
    $wp_customize->add_setting( 'developersite_avatar_show', array(
        'default'   => $defaults['developersite_avatar_show'] ,
        'type' => 'option',
        'sanitize_callback' => 'developersite_sanitize_checkbox',
        'transport'	=> 'refresh',
    ));

    $wp_customize->add_control('developersite_avatar_show' , array(
        'label' => esc_html__('Avatar Show/hidde','developersite'),
        'section' => 'developersite_template_about_section',
        'setting'=>'developersite_avatar_show',
        'description' => esc_html__('show or hide avatar in the about template','developersite'),
        'type' => 'checkbox'
        
    ));

    
 ?>

    