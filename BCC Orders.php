/* BCC EMAIL NEW ORDERS */

add_filter( 'woocommerce_email_headers', 'add_bcc_all_emails', 10, 3);

function add_bcc_all_emails( $headers, $email_id, $order ) {

    if( 'new_order' == $email_id ){
        $headers .= "Bcc: Name <timbredesign@gmail.com>" . "\r\n";
    }

    return $headers;
}


/* BCC EMAIL FOR ORDERS COMPLETED */

add_filter( 'woocommerce_email_headers', 'es_headers_filter_function', 10, 3);
 
function es_headers_filter_function( $headers, $id, $object ) {
    if ($id == 'customer_completed_order') {
        $headers .= 'BCC: Sales <timbredesign@gmail.com>' . "\r\n";
    }
 
    return $headers;
}