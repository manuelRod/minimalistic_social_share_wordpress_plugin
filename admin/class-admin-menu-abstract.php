<?php

namespace Social_Share\Admin;

/**
 * Class Admin_Menu_Abstract
 * @package Social_Share\Admin
 */
abstract class Admin_Menu_Abstract {

	abstract function hook_me();

	/**
	 * @param $view_file
	 * @param null|array $variables
	 */
	function render( $view_file, $variables = null ) {
		/**
		 * because of wp lacking mvc :(
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

