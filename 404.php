<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<!-- article -->
			<article id="post-404">

				<h1><?php _e( 'Sorry, Page not found!', 'developersite' ); ?></h1>
				
				<a class="post-edit-link" href="<?php echo esc_url(home_url('/')); ?>"><?php _e( 'Return home?', 'developersite' ); ?></a>
				
				
			</article>
			<!-- /article -->
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
