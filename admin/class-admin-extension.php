<?php

namespace Social_Share\Admin;

/**
 * Class Admin_Extension
 * @package Social_Share\Admin
 */
class Admin_Extension {

	/**
	 * This will define all hooks for the dashboard
	 */
	public function hook_to_admin() {
		(new Admin_Menu())->hook_me();
		(new Admin_Menu_Settings())->hook_me();
	}
}
