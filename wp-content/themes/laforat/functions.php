<?php
/* Define THEME */
if (!defined('JWS_THEME_URI_PATH')) define('JWS_THEME_URI_PATH', get_template_directory_uri());
if (!defined('JWS_THEME_ABS_PATH')) define('JWS_THEME_ABS_PATH', get_template_directory());
if (!defined('JWS_THEME_URI_PATH_FR')) define('JWS_THEME_URI_PATH_FR', JWS_THEME_URI_PATH.'/framework');
if (!defined('JWS_THEME_ABS_PATH_FR')) define('JWS_THEME_ABS_PATH_FR', JWS_THEME_ABS_PATH.'/framework');
if (!defined('JWS_THEME_URI_PATH_ADMIN')) define('JWS_THEME_URI_PATH_ADMIN', JWS_THEME_URI_PATH_FR.'/admin');
if (!defined('JWS_THEME_ABS_PATH_ADMIN')) define('JWS_THEME_ABS_PATH_ADMIN', JWS_THEME_ABS_PATH_FR.'/admin');
if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( JWS_THEME_ABS_PATH . '/redux-framework/ReduxCore/framework.php' );
}
require_once (JWS_THEME_ABS_PATH_ADMIN.'/theme-options.php');
require_once (JWS_THEME_ABS_PATH_ADMIN.'/index.php');
/* Template Functions */
require_once JWS_THEME_ABS_PATH_FR . '/template-functions.php';
/* Template Functions */
require_once JWS_THEME_ABS_PATH_FR . '/templates/post-favorite.php';
require_once JWS_THEME_ABS_PATH_FR . '/templates/post-functions.php';
/* Lib resize images */
require_once JWS_THEME_ABS_PATH_FR.'/includes/resize.php';
/* Post Type */
require_once JWS_THEME_ABS_PATH_FR.'/post-type/testimonial.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/portfolio.php';
require_once JWS_THEME_ABS_PATH_FR.'/post-type/team.php';
/* Function for Framework */
require_once JWS_THEME_ABS_PATH_FR . '/includes.php';
/* Function for OCDI */
	function jwsthemes_import_files() {
    return array(
        array(
            'import_file_name'             => 'laforat',            
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'sampledata/sample.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'sampledata/widgets.wie',            
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'sampledata/options.json',
                    'option_name' => 'jws_theme_options',
                ),
            ),
            'import_preview_image_url'     => 'http://docs.jwsuperthemes.com/images/sampledata_laforat.png',
            'import_notice'                => __( 'After you import this demo, you can setup Settings > Permalink.', 'laforat' ),
            'preview_url'                  => 'http://laforat.jwsuperthemes.com/',
        ),      
    );
	}
	add_filter( 'pt-ocdi/import_files', 'jwsthemes_import_files' );
	/* Function for assign menus to their locations. */
	function jwsthemes_after_import_setup() {
		if(class_exists('UniteBaseAdminClassRev')){
				require_once(ABSPATH .'wp-content/plugins/revslider/admin/revslider-admin.class.php');
				if ($handle = opendir(trailingslashit( get_template_directory() ) . 'sampledata/revslider/')) {
				    while (false !== ($entry = readdir($handle))) {
				        if ($entry != "." && $entry != "..") {
				            $_FILES['import_file']['tmp_name'] = trailingslashit( get_template_directory() ) . 'sampledata/revslider/'.$entry;
				            $slider = new RevSlider();
				            ob_start();
							$response = $slider->importSliderFromPost(true, true);
							ob_end_clean();
						}
					}
				    closedir($handle);
				}			
			}
		// setup menus
			$locations = get_registered_nav_menus();
			foreach ( $locations as $locationId => $menuValue ) {
				switch ( $locationId ) {
					case 'main_navigation':
					$menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
					break;					
				}
				if ( isset( $menu ) ) {
					$locations[ $locationId ] = $menu->term_id;
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );
			// Use a static front page			
			$homepage = get_page_by_title( 'Homepage 01' );
			update_option( 'page_on_front', $homepage->ID );
			update_option( 'show_on_front', 'page' );	
	}
	add_action( 'pt-ocdi/after_import', 'jwsthemes_after_import_setup' );	
	/* Disable the branding notice */
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
/* Register Sidebar */
if (!function_exists('jws_theme_RegisterSidebar')) {
	function jws_theme_RegisterSidebar(){
		global $jws_theme_options;
		register_sidebar(array(
			'name' => esc_html__('Right Sidebar', 'laforat'),
			'id' => 'tbtheme-right-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Left Sidebar', 'laforat'),
			'id' => 'tbtheme-left-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 1', 'laforat'),
			'id' => 'tbtheme-header-top-widget-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 2', 'laforat'),
			'id' => 'tbtheme-header-top-widget-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 3', 'laforat'),
			'id' => 'tbtheme-header-top-widget-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 4', 'laforat'),
			'id' => 'tbtheme-header-top-widget-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Header Top Widget 3 for 3', 'laforat'),
			'id' => 'tbtheme-header-top-widget-3-for-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Top 1', 'laforat'),
			'id' => 'tbtheme-footer-top-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Top 2', 'laforat'),
			'id' => 'tbtheme-footer-top-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Top 3', 'laforat'),
			'id' => 'tbtheme-footer-top-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Top 4', 'laforat'),
			'id' => 'tbtheme-footer-top-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar', 'laforat'),
			'id' => 'tbtheme-footer-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left', 'laforat'),
			'id' => 'tbtheme-bottom-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right', 'laforat'),
			'id' => 'tbtheme-bottom-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebars(4,array(
			'name' => esc_html__('Custom Widget %d', 'laforat'),
			'id' => 'tbtheme-custom-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => esc_html__('Popup Newsletter Sidebar', 'laforat'),
			'id' => 'tbtheme-popup-newsletter-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		));

		if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Canvas Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-canvas-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Account Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-account-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Left Sidebar(see home page 8)', 'laforat'),
				'id' => 'tbtheme-woo-left-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Sidebar For FullWidth', 'laforat'),
				'id' => 'tbtheme-woo-sidebar-full',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title"><span>',
				'after_title' => '</span></h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Full Width Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-archive-attr-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
			register_sidebar(array(
				'name' => esc_html__('Woocommerce Shop Single Sidebar', 'laforat'),
				'id' => 'tbtheme-woo-single-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}
}
add_action( 'init', 'jws_theme_RegisterSidebar' );

/* Add Stylesheet And Script */
if (!function_exists('jws_theme_enqueue_style')) {
	function jws_theme_enqueue_style() {
		global $jws_theme_options;
		wp_enqueue_style( 'bootstrap.min', JWS_THEME_URI_PATH .'/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'flexslider', JWS_THEME_URI_PATH . '/assets/vendors/flexslider/flexslider.css' );
		/*wp_enqueue_style( 'jquery-fancybox', JWS_THEME_URI_PATH . '/assets/vendors/fancybox/jquery.fancybox.css' );
		*/
		wp_enqueue_style( 'colorbox', JWS_THEME_URI_PATH . '/assets/css/colorbox.css' );
		wp_enqueue_style( 'font-awesome', JWS_THEME_URI_PATH .'/assets/css/font-awesome.min.css' );
		/*wp_enqueue_style( 'hover-effects', JWS_THEME_URI_PATH .'/assets/css/hover-effects.css' );
		*/
		wp_enqueue_style('jquery.mCustomScrollbar', JWS_THEME_URI_PATH . "/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css",array(),"");
		wp_enqueue_style( 'animate', JWS_THEME_URI_PATH .'/assets/css/animate.css' );
		wp_enqueue_style( 'pe-icon-stroke', JWS_THEME_URI_PATH .'/assets/vendors/pe-icon-7-stroke/css/pe-icon-7-stroke.css' );
		wp_enqueue_style('owl-carousel', JWS_THEME_URI_PATH . '/assets/vendors/owl-carousel/owl.carousel.css' );
		wp_enqueue_style( 'tb-core-min', JWS_THEME_URI_PATH .'/assets/css/tb.core.min.css' );
		wp_enqueue_style( 'main-style', JWS_THEME_URI_PATH .'/assets/css/main-style.css' );
		// Load the Internet Explorer specific stylesheet.
		wp_enqueue_style( 'ie', get_template_directory_uri() . '/css/ie.css' );
		wp_style_add_data( 'ie', 'conditional', 'IE 9' );

		wp_enqueue_style( 'style', get_stylesheet_uri() );
		if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
			wp_enqueue_style( 'box-style', JWS_THEME_URI_PATH.'/assets/css/box-style.css');
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'jws_theme_enqueue_style' );
}

if (!function_exists('jws_theme_enqueue_script')) {
	function jws_theme_enqueue_script() {
		global $jws_theme_options;
		// wp_enqueue_script("jquery");
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'flexslider-min', JWS_THEME_URI_PATH.'/assets/vendors/flexslider/jquery.flexslider-min.js', array('jquery'), false, true );
		wp_enqueue_script( 'owl-carousel', JWS_THEME_URI_PATH.'/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'waypoint', JWS_THEME_URI_PATH.'/assets/vendors/waypoint/jquery.waypoints.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'animated', JWS_THEME_URI_PATH.'/assets/js/animated.js', array('jquery','waypoint'), false, true );
		wp_enqueue_script( 'jquery.mCustomScrollbar', JWS_THEME_URI_PATH.'/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js', array('jquery') );
		/*wp_enqueue_script( 'jquery-fancybox', JWS_THEME_URI_PATH.'/assets/vendors/fancybox/jquery.fancybox.js', array('jquery'), false, true );
		*/
		wp_enqueue_script( 'bootstrap-min', JWS_THEME_URI_PATH.'/assets/js/bootstrap.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'customvc', JWS_THEME_URI_PATH.'/assets/js/customvc.js', array('jquery'), false, true );
		wp_enqueue_script('jquery-colorbox', JWS_THEME_URI_PATH . "/assets/js/jquery.colorbox.js", array('jquery'),"1.5.5", true);
		wp_enqueue_script( 'tb-shortcodes', JWS_THEME_URI_PATH_FR.'/shortcodes/shortcodes.js', array('jquery'), false, true );
		wp_enqueue_script( 'parallax', JWS_THEME_URI_PATH.'/assets/js/parallax.js', array('jquery'), false, true );
		wp_enqueue_script( 'easytabs', JWS_THEME_URI_PATH.'/assets/js/jquery.easytabs.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'match-height', JWS_THEME_URI_PATH.'/assets/vendors/match-height/jquery.matchHeight-min.js', array('jquery'), false, true );
		wp_register_script( 'countUP', JWS_THEME_URI_PATH.'/assets/js/jquery.incremental-counter.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'jquery.countdown', JWS_THEME_URI_PATH.'/assets/js/jquery.countdown.js', array('jquery') );
		wp_register_script( 'instafeed-custom', JWS_THEME_URI_PATH.'/assets/js/instafeed.min.js', array('jquery'), false, true );
		if( isset( $jws_theme_options['jws_theme_enabled_smooth_scroll'] ) && $jws_theme_options['jws_theme_enabled_smooth_scroll'] ){
			wp_enqueue_script( 'smooth-scroll', JWS_THEME_URI_PATH.'/assets/vendors/smooth-scroll/jquery.smooth-scroll.min.js', array('jquery'), false, true );	
		}
		wp_enqueue_script( 'main', JWS_THEME_URI_PATH .'/assets/js/main.js', array('jquery'), false, true );
		wp_register_script( 'cycle2', JWS_THEME_URI_PATH .'/assets/vendors/cycle2/jquery.cycle2.min.js', array('jquery'), false, true );
    	wp_register_script( 'cycle2-carousel', JWS_THEME_URI_PATH .'/assets/vendors/cycle2/jquery.cycle2.carousel.min.js', array('cycle2'), false, true );
    	wp_enqueue_script( 'jquery-cookie', JWS_THEME_URI_PATH .'/assets/vendors/jquery-cookie/jquery-cookie.js', array(), false, true );
		if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
			wp_enqueue_script( 'box-style', JWS_THEME_URI_PATH.'/assets/js/box-style.js', array('jquery','main'), false, true );
		}
		if( $jws_theme_options['jws_theme_smoothscroll'] ){
			wp_enqueue_script( 'smooth-scroll', JWS_THEME_URI_PATH.'/assets/js/SmoothScroll.js', array('jquery'), false, true );
		}
		wp_localize_script(
		   'main',
		   'the_ajax_script',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'assets_img' => JWS_THEME_URI_PATH.'/assets/images/',
				'primary_color' => $jws_theme_options['jws_theme_primary_color'],
				'show_popup_mail' => isset($jws_theme_options['jws_theme_show_popup']) ? (boolean)$jws_theme_options['jws_theme_show_popup'] : false
			)
		);
	}
	add_action( 'wp_enqueue_scripts', 'jws_theme_enqueue_script' );
}


function jws_theme_load_footer_css() {
	global $jws_theme_options;
	if( isset( $jws_theme_options['jws_theme_box_style'] ) && $jws_theme_options['jws_theme_box_style'] ){
	?>
		<style id='box-style-inline-css' type='text/css'>
			<?php
				$response = wp_remote_get( JWS_THEME_URI_PATH.'/assets/css/custom-style.css' );
				$custom_style = '';
				if( is_array($response) ) {
				  $custom_style = $response['body'];
				}
				echo str_replace( '#eaa24e', $jws_theme_options['jws_theme_primary_color'], $custom_style );
			?>
		</style>
	<?php
	}
}
add_action( 'wp_head', 'jws_theme_load_footer_css' );

/*Style Inline*/
require JWS_THEME_ABS_PATH_FR.'/style-inline.php';

/* Less */
if(jws_theme_get_option('jws_theme_less')){
    require_once JWS_THEME_ABS_PATH_FR.'/presets.php';
}

/* Widgets */
require_once JWS_THEME_ABS_PATH_FR.'/widgets/widgets.php';

/* Woo commerce function */
if (class_exists('Woocommerce')) {
    require_once JWS_THEME_ABS_PATH . '/woocommerce/wc-template-function.php';
    require_once JWS_THEME_ABS_PATH . '/woocommerce/wc-template-hooks.php';
}