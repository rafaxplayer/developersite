<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( '<span class="icon-folder-open"></span> Categories for &nbsp;', 'developersite' ); single_cat_title(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php get_template_part('/template-parts/post-content');?>
	
			<?php endwhile; ?>

			<?php else: ?>

				<?php get_template_part('/template-parts/post-content');?>

			<?php endif; ?>

			
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
