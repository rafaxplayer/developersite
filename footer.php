			
			<!-- footer -->
			<footer class="site-footer" role="contentinfo">
				<?php echo developersite_get_svg('chevron-up');?>
				<!-- copyright -->
				<div class="site-info">
					<?php  echo '&copy;' . date('Y') . '&nbsp;' . esc_html(get_option('developersite_footer_text')) ;?>
				</div>
				<!-- /copyright -->
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		
	</body>
</html>
