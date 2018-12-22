function my_new_paypal_icon() {
     // picture of accepted credit card icons for PayPal payments
     return get_stylesheet_directory_uri() . 'somefolder/images/your-new-image.jpg';
}
add_filter( 'woocommerce_paypal_icon', 'my_new_paypal_icon' );