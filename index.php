<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="blog-section">
			<h1><?php echo get_theme_mod('developersite_blog_title','Blog'); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php get_template_part('/template-parts/post-content');?>
	
			<?php endwhile; ?>
							
				<?php get_template_part('template-parts/pagination'); ?> 
				
			<?php else: ?>

				<?php get_template_part('/template-parts/post','none');?>

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
