/* Add WooCommerce Bookings Data in the Cart */

add_filter( 'woocommerce_add_cart_item_data', array( $this, 'wdm_add_cities_to_cart' ), 11, 2 );

// the function accepts two parameters, the cart data and the product id
public function wdm_add_cities_to_cart( $cart_item_meta, $product_id ) {
    // let's consider that the user is logged in
    $user_id = get_current_user_id();
    if( 0 != $user_id)
    {
        // set the values as bookings meta
        $cart_item_meta['booking']['From'] = get_user_meta( $user_id, 'FROM', true );
        $cart_item_meta['booking']['To'] = get_user_meta( $user_id, 'TO', true );  
    }
    return $cart_item_meta;
}

