<?php
/**
 * Plugin Name: WooCommerce - Display Products by Custom Tax
 * Plugin URI: http://elvismdev.github.io/woocommerce-products-by-custom-tax
 * Description: List WooCommerce products by a custom taxonomy type for products using a shortcode, ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple,samsung" columns="4"]
 * Version: 1.1
 * Author: Elvis Morales
 * Author URI: https://twitter.com/n3rdh4ck3r
 * Requires at least: 3.5
 * Tested up to: 4.1
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
  }

  function req_woocommerce_notice() {
  	?>
  	<div class="error">
  		<p><?php _e( '<strong>WooCommerce - Display Products by Custom Tax</strong> plugin requires <a target="_blank" href="https://wordpress.org/plugins/woocommerce/">Woocommerce</a> core plugin to be installed and active.', 'woocommerce-products-by-custom-tax' ); ?></p>
  	</div>
  	<?php
  }

/*
 * List WooCommerce Products by custom taxonomy
 *
 * ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple,samsung" columns="4"]
 */
function woo_products_by_custom_tax_shortcode( $atts ) {
	global $woocommerce_loop;

	if ( empty( $atts ) ) return '';

	extract(shortcode_atts(array(
		'columns' 	=> '4',
		'tax_name' => '',
		'tax_tags' => ''
		), $atts));

	if ( $tax_name === '' || $tax_tags === '' ) return '';

	ob_start();

	$args = array(
		'post_type' => 'product',
		$tax_name => $tax_tags
		);

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;


	if( $products->have_posts() ) :

		woocommerce_product_loop_start();

	while ( $products->have_posts() ) : $products->the_post();

	wc_get_template_part( 'content', 'product' );

	endwhile;

	woocommerce_product_loop_end();

	else :

		_e('No product matching your criteria.');

	endif;

	wp_reset_postdata();

	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

}

/**
 * Check if WooCommerce is active and add the short code, if not active display an error.
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_shortcode("woo_products_custom_tax", "woo_products_by_custom_tax_shortcode");
} else {
	add_action( 'admin_notices', 'req_woocommerce_notice' );
}