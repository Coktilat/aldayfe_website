<div class="tb-info-box">
	<?php
		echo '<div class="tb-image">'.wp_get_attachment_image( $image, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
	<div class="tb-content">
		<?php echo '<div class="tb-content-inner">'. apply_filters( 'the_content', $content )  .'</div>'; ?>
	</div>
</div>