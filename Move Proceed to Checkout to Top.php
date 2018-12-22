/* MOVE PROCEED TO CHECKOUT TO TOP */
add_action( 'woocommerce_cart_actions', 'move_proceed_button' );
function move_proceed_button( $checkout ) {
	echo '<a href="' . esc_url( WC()->cart->get_checkout_url() ) . '" class="checkout-button button alt wc-forward" >' . __( 'Proceed to Checkout', 'woocommerce' ) . '</a>';
}