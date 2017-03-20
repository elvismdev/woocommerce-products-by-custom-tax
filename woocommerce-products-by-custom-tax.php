<?php
/**
 * Plugin Name: WooCommerce - Display Products by Custom Tax
 * Plugin URI: http://elvismdev.github.io/woocommerce-products-by-custom-tax
 * Description: List WooCommerce products by a custom taxonomy type for products using a shortcode, ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple,samsung" columns="4" template="product" qty="10" order="DESC"]
 * Version: 2.2
 * Author: Elvis Morales
 * Author URI: http://elvismdev.io
 * Requires at least: 3.5
 * Tested up to: 4.7.3
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-products-by-custom-tax.php';



/**
 * Execute the plugin.
 */
function run_woocommerce_products_by_custom_tax() {
	$plugin = new WooCommerce_Products_By_Custom_Tax();
	$plugin->run();
}
run_woocommerce_products_by_custom_tax();