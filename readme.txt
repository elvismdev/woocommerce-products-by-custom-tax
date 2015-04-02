=== Woocommerce - Products By Custom Tax ===
Contributors: elvismdev
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YDTYTNUGMDR24
Tags: woocommerce, shortcode, custom, taxonomy
Requires at least: 3.5
Tested up to: 4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A shortcode to display products by a custom taxonomy.

== Description ==
[Shortcodes included with WooCommerce](http://docs.woothemes.com/document/woocommerce-shortcodes) lacks on the possibility to display products in post or pages filtering them by a custom taxonomy type.

For example in the scenario where we have a custom taxonomy type for products which is called Vendors and this one contains Apple, Samsung, LG, Motorola, Microsoft, ... as taxonomy tags elements. If we like to display only the products by Apple in a page or post, here this odd tweak plugin comes to the rescue.

= Usage =
`[woo_products_custom_tax tax_name="vendor" tax_tags="apple" columns="4"]`

= Attributes =
* **tax_name** *(string)*: The custom taxonomy slug
* **tax_tags** *(string)*: The custom taxonomy tags slug. Accepts also multiple tags as an array separated by comma *(tax_tags="apple,samsung")*
* **columns** *(integer)*: The ammount of products/colums to display per row


*Pull requests for fixes, new features and enhancements are welcome on [GitHub](https://github.com/elvismdev/woocommerce-products-by-custom-tax)* ;)

== Installation ==
1. Search for "Woocommerce - Products By Custom Tax" on the WordPress Plugin directory from your WordPress site dashboard or [download it](https://downloads.wordpress.org/plugin/woocommerce-products-by-custom-tax.zip).
2. Install the plugin.
3. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==
= Requirements =
This plugin requires [WooCommerce](https://wordpress.org/plugins/woocommerce) core plugin.


== Screenshots ==
1. The attributes

== Changelog ==
= 1.0 =
* Plugin initial release.
