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
