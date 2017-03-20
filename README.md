# Woocommerce - Products By Custom Tax

A shortcode to display products by a custom taxonomy

## Description

[Shortcodes included with WooCommerce](http://docs.woothemes.com/document/woocommerce-shortcodes) lacks on the possibility to display products in post or pages filtering them by a custom taxonomy type.
By example in the scenario where we have a custom taxonomy type for products which is called Vendors and this one contains Apple, Samsung, LG, Motorola, Microsoft, ... as taxonomy tags elements. If we like to display only the products by Apple in a page or post, here this odd tweak plugin comes to the rescue.

## Usage

```
[woo_products_custom_tax tax_name="vendor" tax_tags="apple" columns="4" template="product" qty="10" order="DESC"]
```

## Attributes

* **tax_name** *(string) (required)*: The custom taxonomy slug.
* **tax_tags** *(string) (required)*: The custom taxonomy tags slug. Accepts also multiple tags as an array separated by comma *(tax_tags="apple,samsung")*.
* **columns** *(integer) (optional, default = 4)*: The ammount of products/colums to display per row.
* **template** *(string) (optional, default = 'product')*: Specifies the WooCommerce template file to use for displaying products. e.g. Instead of loading the default file `/wp-content/plugins/woocommerce/templates/content-product.php` you might want to use your custom template override file `/wp-content/themes/twentyfifteen/woocommerce/content-my-custom-product-file.php`. For this case you can load the template like *(template="my-custom-product-file")*.
* **qty** *(integer) (optional, default = 10)*: The ammount of products to display per page/output.
* **order** *(string) (optional, default = 'DESC')*: The order of products to display per page/output. 'ASC' - ascending order from lowest to highest values. 'DESC' - descending order from highest to lowest values.

## Pagination
For pagination support please install [Shortcode Pagination for WooCommerce](https://wordpress.org/plugins/shortcode-pagination-for-woocommerce/).


This plugin is also available from the [Official WordPress Plugin Directory](https://wordpress.org/plugins/woocommerce-products-by-custom-tax). Test and [rate it 5 stars!](https://wordpress.org/support/view/plugin-reviews/woocommerce-products-by-custom-tax?rate=5#postform)
