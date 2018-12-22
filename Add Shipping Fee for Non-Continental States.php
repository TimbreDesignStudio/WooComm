/**
 * @snippet       Add Shipping Fee for Non-Continental States
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=19954
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */
 
function bbloomer_add_cart_fee() {
global $woocommerce;
$noncontinental = array('AK','HI','PR');
if( in_array( WC()->customer->shipping_state, $noncontinental ) ) {
 $surcharge = 0.05 * WC()->cart->shipping_total; // 5% surcharge based on shipping cost
 $woocommerce->cart->add_fee( __('Non-continental Shipping', 'woocommerce'), $surcharge );
}
}
 
add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_add_cart_fee' );