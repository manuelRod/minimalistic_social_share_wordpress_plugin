<?php

namespace Social_Share\Admin;

/**
 * Class Admin_Menu
 * @package Social_Share\Admin
 */
class Admin_Menu extends Admin_Menu_Abstract {

	/**
	 * Public Hooks
	 */
	public function hook_me() {
		add_action( 'admin_menu', [ $this, 'add_menu_dashboard' ] );
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
}

