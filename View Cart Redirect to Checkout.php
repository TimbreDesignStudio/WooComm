
/* VIEW CART BUTTON REDIRECT CHECKOUT */
function themeprefix_add_to_cart_redirect() {
	global $woocommerce;
	$checkout_url = $woocommerce->cart->get_checkout_url();
	return $checkout_url;
}
add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');

function mtpt_viewcart_text_string ( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'View Cart' :
            $translated_text = __( 'Proceed to Checkout', 'woocommerce' );
            break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'mtpt_viewcart_text_string', 20, 3 );