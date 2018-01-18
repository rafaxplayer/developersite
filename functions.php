<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

function developersite_setup () {

    if (function_exists('add_theme_support'))
    {
        // Add Menu Support
        add_theme_support('menus');

        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');

        add_theme_support( "title-tag" );
        
    
        // Enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');
        
        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        add_theme_support('starter-content', [
            // Static front page set to Home, posts page set to Blog
            'options' => [
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{blog}}',
            ],
            // Starter pages to include
            'posts' => [
                'home',
                'about' =>[
                    'template'=> 'template-about.php',
                    'thumbnail'=>'{{image-about}}',
                    'post_content' => '<p>'.__('Use template-about for page about','developersite').'</p>',
                ],
                'contact' =>[
                    'template'=> 'template-contact.php',
                    'thumbnail'=>'{{image-contact}}',
                    'post_content' => '<p>'.__('Use template-contact for page contact and set settings in admin panel developersite Options','developersite').'</p>',
                ],
                'blog'
            ],
            'attachments' => array(
                'image-about' => array(
                    'post_title' => 'Featured Logo',
                    'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' => 'assets/images/placeholder.jpg',
                ),
                'image-contact' => array(
                    'post_title' => 'Featured Logo',
                    'post_content' => 'Attachment Description',
                    'post_excerpt' => 'Attachment Caption',
                    'file' => 'assets/images/contact-me.jpg',
                ),
            ),
            // Add pages to primary navigation menu
            'nav_menus' => [
                'header-menu' => [
                    'name' => esc_html__('Primary Navigation','developersite'),
                    'items' => [
                        'home_link',
                        'page_about',
                        'page_blog',
                        'page_contact',
                    ],
                ]
            ],
            
        ]);

    }
    // Localisation Support
    load_theme_textdomain('developersite', get_template_directory() . '/languages');

    //custom images sizes
    add_image_size('page', 1000, 400, true);
    add_image_size('post-single', 1000, 250, true);
    add_image_size('post', 800, 200, true); 
    add_image_size('related-post', 300, 200, true);
    
       
}
add_action('after_setup_theme','developersite_setup');

// customize
function developersite_customize_css()
{
    ?>
         <style type="text/css">
             .main-sidebar{ background: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
             .main-sidebar .navigation-bar nav.social { background: <?php echo get_theme_mod('developersite_social_menu_color', '#27292B'); ?>; }
             .main-sidebar .navigation-bar{ background: <?php echo get_theme_mod('developersite_aside_nav_color', '#0e0e0e'); ?>; }
             a{ color:<?php echo get_theme_mod('developersite_links_color', '#39879a'); ?>;}
             .post .post-title a, .page-title{ color: <?php echo get_theme_mod('developersite_titles_color', '#0e0e0e'); ?>;}
             @media (max-width: 480px){
                .main-sidebar .navigation-bar nav.social { background: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
                .main-sidebar .navigation-bar{ background: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
             } 
         </style>
    <?php
}



function developersite_customizer_live_preview () 
{ 
	wp_enqueue_script ( 
		  'developersite-themecustomizer', // Dale al script un ID 
		  get_template_directory_uri (). '/assets/js/customizer.js',//Archivo de punto a archivo 
		  (' jquery '), // Definir dependencias 
		  '1.0 ', // Definir una versión (opcional) 
		  true // Put secuencia de comandos en el pie de página? 
	); 
} 


/*------------------------------------*\
	Functions
\*------------------------------------*/


// developersite Blank navigation
function developersite_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     =>  'wp_page_menu',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0
            
            )
        );
}

//admin enqueue scripts
function developersite_wp_admin_scripts($hook_suffix) {

    if (in_array($hook_suffix, array('post.php', 'post-new.php'))) {
        $screen = get_current_screen();
        if(is_object( $screen ) && 'post' === $screen->post_type){
            
            wp_enqueue_script('featured-image-required',get_template_directory_uri() . '/assets/js/admin.js'); // Enqueue it!
        }
    }
}


// Load developersite scripts (header.php)
function developersite_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

                
        wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1',true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('aos', get_template_directory_uri() . '/assets/js/lib/aos.js', array(), '',true); // animation library
        wp_enqueue_script('aos'); // Enqueue it!

        
        wp_register_script('lightbox', get_template_directory_uri() . '/assets/js/lib/lightbox.min.js', array('jquery'), '3.2.1',true); // Modernizr
        wp_enqueue_script('lightbox'); // Enqueue it!

        
        wp_register_script('developersite-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0',true); // Custom scripts
        wp_enqueue_script('developersite-scripts'); // Enqueue it!

        wp_localize_script( 
            'developersite-scripts',
            'maps_options',
            array(
                'lat'   => get_option('developersite_maps_lat'),
                'long'  => get_option('developersite_maps_long'),
                'zoom'  => get_option('developersite_maps_zoom')
        ));
    }
}

