<?php
/**
 * Adding Menu to Dashboard and enqueue styles and scripts
 *
 * @package Social_Share\Admin
 */

namespace Social_Share\Admin;

/**
 * Class Admin_Menu
 *
 * @package Social_Share\Admin
 */
class Admin_Menu extends Admin_Menu_Abstract {

	/**
	 * Public Hooks
	 */
	public function hook_me() {
		add_action( 'admin_menu', [ $this, 'add_menu_dashboard' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts_styles' ] );

	}

	/**
	 * Adds menu to the Dashboard
	 */
	public function add_menu_dashboard() {
		add_menu_page(
			__( 'Social Share', 'social-share' ),
			__( 'Social Share', 'social-share' ),
			'administrator',
			'social-share',
			function () {
				$this->render( 'admin-menu-view.php' );
			},
			'dashicons-share'
		);
	}

	/**
	 * Enqueue scripts for dashboard
	 */
	public function enqueue_scripts_styles() {
		$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS );

		if ( 'social-share' !== ( $page && $page ) ) {

			wp_enqueue_script( 'jQueryUI', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js', [ 'jquery' ], 1.0, true );
			wp_register_script( 'social-share', plugin_dir_url( __FILE__ ) . 'js//social-share.js', [ 'jquery' ] );
			wp_localize_script(
				'social-share', 'ajax',
				[
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( '@sortOrder#' ),
				]
			);
			wp_enqueue_script( 'social-share' );
			wp_enqueue_style( 'dashboardStyle', plugin_dir_url( __FILE__ ) . 'css/dashboard.css', [], 1.0 );
		}
	}
}

