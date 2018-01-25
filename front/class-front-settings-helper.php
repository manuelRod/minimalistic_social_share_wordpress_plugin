<?php
/**
 * Frontend helper to get information to print
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Settings_Helper
 *
 * @package Social_Share\Front
 */
class Front_Settings_Helper {

	/**
	 * Static instance of the class
	 *
	 * @var Front_Settings_Helper
	 */
	private static $instance;

	/**
	 * Hold settings beatified and sorted.
	 *
	 * @var array $settings
	 */
	protected $settings;


	const SOCIAL_SHARE_SETTINGS = 'social-share-settings';
	const SOCIAL_SHARE_ORDER    = 'social-share-order';

	/**
	 *  Constructor.
	 */
	private function __construct() {
		$settings       = get_option( 'social-share-settings' );
		$order          = get_option( 'social-share-order' );
		$this->settings = $this->sort_settings_output( $settings, $order );
	}

	/**
	 * Sorting settings and selecting only social networks that have to be printed.
	 *
	 * @param array $settings Settings from Dashboard Settings.
	 * @param array $order Order of SN from Dashboard Settings.
	 *
	 * @return array
	 */
	public function sort_settings_output( $settings, $order ) {
		$settings_beautified = array();
		if ( empty( $settings['networks'] ) || empty( $settings['where'] ) || empty( $settings['sizes'] ) || empty( $settings['post_types'] ) ) {
			return $settings_beautified;
		}

		$settings_beautified['post_types'] = $settings['post_types'];
		$settings_beautified['sizes']      = $settings['sizes'];
		$settings_beautified['where']      = $settings['where'];
		foreach ( $order as $sn ) {
			if ( isset( $settings['networks'][ $sn ] ) ) {
				$settings_beautified['networks'][ $sn ] = $settings['colour'][ $sn ];
			}
		}

		return $settings_beautified;
	}

	/**
	 * Singleton constructor for Front_Settings_Helper
	 *
	 * @return Front_Settings_Helper
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Get All settings.
	 *
	 * @return array
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * Check if $post is eligible to display social share buttons.
	 *
	 * @param \WP_Post $post current post.
	 *
	 * @return bool
	 */
	public function is_post_eligible( \WP_Post $post ) {
		if ( isset( $this->settings['post_types'][ $post->post_type ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * If buttons have to appear bellow title.
	 *
	 * @return bool
	 */
	public function is_bellow_title() {
		if ( isset( $this->settings['where']['Below the post title'] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * If buttons have to appear floating left.
	 *
	 * @return bool
	 */
	public function is_floating_left() {
		if ( isset( $this->settings['where']['Floating on the left area'] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * If buttons have to appear after content.
	 *
	 * @return bool
	 */
	public function is_after_content() {
		if ( isset( $this->settings['where']['After the post content'] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * If buttons have to appear inside image.
	 *
	 * @return bool
	 */
	public function is_inside_image() {
		if ( isset( $this->settings['where']['Inside the featured image'] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Returns Social network with its colours.
	 *
	 * @return array
	 */
	public function get_available_networks() {
		return ( isset( $this->settings['networks'] ) ) ? $this->settings['networks'] : [];
	}

	/**
	 * Returns Size chosen on Settings.
	 *
	 * @return string
	 */
	public function get_size() {
		return ( isset( $this->settings['sizes'] ) ) ? $this->settings['sizes'] : [];
	}

	/**
	 * Returns if there is a place chosen on Settings.
	 *
	 * @return array
	 */
	public function is_placed_somewhere() {
		return ( isset( $this->settings['where'] ) ) ? $this->settings['where'] : [];
	}

}

