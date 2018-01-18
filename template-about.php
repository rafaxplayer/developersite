<?php /* Template Name: About template */
 
get_header(); ?>

	<main class="about_template">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post thumbnail -->
					
				<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post); ?>);">
					<h1><?php the_title(); ?></h1>
					<?php if(get_option('developersite_avatar_show')):?>
						<img class="admin-img" src="<?php echo developersite_get_avatar_image(); ?>" alt="Logo" class="logo-img">
					<?php endif; ?>
				</div>
				<!-- /post thumbnail -->	
				
				<div class="page-content">
					<?php the_content(); ?>
					<?php  edit_post_link(__( 'Edit', 'developersite' )); ?>
				</div>
				
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'developersite' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
