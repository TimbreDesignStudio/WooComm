<?php

http://www.remicorson.com/mastering-woocommerce-products-custom-fields/

//Display Fields
add_action( 'woocommerce_product_after_variable_attributes', 'variable_fields', 10, 2 );
//JS to add fields for new variations
add_action( 'woocommerce_product_after_variable_attributes_js', 'variable_fields_js' );
//Save variation fields
add_action( 'woocommerce_process_product_meta_variable', 'variable_fields_process', 10, 1 );
 
function variable_fields( $loop, $variation_data ) {
?>	
	<tr>
		<td>
			<div>
					<label></label>
					<input type="text" size="5" name="my_custom_field[]" value=""/>
			</div>
		</td>
	</tr>

<tr>
		<td>
			<div>
					<label></label>
					
			</div>
		</td>
	</tr>
<?php
}
 
function variable_fields_process( $post_id ) {
	if (isset( $_POST['variable_sku'] ) ) :
		$variable_sku = $_POST['variable_sku'];
		$variable_post_id = $_POST['variable_post_id'];
		$variable_custom_field = $_POST['my_custom_field'];
		for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
			$variation_id = (int) $variable_post_id[$i];
			if ( isset( $variable_custom_field[$i] ) ) {
				update_post_meta( $variation_id, '_my_custom_field', stripslashes( $variable_custom_field[$i] ) );
			}
		endfor;
	endif;
}

/* DISPLAY FIELD ON FRONT END*/

<?php if ( get_post_meta( get_the_ID(), 'thumb', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo esc_url( get_post_meta( get_the_ID(), 'thumb', true ) ); ?>" alt="<?php the_title_attribute(); ?>" />
    </a>
<?php endif; ?>

<?php

function get_post_meta( $post_id, $key = '', $single = false ) {
    return get_metadata('post', $post_id, $key, $single);
}


https://developer.wordpress.org/reference/functions/get_post_meta/