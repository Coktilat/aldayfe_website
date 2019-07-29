<div class="tb-info-box">
	<?php
		echo '<div class="tb-content">'. apply_filters( 'the_content', $content ) .'</div>';	
		echo '<div class="tb-image">'.wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
</div>