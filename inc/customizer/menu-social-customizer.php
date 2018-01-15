<?php
//Menu social customize
$wp_customize->add_section( 'developersite_menu_social_section', array(
    'title' => esc_html__( 'Social Menu', 'developersite' ),
    'priority' => 30,
    'description' => esc_html__('Set Menu Social icons. To delete icon leave empty fields', 'developersite'),
  ));

//checkbos show/hidde menu social
$wp_customize->add_setting( 'developersite_show_menu_social' , array(
    'default'           => false,
    'type'              => 'theme_mod',
    'transport'         => 'refresh',
    'sanitize_callback' => 'developersite_sanitize_checkbox',

) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'developersite_show_menu_social', array(
    'label'      => esc_html__( 'Menu Social Show/Hidde', 'developersite' ),
    'section'    => 'developersite_menu_social_section',
    'priority'   => 1,
    'settings'   => 'developersite_show_menu_social',
    'type'      => 'checkbox',
) ) );

//Redes Sociales: facebook
$wp_customize->add_setting( 'developersite_facebook_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_facebook_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Facebook'),
'section' => 'developersite_menu_social_section',
'description' => 'ej :https://www.facebook.com/userid',
'priority' => 2,
'type' => 'url',
));

//Redes Sociales: Twitter
$wp_customize->add_setting( 'developersite_twitter_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_twitter_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Twitter'),
'section' => 'developersite_menu_social_section',
'description' => 'ej: https://twitter.com/userid',
'priority' => 3,
'type' => 'url',
));

//Redes Sociales: Google Plus
$wp_customize->add_setting( 'developersite_google+_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_google+_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Google Plus'),
'section' => 'developersite_menu_social_section',
'description' => 'ej :https://plus.google.com/u/0/userid',
'priority' => 4,
'type' => 'url',
));

//Redes Sociales: linkendin
$wp_customize->add_setting( 'developersite_linkendin_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_linkendin_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Linkendin'),
'section' => 'developersite_menu_social_section',
'description' => 'ej: https://www.linkedin.com/in/username/',
'priority' => 5,
'type' => 'url',
));

//Redes Sociales: github
$wp_customize->add_setting( 'developersite_github_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_github_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Github'),
'section' => 'developersite_menu_social_section',
'description' => 'ej :https://github.com/username',
'priority' => 6,
'type' => 'url',
));

//Redes Sociales: pinterest
$wp_customize->add_setting( 'developersite_pinterest_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_pinterest_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Pinterest'),
'section' => 'developersite_menu_social_section',
'description' => 'ej :https://www.pinterest.es/userid/',
'priority' => 7,
'type' => 'url',
));

//Redes Sociales: youtube
$wp_customize->add_setting( 'developersite_youtube_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( 'developersite_youtube_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Youtube Channel'),
'section' => 'developersite_menu_social_section',
'description' => 'ej: https://www.youtube.com/channel/channelid',
'priority' => 8,
'type' => 'url',
));

//Redes Sociales: instagram
$wp_customize->add_setting( 'developersite_instagram_url', array(
'type' => 'theme_mod',
'default' => '',
'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control('developersite_instagram_url', array(
'label' => sprintf(__( 'Your %s URL', 'developersite' ),'Instagram'),
'section' => 'developersite_menu_social_section',
'description' => 'ej: https://www.instagram.com/username',
'priority' => 9,
'type' => 'url',
));


?>