<?php get_header(); ?>

	<main role="main" >
	<!-- section -->
	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				
					<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post,'post-single'); ?>);">
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
				<span class="author"><?php _e( '/ Published by ', 'developersite' ); ?> <?php the_author_posts_link(); ?></span>
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
			
					<div class="social-share">
						<h4><?php echo __('Share on :','developersite'); ?></h4>
						<a href="" target=""><span class="icon-facebook2"></span></a>
						<a href="" target=""><span class="icon-twitter"></span></a>
						<a href="" target=""><span class="icon-google-plus2"></span></a>
						<a href="" target=""><span class="icon-pinterest-square"></span></a>
						<a href="" target=""><span class="icon-instagram"></span></a>
						<a href="" target=""><span class="icon-linkedin"></span></a>
					</div>
			
					<div class="separator light"></div>
		
					<?php get_template_part( '/template-parts/pagination','single'); ?>
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
