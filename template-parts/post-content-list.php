<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up" data-aos-duration="800" data-aos-once="true" >

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('developersite-post')?>
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->

        <!-- post title -->
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

        <!-- post meta -->
		<div class="post-meta">
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span> 
		</div>
		<!-- /post meta -->
		
		<!-- categories -->
		<div class="categories">
			<?php the_category( '/') ?>
		</div>
		<!-- /categories -->
		
		<?php developersite_wp_excerpt(); ?>

		<!-- info comments and editlink-->
		<div class="info">
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( developersite_get_svg('comment').' 0',developersite_get_svg('comment').' 1', developersite_get_svg('comment').' %'); ?></span>
			<?php edit_post_link(__( 'Edit', 'developersite' )); ?>
		</div>
		<!-- /info -->
		<?php echo developersite_get_separator();?>
	
	</article>
	<!-- /article -->