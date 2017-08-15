<?php
/**
 * Plugin Name: My Plugin
 * Plugin URI: http://ryan.hoover.ws
 * Description: A plugin by me
 * Version: 0.1
 * Author: ryanshoover
 * Author URI: http://ryan.hoover.ws
 * Text Domain: my-plugin
 * @package my-plugin
 */

namespace MyPlugin;

define( __NAMESPACE__ . '\VERSION', '0.1.0' );
define( __NAMESPACE__ . '\SLUG', 'my-plugin' );
define( __NAMESPACE__ . '\PATH', plugin_dir_path(__FILE__) );
define( __NAMESPACE__ . '\URL',  plugin_dir_url(__FILE__) );

/**
 * Register an autoloader for this plugin.
 */
spl_autoload_register( function ( $class ) {

    // Base directory for the namespace prefix.
    $base_dir = __DIR__ . '/inc/class-';

	// Does the class use the namespace prefix?
    $len = strlen( __NAMESPACE__ );

    if ( strncmp( __NAMESPACE__, $class, $len ) !== 0 ) {
        return;
    }

	// Remove the namespace prefix.
	// Replace namespace separators with directory separators in the class name.
    // Replace underscores with dashes in the class name.
    // Append with .php extension.
    $class_file_name = str_replace( [ '\\', '_' ], [ '/', '-' ], strtolower( substr( $class, $len + 1 ) ) ) . '.php';

    $file = $base_dir . $class_file_name;

    // If the file exists, require it.
    if ( file_exists( $file ) ) {
        require $file;
    }
});

Core::get_instance();

if ( is_admin() ) {
	Admin::get_instance();
}
