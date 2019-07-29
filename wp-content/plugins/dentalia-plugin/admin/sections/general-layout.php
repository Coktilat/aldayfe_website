<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
 
global $orion_options;

$color_1 = orion_get_option('main_theme_color', false, '#00BCD4' );
$color_2 = orion_get_option('secondary_theme_color', false, '#3F51B5' );
$color_3 = orion_get_option('color_3', false, '#2B354B' );
// patterns
$patterns_dir = get_template_directory() . '/img/patterns/';
$patterns_uri =  get_template_directory_uri() . '/img/patterns/';
$files = array();
foreach (glob($patterns_dir . "*.png") as $file) {
  $files[] = $file;
}
$patterns = array();
foreach ($files as $key => $img) {
    $name = basename($img, '.png');
    $alt  = $name;
    $patterns[$patterns_uri . $name . '.png'] = array("alt" => $name, "img"=> $patterns_uri . $name . '.png');
}

$empty = "no_sidebar";
$sidebar_options[$empty] = "-- None --";
global $orion_options; 
$allsidebars = $GLOBALS['wp_registered_sidebars'];

foreach ($allsidebars as $key => $sidebar) {
    $s_name = $sidebar['name'];
    $s_slug = $sidebar['id'];
    $sidebar_options[$s_slug] = $s_name;
}

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('General', 'dentalia'),
    'icon'      => 'el-icon-star',
    'fields'    => array(
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Design Style', 'dentalia'),
    'icon'      => 'fa fa-paint-brush',
    'subsection'      => true,
    'fields'    => array(         
        array(
            'id'   => 'info_general_color_settings',
            'type' => 'info',
            'title'    => esc_html__('Theme Colors', 'dentalia'),
            'desc' => esc_html__('Use these settings to create a consistent style throughout your website. Advanced customization is available under individual sections.', 'dentalia'),
        ),

        array(
            'id'       => 'main_theme_color',
            'type'     => 'color',
            'title'    => esc_html__('Main Theme color', 'dentalia'),
            'subtitle' => esc_html__('Defines the most dominant color of your theme.', 'dentalia'),
            'description'    => esc_html__('Automatically sets button and icon color, page title background and more.', 'dentalia'),
            'transparent' => false,
            'output'      => array( 
                    'background-color' => 
                        '.primary-color-bg, 
                        .primary-hover-bg:hover, .primary-hover-bg:focus, 
                        .closebar, .hamburger-box,
                        .commentlist .comment.bypostauthor .comment-body,
                        .paging-navigation .page-numbers .current, .paging-navigation .page-numbers a:hover,
                        .tagcloud a:hover, .tagcloud a:focus, .separator-style-2.style-text-dark:before, 
                        .separator-style-2.style-primary-color:before, 
                        .separator-style-2.style-text-default:before,
                        .panel-title .primary-hover:not(.collapsed), 
                        .owl-theme .owl-dots .owl-dot.active, .owl-theme .owl-dots .owl-dot:hover,
                        .overlay-primary .overlay, .overlay-hover-primary:hover .overlay,
                        .calendar_wrap table caption,
                        aside .widget .widget-title:before, .site-footer .widget .widget-title:before, .prefooter .widget .widget-title:before,
                        mark, .mark, .page-numbers.p-numbers > li, .page-numbers.p-numbers > li:hover a,
                        .pika-button:hover, .is-selected .pika-button,
                        .woo-tabs .panel-title > a.js-tabcollapse-panel-heading:not(.collapsed), .nav-tabs.tabs-style-2 > li.active > a,
                        .nav-tabs.tabs-style-2 > li:hover > a,
                        .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
                        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
                        .woocommerce-store-notice, p.demo_store
                        ',
    
                    'color' => 
                        '.primary-color, .text-light .primary-color, .text-dark .primary-color,
                        a.primary-color, .text-light a.primary-color, .text-dark a.primary-color,
                        .primary-hover:hover, .primary-hover:focus, 
                        .primary-hover:hover .hover-child, .primary-hover:focus .hover-child, .primary-hover:active, .primary-hover:hover:after, .primary-hover:active:after,
                        .commentlist .comment article .content-wrap .meta-data .comment-reply-link i, 
                        .dropcap, 
                        a:hover, a:active, a:not([class*="hover"]) .item-title:hover, a.item-title:hover,
                        .wpcf7-form .select:after, .wpcf7-form .name:after, .wpcf7-form .email:after, .wpcf7-form .date:after, .wpcf7-form .phone:after, .wpcf7-form .time:after,
                        .wpcf7-form label,
                        .team-header .departments a:not(:hover),
                        input.search-submit[type="submit"]:hover,
                        .top-bar-wrap > .section.widget_nav_menu ul.menu li a:hover, .top-bar-wrap > .section.widget_nav_menu ul.menu li a:focus,
                        ol.ordered-list li:before,
                        .widget_archive > ul > li a:before, .widget_categories > ul > li a:before, .widget_pages > ul > li a:before, .widget_meta > ul > li a:before,
                        .list-star > li:before, .list-checklist > li:before, .list-arrow > li:before, .woocommerce div.product .stock, .woocommerce div.product span.price
                        ',

                    'border-color' => 
                        '.primary-border-color, 
                        .paging-navigation .page-numbers .current, 
                        input:focus, textarea:focus, .wpcf7-form input:focus, .wpcf7-form input:focus, .form-control:focus',

                    'border-top-color' => '.commentlist .comment.bypostauthor .comment-body:after',
            ),
            'default'  => '#00BCD4',
            'compiler' => true,
        ),        

        array(
            'id'       => 'secondary_theme_color',
            'type'     => 'color',
            'title'    => esc_html__('Secondary Theme Color', 'dentalia'),
            'subtitle' => esc_html__('Defines a secondary color for your theme.', 'dentalia'),
            'description'    => esc_html__('An additional color option for buttons and widgets.', 'dentalia'),
            'transparent' => false,
            'output'      => array( 
                    'background-color' => 
                        '.secondary-color-bg, 
                        .secondary-hover-bg:hover, .secondary-hover-bg:focus,
                        .separator-style-2.style-secondary-color:before, 
                        .panel-title .secondary-hover:not(.collapsed),
                        .overlay-secondary .overlay, .overlay-hover-secondary:hover .overlay,
                        .orion-onsale',
    
                    'color' => 
                        '.secondary-color, 
                        .secondary-color, .text-light .secondary-color, .text-dark .secondary-color,
                        a.secondary-color, .text-light a.secondary-color, .text-dark a.secondary-color,
                        .secondary-hover:hover, .secondary-hover:focus, .item-title.secondary-hover:hover,
                        .secondary-hover:hover .hover-child, secondary-hover:focus .hover-child, 
                        .secondary-hover:active, .secondary-hover:hover:after, .secondary-hover:active:after',

                    'border-color' => '.secondary-border-color',
            ),

            'default'  => '#3F51B5',
            'compiler' => true,
        ),  

        array(
            'id'       => 'color_3',
            'type'     => 'color',
            'title'    => esc_html__('Tertiary Theme Color', 'dentalia'),
            'subtitle' => esc_html__('For best results select a dark color.', 'dentalia'),
            'description'    => esc_html__('Automatically sets the background color of dark navigation, submenu, and footer.', 'dentalia'),
            'transparent' => false,
            'output'      => array( 
                    'background-color' => 
                        '.tertiary-color-bg,                     
                        .tertiary-hover-bg:hover, .tertiary-hover-bg:focus,
                        .separator-style-2.style-tertiary-color:before, 
                        .panel-title .tertiary-hover:not(.collapsed),
                        .overlay-tertiary .overlay, .overlay-hover-tertiary:hover .overlay,
                        .hamburger-box + .woocart, .woocommerce a.button',
                    'color' => 
                        '.tertiary-color, .text-light .tertiary-color, .text-dark .tertiary-color,
                        a.tertiary-color, .text-light a.tertiary-color, .text-dark a.tertiary-color,
                        .tertiary-hover:hover, .tertiary-hover:focus, .item-title.tertiary-hover:hover, 
                        .tertiary-hover:hover .hover-child, .tertiary-hover:focus .hover-child, 
                        .tertiary-hover:active, .tertiary-hover:hover:after,  .tertiary-hover:active:after,
                        .tertiary-color',
                    'border-color' => '.tertiary-border-color',
            ),

            'default'  => '#2B354B',
            'compiler' => true,
        ),

        array(
            'id'       => 'site_background_color',
            'type'     => 'color',
            'title'    => esc_html__('Site content Background Color', 'dentalia'),
            'subtitle' => esc_html__('Defines the background color of your pages.', 'dentalia'),
            'output'      => array( 
                    'background-color' => 'body .site-content',
            ),

            'default'  => '#ffffff',
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Layout', 'dentalia'),
    'icon'      => 'el-icon-website',
    'subsection'      => true,
    'fields'    => array(
        
        array(
            'id'   => 'info_general_layout_settings',
            'type' => 'info',
            'title'    => esc_html__('Website Layout Settings', 'dentalia'),
            'subtitle'    => esc_html__('Define the general layout of your website.', 'dentalia'),
        ),

        array(
            'id'       => 'boxed_fullwidth',
            'type'     => 'switch',
            'title'    => esc_html__('Choose Layout', 'dentalia'), 
            'default'  => '1',// 1 = on | 0 = off
            'on'       => 'Full Width',
            'off'       => 'Boxed',
            'compiler' => true,
        ),
        array(
            'id'        => 'passepartout',
            'type'      => 'checkbox',
            'title'     => esc_html__('Passepartout', 'dentalia'), 
            'subtitle'  => esc_html__('Enable this option to display a frame around your site. Works with full width layout.', 'dentalia'),
            'default'   => '0', // 1 = on | 0 = off
            'required' => array(
                    array('boxed_fullwidth','equals','1'),                    
            )             
        ),
        array(
            'id'             => 'passepartout_size',
            'type'           => 'dimensions',
            'units'          => 'px',
            'title'          => esc_html__('Passpartue size', 'dentalia'),
            'subtitle'  => esc_html__('The size is set in pixels.', 'dentalia'),
            'units'    => false,
            'default'  => array(
                'width'   => '24', 
                'height'  => '24'
            ),
            'required' => array(
                    array('boxed_fullwidth','equals','1'), 
                    array('passepartout','equals','1')                   
            )       
        ),
        array(
            'id'        => 'passepartout_color',
            'required' => array('passepartout','equals','1'),
            'type'      => 'color',
            'title'     => esc_html__('Passepartout color', 'dentalia'),                    
            'default'   => '#e0e0e0',
            'required' => array(
                    array('boxed_fullwidth','equals','1'), 
                    array('passepartout','equals','1')                   
            )              
        ),       

        array(
            'id'   => 'info_boxedversionstyle_settings',
            'type' => 'info',
            'title'    => esc_html__('Boxed Style Settings', 'dentalia'),
            'required' => array('boxed_fullwidth','equals','0'),
        ),

        array(
            'id'       => 'boxed_site_background_color',
            'type'     => 'color',
            'title'    => esc_html__('Page Background Color', 'dentalia'),
            'subtitle'  => esc_html__('Defines the page background (body) color. ', 'dentalia'),
            'transparent' => false,
            'output'    => array(
                'background' => 'body.boxed',
            ),
            'default'  => '#f4f8fa',
            'required' => array('boxed_fullwidth','equals','0'),

        ),
        array(
            'id'       => 'pattern_type',
            'type'     => 'switch',
            'title'    => esc_html__('Page Background Image', 'dentalia'), 
            'default'  => '1',// 1 = on | 0 = off
            'on'       => 'Custom',
            'off'       => 'Pattern Library',
            'required' => array('boxed_fullwidth','equals','0'),
        ),

       array(
            'id'       => 'pattern',
            'type'     => 'image_select',
            'title'    => esc_html__('Choose Pattern', 'dentalia'), 
            'options'  => $patterns,
            'default' => '',
            'output' => array(
                    'background-image' => 'body.boxed'
                ),
            'required' => array(
                array('boxed_fullwidth','equals','0'),
                array('pattern_type','equals','0'),
            ),
        ),
        array(
            'id'        => 'boxed_site_background',
            'type'     => 'background',
            'title'     => esc_html__('Upload Background Image', 'dentalia'),
            'background-color' => false,                 
            'output'    => array(
                'background' => 'body.boxed'
            ),
            'required' => array(
                array('boxed_fullwidth','equals','0'),
                array('pattern_type','equals','1'),
            ),            
        ),
        array(
            'id'       => 'boxed_add_shadow',
            'type'     => 'switch',
            'title'    => esc_html__('Add shadow', 'dentalia'), 
            'default'  => '0',// 1 = on | 0 = off
            'on'       => 'ON',
            'off'       => 'OFF',
            'compiler' => true,
            'required' => array('boxed_fullwidth','equals','0'),
        ),        
        array(
            'id'       => 'boxed_site_shadow_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Shadow color', 'dentalia'),
            'subtitle'  => esc_html__('Defines the page shadow. ', 'dentalia'),
            'transparent' => false,
            'options'       => array(
                'clickout_fires_change' => true,
            ),
            'default'   => array(
                'color'     => $color_1,
                'alpha'     => 0.15
            ),
            'required' => array(
                    array('boxed_fullwidth','equals','0'), 
                    array('boxed_add_shadow','equals','1'),                   
            ),  
            'compiler' => true,
        ),
        array(
            'id'       => 'boxed_border_radius',
            'type'      => 'slider',
            'title'    => __('Boxed container rounding', 'dentalia'),
            "min"       => 0,
            "step"      => 1,
            "max"       => 90,
            "default"   => 0,
            'required' => array('boxed_fullwidth','equals','0'), 
            'compiler' => true,                  
        ),               
        array(
            'id'   => 'info_boxedversion_settings',
            'type' => 'info',
            'title'    => esc_html__('Boxed Layout Settings', 'dentalia'),
            'required' => array('boxed_fullwidth','equals','0'),
        ),            
        array(
            'id'        => 'boxed_site_width',
            'type'      => 'slider',
            'title'     => __('Site Content Width', 'dentalia'),
            'subtitle'     => __('Set in pixels.', 'dentalia'),
            'desc'      => __('Default: 1320px', 'dentalia'),
            "default"   => 1320,
            "min"       => 600,
            "step"      => 1,
            "max"       => 1600,
            'display_value' => 'text',
            'required' => array('boxed_fullwidth','equals','0'),
            'compiler' => true,     
        ),
        array(
            'id'        => 'boxed_site_padding',
            'type'      => 'slider',
            'title'     => __('Site Content Padding', 'dentalia'),
            'subtitle'     => __('Sets left and right padding.', 'dentalia'),
            'desc'      => __('Default: 60px', 'dentalia'),
            "default"   => 90,
            "min"       => 0,
            "step"      => 1,
            "max"       => 120,
            'display_value' => 'text',
            'required' => array('boxed_fullwidth','equals','0'),
            'compiler' => true,     
        ),
        array(
            'id'             => 'boxed_top_margin',
            'type'           => 'spacing',
            // 'output'         => array('.boxed-container'),
            'mode'           => 'margin',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Site Margin', 'dentalia'),
            'subtitle'     => __('Sets top and bottom margin.', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'margin-top'     => '36px', 
                'margin-bottom'  => '36px', 
            ),
            'compiler' => true,  
            'required' => array('boxed_fullwidth','equals','0'),
        ),          

        array(
            'id'   => 'info_pagesidebar_settings',
            'type' => 'info',
            'title'    => esc_html__('Single Page Layout', 'dentalia'),
            'subtitle'    => esc_html__('Choose a default sidebar to be displayed on your pages. Settings can be overwritten on individual pages. Leave both fields empty for a full-width layout.', 'dentalia'),
        ), 
        array(
            'id'        => 'page-sidebar-left-defauts',
            'type'     => 'select',
            'title'     => esc_html__('Left sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Will be displayed on single pages.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
         array(
            'id'        => 'page-sidebar-right-defauts',
            'type'     => 'select',
            'title'     => esc_html__('Right sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Will be displayed on single pages.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ), 
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Settings', 'dentalia'),
    'icon'      => 'fa fa-wrench ',
    'subsection'      => true,
    'fields'    => array(

        array(
            'id'   => 'info_404_settings',
            'type' => 'info',
            'title'    => esc_html__('404 Page', 'dentalia'),
        ),  
        array(
            'id'       => 'page_404',
            'type'     => 'select',
            'title'    => esc_html__('404 error page', 'dentalia'), 
            'subtitle' => esc_html__('Create a custom 404 page and define it here', 'dentalia'),
            'data'     => 'page',
        ),
        array(
            'id'   => 'info_totop_settings',
            'type' => 'info',
            'title'    => esc_html__('Back to top', 'dentalia'),
        ),  
        array(
            'id'        => 'back_to_top',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display Back to top button', 'dentalia'), 
            'default'   => '0',
        ),
        array(
            'id'   => 'info_onepage_settings',
            'type' => 'info',
            'title'    => esc_html__('One-Page Functionality', 'dentalia'),
        ),
        array(
            'id'        => 'one_page',
            'type'      => 'checkbox',
            'title'     => esc_html__('Use Dentalia as One Page:', 'dentalia'), 
            'subtitle'  => esc_html__('Improves navigation if you use Dentalia as onePage site', 'dentalia'),
            'default'   => '0',
            'compiler' => true,
        ),
        array(
            'id'   => 'team_info',
            'type' => 'info',
            'title'    => esc_html__('Team Settings', 'dentalia'),
        ),

        array(
            'id'        => 'use_team_post_type',
            'type'     => 'switch',
            'title'     => esc_html__('Team members ', 'dentalia'),
            'default'  => '1',// 1 = on | 0 = off 
            'on'       => 'Post type',
            'off'       => 'Simple',            
            'subtitle'  => esc_html__('Use Team-members as a post type?', 'dentalia'),
            'description' => esc_html__('Chosing Team as a post type will create a "Team" post type and "Department" taxonomy to your WordPress.', 'dentalia'),
            'default'   => '1', // 1 = on | 0 = off,
            'compiler' => true,
        ), 

        array(
            'id'   => 'info_singlepost_settings',
            'type' => 'info',
            'title'    => esc_html__('Commenting', 'dentalia'),
        ),    
        array(
            'id'        => 'comments_posts',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display comments on posts?', 'dentalia'), 
            'subtitle'  => esc_html__('Do you want to enable readers to comment your posts?', 'dentalia'),
            'default'   => '1'// 1 = on | 0 = off
        ),    
        array(
            'id'        => 'comments_pages',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display comments on pages?', 'dentalia'), 
            'subtitle'  => esc_html__('Do you want to enable readers to comment your pages?', 'dentalia'),
            'default'   => '1'// 1 = on | 0 = off
        ),
        array(
            'id'        => 'comments_attachment',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display comments on attachment pages?', 'dentalia'), 
            'subtitle'  => esc_html__('Do you want to enable readers to comment your attachment pages?', 'dentalia'),
            'default'   => '0'// 1 = on | 0 = off
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('SEO', 'dentalia'),
    'icon'      => 'fa fa-search ',
    'subsection'      => true,
    'fields'    => array(

        array(
            'id'   => 'seo_info',
            'type' => 'info',
            'title'    => esc_html__('Minify to Improve Page Speed', 'dentalia'),
        ), 

        array(
            'id'        => 'use_minified_css',
            'type'      => 'checkbox',
            'title'     => esc_html__('Use minified Theme CSS and JS', 'dentalia'), 
            'subtitle'  => esc_html__('Use minified CSS and JS files to improve page speed', 'dentalia'),

            'description' => esc_html__('Make sure you have the latest version of theme.', 'dentalia'),
            'default'   => '1'// 1 = on | 0 = off
        ),
       
        array(
            'id'   => 'custom_head_footer_tags_info',
            'type' => 'info',
            'title'    => esc_html__('Custom Head tags and footer scripts', 'dentalia'),
            'subtitle' => esc_html__('Custom Head meta and scripts. Used for Google analytics, Facebook meta and other integrations. Warning: Only use if you know what you are doing.', 'dentalia'),
        ),  
        array(
            'id' => 'custom_head_tags',
            'title'    => esc_html__('Head meta and scripts', 'dentalia'),
            'type' => 'textarea',
            'rows' => 10,
        ),
        array(
            'id' => 'custom_footer_tags',
            'title'    => esc_html__('Custom Footer scripts', 'dentalia'),
            'type' => 'textarea',
            'rows' => 10,
        ),          
    ),
));
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Compatibility', 'dentalia'),
    'icon'      => 'fa fa-clock-o ',
    'subsection'      => true,
    'fields'    => array(
        array(
            'id'   => 'compatibility_info',
            'type' => 'info',
            'title'    => esc_html__('Dentalia version 1.7 has increased performance and speed. Prevously Fontawesome and Elegant icons were automatially loaded on each page. Now they only load if the icons are used in the widgets. These options are here for compatibility reasons.', 'dentalia'),
        ),
        array(
            'id'        => 'load_fa',
            'type'      => 'checkbox',
            'title'     => esc_html__('Load fontAwesome icons throughout the site', 'dentalia'), 
            'default'   => '0'// 1 = on | 0 = off
        ),
        array(
            'id'        => 'load_ei',
            'type'      => 'checkbox',
            'title'     => esc_html__('Load Elegant icons throughout the site', 'dentalia'), 
            'default'   => '0'// 1 = on | 0 = off
        ),
    ),
));        
Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Logo', 'dentalia'),
    'icon'      => 'fa fa-coffee',
    'fields'    => array(

        array(
            'id'   => 'info_logo_settings',
            'type' => 'info',
            'title'    => esc_html__('Intuitive Logo Display', 'dentalia'),
            'desc' => esc_html__('Dentalia will automatically change the logo to suit the background color of the header.', 'dentalia'),
        ),
        array(
            'id'       => 'logo_upload_dark',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Dark Logo', 'dentalia'),
            'subtitle' => esc_html__('Will be displayed on light header backgrounds.', 'dentalia'),
            'description' => esc_html__('Upload a .PNG image with transparent background.', 'dentalia'),
            'default'  => array(
                'url' => ''
            ),
        ), 
        array(
            'id'       => 'logo_upload_light',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Light Logo', 'dentalia'),
            'subtitle' => esc_html__('Will be displayed on dark header backgrounds.', 'dentalia'),
            'description' => esc_html__('Upload a .PNG image with transparent background.', 'dentalia'),
            'default'  => array(
                'url' => ''
            ),
        ),
        array(
            'id'       => 'logo_upload_sticky',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Sticky Logo', 'dentalia'),
            'subtitle' => esc_html__('Logo for sticky header.', 'dentalia'),
            'description' => esc_html__('Upload a .PNG image with transparent background.', 'dentalia'),
            'default'  => array(
                'url' => ''
            ),
        ),         
        array(
            'id'       => 'text_logo',
            'type'     => 'text',
            'title'    => esc_html__('Text based logo', 'dentalia'),
            'subtitle' => esc_html__('Displays if no Logo image is selected, or used as logo link title attribute.', 'dentalia'),
            'desc'     => esc_html__('Accepts HTML tags.', 'dentalia'),
            'validate' => 'html',
            'default'  => 'Dentalia',
        ),        
        array(
            'id'       => 'logo_max_dimensions',
            'type'     => 'dimensions',
            'title'    => __('Maximum Logo width and height', 'dentalia'),
            'default'  => array(
                'Width'   => '300',
                'Height'  => '72',
            ),
            'units' => false,
            'compiler' => true, 
        ),
        array(
            'id'             => 'logo_mobile_spacing',
            'type'           => 'spacing',
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Mobile logo spacing', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'compiler' => true,
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Header & Menu', 'dentalia'),
    'icon'      => 'fa fa-navicon',
    'fields'    => array(

        array(
            'id'   => 'info_header_settings',
            'type' => 'info',
            'title'    => esc_html__('Header layout', 'dentalia'),
        ),
        array(
            'id'       => 'orion_header_type',
            'type'     => 'image_select',
            'title'    => esc_html__('Choose Header layout', 'dentalia'), 
            'subtitle' => esc_html__('Choose a default header layout.', 'dentalia'),
            'compiler' => true,
            'options'  => array(
                'classic'      => array(
                    'alt'   => 'Classic', 
                    'img'   => get_template_directory_uri().'/framework/admin/img/header-classic.png'
                ),
                'widgetsfluid'      => array(
                    'alt'   => 'Menu with widgets and fluid navigation bar', 
                    'img'   => get_template_directory_uri().'/framework/admin/img/header-widgets.png'
                ),
            ),
            'default' => 'classic'    
        ),               
        // CLASSIC HEADER
        array(
            'id'   => 'info_classic_header_settings',
            'type' => 'info',
            'title'    => esc_html__('Classic Header Settings', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','classic'),                  
            ) 
        ),
        array(
            'id'       => 'classic_header_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Classic Header Background', 'dentalia' ),
            'subtitle'    => esc_html__( 'Default colors are set in Main Navigation Settings.', 'dentalia' ),
            'transparent' => false,
            'background-attachment' => false,
            'output'   => array( '.mainheader.header-classic' ),
            'required' => array(
                    array('orion_header_type','equals','classic'),                  
            ) 
        ),
        array(
            'id'        => 'header_hight_classic',
            'type'      => 'slider',
            'title'     => __('Classic Header Height', 'dentalia'),
            'subtitle'  => __('Sets desktop header height.', 'dentalia'),
            'desc'      => __('Min: 48px, Max: 180px.', 'dentalia'),
            "default"   => 120,
            "min"       => 48,
            "step"      => 2,
            "max"       => 180,
            'display_value' => 'text',
            'compiler' => true,
            'required' => array(
                array('orion_header_type','equals','classic'),                  
            )                       
        ),

        array(
            'id'       => 'header_width_classic',
            'type'     => 'switch',
            'title'    => esc_html__('Full width header', 'dentalia'), 
            'default'  => '0',
            'on'       => 'On',
            'off'       => 'Off',
            'required' => array(
                    array('orion_header_type','equals','classic'),                 
            )
        ),  

        array(
            'id'   => 'info_classic_header_logo_settings',
            'type' => 'info',
            'title'    => esc_html__('Classic Header Logo settings', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','classic'),                  
            ) 
        ),
        array(
            'id'       => 'classicheader_mobile_logo_color',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo color on mobile devices', 'dentalia' ),
            'default'  => 'mobile-text-dark',
            'options'  => array(
                'mobile-text-dark' => 'Dark Logo',
                'mobile-text-light' => 'Light Logo',
            ),
            'required' => array(
                    array('orion_header_type','equals','classic'),
            ),
        ),
        array(
            'id'        => 'logo_position_hight_classic',
            'type'      => 'slider',
            'title'     => __('Desktop Logo Positioning', 'dentalia'),
            'subtitle'  => __('Defines logo vertical position for classic header.', 'dentalia'),
            'desc'      => __('Default: 50%', 'dentalia'),
            "default"   => 50,
            "min"       => 10,
            "step"      => 1,
            "max"       => 120,
            'display_value' => 'text',
            'compiler' => true,
            'required' => array(
                array('orion_header_type','equals','classic'),                  
            )                  
        ),
        array(
            'id'   => 'info_classic_header_widgets',
            'type' => 'info',
            'title'    => esc_html__('Classic Header Widget Area Settings', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','classic'),                  
            ) 
        ),
        array(
            'id'       => 'classicheader_widgets_switch',
            'type'     => 'switch', 
            'title'    => __('Display Header Widget Area', 'dentalia'),
            'subtitle' => __('Enable to display widgets in classic header.', 'dentalia'),
            'default'  => true,
            'required' => array(
                array('orion_header_type','equals','classic'),
            ) 
        ),
        array(
            'id'       => 'classic_headerwidgets_background_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Header Widget Area Background Color', 'dentalia' ),
            'subtitle'    => esc_html__( 'Defines the background color of classic header widget area.', 'dentalia' ),
            // 'default'  => '',
            'output' =>  array( 'background' => '.header-classic .widget-section' ),
            'transparent' => false,
            'required' => array(
                    array('orion_header_type','equals','classic'),
                    array('classicheader_widgets_switch','equals',true),
            ) 
        ),
        array(
            'id'       => 'classicheader_widgets_colorstyle',
            'type'     => 'select',
            'title'    => esc_html__( 'Header Widget Area Text Color - Desktop', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section.', 'dentalia' ),
            'default'  => 'text-dark',
            'options'  => array(
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
            'required' => array(
                    array('orion_header_type','equals','classic'),
                    array('classicheader_widgets_switch','equals',true),
            ),
            'compiler' => true,            
        ),

        array(
            'id'       => 'classicheader_widgets_colorstyle_mobile',
            'type'     => 'select',
            'title'    => esc_html__( 'Header Widgets Text Color - Mobile', 'dentalia' ),
            'default'  => '',
            'options'  => array(
                '' => 'Default',
                'mobile-text-dark' => 'Dark Text',
                'mobile-text-light' => 'Light Text',
            ),
            'required' => array(
                    array('orion_header_type','equals','classic'),
                    array('classicheader_widgets_switch','equals',true),
            ),
            'compiler' => true, 
        ),      
        array(
            'id'             => 'classic_header_widgets_spacing',
            'type'           => 'spacing',
            'output'         => array('.header-classic .header-widgets'),
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Header Widget Area Padding', 'dentalia'),
            'subtitle'       => __('Sets spacing for widgets in classic header (in pixels).', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'padding-top'     => '24px', 
                'padding-bottom'  => '12px', 
            ),
            'required' => array(
                    array('orion_header_type','equals','classic'),
                    array('classicheader_widgets_switch','equals',true),
            ) 
        ),

        // HEADER WITH BOTTOM MENU
        array(
            'id'   => 'info_bottommenu_header_settings',
            'type' => 'info',
            'title'    => esc_html__('Header With Bottom Menu', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),                  
            ) 
        ),
        array(
            'id'       => 'header_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Header Background', 'dentalia'),
            'subtitle'  => __('Defines background style for header with bottom menu.', 'dentalia'),
            'transparent' => false,
            'background-attachment' => false,
            'default'  => array(
                'background-color' => '#ffffff',
            ),
            'output'   => array( '.header-with-widgets' ),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),                  
            ) 
        ),
        array(
            'id'        => 'header_hight_with_widgets',
            'type'      => 'slider',
            'title'     => __('Header Height', 'dentalia'),
            'subtitle'  => __('This defines desktop header height.', 'dentalia'),
            'desc'      => __('Min: 48px, Max: 240px.', 'dentalia'),
            "default"   => 96,
            "min"       => 48,
            "step"      => 2,
            "max"       => 240,
            'display_value' => 'text',
            'compiler' => true,
            'required' => array(
                array('orion_header_type','equals','widgetsfluid'),                  
            )         
        ),
        array(
            'id'        => 'navbar_hight_with_widgets',
            'type'      => 'slider',
            'title'     => __('Main Navigation Height', 'dentalia'),
            'desc'      => __('Min: 48px, Max: 180px.', 'dentalia'),
            "default"   => 96,
            "min"       => 48,
            "step"      => 2,
            "max"       => 180,
            'display_value' => 'text',
            'compiler' => true,
            'required' => array(
                array('orion_header_type','equals','widgetsfluid'),                  
            )         
        ),        

        array(
            'id'       => 'header_width_with_widgets',
            'type'     => 'switch',
            'title'    => esc_html__('Full width header', 'dentalia'), 
            'default'  => '0',
            'on'       => 'On',
            'off'       => 'Off',
            'required' => array(
                array('orion_header_type','equals','widgetsfluid'),                  
            )
        ),

        array(
            'id'   => 'info_widgetsfluid_header_logo_settings',
            'type' => 'info',
            'title'    => esc_html__('Header With Widgets Logo settings', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),                  
            ) 
        ),
        array(
            'id'       => 'widgetsfluid_header_mobile_logo_color',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo color on mobile devices', 'dentalia' ),
            'default'  => 'mobile-text-dark',
            'options'  => array(
                'mobile-text-dark' => 'Dark Logo',
                'mobile-text-light' => 'Light Logo',
            ),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),
            ),
        ),
        array(
            'id'        => 'logo_position_hight_with_widgets',
            'type'      => 'slider',
            'title'     => __('Desktop Logo Positioning', 'dentalia'),
            'subtitle'  => __('Defines logo vertical position for header with bottom menu.', 'dentalia'),
            'desc'      => __('Default: 50%', 'dentalia'),
            "default"   => 50,
            "min"       => 10,
            "step"      => 1,
            "max"       => 120,
            'display_value' => 'text',
            'compiler' => true,
            'required' => array(
                array('orion_header_type','equals','widgetsfluid'),                  
            ) 
        ),
        array(
            'id'   => 'info_bottommenu_header_widgets',
            'type' => 'info',
            'title'    => esc_html__('Header Widget Area Settings', 'dentalia'),
            'subtitle'    => esc_html__('For header with bottom menu.', 'dentalia'),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),                  
            ) 
        ),
        array(
            'id'       => 'widgetsfluid_widgets_switch',
            'type'     => 'switch', 
            'title'    => __('Display Header Widget Area', 'dentalia'),
            'subtitle' => __('Enable to display widgets in classic header.', 'dentalia'),
            'default'  => true,
            'required' => array(
                array('orion_header_type','equals','widgetsfluid'),
            ) 
        ),        
        array(
            'id'       => 'header_widgets_width',
            'type'     => 'select',
            'title'    => __('Header Widget Area Width', 'dentalia'), 
            'subtitle' => __('Sets widget area width on desktop.', 'dentalia'),
            'options'  => array(
                'col-md-6' => '1/2',
                'col-md-8' => '2/3',
                'col-md-9' => '3/4',
            ),
            'default'  => 'col-md-8',
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),
                    array('widgetsfluid_widgets_switch','equals',true),
            ) 
        ),
        array(
            'id'             => 'widgetsfluid_header_widgets_spacing',
            'type'           => 'spacing',
            'output'         => array('.header-with-widgets .header-widgets'),
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Header Widget Area Padding', 'dentalia'),
            'subtitle'       => __('Widget top and bottom spacing (in pixels).', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'padding-top'     => '24px', 
                'padding-bottom'  => '12px', 
            ),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),
                    array('widgetsfluid_widgets_switch','equals',true),
            ) 
        ),
        array(
            'id'       => 'header_widgets_colorstyle',
            'type'     => 'select',
            'title'    => esc_html__( 'Header Widgets Text Color and Logo color - desktop', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section. ', 'dentalia' ),
            'default'  => 'text-dark',
            'options'  => array(
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),
                    array('widgetsfluid_widgets_switch','equals',true),
            ),
            'compiler' => true,            
        ),
        array(
            'id'       => 'header_widgets_colorstyle_mobile',
            'type'     => 'select',
            'title'    => esc_html__( 'Mobile Header Widgets Text Color', 'dentalia' ),
            'default'  => '',
            'options'  => array(
                '' => 'Default',
                'mobile-text-dark' => 'Dark Text',
                'mobile-text-light' => 'Light Text',
            ),
            'required' => array(
                    array('orion_header_type','equals','widgetsfluid'),
                    array('widgetsfluid_widgets_switch','equals',true),
            ),
            'compiler' => true, 
        ), 
    )
)); 

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Navigation Settings', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(
        array(
            'id'   => 'info_navstyle_settings',
            'type' => 'info',
            'title'    => esc_html__('Main Navigation Style', 'dentalia'),
        ),
        array(
            'id'       => 'navigation_links_color_style',
            'type'     => 'select',
            'title'    => __('Navigation Colors', 'dentalia'), 
            'subtitle' => __('Defines the item colors of main navigation.', 'dentalia'),
            'options'  => array(
                'nav-dark'  => 'Light text on dark background',
                'nav-light' => 'Dark text on light background',
            ),
            'default'  => 'nav-light',
        ), 
        array(
            'id'       => 'navigation_style',
            'type'     => 'select',
            'title'    => __('Navigation style', 'dentalia'),
            'compiler' => true,
            'options'  => array(
                'nav-style-3' => 'Simple',
                'nav-style-2' => 'Button',
                'nav-style-1' => 'Fill',
            ),
            'default'  => 'nav-style-2',
        ),
        array(
            'id'       => 'nav_item_padding',
            'type'     => 'dimensions',
            'title'    => __('Navigation item padding', 'dentalia'),
            'desc'     => esc_html__('Set spacing between menu items on desktop in pixels. It is recommended to keep this below 30px. ', 'dentalia'),
            'default'  => array(
                'Width'   => '11',
            ),
            'units' => false,
            'height' => false,
            'compiler' => true, 
        ),
        array(
            'id'   => 'info_navstypo_settings',
            'type' => 'info',
            'title'    => esc_html__('Main Navigation Fonts', 'dentalia'),
        ), 
         array(
            'id'          => 'first-lvl-menu',
            'type'        => 'typography', 
            'title'       => esc_html__('1st Level Menu', 'dentalia'), 
            'font-backup' => false,
            'text-align' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'line-height' => false,
            'color' => false,
            'output'      => array('.site-navigation .nav-menu > li > a, .nav-menu > ul > li > a'),
            'units'       =>'px',
            'default'     => array(
                'font-size'   => '12px',
                'text-transform' => 'uppercase',
                'letter-spacing' => '1px',
            ),
            'compiler' => true,
        ),

        array(
            'id'          => 'second-lvl-menu',
            'type'        => 'typography', 
            'title'       => esc_html__('Submenu', 'dentalia'), 
            'font-backup' => false,
            'text-align' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'line-height' => false,
            'color' => false,
            'output'      => array('.nav-menu > li > ul.sub-menu .menu-item > a, .nav-menu > li > ul.sub-menu .menu-item > span'),
            'units'       =>'px',
            'default'     => array(
                'font-size'   => '12px', 
                'text-transform' => 'uppercase',
                'letter-spacing' => '1px',

            )
        ),                    
        array(
            'id'   => 'info_megamenu_settings',
            'type' => 'info',
            'title'    => esc_html__('Megamenu settings', 'dentalia'),
        ),
        array(
            'id'       => 'orion_megamenu',
            'type'     => 'switch', 
            'title'    => __('Enable megamenu', 'dentalia'),
            'subtitle' => __('Turn this on, to enable advanced menu features.', 'dentalia'),
            'default'  => true,
        ),
        array(
            'id'       => 'mega_menu_background',
            'type'     => 'background',
            'output'   => array( 'header .main-nav-wrap .nav-menu li.orion-megamenu > .sub-menu' ),
            'title'    => esc_html__( 'MegaMenu background', 'dentalia' ),
            'required' => array(
                    array('orion_megamenu','equals', true),                  
            ),
            'default'  => array(
                'background-color' => '#2B354B',
            ),            
            'compiler' => true, 
        ),
       array(
            'id'       => 'mega_menu_borders',
            'type'     => 'select',
            'title'    => __('MegaMenu link separator color', 'dentalia'), 
            'options'  => array(
                'mega-light-borders'  => 'Light Menu Separators',
                'mega-dark-borders'  => 'Dark Menu Separators',
                'mega-no-borders'  => 'No separators',
            ),
            'default'  => 'mega-light-borders',
            'required' => array(
                    array('orion_megamenu','equals', true),                  
            ),            
            'compiler' => true,         
        ),                   

        array(
            'id'   => 'info_navsearch_settings',
            'type' => 'info',
            'title'    => esc_html__('Search Option', 'dentalia'),
        ), 
        array(
            'id'        => 'search_icon',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display search in main menu:', 'dentalia'), 
            'subtitle'  => esc_html__('Check to display search in menu', 'dentalia'),
            'description'  => esc_html__('Make sure you have selected a primary menu.', 'dentalia'),
            'default'   => '1',
            'compiler' => true,
        ),
        array(        
            'id'        => 'site_search_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Site search background', 'dentalia'),
            'default'   => '#2B354B',
            'output'    => array(
                'background-color' => '.site-search',
            ),
            'transparent' => false,
            'required' => array(
                    array('search_icon','equals',true),                  
            ),            
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Navigation Colors', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(
 
         array(
            'id'   => 'info_lightnavigation_colors_settings',
            'type' => 'info',
            'title'    => esc_html__('Light Navigation Colors', 'dentalia'),
            'description'  => esc_html__('Dark text on light background.', 'dentalia'),
        ),
        array(
            'id'        => 'nav_menu_bg_color_nav_light',
            'type'      => 'color',
            'title'     => esc_html__('Navigation background', 'dentalia'),
            'default'   => '',
            'output'    => array(
                 'background-color' => 'header.site-header.nav-light .nav-container',
            ),
            'transparent' => false,
            'compiler' => true,      
        ),

        array(
            'id'       => 'first_lvl_menu_colors_nav_light',
            'type'     => 'link_color',
            'title'    => esc_html__('1st Level Text Colors', 'dentalia'),
            'default'  => array(
                'regular'  => '#212121', 
                'hover'    => '#212121',
                'active'   => '#ffffff', 
            ),
            'compiler' => true,           
        ), 

        array(
            'id'       => 'first_lvl_menu_bg_nav_light',
            'type'     => 'link_color',
            'title'    => esc_html__('1st Level Text Background Colors', 'dentalia'),
            'compiler' => true,       
        ), 
        array(
            'id'       => 'submenu_colors_nav_light',
            'type'     => 'link_color',
            'title'    => esc_html__('Submenu Text Colors', 'dentalia'),
            'default'  => array(
                'regular'  => '#ffffff', 
            ),
            'compiler' => true,         
        ),
        array(
            'id'        => 'submenu_background_nav_light',
            'type'      => 'color_rgba',
            'title'    => esc_html__('Submenu Background Color', 'dentalia'),
            'subtitle' => esc_html__('Pick a background color for the submenu.', 'dentalia'),
            'options'       => array(
                'clickout_fires_change'     => true,
            ),
            'compiler' => true,       
        ),
        array(
            'id'        => 'submenu_border_nav_light',
            'type'      => 'color_rgba',
            'title'    => esc_html__('Submenu links border color (desktop)', 'dentalia'),
            'options'       => array(
                'clickout_fires_change'     => true,
            ),            
            'compiler' => true,
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 0.2
            ),
        ),
        array(
            'id'   => 'info_darknavigation_colors_settings',
            'type' => 'info',
            'title'    => esc_html__('Dark Navigation Colors', 'dentalia'),
            'description'  => esc_html__('Light text on dark background.', 'dentalia'),
        ),       
        array(
            'id'       => 'nav_menu_bg_color_nav_dark',
            'type'     => 'color',
            'title'    => esc_html__('Navigation bar background color', 'dentalia'),
            'transparent' => true,
            'output'    => array(
                'background-color' => 'header.site-header.nav-dark .nav-container',
            ),
            'default' => '',
            'compiler' => true,
        ), 
        array(
            'id'       => 'first_lvl_menu_colors_nav_dark',
            'type'     => 'link_color',
            'title'    => esc_html__('1st Level Text Colors', 'dentalia'),
            'compiler' => true,           
        ), 
        array(
            'id'       => 'first_lvl_menu_bg_nav_dark',
            'type'     => 'link_color',
            'title'    => esc_html__('1st Level Text Background Colors', 'dentalia'),
            'compiler' => true,
        ), 
        array(
            'id'       => 'submenu_colors_nav_dark',
            'type'     => 'link_color',
            'title'    => esc_html__('Submenu Text Colors', 'dentalia'),
            'default'  => array(
                'regular'  => '#212121', 
            ),
            'compiler' => true,        
        ),
        array(
            'id'        => 'submenu_background_nav_dark',
            'type'      => 'color_rgba',
            'title'    => esc_html__('Submenu Background Color', 'dentalia'),
            'subtitle' => esc_html__('Pick a background color for the submenu.', 'dentalia'),
            'default'   => array(
                'color'     => '#fff',
                'alpha'     => 1
            ),
            'options'       => array(
                'clickout_fires_change'     => true,
            ),            
            'compiler' => true,                     
        ),
        array(
            'id'        => 'submenu_border_nav_dark',
            'type'      => 'color_rgba',
            'title'    => esc_html__('Submenu links border color (desktop)', 'dentalia'),
            'options'       => array(
                'clickout_fires_change'     => true,
            ),            
            'default'   => array(
                'color'     => '#000',
                'alpha'     => 0.05
            ),     
            'compiler' => true,       
        ),
        array(
            'id'   => 'info_mobileheader_settings',
            'type' => 'info',
            'title'    => esc_html__('Mobile Menu Color Settings', 'dentalia'),
        ), 
        array(
            'id'       => 'mobile_menu_background',
            'type'     => 'color',
            'title'    => esc_html__( 'Mobile Menu Background', 'dentalia' ),
            'transparent' => false,
            'compiler' => true,
            'default' => '',
        ),
        array(
            'id'       => 'mobile_menu_link_colors',
            'type'     => 'link_color',
            'title'    => esc_html__('Mobile menu item colors', 'dentalia'),
            'subtitle' => esc_html__('Colors for links in mobile menu', 'dentalia'),
            'hover'     => false,
            'compiler' => true,
        ),  
    )
));

