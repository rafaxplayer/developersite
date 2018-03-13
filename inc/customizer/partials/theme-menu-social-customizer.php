<?php

$social = array();

$social[] = array(
    'slug'  =>  'developersite_facebook_url',
    'label' => sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Facebook') ,
    'description'   =>  'ej :https://www.facebook.com/userid'
);

$social[] = array(
    'slug'  =>  'developersite_twitter_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Twitter'),
    'description'   =>  'ej: https://twitter.com/userid'
);

$social[] = array(
    'slug'  =>  'developersite_google+_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Google+'),
    'description'   =>  'ej :https://plus.google.com/u/0/userid'
);

$social[] = array(
    'slug'  =>  'developersite_linkendin_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Linkendin'),
    'description'   =>  'ej: https://www.linkedin.com/in/username/'
);

$social[] = array(
    'slug'  =>  'developersite_github_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Github'),
    'description'   =>  'ej :https://github.com/username'
);

$social[] = array(
    'slug'  =>  'developersite_pinterest_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Pinterest'),
    'description'   =>  'ej :https://www.pinterest.es/userid/'
);

$social[] = array(
    'slug'  =>  'developersite_youtube_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Youtube'),
    'description'   =>  'ej: https://www.youtube.com/channel/channelid'
);

$social[] = array(
    'slug'  =>  'developersite_instagram_url',
    'label' =>  sprintf(esc_html__( 'Your %s URL', 'developersite' ),'Instagram'),
    'description'   =>  'ej: https://www.instagram.com/username'
);

//Menu social customize
$wp_customize->add_section( 'developersite_menu_social_section', array(
    'title' => esc_html__( 'Social Red settings', 'developersite' ),
    'priority' => 30,
    'description' => esc_html__('Social Red settings', 'developersite'),
  ));

  // Show social share
  $wp_customize->add_setting( 'developersite_show_social_share', array(
    'default'   => $defaults['developersite_show_social_share'],
    'type'              => 'theme_mod',
    'transport'         => 'refresh',
    'sanitize_callback' => 'developersite_sanitize_checkbox',
    
));

$wp_customize->add_control('developersite_show_social_share', array(
    'label' => esc_html__( 'Show or Hide social share panel' ,'developersite'),
    'setting'  => 'developersite_show_social_share',
    'section' => 'developersite_menu_social_section',
    'priority'   => 1,
    'description' => esc_html__( 'Show or Hide social share panel on pages and details posts' ,'developersite'),
    'type' => 'checkbox',
    
));

//checkbox show/hidde menu social
$wp_customize->add_setting( 'developersite_show_menu_social' , array(
    'default'           => $defaults['developersite_show_menu_social'],
    'type'              => 'theme_mod',
    'transport'         => 'refresh',
    'sanitize_callback' => 'developersite_sanitize_checkbox',

) );

$wp_customize->add_control('developersite_show_menu_social', array(
    'label'      => esc_html__( 'Menu Social Show/Hidde', 'developersite' ),
    'section'    => 'developersite_menu_social_section',
    'priority'   => 2,
    'settings'   => 'developersite_show_menu_social',
    'description' => esc_html__( 'Menu Social Show/Hidde , leave the field empty to hide icon' ,'developersite'),
    'type'      => 'checkbox',
));

foreach($social as $developersite_social_links){

    $wp_customize->add_setting( $developersite_social_links['slug'], array(
        'type' => 'theme_mod',
        'default' => $defaults['developersite_empty_string'],
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( $developersite_social_links['slug'], array(
        'label' => $developersite_social_links['label'],
        'section' => 'developersite_menu_social_section',
        'description' => $developersite_social_links['description'],
        'type' => 'url',
    ));

}

?>