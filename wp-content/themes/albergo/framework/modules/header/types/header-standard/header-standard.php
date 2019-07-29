<?php
namespace Albergo\Modules\Header\Types;

use Albergo\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderStandard extends HeaderType {
	protected $heightOfTransparency;
	protected $heightOfCompleteTransparency;
	protected $headerHeight;
	protected $mobileHeaderHeight;
	
	/**
	 * Sets slug property which is the same as value of option in DB
	 */
	public function __construct() {
		$this->slug = 'header-standard';
		
		if ( ! is_admin() ) {
			$this->menuAreaHeight     = albergo_elated_set_default_menu_height_for_header_types();
			$this->mobileHeaderHeight = albergo_elated_set_default_mobile_menu_height_for_header_types();
			
			add_action( 'wp', array( $this, 'setHeaderHeightProps' ) );
			
			add_filter( 'albergo_elated_js_global_variables', array( $this, 'getGlobalJSVariables' ) );
			add_filter( 'albergo_elated_per_page_js_vars', array( $this, 'getPerPageJSVariables' ) );
		}
	}
	
	/**
	 * Loads template file for this header type
	 *
	 * @param array $parameters associative array of variables that needs to passed to template
	 */
	public function loadTemplate( $parameters = array() ) {
		$page_id                                = albergo_elated_get_page_id();
		$menu_area_position                     = albergo_elated_get_meta_field_intersect( 'set_menu_area_position', $page_id );
		$parameters['menu_area_position']       = ! empty( $menu_area_position ) ? $menu_area_position : 'right';
		$parameters['menu_area_position_class'] = ! empty( $menu_area_position ) ? 'eltd-menu-' . $menu_area_position : 'eltd-menu-right';
		
		$parameters = apply_filters( 'albergo_elated_header_standard_parameters', $parameters );
		
		albergo_elated_get_module_template_part( 'templates/' . $this->slug, $this->moduleName . '/types/' . $this->slug, '', $parameters );
	}
	
	/**
	 * Sets header height properties after WP object is set up
	 */
	public function setHeaderHeightProps() {
		$this->heightOfTransparency         = $this->calculateHeightOfTransparency();
		$this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
		$this->headerHeight                 = $this->calculateHeaderHeight();
		$this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
	}
	
	/**
	 * Returns total height of transparent parts of header
	 *
	 * @return int
	 */
	public function calculateHeightOfTransparency() {
		$id                 = albergo_elated_get_page_id();
		$transparencyHeight = 0;
		
		$menu_background_color_meta        = get_post_meta( $id, 'eltd_menu_area_background_color_meta', true );
		$menu_background_transparency_meta = get_post_meta( $id, 'eltd_menu_area_background_transparency_meta', true );
		$menu_background_color             = albergo_elated_options()->getOptionValue( 'menu_area_background_color' );
		$menu_background_transparency      = albergo_elated_options()->getOptionValue( 'menu_area_background_transparency' );
		$menu_grid_background_color        = albergo_elated_options()->getOptionValue( 'menu_area_grid_background_color' );
		$menu_grid_background_transparency = albergo_elated_options()->getOptionValue( 'menu_area_grid_background_transparency' );
		
		if ( ! empty( $menu_background_color_meta ) ) {
			$menuAreaTransparent = ! empty( $menu_background_color_meta ) && $menu_background_transparency_meta !== '1';
		} elseif ( empty( $menu_background_color ) ) {
			$menuAreaTransparent = ! empty( $menu_grid_background_color ) && $menu_grid_background_transparency !== '1';
		} else {
			$menuAreaTransparent = ! empty( $menu_background_color ) && $menu_background_transparency !== '1';
		}
		
		$sliderExists        = get_post_meta( $id, 'eltd_page_slider_meta', true ) !== '';
		$contentBehindHeader = get_post_meta( $id, 'eltd_page_content_behind_header_meta', true ) === 'yes';
		
		if ( $sliderExists || $contentBehindHeader || is_404() ) {
			$menuAreaTransparent = true;
		}
		
		if ( $menuAreaTransparent ) {
			$transparencyHeight = $this->menuAreaHeight;
			
			if ( ( $sliderExists && albergo_elated_is_top_bar_enabled() )
			     || albergo_elated_is_top_bar_enabled() && albergo_elated_is_top_bar_transparent()
			) {
				$transparencyHeight += albergo_elated_get_top_bar_height();
			}
		}
		
		return $transparencyHeight;
	}
	
	/**
	 * Returns height of completely transparent header parts
	 *
	 * @return int
	 */
	public function calculateHeightOfCompleteTransparency() {
		$id                 = albergo_elated_get_page_id();
		$transparencyHeight = 0;
		
		$menu_background_color_meta        = get_post_meta( $id, 'eltd_menu_area_background_color_meta', true );
		$menu_background_transparency_meta = get_post_meta( $id, 'eltd_menu_area_background_transparency_meta', true );
		$menu_background_color             = albergo_elated_options()->getOptionValue( 'menu_area_background_color' );
		$menu_background_transparency      = albergo_elated_options()->getOptionValue( 'menu_area_background_transparency' );
		$menu_grid_background_color        = albergo_elated_options()->getOptionValue( 'menu_area_grid_background_color' );
		$menu_grid_background_transparency = albergo_elated_options()->getOptionValue( 'menu_area_grid_background_transparency' );
		
		if ( ! empty( $menu_background_color_meta ) ) {
			$menuAreaTransparent = ! empty( $menu_background_color_meta ) && $menu_background_transparency_meta === '0';
		} elseif ( empty( $menu_background_color ) ) {
			$menuAreaTransparent = ! empty( $menu_grid_background_color ) && $menu_grid_background_transparency === '0';
		} else {
			$menuAreaTransparent = ! empty( $menu_background_color ) && $menu_background_transparency === '0';
		}
		
		if ( $menuAreaTransparent ) {
			$transparencyHeight = $this->menuAreaHeight;
		}
		
		return $transparencyHeight;
	}
	
	/**
	 * Returns total height of header
	 *
	 * @return int|string
	 */
	public function calculateHeaderHeight() {
		$headerHeight = $this->menuAreaHeight;
		if ( albergo_elated_is_top_bar_enabled() ) {
			$headerHeight += albergo_elated_get_top_bar_height();
		}
		
		return $headerHeight;
	}
	
	/**
	 * Returns total height of mobile header
	 *
	 * @return int|string
	 */
	public function calculateMobileHeaderHeight() {
		$mobileHeaderHeight = $this->mobileHeaderHeight;
		
		return $mobileHeaderHeight;
	}
	
	/**
	 * Returns global js variables of header
	 *
	 * @param $globalVariables
	 *
	 * @return int|string
	 */
	public function getGlobalJSVariables( $globalVariables ) {
		$globalVariables['eltdLogoAreaHeight']     = 0;
		$globalVariables['eltdMenuAreaHeight']     = $this->headerHeight;
		$globalVariables['eltdMobileHeaderHeight'] = $this->mobileHeaderHeight;
		
		return $globalVariables;
	}
	
	/**
	 * Returns per page js variables of header
	 *
	 * @param $perPageVars
	 *
	 * @return int|string
	 */
	public function getPerPageJSVariables( $perPageVars ) {
		//calculate transparency height only if header has no sticky behaviour
		$header_behavior = albergo_elated_get_meta_field_intersect( 'header_behaviour' );
		if ( ! in_array( $header_behavior, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$perPageVars['eltdHeaderTransparencyHeight'] = $this->headerHeight - ( albergo_elated_get_top_bar_height() + $this->heightOfCompleteTransparency );
		} else {
			$perPageVars['eltdHeaderTransparencyHeight'] = 0;
		}
        $perPageVars['eltdHeaderVerticalWidth'] = 0;
		
		return $perPageVars;
	}
}