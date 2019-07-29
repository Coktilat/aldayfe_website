<div class="tb-info-box">
	<div class="tb-info-inner-tpl8">
		<div class="tb-title">
			<h2><?php echo $heading_1[0]; if( isset( $heading_1[1] ) ) echo '<span>'. $heading_1[1] .'</span>';?></h2>
		</div>
		<div class="tb-content">
			<?php echo apply_filters('the_content', $content); ?>
		</div>
		<div class="sub-title-images">
			<div class="sub_title">
			<?php if($title){?>
				<h3 class="sub_title_tpl8"><?php echo $title;?></h3>
			<?php }?>
			</div>
			<div class="tb-image <?php echo esc_attr( $align_image1 );?>">
				<?php echo wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') );?>
			</div>
		</div>
	</div>
</div>