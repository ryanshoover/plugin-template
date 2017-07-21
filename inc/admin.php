<?php
/**
 * The admin version of the class
 * @package my-plugin
 */

namespace MyPlugin;

/**
 * Build the admin class
 */
class Admin extends Core {

    protected $title = '';

	/**
	 * Get a singleton
	 * @return class Singleton
	 */
	public static function get_instance() {
        static $instance = null;

        if ( null === $instance ) {
            $instance = new static();
        }

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

		parent::__construct();

        // Maybe Include CMB2.
        $this->maybe_include_cmb2();

        $this->title = __( 'My Plugin', SLUG );

        // Create an options page for the plugin.
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'cmb2_admin_init',  array( $this, 'add_options_metaboxes' ) );

	}

	/**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->options_slug, $this->options_slug );
    }

    /**
     * Include the CMB2 framework
     * only if not already loaded
     */
    private function maybe_include_cmb2() {
        if ( file_exists( PATH . '/lib/cmb2/init.php' ) ) {
            require_once PATH . '/lib/cmb2/init.php';
        }
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
		// Add a page inside Settings.
        add_options_page( $this->title, $this->title, 'manage_options', $this->options_slug, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB2
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb2-options-page <?php echo $this->options_slug; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb2_metabox_form( SLUG . '-plugin', SLUG, array( 'cmb_styles' => true ) ); ?>
        </div>
        <?php
    }

    /**
     * Create an options page
     *
     * Create an options page for the plugin
     */
    public function add_options_metaboxes() {

        $cmb_options = new_cmb2_box( array(
            'id'      => SLUG . '-plugin',
            'title'   => $this->title . __( 'Options', SLUG ),
            'hookup'  => false,
            'show_on' => array(
                'key'   => 'options-page',
                'value' => [ SLUG ]
            ),
        ) );
    }
}

Admin::get_instance();
