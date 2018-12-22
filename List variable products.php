

/* LIST VARIABLES */
function woocommerce_variable_add_to_cart() {
		global $product, $post;
		$variations = $product->get_available_variations();
		foreach ($variations as $key => $value) {
		?>
		<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>"method="post" enctype='multipart/form-data'>
			<input type="hidden" name="variation_id" value="<?php echo $value['variation_id']?>" />
			<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
			<?php
			if(!empty($value['attributes'])){
				foreach ($value['attributes'] as $attr_key => $attr_value) {
				?>
				<input type="hidden" name="<?php echo $attr_key?>" value="<?php echo $attr_value?>">
				<?php
				}
			}
			?>
			<table>
				<tbody>
					<tr>
						<td>
							<b><?php echo implode('/', $value['attributes']);?></b>
						</td>
						<td>
							<?php echo $value['price_html'];?>
						</td>
						<td>
							<button type="submit" class="single_add_to_cart_button button alt"><?php echo apply_filters('single_add_to_cart_text', __( 'Add to cart', 'woocommerce' ), $product->product_type); ?></button>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<?php
		}
}