Redux::setSection( $opt_name, array(
    'id' => 'orion_cta_button',
    'title'  => esc_html__( 'Call to Action', 'dentalia' ),
    'subsection' => true,
    'fields' => array(
                array(
            'id'   => 'info_cta_button_settings',
            'type' => 'info',
            'title'    => esc_html__('Call to Action Button', 'dentalia'),
        ),               
        array(
            'id'        => 'display_header_button',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display button in main menu:', 'dentalia'), 
            'subtitle'  => esc_html__('Check to display button in menu', 'dentalia'),
            'description'  => esc_html__('A primary menu must be selected in Appearance -> Menus', 'dentalia'),
            'default'   => '0',
            'compiler' => true,
        ),
        array(
            'id'       => 'button_link_url',
            'type'     => 'text',
            'title'    => __('Buttton link', 'dentalia'),
            'subtitle' => __('Add Button link (url).', 'dentalia'),
            'default'  => '#',
            'required' => array(
                array('display_header_button','equals',true),                    
                ),            
        ),
        array(
            'id'       => 'button_text',
            'type'     => 'text',
            'title'    => __('Buttton Text', 'dentalia'),
            'subtitle' => __('Add Button Text', 'dentalia'),
            'default'  => 'Button',
            'required' => array(
                array('display_header_button','equals',true),                    
                ),            
        ),
        array(
            'id'       => 'header_button_color',
            'type'     => 'select',
            'title'    => __('Button Color', 'dentalia'), 
            'subtitle' => __('Set the button color.', 'dentalia'),
            'options'  => array(
                '' => esc_html__( 'Default', 'dentalia' ),
                'btn-c1' => esc_html__( 'Main Theme Color', 'dentalia' ),
                'btn-c2' => esc_html__( 'Secondary Theme Color', 'dentalia' ),
                'btn-c3' => esc_html__( 'Tertiary Theme Color', 'dentalia' ),
                'btn-blue' => esc_html__( 'Blue', 'dentalia' ),
                'btn-green' => esc_html__( 'Green', 'dentalia' ),
                'btn-pink' => esc_html__( 'Pink', 'dentalia' ),
                'btn-orange' => esc_html__( 'Orange', 'dentalia' ),
                'btn-black' => esc_html__( 'Black', 'dentalia' ),
                'btn-white' => esc_html__( 'White', 'dentalia' ),
            ),
            'default'  => 'btn-c2', 
            'required' => array(
                array('display_header_button','equals',true),                    
                ),
        ),
        array(
            'id'       => 'header_button_rounding',
            'type'     => 'select',
            'title'    => __('Button Rounding', 'dentalia'), 

            'options' => array(
                '' => esc_html__( 'Slightly Rounded', 'dentalia' ),
                'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
            ),            
            'default'  => '', 
            'required' => array(
                array('display_header_button','equals',true),                    
                ),
        ),
        array(
            'id'       => 'last_tab_size',
            'type'     => 'select',
            'title'    => __('Size', 'dentalia'), 
            'subtitle' => __('Set the size of search and button in main navigation.', 'dentalia'),
            'options'  => array(
                's36'  => 'Small',
                's48'  => 'Medium',
                's60' => 'Large',
            ),
            'default'  => 's36',
            'required' => array(
                array('display_header_button','equals',true),                    
                ),                     
        ),
        array(
            'id'        => 'header_button_new_tab',
            'type'      => 'checkbox',
            'title'     => esc_html__('Open button in a new tab', 'dentalia'),
            'default'   => '0',
            'required' => array(
                array('display_header_button','equals',true),                    
                ),              
        ),
    ),
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Sticky Header', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(

        array(
            'id'   => 'info_navigation_sticky_settings',
            'type' => 'info',
            'title'    => esc_html__('Sticky Header', 'dentalia'),
        ),
        array(
            'id'        => 'is_header_sticky',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display sticky header', 'dentalia'), 
            'subtitle'  => esc_html__('Check if you want header to stay visible when scrolling.', 'dentalia'),
            'default'   => '0'// 1 = on | 0 = off
        ),
        array(
            'id'       => 'sticky_header_background',
            'type'     => 'background',
            'output'   => array( '.stickymenu .nav-container' ),
            'title'    => esc_html__( 'Sticky Header background', 'dentalia' ),
            'default'  => array(
                'background-color' => '#fff',
            ),
            'required' => array(
                    array('is_header_sticky','equals','1'),                  
            ) 
        ),
        array(
            'id'       => 'sticky_navigation_links_color_style',
            'type'     => 'select',
            'title'    => __('Navigation Colors', 'dentalia'), 
            'subtitle' => __('Defines the item colors of sticky navigation.', 'dentalia'),
            'options'  => array(
                ''  => 'Default',
                'nav-dark'  => 'Light text on dark background',
                'nav-light' => 'Dark text on light background',
            ),
            'default'  => '',
            'required' => array(
                    array('is_header_sticky','equals','1'),                  
            )             
        ),          
        array(
            'id'       => 'sticky_navigation_style',
            'type'     => 'select',
            'title'    => __('Navigation style', 'dentalia'),
            'options'  => array(
                ''  => 'Default',
                'nav-style-1' => 'Fill',
                'nav-style-2' => 'Button',
            ),
            'default'  => '',
            'required' => array(
                    array('is_header_sticky','equals','1'),                  
            ),           
        ),         
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Top Bar Settings', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(
        array(
            'id'   => 'info_top_bar_settings',
            'type' => 'info',
            'title'    => esc_html__('Top Bar', 'dentalia'),
        ),
        array(
            'id'        => 'top_bar_onoff',
            'type'      => 'switch',
            'title'     => esc_html__('Display Top Bar', 'dentalia'), 
            'subtitle'  => esc_html__('Place checkmark, if you want your site to have a top bar.', 'dentalia'),
            'default'   => '0'// 1 = on | 0 = off
        ),
        array(
            'id'       => 'topbar_text_color',
            'type'     => 'select',
            'title'    => esc_html__( 'Top Bar Text Color', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section.', 'dentalia' ),
            'default'  => 'text-dark',
            'options'  => array(                
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ),
        array(
            'id'       => 'topbar_background',
            'type'     => 'color',
            'title'    => esc_html__( 'Top bar background color', 'dentalia' ),
            'transparent' => false,
            'default'  => '#ffffff',
            'output'   => array( 
                'background-color' =>  '.top-bar',
                'border-top-color' => '.top-bar-toggle',
            ),
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ), 
        array(
            'id'       => 'topbar_divider_left',
            'type'     => 'checkbox',
            'title'    => esc_html__('Left top-bar dividers', 'dentalia'), 
            'default'  => '1',// 1 = on | 0 = off
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ),
        array(
            'id'       => 'topbar_divider_right',
            'type'     => 'checkbox',
            'title'    => esc_html__('Right top-bar dividers', 'dentalia'), 
            'default'  => '1',// 1 = on | 0 = off
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ),        
        array(
            'id'        => 'topbar_border_color',
            'type'      => 'color_rgba',
            'title'     => esc_html__('Top bar border color', 'dentalia'),
            'default'   => array(
                'color'     => '#f2f2f2',
                'alpha'     => 1
            ),
            'options'       => array(
                'clickout_fires_change'     => true,
            ),            
            'output'    => array(
                'border-color' => '.top-bar, .top-bar.left-right .add-dividers .section, .top-bar.equal .top-bar-wrap',
            ),
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),             
        ),  
        array(
            'id'       => 'is_top_bar_fluid',
            'type'     => 'checkbox',
            'title'    => esc_html__('Make top bar fullwidth', 'dentalia'), 
            'subtitle' => esc_html__('If not set, it defaults to standard container.', 'dentalia'),
            'default'  => '0',// 1 = on | 0 = off
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ),
        array(
            'id'       => 'is_top_bar_always_open',
            'type'     => 'checkbox',
            'title'    => esc_html__('Make top bar always visible on mobile', 'dentalia'), 
            'default'  => '0',// 1 = on | 0 = off
            'required' => array(
                array('top_bar_onoff','equals','1'),                    
            ),
        ),          
    ),
));


Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Page Title', 'dentalia'),
    'icon'      => 'fa fa-header',
    'fields'    => array(
        array(
            'id'   => 'info_page_title_settings',
            'type' => 'info',
            'title'    => esc_html__('Choose Layout', 'dentalia'),
        ),
        array(
            'id'       => 'post_heading_type',
            'type'     => 'image_select',
            'title'    => esc_html__('Page Title Layout', 'dentalia'), 
            'subtitle' => esc_html__('Choose a default page title layout for your website. Customize the style under individual sections.', 'dentalia'),
            'options'  => array(
                    'classic'      => array(
                        'alt'   => 'classic', 
                        'img'   => get_template_directory_uri().'/framework/admin/img/heading-classic.png'
                    ),
                    'centered'      => array(
                        'alt'   => 'centered', 
                        'img'   => get_template_directory_uri().'/framework/admin/img/heading-centered.png'
                    ),
                    'left'      => array(
                        'alt'   => 'leftright', 
                        'img'   => get_template_directory_uri().'/framework/admin/img/heading-left.png'
                    ),
            ),
            'default' => 'classic'
        ),
        array(
            'id'        => 'title_single_post_onoff',
            'type'      => 'checkbox',
            'title'     => esc_html__('Enable Page Titles on posts?', 'dentalia'), 
            'default'   => '0', // 1 = on | 0 = off
        ),    
        
        array(
            'id'       => 'default_overlay',
            'type'     => 'select',
            'title'    => __( 'Default heading overlay', 'dentalia' ),
            'subtitle'    => __( 'Set default overlay. You can override this setting on each page/post.' ),
            'default'  => 'classic',
            'options'  => array(
                'none' => esc_html__( 'None', 'dentalia' ),
                'overlay-dark' => esc_html__( 'Dark Overlay', 'dentalia' ),
                'overlay-light' => esc_html__( 'Light Overlay', 'dentalia' ),
                'overlay-c1' => esc_html__( 'Main theme color', 'dentalia' ),
                'overlay-c2' => esc_html__( 'Secondary theme color', 'dentalia' ),
                'overlay-c3' => esc_html__( 'Tertiary theme color', 'dentalia' ),
                'overlay-c2-c1' => esc_html__( 'Gradient 1', 'dentalia' ),                  
                'overlay-c1-c2' => esc_html__( 'Gradient 2', 'dentalia' ),
                'overlay-c1-t' => esc_html__( 'Primary to Transparent', 'dentalia' ),
                'overlay-c2-t' => esc_html__( 'Secondary to Transparent', 'dentalia' ),
                'overlay-c3-t' => esc_html__( 'Tertiary to Transparent', 'dentalia' ),  
            ),
        ),         
    ),     
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Classic', 'dentalia'),
    'subsection'      => true,
    'fields'    => array( 
        array(
            'id'   => 'info_classicheading_settings',
            'type' => 'info',
            'title'    => esc_html__('Classic Page Title Settings', 'dentalia'),
        ),
        array(
            'id'       => 'post-heading-background-classic',
            'type'     => 'background',
            'output'   => array( '.page-heading.heading-classic' ),
            'title'    => esc_html__( 'Default Page Title Background', 'dentalia' ),
            'subtitle' => esc_html__( 'Defines style for classic page titles. You can customize this on individual pages and posts.', 'dentalia' ),
            'default'  => array(
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
                'background-position'=> "center center",
            ),
        ),
        array(
            'id'       => 'post-heading-padding-classic',
            'type'     => 'spacing',
            'mode'     => 'padding',
            'units'    => 'px',
            'output'   => array( '.page-heading.heading-classic' ),
            'title'    => esc_html__( 'Page Title Padding', 'dentalia' ),
            'subtitle' => esc_html__( 'Set in pixels.', 'dentalia' ),
            'left' => false,
            'right' => false,
                'default'        => array(
                'padding-top'     => '24px', 
                'padding-bottom'  => '24px', 
            ),               
        ),  
        array(
            'id'        => 'heading-onoff-classic',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display heading on Classic page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off
        ),
        array(
            'id'          => 'post-heading-title-classic',
            'type'        => 'typography', 
            'title'       => esc_html__('Page Title Font', 'dentalia'),
            'subtitle'       => esc_html__('Defines classic page title typography.', 'dentalia'),  
            'font-backup' => false,
            'text-align' => false,
            'google'      => true,
            'color' => true,
            'output'      => array('.page-heading.heading-classic h1.entry-title'),
            'units'       =>'px',
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'subsets' => true,  
            'default'     => array(
                'color'       => '#fff', 
                'font-weight'  => '400', 
                'font-family' => 'Montserrat', 
                'font-size'   => '21px', 
                'line-height' => '24px',
                'letter-spacing' => '1px',
                'text-transform' => 'capitalize',
            ),
            'required' => array(
                    array('heading-onoff-classic','equals','1')                    
            ), 
        ),
        array(
            'id'        => 'crumbs-onoff-classic',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display breadcrumbs on classic page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off
        ),     
        array(
            'id'       => 'crumbs-font-classic',
            'type'     => 'typography',
            'title'    => esc_html__('Breadcrumbs Style', 'dentalia'),
            'subtitle' => esc_html__('Defines breadcrumbs styles for classic page titles.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => false,
            'font-style' => true,
            'text-align' => false,
            'color' => true,
            'letter-spacing' => true,
            'output' => array('.page-heading.heading-classic .breadcrumbs, .page-heading.heading-classic .breadcrumbs ol li a, .page-heading.heading-classic .breadcrumbs ol li:not(:last-child):after, .page-heading.heading-classic .breadcrumbs ol li:after, .breadcrumbs span'),
            'default' => array(
                'font-weight' => '400',
                // 'font-family' => 'Montserrat',
                'font-size' => '12px',
                'color' => '#ffffff',
                'letter-spacing' => '1px',
            ),
            'required' => array(
                    array('crumbs-onoff-classic','equals','1')                    
            ) 
        ), 
    ),                               
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Centered', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(
        array(
            'id'   => 'info_centerheading_settings',
            'type' => 'info',
            'title'    => esc_html__('Centered Page Title Settings', 'dentalia'),
        ),          
        array(
            'id'       => 'post-heading-background-centered',
            'type'     => 'background',
            'output'   => array( '.page-heading.heading-centered' ),
            'title'    => esc_html__( 'Default Page Title Background', 'dentalia' ),
            'subtitle' => esc_html__( 'Defines style for centered page titles. You can customize this on individual pages and posts.', 'dentalia' ),
            'default'  => array(
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
                'background-position'=> "center center",
            ),
        ),
        array(
            'id'       => 'post-heading-padding-centered',
            'type'     => 'spacing',
            'mode'     => 'padding',
            'units'    => 'px',
            'output'   => array( '.page-heading.heading-centered' ),
            'title'    => esc_html__( 'Page Title Padding', 'dentalia' ),
            'subtitle' => esc_html__( 'Set in pixels.', 'dentalia' ),
            'left' => false,
            'right' => false,
                'default'        => array(
                'padding-top'     => '72px', 
                'padding-bottom'  => '60px', 

            ),               
        ),
        array(
            'id'        => 'heading-onoff-centered',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display heading on Centered page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off
        ),
        array(
            'id'          => 'post-heading-title-centered',
            'type'        => 'typography', 
            'title'       => esc_html__('Page Title Font', 'dentalia'),
            'subtitle'       => esc_html__('Defines centered page title typography.', 'dentalia'),  
            'font-backup' => false,
            'text-align' => false,
            'google'      => true,
            'color' => true,
            'output'      => array('.page-heading.heading-centered h1.entry-title'),
            'units'       =>'px',
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'subsets' => true,  
            'default'     => array(
                'color'       => '#fff', 
                'font-weight'  => '400', 
                'font-family' => 'Montserrat', 
                'font-size'   => '31px', 
                'line-height' => '36px',
                'letter-spacing' => '', 
                'text-transform' => 'capitalize',
            ),
            'required' => array(
                    array('heading-onoff-centered','equals','1')                    
            ), 
        ),  
        array(
            'id'        => 'crumbs-onoff-centered',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display breadcrumbs on centered page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off
        ),   
        array(
            'id'       => 'crumbs-font-centered',
            'type'     => 'typography',
            'title'    => esc_html__('Breadcrumbs Style', 'dentalia'),
            'subtitle' => esc_html__('Defines breadcrumbs styles for centered page titles.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => false,
            'font-style' => true,
            'text-align' => false,
            'color' => true,
            'letter-spacing' => true,
            'output' => array('.page-heading.heading-centered .breadcrumbs, .page-heading.heading-centered .breadcrumbs ol li a, .page-heading.heading-centered .breadcrumbs ol li:not(:last-child):after,.page-heading.heading-centered .breadcrumbs ol li:after, .page-heading.heading-centered .breadcrumbs span'),
            'default' => array(
                'font-weight' => '400',
                // 'font-family' => 'Montserrat',
                'font-size' => '12px',
                'color' => '#ffffff',
                'letter-spacing' => '1px',
            ),
            'required' => array(
                    array('crumbs-onoff-centered','equals','1')                    
            ) 
        ), 
    ),                                     
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Left Aligned', 'dentalia'),
    'subsection'      => true,
    'fields'    => array(
        array(
            'id'   => 'info_leftheading_settings',
            'type' => 'info',
            'title'    => esc_html__('Left Aligned Page Title Settings', 'dentalia'),
        ),         
        array(
            'id'       => 'post-heading-background-left',
            'type'     => 'background',
            'output'   => array( '.page-heading.heading-left' ),
            'title'    => esc_html__( 'Default Page Title Background', 'dentalia' ),
            'subtitle' => esc_html__( 'You can customize this on individual pages and posts.', 'dentalia' ),
            'default'  => array(
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
                'background-position'=> "center center",
            ),
        ),
        array(
            'id'       => 'post-heading-padding-left',
            'type'     => 'spacing',
            'mode'     => 'padding',
            'units'    => 'px',
            'output'   => array( '.page-heading.heading-left' ),
            'title'    => esc_html__( 'Page Title Padding ', 'dentalia' ),
            'subtitle'       => esc_html__('Set in pixels.', 'dentalia'), 
            'left' => false,
            'right' => false,
                'default'        => array(
                'padding-top'     => '120px', 
                'padding-bottom'  => '120px', 
            ),             
        ), 
        array(
            'id'        => 'heading-onoff-left',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display heading on Left Aligned page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off
        ),
        array(
            'id'          => 'post-heading-title-left',
            'type'        => 'typography', 
            'title'       => esc_html__('Page Title Font', 'dentalia'),
            'subtitle'       => esc_html__('Defines left aligned page title typography.', 'dentalia'), 
            'font-backup' => false,
            'text-align' => false,
            'google'      => true,
            'color' => true,
            'output'      => array('.page-heading.heading-left h1.entry-title'),
            'units'       =>'px',
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'subsets' => true,  
            'default'     => array(
                'color'       => '#fff', 
                'font-weight'  => '400', 
                'font-family' => 'Montserrat', 
                'font-size'   => '44px', 
                'line-height' => '48px',
                'letter-spacing' => '', 
                'text-transform' => 'capitalize',
            ),
            'required' => array(
                    array('heading-onoff-left','equals','1')                    
            ), 
        ), 
        array(
            'id'        => 'crumbs-onoff-left',
            'type'      => 'checkbox',
            'title'     => esc_html__('Display breadcrumbs on left aligned page titles?', 'dentalia'), 
            'default'   => '1', // 1 = on | 0 = off 
        ),                                            
        array(
            'id'       => 'crumbs-font-left',
            'type'     => 'typography',
            'title'    => esc_html__('Breadcrumbs Style', 'dentalia'),
            'subtitle' => esc_html__('Defines styles for breadcrumbs.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => false,
            'font-style' => true,
            'text-align' => false,
            'color' => true,
            'letter-spacing' => true,
            'output' => array('.page-heading.heading-left .breadcrumbs, .page-heading.heading-left .breadcrumbs ol li a, .page-heading.heading-left .breadcrumbs ol li:not(:last-child):after,.page-heading.heading-left .breadcrumbs ol li:after, .page-heading.heading-left .breadcrumbs span'),
            'default' => array(
                'font-weight' => '400',
                // 'font-family' => 'Montserrat',
                'font-size' => '12px',
                'color' => '#ffffff',
                'letter-spacing' => '1px',
            ),
            'required' => array(
                    array('crumbs-onoff-left','equals','1')                    
            ) 
        ),         
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Blog Settings', 'dentalia'),
    'icon'      => 'fa fa-files-o',
    'fields'    => array(
        array(
            'id'   => 'info_blogsettings_settings',
            'type' => 'info',
            'title'    => esc_html__('Blog & Archive Pages', 'dentalia'),
        ), 
         array(
            'id'       => 'blog_layout',
            'type'     => 'select',
            'title'    => __( 'Default Blog Layout', 'dentalia' ),
            'subtitle'    => __( 'Choose a default layout for blog, category and archive pages.' ),
            'default'  => 'classic',
            'options'  => array(
                'classic' => 'Classic',
                'classic-full' => 'Classic full content',
                'grid' => 'Grid 2 in a row',
                'grid3' => 'Grid 3 in a row',
            ),
        ), 
        array(
            'id'        => 'archive_blog_sidebar_left_defaults',
            'type'     => 'select',
            'title'     => esc_html__('Left sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a default sidebar to be displayed on blog and archive pages. Leave both fields empty for a full-width layout.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
         array(
            'id'        => 'archive_blog_sidebar_right_defaults',
            'type'     => 'select',
            'title'     => esc_html__('Right sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a default sidebar to be displayed on blog and archive pages. Leave both fields empty for a full-width layout.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
            'default' => 'sidebar-default',
        ),
        array(
            'id'   => 'info_blogposts_settings',
            'type' => 'info',
            'title'    => esc_html__('Single Post Settings', 'dentalia'),
        ),              
        array(
            'id'        => 'post-sidebar-left-defauts',
            'type'     => 'select',
            'title'     => esc_html__('Left sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a default sidebar to be displayed on your posts. Settings can be overwritten on individual posts. Leave both fields empty for a full-width layout.', 'dentalia'),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia'),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
         array(
            'id'        => 'post-sidebar-right-defauts',
            'type'     => 'select',
            'title'     => esc_html__('Right sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a default sidebar to be displayed on your posts. Settings can be overwritten on individual posts. Leave both fields empty for a full-width layout.', 'dentalia'),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia'),
            'default' => 'sidebar-default',
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
        array(
            'id'       => 'share-icons',
            'type'     => 'sortable',
            'mode'     => 'checkbox', // checkbox or text
            'title'    => __( 'Share Icons', 'dentalia' ),
            'subtitle' => __( 'Which share icons do you want to display? You can reorder them, if you want.', 'dentalia' ),
            'options'  => array(
                'facebook' => 'Facebook',
                'linkedin' => 'Linkedin',
                'twitter' => 'Twitter',
                'google' => 'Google +',
            ),
            'default'  => array(
                'facebook' => true,
                'twitter' => true,
                'google' => true,
                'linkedin' => true,
            )
        ),  
      
    )
));
Redux::setSection( $opt_name, array(
    'id' => 'woocommerce',
    'title'  => esc_html__( 'Shop', 'dentalia' ),
    'icon'   => 'fa fa-shopping-cart',
    'fields' => array(
        array(
            'id'   => 'info_shop_settings',
            'type' => 'info',
            'title'    => esc_html__('Shop Settings', 'dentalia'),
            'desc'   => esc_html__( 'Only applicable if WooCommerce is installed.', 'dentalia' ),
        ),
        array(
            'id'       => 'woo_products_per_page',
            'type'     => 'text',
            'title'    => esc_html__('Number of products per page ', 'dentalia'),
            'desc'     => esc_html__('Accepts numbers.', 'dentalia'),
            'validate' => 'numeric',
            'default'  => 12,
        ),
        array(
            'id'   => 'info_shop_sidebars',
            'type' => 'info',
            'title'    => esc_html__('Shop Sidebar', 'dentalia'),
            'desc'   => esc_html__( 'Only applicable if WooCommerce is installed.', 'dentalia' ),
        ),
        array(
            'id'        => 'woo_sidebar_left',
            'type'     => 'select',
            'title'     => esc_html__('Left sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a sidebar to be displayed on a shop pages and product categories. Leave both fields empty for a full-width layout.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
        array(
            'id'        => 'woo_sidebar_right',
            'type'     => 'select',
            'title'     => esc_html__('Right sidebar', 'dentalia'),
            'subtitle'       => esc_html__( 'Choose a sidebar to be displayed on a shop pages and product categories. Leave both fields empty for a full-width layout.', 'dentalia' ),
            'desc'       => esc_html__( 'Leave blank for none.', 'dentalia' ),
            'show_empty' => 'true',
            'data'  => 'sidebar',
        ),
        array(
            'id'   => 'info_minicart_settings',
            'type' => 'info',
            'title'    => esc_html__('Cart Settings', 'dentalia'),
            'desc'   => esc_html__( 'Only applicable if WooCommerce is installed.', 'dentalia' ),
        ),
        array(
            'id'       => 'woo_cart',
            'type'     => 'select',
            'title'     => esc_html__('Display the cart in main menu:', 'dentalia'), 
            'subtitle'  => esc_html__('WooCommerce must be installed, for this option to work', 'dentalia'),            
            'default'  => '1',
            'options'  => array(
                '0' => 'Do not display',
                '1' => 'Always display',
                'hidden-md-lg' => 'Display on mobile',
            ),
            'desc'   => esc_html__( '"Display on mobile" option is especially useful if a cart widget is placed in top-bar.', 'dentalia' ),            
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Footer', 'dentalia'),
    'icon'      => 'el-icon-inbox',
    'fields'    => array(
        array(
            'id'   => 'info_footer_settings',
            'type' => 'info',
            'title'    => esc_html__('Footer settings', 'dentalia'),
        ),
        array(
            'id'       => 'uncoveringfooter_switch',
            'type'     => 'switch', 
            'title'    => __('Uncovering Footer', 'dentalia'),
            'subtitle' => __('Makes footer gradually appear on scroll.', 'dentalia'),
            'default'  => false,
        ),
        array(
            'id'       => 'mainfooter-sidebars',
            'type'     => 'select',
            'title'    => esc_html__( 'Footer Columns', 'dentalia' ),
            'subtitle'    => __( 'Sets number of widget areas in footer.', 'dentalia' ),
            'default'  => '3',
            'options'  => array(
                '1' => '1 column',
                '2' => '2 columns',
                '3' => '3 columns',
                '4' => '4 columns'
            ),
        ),
        array(
            'id'       => 'footer_text_colors',
            'type'     => 'select',
            'title'    => esc_html__( 'Footer Text Color', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section.', 'dentalia' ),
            'default'  => 'auto',
            'options'  => array(
                'auto' => 'Auto',                
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
        ),
        array(         
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => esc_html__('Footer Background', 'dentalia'), 
            'subtitle' => esc_html__('Defines the style of footer background.', 'dentalia'),
            'transparent' => false,
            'background-attachment' => false,
            'output'         => array('.site-footer'),
        ),
        array(
            'id'             => 'footer_spacing',
            'type'           => 'spacing',
            'output'         => array('.site-footer .main-footer'),
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Footer Padding', 'dentalia'),
            'subtitle'       => __('Sets spacing for footer widgets (in pixels).', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'padding-top'     => '60px', 
                'padding-bottom'  => '60px', 
            )
        ),
        array(
            'id'   => 'info_prefooter_settings',
            'type' => 'info',
            'title'    => esc_html__('Prefooter Settings', 'dentalia'),
        ),
        array(
            'id'       => 'prefooter_switch',
            'type'     => 'switch', 
            'title'    => __('Show Prefooter', 'dentalia'),
            'subtitle' => __('Enable to show prefooter area.', 'dentalia'),
            'default'  => false,
        ),
        array(
            'id'       => 'prefooter-sidebars',
            'type'     => 'select',
            'title'    => __( 'Prefooter Columns', 'dentalia' ),
            'subtitle'    => __( 'Sets number of widget areas in prefooter.', 'dentalia' ),
            'default'  => '1',
            'options'  => array(
                '1' => '1 column',
                '2' => '2 columns',
                '3' => '3 columns',
                '4' => '4 columns'
            ),
            'required' => array(
                array('prefooter_switch','equals','1'),                    
            ),
        ),      
        array(
            'id'       => 'prefooter_text_colors',
            'type'     => 'select',
            'title'    => esc_html__( 'Prefooter Text Color', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section.', 'dentalia' ),
            'default'  => '1',
            'options'  => array(
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
            'required' => array(
                array('prefooter_switch','equals','1'),                    
            ),
        ),
        array(         
            'id'       => 'prefooter_background',
            'type'     => 'background',
            'title'    => esc_html__('Prefooter Background', 'dentalia'), 
            'subtitle' => esc_html__('Defines the style of prefooter background.', 'dentalia'),
            'transparent' => false,
            'background-attachment' => false,
            'output'         => array('.prefooter'),
            'default'            => array(
                'background-color'     => '#fff', 
            ),
            'required' => array(
                array('prefooter_switch','equals','1'),                    
            ),
        ),
        array(
            'id'             => 'prefooter_spacing',
            'type'           => 'spacing',
            'output'         => array('.prefooter'),
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Prefooter Padding', 'dentalia'),
            'subtitle'       => __('Sets spacing for widgets in prefooter (in pixels).', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'padding-top'     => '60px', 
                'padding-bottom'  => '60px', 
            ),
            'required' => array(
                array('prefooter_switch','equals','1'),                    
            ),
        ),
        array(
            'id'   => 'info_copyright_settings',
            'type' => 'info',
            'title'    => esc_html__('Copyright Area settings', 'dentalia'),
        ),
        array(
            'id'       => 'copyrightarea_switch',
            'type'     => 'switch', 
            'title'    => __('Show Copyright Area', 'dentalia'),
            'subtitle' => __('Enable to show copyright area.', 'dentalia'),
            'default'  => true,
        ),
        array(
            'id'       => 'copyrightfooter-sidebars',
            'type'     => 'select',
            'title'    => __( 'Copyright Area Columns', 'dentalia' ),
            'subtitle'    => __( 'Sets number of widget areas in copyright footer.', 'dentalia' ),
            'default'  => '1',
            'options'  => array(
                '1' => '1 column',
                '2' => '2 columns',
            ),
            'required' => array(
                array('copyrightarea_switch','equals','1'),                    
            ), 
        ),      
        array(
            'id'       => 'copyright_text_colors',
            'type'     => 'select',
            'title'    => esc_html__( 'Copyright Footer Text Color', 'dentalia' ),
            'subtitle'    => esc_html__( 'Text style customization is available under the Typography section.', 'dentalia' ),
            'default'  => 'auto',
            'options'  => array(
                'auto' => 'Auto',                
                'text-dark' => 'Dark Text',
                'text-light' => 'Light Text',
            ),
            'required' => array(
                array('copyrightarea_switch','equals','1'),                    
            ),
        ),
        array(         
            'id'       => 'copyright_background',
            'type'     => 'background',
            'title'    => esc_html__('Copyright Footer Background', 'dentalia'), 
            'subtitle' => esc_html__('Defines the style of copyright footer background.', 'dentalia'),
            'transparent' => false,
            'background-attachment' => false,
            'output'         => array('.copyright-footer'),
            'required' => array(
                array('copyrightarea_switch','equals','1'),                    
            ),
        ),
        array(
            'id'             => 'copyright_footer_spacing',
            'type'           => 'spacing',
            'output'         => array('.copyright-footer'),
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => __('Copyright Footer Padding', 'dentalia'),
            'subtitle'       => __('Sets spacing for widgets in copyright area (in pixels).', 'dentalia'),
            'left'          => false,
            'right'         => false,
            'display_units' => false,
            'default'            => array(
                'padding-top'     => '17px', 
                'padding-bottom'  => '17px', 
            ),
            'required' => array(
                array('copyrightarea_switch','equals','1'),                    
            ),
        ),
    )
));

Redux::setSection( $opt_name, array(
    'id'       => 'text-styles',
    'title'     => esc_html__('Typography', 'dentalia'),
    'icon'      => 'fa fa-font',
    'fields'    => array(
               array(
            'id'   => 'info_general_font_settings',
            'type' => 'info',
            'title'    => esc_html__('Fonts', 'dentalia'),
            'desc' => esc_html__('Use these settings to create a consistent style throughout your website. Advanced customization is available in Typography subsections.', 'dentalia'),
        ),

        array(
            'id'          => 'content_font',
            'type'        => 'typography', 
            'title'       => esc_html__('Content & Paragraphs Font Family', 'dentalia'),
            'subtitle' => esc_html__('Defines the most dominant font of your theme.', 'dentalia'),
            'font-backup' => false,
            'text-align' => false,
            'output'      => array('html, body, p, input:not(.btn), textarea, select, .wpcf7-form select, .wpcf7-form input:not(.btn), .woocommerce-review__published-date'),
            'units'       =>'px',
            'line-height' => false,
            'font-weight' => false,
            'color'       => false,
            'font-style'  => false,
            'font-size'   => false,
            'default'     => array( 
                'font-family' => 'Open Sans', 
            ),
        ),
        
        array(
            'id'          => 'title_font',
            'type'        => 'typography', 
            'title'       => esc_html__('Titles & Headings Font Family', 'dentalia'),
            'subtitle' => esc_html__('Defines the default font of headings and widget titles.', 'dentalia'),
            'font-backup' => false,
            'text-align' => false,
            'output'      => array('h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .panel-heading, .font-2, .team-header .departments a, .dropcap, .product-title'),
            'units'       =>'px',
            'line-height' => false,
            'font-weight' => false,
            'color'       => false,
            'font-style'  => false,
            'font-size'   => false,
            'default'     => array(
                'font-family' => 'Montserrat',
            ),
        ),

        array(
            'id'          => 'button_nav_font',
            'type'        => 'typography', 
            'title'       => esc_html__('Navigation & Buttons Links Font Family', 'dentalia'),
            'subtitle' => esc_html__('Defines the default font of the main navigation, buttons, and similar elements.', 'dentalia'),
            'font-backup' => false,
            'text-align' => false,
            'output'      => array('button, .btn, .site-navigation .menu-item > a, .site-navigation li.menu-item > span, .breadcrumbs li a, .breadcrumbs li span, .so-widget-orion_mega_widget_topbar .widget-title, input, .page-numbers, .tagcloud, .meta, .post-navigation, .nav-item, .nav-tabs li a, .nav-stacked li a, .font-3, .wpcf7-form label, input[type="submit"], .widget_nav_menu ul li a, ol.ordered-list li:before, .woocommerce a.button, .widget_product_categories a'),
            'units'       =>'px',
            'line-height' => false,
            'font-weight' => false,
            'color'       => false,
            'font-style'  => false,
            'font-size'   => false,
            'default'     => array( 
                'font-family' => 'Montserrat', 
            ),
        ),
        array(
            'id'   => 'info_darktext_widgets',
            'type' => 'info',
            'title'    => esc_html__('Dark Text Color Settings', 'dentalia'),
            'subtitle'    => esc_html__('Sets the colors of dark text and headings.', 'dentalia'),
        ),
        array(
            'id'        => 'paragraph_colors_dark',
            'type'      => 'color',
            'title'     => esc_html__('Paragraph text color (dark)', 'dentalia'),
            'transparent'   => false,
            'default'   => '#959595',
            'compiler' => true,
        ),
        array(
            'id'        => 'heading_colors_dark',
            'type'      => 'color',
            'title'     => esc_html__('Headings (dark)', 'dentalia'),
            'transparent'   => false,
            'default'   => '#595959',
            'compiler' => true,
        ),
        array(
            'id'       => 'link_colors_dark',
            'type'     => 'link_color',
            'title'    => esc_html__('Link colors', 'dentalia'),
            'subtitle' => esc_html__('General colors for links on the website', 'dentalia'),
            'output'      => 'a',
            'default'  => array(
                'regular'  => '#212121',
            ),
            'compiler' => true,
        ),
        array(
            'id'   => 'info_lighttext_widgets',
            'type' => 'info',
            'title'    => esc_html__('Light Text Color Settings', 'dentalia'),
            'subtitle'    => esc_html__('Sets the colors of light text and headings.', 'dentalia'),
        ),
        array(
            'id'        => 'paragraph_colors_light',
            'type'      => 'color',
            'title'     => esc_html__('Paragraph text color (light)', 'dentalia'),
            'transparent'   => false,
            'default'   => '#ffffff',
            'compiler' => true,
        ),
        array(
            'id'        => 'heading_colors_light',
            'type'      => 'color',
            'title'     => esc_html__('Headings (light)', 'dentalia'), 
            'transparent'   => false,                   
            'default'   => '#ffffff',
            'compiler' => true,
        ),
        array(
            'id'       => 'link_colors_light',
            'type'     => 'link_color',
            'title'    => esc_html__('Link colors (light)', 'dentalia'),
            'output'      => '',
            'default'  => array(
                'regular'  => '#ffffff',
            ),
            'compiler' => true,
        ),                 
    )
));

Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Body', 'dentalia'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'   => 'info_bodytypo_settings',
            'type' => 'info',
            'title'    => esc_html__('Body Text', 'dentalia'),
        ),
        array(
            'id'       => 'body-font',
            'type'     => 'typography',
            'title'    => esc_html__('Body font', 'dentalia'),
            'subtitle' => esc_html__('Defines styles for paragraphs.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('html, body'),
            'default' => array(
                'font-size' => '15px',
                'line-height' => '24px',
                'font-family' => 'Open Sans',
                'font-weight' => '400'
                )
        ),       
    )
));


Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Headings', 'dentalia'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'   => 'info_headingtypo_settings',
            'type' => 'info',
            'title'    => esc_html__('Headings', 'dentalia'),
        ),   
        array(
            'id'       => 'h1-font',
            'type'     => 'typography',
            'title'    => esc_html__('H1 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H1 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h1, .h1'),
            'default' => array(
                'font-size' => '39px',
                'line-height' => '48px',
                'color' => '#212121',
                )
        ),
        array(
            'id'       => 'h2-font',
            'type'     => 'typography',
            'title'    => esc_html__('H2 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H2 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h2, .h2'),
            'default' => array(
                'font-size' => '33px',
                'line-height' => '36px',
                'color' => '#212121',
                )
        ),
        array(
            'id'       => 'h3-font',
            'type'     => 'typography',
            'title'    => esc_html__('H3 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H3 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h3, .h3'),
            'default' => array(
                'font-size' => '27px',
                'line-height' => '36px',
                'color' => '#212121',
                )
        ),
        array(
            'id'       => 'h4-font',
            'type'     => 'typography',
            'title'    => esc_html__('H4 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H4 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h4, .h4'),
            'default' => array(
                'font-size' => '24px',
                'line-height' => '24px',
                'color' => '#212121',
                )
        ),
        array(
            'id'       => 'h5-font',
            'type'     => 'typography',
            'title'    => esc_html__('H5 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H5 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h5, .h5'),
            'default' => array(
                'font-size' => '21px',
                'line-height' => '24px',
                'color' => '#212121',
                )
        ),
        array(
            'id'       => 'h6-font',
            'type'     => 'typography',
            'title'    => esc_html__('H6 Style', 'dentalia'),
            'subtitle' => esc_html__('Defines the style for H6 headings.', 'dentalia'),
            'google' => true,
            'subsets' => true,
            'font-weight' => true,
            'font-size' => true,
            'line-height' => true,
            'font-style' => true,
            'color' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'text-transform' => true,
            'font-backup' => true,
            'color' => false,
            'output' => array('h6, .h6'),
            'default' => array(
                'font-size' => '18px',
                'line-height' => '24px',
                'color' => '#212121',
            )
        ),       
    )
));


Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Posts', 'dentalia'),
    'subsection' => true,
    'fields'    => array(

        array(
            'id'   => 'info_poststypo_settings',
            'type' => 'info',
            'title'    => esc_html__('Posts', 'dentalia'),
        ),
        array(
            'id'          => 'entry_heading',
            'type'        => 'typography', 
            'title'       => esc_html__('Entry heading', 'dentalia'), 
            'font-backup' => false,
            'text-align' => true,
            'letter-spacing' => true,
            'text-transform' => true,
            'color' => false,
            'output'      => array('article .entry-title, article .entry-title a'),
            'units'       =>'px',
            'default'     => array(
                'font-size'   => '30px', 
                'line-height' => '36px',
                // 'font-family' => 'Montserrat',
                'font-weight' => '400',
                'text-transform' => 'capitalize',
            )
        ),  
        array(
            'id'          => 'post_meta',
            'type'        => 'typography', 
            'title'       => esc_html__('Post Meta', 'dentalia'), 
            'font-backup' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'text-transform' => true,
            'color' => false,
            'output'      => array('.entry-meta time, .entry-meta span, .entry-meta a'),
            'units'       =>'px',
            'default'     => array(
                // 'font-family' => 'Montserrat',
                'font-size'   => '13px', 
                'line-height' => '13px',
                'font-weight' => '400'
            )
        ),             
    )   
));


Redux::setSection( $opt_name, array(
   'title'     => esc_html__('Sidebar Generator', 'dentalia'),
    'icon'      => 'fa fa-cubes',
    'fields'    => array(
        array(
            'id'   => 'info_sidebar_generator_settings',
            'type' => 'info',
            'title'    => esc_html__('Add unlimited sidebars', 'dentalia'),
        ),        
        array(
            'id'        => 'add-sidebars',
            'type'      => 'multi_text',
            'title'     => esc_html__('Create custom sidebars', 'dentalia'),
            'validate'  => 'not_empty',
            'show_empty' => 'false',
            'default' => array('Orion custom sidebar'),
        )        
    )   
) );

Redux::setSection( $opt_name, array(
    'id' => 'wbc_importer_section',
    'title'  => esc_html__( 'Demo Import', 'dentalia' ),
    'desc'   => esc_html__( 'Make sure all required plugins are activated before importing demo content. Please disable WordPress Importer plugin if enabled.', 'dentalia' ),
    'icon'   => 'el el-gift',
    'fields' => array(
        array(
            'id'   => 'wbc_demo_importer',
            'type' => 'wbc_importer'
            )
        )
    )
);

Redux::setSection( $opt_name, array(
    'id' => 'orion_custom_css',
    'title'  => esc_html__( 'Custom Css', 'dentalia' ),
    'desc'   => esc_html__( 'Customize the style with the power of CSS. ', 'dentalia' ),
    'icon'   => 'fa fa-css3',
    'fields' => array(
       array(
            'id'   => 'info_custom_css_settings',
            'type' => 'info',
            'title'    => esc_html__('Customize the style with the power of CSS', 'dentalia'),
        ),         
        array(
            'id'       => 'orion_custom_css_editor',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'dentalia'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'dentalia'),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default'  => "",
            'compiler' => true,
        ),
    )
));

?>