/* IF PRODUCT IS IN ORDER TEMPLATE */
add_action( 'woocommerce_thankyou', 'bbloomer_check_order_product_id');
  
function bbloomer_check_order_product_id( $order_id ){
$order = new WC_Order( $order_id );
$items = $order->get_items(); 
foreach ( $items as $item ) {
   $product_id = $item['product_id'];
      if ( $product_id == XYZ ) {
        // do something
      }
}
}