add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' ); 
function wc_custom_redirect_after_purchase() {
	global $wp;

	if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
		wp_redirect( 'http://www.yoururl.com/your-page/' );
		exit;
	}
}