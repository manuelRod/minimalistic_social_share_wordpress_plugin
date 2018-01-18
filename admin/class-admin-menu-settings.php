<?php

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Settings
 * @package Social_Share\Admin
 */
class Admin_Menu_Settings extends Admin_Menu_Abstract {

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

		$this->add_post_types_section();
	}

	protected function add_post_types_section() {

		add_settings_section(
			'post_types',
			__( 'Post Types', 'social-share' ),
			function () {
				_e( 'Choice where to display:',
					'social-share' );
			},
			'social-share-settings'
		);

		add_settings_field(
			'post_types',
			__( 'Post Types', 'social-share' ),
			array( $this, 'add_post_types_callback' ),
			'social-share-settings',
			'post_types'
		);

	}

	public function add_post_types_callback() {
		$public_post_types = get_post_types( array( 'public' => true ) );
		unset( $public_post_types['attachment'] );

		$options           = get_option( 'social-share-settings' );
		$chosen_post_types = isset( $options['post_types'] ) ? $options['post_types'] : [ ];
		$this->render( 'admin-menu-post-types-callback.php', [
			'chosen_post_types' => $chosen_post_types,
			'public_post_types' => $public_post_types
		] );
	}

}

