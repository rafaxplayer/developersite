<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up" data-aos-duration="800" data-aos-once="true" >
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

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post,'post'); ?>);">
				</div>
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->
		
		<!-- categories -->
		<div class="categories">
			<?php the_category( '/') ?>
		</div>
		<!-- /categories -->
		
		<?php developersitewp_excerpt(); ?>

		<!-- info comments and editlink-->
		<div class="info">
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '<span class="icon-comment"></span> 0', 'developersite' ), __( '<span class="icon-comment"></span> 1', 'developersite' ), __( '<span class="icon-comment"></span> %', 'developersite' )); ?></span>
			<?php edit_post_link(__( 'Edit', 'developersite' )); ?>
		</div>
		<!-- /info -->
		
		<div class="separator light"></div>
	</article>
	<!-- /article -->