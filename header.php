<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">
			<div class="main-sidebar">
				<!-- header -->
				<header class="header clear" role="banner">
						<!-- logo -->
						<a href="<?php echo esc_url(home_url('/')); ?>">
						<div class="admin-content">
						
							<?php 
							
							if(get_theme_mod('developersite_avatar_header_show', true)): ?>
								<img class="admin-img" src="<?php echo developersite_get_avatar_image(get_theme_mod( 'developersite_avatar')); ?>" alt="Logo" class="logo-img">
							<?php endif;?>
							<?php the_custom_logo();?>
							<h1 class="site-title"><?php bloginfo('name'); ?></h1>
							<span class="site-description"><?php bloginfo('description'); ?></span>
						</div>
						</a>
						<span class="button-toggle"><?php echo developersite_get_svg('menu');?></span>	
				</header>

				<!-- /header -->
				<div class="navigation-bar">
					<?php if(get_theme_mod('developersite_show_menu_social')): ?>
						<!-- nav social-->
						<nav class="social" role="navigation">
							<?php get_template_part( '/inc/default-menus/menu-social' ); ?>
						</nav>
						<!-- /nav social-->
					<?php endif; ?>

					
					<?php if(has_nav_menu('header-menu')):?>
						<!-- nav -->
						<nav class="nav" role="navigation">
							<?php wp_nav_menu(array(
									'theme_location'  => 'header-menu',
									'container'       => 'div',
									'container_class' => 'menu-{menu slug}-container',
									'menu_class'      => 'menu',
									'menu_id'         => 'header-menu',
									'echo'            => true,
									'fallback_cb'     =>  'wp_page_menu',
									'items_wrap'      => '<ul>%3$s</ul>',
									'depth'           => 0
									));?>
						</nav>
						<!-- /nav -->
					<?php endif; ?>
					
				<?php get_sidebar(); ?>
				</div>
				
			</div>
			
			
