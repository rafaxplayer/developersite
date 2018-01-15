
<?php if($prev = get_previous_post(TRUE)):?>
    <div class="pagination-single prev">
        <?php previous_post_link('%link',sprintf('<span class="icon-chevron-left"></span>%s',wp_trim_words($prev->post_title,3)),TRUE); ?>
    </div>
<?php endif; ?>

<?php if($next = get_next_post(TRUE)):?>
    <div class="pagination-single next">
        <?php next_post_link('%link',sprintf('%s<span class="icon-chevron-right"></span>',wp_trim_words($next->post_title,3)),TRUE); ?>
    </div>    
<?php endif; ?>

