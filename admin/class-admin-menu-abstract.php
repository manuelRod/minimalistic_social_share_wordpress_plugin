<?php
/**
 * Abstract for different Admin_Menu Classes
 *
 * @package Social_Share\Admin
 */

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Abstract
 *
 * @package Social_Share\Admin
 */
abstract class Admin_Menu_Abstract {

	const SOCIAL_SHARE_SETTINGS = 'social-share-settings';
	const SOCIAL_SHARE_ORDER    = 'social-share-order';

	/**
	 * Social Networks to be displayed (and its default colours)
	 *
	 * @var array
	 */
	protected $social_networks = [
		'Facebook',
		'Twitter',
		'Google+',
		'Pinterest',
		'LinkedIn',
		'Whatsapp',
	];

	/**
	 * Social Networks with its defuault colours.
	 *
	 * @var array
	 */
	protected $social_networks_default_colours = [
		'Facebook'  => '#3B5998',
		'Twitter'   => '#55ACEE',
		'Google+'   => '#dd4b39',
		'Pinterest' => '#cb2027',
		'LinkedIn'  => '#007bb5',
		'Whatsapp'  => '#25d366',
	];

	/**
	 * Supported sizes for social buttons
	 *
	 * @var array
	 */
	protected $supported_sizes = [ 'Small', 'Medium', 'Large' ];

	/**
	 * Where to place the sharing buttons
	 *
	 * @var array
	 */
	protected $supported_places = [
		'Below the post title',
		'Floating on the left area',
		'After the post content',
		'Inside the featured image',
	];

	/**
	 * All Admin facing controllers will be hooked by this function
	 */
	abstract public function hook_me();

	/**
	 * Rendering $view_file file with accesible $variables
	 *
	 * @param string     $view_file File name.
	 * @param null|array $variables Variables, we use extract to mock some kind of templating system.
	 */
	protected function render( $view_file, $variables = null ) {
		/**
		 * Because of wp lacking mvc :(
		 */
		if ( $variables ) {
			extract( $variables );
		}
		ob_start();
		require plugin_dir_path( __FILE__ ) . "partials/$view_file";
		$output = ob_get_clean();
		ob_flush();
		echo $output;
	}

}

