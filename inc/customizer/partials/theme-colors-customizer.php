<?php  

	
	$colors = array();

	//header color
	$colors[] = array(
		'slug'	=>	'developersite_header_color', 
		'default' => $defaults['developersite_header_color'],
		'label' =>	 __( 'Header Back Color', 'developersite' ),
		'description' => __('Set first sidebar section color background','developersite'),
		'selector' => '.main-sidebar',
		);

	//menu social background color	
	$colors[] = array(
		'slug'	=>	'developersite_social_menu_color', 
		'default' => $defaults['developersite_social_menu_color'],
		'label' => 	__( 'Menu Social Back Color', 'developersite' ),
		'description' => __('Set menu social background color','developersite'),
		'selector' => '.social',
		);

	//nav aside background color
	$colors[] = array(
		'slug'	=>	'developersite_aside_nav_color', 
		'default' => $defaults['developersite_aside_nav_color'],
		'label' =>	__( 'Sidebar Back Color', 'developersite' ),
		'description' =>	__('Set widgets bar and main menu background color','developersite'),
		'selector' => '.nav',
		);

	//Links colors
	$colors[] = array(
		'slug'	=>	'developersite_links_color', 
		'default' => $defaults['developersite_links_color'],
		'label' =>	__( 'Links Color', 'developersite' ),
		'description' =>	__('Set all links color','developersite'),
		'selector' => '.nav',
		);
		
	//Titles color
	$colors[] = array(
		'slug'	=>	'developersite_titles_color', 
		'default' => $defaults['developersite_titles_color'],
		'label' =>	__( 'Titles Color', 'developersite' ),
		'description' =>	__('Set blog titles color','developersite'),
		'selector' => '.nav',
		);
	

	foreach( $colors as $devsite_colors ) {
		
		//Settings
		$wp_customize->add_setting( $devsite_colors['slug'], array(
			'default' => $devsite_colors['default'],
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)); 
		//controls
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $devsite_colors['slug'], array(
			'label'      => $devsite_colors['label'],
			'section'    => 'colors',
			'settings'   => $devsite_colors['slug'],
			'description'=> $devsite_colors['description']
		)));

		if( $devsite_colors['slug'] == 'developersite_links_color' || $devsite_colors['slug'] == 'developersite_titles_color' ){
			//Selective
			continue;
		} 
		$wp_customize->selective_refresh->add_partial( $devsite_colors['slug'], array(
			'selector' => $devsite_colors['selector'],
			'container_inclusive' => true,
			'fallback_refresh' => false, 
		));
	}

	
?>