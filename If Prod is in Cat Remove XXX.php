
Add the following to your themes functions.php file to remove product imagery on products within the ‘Cookware’ category:

add_action( 'wp', 'remove_product_content' );
function remove_product_content() {
	// If a product in the 'Cookware' category is being viewed...
	if ( is_product() && has_term( 'Cookware', 'product_cat' ) ) {
		//... Remove the images
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
		// For a full list of what can be removed please see woocommerce-hooks.php
	}
}