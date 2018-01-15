<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php echo sprintf(__( '<span class="icon-search"></span>  %s Search Results for ', 'developersite' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php if (is_search() && ($post->post_type =='page')) continue; ?> 
					<?php get_template_part('/template-parts/post-content','min');?>
				
	
			<?php endwhile; ?>

			<?php else: ?>

				<?php get_template_part('/template-parts/post','none');?>

			<?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
