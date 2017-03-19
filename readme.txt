=== Woocommerce - Products By Custom Tax ===
Contributors: elvismdev
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YDTYTNUGMDR24
Tags: woocommerce, shortcode, custom, taxonomy
Requires at least: 3.5
Tested up to: 4.3
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A shortcode to display products by a custom taxonomy.

== Description ==
[Shortcodes included with WooCommerce](http://docs.woothemes.com/document/woocommerce-shortcodes) lacks on the possibility to display products in post or pages filtering them by a custom taxonomy type.

For example in the scenario where we have a custom taxonomy type for products which is called Vendors and this one contains Apple, Samsung, LG, Motorola, Microsoft, ... as taxonomy tags elements. If we like to display only the products by Apple in a page or post, here this odd tweak plugin comes to the rescue.

= Usage =
`[woo_products_custom_tax tax_name="vendor" tax_tags="apple" columns="4" template="product" qty="10" order="DESC"]`

= Attributes =
* **tax_name** *(string) (required)*: The custom taxonomy slug.
* **tax_tags** *(string) (required)*: The custom taxonomy tags slug. Accepts also multiple tags as an array separated by comma *(tax_tags="apple,samsung")*.
* **columns** *(integer) (optional, default = 4)*: The ammount of products/colums to display per row.
* **template** *(string) (optional, default = "product")*: Specifies the WooCommerce template file to use for displaying products. e.g. Instead of loading the default file `/wp-content/plugins/woocommerce/templates/content-product.php` you might want to use your custom template override file `/wp-content/themes/twentyfifteen/woocommerce/content-my-custom-product-file.php`. For this case you can load the template like *(template="my-custom-product-file")*.
* **qty** *(integer) (optional, default = 10)*: The max ammount of products to display per page/output.
* **order** *(string) (optional, default = 'DESC')*: The order of products to display per page/output. 'ASC' - ascending order from lowest to highest values. 'DESC' - descending order from highest to lowest values.


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
= 1.5 =
* Feature - Added 'order' parameter.

= 1.3 =
* Feature - Addded ability to load custom product display template file.
* Fix - Prevent plugin directory listing.

= 1.2 =
* Misc - Prefix functions for better code standards.

= 1.1 =
* Prevent data leaks.
* Display error message in the dashboard in case WooCommerce core plugin is not installed and activated.

= 1.0 =
* Plugin initial release.
