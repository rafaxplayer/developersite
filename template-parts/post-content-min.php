<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('min'); ?> data-aos="fade-up" data-aos-duration="800">
		<!-- post meta -->
		<div class="post-date">
            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));?>">
				<span class="day"><?php the_time('d') ?></span>
				<span class="moth"><?php the_time('M') ?> <?php the_time('Y') ?></span>
			</a>
		</div>
		<!-- /post meta -->

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<?php the_post_thumbnail('developersite-post-min');?>
		<?php endif; ?>
		<!-- /post thumbnail -->

        <div class="content" <?php if ( !has_post_thumbnail()): echo 'style="margin-left:50px"'; endif;?>>
            <!-- post title -->
		    <h2 class="post-title">
			    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    </h2>
		    <!-- /post title -->

            <?php developersite_wp_excerpt(); ?>

            
        </div>
        
        <!-- info comments and editlink-->
        <div class="info">
            <div class="categories">
                <?php echo developersite_get_svg('folder-open'); the_category( '/') ?>
            </div>
            
            <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( developersite_get_svg('comment').' 0',developersite_get_svg('comment').' 1', developersite_get_svg('comment').' %'); ?></span>
            
        </div>
        <!-- /info -->
		<?php echo developersite_get_separator();?>
</article>

	<!-- /article -->