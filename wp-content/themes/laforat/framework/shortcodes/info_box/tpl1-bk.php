<div class="tb-info-box">
	<div class="row">
		<div class="col-lg-9 match-height">
			<div class="row">
				<div class="col-sm-6 col-sm-push-3">
					<div class="tb-info-inner image1">
						<div class="tb-title">
							<h2><?php echo $heading_1[0]; if( isset( $heading_1[1] ) ) echo '<span>'. $heading_1[1] .'</span>';?></h2>
						</div>
						<div class="tb-content">
							<?php echo apply_filters('the_content', $content); ?>
						</div>
						<?php if( !empty( $link_text ) || !empty( $promotion_text) ): ?>
							<div class="tb-control">
								<?php if( !empty( $link_text ) ): ?>
									<a class="tb-shop-now" href="<?php echo esc_url($ex_link);?>"><?php echo esc_attr( $link_text );?></a>
								<?php endif; ?>
								<?php if( !empty( $promotion_text ) ): ?>
									<a class="tb-shop-now" href="<?php echo esc_url($promotion_link);?>"><?php echo esc_attr( $promotion_text );?></a>
								<?php endif; ?>
							</div>
						<?php endif;?>
						<div class="tb-image">
							<?php echo wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') );?>
						</div>
					</div>
				</div>
				<div class="col-sm-6 pull-right">
					<div class="tb-info-inner image2">
						<div class="tb-image">
							<?php echo wp_get_attachment_image( $image_2, 'full', false, array('class'=>'img-responsive') );?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="visible-lg-block col-lg-3 match-height">
			<div class="tb-info-inner image3">
				<div class="tb-image">
					<?php echo wp_get_attachment_image( $image_3, 'full', false, array('class'=>'img-responsive') );?>
				</div>
			</div>
		</div>
	</div>
</div>