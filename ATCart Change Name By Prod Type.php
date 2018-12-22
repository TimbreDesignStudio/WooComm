<?php
//* Change Add To Cart to Select Options
//add_filter( 'woocommerce_product_add_to_cart_text' , 'sfws_woocommerce_product_add_to_cart_text' );
function sfws_woocommerce_product_add_to_cart_text() {
 global $product;
 
 $product_type = $product->product_type;
 
 switch ( $product_type ) {
 case 'external':
 return __( 'Buy product', 'woocommerce' );
 break;
 case 'grouped':
 return __( 'View products', 'woocommerce' );
 break;
 case 'simple':
 return __( 'Select Options', 'woocommerce' );
 break;
 case 'variable':
 return __( 'Select options', 'woocommerce' );
 break;
 default:
 return __( 'Read more', 'woocommerce' );
 }
 
}