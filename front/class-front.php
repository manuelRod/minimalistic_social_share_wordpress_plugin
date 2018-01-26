<?php
/**
 * Hook to Front
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front
 *
 * @package Social_Share\Front
 */
class Front {

	/**
	 * This will define all hooks for the content
	 */
	public function hook_me() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts_styles' ] );

	}

	/**
	 * Enqueue Scripts for the frontend.
	 */
	public function enqueue_scripts_styles() {
		wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
		wp_enqueue_style( 'social-share', plugin_dir_url( __FILE__ ) . 'css/social-share.min.css' );
	}

}

