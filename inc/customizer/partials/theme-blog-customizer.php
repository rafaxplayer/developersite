<?php
    // Blog customizer
    $wp_customize->add_section( 'developersite_blog_custom_section', array(
        'title' => esc_html__( 'Blog Custom', 'developersite' ),
        'priority' => 30,
        'description' => esc_html__('Customize blog entries words and others', 'developersite'),
        'active_callback' => 'is_blog',
      ));

    // Set blog title text
    $wp_customize->add_setting( 'developersite_blog_title', array(
        'default'   => $defaults['developersite_blog_title'],
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
        'container_inclusive' => false,
        'fallback_refresh'    => false,
        'render_callback'=> 'developersite_customize_partial_blogtitle',
        
    ));  

    // Blog excerpt lenght
	$wp_customize->add_setting( 'developersite_blog_excerpt' , array(
		'default' => $defaults['developersite_blog_excerpt'],
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
    
    //checkbos show/hidde menu social
    $wp_customize->add_setting( 'developersite_show_related_posts' , array(
        'default'           => $defaults['developersite_show_related_posts'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'developersite_sanitize_checkbox',

    ) );

    $wp_customize->add_control( 'developer_show_related_posts', array(
        'label'      => esc_html__( 'Related Posts Show/Hidde', 'developersite' ),
        'section'    => 'developersite_blog_custom_section',
        'settings'   => 'developersite_show_related_posts',
        'description'=> esc_html__('Related posts section on posts details. Only if there are labels on the entries that relate them','developersite'),
        'type'      => 'checkbox',
        'active_callback' => 'is_details',
    ));

    //checkbos show/hidde menu social
    $wp_customize->add_setting( 'developersite_show_social_share' , array(
        'default'           => $defaults['developersite_show_social_share'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'developersite_sanitize_checkbox',

    ) );

    $wp_customize->add_control( 'developer_show_social_share_control', array(
        'label'      => esc_html__( 'Social share Show/Hidde', 'developersite' ),
        'section'    => 'developersite_blog_custom_section',
        'settings'   => 'developersite_show_social_share',
        'description'=> esc_html__('Social share panel on posts details.','developersite'),
        'type'      => 'checkbox',
        'active_callback' => 'is_details',
    ));