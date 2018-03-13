<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		
		<section>
			
		<h1><?php echo esc_html(get_theme_mod('developersite_blog_title','Blog')); ?></h1>
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php get_template_part('/template-parts/post-content','list');?>
	
			<?php endwhile; ?>
							
				<?php the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous', 'developersite' ),
					'next_text'          => esc_html__( 'Next', 'developersite' ) ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'developersite' ) . ' </span>',
					)); ?> 
				
			<?php else: ?>

				<?php get_template_part('/template-parts/post','none');?>

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
