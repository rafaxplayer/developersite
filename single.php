<?php get_header(); ?>

	<main role="main" >
	<!-- section -->
	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				
					<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post); ?>);">
						
						<?php the_title('<h1 class="post-title title-image">','</h1>'); ?>
					</div>
				<?php else:?>
				<!-- /post thumbnail -->

				<!-- post title -->
				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>
				<!-- /post title -->
			<?php endif;?>
		
			<!-- categories -->
			<div class="categories">
				<?php the_category( '/') ?>
			</div>
			<!-- /categories -->
			
			<!-- post details -->
			<div class="post-meta">
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( ' / Published by ', 'developersite' ); ?> <?php the_author_posts_link(); ?></span>
			</div>
			<!-- /post details -->

			<!-- post content -->
			<div class="post-content">
				<?php the_content(); // Dynamic Content ?>
			<!-- /post content -->
				<?php if(get_the_tags($post->ID)):?>
					<div class="tags">
						<?php the_tags( '<span class="icon-price-tags"></span> ', ' ', '<br>'); ?>
					</div>
				<?php endif; ?>
				<?php edit_post_link(__( 'Edit', 'developersite' )); // Always handy to have Edit Post Links available ?>
			</div>

			<?php get_template_part( '/template-parts/partials/social-share');?>
				
			<?php echo developersite_get_separator(); ?>
			
			<?php the_post_navigation(array(
				'prev_text'                  => __( '<i class="fas fa-long-arrow-alt-left"></i> Previous Entry' ,'developersite'),
				'next_text'                  => __( 'Next Entry <i class="fas fa-long-arrow-alt-right"></i>','developersite' ),
			)); ?>
		</article>
		<!-- /article -->
			<?php get_template_part( 'template-parts/partials/related-posts'); ?> 
			<?php comments_template(); ?>
		<?php endwhile; ?>
		<?php else: ?>
		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'developersite' ); ?></h1>
		</article>
		<!-- /article -->
		<?php endif; ?>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
