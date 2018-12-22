/**
 * @snippet       Display Sales to Admin @ FrontEnd
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=19967
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */
 
function bbloomer_show_sales_to_admin() {
global $product, $post;
if ( current_user_can( 'administrator' ) ) {
echo '<div class="sales-admin"><b>SALES (admin-only):</b><ol>';
$orders = get_posts( array(
        'post_type'   => 'shop_order',
        'post_status' => 'wc-completed'
) );
foreach ($orders as $order) {
 $order = new WC_Order($order->ID);
 $items = $order->get_items();
 foreach($items as $item) {
  $product_id = $item['product_id'];
  if ($post->ID == $product_id) { echo '<li>' . $order->billing_first_name . ' ' . $order->billing_last_name . '</li>'; }   
  }            
} 
echo '</ol></div>';
}
}
 
add_action('woocommerce_after_shop_loop_item','bbloomer_show_sales_to_admin', 10);

.sales-admin {
text-align:left;
margin: 5% auto;
padding: 0 5%;
border: 1px dashed red;
font-size: 14px;
}