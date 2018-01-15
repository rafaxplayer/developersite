			
			<!-- footer -->
			<footer class="site-footer" role="contentinfo">
				<span class="icon-chevron-up botton-up"></span>
				<!-- copyright -->
				<div class="site-info">
					<?php $default = sprintf('Created by %s / Developer&Site Theme','J.R Simarro');
					$textinfo = strlen(get_option('developersite_footer_text')) > 0 ? get_option('developersite_footer_text',$default) : $default;
					echo sprintf('<span class="copy">%s</span>', $textinfo);?>
				</div>
				<!-- /copyright -->
			</footer>
			<!-- /footer -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		
	</body>
</html>
