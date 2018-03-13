<?php
/**
 * Partial for related posts view
 */
    
    global $post;
    $tags = wp_get_post_tags($post->ID);

    if ($tags && get_theme_mod( 'developersite_show_related_posts' )) :
        $tag_ids = array();
        foreach($tags as $individual_tag) {
            $tag_ids[] = $individual_tag->term_id;
        }
            $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=> 6, // Number of related posts to display.
                'ignore_stiky_posts'=> 1
            );

        $my_query = new wp_query( $args );
        if($my_query->have_posts()):
        ?>

        <div class="title-section">
            <h3><?php _e('Related Posts','developersite')?></h3>
        </div>
    
        <div class="related-posts">
            <?php while( $my_query->have_posts()) : $my_query->the_post();?>

            <div class="related-item">
                <a href="<?php the_permalink()?>">
                
                    <?php if(has_post_thumbnail()):
                            the_post_thumbnail('related-post' );
                        else:?>
                        <img src="<?php get_template_directory_uri('/assets/images/placeholder.jpg')?>" alt="">
                    <?php endif;?>

                    <div class="related-info">
                        <?php the_title('<H4>','</H4>'); ?>
                        <span><?php the_date(); ?></span>
                        <div class="line"></div>
                        <a href="<?php the_permalink(); ?>" class="more"><?php _e('READ MORE','developersite');?></a>
                        
                    </div>
                </a>
            </div>

        <?php endwhile; wp_reset_query();?>
        </div>
        <?php endif; ?>
    <?php endif; ?>


