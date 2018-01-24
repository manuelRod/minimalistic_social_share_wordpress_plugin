<?php
/**
 * Toptal Project Interview
 *
 * @link              http://www.toptal.com/
 * @since             1.0.0
 * @package           Social_Share
 *
 * @wordpress-plugin
 * Plugin Name: Social Share
 * Plugin URI: http://www.toptal.com/
 * Description: Toptal Project Interview
 * Version: 1.0
 * Author: Manuel Rodriguez Rosado
 * Author URI: http://www.cosmonauta.es/
 * Text Domain: social-share
 */

// If this file is accessed, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Register autoloader.
spl_autoload_register( 'autoloader' );
/**
 * Autoloader
 *
 * @param string $class_name Class Name string.
 */
function autoloader( $class_name ) {
	if ( ( strpos( $class_name, 'Social_Share\\' ) ) !== false ) {
		$classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR;
		$class_file  = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
		// Delete main namespace from class name.
		$class_file    = str_replace( 'Social_Share/', '', $class_file );
		$class_file    = explode( '/', $class_file );
		$class_file[0] = lcfirst( $class_file[0] );
		$class_file[1] = 'class-' . str_replace( '_', '-', strtolower( $class_file[1] ) );
		$class_file    = implode( '/', $class_file );

		require_once $classes_dir . $class_file;
	}

}

use Social_Share\Admin\Admin_Extension;

// init admin hooks.
$admin = new Admin_Extension();
$admin->hook_to_admin();


use Social_Share\Front\Front_Extension;

// init frontend hooks.
$front = new Front_Extension();
$front->hook_to_front();

use Social_Share\Front\Front_Helper;

add_action('init', 'a');
function a() {
	//Front_Helper::get_instance();

}

