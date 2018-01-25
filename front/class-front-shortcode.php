<?php
/**
 * Shortcode functionality
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Shortcode
 *
 * @package Social_Share\Front
 */
class Front_Shortcode {

	/**
	 * This will define all hooks for the frontend
	 */
	public function hook_me() {
		add_shortcode( 'social_share', [ $this, 'social_share_shortcode' ] );
	}

	/**
	 * Social Share shortcode [social_share].
	 *
	 * @return string Buttons.
	 */
	public function social_share_shortcode() {
		$settings = Front_Settings_Helper_Shortcode::get_instance();
		if ( ! empty( $settings->get_available_networks() ) && ! empty( $settings->get_size() ) ) {
			return Front_Print::get_buttons( $settings );
		}
	}
}

