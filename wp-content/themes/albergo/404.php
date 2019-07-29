<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * albergo_elated_header_meta hook
	 *
	 * @see albergo_elated_header_meta() - hooked with 10
	 * @see albergo_elated_user_scalable_meta - hooked with 10
	 * @see eltd_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'albergo_elated_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * albergo_elated_after_body_tag hook
	 *
	 * @see albergo_elated_get_side_area() - hooked with 10
	 * @see albergo_elated_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'albergo_elated_after_body_tag' ); ?>
	
	<div class="eltd-wrapper eltd-404-page">
		<div class="eltd-wrapper-inner">
            <?php
            /**
             * albergo_elated_after_wrapper_inner hook
             *
             * @see albergo_elated_get_header() - hooked with 10
             * @see albergo_elated_get_mobile_header() - hooked with 20
             * @see albergo_elated_back_to_top_button() - hooked with 30
             * @see albergo_elated_get_header_minimal_full_screen_menu() - hooked with 40
             * @see albergo_elated_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'albergo_elated_after_wrapper_inner' );

            do_action('albergo_elated_before_main_content'); ?>
			
			<div class="eltd-content" <?php albergo_elated_content_elem_style_attr(); ?>>
				<div class="eltd-content-inner">
					<div class="eltd-page-not-found">
						<?php
						$eltd_title_image_404 = albergo_elated_options()->getOptionValue( '404_page_title_image' );
						$eltd_title_404       = albergo_elated_options()->getOptionValue( '404_title' );
						$eltd_subtitle_404    = albergo_elated_options()->getOptionValue( '404_subtitle' );
						$eltd_text_404        = albergo_elated_options()->getOptionValue( '404_text' );
						$eltd_button_label    = albergo_elated_options()->getOptionValue( '404_back_to_home' );
						$eltd_button_style    = albergo_elated_options()->getOptionValue( '404_button_style' );
						
						if ( ! empty( $eltd_title_image_404 ) ) { ?>
							<div class="eltd-404-title-image">
								<img src="<?php echo esc_url( $eltd_title_image_404 ); ?>" alt="<?php esc_html_e( '404 Title Image', 'albergo' ); ?>" />
							</div>
						<?php } ?>
						
						<div class="eltd-404-stars">
							<span class="star-404"></span>
							<span class="star-404"></span>
							<span class="star-404"></span>
							<span class="star-404"></span>
							<span class="star-404"></span>
						</div>

						<h2 class="eltd-404-subtitle">
							<?php if ( ! empty( $eltd_subtitle_404 ) ) {
								echo esc_html( $eltd_subtitle_404 );
							} else {
								?>
								<span class="eltd-404-subtitle-bold" >
								<?php esc_html_e('Page not', 'albergo'); ?>
								</span >
								<span class="eltd-404-subtitle-light" >
								 <?php esc_html_e('found', 'albergo'); ?>
								</span >
							<?php
							} ?>
						</h2>
						
						<p class="eltd-404-text">
							<?php if ( ! empty( $eltd_text_404 ) ) {
								echo esc_html( $eltd_text_404 );
							} else {
								esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'albergo' );
							} ?>
						</p>
						
						<?php
						$eltd_params           = array();
						$eltd_params['text']   = ! empty( $eltd_button_label ) ? $eltd_button_label : esc_html__( 'Back to home', 'albergo' );
						$eltd_params['link']   = esc_url( home_url( '/' ) );
						$eltd_params['target'] = '_self';
						$eltd_params['size']   = 'large';
						
						if ( $eltd_button_style == 'light-style' ) {
							$eltd_params['custom_class'] = 'eltd-btn-light-style';
						}

						if ( albergo_elated_core_plugin_installed() ) {
							echo albergo_elated_execute_shortcode( 'eltd_button', $eltd_params );
						} else { ?>
                            <a itemprop="url" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="_self" class="eltd-btn eltd-btn-large eltd-btn-solid eltd-btn-light-style eltd-btn-line-left">
                                <span class="eltd-btn-text"><?php echo esc_html__( 'BACK TO HOME', 'albergo' ); ?></span>
                            </a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>