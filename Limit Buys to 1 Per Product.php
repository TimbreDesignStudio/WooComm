/* LIMIT BUYS TO 1 PER PRODUCT */
add_filter( 'woocommerce_is_sold_individually', '__return_true' );