/*PUT THIS IN YOUR CHILD THEME FUNCTIONS FILE*/

/*STEP 1 - REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */

function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');



/*STEP 2 -ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT */

add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="'.$link.'" class="button addtocartbutton">View Product</a>');
}

/* Display a checkout link in a template file */

global $woocommerce;

if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) :
	echo '<a href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>';
endif;

/* Custom Redirect */

add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );

function custom_add_to_cart_redirect() {
     /**
      * Replace with the url of your choosing
      * e.g. return 'http://www.yourshop.com/'
      */
     return get_permalink( get_option('woocommerce_checkout_page_id') );
}