<?php


class WooCommerce_Products_By_Custom_Tax_Admin {
	/**
	 * The ID of this plugin.
	 *
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Display no WooCommerce notice.
	 */
	function wpbct_no_woocommerce_notice() {
		if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-display.php' );
		}
	}

}