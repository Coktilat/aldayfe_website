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