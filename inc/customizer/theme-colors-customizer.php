<?php  
    //Theme general customizer
    $wp_customize->add_section( 'developersite_colors_section' , array(
	    'title'	=> esc_html__( 'Theme Colors', 'developersite' ),
	    'priority'	=> 31,
	    'description' => esc_html__('Set theme colors','developersite'),
	));

	//header color
	$wp_customize->add_setting( 'developersite_header_color' , array(
		'default' => '#253e44',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)); 
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_header_color', array(
		'label'      => __( 'Header Back Color', 'developersite' ),
		'section'    => 'developersite_colors_section',
		'settings'   => 'developersite_header_color',
		'description'=> esc_html__('Set first sidebar section color background','developersite')
	)));

	$wp_customize->selective_refresh->add_partial( 'developersite_header_color', array(
		'selector' => '.main-sidebar',
		'container_inclusive' => true,
		'fallback_refresh' => false, 
	));
	
	//menu social background color
	$wp_customize->add_setting( 'developersite_social_menu_color' , array(
		'default'  => '#27292B',
		'transport'	=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	)); 

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_social_menu_color', array(
		'label' => esc_html__( 'Menu Social Back Color', 'developersite' ),
		'section' => 'developersite_colors_section',
		'settings' => 'developersite_social_menu_color',
		'description'=> esc_html__('Set menu social background color','developersite'),
	)));

	$wp_customize->selective_refresh->add_partial( 'developersite_social_menu_color', array(
		'selector' => '.social',
		'container_inclusive' => true,
		'fallback_refresh' => false, 
	));
	
	//nav aside background color
	$wp_customize->add_setting( 'developersite_aside_nav_color' , array(
		'default'   => '#0e0e0e',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));  
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_aside_nav_color' , array(
		'label'      => __( 'Sidebar Back Color', 'developersite' ),
		'section'    => 'developersite_colors_section',
		'settings'   => 'developersite_aside_nav_color',
		'description'=> esc_html__('Set widgets bar and main menu background color','developersite'),
	)));

	$wp_customize->selective_refresh->add_partial( 'developersite_aside_nav_color', array(
		'selector' => '.nav',
		'container_inclusive' => true,
		'fallback_refresh'    => false, 
	));

	//Links colors
     $wp_customize->add_setting( 'developersite_links_color' , array(
		'default'   => '#39879a',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_links_color', array(
		'label'      =>  __( 'Links Color', 'developersite' ),
		'section'    => 'developersite_colors_section',
		'settings'   => 'developersite_links_color',
		'description'=> esc_html__('Set all links color','developersite'),
    )));

    //tiltes color
    $wp_customize->add_setting( 'developersite_titles_color' , array(
		'default'   => '#0e0e0e',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_titles_color', array(
		'label'      =>  esc_html__( 'Titles Color', 'developersite' ),
		'section'    => 'developersite_colors_section',
		'settings'   => 'developersite_titles_color',
		'description'=> esc_html__('Set all titles color','developersite'),
	) ) ); 
	
?>