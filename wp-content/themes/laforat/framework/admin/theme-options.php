<?php
    /**
     * ReduxFramework Theme Config File
     * For full documentation, please visit: https://docs.reduxframework.com
     * */

    if ( ! class_exists( 'Redux_Framework_theme_config' ) ) {

        class Redux_Framework_theme_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }
				add_action( 'admin_enqueue_scripts', array( $this, 'tbtheme_add_scripts' ));

            }
			public function tbtheme_add_scripts(){
				wp_enqueue_script( 'action', JWS_THEME_URI_PATH_ADMIN.'/assets/js/action.js', false );
				wp_enqueue_style( 'style_admin', JWS_THEME_URI_PATH_ADMIN.'/assets/css/style_admin.css', false );
			}
            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                //$this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => __( 'Section via hook', 'laforat' ),
                    'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'laforat' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'laforat' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'laforat' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'laforat' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo esc_attr($this->theme->display( 'Name' )); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( __( 'By %s', 'laforat' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( __( 'Version %s', 'laforat' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . __( 'Tags', 'laforat' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo esc_attr($this->theme->display( 'Description' )); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'laforat' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'laforat' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( JWS_THEME_ABS_PATH_ADMIN . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( JWS_THEME_ABS_PATH_ADMIN . '/info-html.html' );
                }
				
				$of_options_fontsize = array("8px" => "8px", "9px" => "9px", "10px" => "10px", "11px" => "11px", "12px" => "12px", "13px" => "13px", "14px" => "14px", "15px" => "15px", "16px" => "16px", "17px" => "17px", "18px" => "18px", "19px" => "19px", "20px" => "20px", "21px" => "21px", "22px" => "22px", "23px" => "23px", "24px" => "24px", "25px" => "25px", "26px" => "26px", "27px" => "27px", "28px" => "28px", "29px" => "29px", "30px" => "30px", "31px" => "31px", "32px" => "32px", "33px" => "33px", "34px" => "34px", "35px" => "35px", "36px" => "36px", "37px" => "37px", "38px" => "38px", "39px" => "39px", "40px" => "40px");
				$of_options_fontweight = array("100" => "100", "200" => "200", "300" => "300", "400" => "400", "500" => "500", "600" => "600", "700" => "700");
				$of_options_font = array("1" => "Google Font", "2" => "Standard Font", "3" => "Custom Font");
				//Google font API
				$of_options_google_font = array();
				if (is_admin()) {
					$results = '';
					//$whitelist = array('127.0.0.1','::1');
					//if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
						$results = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyDnf-ujK_DUCihfvzqdlBokan6zbnrJbi0');
						if (!is_wp_error($results)) {
								$results = json_decode($results['body']);
								if(isset($results->items)){
									foreach ($results->items as $font) {
										$of_options_google_font[$font->family] = $font->family;
									}
								}
						}
					//}
				}
				//Standard Fonts
				$of_options_standard_fonts = array(
					'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
					"'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
					"'Bookman Old Style', serif" => "'Bookman Old Style', serif",
					"'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
					"Courier, monospace" => "Courier, monospace",
					"Garamond, serif" => "Garamond, serif",
					"Georgia, serif" => "Georgia, serif",
					"Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
					"'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
					"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
					"'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
					"'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
					"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
					"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
					"'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
					"'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
					"Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
				);
				// Custom Font
				$fonts = array();
				$of_options_custom_fonts = array();
				$font_path = get_template_directory() . "/fonts";
				if (!$handle = opendir($font_path)) {
					$fonts = array();
				} else {
					while (false !== ($file = readdir($handle))) {
						if (strpos($file, ".ttf") !== false ||
							strpos($file, ".eot") !== false ||
							strpos($file, ".svg") !== false ||
							strpos($file, ".woff") !== false
						) {
							$fonts[] = $file;
						}
					}
				}
				closedir($handle);

				foreach ($fonts as $font) {
					$font_name = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $font);
					$of_options_custom_fonts[$font_name] = $font_name;
				}
				/* remove dup item */
				$of_options_custom_fonts = array_unique($of_options_custom_fonts);

                //lists page
                $lists_page = array();
                $args_page = array(
                    'sort_order' => 'asc',
                    'sort_column' => 'post_title',
                    'hierarchical' => 1,
                    'exclude' => '',
                    'include' => '',
                    'meta_key' => '',
                    'meta_value' => '',
                    'authors' => '',
                    'child_of' => 0,
                    'parent' => -1,
                    'exclude_tree' => '',
                    'number' => '',
                    'offset' => 0,
                    'post_type' => 'page',
                    'post_status' => 'publish'
                );
                $pages = get_pages( $args_page );

                foreach( $pages as $p ){
                    $lists_page[ $p->ID ] = esc_attr( $p->post_title );
                }
				
				/*General Setting*/
				$this->sections[] = array(
                    'title'  => __( 'General Setting', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-cogs',
                    'fields' => array(
						array(
                            'id'       => 'jws_theme_less',
                            'type'     => 'switch',
                            'title'    => __( 'Less Design', 'laforat' ),
                            'subtitle' => __( 'Use the less design features.', 'laforat' ),
							'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_box_style',
                            'type'     => 'switch',
                            'title'    => __( 'Show Box Style', 'laforat' ),
                            'subtitle' => __( 'Show Box style options', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_smoothscroll',
                            'type'     => 'switch',
                            'title'    => __( 'Smooth Scroll', 'laforat' ),
                            'subtitle' => __( 'Enable smooth scroll', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_show_popup',
                            'type'     => 'switch',
                            'title'    => __( 'Show Newsletter Popup onload', 'laforat' ),
                            'subtitle' => __( 'Show Newsletter popup on load', 'laforat' ),
                            'default'  => false,
                        ),
                        array( 
                            'id'       => 'jws_theme_body_layout',
                            'type'     => 'select',
                                'title'    => __('Choose Body Layout', 'laforat'),
                                'subtitle' => __('Select body layout.', 'laforat'),
                                'options'  => array(
                                    'wide'=>__('Wide', 'laforat'),
                                    'boxed'=>__('Boxed', 'laforat')
                                ),
                                'default'  => 'wide'
                        ),
						array(
							'id'       => 'jws_theme_background',
							'type'     => 'background',
							'title'    => __('Body Background', 'laforat'),
							'subtitle' => __('Body background with image, color, etc.', 'laforat'),
							'default'  => array(
								'background-color' => '#ffffff',
							),
							'output' => array('body'),
						),
					)
					
				);
				/*Logo*/
				$this->sections[] = array(
                    'title'  => __( 'Logo', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-viadeo',
                    'fields' => array(
						array(
							'id'       => 'jws_theme_favicon_image',
							'type'     => 'media',
							'url'      => true,
							'title'    => __('Favicon Image', 'laforat'),
							'subtitle' => __('Select an image file for your favicon.', 'laforat'),
							'default'  => array(
								'url'	=> JWS_THEME_URI_PATH.'/favicon.ico'
							),
						),
                        array(
                            'id'       => 'jws_theme_logo_text',
                            'type'     => 'text',
                            'title'    => __('Logo Text', 'laforat'),
                            'subtitle' => __('Enter Logo text', 'laforat'),
                            'default'  => __( '', 'laforat')
                        ),
						array(
							'id'       => 'jws_theme_logo_image',
							'type'     => 'media',
							'url'      => true,
							'title'    => __('Logo Image', 'laforat'),
							'subtitle' => __('Select an image file for your logo instead of text.', 'laforat'),
							'default'  => array(
								'url'	=> JWS_THEME_URI_PATH.'/assets/images/logov4.png'
							),
						)
					)
				);
				
				/* Header Options */
				$this->sections[] = array(
                    'title'  => __( 'Header', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-file-edit',
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_header_layout',
							'type'     => 'image_select',
							'title'    => __('Header Layout', 'laforat'),
							'subtitle' => __('Select header layout in your site.', 'laforat'),
							'options'  => array(
                                'v1'    => array(
                                    'alt'   => 'Header 1',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v1.jpg'
                                ),
								'v2'	=> array(
									'alt'   => 'Header 2',
									'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v2.jpg'
								),
								'v3'	=> array(
									'alt'   => 'Header 3',
									'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v3.jpg'
								),
								'v4'	=> array(
									'alt'   => 'Header 4',
									'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v4.jpg'
								),
								'v5'	=> array(
									'alt'   => 'Header 5',
									'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v5.jpg'
								),
								'v6'	=> array(
									'alt'   => 'Header 6',
									'img'   => JWS_THEME_URI_PATH.'/assets/images/headers/header-v1.jpg'
								)
							),
							'default' => 'v6'
						),
						/* Header Sticky */
						array(
                            'id'       => 'jws_theme_stick_header',
                            'type'     => 'switch',
                            'title'    => __( 'Sticky Header', 'laforat' ),
                            'subtitle' => __( 'Enable a fixed header when scrolling.', 'laforat' ),
							'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_header_full',
                            'type'     => 'switch',
                            'title'    => __( 'Header fullwidth', 'laforat' ),
                            'subtitle' => __( 'Header fullwidth.', 'laforat' ),
                            'default'  => true,
                        )
						/* Header Sticky */
					)
				);
				/* Header Options */
				
				/*Main Menu*/
				$this->sections[] = array(
                    'title'  => __( 'Main Menu', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-list',
                    'fields' => array(
						array(
							'id'          => 'jws_theme_menu_font_size_firts_level',
							'type'        => 'typography', 
							'title'       => __('Typography', 'laforat'),
							'color'      => false, 
							'font-weight' => false, 
							'subsets' => false,
							'font-backup' => false,
							'line-height' => false,
							'subtitle' => __('Typography option with firts level item in menu. Default: 15px, ex: 15px.', 'laforat'),
							'default'     => array(
								'font-size'   => '14px',
								'font-family' => 'bitter'
							),
							'output' => array('#nav > li > a, a.icon_search_wrap, a.icon_cart_wrap, .header-menu-item-icon a'),
						),
						array(
							'id'          => 'jws_theme_menu_font_size_sub_level',
							'type'        => 'typography', 
							'title'       => __('Typography', 'laforat'),
							'color'      => false, 
							'font-weight' => false, 
							'subsets' => false,
							'font-backup' => false,
							'subtitle' => __('Typography option with sub level item in menu.', 'laforat'),
							'default'     => array(
								'font-size'   => '14px',
								'line-height' => '14px',
								'font-family' => 'roboto'
							),
							'output' => array('#nav > li > ul li a,'),
						),
						array(
							'id' => 'jws_theme_menu_padding',
							'title' => 'Menu Padding',
							'subtitle' => __('Please, Enter padding For Menu.', 'laforat'),
							'type' => 'spacing',
							'units' => array('px'),
							'output' => array('#nav > li > a'),
							'default' => array(
								'padding-top'     => '0', 
								'padding-right'   => '15px', 
								'padding-bottom'  => '0', 
								'padding-left'    => '15px',
								'units'          => 'px', 
							)
						),
					)
					
				);
                /*Footer*/
                $this->sections[] = array(
                    'title'  => __( '404 Page', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el el-error',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_error404_page_id',
                            'type'     => 'select',
                            'title'    => __('Page 404 Template', 'laforat'),
                            'subtitle' => __('Select 404 page.', 'laforat'),
                            'options'  => $lists_page
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_header',
                            'type'     => 'switch',
                            'title'    => __( 'Display Header', 'laforat' ),
                            'subtitle' => __( 'Display header.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_top_sidebar',
                            'type'     => 'switch',
                            'title'    => __( 'Display Top Sidebar', 'laforat' ),
                            'subtitle' => __( 'Display Top Sidebar.', 'laforat' ),
                            'default'  => false
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_title',
                            'type'     => 'switch',
                            'title'    => __( 'Display Page title', 'laforat' ),
                            'subtitle' => __( 'Display Page title.', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_display_footer',
                            'type'     => 'switch',
                            'title'    => __( 'Display Footer', 'laforat' ),
                            'subtitle' => __( 'Display Footer.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_error404_bg',
                            'type'     => 'background',
                            'title'    => __('404 Page Background', 'laforat'),
                            'subtitle' => __('404 page background with image, color, etc.', 'laforat'),
                            'default'  => array(
                                'background-image' => JWS_THEME_URI_PATH.'/assets/images/404-page/Pageaa.jpg',
                            ),
                            'output' => array('.tb-error404-wrap'),
                        )
                        
                    )
                    
                );
				/*Footer*/
                $this->sections[] = array(
                    'title'  => __( 'Footer', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-file-edit',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_footer',
                            'type'     => 'switch',
                            'title'    => __( 'Display Footer', 'laforat' ),
                            'subtitle' => __( 'Display footer.', 'laforat' ),
                            'default'  => true,
                        ),
                        array( 
                            'id'       => 'jws_theme_footer_layout',
                            'type'     => 'image_select',
                            'title'    => __('Footer Layout', 'laforat'),
                            'subtitle' => __('Select footer layout in your site.', 'laforat'),
                            'options'  => array(
                                'v1'    => array(
                                    'alt'   => 'Footer 1',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/footers/footer-v1.jpg'
                                ),
                                'v2'    => array(
                                    'alt'   => 'Footer 2',
                                    'img'   => JWS_THEME_URI_PATH.'/assets/images/footers/footer-v2.jpg'
                                )
                            ),
                            'default' => 'v1'
                        ),
                        array(
                            'id' => 'jws_theme_footer_margin',
                            'title' => 'Footer Margin',
                            'subtitle' => __('Please, Enter margin of Footer.', 'laforat'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output' => array('.jws_theme_footer'),
                            'default' => array(
                                'margin-top'     => '0', 
                                'margin-right'   => '0', 
                                'margin-bottom'  => '0', 
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_padding',
                            'title' => 'Footer Padding',
                            'subtitle' => __('Please, Enter padding of Footer.', 'laforat'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output' => array('.jws_theme_footer'),
                            'default' => array(
                                'padding-top'     => '0', 
                                'padding-right'   => '0', 
                                'padding-bottom'  => '0', 
                                'padding-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        
                    )
                    
                );
                $this->sections[] = array(
                    'title'  => __( 'Footer Top', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-file-edit',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_footer_top_bg',
                            'type'     => 'background',
                            'title'    => __('Footer Background', 'laforat'),
                            'subtitle' => __('Footer background with image, color, etc.', 'laforat'),
                            'default'  => array(
                                'background-color' => '#81a05d',
                            ),
                            'output' => array('.jws_theme_footer .footer-top'),
                        ),
                        array(
                            'id' => 'jws_theme_footer_top_margin',
                            'title' => 'Footer Top Margin',
                            'subtitle' => __('Please, Enter margin of Footer Top.', 'laforat'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-top'),
                            'default' => array(
                                'margin-top'     => '0', 
                                'margin-right'   => '0', 
                                'margin-bottom'  => '0', 
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_top_padding',
                            'title' => 'Footer Top Padding',
                            'subtitle' => __('Please, Enter padding of Footer Top.', 'laforat'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-top'),
                            'default' => array(
                                'padding-top'     => '67px', 
                                'padding-right'   => '0', 
                                'padding-bottom'  => '90px', 
                                'padding-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                    )
                    
                );
                $this->sections[] = array(
                    'title'  => __( 'Footer Bottom', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-file-edit',
                    'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_footer_bottom_bg',
                            'type'     => 'background',
                            'title'    => __('Footer Background', 'laforat'),
                            'subtitle' => __('Footer background with image, color, etc.', 'laforat'),
                            'default'  => array(
                                'background-color' => '#ffffff',
                            ),
                            'output' => array('.jws_theme_footer .footer-bottom'),
                        ),
                        array(
                            'id' => 'jws_theme_footer_bottom_margin',
                            'title' => 'Footer Bottom Margin',
                            'subtitle' => __('Please, Enter margin of Footer Bottom.', 'laforat'),
                            'type' => 'spacing',
                            'mode' => 'margin',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-bottom'),
                            'default' => array(
                                'margin-top'     => '0', 
                                'margin-right'   => '0', 
                                'margin-bottom'  => '0', 
                                'margin-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                        array(
                            'id' => 'jws_theme_footer_bottom_padding',
                            'title' => 'Footer Bottom Padding',
                            'subtitle' => __('Please, Enter padding of Footer Bottom.', 'laforat'),
                            'type' => 'spacing',
                            'units' => array('px'),
                            'output'  => array('.jws_theme_footer .footer-bottom'),
                            'default' => array(
                                'padding-top'     => '6px', 
                                'padding-right'   => '0', 
                                'padding-bottom'  => '32px', 
                                'padding-left'    => '0',
                                'units'          => 'px', 
                            )
                        ),
                    )
                );
				/*Icon*/
				$this->sections[] = array(
                    'title'  => __( 'Icons', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-fire',
                    'fields' => array(
						array(
                            'id'       => 'jws_theme_font_awesome',
                            'type'     => 'switch',
                            'title'    => __( 'Font Awesome', 'laforat' ),
                            'subtitle' => __( 'Use font awesome in your site.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_font_ionicons',
                            'type'     => 'switch',
                            'title'    => __( 'Font Ionicons', 'laforat' ),
                            'subtitle' => __( 'Use font ionicons in your site.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_font_icon_troke',
                            'type'     => 'switch',
                            'title'    => __( 'Font Pe icon 7 stroke', 'laforat' ),
                            'subtitle' => __( 'Use font Pe icon 7 stroke in your site.', 'laforat' ),
							'default'  => true,
                        )
					)
					
				);
                /*Styling Setting*/
                $this->sections[] = array(
                    'title'  => __( 'Styling Options', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-tint',
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_primary_color',
                            'type'     => 'color',
                            'title'    => __('Primary Color', 'laforat'),
                            'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #558b2f).', 'laforat'),
                            'default'  => '#558b2f',
                            'validate' => 'color',
                        ),
                    )
                );
				
				/* Typography Setting */
				$this->sections[] = array(
                    'title'  => __( 'Typography', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-font',
                    'fields' => array(
						/*Body font*/
						array(
							'id'          => 'jws_theme_body_font',
							'type'        => 'typography', 
							'title'       => __('Body Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'output'      => array('body'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#545454',
								'font-family' => 'roboto',
								'font-size'   => '14px', 
								'line-height' => '24px'
							),
						),
						array(
							'id'          => 'jws_theme_h1_font',
							'type'        => 'typography', 
							'title'       => __('H1 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h1'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#1c1c1c',
								'font-family' => 'Bitter',
								'font-size'   => '45px', 
								'line-height' => '48px'
							),
						),
						array(
							'id'          => 'jws_theme_h2_font',
							'type'        => 'typography', 
							'title'       => __('H2 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h2'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#000000', 
								'font-family' => 'Bitter', 
								'font-size'   => '25px', 
								'line-height' => '30px'
							),
						),
						array(
							'id'          => 'jws_theme_h3_font',
							'type'        => 'typography', 
							'title'       => __('H3 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h3'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#1c1c1c', 
								'font-family' => 'Bitter',
								'font-size'   => '45px', 
								'line-height' => '48px'
							),
						),
						array(
							'id'          => 'jws_theme_h4_font',
							'type'        => 'typography', 
							'title'       => __('H4 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h4'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#272727',
								'font-family' => 'Bitter',
								'font-size'   => '40px', 
								'line-height' => '25px'
							),
						),
						array(
							'id'          => 'jws_theme_h5_font',
							'type'        => 'typography', 
							'title'       => __('H5 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h5'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#2a2a2a',
								'font-family' => 'Bitter', 
								'font-size'   => '16px', 
								'line-height' => '18px'
							),
						),
						array(
							'id'          => 'jws_theme_h6_font',
							'type'        => 'typography', 
							'title'       => __('H6 Font Options', 'laforat'),
							'google'      => true, 
							'font-backup' => true,
							'letter-spacing' => true,
							'output'      => array('body h6'),
							'units'       =>'px',
							'subtitle'    => __('Typography option with each property can be called individually.', 'laforat'),
							'default'     => array(
								'google'      => true,
								'color'       => '#272727',
								'font-family' => 'Bitter',
								'font-size'   => '14pxpx',
								'line-height' => '17px'
							),
						),
					)
				);
				$this->sections[] = array(
					'title' => __('Extra Fonts', 'laforat'),
					'icon' => 'el el-fontsize',
					'subsection' => true,
					'fields' => array(
						array(
							'id' => 'google-font-1',
							'type' => 'typography',
							'subtitle' => __('Set font family for content... extend class "font-laforat-1"', 'laforat' ),
							'title' => __('Font 1', 'laforat'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => false,
							'text-align'=> false,
							'line-height'=>false,
							'font-size'=> false,
							'subsets'=> false,
							'output'=> array('.font-laforat-1'),
							'default' => array(
								'font-family' => 'roboto',
								'font-weight'=> '400',
							)
						),
						array(
							'id' => 'google-font-2',
							'type' => 'typography',
							'subtitle' => __('Set font family for heading... extend class "font-laforat-2. Font oswald Lighter"', 'laforat' ),
							'title' => __('Font 2', 'laforat'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => false,
							'text-align'=> false,
							'line-height'=>false,
							'font-size'=> false,
							'subsets'=> false,
							'output'=> array('.font-laforat-2'),
							'default' => array(
								'font-family' => 'roboto',
								'font-weight'=> '300',
							)
						),
						array(
							'id' => 'google-font-3',
							'type' => 'typography',
							'subtitle' => __('Set font family for heading... extend class "font-laforat-3. Font oswald Normal"', 'laforat' ),
							'title' => __('Font 3', 'laforat'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => false,
							'text-align'=> false,
							'line-height'=>false,
							'font-size'=> false,
							'subsets'=> false,
							'output'=> array('.font-laforat-3'),
							'default' => array(
								'font-family' => 'roboto',
								'font-weight'=> '400',
							)
						),
						array(
							'id' => 'google-font-4',
							'type' => 'typography',
							'subtitle' => __('Set font family for heading... extend class "font-laforat-3. Font oswald Bold"', 'laforat' ),
							'title' => __('Font 4', 'laforat'),
							'google' => true,
							'font-backup' => false,
							'font-style' => false,
							'color' => false,
							'text-align'=> false,
							'line-height'=>false,
							'font-size'=> false,
							'subsets'=> false,
							'output'=> array('.font-laforat-4'),
							'default' => array(
								'font-family' => 'roboto',
								'font-weight'=> '700',
							)
						),
					)
				);
				/* Typography Setting */
				
				/*Title Bar Setting*/
				$this->sections[] = array(
                    'title'  => __( 'Title Bar', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-livejournal',
                    'fields' => array(
						array(
                            'id'       => 'jws_theme_display_page_title',
                            'type'     => 'switch',
                            'title'    => __( 'Show page title', 'laforat' ),
                            'subtitle' => __( 'Show page title', 'laforat' ),
                            'default'  => true,
                        ),
						array(
							'id' => 'jws_theme_title_bar_typography',
							'type' => 'typography',
							'title' => __('Typography', 'laforat'),
							'google' => true,
							'font-backup' => true,
							'all_styles' => true,
							'output'  => array('.title-bar .page-title'),
							'units' => 'px',
							'subtitle' => __('Typography option with title text.', 'laforat'),
							'default' => array(
								'color' => '#fff',
								'font-style' => 'normal',
								'font-weight' => '700',
								'font-family' => 'Bitter',
								'google' => true,
								'font-size' => '20px',
								'line-height' => '20px',
								'text-align' => 'center'
							)
						),
						array(
							'id'       => 'jws_theme_title_bar_bg',
							'type'     => 'background',
							'title'    => __('Background', 'laforat'),
							'subtitle' => __('background with image, color, etc.', 'laforat'),
							'default'  => array(
								'background-color' => 'transparent',
								'background-image' => JWS_THEME_URI_PATH.'/assets/images/title_bars/a-1.jpg',
								'background-size' =>'cover',
								'background-repeat'=>'no-repeat',
								'background-position'=>'center top'
							),
							'output' => array('.title-bar, .title-bar-shop'),
						),
						array(
							'id' => 'jws_theme_title_bar_margin',
							'title' => 'Margin',
							'subtitle' => __('Please, Enter margin of title bar.', 'laforat'),
							'type' => 'spacing',
							'mode' => 'margin',
							'units' => array('px'),
							'output' => array('.title-bar, .title-bar-shop'),
							'default' => array(
								'margin-top'     => '0', 
								'margin-right'   => '0', 
								'margin-bottom'  => '0', 
								'margin-left'    => '0',
								'units'          => 'px', 
								)
							 ),
						array(
							'id' => 'jws_theme_title_bar_padding',
							'title' => 'Padding',
							'subtitle' => __('Please, Enter padding of title bar.', 'laforat'),
							'type' => 'spacing',
							'units' => array('px'),
							'output' => array('.title-bar, .title-bar-shop'),
							'default' => array(
								'padding-top'     => '89px', 
								'padding-right'   => '0', 
								'padding-bottom'  => '89px', 
								'padding-left'    => '0',
								'units'          => 'px', 
							)
						),
						array(
							'id'       => 'jws_theme_page_breadcrumb_delimiter',
							'type'     => 'text',
							'title'    => __('Delimiter', 'laforat'),
							'subtitle' => __('Please, Enter Delimiter of page breadcrumb in title bar.', 'laforat'),
							'default'  => '/'
						)
					)
				);
				/* Breadcrumb */
				$this->sections[] = array(
					'title' => __('Breadcrumb', 'laforat'),
					'icon' => 'el-icon-livejournal',
					// 'subsection' => true,
					'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_breadcrumb',
                            'type'     => 'switch',
                            'title'    => __( 'Show Breadcrumb', 'laforat' ),
                            'subtitle' => __( 'Show Breadcrumb', 'laforat' ),
                            'default'  => true,
                        )
					)
				);

                /* Breadcrumb */
                $this->sections[] = array(
                    'title' => __('Search Bar', 'laforat'),
                    'icon' => 'el-icon-livejournal',
                    // 'subsection' => true,
                    'fields' => array(
                        array(
                            'id'       => 'jws_theme_display_searchbar',
                            'type'     => 'switch',
                            'title'    => __( 'Show Search Bar', 'laforat' ),
                            'subtitle' => __( 'Show Search Bar', 'laforat' ),
                            'default'  => true,
                        )
                    )
                );
				
				/* Page Setting */
				$this->sections[] = array(
					'title'  => __( 'Page Setting', 'laforat' ),
					'desc'   => __( '', 'laforat' ),
					'icon'   => 'el-icon-file-edit',
					'fields' => array(
						array(
                            'id'       => 'jws_theme_show_page_comment',
                            'type'     => 'switch',
                            'title'    => __( 'Show Page Comment', 'laforat' ),
							'default'  => true,
                        ),
					)
				);
				
				/*Post Setting*/
				$this->sections[] = array(
					'title'  => __( 'Post Setting', 'laforat' ),
					'desc'   => __( '', 'laforat' ),
					'icon'   => 'el-icon-file-edit',
					'fields' => array()
				);
				$this->sections[] = array(
                    'title'  => __( 'Archive Post', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => '',
					'subsection' => true,
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_blog_layout',
							'type'     => 'image_select',
							'title'    => __('Select Layout', 'laforat'),
							'subtitle' => __('Select layout of archive post.', 'laforat'),
							'options'  => array(
								'1col'	=> array(
										'alt'   => '1col',
										'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
									),
								'2cl'	=> array(
											'alt'   => '2cl',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
										),
								'2cr'	=> array(
											'alt'   => '2cr',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
										),
								'3cm'	=> array(
											'alt'   => '3cm',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
										)
							),
							'default' => '2cr'
						),
						array(
							'id'       => 'jws_theme_blog_image_default',
							'type'     => 'media',
							'url'      => true,
							'title'    => __('Image Default', 'laforat'),
							'subtitle' => __('Select an image file for image feature post.', 'laforat'),
							'default'  => array(
								'url'	=> ''
							),
						),
						array(
                            'id'       => 'jws_theme_blog_crop_image',
                            'type'     => 'switch',
                            'title'    => __( 'Crop Image', 'laforat' ),
                            'subtitle' => __( 'Crop or not crop image of post on your archive post.', 'laforat' ),
							'default'  => true,
                        ),
						array(
							'id'       => 'jws_theme_blog_image_width',
							'type'     => 'text',
							'title'    => __('Image Width', 'laforat'),
							'subtitle' => __('Please, Enter the width of image on your archive post. Default: 600.', 'laforat'),
							'indent'   => true,
                            'required' => array( 'jws_theme_blog_crop_image', "=", 1 ),
							'default'  => '870'
						),
						array(
							'id'       => 'jws_theme_blog_image_height',
							'type'     => 'text',
							'title'    => __('Image Height', 'laforat'),
							'subtitle' => __('Please, Enter the height of image on your archive post. Default: 400.', 'laforat'),
							'indent'   => true,
                            'required' => array( 'jws_theme_blog_crop_image', "=", 1 ),
							'default'  => '430'
						),
						array(
                            'id'       => 'jws_theme_blog_show_post_title',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Title', 'laforat' ),
                            'subtitle' => __( 'Show or not title of post on your archive post.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_show_post_info',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Info', 'laforat' ),
                            'subtitle' => __( 'Show or not info of post on your archive post.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_show_post_desc',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Description', 'laforat' ),
                            'subtitle' => __( 'Show or not description of post on your archive post.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_blog_post_excerpt_leng',
                            'type'     => 'text',
                            'title'    => __( 'Excerpt Leng', 'laforat' ),
                            'subtitle' => __( 'Insert the number of words you want to show in the post excerpts.', 'laforat' ),
							'default'  => '50',
                        ),
						array(
                            'id'       => 'jws_theme_blog_post_excerpt_more',
                            'type'     => 'text',
                            'title'    => __( 'Excerpt More', 'laforat' ),
                            'subtitle' => __( 'Insert the character of words you want to show in the post excerpts.', 'laforat' ),
							'default'  => '...',
                        ),
                        array(
                            'id'       => 'jws_theme_blog_post_readmore',
                            'type'     => 'text',
                            'title'    => __( 'Read More Link', 'laforat' ),
                            'subtitle' => __( 'Enter name of readmore link', 'laforat' ),
                            'default'  => __( 'Read More >>', 'laforat' ),
                        ),
					)
				);
				$this->sections[] = array(
                    'title'  => __( 'Single Post', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => '',
					'subsection' => true,
                    'fields' => array(
						array( 
							'id'       => 'jws_theme_post_layout',
							'type'     => 'image_select',
							'title'    => __('Select Layout', 'laforat'),
							'subtitle' => __('Select layout of single blog.', 'laforat'),
							'options'  => array(
								'1col'	=> array(
										'alt'   => '1col',
										'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
									),
								'2cl'	=> array(
											'alt'   => '2cl',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
										),
								'2cr'	=> array(
											'alt'   => '2cr',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
										),
								'3cm'	=> array(
											'alt'   => '3cm',
											'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
										)
							),
							'default' => '2cr'
						),
						array(
                            'id'       => 'jws_theme_post_crop_image',
                            'type'     => 'switch',
                            'title'    => __( 'Crop Image', 'laforat' ),
                            'subtitle' => __( 'Crop or not crop image of post on your single blog.', 'laforat' ),
							'default'  => false,
                        ),
						array(
							'id'       => 'jws_theme_post_image_width',
							'type'     => 'text',
							'title'    => __('Image Width', 'laforat'),
							'subtitle' => __('Please, Enter the width of image on your single blog. Default: 800.', 'laforat'),
							'indent'   => true,
                            'required' => array( 'jws_theme_post_crop_image', "=", 1 ),
							'default'  => '870'
						),
						array(
							'id'       => 'jws_theme_post_image_height',
							'type'     => 'text',
							'title'    => __('Image Height', 'laforat'),
							'subtitle' => __('Please, Enter the height of image on your single blog. Default: 800.', 'laforat'),
							'indent'   => true,
                            'required' => array( 'jws_theme_post_crop_image', "=", 1 ),
							'default'  => '430'
						),
						array(
                            'id'       => 'jws_theme_post_show_post_title',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Title', 'laforat' ),
                            'subtitle' => __( 'Show or not title of post on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_social_share',
                            'type'     => 'switch',
                            'title'    => __( 'Show Social Share', 'laforat' ),
                            'subtitle' => __( 'Show or not social share of post on your single blog.', 'laforat' ),
							'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_info',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Info', 'laforat' ),
                            'subtitle' => __( 'Show or not info of post on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_nav',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Navigation', 'laforat' ),
                            'subtitle' => __( 'Show or not post navigation on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_tags',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Tags', 'laforat' ),
                            'subtitle' => __( 'Show or not post tags on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_author',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Author', 'laforat' ),
                            'subtitle' => __( 'Show or not post author on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_comment',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Comment', 'laforat' ),
                            'subtitle' => __( 'Show or not post comment on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_post_show_post_about_author',
                            'type'     => 'switch',
                            'title'    => __( 'Show About Author', 'laforat' ),
                            'subtitle' => __( 'Show or not about author on your single blog.', 'laforat' ),
                            'default'  => false,
                        ),
						array(
                            'id'       => 'jws_theme_post_show_post_related',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Related', 'laforat' ),
                            'subtitle' => __( 'Show or not post related on your single blog.', 'laforat' ),
							'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_post_no_post_related',
                            'type'     => 'text',
                            'title'    => __( 'Number Post on Related', 'laforat' ),
                            'subtitle' => __( 'Enter number post related on your single blog.', 'laforat' ),
                            'default'  => 3,
                        )
					)
				);

                $this->sections[] = array(
                    'title'  => __( 'Archive Portfolio', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => '',
                    'subsection' => true,
                    'fields' => array(
                        array( 
                            'id'       => 'jws_theme_portfolio_layout',
                            'type'     => 'image_select',
                            'title'    => __('Select Layout', 'laforat'),
                            'subtitle' => __('Select layout of archive post.', 'laforat'),
                            'options'  => array(
                                '1col'  => array(
                                        'alt'   => '1col',
                                        'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
                                    ),
                                '2cl'   => array(
                                            'alt'   => '2cl',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
                                        ),
                                '2cr'   => array(
                                            'alt'   => '2cr',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
                                        ),
                                '3cm'   => array(
                                            'alt'   => '3cm',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
                                        )
                            ),
                            'default' => '1col'
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_template',
                            'type'     => 'select',
                            'title'    => __('Portfolio Template', 'laforat'),
                            'options'  => array(
                                "tpl1" => __("Template 1 ( Overlay effect )",'laforat'),
                                "tpl2" => __("Template 2 ( Overlay effect With Icon )",'laforat'),
                                "tpl" => __("Default",'laforat')
                            ),
                            'default'  => 'tpl',
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_show_filter',
                            'type'     => 'switch',
                            'title'    => __( 'Show Filter', 'laforat' ),
                            'subtitle' => __( 'Show or not filter.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_show_page',
                            'type'     => 'switch',
                            'title'    => __( 'Show Pagination', 'laforat' ),
                            'subtitle' => __( 'Show or not pagination.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_no_pading',
                            'type'     => 'switch',
                            'title'    => __( 'No Padding?', 'laforat' ),
                            'subtitle' => __( 'No padding in each items.', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_column',
                            'type'     => 'select',
                            'title'    => __('Columns', 'laforat'),
                            'options'  => array(
                                "4" => __("4 Columns",'laforat'),
                                "3" => __("3 Columns",'laforat'),

                                "2" => __("2 Columns",'laforat'),

                                "1" => __("1 Column",'laforat'),
                            ),
                            'default'  => '3',
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_count',
                            'type'     => 'text',
                            'title'    => __('Count', 'laforat'),
                            'subtitle' => __('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'laforat')
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_view_now',
                            'type'     => 'switch',
                            'title'    => __( 'Show View Now', 'laforat' ),
                            'subtitle' => __( 'Show or not View Now of post in this element.', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_archive_portfolio_view_more',
                            'type'     => 'switch',
                            'title'    => __( 'Show View More', 'laforat' ),
                            'subtitle' => __( 'Show or not View more of archive in this element.', 'laforat' ),
                            'default'  => true,
                        )
                        
                    )
                );

                $this->sections[] = array(
                    'title'  => __( 'Single Porfolio', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => '',
                    'subsection' => true,
                    'fields' => array(
                        array( 
                            'id'       => 'jws_theme_portfolio_layout',
                            'type'     => 'image_select',
                            'title'    => __('Select Layout', 'laforat'),
                            'subtitle' => __('Select layout of single porfolio.', 'laforat'),
                            'options'  => array(
                                '1col'  => array(
                                        'alt'   => '1col',
                                        'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/1col.png'
                                    ),
                                '2cl'   => array(
                                            'alt'   => '2cl',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cl.png'
                                        ),
                                '2cr'   => array(
                                            'alt'   => '2cr',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/2cr.png'
                                        ),
                                '3cm'   => array(
                                            'alt'   => '3cm',
                                            'img'   => JWS_THEME_URI_PATH_ADMIN.'/assets/images/3cm.png'
                                        )
                            ),
                            'default' => '1col'
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_title',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Title', 'laforat' ),
                            'subtitle' => __( 'Show or not title of post on your single porfolio.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_social_share',
                            'type'     => 'switch',
                            'title'    => __( 'Show Social Share', 'laforat' ),
                            'subtitle' => __( 'Show or not social share of post on your single porfolio.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_nav',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Navigation', 'laforat' ),
                            'subtitle' => __( 'Show or not post navigation on your single porfolio.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_author',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Author', 'laforat' ),
                            'subtitle' => __( 'Show or not post author on your single porfolio.', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_comment',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Comment', 'laforat' ),
                            'subtitle' => __( 'Show or not post comment on your single porfolio.', 'laforat' ),
                            'default'  => false,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_show_post_related',
                            'type'     => 'switch',
                            'title'    => __( 'Show Post Related', 'laforat' ),
                            'subtitle' => __( 'Show or not post related on your single porfolio.', 'laforat' ),
                            'default'  => true,
                        ),
                        array(
                            'id'       => 'jws_theme_portfolio_no_post_related',
                            'type'     => 'text',
                            'title'    => __( 'Number Porfolio items on Related', 'laforat' ),
                            'subtitle' => __( 'Enter number porfolio item relate on your single porfolio.', 'laforat' ),
                            'default'  => 3
                        )
                    )
                );
				
				/*Shop Setting*/
				if (class_exists ( 'Woocommerce' )) {
					$this->sections[] = array(
						'title'  => __( 'Shop Setting', 'laforat' ),
						'desc'   => __( '', 'laforat' ),
						'icon'   => 'el-icon-shopping-cart',
						'fields' => array(
							
						)
					);
					$this->sections[] = array(
						'title'  => __( 'Archive Products', 'laforat' ),
						'desc'   => __( '', 'laforat' ),
						'icon'   => '',
						'subsection' => true,
						'fields' => array(
							array(
								'id'       => 'jws_theme_archive_sidebar_pos_shop',
								'type'     => 'select',
								'title'    => __('Sidebar Position (Shop layout)', 'laforat'),
								'subtitle' => __('Select sidebar position in page archive products.', 'laforat'),
								'options'  => array(
									'tb-sidebar-left' => 'Left',
									'tb-sidebar-right' => 'Right',
                                    'tb-sidebar-hidden' =>'Hide sidebar (Shop fullwidth)'
								),
								'default'  => 'tb-sidebar-left',
							),
                            array(
                                'id'       => 'jws_theme_archive_shop_column',
                                'type'     => 'select',
                                'title'    => __('Products Per Row', 'laforat'),
                                'subtitle' => __('Change products number display per row for the Shop page'),
                                'options'  => array(
                                    "4" => __("4 Products",'laforat'),
                                    "3" => __("3 Products",'laforat'),

                                    "2" => __("2 Products",'laforat'),

                                    "1" => __("1 Column",'laforat'),
                                ),
                                'default'  => '3',
                            ),
                            array(
                                'id'       => 'jws_theme_archive_shop_ful_column',
                                'type'     => 'select',
                                'title'    => __('Products Per Row For Layout Fullwidth', 'laforat'),
                                'subtitle' => __('Change products number display per row for the Shop page( fullwidth layout )'),
                                'options'  => array(
                                    "4" => __("4 Products",'laforat'),
                                    "3" => __("3 Products",'laforat'),
                                    "2" => __("2 Products",'laforat'),
                                    "1" => __("1 Column",'laforat'),
                                ),
                                'default'  => '4',
                            ),
                            array(
                                'id'       => 'jws_theme_archive_shop_per_page',
                                'type'     => 'text',
                                'title'    => __( 'Products Per Page', 'laforat' ),
                                'subtitle' => __( 'Enter number products per page.', 'laforat' ),
                                'default'  => 9,
                            ),
							array(
								'id'       => 'jws_theme_archive_show_result_count',
								'type'     => 'switch',
								'title'    => __( 'Show Result Count', 'laforat' ),
								'subtitle' => __( 'Show result count in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_catalog_ordering',
								'type'     => 'switch',
								'title'    => __( 'Show Catalog Ordering', 'laforat' ),
								'subtitle' => __( 'Show catalog ordering in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_pagination_shop',
								'type'     => 'switch',
								'title'    => __( 'Show Pagination', 'laforat' ),
								'subtitle' => __( 'Show pagination in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_title_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Title', 'laforat' ),
								'subtitle' => __( 'Show product title in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_price_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Price', 'laforat' ),
								'subtitle' => __( 'Show product price in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_rating_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Rating', 'laforat' ),
								'subtitle' => __( 'Show product rating in page archive products.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_archive_show_sale_flash_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Sale Flash', 'laforat' ),
								'subtitle' => __( 'Show product sale flash in page archive products.', 'laforat' ),
								'default'  => true,
							),
                            array(
                                'id'       => 'jws_theme_archive_show_cat_product',
                                'type'     => 'switch',
                                'title'    => __( 'Show Product Category', 'laforat' ),
                                'subtitle' => __( 'Show product Catogry in page archive products.', 'laforat' ),
                                'default'  => true
                            ),
							array(
								'id'       => 'jws_theme_archive_show_add_to_cart_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Add To Cart', 'laforat' ),
								'subtitle' => __( 'Show product add to cart in page archive products.', 'laforat' ),
								'default'  => true,
							),
                            array(
                                'id'       => 'jws_theme_archive_show_quick_view_product',
                                'type'     => 'switch',
                                'title'    => __( 'Show Product Quick View', 'laforat' ),
                                'subtitle' => __( 'Show product quick view in page archive products.', 'laforat' ),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'jws_theme_archive_show_whishlist_product',
                                'type'     => 'switch',
                                'title'    => __( 'Show Product Wish List', 'laforat' ),
                                'subtitle' => __( 'Show product wish lish in page archive products.', 'laforat' ),
                                'default'  => true,
                            ),
                            array(
                                'id'       => 'jws_theme_archive_show_compare_product',
                                'type'     => 'switch',
                                'title'    => __( 'Show Product Compare', 'laforat' ),
                                'subtitle' => __( 'Show product compare in page archive products.', 'laforat' ),
                                'default'  => true,
                            ),
                             array(
                                'id'       => 'jws_theme_archive_show_color_attribute',
                                'type'     => 'switch',
                                'title'    => __( 'Show Color Attribute', 'laforat' ),
                                'subtitle' => __( 'Show color attribute in page archive products.', 'laforat' ),
                                'default'  => false
                            ),
						)
					);
					$this->sections[] = array(
						'title'  => __( 'Single Product', 'laforat' ),
						'desc'   => __( '', 'laforat' ),
						'icon'   => '',
						'subsection' => true,
						'fields' => array(
							array(
								'id'       => 'jws_theme_single_sidebar_pos_shop',
								'type'     => 'select',
								'title'    => __('Sidebar Position', 'laforat'),
								'subtitle' => __('Select sidebar position in page single product.', 'laforat'),
								'options'  => array(
									'tb-sidebar-left' => 'Left',
									'tb-sidebar-right' => 'Right',
                                    'tb-sidebar-hidden' =>'Hide sidebar (single fullwidth)'
								),
								'default'  => 'tb-sidebar-right',
							),
							array(
								'id'       => 'jws_theme_single_show_title_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Title', 'laforat' ),
								'subtitle' => __( 'Show product title in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_price_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Price', 'laforat' ),
								'subtitle' => __( 'Show product price in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_rating_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Rating', 'laforat' ),
								'subtitle' => __( 'Show product rating in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_sale_flash_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Sale Flash', 'laforat' ),
								'subtitle' => __( 'Show product sale flash in page single product.', 'laforat' ),
								'default'  => true,
							),
                            array( 
                                'id'       => 'jws_theme_video_tab',
                                'type'     => 'select',
                                    'title'    => __('How to display video tab?', 'laforat'),
                                    'options'  => array(
                                        'none'=>__('Hidden', 'laforat'),
                                        'on_tabs'=>__('Show in Woocommerce tabs', 'laforat'),
                                        'on_thumbnail'=>__('Show on product thumbnails', 'laforat')
                                    ),
                                    'default'  => 'on_thumbnail'
                            ),
							array(
								'id'       => 'jws_theme_single_show_excerpt',
								'type'     => 'switch',
								'title'    => __( 'Show Product Excerpt', 'laforat' ),
								'subtitle' => __( 'Show product excerpt in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_add_to_cart_product',
								'type'     => 'switch',
								'title'    => __( 'Show Product Add To Cart', 'laforat' ),
								'subtitle' => __( 'Show product add to cart in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_meta',
								'type'     => 'switch',
								'title'    => __( 'Show Product Meta', 'laforat' ),
								'subtitle' => __( 'Show product meta in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_data_tabs',
								'type'     => 'switch',
								'title'    => __( 'Show Product Data Tabs', 'laforat' ),
								'subtitle' => __( 'Show product data tabs in page single product.', 'laforat' ),
								'default'  => true,
							),
							array(
								'id'       => 'jws_theme_single_show_related_products',
								'type'     => 'switch',
								'title'    => __( 'Show Product Related Products', 'laforat' ),
								'subtitle' => __( 'Show product related products in page single product.', 'laforat' ),
								'default'  => true,
							),
						)
					);
				}
				/*Custom CSS*/
				$this->sections[] = array(
                    'title'  => __( 'Custom CSS', 'laforat' ),
                    'desc'   => __( '', 'laforat' ),
                    'icon'   => 'el-icon-css',
                    'fields' => array(
						array(
							'id'       => 'custom_css_code',
							'type'     => 'ace_editor',
							'title'    => __('Custom CSS Code', 'laforat'),
							'subtitle' => __('Quickly add some CSS to your theme by adding it to this block..', 'laforat'),
							'mode'     => 'css',
							'theme'    => 'monokai',
							'default'  => ''
						)
					)
					
				);
				/*Import / Export*/
				$this->sections[] = array(
                    'title'  => __( 'Import / Export', 'laforat' ),
                    'desc'   => __( 'Import and Export your Redux Framework settings from file, text or URL.', 'laforat' ),
                    'icon'   => 'el-icon-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'jws_theme_import_export',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => __('Save and restore your Redux options','laforat'),
                            'full_width' => false,
                        ),
						array (
                            'id'            => 'jws_theme_import',
                            'type'          => 'js_button',
                            'title'         => 'Appearance > Click Import Demo Data.',                          
                        ),
                    ),
                );                
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'laforat' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'laforat' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'laforat' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'laforat' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'laforat' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'jws_theme_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => __( 'Theme Options', 'laforat' ),
                    'page_title'           => __( 'Theme Options', 'laforat' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    'update_notice'        => false,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => 'jws_theme_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );
				
                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Visit us on GitHub',
                    'icon'  => 'el-icon-github'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Like us on Facebook',
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Follow us on Twitter',
                    'icon'  => 'el-icon-twitter'
                );
                $this->args['share_icons'][] = array(
                    'url'   => '#',
                    'title' => 'Find us on LinkedIn',
                    'icon'  => 'el-icon-linkedin'
                );
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_theme_config();
    } else {
        echo "The class named Redux_Framework_theme_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;


    if( ! function_exists('jws_theme_get_option') ){
        function jws_theme_get_option($name, $default=false){
            global $jws_theme_options;
            return isset( $jws_theme_options[ $name ] ) ? $jws_theme_options[ $name ] : $default;
        }
    }

    if( ! function_exists('jws_theme_update_option') ){
        function jws_theme_update_option($name, $value){
            global $jws_theme_options;
            $jws_theme_options[ $name ] = $value;
        }
    }

