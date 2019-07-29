<?php

//if accessed directly exit
if(!defined('ABSPATH')) exit;

class ElatedSkin extends AlbergoElatedSkinAbstract {
    /**
     * Skin constructor. Hooks to albergo_elated_admin_scripts_init and albergo_elated_enqueue_admin_styles
     */
    public function __construct() {
        $this->skinName = 'elated';

        //hook to
        add_action('albergo_elated_admin_scripts_init', array($this, 'registerStyles'));
        add_action('albergo_elated_admin_scripts_init', array($this, 'registerScripts'));

        add_action('albergo_elated_enqueue_admin_styles', array($this, 'enqueueStyles'));
        add_action('albergo_elated_enqueue_admin_scripts', array($this, 'enqueueScripts'));

        add_action('albergo_elated_enqueue_meta_box_styles', array($this, 'enqueueStyles'));
        add_action('albergo_elated_enqueue_meta_box_scripts', array($this, 'enqueueScripts'));

		add_action('before_wp_tiny_mce', array($this, 'setShortcodeJSParams'), 5);
    }

    /**
     * Method that registers skin scripts
     */
	public function registerScripts() {

		//This part is required for field type address
        $enable_google_map_in_admin = apply_filters('albergo_elated_google_maps_in_backend', false);
        if($enable_google_map_in_admin) {
            //include google map api script
            $google_maps_api_key          = albergo_elated_options()->getOptionValue( 'google_maps_api_key' );
            $google_maps_extensions       = '';
            $google_maps_extensions_array = apply_filters( 'albergo_elated_google_maps_extensions_array', array() );
            if ( ! empty( $google_maps_extensions_array ) ) {
                $google_maps_extensions .= '&libraries=';
                $google_maps_extensions .= implode( ',', $google_maps_extensions_array );
            }
            if ( ! empty( $google_maps_api_key ) ) {
                wp_register_script( 'eltd-admin-maps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
                $this->scripts['jquery.geocomplete.min'] = array(
                    'path'       => 'assets/js/eltd-ui/jquery.geocomplete.min.js',
                    'dependency' => array( 'eltd-admin-maps' )
                );
            }
        }
		
		$this->scripts['bootstrap.min']          = array(
			'path'       => 'assets/js/bootstrap.min.js',
			'dependency' => array()
		);
		$this->scripts['jquery.nouislider.min']  = array(
			'path'       => 'assets/js/eltd-ui/jquery.nouislider.min.js',
			'dependency' => array()
		);
		$this->scripts['eltd-ui-admin']         = array(
			'path'       => 'assets/js/eltd-ui/eltd-ui.js',
			'dependency' => array()
		);
		$this->scripts['eltd-bootstrap-select'] = array(
			'path'       => 'assets/js/eltd-ui/eltd-bootstrap-select.min.js',
			'dependency' => array()
		);
		$this->scripts['select2']                = array(
			'path'       => 'assets/js/eltd-ui/select2.min.js',
			'dependency' => array()
		);
		
		foreach ( $this->scripts as $scriptHandle => $script ) {
			albergo_elated_register_skin_script( $scriptHandle, $script['path'], $script['dependency'] );
		}
	}

    /**
     * Method that registers skin styles
     */
    public function registerStyles() {
        $this->styles['eltd-bootstrap'] = 'assets/css/eltd-bootstrap.css';
        $this->styles['eltd-page-admin'] = 'assets/css/eltd-page.css';
        $this->styles['eltd-options-admin'] = 'assets/css/eltd-options.css';
        $this->styles['eltd-meta-boxes-admin'] = 'assets/css/eltd-meta-boxes.css';
        $this->styles['eltd-ui-admin'] = 'assets/css/eltd-ui/eltd-ui.css';
        $this->styles['eltd-forms-admin'] = 'assets/css/eltd-forms.css';
        $this->styles['eltd-import'] = 'assets/css/eltd-import.css';
        $this->styles['font-awesome-admin'] = 'assets/css/font-awesome/css/font-awesome.min.css';
        $this->styles['select2'] = 'assets/css/select2.min.css';

        foreach ($this->styles as $styleHandle => $stylePath) {
	        albergo_elated_register_skin_style($styleHandle, $stylePath);
        }

    }

    /**
     * Method that renders options page
     *
     * @see ElatedSkin::getHeader()
     * @see ElatedSkin::getPageNav()
     * @see ElatedSkin::getPageContent()
     */
    public function renderOptions() {
        global $albergo_Framework;
        $tab    = albergo_elated_get_admin_tab();
        $active_page = $albergo_Framework->eltdOptions->getAdminPageFromSlug($tab);
        if ($active_page == null) return;
        ?>
        <div class="eltd-options-page eltd-page">
            <?php $this->getHeader($active_page); ?>
            <div class="eltd-page-content-wrapper">
                <div class="eltd-page-content">
                    <div class="eltd-page-navigation eltd-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav($tab); ?>
                        <?php $this->getPageContent($active_page); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    /**
     * Method that renders header of options page.
     * @param bool $show_save_btn whether to show save button. Should be hidden on import page
     *
     * @see AlbergoElatedSkinAbstract::loadTemplatePart()
     */
    public function getHeader($activePage = '', $show_save_btn = true) {
        $this->loadTemplatePart('header', array('active_page' => $activePage, 'show_save_btn' => $show_save_btn));
    }

    /**
     * Method that loads page navigation
     * @param string $tab current tab
     * @param bool $is_import_page if is import page highlighted that tab
     *
     * @see AlbergoElatedSkinAbstract::loadTemplatePart()
     */
    public function getPageNav($tab, $is_import_page = false, $is_backup_options_page = false) {
        $this->loadTemplatePart('navigation', array(
            'tab' => $tab,
            'is_import_page' => $is_import_page,
			'is_backup_options_page' => $is_backup_options_page
        ));
    }
	
	/**
	 * Method that loads current page content
	 *
	 * @param AlbergoElatedAdminPage $page current page to load
	 * @see AlbergoElatedSkinAbstract::loadTemplatePart()
	 */
    public function getPageContent($page) {
        $this->loadTemplatePart('content', array('page' => $page));
    }

    /**
     * Method that loads content for import page
     */
    public function getImportContent() {
        $this->loadTemplatePart('content-import');
    }
	
	/**
	 * Method that loads content for backup page
	 */
	public function getBackupOptionsContent() {
		$this->loadTemplatePart('backup-options');
	}

    /**
     * Method that loads anchors and save button template part
     *
     * @param AlbergoElatedAdminPage $page current page to load
     * @see AlbergoSkinAbstract::loadTemplatePart()
     */
    public function getAnchors($page) {
        $this->loadTemplatePart('anchors', array('page' => $page));
    }

    /**
     * Method that renders import page
     *
     *  @see ElatedSkin::getHeader()
     *  @see ElatedSkin::getPageNav()
     *  @see ElatedSkin::getImportContent()
     */
    public function renderImport() { ?>
        <div class="eltd-options-page eltd-page">
            <?php $this->getHeader('', false); ?>
            <div class="eltd-page-content-wrapper">
                <div class="eltd-page-content">
                    <div class="eltd-page-navigation eltd-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav('tabimport', true); ?>
                        <?php $this->getImportContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

	/**
	 * Method that renders backup options page
	 *
	 * @see ElatedSkin::getHeader()
	 * * @see ElatedSkin::getPageNav()
	 * * @see ElatedSkin::getImportContent()
	 */
	public function renderBackupOptions() { ?>
		<div class="eltd-options-page eltd-page">
			<?php $this->getHeader('',false); ?>
			<div class="eltd-page-content-wrapper">
				<div class="eltd-page-content">
					<div class="eltd-page-navigation eltd-tabs-wrapper vertical left clearfix">
						<?php $this->getPageNav('backup_options', false, true); ?>
						<?php $this->getBackupOptionsContent(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
?>