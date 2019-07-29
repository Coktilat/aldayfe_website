	<?php jws_theme_footer();
		$jws_theme_options = $GLOBALS['jws_theme_options'];
	?>
	<a id="jws_theme_back_to_top">
		<span class="go_up">
		<i class="fa fa-angle-up"></i> 
		</span>
	</a>
	<?php
		if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
			require_once JWS_THEME_ABS_PATH_FR.'/includes/box-style.php';
		}
	?>
	<?php wp_footer(); ?>
</body>
</html>