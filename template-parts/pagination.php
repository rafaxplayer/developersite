<!-- pagination -->

<div class="pagination">
	<?php
		// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
		global $wp_query;
		$big = 999999999;
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			'format' => '?paged=%#%',
			'prev_text'          => __( '&laquo; Previous' ,'developersite'),
			'next_text'          => __( 'Next &raquo;' ,'developersite'),
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
		)); ?>
</div>
<!-- /pagination -->
