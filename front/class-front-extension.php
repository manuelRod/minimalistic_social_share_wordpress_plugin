<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Extension
 *
 * @package Social_Share\Front
 */
class Front_Extension {

	/**
	 * This will define all hooks for the frontend
	 */
	public function hook_to_front() {
		( new Front_Content() )->hook_me();
		( new Front() )->hook_me();
		( new Front_Shortcode() )->hook_me();
	}


}

