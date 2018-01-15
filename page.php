<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					
					<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post,'page'); ?>);">
						<?php the_title('<h1 class="page-title title-image">','</h1>'); ?>
					</div>
					
				<?php else:?>
				<!-- /post thumbnail -->

					<!-- post title -->
					<h1 class="page-title">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->
				<?php endif;?>

				<div class="separator light"></div>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>
				
				<?php edit_post_link(__( 'Edit', 'developersite' )); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>
		
		<?php get_template_part( '/template-parts/pagination', 'page');?>

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
