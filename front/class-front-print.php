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

	/**
	 * Prints buttons before content.
	 *
	 * @param string                $content Post Content.
	 * @param Front_Settings_Helper $settings Settings Helper.
	 *
	 * @return string
	 */
	public static function print_bellow_title( $content, Front_Settings_Helper $settings ) {
		return self::get_buttons( $settings ) . $content;
	}

	/**
	 * Prints buttons after content.
	 *
	 * @param string                $content Post Content.
	 * @param Front_Settings_Helper $settings Settings Helper.
	 *
	 * @return string
	 */
	public static function print_after_content( $content, Front_Settings_Helper $settings ) {
		return $content . self::get_buttons( $settings );
	}

	/**
	 * Prints buttons floating left.
	 *
	 * @param string                $content Post Content.
	 * @param Front_Settings_Helper $settings Settings Helper.
	 *
	 * @return string
	 */
	public static function floating_left_area( $content, Front_Settings_Helper $settings ) {
		return $content . self::get_buttons( $settings, true );
	}

	/**
	 * Prints buttons inside image.
	 *
	 * @param string                $image thumbnail HTML.
	 * @param Front_Settings_Helper $settings Settings Helper.
	 *
	 * @return string
	 */
	public static function floating_inside_image( $image, Front_Settings_Helper $settings ) {
		return '<div class="inside-container">' . $image . self::get_buttons( $settings, false, true ) . '</div>';
	}

	/**
	 * Gets buttons html.
	 *
	 * @param Front_Settings_Helper $settings Settings helper.
	 * @param bool|false            $floating Floating Flag.
	 * @param bool|false            $image    Image Flag.
	 *
	 * @return string
	 */
	public static function get_buttons( Front_Settings_Helper $settings, $floating = false, $image = false ) {
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'partials/front-social-share-buttons.php';
		$output = ob_get_clean();
		ob_flush();
		return $output;
	}

}

