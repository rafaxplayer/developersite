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

        
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'developersite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
        ) ) );
        
        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', array(
            'width'       => 250,
            'height'      => 250,
            'flex-height' => true
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        
    
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

        add_theme_support('starter-content', array(
            // Static front page set to Home, posts page set to Blog
            'options' => array(
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{blog}}',
            ),
            // Starter pages to include
            'posts' => array(
                'home',
                'about' =>array(
                    'thumbnail'=>'{{image-about}}'
                ),
                'contact' =>array(
                    'thumbnail'=>'{{image-contact}}'
                ),
                'blog',
            ),
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
            'nav_menus' => array(
                'header-menu' => array(
                    'name' => esc_html__('Primary Navigation','developersite'),
                    'items' => array(
                        'home_link',
                        'page_about',
                        'page_blog',
                        'page_contact',
                    ),
                ),
            ),
            
        ));

    }
    //Add image sizes
    add_image_size( 'developersite-post', 800, 400, true );

    add_image_size( 'developersite-post-min', 800, 300, true );
    
    add_image_size( 'developersite-page', 1038, 576, true );
       
    add_image_size('related-post', 300, 200, true);

     // register menu positions
     register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Principal Menu', 'developersite')// Main Navigation
    ));

    // Localisation Support
    load_theme_textdomain('developersite', get_template_directory() . '/languages');
       
}
add_action('after_setup_theme','developersite_setup');

// customize
function developersite_customize_css()
{
    ?>
         <style type="text/css">
             .main-sidebar,.social-share{ background-color: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
             .main-sidebar .navigation-bar nav.social { background: <?php echo get_theme_mod('developersite_social_menu_color', '#27292B'); ?>; }
             .main-sidebar .navigation-bar{ background-color: <?php echo get_theme_mod('developersite_aside_nav_color', '#0e0e0e'); ?>; }
             a{ color:<?php echo get_theme_mod('developersite_links_color', '#39879a'); ?>;}
             .post .post-title a, .page-title{ color: <?php echo get_theme_mod('developersite_titles_color', '#0e0e0e'); ?>;}
             @media (max-width: 480px){
                .main-sidebar .navigation-bar nav.social { background-color: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
                .main-sidebar .navigation-bar{ background-color: <?php echo get_theme_mod('developersite_header_color', '#253e44'); ?>; }
             } 

         </style>
    <?php
}
// add javascript for the customizeer
function developersite_customizer_live_preview()
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


// Load developersite scripts (header.php)
function developersite_scripts()
{

        wp_register_style('normalize', get_template_directory_uri() . '/assets/css/normalize.min.css', array(), '1.0', 'all');
        wp_enqueue_style('normalize'); // Enqueue it!
    
        wp_register_style('aos_css', get_template_directory_uri() . '/assets/css/aos.css', array(), '', 'all');
        wp_enqueue_style('aos_css'); // Enqueue it!
    
        wp_register_style('lightbox_css', get_template_directory_uri() . '/assets/css/lightbox.min.css', array(), '3.2.1 ', 'all');
        wp_enqueue_style('lightbox_css'); // Enqueue it!

        wp_register_style('developersite-icons', get_template_directory_uri() . '/assets/css/icomoon.css', array(), '', 'all');
        wp_enqueue_style('developersite-icons'); // Enqueue it!
    
        wp_register_style('fontlato', 'https://fonts.googleapis.com/css?family=Lato:100i,300,300i,400,400i,700,700i,900,900i', array(), '1.0', 'all');
        wp_enqueue_style('fontlato'); // Enqueue it!
        
        wp_register_style('developersite', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
        wp_enqueue_style('developersite'); // Enqueue it!
        
        wp_register_script('aos_js', get_template_directory_uri() . '/assets/js/lib/aos.js', array(), '',true); // animation library
        wp_enqueue_script('aos_js'); // Enqueue it!
        
        wp_register_script('lightbox', get_template_directory_uri() . '/assets/js/lib/lightbox.min.js', array('jquery'), '3.2.1',true); // Modernizr
        wp_enqueue_script('lightbox'); // Enqueue it!

        wp_register_script('developersite-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0',true); // Custom scripts
        wp_enqueue_script('developersite-scripts'); // Enqueue it!
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        
}
function twentyseventeen_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/assets/fonts/symbol-defs.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'twentyseventeen_include_svg_icons', 9999 );

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
function developersite_widgets_init()
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'developersite'),
        'description' => __('Description for this widget-area...', 'developersite'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wid-title">',
        'after_title' => '</h3>'
    ));
   
}


// read more
function developersite_readmore($link)
{
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
function developersite_wp_excerpt()
{
    global $post;
    add_filter('excerpt_length', function(){
        return get_theme_mod('developersite_blog_excerpt', 40);
    },999);
    
    if (function_exists('developersite_readmore')) {
        add_filter('excerpt_more', 'developersite_readmore');
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>'; 
    echo $output;
}



// Custom Gravatar in Settings > Discussion
function developersite_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . 'assets/images/avatar.png';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}


//remove tags widget cloud parentheses
function developersite_tagcloud_postcount_filter ($variable) 
{
    $variable = str_replace('<span class="tag-link-count"> (', ' <span class="post_count"> ', $variable);
    $variable = str_replace(')</span>', '</span>', $variable);
    return $variable;
}

// Automatically set the image Title, Alt-Text, Caption & Description upon upload
function developersite_add_img_title( $attr, $attachment = null ) {
    global $post;
    $img_title = trim( strip_tags( $attachment->post_title ) );
 
    $attr['title'] = $img_title;
    $attr['alt'] = $img_title;
 
    return $attr;
}



/*------------------------------------*\
	Actions + Filters 
\*------------------------------------*/

// Add Actions
add_action('wp_print_scripts', 'developersite_conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_enqueue_scripts', 'developersite_scripts'); // Add Theme Stylesheet
add_action('widgets_init', 'developersite_widgets_init' );
add_action('customize_preview_init', 'developersite_customizer_live_preview');
add_action('wp_head', 'developersite_customize_css');

// Add Filters
add_filter('avatar_defaults', 'developersite_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'developersite_add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_tag_cloud','developersite_tagcloud_postcount_filter');
add_filter('use_default_gallery_style', '__return_false' ); //remove default stylesheet´s for galleries
add_filter('wp_get_attachment_image_attributes','developersite_add_img_title', 10, 2 );//Automatically set the image Title, Alt-Text, Caption & Description upon upload

if(file_exists( trailingslashit(get_template_directory()) . '/inc/customizer/theme-defaults-customizer.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/customizer/theme-defaults-customizer.php';
}

if(file_exists( trailingslashit(get_template_directory()) . '/inc/customizer/customizer.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/customizer/customizer.php';
}
    
if(file_exists( trailingslashit(get_template_directory()) . '/inc/template-functions.php')){
    require_once  trailingslashit(get_template_directory()) . '/inc/template-functions.php';
}

?>
