<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function jws_theme_sidebar_widget_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'sidebar' => ''
    ), $atts));

	$el_class= ! empty( $el_class ) ? esc_attr( $el_class ) : '';

	$class = array();
	$class[] = $el_class;

    ob_start();
    ?>
    	<div class="sidebar-area">
			<div class="<?php echo implode(' ',$class);?>">
				<?php if( is_registered_sidebar( $sidebar ) && is_active_sidebar( $sidebar ) ){
					dynamic_sidebar( $sidebar );
				} ?>
			</div>
		</div>
		
    <?php
    return ob_get_clean();
}


if(function_exists('insert_shortcode')) { insert_shortcode('get_sidebar', 'jws_theme_sidebar_widget_func'); }
