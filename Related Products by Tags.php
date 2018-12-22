We start with copying the get_related function (found in the /classes/abstracts/abstract-wc-product.php file of the WooCommerce plugin directory), renaming it as the get_related_custom function, and making a few minor edits – here’s the end result:

----ADD TO FUNC.PHP----

/* RELATED PROD TO TAGS */
function get_related_custom( $id, $limit = 5 ) {
    global $woocommerce;

    // Related products are found from category and tag
    $tags_array = array(0);
    $cats_array = array(0);

    // Get tags
    $terms = wp_get_post_terms($id, 'product_tag');
    foreach ( $terms as $term ) $tags_array[] = $term->term_id;

    // Get categories (removed by NerdyMind)
/*
    $terms = wp_get_post_terms($id, 'product_cat');
    foreach ( $terms as $term ) $cats_array[] = $term->term_id;
*/

    // Don't bother if none are set
    if ( sizeof($cats_array)==1 && sizeof($tags_array)==1 ) return array();

    // Meta query
    $meta_query = array();
    $meta_query[] = $woocommerce->query->visibility_meta_query();
    $meta_query[] = $woocommerce->query->stock_status_meta_query();

    // Get the posts
    $related_posts = get_posts( apply_filters('woocommerce_product_related_posts', array(
        'orderby'        => 'rand',
        'posts_per_page' => $limit,
        'post_type'      => 'product',
        'fields'         => 'ids',
        'meta_query'     => $meta_query,
        'tax_query'      => array(
            'relation'      => 'OR',
            array(
                'taxonomy'     => 'product_cat',
                'field'        => 'id',
                'terms'        => $cats_array
            ),
            array(
                'taxonomy'     => 'product_tag',
                'field'        => 'id',
                'terms'        => $tags_array
            )
        )
    ) ) );
    $related_posts = array_diff( $related_posts, array( $id ));
    return $related_posts;
}
add_action('init','get_related_custom');


Now that we’ve added the new function to our functions.php file, we can put the function to use by uploading the WooCommerce template file related.php to our template directory: /themes/current-theme/woocommerce/single-product/related.php (if you’re unfamiliar with over-riding WooCommerce templates, check out the documentation here), and making a quick edit.

On line 14 of the related.php file, we find a function call to the original get_related function, and we want to update this to use our new function:

>>>>  $related = get_related_custom($product->id);


As you see, the new function call passes in the product ID as a parameter.

If you complete the two steps above, you should now only see tag-related related products on individual product pages!
