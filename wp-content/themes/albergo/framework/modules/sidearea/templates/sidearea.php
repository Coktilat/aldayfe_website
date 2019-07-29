<section class="eltd-side-menu">
	<div class="eltd-close-side-menu-holder">
		<a class="eltd-close-side-menu" href="#" target="_self">
			<?php echo albergo_elated_icon_collections()->renderIcon( 'lnr-cross', 'linear_icons' ); ?>
		</a>
	</div>
    <div class="eltd-sidearea-top-bottom-holder">
        <div class="eltd-sidearea-top-holder">
	        <?php if ( is_active_sidebar( 'sidearea' ) ) {
		        dynamic_sidebar( 'sidearea' );
	        } ?>
        </div>
        <div class="eltd-sidearea-bottom-holder">
			<?php if ( is_active_sidebar( 'sidearea-bottom' ) ) {
				dynamic_sidebar( 'sidearea-bottom' );
			} ?>
        </div>
    </div>
</section>