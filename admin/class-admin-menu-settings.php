<?php

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Settings
 * @package Social_Share\Admin
 */
class Admin_Menu_Settings extends Admin_Menu_Abstract {

	/**
	 * Social Networks to be displayed
	 * @var array
	 */
	protected $social_networks = [
		'Facebook'  => 'Facebook',
		'Twitter'   => 'Facebook',
		'Google+'   => 'Facebook',
		'Pinterest' => 'Facebook',
		'LinkedIn'  => 'Facebook',
		'Whatsapp'  => 'Facebook',
	];

	/**
	 * Supported sizes for social buttons
	 *
	 * @var array
	 */
	protected $supported_sizes = [ 'Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large' ];

	/**
	 * Public Hooks
	 */
	public function hook_me() {
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}


	public function register_settings() {

		register_setting(
			'social-share-settings',
			'social-share-settings'
		);

		$this->add_section( 'post_types', 'Post Types', 'Choice where to displayed:' );
		$this->add_section( 'social_networks', 'Social Networks', 'Choice where to displayed:' );
		$this->add_section( 'sizes', 'Sizes', 'Size to be displayed:' );
	}

	protected function add_section( $option_name, $title, $text ) {
		$callback_name = 'add_' . $option_name . '_callback';
		add_settings_section(
			$option_name,
			__( $title, 'social-share' ),
			function () use ( $text ) {
				_e( $text,
					'social-share' );
			},
			'social-share-settings'
		);

		add_settings_field(
			$option_name,
			__( $title, 'social-share' ),
			[ $this, $callback_name ],
			'social-share-settings',
			$option_name
		);
	}

	/**
	 * Post types to select callback
	 */
	public function add_post_types_callback() {
		$public_post_types = get_post_types( array( 'public' => true ) );
		unset( $public_post_types['attachment'] );

		$options           = get_option( 'social-share-settings' );
		$chosen_post_types = isset( $options['post_types'] ) ? $options['post_types'] : [ ];
		$this->render( 'admin-menu-checkbox-callback.php', [
			'chosen_types'    => $chosen_post_types,
			'available_types' => $public_post_types,
			'option_name'     => 'post_types'
		] );
	}

	public function add_social_networks_callback() {
		$options           = get_option( 'social-share-settings' );
		$chosen_post_types = isset( $options['networks'] ) ? $options['networks'] : [ ];

		$this->render( 'admin-menu-checkbox-callback.php', [
			'chosen_types'    => $chosen_post_types,
			'available_types' => $this->social_networks,
			'option_name'     => 'networks'
		] );
	}

	public function add_sizes_callback() {
		$options           = get_option( 'social-share-settings' );
		$chosen_post_types = isset( $options['sizes'] ) ? $options['sizes'] : [ ];

		$this->render( 'admin-menu-radio-callback.php', [
			'chosen_types'    => $chosen_post_types,
			'available_types' => $this->supported_sizes,
			'option_name'     => 'sizes',
			'type'            => 'radio'

		] );
	}

}

