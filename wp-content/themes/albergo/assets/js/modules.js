(function($) {
    "use strict";

    window.eltd = {};
    eltd.modules = {};

    eltd.scroll = 0;
    eltd.window = $(window);
    eltd.document = $(document);
    eltd.windowWidth = $(window).width();
    eltd.windowHeight = $(window).height();
    eltd.body = $('body');
    eltd.html = $('html, body');
    eltd.htmlEl = $('html');
    eltd.menuDropdownHeightSet = false;
    eltd.defaultHeaderStyle = '';
    eltd.minVideoWidth = 1500;
    eltd.videoWidthOriginal = 1280;
    eltd.videoHeightOriginal = 720;
    eltd.videoRatio = 1.61;

    eltd.eltdOnDocumentReady = eltdOnDocumentReady;
    eltd.eltdOnWindowLoad = eltdOnWindowLoad;
    eltd.eltdOnWindowResize = eltdOnWindowResize;
    eltd.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltd.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(eltd.body.hasClass('eltd-dark-header')){ eltd.defaultHeaderStyle = 'eltd-dark-header';}
        if(eltd.body.hasClass('eltd-light-header')){ eltd.defaultHeaderStyle = 'eltd-light-header';}
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltd.windowWidth = $(window).width();
        eltd.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {
        eltd.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch(true){
        case eltd.body.hasClass('eltd-grid-1300'):
            eltd.boxedLayoutWidth = 1350;
            break;
        case eltd.body.hasClass('eltd-grid-1200'):
            eltd.boxedLayoutWidth = 1250;
            break;
        case eltd.body.hasClass('eltd-grid-1000'):
            eltd.boxedLayoutWidth = 1050;
            break;
        case eltd.body.hasClass('eltd-grid-800'):
            eltd.boxedLayoutWidth = 850;
            break;
        default :
            eltd.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
	(function($) {
	"use strict";

    var common = {};
    eltd.modules.common = common;

    common.eltdFluidVideo = eltdFluidVideo;
    common.eltdEnableScroll = eltdEnableScroll;
    common.eltdDisableScroll = eltdDisableScroll;
    common.eltdOwlSlider = eltdOwlSlider;
    common.eltdInitParallax = eltdInitParallax;
    common.eltdInitSelfHostedVideoPlayer = eltdInitSelfHostedVideoPlayer;
    common.eltdSelfHostedVideoSize = eltdSelfHostedVideoSize;
    common.eltdPrettyPhoto = eltdPrettyPhoto;
	common.eltdStickySidebarWidget = eltdStickySidebarWidget;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    common.eltdOnDocumentReady = eltdOnDocumentReady;
    common.eltdOnWindowLoad = eltdOnWindowLoad;
    common.eltdOnWindowResize = eltdOnWindowResize;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdIconWithHover().init();
	    eltdDisableSmoothScrollForMac();
	    eltdInitAnchor().init();
	    eltdInitBackToTop();
	    eltdBackButtonShowHide();
	    eltdInitSelfHostedVideoPlayer();
	    eltdSelfHostedVideoSize();
	    eltdFluidVideo();
	    eltdOwlSlider();
	    eltdPreloadBackgrounds();
	    eltdPrettyPhoto();
	    eltdSearchPostTypeWidget();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
	    eltdInitParallax();
        eltdSmoothTransition();
	    eltdStickySidebarWidget().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltdSelfHostedVideoSize();
    }
	
	/*
	 ** Disable smooth scroll for mac if smooth scroll is enabled
	 */
	function eltdDisableSmoothScrollForMac() {
		var os = navigator.appVersion.toLowerCase();
		
		if (os.indexOf('mac') > -1 && eltd.body.hasClass('eltd-smooth-scroll')) {
			eltd.body.removeClass('eltd-smooth-scroll');
		}
	}
	
	function eltdDisableScroll() {
		if (window.addEventListener) {
			window.addEventListener('DOMMouseScroll', eltdWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = eltdWheel;
		document.onkeydown = eltdKeydown;
	}
	
	function eltdEnableScroll() {
		if (window.removeEventListener) {
			window.removeEventListener('DOMMouseScroll', eltdWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = document.onkeydown = null;
	}
	
	function eltdWheel(e) {
		eltdPreventDefaultValue(e);
	}
	
	function eltdKeydown(e) {
		var keys = [37, 38, 39, 40];
		
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				eltdPreventDefaultValue(e);
				return;
			}
		}
	}
	
	function eltdPreventDefaultValue(e) {
		e = e || window.event;
		if (e.preventDefault) {
			e.preventDefault();
		}
		e.returnValue = false;
	}
	
	/*
	 **	Anchor functionality
	 */
	var eltdInitAnchor = function() {
		/**
		 * Set active state on clicked anchor
		 * @param anchor, clicked anchor
		 */
		var setActiveState = function(anchor){
			var headers = $('.eltd-main-menu, .eltd-mobile-nav, .eltd-fullscreen-menu');
			
			headers.each(function(){
				var currentHeader = $(this);
				
				if (anchor.parents(currentHeader).length) {
					currentHeader.find('.eltd-active-item').removeClass('eltd-active-item');
					anchor.parent().addClass('eltd-active-item');
					
					currentHeader.find('a').removeClass('current');
					anchor.addClass('current');
				}
			});
		};
		
		/**
		 * Check anchor active state on scroll
		 */
		var checkActiveStateOnScroll = function(){
			var anchorData = $('[data-eltd-anchor]'),
				anchorElement,
				siteURL = window.location.href.split('#')[0];
			
			if (siteURL.substr(-1) !== '/') {
				siteURL += '/';
			}
			
			anchorData.waypoint( function(direction) {
				if(direction === 'down') {
					if ($(this.element).length > 0) {
						anchorElement = $(this.element).data("eltd-anchor");
					} else {
						anchorElement = $(this).data("eltd-anchor");
					}
				
					setActiveState($("a[href='"+siteURL+"#"+anchorElement+"']"));
				}
			}, { offset: '50%' });
			
			anchorData.waypoint( function(direction) {
				if(direction === 'up') {
					if ($(this.element).length > 0) {
						anchorElement = $(this.element).data("eltd-anchor");
					} else {
						anchorElement = $(this).data("eltd-anchor");
					}
					
					setActiveState($("a[href='"+siteURL+"#"+anchorElement+"']"));
				}
			}, { offset: function(){
				return -($(this.element).outerHeight() - 150);
			} });
			
		};
		
		/**
		 * Check anchor active state on load
		 */
		var checkActiveStateOnLoad = function(){
			var hash = window.location.hash.split('#')[1];
			
			if(hash !== "" && $('[data-eltd-anchor="'+hash+'"]').length > 0){
				anchorClickOnLoad(hash);
			}
		};
		
		/**
		 * Handle anchor on load
		 */
		var anchorClickOnLoad = function ($this) {
			var scrollAmount,
				anchor = $('.eltd-main-menu a, .eltd-mobile-nav a, .eltd-fullscreen-menu a'),
				hash = $this,
				anchorData = hash !== '' ? $('[data-eltd-anchor="' + hash + '"]') : '';
			
			if (hash !== '' && anchorData.length > 0) {
				var anchoredElementOffset = anchorData.offset().top;
				scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - eltdGlobalVars.vars.eltdAddForAdminBar;
				
				if(anchor.length) {
					anchor.each(function(){
						var thisAnchor = $(this);
						
						if(thisAnchor.attr('href').indexOf(hash) > -1) {
							setActiveState(thisAnchor);
						}
					});
				}
				
				eltd.html.stop().animate({
					scrollTop: Math.round(scrollAmount)
				}, 1000, function () {
					//change hash tag in url
					if (history.pushState) {
						history.pushState(null, '', '#' + hash);
					}
				});
				return false;
			}
		};
		
		/**
		 * Calculate header height to be substract from scroll amount
		 * @param anchoredElementOffset, anchorded element offset
		 */
		var headerHeightToSubtract = function (anchoredElementOffset) {
			
			if (eltd.modules.stickyHeader.behaviour === 'eltd-sticky-header-on-scroll-down-up') {
				eltd.modules.stickyHeader.isStickyVisible = (anchoredElementOffset > eltd.modules.header.stickyAppearAmount);
			}
			
			if (eltd.modules.stickyHeader.behaviour === 'eltd-sticky-header-on-scroll-up') {
				if ((anchoredElementOffset > eltd.scroll)) {
					eltd.modules.stickyHeader.isStickyVisible = false;
				}
			}
			
			var headerHeight = eltd.modules.stickyHeader.isStickyVisible ? eltdGlobalVars.vars.eltdStickyHeaderTransparencyHeight : eltdPerPageVars.vars.eltdHeaderTransparencyHeight;
			
			if (eltd.windowWidth < 1025) {
				headerHeight = 0;
			}
			
			return headerHeight;
		};
		
		/**
		 * Handle anchor click
		 */
		var anchorClick = function () {
			eltd.document.on("click", ".eltd-main-menu a, .eltd-fullscreen-menu a, .eltd-btn, .eltd-anchor, .eltd-mobile-nav a", function () {
				var scrollAmount,
					anchor = $(this),
					hash = anchor.prop("hash").split('#')[1],
					anchorData = hash !== '' ? $('[data-eltd-anchor="' + hash + '"]') : '';
				
				if (hash !== '' && anchorData.length > 0) {
					var anchoredElementOffset = anchorData.offset().top;
					scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - eltdGlobalVars.vars.eltdAddForAdminBar;
					
					setActiveState(anchor);
					
					eltd.html.stop().animate({
						scrollTop: Math.round(scrollAmount)
					}, 1000, function () {
						//change hash tag in url
						if (history.pushState) {
							history.pushState(null, '', '#' + hash);
						}
					});
					return false;
				}
			});
		};
		
		return {
			init: function () {
				if ($('[data-eltd-anchor]').length) {
					anchorClick();
					checkActiveStateOnScroll();
					$(window).load(function () {
						checkActiveStateOnLoad();
					});
				}
			}
		};
	};
	
	function eltdInitBackToTop() {
		var backToTopButton = $('#eltd-back-to-top');
		backToTopButton.on('click', function (e) {
			e.preventDefault();
			eltd.html.animate({scrollTop: 0}, eltd.window.scrollTop() / 3, 'linear');
		});
	}
	
	function eltdBackButtonShowHide() {
		eltd.window.scroll(function () {
			var b = $(this).scrollTop(),
				c = $(this).height(),
				d;
			
			if (b > 0) {
				d = b + c / 2;
			} else {
				d = 1;
			}
			
			if (d < 1e3) {
				eltdToTopButton('off');
			} else {
				eltdToTopButton('on');
			}
		});
	}
	
	function eltdToTopButton(a) {
		var b = $("#eltd-back-to-top");
		b.removeClass('off on');
		if (a === 'on') {
			b.addClass('on');
		} else {
			b.addClass('off');
		}
	}
	
	function eltdInitSelfHostedVideoPlayer() {
		var players = $('.eltd-self-hosted-video');
		
		if (players.length) {
			players.mediaelementplayer({
				audioWidth: '100%'
			});
		}
	}
	
	function eltdSelfHostedVideoSize(){
		var selfVideoHolder = $('.eltd-self-hosted-video-holder .eltd-video-wrap');
		
		if(selfVideoHolder.length) {
			selfVideoHolder.each(function(){
				var thisVideo = $(this),
					videoWidth = thisVideo.closest('.eltd-self-hosted-video-holder').outerWidth(),
					videoHeight = videoWidth / eltd.videoRatio;
				
				if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
					thisVideo.parent().width(videoWidth);
					thisVideo.parent().height(videoHeight);
				}
				
				thisVideo.width(videoWidth);
				thisVideo.height(videoHeight);
				
				thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
				thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
			});
		}
	}
	
	function eltdFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}
	
	function eltdSmoothTransition() {

		if (eltd.body.hasClass('eltd-smooth-page-transitions')) {

			//check for preload animation
			if (eltd.body.hasClass('eltd-smooth-page-transitions-preloader')) {
				var loader = $('body > .eltd-smooth-transition-loader.eltd-mimic-ajax');

				if($('.eltd-albergo-loader').length){

					$(".eltd-albergo-loader-detail-light").one('animationiteration webkitAnimationIteration', function() {

						$('.eltd-albergo-loader').addClass('eltd-loaded');

						setTimeout(function(){

							$('.eltd-albergo-loader').addClass('eltd-loading-finished');

							setTimeout(function(){
								loader.fadeOut(500);

								$(window).bind('pageshow', function (event) {
									if (event.originalEvent.persisted) {
										loader.fadeOut(500);
									}
								});

							},500);

						},1500);

					});
				}
				else {
					loader.fadeOut(500);

					$(window).bind('pageshow', function (event) {
						if (event.originalEvent.persisted) {
							loader.fadeOut(500);
						}
					});
				}
			}

			//check for fade out animation
			if (eltd.body.hasClass('eltd-smooth-page-transitions-fadeout')) {
				var linkItem = $('a');
				
				linkItem.click(function (e) {
					var a = $(this);

					if ((a.parents('.eltd-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
						return;
					}

					if (
						e.which === 1 && // check if the left mouse button has been pressed
						a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
						(typeof a.data('rel') === 'undefined') && //Not pretty photo link
						(typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (!a.hasClass('lightbox-active')) && //Not lightbox plugin active
						(typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
						(a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
					) {
						e.preventDefault();
						$('.eltd-wrapper-inner').fadeOut(1000, function () {
							window.location = a.attr('href');
						});
					}
				});
			}
		}
	}
	
	/*
	 *	Preload background images for elements that have 'eltd-preload-background' class
	 */
	function eltdPreloadBackgrounds(){
		var preloadBackHolder = $('.eltd-preload-background');
		
		if(preloadBackHolder.length) {
			preloadBackHolder.each(function() {
				var preloadBackground = $(this);
				
				if(preloadBackground.css('background-image') !== '' && preloadBackground.css('background-image') !== 'none') {
					var bgUrl = preloadBackground.attr('style');
					
					bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
					bgUrl = bgUrl ? bgUrl[1] : "";
					
					if (bgUrl) {
						var backImg = new Image();
						backImg.src = bgUrl;
						$(backImg).load(function(){
							preloadBackground.removeClass('eltd-preload-background');
						});
					}
				} else {
					$(window).load(function(){ preloadBackground.removeClass('eltd-preload-background'); }); //make sure that eltd-preload-background class is removed from elements with forced background none in css
				}
			});
		}
	}
	
	function eltdPrettyPhoto() {
		/*jshint multistr: true */
		var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';
		
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed: 'normal', /* fast/slow/normal */
			slideshow: false, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			horizontal_padding: 0,
			default_width: 960,
			default_height: 540,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			deeplinking: false,
			custom_markup: '',
			social_tools: false,
			markup: markupWhole
		});
	}

    function eltdSearchPostTypeWidget() {
        var searchPostTypeHolder = $('.eltd-search-post-type');

        if (searchPostTypeHolder.length) {
            searchPostTypeHolder.each(function () {
                var thisSearch = $(this),
                    searchField = thisSearch.find('.eltd-post-type-search-field'),
                    resultsHolder = thisSearch.siblings('.eltd-post-type-search-results'),
                    searchLoading = thisSearch.find('.eltd-search-loading'),
                    searchIcon = thisSearch.find('.eltd-search-icon');

                searchLoading.addClass('eltd-hidden');

                var postType = thisSearch.data('post-type'),
                    keyPressTimeout;

                searchField.on('keyup paste', function() {
                    var field = $(this);
                    field.attr('autocomplete','off');
                    searchLoading.removeClass('eltd-hidden');
                    searchIcon.addClass('eltd-hidden');
                    clearTimeout(keyPressTimeout);

                    keyPressTimeout = setTimeout( function() {
                        var searchTerm = field.val();
                        if(searchTerm.length < 3) {
                            resultsHolder.html('');
                            resultsHolder.fadeOut();
                            searchLoading.addClass('eltd-hidden');
                            searchIcon.removeClass('eltd-hidden');
                        } else {
                            var ajaxData = {
                                action: 'albergo_elated_search_post_types',
                                term: searchTerm,
                                postType: postType
                            };

                            $.ajax({
                                type: 'POST',
                                data: ajaxData,
                                url: eltdGlobalVars.vars.eltdAjaxUrl,
                                success: function (data) {
                                    var response = JSON.parse(data);
                                    if (response.status === 'success') {
                                        searchLoading.addClass('eltd-hidden');
                                        searchIcon.removeClass('eltd-hidden');
                                        resultsHolder.html(response.data.html);
                                        resultsHolder.fadeIn();
                                    }
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    console.log("Status: " + textStatus);
                                    console.log("Error: " + errorThrown);
                                    searchLoading.addClass('eltd-hidden');
                                    searchIcon.removeClass('eltd-hidden');
                                    resultsHolder.fadeOut();
                                }
                            });
                        }
                    }, 500);
                });

                searchField.on('focusout', function () {
                    searchLoading.addClass('eltd-hidden');
                    searchIcon.removeClass('eltd-hidden');
                    resultsHolder.fadeOut();
                });
            });
        }
    }
	
	/**
	 * Initializes load more data params
	 * @param container with defined data params
	 * return array
	 */
	function getLoadMoreData(container){
		var dataList = container.data(),
			returnValue = {};
		
		for (var property in dataList) {
			if (dataList.hasOwnProperty(property)) {
				if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
					returnValue[property] = dataList[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Sets load more data params for ajax function
	 * @param container with defined data params
	 * @param action with defined action name
	 * return array
	 */
	function setLoadMoreAjaxData(container, action) {
		var returnValue = {
			action: action
		};
		
		for (var property in container) {
			if (container.hasOwnProperty(property)) {
				
				if (typeof container[property] !== 'undefined' && container[property] !== false) {
					returnValue[property] = container[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Object that represents icon with hover data
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdIconWithHover = function() {
		//get all icons on page
		var icons = $('.eltd-icon-has-hover');
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var hoverColor = icon.data('hover-color'),
					originalColor = icon.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconHoverColor($(this));
					});
				}
			}
		};
	};
	
	/*
	 ** Init parallax
	 */
	function eltdInitParallax(){
		var parallaxHolder = $('.eltd-parallax-row-holder');
		
		if(parallaxHolder.length){
			parallaxHolder.each(function() {
				var parallaxElement = $(this),
					image = parallaxElement.data('parallax-bg-image'),
					speed = parallaxElement.data('parallax-bg-speed') * 0.4,
					height = 0;
				
				if (typeof parallaxElement.data('parallax-bg-height') !== 'undefined' && parallaxElement.data('parallax-bg-height') !== false) {
					height = parseInt(parallaxElement.data('parallax-bg-height'));
				}
				
				parallaxElement.css({'background-image': 'url('+image+')'});
				
				if(height > 0) {
					parallaxElement.css({'min-height': height+'px', 'height': height+'px'});
				}
				
				parallaxElement.parallax('50%', speed);
			});
		}
	}
	
	/*
	 **  Init sticky sidebar widget
	 */
	function eltdStickySidebarWidget(){
		var sswHolder = $('.eltd-widget-sticky-sidebar'),
			headerHolder = $('.eltd-page-header'),
			headerHeight = headerHolder.length ? headerHolder.outerHeight() : 0,
			widgetTopOffset = 0,
			widgetTopPosition = 0,
			sidebarHeight = 0,
			sidebarWidth = 0,
			objectsCollection = [];
		
		function addObjectItems() {
			if (sswHolder.length) {
				sswHolder.each(function () {
					var thisSswHolder = $(this),
						mainSidebarHolder = thisSswHolder.parents('aside.eltd-sidebar'),
						widgetiseSidebarHolder = thisSswHolder.parents('.wpb_widgetised_column'),
						sidebarHolder = '',
						sidebarHolderHeight = 0;
					
					widgetTopOffset = thisSswHolder.offset().top;
					widgetTopPosition = thisSswHolder.position().top;
					sidebarHeight = 0;
					sidebarWidth = 0;
					
					if (mainSidebarHolder.length) {
						sidebarHeight = mainSidebarHolder.outerHeight();
						sidebarWidth = mainSidebarHolder.outerWidth();
						sidebarHolder = mainSidebarHolder;
						sidebarHolderHeight = mainSidebarHolder.parent().parent().outerHeight();
						
						var blogHolder = mainSidebarHolder.parent().parent().find('.eltd-blog-holder');
						if (blogHolder.length) {
							sidebarHolderHeight -= parseInt(blogHolder.css('marginBottom'));
						}
					} else if (widgetiseSidebarHolder.length) {
						sidebarHeight = widgetiseSidebarHolder.outerHeight();
						sidebarWidth = widgetiseSidebarHolder.outerWidth();
						sidebarHolder = widgetiseSidebarHolder;
						sidebarHolderHeight = widgetiseSidebarHolder.parents('.vc_row').outerHeight();
					}
					
					objectsCollection.push({
						'object': thisSswHolder,
						'offset': widgetTopOffset,
						'position': widgetTopPosition,
						'height': sidebarHeight,
						'width': sidebarWidth,
						'sidebarHolder': sidebarHolder,
						'sidebarHolderHeight': sidebarHolderHeight
					});
				});
			}
		}
		
		function initStickySidebarWidget() {
			
			if (objectsCollection.length) {
				$.each(objectsCollection, function (i) {
					var thisSswHolder = objectsCollection[i].object,
						thisWidgetTopOffset = objectsCollection[i].offset,
						thisWidgetTopPosition = objectsCollection[i].position,
						thisSidebarHeight = objectsCollection[i].height,
						thisSidebarWidth = objectsCollection[i].width,
						thisSidebarHolder = objectsCollection[i].sidebarHolder,
						thisSidebarHolderHeight = objectsCollection[i].sidebarHolderHeight;
					
					if (eltd.body.hasClass('eltd-fixed-on-scroll')) {
						var fixedHeader = $('.eltd-fixed-wrapper.fixed');
						
						if (fixedHeader.length) {
							headerHeight = fixedHeader.outerHeight() + eltdGlobalVars.vars.eltdAddForAdminBar;
						}
					} else if (eltd.body.hasClass('eltd-no-behavior')) {
						headerHeight = eltdGlobalVars.vars.eltdAddForAdminBar;
					}
					
					if (eltd.windowWidth > 1024 && thisSidebarHolder.length) {
						var sidebarPosition = -(thisWidgetTopPosition - headerHeight),
							sidebarHeight = thisSidebarHeight - thisWidgetTopPosition - 40; // 40 is bottom margin of widget holder
						
						//move sidebar up when hits the end of section row
						var rowSectionEndInViewport = thisSidebarHolderHeight + thisWidgetTopOffset - headerHeight - thisWidgetTopPosition - eltdGlobalVars.vars.eltdTopBarHeight;
						
						if ((eltd.scroll >= thisWidgetTopOffset - headerHeight) && thisSidebarHeight < thisSidebarHolderHeight) {
							if (thisSidebarHolder.hasClass('eltd-sticky-sidebar-appeared')) {
								thisSidebarHolder.css({'top': sidebarPosition + 'px'});
							} else {
								thisSidebarHolder.addClass('eltd-sticky-sidebar-appeared').css({
									'position': 'fixed',
									'top': sidebarPosition + 'px',
									'width': thisSidebarWidth,
									'margin-top': '-10px'
								}).animate({'margin-top': '0'}, 200);
							}
							
							if (eltd.scroll + sidebarHeight >= rowSectionEndInViewport) {
								var absBottomPosition = thisSidebarHolderHeight - sidebarHeight + sidebarPosition - headerHeight;
								
								thisSidebarHolder.css({
									'position': 'absolute',
									'top': absBottomPosition + 'px'
								});
							} else {
								if (thisSidebarHolder.hasClass('eltd-sticky-sidebar-appeared')) {
									thisSidebarHolder.css({
										'position': 'fixed',
										'top': sidebarPosition + 'px'
									});
								}
							}
						} else {
							thisSidebarHolder.removeClass('eltd-sticky-sidebar-appeared').css({
								'position': 'relative',
								'top': '0',
								'width': 'auto'
							});
						}
					} else {
						thisSidebarHolder.removeClass('eltd-sticky-sidebar-appeared').css({
							'position': 'relative',
							'top': '0',
							'width': 'auto'
						});
					}
				});
			}
		}
		
		return {
			init: function () {
				addObjectItems();
				
				initStickySidebarWidget();
				
				$(window).scroll(function () {
					initStickySidebarWidget();
				});
			},
			reInit: initStickySidebarWidget
		};
	}

    /**
     * Init Owl Carousel
     */
    function eltdOwlSlider() {
        var sliders = $('.eltd-owl-slider');

        if (sliders.length) {
            sliders.each(function(){
                var slider = $(this),
                    owlSlider = $(this),
	                slideItemsNumber = slider.children().length,
	                numberOfItems = 1,
	                loop = true,
	                autoplay = true,
	                autoplayHoverPause = true,
	                sliderSpeed = 5000,
	                sliderSpeedAnimation = 600,
	                margin = 0,
	                responsiveMargin = 0,
	                responsiveMargin1 = 0,
	                stagePadding = 0,
	                stagePaddingEnabled = false,
	                center = false,
	                autoWidth = false,
	                animateIn = false, // keyframe css animation
	                animateOut = false, // keyframe css animation
	                navigation = true,
	                customNavigation = false,
	                pagination = false,
                    thumbnail = false,
                    thumbnailSlider,
                    navTextLeft = '<span class="eltd-prev-icon lnr-chevron-left"></span>',
                    navTextRight = '<span class="eltd-next-icon lnr-chevron-right"></span>',
	                sliderIsPortfolio = !!slider.hasClass('eltd-pl-is-slider'),
	                sliderDataHolder = sliderIsPortfolio ? slider.parent() : slider,  // this is condition for portfolio slider
                    prevArrowNumber,
                    nextArrowNumber;
	
	            if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false && !sliderIsPortfolio) {
		            numberOfItems = slider.data('number-of-items');
	            }
	            if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
		            numberOfItems = sliderDataHolder.data('number-of-columns');
	            }
	            if (sliderDataHolder.data('enable-loop') === 'no') {
		            loop = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay') === 'no') {
		            autoplay = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
		            autoplayHoverPause = false;
	            }
	            if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
		            sliderSpeed = sliderDataHolder.data('slider-speed');
	            }
	            if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
		            sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
	            }
	            if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
		            if (sliderDataHolder.data('slider-margin') === 'no') {
			            margin = 0;
		            } else {
			            margin = sliderDataHolder.data('slider-margin');
		            }
	            } else {
		            if(slider.parent().hasClass('eltd-huge-space')) {
			            margin = 60;
		            } else if (slider.parent().hasClass('eltd-large-space')) {
			            margin = 50;
		            } else if (slider.parent().hasClass('eltd-medium-space')) {
			            margin = 40;
		            } else if (slider.parent().hasClass('eltd-normal-space')) {
			            margin = 30;
		            } else if (slider.parent().hasClass('eltd-small-space')) {
			            margin = 20;
		            } else if (slider.parent().hasClass('eltd-tiny-space')) {
			            margin = 10;
		            }
	            }
	            if (sliderDataHolder.data('slider-padding') === 'yes') {
		            stagePaddingEnabled = true;
		            stagePadding = parseInt(slider.outerWidth() * 0.28);
		            margin = 50;
	            }
	            if (sliderDataHolder.data('enable-center') === 'yes') {
		            center = true;
	            }
	            if (sliderDataHolder.data('enable-auto-width') === 'yes') {
		            autoWidth = true;
	            }
	            if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
		            animateIn = sliderDataHolder.data('slider-animate-in');
	            }
	            if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
		            animateOut = sliderDataHolder.data('slider-animate-out');
	            }
	            if (sliderDataHolder.data('enable-navigation') === 'no') {
		            navigation = false;
	            }
                if (sliderDataHolder.data('enable-custom-navigation') === 'yes') {
                    customNavigation = true;
                }
	            if (sliderDataHolder.data('enable-pagination') === 'yes') {
		            pagination = true;
	            }
	            
	            if(navigation && pagination) {
		            slider.addClass('eltd-slider-has-both-nav');
	            }

                if (sliderDataHolder.data('enable-thumbnail') === 'yes') {
                    thumbnail = true;
                }

                if (slideItemsNumber <= 1) {
		            loop       = false;
		            autoplay   = false;
		            navigation = false;
		            pagination = false;
	            }
	
	            var responsiveNumberOfItems1 = 1,
		            responsiveNumberOfItems2 = 2,
		            responsiveNumberOfItems3 = 3,
		            responsiveNumberOfItems4 = numberOfItems;
	
	            if (numberOfItems < 3) {
		            responsiveNumberOfItems2 = numberOfItems;
		            responsiveNumberOfItems3 = numberOfItems;
	            }
	
	            if (numberOfItems > 4) {
		            responsiveNumberOfItems4 = 4;
	            }
	
	            if (stagePaddingEnabled || margin > 30) {
		            responsiveMargin = 20;
		            responsiveMargin1 = 30;
	            }
	
	            if (margin > 0 && margin <= 30) {
		            responsiveMargin = margin;
		            responsiveMargin1 = margin;
	            }

	            if (customNavigation) {

	                var numberOfSlides = slider.find('.eltd-ig-image').length;
	                var nextSlideNumber = '02';
	                if(numberOfSlides < 10) {
                        numberOfSlides = '0'+numberOfSlides;
                    }
                    if(numberOfSlides === 1) {
                        nextSlideNumber = '01';
                    }

	                navTextLeft = '<span class="eltd-custom-prev-icon"><span class="custom-line-top"></span><span class="custom-line-bottom"></span></span><span class="eltd-number-custom-icon">'+numberOfSlides+'</span>';
                    navTextRight = '<span class="eltd-number-custom-icon">'+nextSlideNumber+'</span><span class="eltd-custom-next-icon"><span class="custom-line-top"></span><span class="custom-line-bottom"></span></span>';
                }

                owlSlider = slider.owlCarousel({
		            items: numberOfItems,
		            loop: loop,
		            autoplay: autoplay,
		            autoplayHoverPause: autoplayHoverPause,
		            autoplayTimeout: sliderSpeed,
		            smartSpeed: sliderSpeedAnimation,
		            margin: margin,
		            stagePadding: stagePadding,
		            center: center,
		            autoWidth: autoWidth,
		            animateIn: animateIn,
		            animateOut: animateOut,
		            dots: pagination,
		            nav: navigation,
		            navText: [
                        navTextLeft,
                        navTextRight
		            ],
		            responsive: {
			            0: {
				            items: responsiveNumberOfItems1,
				            margin: responsiveMargin,
				            stagePadding: 0,
				            center: false,
				            autoWidth: false
			            },
			            681: {
				            items: responsiveNumberOfItems2,
				            margin: responsiveMargin1
			            },
			            769: {
				            items: responsiveNumberOfItems3,
				            margin: responsiveMargin1
			            },
			            1025: {
				            items: responsiveNumberOfItems4
			            },
			            1281: {
				            items: numberOfItems
			            }
		            },
		            onInitialize: function () {
			            slider.css('visibility', 'visible');
			            eltdInitParallax();

		            },
                    onInitialized: function () {
                        if(customNavigation && pagination) {
                            var paginationHeight = slider.find('.owl-dots').height() + parseInt(slider.find('.owl-dots').css('margin-top'));
                            slider.find('.owl-nav').css('margin-top', (paginationHeight/-2) + 'px');
                        }
                    },
                    onChanged: function (event) {

                    	slider.addClass('eltd-changing-slide');

                    	setTimeout(function(){
                    		slider.removeClass('eltd-changing-slide');
                    	},sliderSpeedAnimation);

		                if(customNavigation) {

                            var activeNumber = event.page.index;
                            var numberOfSlides = event.page.count;

                            prevArrowNumber = slider.find('.owl-nav .owl-prev .eltd-number-custom-icon');
                            nextArrowNumber = slider.find('.owl-nav .owl-next .eltd-number-custom-icon');

                            if (activeNumber >= 0) {
                                if (activeNumber === 0) {
                                    if (numberOfSlides < 10) {
                                        prevArrowNumber.html('0' + (numberOfSlides));
                                    } else {
                                        prevArrowNumber.html(numberOfSlides);
                                    }
                                    nextArrowNumber.html('02');
                                }
                                else if ((activeNumber + 1) === (numberOfSlides)) {
                                    if (activeNumber < 10) {
                                        prevArrowNumber.html('0' + activeNumber);
                                    } else {
                                        prevArrowNumber.html(activeNumber);
                                    }
                                    nextArrowNumber.html('01');
                                }
                                else {
                                    if (activeNumber < 10) {
                                        prevArrowNumber.html('0' + activeNumber);
                                    } else {
                                        prevArrowNumber.html(activeNumber);
                                    }

                                    if (activeNumber < 8) {
                                        nextArrowNumber.html('0' + (activeNumber + 2));
                                    } else {
                                        nextArrowNumber.html(activeNumber + 2);
                                    }

                                }
                            }
                        }
                    },
                    onDrag: function (e) {
			            if (eltd.body.hasClass('eltd-smooth-page-transitions-fadeout')) {
				            var sliderIsMoving = e.isTrigger > 0;
				
				            if (sliderIsMoving) {
					            slider.addClass('eltd-slider-is-moving');
				            }
			            }
		            },
		            onDragged: function () {
			            if (eltd.body.hasClass('eltd-smooth-page-transitions-fadeout') && slider.hasClass('eltd-slider-is-moving')) {
				
				            setTimeout(function () {
					            slider.removeClass('eltd-slider-is-moving');
				            }, 500);
			            }
		            }

                });

                $(window).load(function() {
                    owlSlider.trigger('refresh.owl.carousel');
                    /* mac resize fix  */
                });
				

                if(thumbnail) {

                    thumbnailSlider = slider.parent().find('.eltd-slider-thumbnail');

                    var numberOfThumbnails = parseInt(thumbnailSlider.data('thumbnail-count'));
                    var numberOfThumbnailsClass = '';

                    switch (numberOfThumbnails % 6) {
                        case 2 :
                            numberOfThumbnailsClass = 'two';
                            break;
                        case 3 :
                            numberOfThumbnailsClass = 'three';
                            break;
                        case 4 :
                            numberOfThumbnailsClass = 'four';
                            break;
                        case 5 :
                            numberOfThumbnailsClass = 'five';
                            break;
                        case 0 :
                            numberOfThumbnailsClass = 'six';
                            break;
                        default :
                            numberOfThumbnailsClass = 'six';
                            break;
                    }

                    if(numberOfThumbnailsClass !== '') {
                        thumbnailSlider.addClass('eltd-slider-columns-' + numberOfThumbnailsClass);
                    }

                    thumbnailSlider.find('.eltd-slider-thumbnail-item').click(function () {
                        owlSlider.trigger('to.owl.carousel', [$(this).index(), sliderSpeedAnimation]);
                    });
                }
            });
        }
    }

})(jQuery);
(function($) {
    'use strict';

    var like = {};
    
    like.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /**
    *  All functions to be called on $(document).ready() should be in this function
    **/
    function eltdOnDocumentReady() {
        eltdLikes();
    }

    function eltdLikes() {
        $(document).on('click','.eltd-like', function() {
            var likeLink = $(this),
                id = likeLink.attr('id'),
                type;

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if (typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var dataToPass = {
                action: 'albergo_elated_like',
                likes_id: id,
                type: type
            };

            var like = $.post(eltdGlobalVars.vars.eltdAjaxUrl, dataToPass, function( data ) {
                likeLink.html(data).addClass('liked').attr('title', 'You already like this!');
            });

            return false;
        });
    }
    
})(jQuery);
(function($) {
    "use strict";

    var blogListSC = {};
    eltd.modules.blogListSC = blogListSC;

    blogListSC.eltdOnDocumentReady = eltdOnDocumentReady;
    blogListSC.eltdOnWindowLoad = eltdOnWindowLoad;
    blogListSC.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).scroll(eltdOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdOnDocumentReady() {
        eltdInitBlogListMasonry();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdOnWindowLoad() {
        eltdInitBlogListShortcodePagination().init();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdOnWindowScroll() {
        eltdInitBlogListShortcodePagination().scroll();
    }

    /**
     * Init blog list shortcode masonry layout
     */
    function eltdInitBlogListMasonry() {
        var holder = $('.eltd-blog-list-holder.eltd-bl-masonry');

        if(holder.length){
            holder.each(function(){
                var thisHolder = $(this),
                    masonry = thisHolder.find('.eltd-blog-list');

                masonry.waitForImages(function() {
                    masonry.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.eltd-bl-item',
                        percentPosition: true,
                        packery: {
                            gutter: '.eltd-bl-grid-gutter',
                            columnWidth: '.eltd-bl-grid-sizer'
                        }
                    });

                    masonry.css('opacity', '1');
                });
            });
        }
    }

    /**
     * Init blog list shortcode pagination functions
     */
    function eltdInitBlogListShortcodePagination(){
        var holder = $('.eltd-blog-list-holder');

        var initStandardPagination = function(thisHolder) {
            var standardLink = thisHolder.find('.eltd-bl-standard-pagination li');

            if(standardLink.length) {
                standardLink.each(function(){
                    var thisLink = $(this).children('a'),
                        pagedLink = 1;

                    thisLink.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
                            pagedLink = thisLink.data('paged');
                        }

                        initMainPagFunctionality(thisHolder, pagedLink);
                    });
                });
            }
        };

        var initLoadMorePagination = function(thisHolder) {
            var loadMoreButton = thisHolder.find('.eltd-blog-pag-load-more a');

            loadMoreButton.on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisHolder);
            });
        };

        var initInifiteScrollPagination = function(thisHolder) {
            var blogListHeight = thisHolder.outerHeight(),
                blogListTopOffest = thisHolder.offset().top,
                blogListPosition = blogListHeight + blogListTopOffest - eltdGlobalVars.vars.eltdAddForAdminBar;

            if(!thisHolder.hasClass('eltd-bl-pag-infinite-scroll-started') && eltd.scroll + eltd.windowHeight > blogListPosition) {
                initMainPagFunctionality(thisHolder);
            }
        };

        var initMainPagFunctionality = function(thisHolder, pagedLink) {
            var thisHolderInner = thisHolder.find('.eltd-blog-list'),
                nextPage,
                maxNumPages;

            if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
                maxNumPages = thisHolder.data('max-num-pages');
            }

            if(thisHolder.hasClass('eltd-bl-pag-standard-blog-list')) {
                thisHolder.data('next-page', pagedLink);
            }

            if(thisHolder.hasClass('eltd-bl-pag-infinite-scroll')) {
                thisHolder.addClass('eltd-bl-pag-infinite-scroll-started');
            }

            var loadMoreDatta = eltd.modules.common.getLoadMoreData(thisHolder),
                loadingItem = thisHolder.find('.eltd-blog-pag-loading');

            nextPage = loadMoreDatta.nextPage;

            if(nextPage <= maxNumPages){
                if(thisHolder.hasClass('eltd-bl-pag-standard-blog-list')) {
                    loadingItem.addClass('eltd-showing eltd-standard-pag-trigger');
                    thisHolder.addClass('eltd-bl-pag-standard-blog-list-animate');
                } else {
                    loadingItem.addClass('eltd-showing');
                }

                var ajaxData = eltd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'albergo_elated_blog_shortcode_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: eltdGlobalVars.vars.eltdAjaxUrl,
                    success: function (data) {
                        if(!thisHolder.hasClass('eltd-bl-pag-standard-blog-list')) {
                            nextPage++;
                        }

                        thisHolder.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml =  response.html;

                        if(thisHolder.hasClass('eltd-bl-pag-standard-blog-list')) {
                            eltdInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage);

                            thisHolder.waitForImages(function(){
                                if(thisHolder.hasClass('eltd-bl-masonry')){
                                    eltdInitHtmlIsotopeNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    eltdInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);

                                    if (typeof eltd.modules.common.eltdStickySidebarWidget === 'function') {
                                        eltd.modules.common.eltdStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        } else {
                            thisHolder.waitForImages(function(){
                                if(thisHolder.hasClass('eltd-bl-masonry')){
                                    eltdInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    eltdInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);

                                    if (typeof eltd.modules.common.eltdStickySidebarWidget === 'function') {
                                        eltd.modules.common.eltdStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        }

                        if(thisHolder.hasClass('eltd-bl-pag-infinite-scroll-started')) {
                            thisHolder.removeClass('eltd-bl-pag-infinite-scroll-started');
                        }
                    }
                });
            }

            if(nextPage === maxNumPages){
                thisHolder.find('.eltd-blog-pag-load-more').hide();
            }
        };

        var eltdInitStandardPaginationLinkChanges = function(thisHolder, maxNumPages, nextPage) {
            var standardPagHolder = thisHolder.find('.eltd-bl-standard-pagination'),
                standardPagNumericItem = standardPagHolder.find('li.eltd-bl-pag-number'),
                standardPagPrevItem = standardPagHolder.find('li.eltd-bl-pag-prev a'),
                standardPagNextItem = standardPagHolder.find('li.eltd-bl-pag-next a');

            standardPagNumericItem.removeClass('eltd-bl-pag-active');
            standardPagNumericItem.eq(nextPage-1).addClass('eltd-bl-pag-active');

            standardPagPrevItem.data('paged', nextPage-1);
            standardPagNextItem.data('paged', nextPage+1);

            if(nextPage > 1) {
                standardPagPrevItem.css({'opacity': '1'});
            } else {
                standardPagPrevItem.css({'opacity': '0'});
            }

            if(nextPage === maxNumPages) {
                standardPagNextItem.css({'opacity': '0'});
            } else {
                standardPagNextItem.css({'opacity': '1'});
            }
        };

        var eltdInitHtmlIsotopeNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('eltd-showing eltd-standard-pag-trigger');
            thisHolder.removeClass('eltd-bl-pag-standard-blog-list-animate');

            setTimeout(function() {
                thisHolderInner.isotope('layout');

                if (typeof eltd.modules.common.eltdStickySidebarWidget === 'function') {
                    eltd.modules.common.eltdStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var eltdInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('eltd-showing eltd-standard-pag-trigger');
            thisHolder.removeClass('eltd-bl-pag-standard-blog-list-animate');
            thisHolderInner.html(responseHtml);
        };

        var eltdInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('eltd-showing');

            setTimeout(function() {
                thisHolderInner.isotope('layout');

                if (typeof eltd.modules.common.eltdStickySidebarWidget === 'function') {
                    eltd.modules.common.eltdStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var eltdInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('eltd-showing');
            thisHolderInner.append(responseHtml);
        };

        return {
            init: function() {
                if(holder.length) {
                    holder.each(function() {
                        var thisHolder = $(this);

                        if(thisHolder.hasClass('eltd-bl-pag-standard-blog-list')) {
                            initStandardPagination(thisHolder);
                        }

                        if(thisHolder.hasClass('eltd-bl-pag-load-more')) {
                            initLoadMorePagination(thisHolder);
                        }

                        if(thisHolder.hasClass('eltd-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            },
            scroll: function() {
                if(holder.length) {
                    holder.each(function() {
                        var thisHolder = $(this);

                        if(thisHolder.hasClass('eltd-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            }
        };
    }

})(jQuery);
(function($) {
    "use strict";

    var blogMasonryGallery = {};
    eltd.modules.blogMasonryGallery = blogMasonryGallery;

    blogMasonryGallery.eltdOnDocumentReady = eltdOnDocumentReady;
    blogMasonryGallery.eltdOnWindowLoad = eltdOnWindowLoad;
    blogMasonryGallery.eltdOnWindowResize = eltdOnWindowResize;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdOnDocumentReady() {
        eltdInitBlogMasonryGallery();
        eltdInitBlogMasonryGalleryAppearLoadMore();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdOnWindowLoad() {
        eltdInitBlogMasonryGalleryAppear();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdOnWindowResize() {
        eltdInitBlogMasonryGallery();
    }

    /**
     *  Init Blog Masonry Gallery
     *
     *  Function that sets equal height of articles on blog masonry gallery list
     */
    function eltdInitBlogMasonryGallery() {
        var blogList = $('.eltd-blog-holder.eltd-blog-masonry-gallery');
        if(blogList.length){
            blogList.each(function(){

                var container = $(this),
                    masonry = container.children('.eltd-blog-holder-inner'),
                    article = masonry.find('article'),
                    size = masonry.find('.eltd-blog-masonry-grid-sizer').width() * 1.25;

                article.css({'height': (size) + 'px'});

                masonry.isotope( 'layout', function(){});
                eltdInitBlogMasonryGalleryAppear();
            });
        }
    }

    /**
     *  Animate blog masonry gallery type
     */
    function eltdInitBlogMasonryGalleryAppear() {
        var blogList = $('.eltd-blog-holder.eltd-blog-masonry-gallery');
        if(blogList.length){
            blogList.each(function(){
                var thisBlogList = $(this),
                    article = thisBlogList.find('article'),
                    pagination = thisBlogList.find('.eltd-blog-pagination-holder'),
                    animateCycle = 7, // rewind delay
                    animateCycleCounter = 0;

                article.each(function(){
                    var thisArticle = $(this);
                    setTimeout(function(){
                        thisArticle.appear(function(){
                            animateCycleCounter ++;
                            if(animateCycleCounter == animateCycle) {
                                animateCycleCounter = 0;
                            }
                            setTimeout(function(){
                                thisArticle.addClass('eltd-appeared');
                            },animateCycleCounter * 200);
                        },{accX: 0, accY: 0});
                    },150);
                });

                pagination.appear(function(){
                    pagination.addClass('eltd-appeared');
                },{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});

            });
        }
    }

    function eltdInitBlogMasonryGalleryAppearLoadMore() {
        $( document.body ).on( 'blog_list_load_more_trigger', function() {
            eltdInitBlogMasonryGalleryAppear();
        });
    }

})(jQuery);
(function($) {
	"use strict";

    var blog = {};
    eltd.modules.blog = blog;

    blog.eltdOnDocumentReady = eltdOnDocumentReady;
    blog.eltdOnWindowLoad = eltdOnWindowLoad;
    blog.eltdOnWindowResize = eltdOnWindowResize;
    blog.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdInitAudioPlayer();
        eltdInitBlogMasonry();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
	    eltdInitBlogPagination().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltdInitBlogMasonry();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {
	    eltdInitBlogPagination().scroll();
    }

    /**
    * Init audio player for Blog list and single pages
    */
    function eltdInitAudioPlayer() {
        var players = $('audio.eltd-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /**
     * Init Resize Blog Items
     */
    function eltdResizeBlogItems(size,container){

        if(container.hasClass('eltd-masonry-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltd-post-size-default'),
                largeWidthMasonryItem = container.find('.eltd-post-size-large-width'),
                largeHeightMasonryItem = container.find('.eltd-post-size-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltd-post-size-large-width-height');

			if (eltd.windowWidth > 680) {
				defaultMasonryItem.css('height', size - 2 * padding);
				largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthMasonryItem.css('height', size - 2 * padding);
			} else {
				defaultMasonryItem.css('height', size);
				largeHeightMasonryItem.css('height', size);
				largeWidthHeightMasonryItem.css('height', size);
				largeWidthMasonryItem.css('height', Math.round(size / 2));
			}
        }
    }

    /**
    * Init Blog Masonry Layout
    */
    function eltdInitBlogMasonry() {
	    var holder = $('.eltd-blog-holder.eltd-blog-type-masonry');
	
	    if(holder.length){
		    holder.each(function(){
			    var thisHolder = $(this),
				    masonry = thisHolder.children('.eltd-blog-holder-inner'),
                    size = thisHolder.find('.eltd-blog-masonry-grid-sizer').width();
			    
                eltdResizeBlogItems(size, thisHolder);
                
			    masonry.waitForImages(function() {
				    masonry.isotope({
					    layoutMode: 'packery',
					    itemSelector: 'article',
					    percentPosition: true,
					    packery: {
						    gutter: '.eltd-blog-masonry-grid-gutter',
						    columnWidth: '.eltd-blog-masonry-grid-sizer'
					    }
				    });
                    masonry.css('opacity', '1');
				
				    setTimeout(function() {
					    masonry.isotope('layout');
				    }, 800);
                });
		    });
	    }
    }
	
	/**
	 * Initializes blog pagination functions
	 */
	function eltdInitBlogPagination(){
		var holder = $('.eltd-blog-holder');
		
		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.eltd-blog-pag-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisHolder);
			});
		};
		
		var initInifiteScrollPagination = function(thisHolder) {
			var blogListHeight = thisHolder.outerHeight(),
				blogListTopOffest = thisHolder.offset().top,
				blogListPosition = blogListHeight + blogListTopOffest - eltdGlobalVars.vars.eltdAddForAdminBar;
			
			if(!thisHolder.hasClass('eltd-blog-pagination-infinite-scroll-started') && eltd.scroll + eltd.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};
		
		var initMainPagFunctionality = function(thisHolder) {
			var thisHolderInner = thisHolder.children('.eltd-blog-holder-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}
			
			if(thisHolder.hasClass('eltd-blog-pagination-infinite-scroll')) {
				thisHolder.addClass('eltd-blog-pagination-infinite-scroll-started');
			}
			
			var loadMoreDatta = eltd.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.eltd-blog-pag-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				loadingItem.addClass('eltd-showing');
				
				var ajaxData = eltd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'albergo_elated_blog_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdGlobalVars.vars.eltdAjaxUrl,
					success: function (data) {
						nextPage++;
						
						thisHolder.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						thisHolder.waitForImages(function(){
							if(thisHolder.hasClass('eltd-blog-type-masonry')){
								eltdInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                eltdResizeBlogItems(thisHolderInner.find('.eltd-blog-masonry-grid-sizer').width(), thisHolder);
							} else {
								eltdInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
							}
							
							setTimeout(function() {
								eltdInitAudioPlayer();
								eltd.modules.common.eltdOwlSlider();
								eltd.modules.common.eltdFluidVideo();
                                eltd.modules.common.eltdInitSelfHostedVideoPlayer();
                                eltd.modules.common.eltdSelfHostedVideoSize();
								
								if (typeof eltd.modules.common.eltdStickySidebarWidget === 'function') {
									eltd.modules.common.eltdStickySidebarWidget().reInit();
								}

                                // Trigger event.
                                $( document.body ).trigger( 'blog_list_load_more_trigger' );

							}, 400);
						});
						
						if(thisHolder.hasClass('eltd-blog-pagination-infinite-scroll-started')) {
							thisHolder.removeClass('eltd-blog-pagination-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisHolder.find('.eltd-blog-pag-load-more').hide();
			}
		};
		
		var eltdInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltd-showing');
			
			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 600);
		};
		
		var eltdInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltd-showing');
			thisHolderInner.append(responseHtml);
		};
		
		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('eltd-blog-pagination-load-more')) {
							initLoadMorePagination(thisHolder);
						}
						
						if(thisHolder.hasClass('eltd-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('eltd-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

})(jQuery);
(function($) {
    "use strict";

    var headerVertical = {};
    eltd.modules.headerVertical = headerVertical;
	
	headerVertical.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdVerticalMenu().init();
    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var eltdVerticalMenu = function() {
	    var verticalMenuObject = $('.eltd-vertical-menu-area');

	    /**
	     * Checks if vertical area is scrollable (if it has eltd-with-scroll class)
	     *
	     * @returns {bool}
	     */
	    var verticalAreaScrollable = function () {
		    return verticalMenuObject.hasClass('eltd-with-scroll');
	    };
	
	    /**
	     * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
	     */
	    var initNavigation = function () {
		    var verticalNavObject = verticalMenuObject.find('.eltd-vertical-menu');
		
		    dropdownClickToggle();
		
		    /**
		     * Initializes click toggle navigation type. Works the same for touch and no-touch devices
		     */
		    function dropdownClickToggle() {
			    var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
			
			    menuItems.each(function () {
				    var elementToExpand = $(this).find(' > .second, > ul');
				    var menuItem = this;
				    var dropdownOpener = $(this).find('> a');
				    var slideUpSpeed = 'fast';
				    var slideDownSpeed = 'slow';
				
				    dropdownOpener.on('click tap', function (e) {
					    e.preventDefault();
					    e.stopPropagation();
					
					    if (elementToExpand.is(':visible')) {
						    $(menuItem).removeClass('open');
						    elementToExpand.slideUp(slideUpSpeed);
					    } else if (dropdownOpener.parent().parent().children().hasClass('open') && dropdownOpener.parent().parent().parent().hasClass('eltd-vertical-menu')) {
						    $(this).parent().parent().children().removeClass('open');
						    $(this).parent().parent().children().find(' > .second').slideUp(slideUpSpeed);
						
						    $(menuItem).addClass('open');
						    elementToExpand.slideDown(slideDownSpeed);
					    } else {
						
						    if (!$(this).parents('li').hasClass('open')) {
							    menuItems.removeClass('open');
							    menuItems.find(' > .second, > ul').slideUp(slideUpSpeed);
						    }
						
						    if ($(this).parent().parent().children().hasClass('open')) {
							    $(this).parent().parent().children().removeClass('open');
							    $(this).parent().parent().children().find(' > .second, > ul').slideUp(slideUpSpeed);
						    }
						
						    $(menuItem).addClass('open');
						    elementToExpand.slideDown(slideDownSpeed);
					    }
				    });
			    });
		    }
	    };

        /**
         * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
         */
        var initVerticalAreaScroll = function() {
            if(verticalAreaScrollable()) {
                verticalMenuObject.perfectScrollbar({
                    wheelSpeed: 0.6,
                    suppressScrollX: true
                });
            }
        };

        var initHiddenVerticalArea = function() {
            var verticalLogo = $('.eltd-vertical-area-bottom-logo');
            var verticalMenuOpener = verticalMenuObject.find('.eltd-vertical-area-opener');
            var scrollPosition = 0;

            verticalMenuOpener.on('click tap', function() {
                if(isVerticalAreaOpen()) {
                    closeVerticalArea();
                } else {
                    openVerticalArea();
                }
            });

            $(window).scroll(function() {
                if(Math.abs($(window).scrollTop() - scrollPosition) > 400){
                    closeVerticalArea();
                }
            });

            /**
             * Closes vertical menu area by removing 'active' class on that element
             */
            function closeVerticalArea() {
                verticalMenuObject.removeClass('active');

                if(verticalLogo.length) {
                    verticalLogo.removeClass('active');
                }
            }

            /**
             * Opens vertical menu area by adding 'active' class on that element
             */
            function openVerticalArea() {
                verticalMenuObject.addClass('active');

                if(verticalLogo.length) {
                    verticalLogo.addClass('active');
                }
                scrollPosition = $(window).scrollTop();
            }

            function isVerticalAreaOpen() {
                return verticalMenuObject.hasClass('active');
            }
        };

        return {
            /**
             * Calls all necessary functionality for vertical menu area if vertical area object is valid
             */
            init: function() {
                if(verticalMenuObject.length) {
                    initNavigation();
                    initVerticalAreaScroll();

                    if(eltd.body.hasClass('eltd-header-vertical-closed')) {
                        initHiddenVerticalArea();
                    }
                }
            }
        };
    };

})(jQuery);
(function ($) {
	"use strict";
	
	var mobileHeader = {};
	eltd.modules.mobileHeader = mobileHeader;
	
	mobileHeader.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
		All functions to be called on $(document).ready() should be in this function
	*/
	function eltdOnDocumentReady() {
		eltdInitMobileNavigation();
		eltdMobileHeaderBehavior();
	}
	
	function eltdInitMobileNavigation() {
        var mobileHeader = $('.eltd-mobile-header'),
		    navigationOpener = $('.eltd-mobile-header .eltd-mobile-menu-opener'),
			navigationHolder = $('.eltd-mobile-header .eltd-mobile-nav'),
			dropdownOpener = $('.eltd-mobile-nav .mobile_arrow, .eltd-mobile-nav h6, .eltd-mobile-nav a.eltd-mobile-no-link'),
            mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;
		
		//whole mobile menu opening / closing
		if (navigationOpener.length && navigationHolder.length) {
			navigationOpener.on('tap click', function (e) {
				e.stopPropagation();
				e.preventDefault();
				
				if (navigationHolder.is(':visible')) {
					navigationHolder.slideUp(450, 'easeInOutQuint');
					navigationOpener.removeClass('eltd-mobile-menu-opened');
				} else {
					navigationHolder.slideDown(450, 'easeInOutQuint');
					navigationOpener.addClass('eltd-mobile-menu-opened');
				}
			});
		}

        //init scrollable menu
        var scrollHeight = navigationHolder.outerHeight() + mobileHeaderHeight > eltd.windowHeight - 100 ?  eltd.windowHeight - mobileHeaderHeight - 100 : navigationHolder.height();
        navigationHolder.height(scrollHeight);
        navigationHolder.perfectScrollbar({
            wheelSpeed: 0.6,
            suppressScrollX: true
        });

        //set height of popup holder on resize
        $(window).resize(function() {
            var scrollHeight = navigationHolder.outerHeight() + mobileHeaderHeight > eltd.windowHeight - 100 ?  eltd.windowHeight - mobileHeaderHeight - 100 : navigationHolder.height();
            navigationHolder.height(scrollHeight);
        });

        //dropdown opening / closing
        if (dropdownOpener.length) {
            dropdownOpener.each(function () {
                var thisItem = $(this);

                thisItem.on('tap click', function (e) {
                    var thisItemParent = thisItem.parent('li'),
                        thisItemParentSiblingsWithDrop = thisItemParent.siblings('.menu-item-has-children');

                    if (thisItemParent.hasClass('has_sub')) {
                        var submenu = thisItemParent.find('> ul.sub_menu');

                        if (submenu.is(':visible')) {
                            submenu.slideUp(450, 'easeInOutQuint');
                            thisItemParent.removeClass('eltd-opened');
                        } else {
                            thisItemParent.addClass('eltd-opened');

                            if (thisItemParentSiblingsWithDrop.length === 0) {
                                thisItemParent.find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                    submenu.slideDown(400, 'easeInOutQuint');
                                });
                            } else {
                                thisItemParent.siblings().removeClass('eltd-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                    submenu.slideDown(400, 'easeInOutQuint');
                                });
                            }
                        }
                    }
                });
            });
        }
		
		$('.eltd-mobile-nav a, .eltd-mobile-logo-wrapper a').on('click tap', function (e) {
			if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
				navigationHolder.slideUp(450, 'easeInOutQuint');
				navigationOpener.removeClass("eltd-mobile-menu-opened");
			}
		});
	}
	
	function eltdMobileHeaderBehavior() {
		var mobileHeader = $('.eltd-mobile-header'),
			mobileMenuOpener = mobileHeader.find('.eltd-mobile-menu-opener'),
			mobileHeaderHeight = mobileHeader.length ? mobileHeader.outerHeight() : 0;
		
		if (eltd.body.hasClass('eltd-content-is-behind-header') && mobileHeaderHeight > 0 && eltd.windowWidth <= 1024) {
			$('.eltd-content').css('marginTop', -mobileHeaderHeight);
		}
		
		if (eltd.body.hasClass('eltd-sticky-up-mobile-header')) {
			var stickyAppearAmount,
				adminBar = $('#wpadminbar');
			
			var docYScroll1 = $(document).scrollTop();
			stickyAppearAmount = mobileHeaderHeight + eltdGlobalVars.vars.eltdAddForAdminBar;
			
			$(window).scroll(function () {
				var docYScroll2 = $(document).scrollTop();
				
				if (docYScroll2 > stickyAppearAmount) {
					mobileHeader.addClass('eltd-animate-mobile-header');
				} else {
					mobileHeader.removeClass('eltd-animate-mobile-header');
				}
				
				if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount && !mobileMenuOpener.hasClass('eltd-mobile-menu-opened')) || (docYScroll2 < stickyAppearAmount)) {
					mobileHeader.removeClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', 0);
					
					if (adminBar.length) {
						mobileHeader.find('.eltd-mobile-header-inner').css('top', 0);
					}
				} else {
					mobileHeader.addClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', stickyAppearAmount);
				}
				
				docYScroll1 = $(document).scrollTop();
			});
		}
	}
	
})(jQuery);
(function($) {
    "use strict";

    var stickyHeader = {};
    eltd.modules.stickyHeader = stickyHeader;
	
	stickyHeader.isStickyVisible = false;
	stickyHeader.stickyAppearAmount = 0;
	stickyHeader.behaviour = '';
	
	stickyHeader.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    if(eltd.windowWidth > 1024) {
		    eltdHeaderBehaviour();
	    }
    }

    /*
     **	Show/Hide sticky header on window scroll
     */
    function eltdHeaderBehaviour() {
        var header = $('.eltd-page-header'),
	        stickyHeader = $('.eltd-sticky-header'),
            fixedHeaderWrapper = $('.eltd-fixed-wrapper'),
	        fixedMenuArea = fixedHeaderWrapper.children('.eltd-menu-area'),
	        fixedMenuAreaHeight = fixedMenuArea.outerHeight(),
            sliderHolder = $('.eltd-slider'),
            revSliderHeight = sliderHolder.length ? sliderHolder.outerHeight() : 0,
	        stickyAppearAmount,
	        headerAppear;
        
        var headerMenuAreaOffset = fixedHeaderWrapper.length ? fixedHeaderWrapper.offset().top - eltdGlobalVars.vars.eltdAddForAdminBar : 0;

        switch(true) {
            // sticky header that will be shown when user scrolls up
            case eltd.body.hasClass('eltd-sticky-header-on-scroll-up'):
                eltd.modules.stickyHeader.behaviour = 'eltd-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = parseInt(eltdGlobalVars.vars.eltdTopBarHeight) + parseInt(eltdGlobalVars.vars.eltdLogoAreaHeight) + parseInt(eltdGlobalVars.vars.eltdMenuAreaHeight) + parseInt(eltdGlobalVars.vars.eltdStickyHeaderHeight);
	            
                headerAppear = function(){
                    var docYScroll2 = $(document).scrollTop();
					
                    if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        eltd.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.eltd-main-menu .second').removeClass('eltd-drop-down-start');
                        eltd.body.removeClass('eltd-sticky-header-appear');
                    } else {
                        eltd.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
	                    eltd.body.addClass('eltd-sticky-header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case eltd.body.hasClass('eltd-sticky-header-on-scroll-down-up'):
                eltd.modules.stickyHeader.behaviour = 'eltd-sticky-header-on-scroll-down-up';

                if(eltdPerPageVars.vars.eltdStickyScrollAmount !== 0){
                    eltd.modules.stickyHeader.stickyAppearAmount = parseInt(eltdPerPageVars.vars.eltdStickyScrollAmount);
                } else {
                    eltd.modules.stickyHeader.stickyAppearAmount = parseInt(eltdGlobalVars.vars.eltdTopBarHeight) + parseInt(eltdGlobalVars.vars.eltdLogoAreaHeight) + parseInt(eltdGlobalVars.vars.eltdMenuAreaHeight) + parseInt(revSliderHeight);
                }

                headerAppear = function(){
                    if(eltd.scroll < eltd.modules.stickyHeader.stickyAppearAmount) {
                        eltd.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.eltd-main-menu .second').removeClass('eltd-drop-down-start');
	                    eltd.body.removeClass('eltd-sticky-header-appear');
                    }else{
                        eltd.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
	                    eltd.body.addClass('eltd-sticky-header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // on scroll down, part of header will be sticky
            case eltd.body.hasClass('eltd-fixed-on-scroll'):
                eltd.modules.stickyHeader.behaviour = 'eltd-fixed-on-scroll';
                var headerFixed = function(){
	
	                if(eltd.scroll <= headerMenuAreaOffset) {
		                fixedHeaderWrapper.removeClass('fixed');
		                eltd.body.removeClass('eltd-fixed-header-appear');
		                fixedMenuArea.css({'height': fixedMenuAreaHeight + 'px'});
		                header.css('margin-bottom', '0');
	                } else {
		                fixedHeaderWrapper.addClass('fixed');
		                eltd.body.addClass('eltd-fixed-header-appear');
		                fixedMenuArea.css({'height': (fixedMenuAreaHeight - 30) + 'px'});
		                header.css('margin-bottom', (fixedMenuAreaHeight - 30) + 'px');
	                }
                };

                headerFixed();

                $(window).scroll(function() {
                    headerFixed();
                });

                break;
        }
    }

})(jQuery);
(function($) {
	"use strict";
	
	var header = {};
	eltd.modules.header = header;
	
	header.eltdSetDropDownMenuPosition     = eltdSetDropDownMenuPosition;
	header.eltdSetDropDownWideMenuPosition = eltdSetDropDownWideMenuPosition;
	
	header.eltdOnDocumentReady = eltdOnDocumentReady;
	header.eltdOnWindowLoad = eltdOnWindowLoad;
	
	$(document).ready(eltdOnDocumentReady);
	$(window).load(eltdOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdSetDropDownMenuPosition();
		eltdDropDownMenu();
	}
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdOnWindowLoad() {
		eltdSetDropDownWideMenuPosition();
	}
	
	/**
	 * Set dropdown position
	 */
	function eltdSetDropDownMenuPosition() {
		var menuItems = $('.eltd-drop-down > ul > li.narrow.menu-item-has-children');
		
		if (menuItems.length) {
			menuItems.each(function (i) {
				var thisItem = $(this),
					menuItemPosition = thisItem.offset().left,
					dropdownHolder = thisItem.find('.second'),
					dropdownMenuItem = dropdownHolder.find('.inner ul'),
					dropdownMenuWidth = dropdownMenuItem.outerWidth(),
					menuItemFromLeft = eltd.windowWidth - menuItemPosition;
				
				if (eltd.body.hasClass('eltd-boxed')) {
					menuItemFromLeft = eltd.boxedLayoutWidth - (menuItemPosition - (eltd.windowWidth - eltd.boxedLayoutWidth ) / 2);
				}
				
				var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true
				
				if (thisItem.find('li.sub').length > 0) {
					dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
				}
				
				dropdownHolder.removeClass('right');
				dropdownMenuItem.removeClass('right');
				if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
					dropdownHolder.addClass('right');
					dropdownMenuItem.addClass('right');
				}
			});
		}
	}
	
	/**
	 * Set dropdown wide position
	 */
	function eltdSetDropDownWideMenuPosition(){
		var menuItems = $(".eltd-drop-down > ul > li.wide");
		
		if(menuItems.length) {
			menuItems.each( function(i) {
				var menuItemSubMenu = $(menuItems[i]).find('.second');
				
				if(menuItemSubMenu.length && !menuItemSubMenu.hasClass('left_position') && !menuItemSubMenu.hasClass('right_position')) {
					menuItemSubMenu.css('left', 0);
					
					var left_position = menuItemSubMenu.offset().left;
					
					if(eltd.body.hasClass('eltd-boxed')) {
						var boxedWidth = $('.eltd-boxed .eltd-wrapper .eltd-wrapper-inner').outerWidth();
						left_position = left_position - (eltd.windowWidth - boxedWidth) / 2;
						
						menuItemSubMenu.css('left', -left_position);
						menuItemSubMenu.css('width', boxedWidth);
					} else {
						menuItemSubMenu.css('left', -left_position);
						menuItemSubMenu.css('width', eltd.windowWidth);
					}
				}
			});
		}
	}
	
	function eltdDropDownMenu() {
		var menu_items = $('.eltd-drop-down > ul > li');
		
		menu_items.each(function(i) {
			if($(menu_items[i]).find('.second').length > 0) {
				var thisItem = $(menu_items[i]),
					dropDownSecondDiv = thisItem.find('.second');
				
				if(thisItem.hasClass('wide')) {
					//set columns to be same height - start
					var tallest = 0,
						dropDownSecondItem = $(this).find('.second > .inner > ul > li');
					
					dropDownSecondItem.each(function() {
						var thisHeight = $(this).height();
						if(thisHeight > tallest) {
							tallest = thisHeight;
						}
					});
					
					dropDownSecondItem.css('height', ''); // delete old inline css - via resize
					dropDownSecondItem.height(tallest);
					//set columns to be same height - end
				}
				
				if(!eltd.menuDropdownHeightSet) {
					thisItem.data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}
				
				if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					thisItem.on("touchstart mouseenter", function() {
						dropDownSecondDiv.css({
							'height': thisItem.data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function() {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});
				} else {
					if(eltd.body.hasClass('eltd-dropdown-animate-height')) {
						thisItem.mouseenter(function() {
							dropDownSecondDiv.css({
								'visibility': 'visible',
								'height': '0px',
								'opacity': '0'
							});
							dropDownSecondDiv.stop().animate({
								'height': thisItem.data('original_height'),
								opacity: 1
							}, 300, function() {
								dropDownSecondDiv.css('overflow', 'visible');
							});
						}).mouseleave(function() {
							dropDownSecondDiv.stop().animate({
								'height': '0px'
							}, 150, function() {
								dropDownSecondDiv.css({
									'overflow': 'hidden',
									'visibility': 'hidden'
								});
							});
						});
					} else {
						var config = {
							interval: 0,
							over: function() {
								setTimeout(function() {
									dropDownSecondDiv.addClass('eltd-drop-down-start');
									dropDownSecondDiv.stop().css({'height': thisItem.data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function() {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('eltd-drop-down-start');
							}
						};
						thisItem.hoverIntent(config);
					}
				}
			}
		});
		
		$('.eltd-drop-down ul li.wide ul li a').on('click', function(e) {
			if (e.which == 1){
				var $this = $(this);
				setTimeout(function() {
					$this.mouseleave();
				}, 500);
			}
		});
		
		eltd.menuDropdownHeightSet = true;
	}
	
})(jQuery);
(function($) {
    "use strict";

    var sidearea = {};
    eltd.modules.sidearea = sidearea;

    sidearea.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSideArea();
	    eltdSideAreaScroll();
    }
	
	/**
	 * Show/hide side area
	 */
	function eltdSideArea() {
		var wrapper = $('.eltd-wrapper'),
			sideMenuButtonOpen = $('a.eltd-side-menu-button-opener'),
			cssClass = 'eltd-right-side-menu-opened';
		
		wrapper.prepend('<div class="eltd-cover"/>');
		
		$('a.eltd-side-menu-button-opener, a.eltd-close-side-menu').click( function(e) {
			e.preventDefault();
			
			if(!sideMenuButtonOpen.hasClass('opened')) {
				sideMenuButtonOpen.addClass('opened');
				eltd.body.addClass(cssClass);
				
				$('.eltd-wrapper .eltd-cover').click(function() {
					eltd.body.removeClass('eltd-right-side-menu-opened');
					sideMenuButtonOpen.removeClass('opened');
				});
				
				var currentScroll = $(window).scrollTop();
				$(window).scroll(function() {
					if(Math.abs(eltd.scroll - currentScroll) > 400){
						eltd.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
					}
				});
			} else {
				sideMenuButtonOpen.removeClass('opened');
				eltd.body.removeClass(cssClass);
			}
		});
	}
	
	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function eltdSideAreaScroll(){
		var sideMenu = $('.eltd-side-menu');
		
		if(sideMenu.length){
            sideMenu.perfectScrollbar({
                wheelSpeed: 0.6,
                suppressScrollX: true
            });
		}
	}

})(jQuery);

(function($) {
    "use strict";

    var searchCoversHeader = {};
    eltd.modules.searchCoversHeader = searchCoversHeader;

    searchCoversHeader.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSearchCoversHeader();
    }
	
	/**
	 * Init Search Types
	 */
	function eltdSearchCoversHeader() {
        if ( eltd.body.hasClass( 'eltd-search-covers-header' ) ) {

            var searchOpener = $('a.eltd-search-opener');

            if (searchOpener.length > 0) {
                searchOpener.click(function (e) {
                    e.preventDefault();

                    var thisSearchOpener = $(this),
                        searchFormHeight,
                        searchFormHeaderHolder = $('.eltd-page-header'),
                        searchFormTopHeaderHolder = $('.eltd-top-bar'),
                        searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltd-fixed-wrapper.fixed'),
                        searchFormMobileHeaderHolder = $('.eltd-mobile-header'),
                        searchForm = $('.eltd-search-cover'),
                        searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltd-top-bar').length,
                        searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltd-fixed-wrapper.fixed').length,
                        searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltd-sticky-header').length,
                        searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltd-mobile-header').length;

                    searchForm.removeClass('eltd-is-active');

                    //Find search form position in header and height
                    if (searchFormIsInTopHeader) {
                        searchFormHeight = eltdGlobalVars.vars.eltdTopBarHeight;
                        searchFormTopHeaderHolder.find('.eltd-search-cover').addClass('eltd-is-active');

                    } else if (searchFormIsInFixedHeader) {
                        searchFormHeight = searchFormFixedHeaderHolder.outerHeight();
                        searchFormHeaderHolder.children('.eltd-search-cover').addClass('eltd-is-active');

                    } else if (searchFormIsInStickyHeader) {
                        searchFormHeight = eltdGlobalVars.vars.eltdStickyHeaderHeight;
                        searchFormHeaderHolder.children('.eltd-search-cover').addClass('eltd-is-active');

                    } else if (searchFormIsInMobileHeader) {
                        if (searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
                            searchFormHeight = searchFormMobileHeaderHolder.children('.eltd-mobile-header-inner').outerHeight();
                        } else {
                            searchFormHeight = searchFormMobileHeaderHolder.outerHeight();
                        }

                        searchFormMobileHeaderHolder.find('.eltd-search-cover').addClass('eltd-is-active');

                    } else {
                        searchFormHeight = searchFormHeaderHolder.outerHeight();
                        searchFormHeaderHolder.children('.eltd-search-cover').addClass('eltd-is-active');
                    }

                    if (searchForm.hasClass('eltd-is-active')) {
                        searchForm.height(searchFormHeight).stop(true).fadeIn(600).find('input[type="text"]').focus();
                    }

                    searchForm.find('.eltd-search-close').click(function (e) {
                        e.preventDefault();
                        searchForm.stop(true).fadeOut(450);
                    });

                    searchForm.blur(function () {
                        searchForm.stop(true).fadeOut(450);
                    });

                    $(window).scroll(function () {
                        searchForm.stop(true).fadeOut(450);
                    });
                });
            }
        }
	}

})(jQuery);

(function($) {
    "use strict";

    var searchFullscreen = {};
    eltd.modules.searchFullscreen = searchFullscreen;

    searchFullscreen.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSearchFullscreen();
    }
	
	/**
	 * Init Search Types
	 */
	function eltdSearchFullscreen() {
        if ( eltd.body.hasClass( 'eltd-fullscreen-search' ) ) {

            var searchOpener = $('a.eltd-search-opener');

            if (searchOpener.length > 0) {

                var searchHolder = $('.eltd-fullscreen-search-holder'),
                    searchClose = $('.eltd-fullscreen-search-close');

                searchOpener.click(function (e) {
                    e.preventDefault();

                    if (searchHolder.hasClass('eltd-animate')) {
                        eltd.body.removeClass('eltd-fullscreen-search-opened eltd-search-fade-out');
                        eltd.body.removeClass('eltd-search-fade-in');
                        searchHolder.removeClass('eltd-animate');

                        setTimeout(function () {
                            searchHolder.find('.eltd-search-field').val('');
                            searchHolder.find('.eltd-search-field').blur();
                        }, 300);

                        eltd.modules.common.eltdEnableScroll();
                    } else {
                        eltd.body.addClass('eltd-fullscreen-search-opened eltd-search-fade-in');
                        eltd.body.removeClass('eltd-search-fade-out');
                        searchHolder.addClass('eltd-animate');

                        setTimeout(function () {
                            searchHolder.find('.eltd-search-field').focus();
                        }, 900);

                        eltd.modules.common.eltdDisableScroll();
                    }

                    searchClose.click(function (e) {
                        e.preventDefault();
                        eltd.body.removeClass('eltd-fullscreen-search-opened eltd-search-fade-in');
                        eltd.body.addClass('eltd-search-fade-out');
                        searchHolder.removeClass('eltd-animate');

                        setTimeout(function () {
                            searchHolder.find('.eltd-search-field').val('');
                            searchHolder.find('.eltd-search-field').blur();
                        }, 300);

                        eltd.modules.common.eltdEnableScroll();
                    });

                    //Close on click away
                    $(document).mouseup(function (e) {
                        var container = $(".eltd-form-holder-inner");

                        if (!container.is(e.target) && container.has(e.target).length === 0) {
                            e.preventDefault();
                            eltd.body.removeClass('eltd-fullscreen-search-opened eltd-search-fade-in');
                            eltd.body.addClass('eltd-search-fade-out');
                            searchHolder.removeClass('eltd-animate');

                            setTimeout(function () {
                                searchHolder.find('.eltd-search-field').val('');
                                searchHolder.find('.eltd-search-field').blur();
                            }, 300);

                            eltd.modules.common.eltdEnableScroll();
                        }
                    });

                    //Close on escape
                    $(document).keyup(function (e) {
                        if (e.keyCode == 27) { //KeyCode for ESC button is 27
                            eltd.body.removeClass('eltd-fullscreen-search-opened eltd-search-fade-in');
                            eltd.body.addClass('eltd-search-fade-out');
                            searchHolder.removeClass('eltd-animate');

                            setTimeout(function () {
                                searchHolder.find('.eltd-search-field').val('');
                                searchHolder.find('.eltd-search-field').blur();
                            }, 300);

                            eltd.modules.common.eltdEnableScroll();
                        }
                    });
                });

                //Text input focus change
                var inputSearchField = $('.eltd-fullscreen-search-holder .eltd-search-field'),
                    inputSearchLine = $('.eltd-fullscreen-search-holder .eltd-field-holder .eltd-line');

                inputSearchField.focus(function () {
                    inputSearchLine.css('width', '100%');
                });

                inputSearchField.blur(function () {
                    inputSearchLine.css('width', '0');
                });
            }
        }
	}

})(jQuery);

(function($) {
    "use strict";

    var searchSlideFromHB = {};
    eltd.modules.searchSlideFromHB = searchSlideFromHB;

    searchSlideFromHB.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSearchSlideFromHB();
    }
	
	/**
	 * Init Search Types
	 */
	function eltdSearchSlideFromHB() {
        if ( eltd.body.hasClass( 'eltd-slide-from-header-bottom' ) ) {

            var searchOpener = $('a.eltd-search-opener');

            if (searchOpener.length > 0) {
                //Check for type of search
                searchOpener.click(function (e) {
                    e.preventDefault();

                    var thisSearchOpener = $(this),
                        searchIconPosition = parseInt(eltd.windowWidth - thisSearchOpener.offset().left - thisSearchOpener.outerWidth());

                    if (eltd.body.hasClass('eltd-boxed') && eltd.windowWidth > 1024) {
                        searchIconPosition -= parseInt((eltd.windowWidth - $('.eltd-boxed .eltd-wrapper .eltd-wrapper-inner').outerWidth()) / 2);
                    }

                    var searchFormHeaderHolder = $('.eltd-page-header'),
                        searchFormTopOffset = '100%',
                        searchFormTopHeaderHolder = $('.eltd-top-bar'),
                        searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltd-fixed-wrapper.fixed'),
                        searchFormMobileHeaderHolder = $('.eltd-mobile-header'),
                        searchForm = $('.eltd-slide-from-header-bottom-holder'),
                        searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltd-top-bar').length,
                        searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltd-fixed-wrapper.fixed').length,
                        searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltd-sticky-header').length,
                        searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltd-mobile-header').length;

                    searchForm.removeClass('eltd-is-active');

                    //Find search form position in header and height
                    if (searchFormIsInTopHeader) {
                        searchFormTopHeaderHolder.find('.eltd-slide-from-header-bottom-holder').addClass('eltd-is-active');

                    } else if (searchFormIsInFixedHeader) {
                        searchFormTopOffset = searchFormFixedHeaderHolder.outerHeight() + eltdGlobalVars.vars.eltdAddForAdminBar;
                        searchFormHeaderHolder.children('.eltd-slide-from-header-bottom-holder').addClass('eltd-is-active');

                    } else if (searchFormIsInStickyHeader) {
                        searchFormTopOffset = eltdGlobalVars.vars.eltdStickyHeaderHeight + eltdGlobalVars.vars.eltdAddForAdminBar;
                        searchFormHeaderHolder.children('.eltd-slide-from-header-bottom-holder').addClass('eltd-is-active');

                    } else if (searchFormIsInMobileHeader) {
                        if (searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
                            searchFormTopOffset = searchFormMobileHeaderHolder.children('.eltd-mobile-header-inner').outerHeight() + eltdGlobalVars.vars.eltdAddForAdminBar;
                        }
                        searchFormMobileHeaderHolder.find('.eltd-slide-from-header-bottom-holder').addClass('eltd-is-active');

                    } else {
                        searchFormHeaderHolder.children('.eltd-slide-from-header-bottom-holder').addClass('eltd-is-active');
                    }

                    if (searchForm.hasClass('eltd-is-active')) {
                        searchForm.css({
                            'right': searchIconPosition,
                            'top': searchFormTopOffset
                        }).stop(true).slideToggle(300, 'easeOutBack');
                    }

                    //Close on escape
                    $(document).keyup(function (e) {
                        if (e.keyCode == 27) { //KeyCode for ESC button is 27
                            searchForm.stop(true).fadeOut(0);
                        }
                    });

                    $(window).scroll(function () {
                        searchForm.stop(true).fadeOut(0);
                    });
                });
            }
        }
	}

})(jQuery);

(function($) {
    "use strict";

    var searchSlideFromWT = {};
    eltd.modules.searchSlideFromWT = searchSlideFromWT;

    searchSlideFromWT.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSearchSlideFromWT();
    }
	
	/**
	 * Init Search Types
	 */
	function eltdSearchSlideFromWT() {
        if ( eltd.body.hasClass( 'eltd-search-slides-from-window-top' ) ) {

            var searchOpener = $('a.eltd-search-opener');

            if ( searchOpener.length > 0 ) {

                var searchForm = $('.eltd-search-slide-window-top'),
                    searchClose = $('.eltd-swt-search-close');

                searchOpener.click( function(e) {
                    e.preventDefault();

                    if ( searchForm.height() == "0") {
                        $('.eltd-search-slide-window-top input[type="text"]').focus();
                        //Push header bottom
                        eltd.body.addClass('eltd-search-open');
                    } else {
                        eltd.body.removeClass('eltd-search-open');
                    }

                    $(window).scroll(function() {
                        if ( searchForm.height() != '0' && eltd.scroll > 50 ) {
                            eltd.body.removeClass('eltd-search-open');
                        }
                    });

                    searchClose.click(function(e){
                        e.preventDefault();
                        eltd.body.removeClass('eltd-search-open');
                    });
                });
            }
		}
	}

})(jQuery);

(function($) {
    "use strict";

    var title = {};
    eltd.modules.title = title;

    title.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdParallaxTitle();
    }

    /*
     **	Title image with parallax effect
     */
	function eltdParallaxTitle() {
		var parallaxBackground = $('.eltd-title-holder.eltd-bg-parallax');
		
		if (parallaxBackground.length > 0 && eltd.windowWidth > 1024) {
			var parallaxBackgroundWithZoomOut = parallaxBackground.hasClass('eltd-bg-parallax-zoom-out'),
				titleHeight = parseInt(parallaxBackground.data('height')),
				imageWidth = parseInt(parallaxBackground.data('background-width')),
				parallaxRate = titleHeight / 10000 * 7,
				parallaxYPos = -(eltd.scroll * parallaxRate),
				adminBarHeight = eltdGlobalVars.vars.eltdAddForAdminBar;
			
			parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
			
			if (parallaxBackgroundWithZoomOut) {
				parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - eltd.scroll + 'px auto'});
			}
			
			//set position of background on window scroll
			$(window).scroll(function () {
				parallaxYPos = -(eltd.scroll * parallaxRate);
				parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
				
				if (parallaxBackgroundWithZoomOut) {
					parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - eltd.scroll + 'px auto'});
				}
			});
		}
	}

})(jQuery);

(function($) {
    'use strict';

    var woocommerce = {};
    eltd.modules.woocommerce = woocommerce;

    woocommerce.eltdOnDocumentReady = eltdOnDocumentReady;
    woocommerce.eltdOnWindowLoad = eltdOnWindowLoad;
    woocommerce.eltdOnWindowResize = eltdOnWindowResize;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
        eltdInitQuantityButtons();
        eltdInitSelect2();
	    eltdInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
        eltdInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
        eltdInitProductListMasonryShortcode();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function eltdInitQuantityButtons() {
		$(document).on('click', '.eltd-quantity-minus, .eltd-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.eltd-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('eltd-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function eltdInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.eltd-woocommerce-page .eltd-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function eltdInitSingleProductLightbox() {
		var item = $('.eltd-woo-single-page.eltd-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof eltd.modules.common.eltdPrettyPhoto === "function") {
				eltd.modules.common.eltdPrettyPhoto();
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function eltdInitProductListMasonryShortcode() {
		var container = $('.eltd-pl-holder.eltd-masonry-layout .eltd-pl-outer');
		
		if (container.length) {
			container.each(function () {
				var thisContainer = $(this);
				
				thisContainer.waitForImages(function () {
					thisContainer.isotope({
						itemSelector: '.eltd-pli',
						resizable: false,
						masonry: {
							columnWidth: '.eltd-pl-sizer',
							gutter: '.eltd-pl-gutter'
						}
					});
					
					setTimeout(function () {
						if (typeof eltd.modules.common.eltdInitParallax === "function") {
							eltd.modules.common.eltdInitParallax();
						}
					}, 1000);
					
					thisContainer.isotope('layout').css('opacity', 1);
				});
			});
		}
	}

})(jQuery);
(function($) {
    'use strict';
	
	var accordions = {};
	eltd.modules.accordions = accordions;
	
	accordions.eltdInitAccordions = eltdInitAccordions;
	
	
	accordions.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitAccordions();
	}
	
	/**
	 * Init accordions shortcode
	 */
	function eltdInitAccordions(){
		var accordion = $('.eltd-accordion-holder');
		
		if(accordion.length){
			accordion.each(function(){
				var thisAccordion = $(this);

				if(thisAccordion.hasClass('eltd-accordion')){
					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('eltd-toggle')){
					var toggleAccordion = $(this),
						toggleAccordionTitle = toggleAccordion.find('.eltd-accordion-title'),
						toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						
						thisTitle.hover(function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';
	
	var animationHolder = {};
	eltd.modules.animationHolder = animationHolder;
	
	animationHolder.eltdInitAnimationHolder = eltdInitAnimationHolder;
	
	
	animationHolder.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitAnimationHolder();
	}
	
	/*
	 *	Init animation holder shortcode
	 */
	function eltdInitAnimationHolder(){
		var elements = $('.eltd-grow-in, .eltd-fade-in-down, .eltd-element-from-fade, .eltd-element-from-left, .eltd-element-from-right, .eltd-element-from-top, .eltd-element-from-bottom, .eltd-flip-in, .eltd-x-rotate, .eltd-z-rotate, .eltd-y-translate, .eltd-fade-in, .eltd-fade-in-left-x-rotate, .eltd-clip-from-left'),
			animationClass,
			animationData,
			animationDelay;
		
		if(elements.length){
			elements.each(function(){
				var thisElement = $(this);
				
				thisElement.appear(function() {
					animationData = thisElement.data('animation');
					animationDelay = parseInt(thisElement.data('animation-delay'));
					
					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						var newClass = animationClass+'-on';
						
						setTimeout(function(){
							thisElement.addClass(newClass);
						},animationDelay);
					}
				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var button = {};
	eltd.modules.button = button;
	
	button.eltdButton = eltdButton;
	
	
	button.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdButton().init();
	}
	
	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var eltdButton = function() {
		//all buttons on the page
		var buttons = $('.eltd-btn');
		
		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};
				
				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');
				
				button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
				button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
			}
		};
		
		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
					event.data.button.find('.eltd-btn-hover-overlay').css('background-color', event.data.color);
				};
				
				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');
				
				button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
				button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
			}
		};
		
		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};
				
				var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');
				
				button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
				button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
			}
		};
		
		return {
			init: function() {
				if(buttons.length) {
					buttons.each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
	'use strict';
	
	var countdown = {};
	eltd.modules.countdown = countdown;
	
	countdown.eltdInitCountdown = eltdInitCountdown;
	
	
	countdown.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitCountdown();
	}
	
	/**
	 * Countdown Shortcode
	 */
	function eltdInitCountdown() {
		var countdowns = $('.eltd-countdown'),
			date = new Date(),
			currentMonth = date.getMonth(),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;
		
		if (countdowns.length) {
			countdowns.each(function(){
				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#'+countdownId),
					digitFontSize,
					labelFontSize;
				
				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');

				if( currentMonth != month ) {
					month = month - 1;
				}
				
				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month, day, hour, minute, 44),
					labels: ['', monthLabel, '', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});
				
				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size' : digitFontSize+'px',
						'line-height' : digitFontSize+'px'
					});
					countdown.find('.countdown-period').css({
						'font-size' : labelFontSize+'px'
					});
				}
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var counter = {};
	eltd.modules.counter = counter;
	
	counter.eltdInitCounter = eltdInitCounter;
	
	
	counter.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitCounter();
	}
	
	/**
	 * Counter Shortcode
	 */
	function eltdInitCounter() {
		var counterHolder = $('.eltd-counter-holder');
		
		if (counterHolder.length) {
			counterHolder.each(function() {
				var thisCounterHolder = $(this),
					thisCounter = thisCounterHolder.find('.eltd-counter');
				
				thisCounterHolder.appear(function() {
					thisCounterHolder.css('opacity', '1');
					
					//Counter zero type
					if (thisCounter.hasClass('eltd-zero-counter')) {
						var max = parseFloat(thisCounter.text());
						thisCounter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						thisCounter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}
				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function ($) {
	'use strict';
	
	var customFont = {};
	eltd.modules.customFont = customFont;
	
	customFont.eltdCustomFontResize = eltdCustomFontResize;
	customFont.eltdCustomFontTypeOut = eltdCustomFontTypeOut;
	
	
	customFont.eltdOnDocumentReady = eltdOnDocumentReady;
	customFont.eltdOnWindowLoad = eltdOnWindowLoad;
	
	$(document).ready(eltdOnDocumentReady);
	$(window).load(eltdOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdCustomFontResize();
	}
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdOnWindowLoad() {
		eltdCustomFontTypeOut();
	}
	
	/*
	 **	Custom Font resizing style
	 */
	function eltdCustomFontResize() {
		var holder = $('.eltd-custom-font-holder');
		
		if (holder.length) {
			holder.each(function () {
				var thisItem = $(this),
					itemClass = '',
					smallLaptopStyle = '',
					ipadLandscapeStyle = '',
					ipadPortraitStyle = '',
					mobileLandscapeStyle = '',
					style = '',
					responsiveStyle = '';
				
				if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
					itemClass = thisItem.data('item-class');
				}
				
				if (typeof thisItem.data('font-size-1280') !== 'undefined' && thisItem.data('font-size-1280') !== false) {
					smallLaptopStyle += 'font-size: ' + thisItem.data('font-size-1280') + ' !important;';
				}
				if (typeof thisItem.data('font-size-1024') !== 'undefined' && thisItem.data('font-size-1024') !== false) {
					ipadLandscapeStyle += 'font-size: ' + thisItem.data('font-size-1024') + ' !important;';
				}
				if (typeof thisItem.data('font-size-768') !== 'undefined' && thisItem.data('font-size-768') !== false) {
					ipadPortraitStyle += 'font-size: ' + thisItem.data('font-size-768') + ' !important;';
				}
				if (typeof thisItem.data('font-size-680') !== 'undefined' && thisItem.data('font-size-680') !== false) {
					mobileLandscapeStyle += 'font-size: ' + thisItem.data('font-size-680') + ' !important;';
				}
				
				if (typeof thisItem.data('line-height-1280') !== 'undefined' && thisItem.data('line-height-1280') !== false) {
					smallLaptopStyle += 'line-height: ' + thisItem.data('line-height-1280') + ' !important;';
				}
				if (typeof thisItem.data('line-height-1024') !== 'undefined' && thisItem.data('line-height-1024') !== false) {
					ipadLandscapeStyle += 'line-height: ' + thisItem.data('line-height-1024') + ' !important;';
				}
				if (typeof thisItem.data('line-height-768') !== 'undefined' && thisItem.data('line-height-768') !== false) {
					ipadPortraitStyle += 'line-height: ' + thisItem.data('line-height-768') + ' !important;';
				}
				if (typeof thisItem.data('line-height-680') !== 'undefined' && thisItem.data('line-height-680') !== false) {
					mobileLandscapeStyle += 'line-height: ' + thisItem.data('line-height-680') + ' !important;';
				}
				
				if (smallLaptopStyle.length || ipadLandscapeStyle.length || ipadPortraitStyle.length || mobileLandscapeStyle.length) {
					
					if (smallLaptopStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 1280px) {.eltd-custom-font-holder." + itemClass + " { " + smallLaptopStyle + " } }";
					}
					if (ipadLandscapeStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 1024px) {.eltd-custom-font-holder." + itemClass + " { " + ipadLandscapeStyle + " } }";
					}
					if (ipadPortraitStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 768px) {.eltd-custom-font-holder." + itemClass + " { " + ipadPortraitStyle + " } }";
					}
					if (mobileLandscapeStyle.length) {
						responsiveStyle += "@media only screen and (max-width: 680px) {.eltd-custom-font-holder." + itemClass + " { " + mobileLandscapeStyle + " } }";
					}
				}
				
				if (responsiveStyle.length) {
					style = '<style type="text/css">' + responsiveStyle + '</style>';
				}
				
				if (style.length) {
					$('head').append(style);
				}
			});
		}
	}
	
	/*
	 * Init Type out functionality for Custom Font shortcode
	 */
	function eltdCustomFontTypeOut() {
		var eltdTyped = $('.eltd-cf-typed');
		
		if (eltdTyped.length) {
			eltdTyped.each(function () {
				
				//vars
				var thisTyped = $(this),
					typedWrap = thisTyped.parent('.eltd-cf-typed-wrap'),
					customFontHolder = typedWrap.parent('.eltd-custom-font-holder'),
					str = [],
					string_1 = thisTyped.find('.eltd-cf-typed-1').text(),
					string_2 = thisTyped.find('.eltd-cf-typed-2').text(),
					string_3 = thisTyped.find('.eltd-cf-typed-3').text(),
					string_4 = thisTyped.find('.eltd-cf-typed-4').text();
				
				if (string_1.length) {
					str.push(string_1);
				}
				
				if (string_2.length) {
					str.push(string_2);
				}
				
				if (string_3.length) {
					str.push(string_3);
				}
				
				if (string_4.length) {
					str.push(string_4);
				}
				
				customFontHolder.appear(function () {
					thisTyped.typed({
						strings: str,
						typeSpeed: 90,
						backDelay: 700,
						loop: true,
						contentType: 'text',
						loopCount: false,
						cursorChar: '_'
					});
				}, {accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var elementsHolder = {};
	eltd.modules.elementsHolder = elementsHolder;
	
	elementsHolder.eltdInitElementsHolderResponsiveStyle = eltdInitElementsHolderResponsiveStyle;
	
	
	elementsHolder.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitElementsHolderResponsiveStyle();
	}
	
	/*
	 **	Elements Holder responsive style
	 */
	function eltdInitElementsHolderResponsiveStyle(){
		var elementsHolder = $('.eltd-elements-holder');
		
		if(elementsHolder.length){
			elementsHolder.each(function() {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.eltd-eh-item'),
					style = '',
					responsiveStyle = '';
				
				elementsHolderItem.each(function() {
					var thisItem = $(this),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '';
					
					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
						largeLaptop = thisItem.data('1280-1600');
					}
					if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
						smallLaptop = thisItem.data('1024-1280');
					}
					if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
						ipadLandscape = thisItem.data('768-1024');
					}
					if (typeof thisItem.data('680-768') !== 'undefined' && thisItem.data('680-768') !== false) {
						ipadPortrait = thisItem.data('680-768');
					}
					if (typeof thisItem.data('680') !== 'undefined' && thisItem.data('680') !== false) {
						mobileLandscape = thisItem.data('680');
					}
					
					if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {
						
						if(largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1281px) and (max-width: 1600px) {.eltd-eh-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
						}
						if(smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1025px) and (max-width: 1280px) {.eltd-eh-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
						}
						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 769px) and (max-width: 1024px) {.eltd-eh-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
						}
						if(ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 681px) and (max-width: 768px) {.eltd-eh-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
						}
						if(mobileLandscape.length) {
							responsiveStyle += "@media only screen and (max-width: 680px) {.eltd-eh-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
						}
					}
				});
				
				if(responsiveStyle.length) {
					style = '<style type="text/css">'+responsiveStyle+'</style>';
				}
				
				if(style.length) {
					$('head').append(style);
				}
				
				if (typeof eltd.modules.common.eltdOwlSlider === "function") {
					eltd.modules.common.eltdOwlSlider();
				}
			});
		}
	}
	
})(jQuery);
(function($) {
    'use strict';

    var googleMap = {};
    eltd.modules.googleMap = googleMap;

    googleMap.eltdShowGoogleMap = eltdShowGoogleMap;


    googleMap.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdOnDocumentReady() {
        eltdShowGoogleMap();
    }

    /*
     **	Show Google Map
     */
    function eltdShowGoogleMap(){
        var googleMap = $('.eltd-google-map');

        if(googleMap.length){
            googleMap.each(function(){
                var element = $(this);

                var snazzyMapStyle = false;
                var snazzyMapCode  = '';
                if(typeof element.data('snazzy-map-style') !== 'undefined' && element.data('snazzy-map-style') === 'yes') {
                    snazzyMapStyle = true;
                    var snazzyMapHolder = element.parent().find('.eltd-snazzy-map'),
                        snazzyMapCodes  = snazzyMapHolder.val();

                    if( snazzyMapHolder.length && snazzyMapCodes.length ) {
                        snazzyMapCode = JSON.parse( snazzyMapCodes.replace(/`{`/g, '[').replace(/`}`/g, ']').replace(/``/g, '"').replace(/`/g, '') );
                    }
                }

                var customMapStyle;
                if(typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if(typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_"+ uniqueId;
                var geocoder = "geocoder_"+ uniqueId;
                var holderId = "eltd-map-"+ uniqueId;

                eltdInitializeGoogleMap(snazzyMapStyle, snazzyMapCode, customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
            });
        }
    }

    /*
     **	Init Google Map
     */
    function eltdInitializeGoogleMap(snazzyMapStyle, snazzyMapCode, customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){

        if(typeof google !== 'object') {
            return;
        }

        var mapStyles = [];
        if(snazzyMapStyle && snazzyMapCode.length) {
            mapStyles = snazzyMapCode;
        } else {
            mapStyles = [
                {
                    stylers: [
                        {hue: color },
                        {saturation: saturation},
                        {lightness: lightness},
                        {gamma: 1}
                    ]
                }
            ];
        }

        var googleMapStyleId;

        if(snazzyMapStyle || customMapStyle === 'yes'){
            googleMapStyleId = 'eltd-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        wheel = wheel === 'yes';

        var qoogleMapType = new google.maps.StyledMapType(mapStyles, {name: "Qode Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)){
            height = height + 'px';
        }

        var myOptions = {
            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'eltd-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('eltd-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            eltdInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }

    /*
     **	Init Google Map Addresses
     */
    function eltdInitializeGoogleAddress(data, pin, map, geocoder){
        if (data === '') {
            return;
        }

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>'+data+'</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        geocoder.geocode( { 'address': data}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon:  pin,
                    title: data.store_title
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(results[0].geometry.location);
                });
            }
        });
    }

})(jQuery);
(function($) {
	'use strict';
	
	var icon = {};
	eltd.modules.icon = icon;
	
	icon.eltdIcon = eltdIcon;
	
	
	icon.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdIcon().init();
	}
	
	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdIcon = function() {
		var icons = $('.eltd-icon-shortcode');
		
		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function(icon) {
			if(icon.hasClass('eltd-icon-animation')) {
				icon.appear(function() {
					icon.parent('.eltd-icon-animation-holder').addClass('eltd-icon-animation-show');
				}, {accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			}
		};
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var iconElement = icon.find('.eltd-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};
		
		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};
				
				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');
				
				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};
		
		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};
				
				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('borderTopColor');
				
				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
	'use strict';
	
	var iconListItem = {};
	eltd.modules.iconListItem = iconListItem;
	
	iconListItem.eltdInitIconList = eltdInitIconList;
	
	
	iconListItem.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitIconList().init();
	}
	
	/**
	 * Button object that initializes icon list with animation
	 * @type {Function}
	 */
	var eltdInitIconList = function() {
		var iconList = $('.eltd-animate-list');
		
		/**
		 * Initializes icon list animation
		 * @param list current slider
		 */
		var iconListInit = function(list) {
			setTimeout(function(){
				list.appear(function(){
					list.addClass('eltd-appeared');
				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			},30);
		};
		
		return {
			init: function() {
				if(iconList.length) {
					iconList.each(function() {
						iconListInit($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
    'use strict';
	
	var imageGallery = {};
	eltd.modules.imageGallery = imageGallery;
	
	imageGallery.eltdInitImageGalleryMasonry = eltdInitImageGalleryMasonry;
	
	
	imageGallery.eltdOnWindowLoad = eltdOnWindowLoad;
	
	$(window).load(eltdOnWindowLoad);
	
	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function eltdOnWindowLoad() {
		eltdInitImageGalleryMasonry();
	}
	
	/*
	 ** Init Image Gallery shortcode - Masonry layout
	 */
	function eltdInitImageGalleryMasonry(){
		var holder = $('.eltd-image-gallery.eltd-ig-masonry-type');
		
		if(holder.length){
			holder.each(function(){
				var thisHolder = $(this),
					masonry = thisHolder.find('.eltd-ig-masonry');
				
				masonry.waitForImages(function() {
					masonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltd-ig-image',
						percentPosition: true,
						packery: {
							gutter: '.eltd-ig-grid-gutter',
							columnWidth: '.eltd-ig-grid-sizer'
						}
					});
					
					setTimeout(function() {
						masonry.isotope('layout');
						eltd.modules.common.eltdInitParallax();
					}, 800);
					
					masonry.css('opacity', '1');
				});
			});
		}
	}

})(jQuery);
(function($) {
    'use strict';
    
    var imageMarquee = {};
    eltd.modules.imageMarquee = imageMarquee;
    
    imageMarquee.eltdInitimageMarquee = eltdInitimageMarquee;
    
    imageMarquee.eltdOnDocumentReady = eltdOnDocumentReady;
    
    $(document).ready(eltdOnDocumentReady);
    
    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdOnDocumentReady() {
        eltdInitimageMarquee();
    }
    
    /**
     * Init Text Marquee effect
     */
    function eltdInitimageMarquee() {
        var imageMarqueeShortcodes = $('.eltd-image-marquee');

        if (imageMarqueeShortcodes.length) {
            imageMarqueeShortcodes.each(function(){
                var imageMarqueeShortcode = $(this),
                    marqueeElements = imageMarqueeShortcode.find('.eltd-image'),
                    originalItem = marqueeElements.filter('.eltd-original'),
                    auxItem = marqueeElements.filter('.eltd-aux');

                var marqueeEffect = function () {
	                eltdRequestAnimationFrame();
	                
                    var delta = 1, //pixel movement
                        speedCoeff = 0.8, // below 1 to slow down, above 1 to speed up
                        marqueeWidth = originalItem.width();

                    auxItem.css('width', marqueeWidth); //same width as the initial marquee element
                    auxItem.css('left', marqueeWidth); //set to the right of the initial marquee element

                    //movement loop
                    marqueeElements.each(function(i){
                        var marqueeElement = $(this),
                            currentPos = 0;

                        var eltdInfiniteScrollEffect = function() {
                            currentPos -= delta;

                            //move marquee element
                            if (marqueeElement.position().left <= -marqueeWidth) {
                                marqueeElement.css('left', parseInt(marqueeWidth - delta));
                                currentPos = 0;
                            }

                            marqueeElement.css('transform','translate3d('+speedCoeff*currentPos+'px,0,0)');
	
	                        requestNextAnimationFrame(eltdInfiniteScrollEffect);

                            $(window).resize(function(){
                                marqueeWidth = originalItem.width();
                                currentPos = 0;
                                originalItem.css('left',0); // reset
                    			auxItem.css('width', marqueeWidth); //same width as the initial marquee element
                                auxItem.css('left', marqueeWidth); //set to the right of the inital marquee element
                            });
                        }; 
                            
                        eltdInfiniteScrollEffect();
                    });
                };

                imageMarqueeShortcode.waitForImages(function(){
	                marqueeEffect();
	            });
            });
        }
    }
    
    /*
     * Request Animation Frame shim
     */
	function eltdRequestAnimationFrame() {
		window.requestNextAnimationFrame =
			(function () {
				var originalWebkitRequestAnimationFrame = undefined,
					wrapper = undefined,
					callback = undefined,
					geckoVersion = 0,
					userAgent = navigator.userAgent,
					index = 0,
					self = this;
				
				// Workaround for Chrome 10 bug where Chrome
				// does not pass the time to the animation function
				
				if (window.webkitRequestAnimationFrame) {
					// Define the wrapper
					
					wrapper = function (time) {
						if (time === undefined) {
							time = +new Date();
						}
						
						self.callback(time);
					};
					
					// Make the switch
					
					originalWebkitRequestAnimationFrame = window.webkitRequestAnimationFrame;
					
					window.webkitRequestAnimationFrame = function (callback, element) {
						self.callback = callback;
						
						// Browser calls the wrapper and wrapper calls the callback
						
						originalWebkitRequestAnimationFrame(wrapper, element);
					};
				}
				
				// Workaround for Gecko 2.0, which has a bug in
				// mozRequestAnimationFrame() that restricts animations
				// to 30-40 fps.
				
				if (window.mozRequestAnimationFrame) {
					// Check the Gecko version. Gecko is used by browsers
					// other than Firefox. Gecko 2.0 corresponds to
					// Firefox 4.0.
					
					index = userAgent.indexOf('rv:');
					
					if (userAgent.indexOf('Gecko') != -1) {
						geckoVersion = userAgent.substr(index + 3, 3);
						
						if (geckoVersion === '2.0') {
							// Forces the return statement to fall through
							// to the setTimeout() function.
							
							window.mozRequestAnimationFrame = undefined;
						}
					}
				}
				
				return window.requestAnimationFrame   ||
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame    ||
					window.oRequestAnimationFrame      ||
					window.msRequestAnimationFrame     ||
					
					function (callback, element) {
						var start,
							finish;
						
						window.setTimeout( function () {
							start = +new Date();
							callback(start);
							finish = +new Date();
							
							self.timeout = 1000 / 60 - (finish - start);
							
						}, self.timeout);
					};
				}
			)();
	}

})(jQuery);
(function($) {
    'use strict';
	
	var landingList = {};
	eltd.modules.landingList = landingList;
	
	landingList.eltdLandingListAppear = eltdLandingListAppear;
	
	
	landingList.eltdOnWindowLoad = eltdOnWindowLoad;
	
	$(window).load(eltdOnWindowLoad);
	
	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function eltdOnWindowLoad() {
		eltdLandingListAppear();
	}
	
	/*
	 ** Init Image Gallery shortcode - Masonry layout
	 */
	function eltdLandingListAppear(){
		var item = $('.eltd-landing-item');
		
		if(item.length){
			item.each(function(){
				var thisItem = $(this);

				thisItem.appear(function() {

					thisItem.addClass('eltd-appear');

				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';
	
	var pieChart = {};
	eltd.modules.pieChart = pieChart;
	
	pieChart.eltdInitPieChart = eltdInitPieChart;
	
	
	pieChart.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitPieChart();
	}
	
	/**
	 * Init Pie Chart shortcode
	 */
	function eltdInitPieChart() {
		var pieChartHolder = $('.eltd-pie-chart-holder');
		
		if (pieChartHolder.length) {
			pieChartHolder.each(function () {
				var thisPieChartHolder = $(this),
					pieChart = thisPieChartHolder.children('.eltd-pc-percentage'),
					barColor = '#25abd1',
					trackColor = '#f7f7f7',
					lineWidth = 3,
					size = 176;
				
				if(typeof pieChart.data('size') !== 'undefined' && pieChart.data('size') !== '') {
					size = pieChart.data('size');
				}
				
				if(typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}
				
				if(typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}
				
				pieChart.appear(function() {
					initToCounterPieChart(pieChart);
					thisPieChartHolder.css('opacity', '1');
					
					pieChart.easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: lineWidth,
						animate: 1500,
						size: size
					});
				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			});
		}
	}
	
	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart){
		var counter = pieChart.find('.eltd-pc-percent'),
			max = parseFloat(counter.text());
		
		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var process = {};
	eltd.modules.process = process;
	
	process.eltdInitProcess = eltdInitProcess;
	
	
	process.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitProcess();
	}
	
	/**
	 * Inti process shortcode on appear
	 */
	function eltdInitProcess() {
		var holder = $('.eltd-process-holder');
		
		if(holder.length) {
			holder.each(function(){
				var thisHolder = $(this);
				
				thisHolder.appear(function(){
					thisHolder.addClass('eltd-process-appeared');
				},{accX: 0, accY: eltdGlobalVars.vars.eltdElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var progressBar = {};
	eltd.modules.progressBar = progressBar;
	
	progressBar.eltdInitProgressBars = eltdInitProgressBars;
	
	
	progressBar.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitProgressBars();
	}
	
	/*
	 **	Horizontal progress bars shortcode
	 */
	function eltdInitProgressBars(){
		var progressBar = $('.eltd-progress-bar');
		
		if(progressBar.length){
			progressBar.each(function() {
				var thisBar = $(this),
					thisBarContent = thisBar.find('.eltd-pb-content'),
					percentage = thisBarContent.data('percentage');
				
				thisBar.appear(function() {
					eltdInitToCounterProgressBar(thisBar, percentage);
					
					thisBarContent.css('width', '0%');
					thisBarContent.animate({'width': percentage+'%'}, 2000);
				});
			});
		}
	}
	
	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function eltdInitToCounterProgressBar(progressBar, $percentage){
		var percentage = parseFloat($percentage),
			percent = progressBar.find('.eltd-pb-percent');
		
		if(percent.length) {
			percent.each(function() {
				var thisPercent = $(this);
				thisPercent.css('opacity', '1');
				
				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var tabs = {};
	eltd.modules.tabs = tabs;
	
	tabs.eltdInitTabs = eltdInitTabs;
	
	
	tabs.eltdOnDocumentReady = eltdOnDocumentReady;
	
	$(document).ready(eltdOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdOnDocumentReady() {
		eltdInitTabs();
	}
	
	/*
	 **	Init tabs shortcode
	 */
	function eltdInitTabs(){
		var tabs = $('.eltd-tabs');
		
		if(tabs.length){
			tabs.each(function(){
				var thisTabs = $(this);
				
				thisTabs.children('.eltd-tab-container').each(function(index){
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.eltd-tabs-nav li:nth-child('+index+') a'),
						navLink = navItem.attr('href');
					
					link = '#'+link;

					if(link.indexOf(navLink) > -1) {
						navItem.attr('href',link);
					}
				});
				
				thisTabs.tabs();

                $('.eltd-tabs a.eltd-external-link').unbind('click');
			});
		}
	}
	
})(jQuery);
(function($) {
    'use strict';

    var portfolio = {};
    eltd.modules.portfolio = portfolio;

    portfolio.eltdOnDocumentReady = eltdOnDocumentReady;
    portfolio.eltdOnWindowLoad = eltdOnWindowLoad;
    portfolio.eltdOnWindowResize = eltdOnWindowResize;
    portfolio.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdOnDocumentReady() {

    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdOnWindowLoad() {
        eltdInitPortfolioMasonry();
        eltdInitPortfolioFilter();
        initPortfolioSingleMasonry();
        eltdInitPortfolioListAnimation();
	    eltdInitPortfolioPagination().init();
        eltdPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdOnWindowResize() {
        eltdInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdOnWindowScroll() {
	    eltdInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function eltdInitPortfolioListAnimation(){
        var portList = $('.eltd-portfolio-list-holder.eltd-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.eltd-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('eltd-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('eltd-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function eltdInitPortfolioMasonry(){
        var portList = $('.eltd-portfolio-list-holder.eltd-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this),
                    masonry = thisPortList.children('.eltd-pl-inner'),
                    size = thisPortList.find('.eltd-pl-grid-sizer').width();
                
                eltdResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.eltd-pl-grid-gutter',
                        columnWidth: '.eltd-pl-grid-sizer'
                    }
                });
                
                setTimeout(function () {
	                eltd.modules.common.eltdInitParallax();
                }, 600);

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Portfolio Items
     */
    function eltdResizePortfolioItems(size,container){
        if(container.hasClass('eltd-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltd-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.eltd-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.eltd-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltd-pl-masonry-large-width-height');

            if (eltd.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function eltdInitPortfolioFilter(){
        var filterHolder = $('.eltd-portfolio-list-holder .eltd-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.eltd-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.eltd-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('eltd-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.eltd-pl-filter:first').addClass('eltd-pl-current');
	            
	            if(thisPortListHolder.hasClass('eltd-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.eltd-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
	                    portListHasArticles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.eltd-pl-filter').removeClass('eltd-pl-current');
                    thisFilter.addClass('eltd-pl-current');
	
	                if(portListHasLoadMore && !portListHasArticles && filterValue.length) {
		                eltdInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
	                } else {
		                filterValue = filterValue.length === 0 ? '*' : filterValue;
                   
                        thisFilterHolder.parent().children('.eltd-pl-inner').isotope({ filter: filterValue });
	                    eltd.modules.common.eltdInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function eltdInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.eltd-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = eltd.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = eltd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltd_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.eltd-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltd-showing eltd-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdGlobalVars.vars.eltdAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArticles = !!thisPortListInner.children().hasClass(filterClassName);

                        if(portListHasArticles) {
                            setTimeout(function() {
                                eltdResizePortfolioItems(thisPortListInner.find('.eltd-pl-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('eltd-showing eltd-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
                                    eltdInitPortfolioListAnimation();
	                                eltd.modules.common.eltdInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('eltd-showing eltd-filter-trigger');
                            eltdInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function eltdInitPortfolioPagination(){
		var portList = $('.eltd-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.eltd-pl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.eltd-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - eltdGlobalVars.vars.eltdAddForAdminBar;
			
			if(!thisPortList.hasClass('eltd-pl-infinite-scroll-started') && eltd.scroll + eltd.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.eltd-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('eltd-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('eltd-pl-pag-infinite-scroll')) {
				thisPortList.addClass('eltd-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = eltd.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.eltd-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages || maxNumPages == 0){
				if(thisPortList.hasClass('eltd-pl-pag-standard')) {
					loadingItem.addClass('eltd-showing eltd-standard-pag-trigger');
					thisPortList.addClass('eltd-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('eltd-showing');
				}
				
				var ajaxData = eltd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltd_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdGlobalVars.vars.eltdAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('eltd-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('eltd-pl-pag-standard')) {
							eltdInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);
							
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltd-pl-masonry')){
									eltdInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltd-pl-gallery') && thisPortList.hasClass('eltd-pl-has-filter')) {
									eltdInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltd-pl-masonry')){
								    if(pagedLink == 1) {
                                        eltdInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    } else {
                                        eltdInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    }
								} else if (thisPortList.hasClass('eltd-pl-gallery') && thisPortList.hasClass('eltd-pl-has-filter') && pagedLink != 1) {
									eltdInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisPortList.hasClass('eltd-pl-infinite-scroll-started')) {
							thisPortList.removeClass('eltd-pl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisPortList.find('.eltd-pl-load-more-holder').hide();
			}
		};
		
		var eltdInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.eltd-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltd-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltd-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltd-pl-pag-next a');
			
			standardPagNumericItem.removeClass('eltd-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltd-pl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var eltdInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.find('article').remove();
            thisPortListInner.append(responseHtml);
            eltdResizePortfolioItems(thisPortListInner.find('.eltd-pl-grid-sizer').width(), thisPortList);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltd-showing eltd-standard-pag-trigger');
			thisPortList.removeClass('eltd-pl-pag-standard-animate');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdInitPortfolioListAnimation();
				eltd.modules.common.eltdInitParallax();
			}, 600);
		};
		
		var eltdInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltd-showing eltd-standard-pag-trigger');
			thisPortList.removeClass('eltd-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			eltdInitPortfolioListAnimation();
			eltd.modules.common.eltdInitParallax();
		};
		
		var eltdInitAppendIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.append(responseHtml);
            eltdResizePortfolioItems(thisPortListInner.find('.eltd-pl-grid-sizer').width(), thisPortList);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltd-showing');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdInitPortfolioListAnimation();
				eltd.modules.common.eltdInitParallax();
			}, 600);
		};
		
		var eltdInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltd-showing');
			thisPortListInner.append(responseHtml);
			eltdInitPortfolioListAnimation();
			eltd.modules.common.eltdInitParallax();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('eltd-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('eltd-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}
						
						if(thisPortList.hasClass('eltd-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('eltd-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
            getMainPagFunction: function(thisPortList, paged) {
                initMainPagFunctionality(thisPortList, paged);
            }
		};
	}
	
	var eltdPortfolioSingleFollow = function() {
		var info = $('.eltd-follow-portfolio-info .eltd-portfolio-single-holder .eltd-ps-info-sticky-holder');
		
		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.eltd-ps-image-holder'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .eltd-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0;
		}
		
		var infoHolderPosition = function() {
			if(info.length) {
				if (mediaHolderHeight > infoHolderHeight) {
					if(eltd.scroll > infoHolderOffset) {
						var marginTop = eltd.scroll - infoHolderOffset + eltdGlobalVars.vars.eltdAddForAdminBar + headerHeight;
						// if scroll is initially positioned below mediaHolderHeight
						if(marginTop + infoHolderHeight > mediaHolderHeight){
							marginTop = mediaHolderHeight - infoHolderHeight;
						}
						info.stop().animate({
							marginTop: marginTop
						});
					}
				}
			}
		};
		
		var recalculateInfoHolderPosition = function() {
			if (info.length) {
				if(mediaHolderHeight > infoHolderHeight) {
					if(eltd.scroll > infoHolderOffset) {
						
						if(eltd.scroll + headerHeight + eltdGlobalVars.vars.eltdAddForAdminBar + infoHolderHeight + 50 < infoHolderOffset + mediaHolderHeight) { //50 to prevent mispositioning
							
							//Calculate header height if header appears
							if ($('.header-appear, .eltd-fixed-wrapper').length) {
								headerHeight = $('.header-appear, .eltd-fixed-wrapper').height();
							}
							info.stop().animate({
								marginTop: (eltd.scroll - infoHolderOffset + eltdGlobalVars.vars.eltdAddForAdminBar + headerHeight)
							});
							//Reset header height
							headerHeight = 0;
						}
						else{
							info.stop().animate({
								marginTop: mediaHolderHeight - infoHolderHeight
							});
						}
					} else {
						info.stop().animate({
							marginTop: 0
						});
					}
				}
			}
		};
		
		return {
			init : function() {
				infoHolderPosition();
				$(window).scroll(function(){
					recalculateInfoHolderPosition();
				});
			}
		};
	};
	
	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.eltd-portfolio-single-holder .eltd-ps-masonry-images'),
			masonry = masonryHolder.children();
		
		if(masonry.length){
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.eltd-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.eltd-ps-grid-gutter',
                    columnWidth: '.eltd-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
		}
	}

})(jQuery);