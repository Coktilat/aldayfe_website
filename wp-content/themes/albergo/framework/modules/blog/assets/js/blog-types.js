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