// Load developersite conditional scripts 
function developersite_conditional_scripts()
{
    if (is_page_template('template-contact.php')) {
        $key = get_option( 'developersite_maps_apikey');
    	wp_register_script('maps', "https://maps.googleapis.com/maps/api/js?key=$key&callback=initMap", array(),'',true); // Maps
        wp_enqueue_script('maps'); // Enqueue it!
    }
}

// add async defer with maps js , is required
function developersite_add_async_defer($tag, $handle){

    if('maps' !== $handle){
        return $tag;
    }
    return str_replace('src','async defer src', $tag);
}



// Load developersite styles
function developersite_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/assets/css/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('lightbox_css', get_template_directory_uri() . '/assets/css/lightbox.min.css', array(), '3.2.1 ', 'all');
    wp_enqueue_style('lightbox_css'); // Enqueue it!

    wp_register_style('aos_css', get_template_directory_uri() . '/assets/css/aos.css', array(), '', 'all');
    wp_enqueue_style('aos_css'); // Enqueue it!

    wp_register_style('developersite-icons', get_template_directory_uri() . '/assets/css/icomoon.css', array(), '', 'all');
    wp_enqueue_style('developersite-icons'); // Enqueue it!

    wp_register_style('fontlato', 'https://fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900,900i', array(), '1.0', 'all');
    wp_enqueue_style('fontlato'); // Enqueue it!
    
    wp_register_style('developersite', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('developersite'); // Enqueue it!

    
}

// Register developersite Navigation
function register_developersite_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Principal Menu', 'developersite')// Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function developersite_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}


// Remove invalid rel attribute values in the categorylist
function developersite_remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function developersite_add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'developersite'),
        'description' => __('Description for this widget-area...', 'developersite'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="separator">',
        'after_title' => '</h3>'
    ));
   
}

// Remove wp_head() injected Recent Comment styles
function developersite_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}


function developersite_readmore($link){
    if ( is_admin() ) {
        return $link;
    }
    $link = sprintf( '<div class="more"><a href="%1$s">%2$s</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        __( 'READ MORE', 'developersite' ));
    
    return  $link;
}

// Create the Custom Excerpts callback
function developersitewp_excerpt()
{
    global $post;
    add_filter('excerpt_length', function(){
        return get_theme_mod('developersite_blog_excerpt', 40);
    });
    
    if (function_exists('developersite_readmore')) {
        add_filter('excerpt_more', 'developersite_readmore');
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>'; 
    echo $output;
}

// Remove 'text/css' from our enqueued stylesheet
function developersite_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function developersite_remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function developersite_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . 'assets/images/avatar.png';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function developersite_enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

//remove tags widget cloud parentheses
function developersite_tagcloud_postcount_filter ($variable) {
    $variable = str_replace('<span class="tag-link-count"> (', ' <span class="post_count"> ', $variable);
    $variable = str_replace(')</span>', '</span>', $variable);
    return $variable;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action( 'admin_enqueue_scripts', 'developersite_wp_admin_scripts' );// admin panel Custom scripts
add_action('init', 'developersite_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'developersite_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'developersite_enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'developersite_styles'); // Add Theme Stylesheet
add_action('init', 'register_developersite_menu'); // Add developersite Menu
add_action('widgets_init', 'developersite_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action( 'customize_preview_init', 'developersite_customizer_live_preview' );
add_action( 'wp_head', 'developersite_customize_css');

// Add Filters
add_filter('avatar_defaults', 'developersite_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'developersite_add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'developersite_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('wp_tag_cloud','developersite_tagcloud_postcount_filter');
add_filter( 'script_loader_tag', 'developersite_add_async_defer', 10, 2);
add_filter( 'use_default_gallery_style', '__return_false' ); //remove default stylesheet´s for galleries
add_filter('the_category', 'developersite_remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('style_loader_tag', 'developersite_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'developersite_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'developersite_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


function developersite_get_avatar_image(){

    $avatar_image = get_theme_mod('developersite_avatar');
    
    if(!$avatar_image){
        $avatar_image =  trailingslashit(get_template_directory_uri()).'/assets/images/user.jpg';
    }
    return esc_url($avatar_image);
}

if(file_exists( trailingslashit(get_template_directory()) . '/inc/customizer/theme-defaults-customizer.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/customizer/theme-defaults-customizer.php';
}

if(file_exists( trailingslashit(get_template_directory()) . '/inc/customizer/customizer.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/customizer/customizer.php';
}
    
if(file_exists( trailingslashit(get_template_directory()) . '/inc/dev-site-config.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/dev-site-config.php';
}


?>
