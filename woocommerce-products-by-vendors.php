<?php
/**
 * Plugin Name: WooCommerce - Display Products by Custom Tax
 * Plugin URI: https://github.com/elvismdev/woocommerce-products-by-custom-tax
 * Description: List WooCommerce products by a custom taxonomy type for products using a shortcode, ex: [woo_products_custom_tax tax="apple,android"]
 * Version: 1.0
 * Author: Elvis Morales
 * Author URI: https://twitter.com/n3rdh4ck3r
 * Requires at least: 3.5
 * Tested up to: 4.1
 *
 * Text Domain: -
 * Domain Path: -
 *
 */

/*
 * List WooCommerce Products by custom taxonomy
 *
 * ex: [woo_products_custom_tax tax="apple,android"]
 */
function woo_products_by_custom_tax_shortcode( $atts ) {
	global $woocommerce_loop;

	if ( empty( $atts ) ) return '';

	// Get attributes
	extract(shortcode_atts(array(
		'columns' 	=> '4',
		'vendors' => ''
	), $atts));

	ob_start();

	// Define Query Arguments
	$args = array(
				'post_type' 	 => 'product',
				'posts_per_page' => 5,
				'vendor' 	 => $vendors
				);

	// Create the new query
	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;


	// If results
	if( $products->have_posts() ) :

		woocommerce_product_loop_start();

			// Start the loop
			while ( $products->have_posts() ) : $products->the_post();

				wc_get_template_part( 'content', 'product' );

			endwhile;

		woocommerce_product_loop_end();

	else :

		_e('No product matching your criteria.');

	endif; // endif $product_count > 0

	wp_reset_postdata();

	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

}

add_shortcode("woo_products_custom_tax", "woo_products_by_custom_tax_shortcode");