<?php

function jws_theme_slider_collection_func($params) {

    extract(shortcode_atts(array(

		'image_sl1' => '',

		'heading1_sl1' => '',

		'heading2_sl1' => '',

		'link_sl1' => '',

		

		'image_sl2' => '',

		'heading1_sl2' => '',

		'heading2_sl2' => '',

		'link_sl2' => '',

		

		'image_sl3' => '',

		'heading1_sl3' => '',

		'heading2_sl3' => '',

		'link_sl3' => '',

		

        'el_class' => '',

    ), $params));

    ob_start();

	$class = array();

    $class[] = 'tb-flex-slider';

    $class[] = $el_class;

	

	$image_sl1_src = wp_get_attachment_image_src($image_sl1, 'laforat-colection-thumb', false);

	$image_sl2_src = wp_get_attachment_image_src($image_sl2, 'laforat-colection-thumb', false);

	$image_sl3_src = wp_get_attachment_image_src($image_sl3, 'laforat-colection-thumb', false);

	

    ?>

    <div id="colection_slider" class="<?php echo esc_attr(implode(' ', $class)); ?>">

		<!-- Slider main container -->

		<ul class="slides">

				<li id="home_slide1">

					<div class="slide-content">

						<?php if ( $image_sl1_src ) {
							if( ! empty( $link_sl1 ) ) echo '<a href="'. esc_url( $link_sl1 ) .'>';
							?>

							<img class="img-responsive" id="slide1_img" src="<?php echo esc_url( $image_sl1_src[0] ); ?>" alt="" data-animate="slideInDown" data-delay="600" />

						<?php
							if( ! empty( $link_sl1 ) ) echo '</a>';
							}
						?>

						<div class="slide-text">

							<?php if ( $heading1_sl1 ) { ?>

								<h2 class="heading1"><?php echo esc_attr( $heading1_sl1 ); ?></h2>

							<?php } ?>

							<?php if ( $heading2_sl1 ) { ?>

								<h3 class="heading2"><?php echo esc_attr( $heading2_sl1 ); ?></h3>

							<?php } ?>

						</div>

					</div>

				</li>

				<!-- Slide2 -->

				<li id="home_slide2">

					<div class="slide-content">

						<?php if ( $image_sl2_src ) {
							if( ! empty( $link_sl2 ) ) echo '<a href="'. esc_url( $link_sl2 ) .'>';
							?>

							<img class="img-responsive" id="slide2_img" src="<?php echo esc_url( $image_sl2_src[0] ); ?>" alt="" data-animate="slideInUp" data-delay="600" />

						<?php
							if( ! empty( $link_sl2 ) ) echo '</a>';
						 } ?>

						<div class="slide-text">

							<?php if ( $heading1_sl2 ) { ?>

								<h2 class="heading1"><?php echo esc_attr( $heading1_sl2 ); ?></h2>

							<?php } ?>

							<?php if ( $heading2_sl2 ) { ?>

								<h3 class="heading2"><?php echo esc_attr( $heading2_sl2 ); ?></h3>

							<?php } ?>

						</div>

					</div>

				</li>

				<!-- Slide3 -->

				<li id="home_slide3">

					<div class="slide-content">

						<?php if ( $image_sl3_src ) {
							if( ! empty( $link_sl3 ) ) echo '<a href="'. esc_url( $link_sl3 ) .'>';
						?>

							<img class="img-responsive" id="slide3_img" src="<?php echo esc_url( $image_sl3_src[0] ); ?>" alt="" data-animate="slideInRight" data-delay="0" />

						<?php
							if( ! empty( $link_sl3 ) ) echo '</a>';
						} ?>

						<div class="slide-text">

							<?php if ( $heading1_sl3 ) { ?>

								<h2 class="heading1"><?php echo esc_attr( $heading1_sl3 ); ?></h2>

							<?php } ?>

							<?php if ( $heading2_sl3 ) { ?>

								<h3 class="heading2"><?php echo esc_attr( $heading2_sl3 ); ?></h3>

							<?php } ?>

						</div>

					</div>

				</li>

				

			</ul>

	</div>

    <?php

    return ob_get_clean();

}



if(function_exists('insert_shortcode')) { insert_shortcode('slider_collection', 'jws_theme_slider_collection_func'); }

