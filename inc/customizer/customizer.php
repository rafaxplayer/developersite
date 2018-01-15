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

	require get_template_directory() . '/inc/customizer/blog-customizer.php';
			
	require get_template_directory() . '/inc/customizer/menu-social-customizer.php';

	require get_template_directory() . '/inc/customizer/theme-colors-customizer.php';
    
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
	
	// avatar image
	$wp_customize->add_setting( 'developersite_avatar', array(
		'default'   => esc_url(get_template_directory_uri().'/assets/images/user.jpg'),
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
	return (is_blog() && is_single());
}

function developersite_sanitize_checkbox( $input ){
    //returns true if checkbox is checked
    return ( $input === true ) ? true : false;
}

function developersite_customize_avatar() {
	return get_theme_mod( 'developersite_avatar');
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

?>