<?php
global $i;
if($i %5 == 0) { ?>
	<div class="col-md-6 big_product_item">
		<?php include( locate_template( 'woocommerce/loop/loop-content-shortcode2.php' ) ); ?>
	</div>
	<div class="col-md-6">
		<div class="row">
		<?php } else{ ?>
			<div class="col-md-6 col-sm-6">
				<?php include( locate_template( 'woocommerce/loop/loop-content-shortcode.php' ) ); ?>
			</div>
		<?php } ?>
<?php if($i %5 == 0) echo "</div></div>";?>