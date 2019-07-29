<?php albergo_elated_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
			<footer class="eltd-page-footer">
				<?php
					if($display_footer_top) {
						albergo_elated_get_footer_top();
					}
					if($display_footer_bottom) {
						albergo_elated_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.eltd-wrapper-inner  -->
</div> <!-- close div.eltd-wrapper -->
<?php wp_footer(); ?>
</body>
</html>