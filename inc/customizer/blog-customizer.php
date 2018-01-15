<?php
    // Blog customizer
    $wp_customize->add_section( 'developersite_blog_custom_section', array(
        'title' => esc_html__( 'Blog Custom', 'developersite' ),
        'priority' => 32,
        'description' => esc_html__('Customize blog entries words and others', 'developersite'),
        'active_callback' => 'is_blog',
      ));

    // Set blog title text
    $wp_customize->add_setting( 'developersite_blog_title', array(
        'default'   => esc_html__('Blog','developersite'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'	=> 'postMessage',
    ));

    $wp_customize->add_control('developersite_blog_title', array(
        'label' => esc_html__( 'Blog title' ,'developersite'),
        'section'  => 'developersite_blog_custom_section',
        'setting' => 'developersite_blog_title',
        'description' => esc_html__( 'Set Blog custom title' ,'developersite'),
        'type' => 'text',
        'active_callback' => 'is_index',
    ));

    $wp_customize->selective_refresh->add_partial( 'developersite_blog_title', array(
        'selector' => '.blog-section h1',
        'container_inclusive' => true,
        'fallback_refresh'    => true,
        
    ));  

    // Blog excerpt lenght
	$wp_customize->add_setting( 'developersite_blog_excerpt' , array(
		'default' => 40,
		'transport' => 'refresh',
		'sanitize_callback' => 'absint',
	)); 
	
	$wp_customize->add_control( 'developersite_blog_excerpt', array(
		'label'      => __( 'Post Excerpt Lenght', 'developersite' ),
		'section'    => 'developersite_blog_custom_section',
		'settings'   => 'developersite_blog_excerpt',
        'description'=> esc_html__('Set post excerpt lenght','developersite'),
        'type' => 'select',
        'choices' => array( 
            10 => '10', 
            20 => '20',
            30 => '30',
            40 => esc_html__( '40 (default)', 'developersite' ),
            50 => '50', 
            60 => '60',
            70 => '70',
            80 => '80',
            90 => '90',
            100000 => esc_html__('All Content','developersite'),
        ),
        'active_callback' => 'is_index',
    ));
    
    // show/hidde related post on single template

    //checkbos show/hidde menu social
    $wp_customize->add_setting( 'show_related_posts' , array(
        'default'           => true,
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'developersite_sanitize_checkbox',

    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'show_related_posts', array(
        'label'      => esc_html__( 'Related Posts Show/Hidde', 'developersite' ),
        'section'    => 'developersite_blog_custom_section',
        'settings'   => 'show_related_posts',
        'description'=> esc_html__('Show/Hidde Related posts section on posts details','developersite'),
        'type'      => 'checkbox',
        'active_callback' => 'is_details',
    )));