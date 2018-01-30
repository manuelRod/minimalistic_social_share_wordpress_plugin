<?php
/**
 * Class Admin_Menu_Ajax
 *
 * @package Social_Share\Admin
 */

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Ajax
 *
 * @package Social_Share\Admin
 */
class Admin_Menu_Ajax extends Admin_Menu_Abstract {

	/**
	 * Public Hooks
	 */
	public function hook_me() {
		add_action( 'wp_ajax_save_sn_order', [ $this, 'save_sn_order' ] );
	}

	/**
	 * Saving SN order
	 */
	public function save_sn_order() {
		check_ajax_referer( '@sortOrder#', 'nonce' );
		$order = filter_input( INPUT_POST, 'order', FILTER_SANITIZE_SPECIAL_CHARS );
		wp_die( esc_html( update_option( 'social-share-order', explode( ',', $order ) ) ) );
	}

}

