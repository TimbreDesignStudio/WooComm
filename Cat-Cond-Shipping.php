// a function to check if the cart has product from organge and it's sub category id

function cart_has_product_with_orange_cats() {

//Check to see if user has product in cart

global $woocommerce;

//assigns a default negative value

$product_in_cart = false;



// start of the loop that fetches the cart items

foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {

	

	    $_product = $values['data'];

        $terms = get_the_terms( $_product->id, 'product_cat' );

		// second level loop search, in case some items have several categories

		if($terms){

            foreach ($terms as $term) {

            $_categoryid = $term->term_id;



			if (( $_categoryid === 569 ) || ( $_categoryid === 570 ) ) {

					//category is in cart!

					$product_in_cart = true;

			

				}

            }

			

		}

}

return $product_in_cart;

}







// add filter and function to hide method

add_filter( 'woocommerce_available_shipping_methods', 'custom_shipping_methods' , 10, 1 );

function custom_shipping_methods( $available_methods ){

	



	if ( cart_has_product_with_orange_cats() ) {



		foreach($available_methods as $key => $method){

			if( $key == 'local_delivery' || $key == 'local_pickup'){

				continue;

			}

			unset($available_methods[$key]);

		}

		// remove the rate you want

	}

	

	// return the available methods without the one you unset.

	return $available_methods;



}