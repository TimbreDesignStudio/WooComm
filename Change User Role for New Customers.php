/**
 * @snippet       Change User Role for New Customers - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21979
 * @author        Rodolfo Melogli
 * @compatible    WC 2.6.14, WP 4.7.2, PHP 5.5.9
 */
 
///////////////////////////////
// 1. ADD NEW ROLE
 
add_role( 'pending', __('Pending' ),array(
'read' => true, 
)
);
 
///////////////////////////////
// 2. ASSIGN NEW ROLE
 
add_filter('woocommerce_new_customer_data', 'bbloomer_assign_custom_role', 10, 1);
 
function bbloomer_assign_custom_role($args) {
  $args['role'] = 'pending';
  return $args;
}