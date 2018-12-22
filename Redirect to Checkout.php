<?php
/**
 * Redirect users after add to cart.
 */
function my_custom_add_to_cart_redirect( $url ) {

	$url = WC()->cart->get_checkout_url();
	// $url = wc_get_checkout_url(); // since WC 2.5.0

	return $url;

}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );