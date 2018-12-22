

/* REMOVE BILLING FIELDS */
add_action('init','remove_billing_info_and_additional_notes_wc');
 
function remove_billing_info_and_additional_notes_wc() {
    if (!(is_admin())) {        
        //Run this code only in frontend
        global $woocommerce;
        if (is_object($woocommerce)) {
             
            //WooCommerce Plugin activated
            if (function_exists('WC')) {
                 
                $wc_checkout_instance=WC()->checkout();              
                //Remove hooks
                remove_action('woocommerce_checkout_billing', array($wc_checkout_instance, 'checkout_form_billing'));
                remove_action( 'woocommerce_checkout_shipping', array( $wc_checkout_instance,'checkout_form_shipping' ) );
            }   
         
        }
    }   
}

/* UNSET BILLING FIELDS */
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_city']);
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );