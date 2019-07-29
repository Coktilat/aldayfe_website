<?php if($show_image && has_post_thumbnail( get_the_ID() ) ):?>
    <div class="tb-image">
        <?php 
			if($show_image){
				$image_full = '';
				if(has_post_thumbnail()){
					$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
					$image_full = $attachment_image[0];
					if($crop_image){
						$image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
						echo '<img style="width:100%;" class="register_image" src="'. esc_attr($image_resize['url']) .'" alt="">';
					}else{
						the_post_thumbnail();
					}
				}
			}
		?>
    </div>
<div class="tms-a">
<?php
    endif;
    if($show_excerpt) { ?>
	<div class="tb-excerpt"><?php the_excerpt(); ?></div>
<?php } ?>
<?php
    if($show_title) {
?>
<div class="tb-image-name">
	<h5 class="tb-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
	<?php
		$company = esc_attr( get_post_meta(get_the_ID(), 'tb_testimonial_company', true) );
		if($company) echo '<span class="tb-company">'. $company.'</span>';
	?>
</div>
</div>
<?php } ?>