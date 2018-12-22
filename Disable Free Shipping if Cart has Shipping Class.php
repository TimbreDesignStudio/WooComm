/**
 * @snippet       Disable Free Shipping if Cart has Shipping Class
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=19960
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */
 
add_filter( 'woocommerce_package_rates', 'businessbloomer_hide_free_shipping_for_shipping_class', 10, 2 );
  
function businessbloomer_hide_free_shipping_for_shipping_class( $rates, $package ) {
$shipping_class_target = 15; // shipping class ID (see screenshot below)
$in_cart = false;
foreach( WC()->cart->cart_contents as $key => $values ) {
 if( $values[ 'data' ]->get_shipping_class_id() == $shipping_class_target ) {
  $in_cart = true;
  break;
 } 
}
if( $in_cart ) unset( $rates['free_shipping'] );
return $rates;
}