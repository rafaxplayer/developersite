<!-- sidebar -->
<?php if(is_active_sidebar( 'widget-area-1' )):?>
<aside class="sidebar" role="complementary">

	

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

</aside>

<!-- /sidebar -->
<?php endif;?>
