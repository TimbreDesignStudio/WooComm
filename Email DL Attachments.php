
function check_order_product_id( $order_id ){
$order = new WC_Order( $order_id );
$items = $order->get_items(); 
	foreach ( $items as $item ) {
		$product_id = $item['product_id'];

		if ( $product_id == XYZ ) {
			add_filter( 'woocommerce_email_attachments', 'attach_1_file_to_email', 10, 3);
		}

		if ( $product_id == XYZ ) {
			add_filter( 'woocommerce_email_attachments', 'attach_2_file_to_email', 10, 3);
		}
	}
}
add_action( 'woocommerce_thankyou', 'check_order_product_id');

function attach_1_file_to_email ( $attachments , $id, $object ) {
	$your_pdf_path = get_template_directory() . '/terms.pdf';
	$attachments[] = $your_pdf_path;
	return $attachments;
}

function attach_2_file_to_email ( $attachments , $id, $object ) {
	$your_pdf_path = get_template_directory() . '/terms.pdf';
	$attachments[] = $your_pdf_path;
	return $attachments;
}


function attach_1_file_to_email ( $attachments, $status , $order ) {
	$allowed_statuses = array( 'new_order', 'customer_invoice', 'customer_processing_order', 'customer_completed_order' );
	if( isset( $status ) && in_array ( $status, $allowed_statuses ) ) {
		$your_pdf_path = get_template_directory() . '/terms.pdf';
		$attachments[] = $pdf_path;
	}
	return $attachments;
}

