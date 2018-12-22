/**
 * Redirect users after add to cart.
 */
function my_custom_add_to_cart_redirect( $url ) {
	if ( ! isset( $_REQUEST['add-to-cart'] ) || ! is_numeric( $_REQUEST['add-to-cart'] ) ) {
		return $url;
	}
	$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_REQUEST['add-to-cart'] ) );
	// Only redirect products that have the 't-shirts' category
	if ( has_term( 't-shirts', 'product_cat', $product_id ) ) {
		$url = WC()->cart->get_checkout_url();
	}
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );



/* CART REDIRECT */    

add_filter ('add_to_cart_redirect', 'redirect_to_checkout');
    function redirect_to_checkout() {
            global $woocommerce;

            //Get product ID
            $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint($_REQUEST['add-to-cart'] ) );
            //Check if product ID is in a certain taxonomy
            if( has_term( 'Philanthropy', 'product_cat', $product_id ) ){
                        //Get cart URL
                        $checkout_url = get_permalink(get_option('woocommerce_checkout_page_id'));
                        //Return the new URL
                    return $checkout_url;
             };
    }



/* CART REDIRECT TO CHECKOUT */ 

add_filter( 'woocommerce_add_to_cart_redirect', 'wc_redirectfortaxonomy' );
function wc_redirectfortaxonomy() {
global $woocommerce;
// Get product ID
if ( isset( $_POST['add-to-cart'] ) ) {
    $product_id = (int) apply_filters( 'woocommerce_add_to_cart_product_id', $_POST['add-to-cart'] );   
    // Check if product ID is in the taxonomy we want to redirect to checkout for 
    if ( has_term( 'payments', 'product_cat', $product_id ) )
        // Set redirect URL         
        $checkout_url = $woocommerce->cart->get_checkout_url();
        $redirect_url = $checkout_url;
        // Return the new URL
        return $redirect_url;
    }
}


/* BOOK RETURN REDIRECT */

function redirect_to_previousCat( $url ) {if ( isset( $_POST['add-to-cart'] ) )
{  
    $product_id = (int) apply_filters('woocommerce_add_to_cart_product_id', $_POST['add-to-cart'] );
    $terms = get_the_terms( $product_id, 'product_cat' );
    foreach($terms as $term) {
        $product_cat_slug = $term->slug;      
        break; 
    }    

	if( $product_cat_slug ){
   	$url = get_term_link( $product_cat_slug, 'product_cat' );    
	}
    }
return $url;
}
add_filter( 'add_to_cart_redirect', 'redirect_to_previousCat' );
