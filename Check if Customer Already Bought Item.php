/* CHECK IF CUSTOMER ALREADY BOUGHT ITEM */
 
function user_logged_in_product_already_bought() {
if ( is_user_logged_in() ) {
global $product;
$current_user = wp_get_current_user();
if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id ) ) echo '<div class="user-bought">&hearts; Hey ' . $current_user->first_name . ', you\'ve purchased this in the past. Buy again?</div>';
}
}
add_action ( 'woocommerce_after_shop_loop_item', 'user_logged_in_product_already_bought', 30);