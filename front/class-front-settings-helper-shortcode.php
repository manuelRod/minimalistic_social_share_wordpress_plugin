<?php
/**
 * Frontend helper to get information to print (Shortcode Version).
 * We do not need to check for places neither for where to place it, since shortcode will output it directly.
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Settings_Helper_Shortcode
 *
 * @package Social_Share\Front
 */
class Front_Settings_Helper_Shortcode extends Front_Settings_Helper {

	/**
	 * Static instance of the class
	 *
	 * @var Front_Settings_Helper_Shortcode
	 */
	private static $instance;

	/**
	 *  Constructor.
	 */
	private function __construct() {
		$settings       = get_option( 'social-share-settings' );
		$order          = get_option( 'social-share-order' );
		$this->settings = $this->sort_settings_output( $settings, $order );
	}

	/**
	 * Sorting settings and selecting only social networks that have to be printed. (From Shortcode)
	 *
	 * @param array $settings Settings from Dashboard Settings.
	 * @param array $order Order of SN from Dashboard Settings.
	 *
	 * @return array
	 */
	public function sort_settings_output( $settings, $order ) {
		$settings_beautified = array();
		if ( empty( $settings['networks'] ) || empty( $settings['sizes'] ) ) {
			return $settings_beautified;
		}

		$settings_beautified['sizes'] = $settings['sizes'];
		foreach ( $order as $sn ) {
			if ( isset( $settings['networks'][ $sn ] ) ) {
				$settings_beautified['networks'][ $sn ] = $settings['colour'][ $sn ];
			}
		}

		return $settings_beautified;
	}

	/**
	 * Singleton constructor for Front_Settings_Helper_Shortcode
	 *
	 * @return Front_Settings_Helper_Shortcode
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

}

