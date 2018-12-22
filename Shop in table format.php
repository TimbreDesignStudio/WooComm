/**
 * @snippet       Edit WooCommerce Product Loop Items Display
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=26658
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.0.4
 */
 
// -------------------------
// 1. Change number of products per row to 1
// Note: this is specific to Storefront theme
// See https://docs.woocommerce.com/document/change-number-of-products-per-row/
 
add_filter('storefront_loop_columns', 'loop_columns');
 
function loop_columns() {
return 1;
}
 
// -------------------------
// 2. Remove default image, price, rating, add to cart
 
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
// -------------------------
// 3. Remove sale flash (Storefront)
 
add_action( 'init', 'bbloomer_hide_storefront_sale_flash' );
 
function bbloomer_hide_storefront_sale_flash() {
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
}
 
// -------------------------
// 4. Add <div> before product title
 
add_action( 'woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_flex_open', 8 );
function bbloomer_loop_product_div_flex_open() {
echo '<div class="product_table">';
}
 
// -------------------------
// 5. Wrap product title into a <div> with class "one_third"
 
add_action( 'woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 9 );
function bbloomer_loop_product_div_wrap_open() {
echo '<div class="one_third">';
}
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 6 );
function bbloomer_loop_product_div_wrap_close() {
echo '</div>';
}
 
// -------------------------
// 6. Re-add and Wrap price into a <div> with class "one_third"
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 7 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 8 );
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 9 );
 
// -------------------------
// 7. Re-add and Wrap add to cart into a <div> with class "one_third"
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 11 );
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 12 );
 
// -------------------------
// 8. Close <div> at the end of product title, price, add to cart divs
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_flex_close', 13 );
function bbloomer_loop_product_div_flex_close() {
echo '</div>';
}



/* CSS */
@media (min-width: 768px) {
 
.site-main ul.products li.product {
    width: 100%;
    float: none;
    margin: 0;
}
 
.site-main ul.products {
border-right: 1px solid;
border-bottom: 1px solid;
margin: 1em 0;
}
 
.site-main ul.products li.product .product_table {
  display: flex;
  flex-wrap: wrap;
}
 
.site-main ul.products li.product div.one_third {
    width: 33.3%;
    float: left;
    margin: 0;
    text-align: left;
    background-color: #eee;
    border-left: 1px solid;
    border-top: 1px solid;
    padding: 1em 2em;
    box-sizing: border-box;
    flex-grow: 1;
    overflow: hidden;
}
 
}