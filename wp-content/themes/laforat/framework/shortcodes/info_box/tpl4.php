<div class="tb-info-box">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 text-a">
	<?php
		echo '<div class="tb-content">'. apply_filters( 'the_content', $content ) .'</div>';	
		echo '<div class="tb-image">'.wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-b">
	<?php
		echo '<div class="tb-content">'. apply_filters( 'the_content', $content ) .'</div>';	
		echo '<div class="tb-image">'.wp_get_attachment_image( $image_2, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-c">
	<?php
		echo '<div class="tb-content">'. apply_filters( 'the_content', $content ) .'</div>';	
		echo '<div class="tb-image">'.wp_get_attachment_image( $image_3, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
	</div>
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 text-d">
	<?php
		echo '<div class="tb-content">'. apply_filters( 'the_content', $content ) .'</div>';	
		echo '<div class="tb-image">'.wp_get_attachment_image( $image_4, 'full', false, array('class'=>'img-responsive') ).'</div>';
	?>
	</div>
</div>