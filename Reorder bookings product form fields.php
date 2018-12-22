/** 
 * A function to reorder the default display of fields on the WooCommerce Bookings form
 * Put this function in your theme's functions.php file
 */
function custom_order_booking_fields ( $fields ) {

	$reorder  = array();
	$reorder[] = $fields['wc_bookings_field_duration'];  // Duration
	$reorder[] = $fields['wc_bookings_field_resource'];  // Resource
	$reorder[] = $fields['wc_bookings_field_persons'];  // Persons
	$reorder[] = $fields['wc_bookings_field_start_date'];  // Calendar or Start Date

	return $reorder;
}
add_filter( 'booking_form_fields', 'custom_order_booking_fields');


