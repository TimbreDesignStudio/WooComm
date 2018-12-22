Hook Into WooCommerce to Trigger Something After an Order is Placed

add_action('woocommerce_payment_complete', 'custom_process_order', 10, 1);
function custom_process_order($order_id) {
    $order = new WC_Order( $order_id );
    $myuser_id = (int)$order->user_id;
    $user_info = get_userdata($myuser_id);
    $items = $order->get_items();
    foreach ($items as $item) {
        if ($item['product_id']==24) {
          // Do something clever
        }
    }
    return $order_id;
}