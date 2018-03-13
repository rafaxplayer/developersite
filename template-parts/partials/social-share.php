<?php
/*
** social share template part.
*/

if(get_theme_mod('developersite_show_social_share')):
?>
<div class="social-share">
    <h4><?php  _e('Share on :','developersite'); ?></h4>
    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share on Facebook." target="blank"><?php echo developersite_get_svg('facebook2');?></a>
    <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank"><?php echo developersite_get_svg('twitter');?></a>
    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><?php echo developersite_get_svg('google-plus2');?></a>
    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" target="_blank"><?php echo developersite_get_svg('pinterest-square');?></a>
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank"><?php echo developersite_get_svg('linkedin');?></a>
</div>
<?php endif; ?>
