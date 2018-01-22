<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @package Social_Share\Admin
 */

namespace Social_Share\Admin;

/**
 * Class Admin_Extension
 *
 * @package Social_Share\Admin
 */
class Admin_Extension {

	/**
	 * This will define all hooks for the dashboard
	 */
	public function hook_to_admin() {
		if ( ! is_admin() ) {
			return;
		}

		( new Admin_Menu() )->hook_me();
		( new Admin_Menu_Settings() )->hook_me();
		( new Admin_Menu_Ajax() )->hook_me();
	}
}

