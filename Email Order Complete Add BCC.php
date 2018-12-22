

/* ADD BCC TO ORDER COMPLETE */
function sh_add_bcc_order_email( $headers, $email_id, $order ) {
	// list of possible values for $email_id can be found here http://www.mootpoint.org/blog/customising-woocommerce-notification-emails-hooks-filters/
	if ($email_id == 'customer_completed_order') {
		$bcc_email = "notify@email.com"; // change to the required email address here
		$headers .= 'BCC: ' . $bcc_email . "\r\n"; 
	}
	return $headers;
}
add_filter( 'woocommerce_email_headers', 'sh_add_bcc_order_email', 10, 3);