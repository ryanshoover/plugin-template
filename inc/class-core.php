<?php
/**
 * The core class of the plugin
 * @package my-plugin
 */
namespace MyPlugin;

/**
 * Build the core class
 */
class Core {

	protected $options_slug;

	/**
	 * Get a singleton
	 * @return class Singleton
	 */
	public static function get_instance() {

        static $instance = null;

        if ( null === $instance )
			$instance = new static();

        return $instance;
    }

	/**
	 * Hide from the outside world
	 */
	private function __clone(){}

	/**
	 * Hide from the outside world
	 */
    private function __wakeup(){}

	/**
	 * Construct the class
	 */
	protected function __construct() {
		$this->options_slug = SLUG . '-options';
	}
}

Core::get_instance();
