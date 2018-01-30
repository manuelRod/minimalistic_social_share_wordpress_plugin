<?php
/**
 * Adding Settings and Sections
 *
 * @package Social_Share\Admin
 */

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Settings
 *
 * @package Social_Share\Admin
 */
class Admin_Menu_Settings extends Admin_Menu_Abstract {

	/**
	 * Public Hooks.
	 */
	public function hook_me() {
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	/**
	 * Registering Settings and Sections
	 */
	public function register_settings() {

		register_setting(
			self::SOCIAL_SHARE_SETTINGS,
			self::SOCIAL_SHARE_SETTINGS
		);

		$options = get_option( self::SOCIAL_SHARE_SETTINGS );
		$order   = get_option( self::SOCIAL_SHARE_ORDER );

		if ( ! $order ) {
			// If Order is not set yet, assign order by default.
			$order = $this->social_networks;
			update_option( self::SOCIAL_SHARE_ORDER, $order );
		}

		$this->add_section( 'sort', __( 'Social Networks', 'social-share' ), __( 'Choose order to be displayed:', 'social-share' ), $options, $order );
		$this->add_section( 'post_types', 'Post Types', 'Choice where to displayed:', $options, $order );
		$this->add_section( 'sizes', 'Sizes', 'Size to be displayed:', $options, $order );
		$this->add_section( 'colour', 'Colour Pickers', 'Colours to be displayed:', $options, $order );
		$this->add_section( 'where', 'Places', 'Places to be displayed:', $options, $order );
	}

	/**
	 * Adding sections to the settings page
	 *
	 * @param string $option_name Option Name.
	 * @param string $title Title for the menu.
	 * @param string $text Text for the menu.
	 * @param array  $options Options from the plugin.
	 * @param array  $order Sort of the sn.
	 */
	protected function add_section( $option_name, $title, $text, $options, $order ) {
		$callback_name = 'add_' . $option_name . '_callback';
		add_settings_section(
			$option_name,
			$title,
			function () use ( $text ) {
				echo esc_html( $text );
			},
			'social-share-settings'
		);

		add_settings_field(
			$option_name,
			$title,
			[ $this, $callback_name ],
			'social-share-settings',
			$option_name,
			[
				'options' => $options,
				'order'   => $order,
			]
		);
	}

	/**
	 * Post types to select callback
	 *
	 * @param array $args Options.
	 */
	public function add_post_types_callback( $args ) {
		$public_post_types = get_post_types( array( 'public' => true ) );
		unset( $public_post_types['attachment'] );

		$options           = $args['options'];
		$chosen_post_types = isset( $options['post_types'] ) ? $options['post_types'] : [];
		$this->render(
			'admin-menu-checkbox-callback.php', [
				'chosen_types'    => $chosen_post_types,
				'available_types' => $public_post_types,
				'option_name'     => 'post_types',
			]
		);
	}

	/**
	 * Sizes callback
	 *
	 * @param array $args Options.
	 */
	public function add_sizes_callback( $args ) {
		$options           = $args['options'];
		$chosen_post_types = isset( $options['sizes'] ) ? $options['sizes'] : [];

		$this->render(
			'admin-menu-radio-callback.php', [
				'chosen_types'    => $chosen_post_types,
				'available_types' => $this->supported_sizes,
				'option_name'     => 'sizes',
				'type'            => 'radio',

			]
		);
	}

	/**
	 * Colours callback
	 *
	 * @param array $args Options.
	 */
	public function add_colour_callback( $args ) {
		$options           = $args['options'];
		$chosen_post_types = isset( $options['colour'] ) ? $options['colour'] : [];

		$this->render(
			'admin-menu-colour-callback.php', [
				'chosen_types'    => $chosen_post_types,
				'available_types' => $this->social_networks,
				'default_colours' => $this->social_networks_default_colours,
				'option_name'     => 'colour',
				'type'            => 'radio',

			]
		);
	}

	/**
	 * Where to place it callback
	 *
	 * @param array $args Options.
	 */
	public function add_where_callback( $args ) {
		$options           = $args['options'];
		$chosen_post_types = isset( $options['where'] ) ? $options['where'] : [];

		$this->render(
			'admin-menu-checkbox-callback.php', [
				'chosen_types'    => $chosen_post_types,
				'available_types' => $this->supported_places,
				'option_name'     => 'where',
			]
		);
	}

	/**
	 * Sorting icons callback
	 *
	 * @param array $args Options.
	 */
	public function add_sort_callback( $args ) {
		$options           = $args['options'];
		$sorted_post_types = $args['order'];
		$sorted_post_types = ( $sorted_post_types ) ? $sorted_post_types : $this->social_networks;
		$selected_types    = isset( $options['networks'] ) ? $options['networks'] : [];

		$this->render(
			'admin-menu-sort-callback.php', [
				'sorted_types'    => $sorted_post_types,
				'selected_types'  => $selected_types,
				'available_types' => $this->social_networks,
				'option_name'     => 'networks',
			]
		);
	}

}

