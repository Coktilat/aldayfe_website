<?php do_action('albergo_elated_before_page_header'); ?>

<header class="eltd-page-header">
	<?php do_action('albergo_elated_after_page_header_html_open'); ?>
	
    <div class="eltd-logo-area">
	    <?php do_action( 'albergo_elated_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="eltd-grid">
        <?php endif; ?>
			
            <div class="eltd-vertical-align-containers">

                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php if(!$hide_logo) {
                            albergo_elated_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltd-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="eltd-menu-area">
	    <?php do_action( 'albergo_elated_after_header_menu_area_html_open' ); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="eltd-grid">
        <?php endif; ?>
	            
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
			            <?php albergo_elated_get_header_centered_widget_left_logo_area(); ?>
                    </div>
                </div>
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php albergo_elated_get_main_menu(); ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
			            <?php albergo_elated_get_header_centered_widget_right_logo_area(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		albergo_elated_get_sticky_header('centered', 'header/types/header-centered');
	} ?>
	
	<?php do_action('albergo_elated_before_page_header_html_close'); ?>
</header>

<?php do_action('albergo_elated_after_page_header'); ?>