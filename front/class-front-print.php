<?php
/**
 * Print Social Share Buttons
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Print
 *
 * @package Social_Share\Front
 */
class Front_Print {

	static public function print_bellow_title($title, Front_Settings_Helper $settings) {
		return self::get_buttons($settings) . $title;
	}

	static public function print_after_content($content, Front_Settings_Helper $settings) {
		return $content . self::get_buttons($settings);
	}

	static public function floating_left_area($content, Front_Settings_Helper $settings) {
		return $content . self::get_buttons($settings, true);
	}

	private function get_buttons(Front_Settings_Helper $settings, $floating) {
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'partials/front-social-share-buttons.php';
		$output = ob_get_clean();
		ob_flush();
		return $output;
	}



}

