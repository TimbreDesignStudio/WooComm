/**
 * Change the "Add to Cart" text on the single product page based on the product type
 *
 * @param string $text
 * @param object $product
 * @return string
 */
function wc_custom_single_addtocart_text( $text, $product ) {
    switch ( $product->product_type ) {
        case 'simple'  : $text = 'Simple product text'; break;
        case 'variable': $text = 'Variable product text'; break;
        case 'external': $text = 'External product text'; break;
        case 'grouped' : $text = 'Grouped product text'; break;
        default        : $text = 'Add to Cart'; break;
    }

    return $text;
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wc_custom_single_addtocart_text', 10, 2 );


/* Change the "Add to Cart" text? */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'funzione_cat_add_to_cart_text' );
function funzione_cat_add_to_cart_text( $default ) {
    global $post;
    $terms = get_the_terms( $post->ID, 'product_cat' );
    if ( array_key_exists( 10, $terms ) ) {
            $default = 'UTILIZZA IL CODICE GIFT CARD';
    } else {
        return $default;
    }
}


/* Change the "Add to Cart" text? */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'funzione_cat_add_to_cart_text', 10, 2 );
function funzione_cat_add_to_cart_text( $default, $product ) {
    $terms = get_the_terms( $product->id, 'product_cat' );

    foreach ( $terms as $term ) {
        if ( $term->name == 'Posters' ) {
            $default = __( 'Custom Text', 'domain' );
            break;
        }
    }

    return $default;
}