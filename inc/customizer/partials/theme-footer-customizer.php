<?php
    
    //footer text info
    $wp_customize->add_section( 'developersite_footer_section', array(
        'title' => esc_html__( 'Footer options', 'developersite' ),
        'priority' => 50,
        'description' => esc_html__('Enter your contact information and Google maps data', 'developersite'),
        
    ));
    //address
    $wp_customize->add_setting( 'developersite_footer_text', array(
        'default'   => $defaults['developersite_footer_text'] ,
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'postMessage',
    ));

    $wp_customize->add_control('developersite_footer_text' , array(
        'label' => esc_html__('Footer text','developersite'),
        'section' => 'developersite_footer_section',
        'setting'=>'developersite_footer_text',
        'description' => esc_html__('Enter your footer text info','developersite')
        
        
    ));

    $wp_customize->selective_refresh->add_partial('developersite_footer_text' , array(
        'selector' => '.site-info',
        'container_inclusive' => false,
        'render_callback'=> 'developersite_customize_partial_footer_text'
         
    ));