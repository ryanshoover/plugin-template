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

require_once( PATH . 'inc/core.php' );

if ( is_admin() ) {
	require_once( PATH . 'inc/admin.php' );
}
