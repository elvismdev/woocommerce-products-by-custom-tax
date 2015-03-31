<?php
/**
 * Plugin Name: WooCommerce - Display Products by Custom Tax
 * Plugin URI: https://github.com/elvismdev/woocommerce-products-by-custom-tax
 * Description: List WooCommerce products by a custom taxonomy type for products using a shortcode, ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple,samsung"]
 * Version: 1.0
 * Author: Elvis Morales
 * Author URI: https://twitter.com/n3rdh4ck3r
 * Requires at least: 3.5
 * Tested up to: 4.1
 */

/*
 * List WooCommerce Products by custom taxonomy
 *
 * ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple,samsung"]
 */
function woo_products_by_custom_tax_shortcode( $atts ) {
	global $woocommerce_loop;

	if ( empty( $atts ) ) return '';

	// Get attributes
	extract(shortcode_atts(array(
		'columns' 	=> '4',
		'tax_name' => '',
		'tax_tags' => ''
	), $atts));

	if ( $tax_name === '' || $tax_tags === '' ) return '';

	ob_start();

	// Define Query Arguments
	$args = array(
				'post_type' => 'product',
				$tax_name => $tax_tags
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