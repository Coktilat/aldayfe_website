/* BTN EFFECT RIPPLE PLUGIN */
(function($) {
	"use strict";
	
	jQuery(document).ready(function($) {
		// fix header v4
		alert('hey');
		var _jws_theme_header_v4 = jQuery('.tb-header-v4'),
			_home_slide_v4 = jQuery('#home-slider-v4');
			console.log( _jws_theme_header_v4.length, _home_slide_v4.length );
		if( _jws_theme_header_v4.length && _home_slide_v4.length ){
			function jws_theme_change_hei_slider(){
				_jws_theme_header_v4.find('.mobile-leftbar').css('height', _home_slide_v4.find('.rev_slider').length );
			}
			jws_theme_change_hei_slider();
			jQuery('window').on('resize', function(){
				jws_theme_change_hei_slider();
			});

		}
		
		$('.tb-product-carousel .owl-carousel').owlCarousel({
			loop:true,
			margin:30,
			navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots:false,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
				},
				768:{
					items:2,
				},
				992:{
					items:3,
				},
				1200:{
					items:4,
					nav:true,
				}
			}
		});
		
		$('.tb-blog-carousel .owl-carousel').owlCarousel({
			loop:true,
			margin:30,
			navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots:false,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
				},
				768:{
					items:2,
				},
				992:{
					items:3,
				},
				1200:{
					items:3,
					nav:true,
				}
			}
		});

		function ROtesttimonialSlider($elem) {
			if ($elem.length) {
				$elem.flexslider({
					animation: "slide",
					animationLoop: true,
					controlNav: true,
					slideshow: true,
					directionNav: false
				});
			}
		}
		ROtesttimonialSlider($('#ro-testimonial-1'));
		
		function ROzoomImage() {
			var $window = $(window);
			$("#Ro_zoom_image > img").elevateZoom({
				zoomType: "lens",
				responsive: true,
				containLensZoom: true,
				cursor: 'pointer',
				gallery:'Ro_gallery_0',
				borderSize: 3,
				borderColour: "#84C340",
				galleryActiveClass: "ro-active",
				loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
			});

			$("#Ro_zoom_image > img").on("click", function(e) {
				var ez =   $('#Ro_zoom_image > img').data('elevateZoom');
					$.fancybox(ez.getGalleryList());
				return false;
			});
		}
		ROzoomImage();
		function ROheadervideo() {
			$("#ro-play-button").on("click", function(e){
				e.preventDefault();
					$.fancybox({
					'padding' : 0,
					'autoScale': false,
					'transitionIn': 'none',
					'transitionOut': 'none',
					'title': this.title,
					'width': 720,
					'height': 405,
					'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
					'type': 'swf',
					'swf': {
					'wmode': 'transparent',
					'allowfullscreen': 'true'
					}
				});
			});
		}
		ROheadervideo();
		
		// Back to top btn
		var jws_theme_back_to_top = jQuery('#jws_theme_back_to_top');
		var window_height = jQuery(window).height();
		jQuery(window).scroll(function () {
			/* back to top */
			var scroll_top = $(window).scrollTop();
			if (scroll_top < window_height) {
				jws_theme_back_to_top.addClass('no-active').removeClass('active');
			} else {
				jws_theme_back_to_top.removeClass('no-active').addClass('active');
			}
		});
		jws_theme_back_to_top.click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 1500);
		});
		
		/**
         * Add Product Quantity Up Down icon
         */
        $('form.cart .quantity').each(function() {
            $(this).prepend('<span class="qty-minus"><i class="fa fa-minus"></i></span>');
            $(this).append('<span class="qty-plus"><i class="fa fa-plus"></i></span>');
        });
        /* Plus Qty */
        $(document).on('click', '.qty-plus', function() {
            var parent = $(this).parent();
            $('input.qty', parent).val( parseInt($('input.qty', parent).val()) + 1);
        })
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function() {
            var parent = $(this).parent();
            if( parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val( parseInt($('input.qty', parent).val()) - 1);
            }
        })
		
		/* On Page Cart */ 
		$('#tb-tab-container').easytabs();	
		
		$(document).on('click', '.jws_theme_action', function (event) {
			event.preventDefault();
			var column = $(this).data('column');
			jQuery.post(
				the_ajax_script.ajaxurl,
				{
					'action': 'jws_theme_hook_woo_columns',
					'column':   column,
				}, 
				function(response){
					console.log(response);
					location.reload();
				}
			);
		});
		
		/* Btn send mail */
		if(jQuery('.tb-send-mail').length > 0){
			$(".tb-send-mail").colorbox({inline:true, width:"100%", maxWidth: "800"});
		}
		
		/* Click btn search & cart on header */	
		var _jws_theme_menu_sidebar = jQuery('.tb-menu-sidebar');
		if( _jws_theme_menu_sidebar.length ){
			_jws_theme_menu_sidebar.find(".shopping_cart_dropdown,.widget_searchform_content").click(function(e){
				e.stopPropagation();
			});
			if(jQuery('.widget_searchform_content').length > 0){
				jQuery('a.icon_search_wrap').click(function (e) {
					e.stopPropagation();
					jQuery('.widget_searchform_content').toggleClass('active');
				});
			}

			if(jQuery('.shopping_cart_dropdown').length > 0){
				jQuery('.tb-header-wrap').off('click').on('click','a.icon_cart_wrap', function (e) {
					e.preventDefault();
					e.stopPropagation();
					jQuery('.shopping_cart_dropdown').toggleClass('active');
				});
			}
			jQuery('body').click(function(e){
				_jws_theme_menu_sidebar.find(".active").removeClass('active');
			});
		}

		if(jQuery('.tb-menu-canvas').length > 0){
			jQuery('.header-menu-item-icon > a').click(function () {
					jQuery('.tb-menu-canvas').toggleClass('active');
			});
		}
		/* Btn menu click */
		jQuery('.tb-menu-control-mobi a').click(function(){
			jQuery('.tb-menu-list').toggleClass('active');
		});
		/*Header stick*/
		function ROHeaderStick() {
			if( $('.tb-header-menu').length > 0 ){
				if($( '.tb-header-wrap' ).hasClass( 'tb-header-stick' )) {
					var header_offset = $('.tb-header-wrap .tb-header-menu').offset();
				
					if ($(window).scrollTop() > header_offset.top) {
						$('body').addClass('tb-stick-active');
					} else {
						$('body').removeClass('tb-stick-active');
					}

					$(window).on('scroll', function() {
						if ($(window).scrollTop() > header_offset.top) {
							$('body').addClass('tb-stick-active');
						} else {
							$('body').removeClass('tb-stick-active');
						}
					});
					
					$(window).on('load', function() {
						if ($(window).scrollTop() > header_offset.top) {
							$('body').addClass('tb-stick-active');
						} else {
							$('body').removeClass('tb-stick-active');
						}
					});
					$(window).on('resize', function() {
						if ($(window).scrollTop() > header_offset.top) {
							$('body').addClass('tb-stick-active');
						} else {
							$('body').removeClass('tb-stick-active');
						}
					});
				}
			}
			
		}
		ROHeaderStick();
		// Same Height
		jQuery('.row').each(function() {
			if (jQuery(this).hasClass('same-height')) {
				var height = jQuery(this).children().height();
				jQuery(this).children().each(function() {
					jQuery(this).css('min-height', height);
				});
			}
		});
		
		
		//checkout
		$('.ro-checkout-process .ro-hr-line .ro-tab-1, .ro-customer-info .ro-edit-customer-info').click(function(){
			var process1 = $('.ro-checkout-process .ro-hr-line .ro-tab-1');
			process1.parent().parent().removeClass('ro-process-2');
			process1.parent().parent().addClass('ro-process-1');
			$('.ro-checkout-panel .ro-panel-1').css('display', 'block');
			$('.ro-checkout-panel .ro-panel-2').css('display', 'none');
		});
		$('.ro-checkout-process .ro-hr-line .ro-tab-2, .ro-checkout-panel .ro-btn-2').click(function(){
			var process2 = $('.ro-checkout-process .ro-hr-line .ro-tab-2');
			process2.parent().parent().removeClass('ro-process-1');
			process2.parent().parent().addClass('ro-process-2');
			$('.ro-checkout-panel .ro-panel-1').css('display', 'none');
			$('.ro-checkout-panel .ro-panel-2').css('display', 'block');
		});
	});

	jQuery(window).load(function(){
			
		// func active tabs default
		jQuery('.wpb_tabs').each(function(){
			var wpb_tabs_nav = $(this).find('.wpb_tabs_nav'),
				active_num = wpb_tabs_nav.data('active-tab');
			wpb_tabs_nav.find('li').eq(parseInt(active_num) - 1).trigger('click');
		})
		
		//setTimeout(function(){
			var $wpb_accordion = $('.wpb_accordion');
			if($wpb_accordion.length > 0 && $.fn.niceScroll !== undefined){
				$wpb_accordion.each(function(){
					$(this).find('.wpb_accordion_section').each(function(){
						$(this).css({display: 'block'});
						var nice = $(this).find('.wpb_accordion_content').niceScroll();
					})
				})
			}
		//}, 10)
		
		var $nice_scroll_class_js = $('.nice-scroll-class-js');
		if($nice_scroll_class_js.length > 0 && $.fn.niceScroll !== undefined){
			$nice_scroll_class_js.each(function(){
				$(this).niceScroll();
			})
		}
	});	
	
})(jQuery);