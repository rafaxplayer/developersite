<?php
/**
 * Theme Customizer settings.
 *
 * @package developersite 
 * @since 1.7 
 */
/**
 * Theme customizer settings with real-time update
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @since 1.5
 */
function developersite_theme_customizer( $wp_customize ) {

	$defaults = developersite_default_theme_options();
	
	if( file_exists( trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-templates-customizer.php')){
		require_once trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-templates-customizer.php';
	}

	if( file_exists( trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-blog-customizer.php')){
		require_once trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-blog-customizer.php';
	}

	if( file_exists( trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-menu-social-customizer.php')){		
		require_once trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-menu-social-customizer.php';
	}

	if( file_exists( trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-colors-customizer.php')){		
		require_once trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-colors-customizer.php';
	}

	if( file_exists( trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-footer-customizer.php')){		
		require_once trailingslashit( get_template_directory() ). '/inc/customizer/partials/theme-footer-customizer.php';
	}

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport ='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title',
		'render_callback' => 'developersite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'developersite_customize_partial_blogdescription',
	) );

	//Show/Hidde avatar
    $wp_customize->add_setting( 'developersite_avatar_header_show', array(
		'default'   => $defaults['developersite_avatar_header_show'] ,
		'sanitize_callback' => 'developersite_sanitize_checkbox',
        'transport'	=> 'refresh',
    ));

    $wp_customize->add_control('developersite_avatar_header_show' , array(
        'label' => esc_html__('Avatar Show/hidde','developersite'),
        'section' => 'title_tagline',
        'setting'=>'developersite_avatar_header_show',
        'description' => esc_html__('show or hide avatar','developersite'),
        'type' => 'checkbox'
        
	));
	
	// avatar image
	$wp_customize->add_setting( 'developersite_avatar', array(
		'default' => $defaults['developersite_avatar'],
		'sanitize_callback' => 'esc_url_raw',
	) ); 

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'developersite_avatar', array(
		'label'    => __( 'Avatar', 'developersite' ),
		'section'  => 'title_tagline',
		'settings' => 'developersite_avatar',
		'description'=> esc_html__('Set personal avatar for admintrator site','developersite')
	)));
	
	$wp_customize->selective_refresh->add_partial( 'developersite_avatar', array(
		'selector' => '.admin-content a',
		'render_callback' => 'developersite_customize_avatar',
		'container_inclusive' => true,
		'fallback_refresh'    => false, 
	) );
	
			 
	 
}
add_action('customize_register', 'developersite_theme_customizer');

function is_blog() {
    return ( is_archive() || is_author() || is_category() || is_single() || is_home() || is_tag()) && 'post' == get_post_type();
}

function is_index(){
	return ( is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type();
}

function is_details(){
	return (is_single());
}


function developersite_sanitize_checkbox( $checked ){
    //returns true if checkbox is checked
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

function developersite_customize_avatar() {
	return get_theme_mod( 'developersite_avatar');
}

function developersite_customize_avatar_show() {
	return get_theme_mod( 'developersite_avatar_show');
}

function developersite_customize_partial_blogname() {
	bloginfo( 'name' );
}

 function developersite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function developersite_customize_partial_blogtitle() {

	return get_theme_mod( 'developersite_blog_title' );
}  

function developersite_customize_partial_footer_text() {

	return get_theme_mod( 'developersite_footer_text' );
}


?>