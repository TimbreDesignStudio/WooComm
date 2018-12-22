add_filter (add_to_cart_redirect, redirect_elsewhere);
function redirect_elsewhere() {

global $woocommerce;

//Get product ID
$product_id = (int)
apply_filters(‘woocommerce_add_to_cart_product_id’, $_POST[‘product_id’]);

if( has_term( ‘waiver’, ‘product_tag’, $product_id ) ){
//Set redirect URL
$redirect_url = ‘ https://mySitePageContaining-waiver/‘;
//Return the new URL
return $redirect_url;
};
}

/* Custom Redirect */

add_filter ('add_to_cart_redirect', 'redirect_to_previousCat');

function redirect_to_previousCat( $url ) {
    $product_id = absint( $_REQUEST['add-to-cart'] );
    $product_tag_slug = '';

    $terms = get_the_terms( $product_id, ‘product_tag’ );
    foreach ( $terms as $term ) {
        $product_tag = $term->slug;
        break;
    }
    if( $product_cat_slug ){
        $url = add_query_arg( ‘product_tag’, $product_tag_slug, site_url() );
    }
    return $url;
}