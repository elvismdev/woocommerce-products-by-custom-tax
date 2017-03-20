<?php


class WooCommerce_Products_By_Custom_Tax {
	/**
	 * @access   protected
	 * @var      Site_Wide_Info_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;
	/**
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;
	/**
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	/**
	 * Define the core functionality of the plugin.
	 */
	public function __construct() {
		$this->plugin_name = 'woocommerce-products-by-custom-tax';
		$this->version = '2.0';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	/**
	 * Load the required dependencies for this plugin.
	 * @access   private
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woocommerce-products-by-custom-tax-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-woocommerce-products-by-custom-tax-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-woocommerce-products-by-custom-tax-public.php';
		$this->loader = new WooCommerce_Products_By_Custom_Tax_Loader();
	}
	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new WooCommerce_Products_By_Custom_Tax_Admin( $this->get_plugin_name(), $this->get_version() );
		// Display backend error notification if WooCommerce is not active.
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'wpbct_no_woocommerce_notice' );	
	}
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new WooCommerce_Products_By_Custom_Tax_Public( $this->get_plugin_name(), $this->get_version() );
		// Register the shortcode.
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcode' );

		// Adds compatibility with Shortcode Pagination for WooCommerce plugin to provide pagination for this shortcode.
		// https://wordpress.org/plugins/shortcode-pagination-for-woocommerce/
		$this->loader->add_filter( 'jck-wsp-shortcodes', $plugin_public, 'pagination_support' );
	}
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 */
	public function run() {
		$this->loader->run();
	}
	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress.
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Site_Wide_Info_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}