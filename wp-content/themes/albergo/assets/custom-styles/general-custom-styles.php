<?php

if(!function_exists('albergo_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function albergo_elated_design_styles() {
	    $font_family = albergo_elated_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && albergo_elated_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo albergo_elated_dynamic_css( $font_family_selector, array( 'font-family' => albergo_elated_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = albergo_elated_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(

	            '.eltd-comment-holder .eltd-comment-text #cancel-comment-reply-link',
	            'footer .widget.widget_rss .eltd-widget-title .rsswidget:hover',
	            'footer .eltd-side-menu .widget a:hover',
	            'footer .eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            'footer .eltd-side-menu .widget.widget_tag_cloud a:hover',
	            'footer .eltd-page-footer .widget a:hover',
	            'footer .eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            'footer .eltd-page-footer .widget.widget_tag_cloud a:hover',
	            'footer .eltd-top-bar a:hover',
	            'footer .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
	            'footer .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
	            'footer .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
	            'footer .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
	            'footer .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
	            '.eltd-side-menu .widget.widget_rss .eltd-widget-title .rsswidget:hover',
	            '.eltd-side-menu .eltd-side-menu .widget a:hover',
	            '.eltd-side-menu .eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.eltd-side-menu .eltd-side-menu .widget.widget_tag_cloud a:hover',
	            '.eltd-side-menu .eltd-page-footer .widget a:hover',
	            '.eltd-side-menu .eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.eltd-side-menu .eltd-page-footer .widget.widget_tag_cloud a:hover',
	            '.eltd-side-menu .eltd-top-bar a:hover',
	            '.eltd-side-menu .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
	            '.eltd-side-menu .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
	            '.eltd-side-menu .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
	            '.eltd-side-menu .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
	            '.eltd-side-menu .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
	            '.wpb_widgetised_column .widget.widget_rss .eltd-widget-title .rsswidget:hover',
	            'aside.eltd-sidebar .widget.widget_rss .eltd-widget-title .rsswidget:hover',
	            '.wpb_widgetised_column .eltd-side-menu .widget a:hover',
	            'aside.eltd-sidebar .eltd-side-menu .widget a:hover',
	            '.wpb_widgetised_column .eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            'aside.eltd-sidebar .eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.wpb_widgetised_column .eltd-side-menu .widget.widget_tag_cloud a:hover',
	            'aside.eltd-sidebar .eltd-side-menu .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .eltd-page-footer .widget a:hover',
	            'aside.eltd-sidebar .eltd-page-footer .widget a:hover',
	            '.wpb_widgetised_column .eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            'aside.eltd-sidebar .eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.wpb_widgetised_column .eltd-page-footer .widget.widget_tag_cloud a:hover',
	            'aside.eltd-sidebar .eltd-page-footer .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .eltd-top-bar a:hover',
	            'aside.eltd-sidebar .eltd-top-bar a:hover',
	            '.wpb_widgetised_column .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
	            'aside.eltd-sidebar .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
	            '.wpb_widgetised_column .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
	            '.wpb_widgetised_column .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
	            '.wpb_widgetised_column .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
	            'aside.eltd-sidebar .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
	            'aside.eltd-sidebar .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
	            'aside.eltd-sidebar .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
	            '.wpb_widgetised_column .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
	            'aside.eltd-sidebar .widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
	            '.widget.widget_rss .eltd-widget-title .rsswidget:hover',
	            '.eltd-side-menu .widget a:hover',
	            '.eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.eltd-side-menu .widget.widget_tag_cloud a:hover',
	            '.eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
	            '.eltd-page-footer .widget.widget_tag_cloud a:hover',
	            '.eltd-top-bar a:hover',
	            '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
	            '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
	            '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
	            '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
	            '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
	            '.eltd-blog-holder article.sticky .eltd-post-title a',
	            '.eltd-blog-pagination ul li.eltd-pag-next .eltd-custom-next-icon:hover',
	            '.eltd-blog-pagination ul li.eltd-pag-next .eltd-custom-prev-icon:hover',
	            '.eltd-blog-pagination ul li.eltd-pag-prev .eltd-custom-next-icon:hover',
	            '.eltd-blog-pagination ul li.eltd-pag-prev .eltd-custom-prev-icon:hover',
	            '.eltd-bl-standard-pagination ul li.eltd-bl-pag-active a',
	            '.eltd-bl-standard-pagination ul li.eltd-bl-pag-next .eltd-custom-next-icon:hover',
	            '.eltd-bl-standard-pagination ul li.eltd-bl-pag-next .eltd-custom-prev-icon:hover',
	            '.eltd-bl-standard-pagination ul li.eltd-bl-pag-prev .eltd-custom-next-icon:hover',
	            '.eltd-bl-standard-pagination ul li.eltd-bl-pag-prev .eltd-custom-prev-icon:hover',
	            '.eltd-search-page-holder article.sticky .eltd-post-title a',
	            '.eltd-search-cover .eltd-search-close a:hover'
            );

            $woo_color_selector = array();
            if(albergo_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .eltd-content .eltd-quantity-buttons .eltd-quantity-minus:hover',
	                '.eltd-pl-filter-holder ul li.eltd-pl-current span',
	                '.eltd-pl-filter-holder ul li:hover span',
	                '.eltd-pl-standard-pagination ul li.eltd-pl-pag-active a',
	                '.eltd-ps-navigation .eltd-custom-next-icon:hover',
	                '.eltd-ps-navigation .eltd-custom-prev-icon:hover',
	                '.eltd-twitter-list-holder .eltd-twitter-icon',
	                '.eltd-twitter-list-holder .eltd-tweet-text a:hover',
	                '.eltd-twitter-list-holder .eltd-twitter-profile a:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

            $background_color_selector = array(

	            '.eltd-st-loader .pulse',
	            '.eltd-st-loader .double_pulse .double-bounce1',
	            '.eltd-st-loader .double_pulse .double-bounce2',
	            '.eltd-st-loader .cube',
	            '.eltd-st-loader .rotating_cubes .cube1',
	            '.eltd-st-loader .rotating_cubes .cube2',
	            '.eltd-st-loader .stripes>div',
	            '.eltd-st-loader .wave>div',
	            '.eltd-st-loader .two_rotating_circles .dot1',
	            '.eltd-st-loader .two_rotating_circles .dot2',
	            '.eltd-st-loader .five_rotating_circles .container1>div',
	            '.eltd-st-loader .five_rotating_circles .container2>div',
	            '.eltd-st-loader .five_rotating_circles .container3>div',
	            '.eltd-st-loader .lines .line1',
	            '.eltd-st-loader .lines .line2',
	            '.eltd-st-loader .lines .line3',
	            '.eltd-st-loader .lines .line4',
	            'footer .widget #wp-calendar td#today',
	            '.eltd-side-menu .widget #wp-calendar td#today',
	            '.wpb_widgetised_column .widget #wp-calendar td#today',
	            'aside.eltd-sidebar .widget #wp-calendar td#today',
	            '.widget #wp-calendar td#today',
	            '.eltd-accordion-holder.ui-accordion.eltd-ac-boxed .eltd-accordion-title.ui-state-active',
	            '.eltd-accordion-holder.ui-accordion.eltd-ac-boxed .eltd-accordion-title.ui-state-hover',
	            '.eltd-icon-shortcode.eltd-circle',
	            '.eltd-icon-shortcode.eltd-dropcaps.eltd-circle',
	            '.eltd-icon-shortcode.eltd-square',
	            '.eltd-process-holder .eltd-process-circle',
	            '.eltd-process-holder .eltd-process-line',
	            '.eltd-progress-bar .eltd-pb-content-holder .eltd-pb-content'
            );

            $woo_background_color_selector = array();
            if(albergo_elated_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .added_to_cart:hover',
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .button:hover',
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-light-skin .added_to_cart:hover',
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-light-skin .button:hover',
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-dark-skin .added_to_cart:hover',
	                '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-dark-skin .button:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .added_to_cart:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .button:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-light-skin .added_to_cart:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-light-skin .button:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-dark-skin .added_to_cart:hover',
	                '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-dark-skin .button:hover',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
	            '.eltd-st-loader .pulse_circles .ball',
	            '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .added_to_cart:hover',
	            '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .button:hover',
	            '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .added_to_cart:hover',
	            '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .button:hover',
	            '.eltd-section-title-holder .eltd-st-title:before'
            );

	        if(albergo_elated_is_woocommerce_installed()) {
		        $woo_border_color_selector = array(
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .added_to_cart:hover',
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-default-skin .button:hover',
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-light-skin .added_to_cart:hover',
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-light-skin .button:hover',
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-dark-skin .added_to_cart:hover',
			        '.eltd-plc-holder .eltd-plc-item .eltd-plc-add-to-cart.eltd-dark-skin .button:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .added_to_cart:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-default-skin .button:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-light-skin .added_to_cart:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-light-skin .button:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-dark-skin .added_to_cart:hover',
			        '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .eltd-pli-add-to-cart.eltd-dark-skin .button:hover'
		        );
	        }

	        $border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);

            echo albergo_elated_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo albergo_elated_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo albergo_elated_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = albergo_elated_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.eltd-content',
			    '.eltd-container'
		    );
		    echo albergo_elated_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = albergo_elated_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo albergo_elated_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo albergo_elated_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( albergo_elated_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . albergo_elated_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo albergo_elated_dynamic_css( '.eltd-preload-background', $preload_background_styles );
    }

    add_action('albergo_elated_style_dynamic', 'albergo_elated_design_styles');
}

if ( ! function_exists( 'albergo_elated_content_styles' ) ) {
	function albergo_elated_content_styles() {
		$content_style = array();
		
		$padding_top = albergo_elated_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = albergo_elated_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner',
		);
		
		echo albergo_elated_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = albergo_elated_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = albergo_elated_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
		);
		
		echo albergo_elated_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_content_styles' );
}

if ( ! function_exists( 'albergo_elated_h1_styles' ) ) {
	function albergo_elated_h1_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h1_styles' );
}

if ( ! function_exists( 'albergo_elated_h2_styles' ) ) {
	function albergo_elated_h2_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h2_styles' );
}

if ( ! function_exists( 'albergo_elated_h3_styles' ) ) {
	function albergo_elated_h3_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h3_styles' );
}

if ( ! function_exists( 'albergo_elated_h4_styles' ) ) {
	function albergo_elated_h4_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h4_styles' );
}

if ( ! function_exists( 'albergo_elated_h5_styles' ) ) {
	function albergo_elated_h5_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h5_styles' );
}

if ( ! function_exists( 'albergo_elated_h6_styles' ) ) {
	function albergo_elated_h6_styles() {
		$margin_top    = albergo_elated_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = albergo_elated_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = albergo_elated_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = albergo_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = albergo_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_h6_styles' );
}

if ( ! function_exists( 'albergo_elated_text_styles' ) ) {
	function albergo_elated_text_styles() {
		$item_styles = albergo_elated_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_text_styles' );
}

if ( ! function_exists( 'albergo_elated_link_styles' ) ) {
	function albergo_elated_link_styles() {
		$link_styles      = array();
		$link_color       = albergo_elated_options()->getOptionValue( 'link_color' );
		$link_font_style  = albergo_elated_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = albergo_elated_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = albergo_elated_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo albergo_elated_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_link_styles' );
}

if ( ! function_exists( 'albergo_elated_link_hover_styles' ) ) {
	function albergo_elated_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = albergo_elated_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = albergo_elated_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo albergo_elated_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo albergo_elated_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_link_hover_styles' );
}

if ( ! function_exists( 'albergo_elated_smooth_page_transition_styles' ) ) {
	function albergo_elated_smooth_page_transition_styles( $style ) {
		$id            = albergo_elated_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = albergo_elated_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.eltd-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = albergo_elated_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.eltd-st-loader .eltd-rotate-circles > div',
			'.eltd-st-loader .pulse',
			'.eltd-st-loader .double_pulse .double-bounce1',
			'.eltd-st-loader .double_pulse .double-bounce2',
			'.eltd-st-loader .cube',
			'.eltd-st-loader .rotating_cubes .cube1',
			'.eltd-st-loader .rotating_cubes .cube2',
			'.eltd-st-loader .stripes > div',
			'.eltd-st-loader .wave > div',
			'.eltd-st-loader .two_rotating_circles .dot1',
			'.eltd-st-loader .two_rotating_circles .dot2',
			'.eltd-st-loader .five_rotating_circles .container1 > div',
			'.eltd-st-loader .five_rotating_circles .container2 > div',
			'.eltd-st-loader .five_rotating_circles .container3 > div',
			'.eltd-st-loader .atom .ball-1:before',
			'.eltd-st-loader .atom .ball-2:before',
			'.eltd-st-loader .atom .ball-3:before',
			'.eltd-st-loader .atom .ball-4:before',
			'.eltd-st-loader .clock .ball:before',
			'.eltd-st-loader .mitosis .ball',
			'.eltd-st-loader .lines .line1',
			'.eltd-st-loader .lines .line2',
			'.eltd-st-loader .lines .line3',
			'.eltd-st-loader .lines .line4',
			'.eltd-st-loader .fussion .ball',
			'.eltd-st-loader .fussion .ball-1',
			'.eltd-st-loader .fussion .ball-2',
			'.eltd-st-loader .fussion .ball-3',
			'.eltd-st-loader .fussion .ball-4',
			'.eltd-st-loader .wave_circles .ball',
			'.eltd-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$style[] = $current_style;
		
		return $current_style;
	}
	
	add_filter( 'albergo_elated_add_page_custom_style', 'albergo_elated_smooth_page_transition_styles' );
}