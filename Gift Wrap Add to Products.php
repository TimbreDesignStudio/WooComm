https://sarkware.com/woocommerce-change-product-price-dynamically-while-adding-to-cart-without-using-plugins/

<?php

function add_gift_wrap_field() {
    echo '<table class="variations" cellspacing="0">
            <tbody>
                <tr>
                    <td class="label"><label>Gift Wrap It</label></td>
                    <td class="value">
                        <label><input type="checkbox" name="option_gift_wrap" value="YES" /> This will add 100/- extra</label>                        
                    </td>
                </tr>                             
            </tbody>
        </table>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_gift_wrap_field' );

function save_gift_wrap_fee( $cart_item_data, $product_id ) {
     
    if( isset( $_POST['option_gift_wrap'] ) && $_POST['option_gift_wrap'] === 'YES' ) {
        $cart_item_data[ "gift_wrap_fee" ] = "YES";     
    }
    return $cart_item_data;
     
}
add_filter( 'woocommerce_add_cart_item_data', 'save_gift_wrap_fee', 99, 2 );

function calculate_gift_wrap_fee( $cart_object ) {  
    if( !WC()->session->__isset( "reload_checkout" )) {
        /* Gift wrap price */
        $additionalPrice = 100;
        foreach ( $cart_object->cart_contents as $key => $value ) {
            if( isset( $value["gift_wrap_fee"] ) ) {
                $orgPrice = floatval( $value['data']->price );
                $value['data']->price = ( $orgPrice + $additionalPrice );
            }
        }   
    }   
}
add_action( 'woocommerce_before_calculate_totals', 'calculate_gift_wrap_fee', 99 );

function render_meta_on_cart_and_checkout( $cart_data, $cart_item = null ) {
    $meta_items = array();
    /* Woo 2.4.2 updates */
    if( !empty( $cart_data ) ) {
        $meta_items = $cart_data;
    }
    if( isset( $cart_item["gift_wrap_fee"] ) ) {
        $meta_items[] = array( "name" => "Gift Wrap", "value" => "Yes" );
    }
    return $meta_items;
}
add_filter( 'woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 99, 2 );

function gift_wrap_order_meta_handler( $item_id, $values, $cart_item_key ) {
    if( isset( $values["gift_wrap_fee"] ) ) {
        wc_add_order_item_meta( $item_id, "Gift Wrap", 'Yes' );
    }
}
add_action( 'woocommerce_add_order_item_meta', 'gift_wrap_order_meta_handler', 99, 3 );



 //////* VARIATIONS *//////

 // MUTICHOICE //
function add_gift_wrap_field() {
    echo '<table class="variations" cellspacing="0">
            <tbody>
                <tr>
                    <td class="label"><label>Choose the options</label></td>
                    <td class="value">
                        <select name="option_gift_wrap">
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                        </select>                     
                    </td>
                </tr>                             
            </tbody>
        </table>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_gift_wrap_field' );

function calculate_gift_wrap_fee( $cart_object ) {
    /* Gift wrap price */
    $additionalPrice = 100;
    foreach ( $cart_object->cart_contents as $key => $value ) {       
        if( WC()->session->__isset( $key.'_gift_wrap_fee' ) ) {
            $quantity = intval( $value['quantity'] );
            $orgPrice = intval( $value['data']->price );
             
            $opt = WC()->session->get( $cart_item_key.'_gift_wrap_fee');
            if( $opt == "one" ) {
                $value['data']->price = ( ( $orgPrice + 100  ) * $quantity );
            } else if( $opt == "two" ) {
                $value['data']->price = ( ( $orgPrice + 120 ) * $quantity );
            } else if( $opt == "three" ) {
                $value['data']->price = ( ( $orgPrice + 140 ) * $quantity );
            }       
        }           
    }
}
add_action( 'woocommerce_before_calculate_totals', 'calculate_gift_wrap_fee', 1, 1 );

function save_gift_wrap_fee( $cart_item_key, $product_id = null, $quantity= null, $variation_id= null, $variation= null ) {
    if( isset( $_POST['option_gift_wrap'] ) ) {
        WC()->session->set( $cart_item_key.'_gift_wrap_fee', $_POST['option_gift_wrap'] );
    }
}
add_action( 'woocommerce_add_to_cart', 'save_gift_wrap_fee', 1, 5 );

// MULTICHOICE VARY BY PROD - MAY NOT WORK //
function force_individual_cart_items($cart_item_data, $product_id)
{
    $unique_cart_item_key = md5( microtime().rand() );
    $cart_item_data['unique_key'] = $unique_cart_item_key; 
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data','force_individual_cart_items', 10, 2 );

function my_custom_order_meta_handler( $item_id, $values, $cart_item_key ) {
    if( WC()->session->__isset( $cart_item_key.'_gift_wrap_fee' ) ) {
        wc_add_order_item_meta( $item_id, "gift_wrap", 'Yes' );
    }   
}
add_action( 'woocommerce_add_order_item_meta', 'my_custom_order_meta_handler', 1, 3 );



// FILTER ONLY CERTAIN PRODS //
function calculate_gift_wrap_fee( $cart_object ) {
    /* Gift wrap price */
    $additionalPrice = 100;
    foreach ( $cart_object->cart_contents as $key => $value ) {       
        if( has_term( "your_term", "product_cat", $value['product_id'] ) ) {
          // do your calculations
        }               
    }
}
add_action( 'woocommerce_before_calculate_totals', 'calculate_gift_wrap_fee', 1, 1 );
// OR.. //
function add_gift_wrap_field() {
    global $post;
    if( $post->ID == "your product id" ) {
    echo '<table class="variations" cellspacing="0">
            <tbody>
                <tr>
                    <td class="label"><label>Gift Wrap It</label></td>
                    <td class="value">
                        <label><input type="checkbox" name="option_gift_wrap" value="YES" /> This will add 100/- extra</label>                        
                    </td>
                </tr>                             
            </tbody>
        </table>';
    }
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_gift_wrap_field' );


