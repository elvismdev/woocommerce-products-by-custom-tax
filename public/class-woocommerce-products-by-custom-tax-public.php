<?php


class WooCommerce_Products_By_Custom_Tax_Public {
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * List WooCommerce Products by custom taxonomy
 	 *
 	 * ex: [woo_products_custom_tax tax_name="vendor" tax_tags="apple" columns="4" template="product" qty="10" order="DESC"]
 	 */
	function wpbct_shortcode( $atts, $content = null ) {
		// If shortcode doesn't have attributes, exit this function 
		if ( empty( $atts ) ) return '';

		// Extract shortcode attributes
		extract( shortcode_atts( array(
		'tax_name' => '', // Required
		'tax_tags' => '', // Required
		'columns' => '4', // Optional
		'template' => 'product', // Optional
		'qty' => '10', // Optional
		'order' => 'DESC' // Optional
		), $atts) );

		// If we don't have a tax_name or tax_tags exist this function.
		if ( $tax_name === '' || $tax_tags === '' ) return '';

		// Gather global $woocommerce_loop
		global $woocommerce_loop;


		// Prepare shortcode arguments
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => sanitize_text_field( $qty ),
			$tax_name => sanitize_text_field( $tax_tags ),
			'order' => sanitize_text_field( $order )
			);

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		ob_start();

		if( $products->have_posts() ) :

			woocommerce_product_loop_start();

		while ( $products->have_posts() ) : $products->the_post();

		wc_get_template_part( 'content', $template );

		endwhile;

		woocommerce_product_loop_end();

		else :

			_e('No product matching your criteria.');

		endif;

		wp_reset_postdata();

		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

	}

	/**
	 * Register shortcode.
	 */
	public function register_shortcode() {
		add_shortcode( 'woo_products_custom_tax', array( &$this, 'wpbct_shortcode' ) );
	}

	/**
	 * Support Pagination powered by Shortcode Pagination for WooCommerce plugin
	 * https://wordpress.org/plugins/shortcode-pagination-for-woocommerce/
	 * @param array $shortcodes
	 * @return array
	 */
	public function pagination_support( $shortcodes ) {
		$shortcodes[] = 'woo_products_custom_tax';
		return $shortcodes;
	}
	
}