<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Archives', 'developersite' ); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php get_template_part('/template-parts/post-content');?>
	
			<?php endwhile; ?>

			<?php else: ?>

				<?php get_template_part('/template-parts/post','none');?>

			<?php endif; ?>

			<?php the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous', 'developersite' ),
					'next_text'          => esc_html__( 'Next', 'developersite' ) ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'developersite' ) . ' </span>',
					)); ?> 

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
