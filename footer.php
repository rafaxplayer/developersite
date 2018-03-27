			
			<!-- footer -->
			<footer class="site-footer" role="contentinfo">
				<?php echo developersite_get_svg('chevron-up');?>
				<!-- copyright -->
				<div class="site-info">
					<?php  echo get_option('developersite_footer_text') ? esc_html(get_option('developersite_footer_text')) : sprintf(esc_html__('&copy;%s Developer&Site Theme.','developersite'), date('Y'));?>
				</div>
				<!-- /copyright -->
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		
	</body>
</html>
