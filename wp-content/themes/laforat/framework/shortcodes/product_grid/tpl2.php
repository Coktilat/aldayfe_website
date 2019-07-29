<?php
if( $columns == 1 ){
	include( locate_template( 'woocommerce/loop/loop-content-one.php' ) );
}else{
	include( locate_template( 'woocommerce/loop/loop-content-shortcode.php' ) );
}
?>