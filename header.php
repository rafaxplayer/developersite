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
						<div class="admin-content">
						
							<?php if(get_theme_mod('developersite_avatar_header_show')): ?>

								<a href="<?php echo esc_url(home_url('/')); ?>">
									<img class="admin-img" src="<?php echo developersite_get_avatar_image(get_theme_mod( 'developersite_avatar')); ?>" alt="Logo" class="logo-img">
								</a>
							<?php endif;?>
							<h1 class="site-title"><?php echo bloginfo('name'); ?></h1>
							<span class="site-description"><?php echo bloginfo('description'); ?></span>
						</div>
						
						<span class="button-toggle icon-text"></span>	
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
							<?php developersite_nav(); ?>
						</nav>
						<!-- /nav -->
					<?php endif; ?>
					
				<?php get_sidebar(); ?>
				</div>
				
			</div>
			
			
