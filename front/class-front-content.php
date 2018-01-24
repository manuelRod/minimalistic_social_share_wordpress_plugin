<?php
/**
 * Hook to the content
 *
 * @package Social_Share\Front
 */

namespace Social_Share\Front;

/**
 * Class Front_Content
 *
 * @package Social_Share\Front
 */
class Front_Content {

	/**
	 * This will define all hooks for the content
	 */
	public function hook_me() {
		add_filter( 'the_content', array( $this, 'the_content_hook' ), 1, 1 );
	}

	/**
	 * Hook into the post content.
	 *
	 * @param string $content Post content.
	 *
	 * @return string
	 */
	public function the_content_hook( $content ) {
		$front_settings = Front_Settings_Helper::get_instance();
		if ( ! $this->is_post_type_eligible() ) {
			return $content;
		}

		remove_filter( 'the_content', 'wpautop' );
		if ( $front_settings->is_bellow_title() ) {
			$content = Front_Print::print_bellow_title( $content, $front_settings );
		}
		if ( $front_settings->is_after_content() ) {
			$content = Front_Print::print_after_content( $content, $front_settings );
		}
		if ( $front_settings->is_floating_left() ) {
			$content = Front_Print::floating_left_area( $content, $front_settings );
		}

		return $content;
	}

	/**
	 * Checking if current post has to show sharing buttons or not.
	 *
	 * @return bool
	 */
	private function is_post_type_eligible() {
		global $post;

		$front_settings = Front_Settings_Helper::get_instance();
		if ( ! $front_settings->is_post_eligible( $post ) ) {
			return false;
		}
		return true;
	}

}

