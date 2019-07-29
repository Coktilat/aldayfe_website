<div class="tms-a">
	<?php
		if($show_excerpt) { ?>
		<div class="tb-excerpt"><?php the_excerpt(); ?></div>
	<?php } ?>
	<?php if($show_image && has_post_thumbnail( get_the_ID() ) ):?>
    <div class="tb-image">
        <?php the_post_thumbnail('thumbnail'); ?>
    </div>
	<?php
		endif;
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