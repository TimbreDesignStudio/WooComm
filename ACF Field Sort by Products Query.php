<?php

/* SORT PRODUCTS BY ACF FIELD */
function custom_acffield_product_query( $q ){
    $meta_query = $q->get( 'meta_query' );
    $meta_query[] = array(
        'key' => 'custom_acf_key',
        'value' => 'custom_acf_value',
        'compare' => '='
        );

    $q->set( 'meta_query', $meta_query );
}
add_action( 'woocommerce_product_query', 'custom_acffield_product_query' );