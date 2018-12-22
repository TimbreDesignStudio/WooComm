
/* CHANGE IN-STOCK & OUT OF STOCK */

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
   
   	// Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('Available!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
    	$availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}

/* CHANGE OUT OF STOCK ON CERTAIN PROD */
function availability_filter_func($availability) {
	
if(is_single( array(2230,2232,2234,2236)))$availability['availability'] = str_ireplace('Out of stock', 'your text here', $availability['availability']);

return $availability;
}