# Woocommerce Products By Custom Tax

A shortcode to display products by a custom taxonomy

## Description

[Shortcodes included with WooCommerce](http://docs.woothemes.com/document/woocommerce-shortcodes) lacks on the possibility to display products in post or pages filtering them by a custom taxonomy type.
By example in the scenario where we have a custom taxonomy type for products which is called Vendors and this one contains Apple, Samsung, LG, Motorola, Microsoft, ... as taxonomy tags elements. If we like to display only the products by Apple in a page or post, here this odd tweak plugin comes to the rescue.

## Usage

```
[woo_products_custom_tax tax_name="vendor" tax_tags="apple" columns="4"]
```

## Attributes

* **tax_name** *(string)*: The custom taxonomy slug
* **tax_tags** *(string)*: The custom taxonomy tags slug. Accepts also multiple tags as an array separated by comma *(tax_tags="apple,samsung")*
* **columns** *(integer)*: The ammount of products/colums to display per row
