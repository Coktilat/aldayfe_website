<aside class="eltd-sidebar">
	<?php
		$eltd_sidebar = albergo_elated_get_sidebar();
		
		if ( is_active_sidebar( $eltd_sidebar ) ) {
			dynamic_sidebar( $eltd_sidebar );
		}
	?>
</aside>