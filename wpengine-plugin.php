<?php

/*
Plugin Name: WP Engine Plugin
Plugin URI: http://wpengine.com
Description: A plugin by WP Engine
Version: 0.1
Author: WP Engine
Author URI: http://wpengine.com
Text Domain: wpengine-plugin
*/

global $wpe_plugin_path;
global $wpe_plugin_url;
$wpe_plugin_path = plugin_dir_path( __FILE__ );
$wpe_plugin_url  = plugin_dir_url( __FILE__ );

require_once( $wpe_plugin_path . 'lib/core.php' );
require_once( $wpe_plugin_url . 'lib/admin.php' );

if( class_exists( 'WPE_Plugin' ) ) {
	$wpe_plugin = WPE_Plugin::get_instance();
}

if( class_exists( 'WPE_PluginAdmin' ) ) {
	$wpe_plugin_admin = WPE_PluginAdmin::get_instance();
}
