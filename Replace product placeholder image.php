/*
* goes in theme functions.php or a custom plugin. Replace the image filename/path with your own :)
*
**/
add_action( 'init', 'custom_fix_thumbnail' );
 
function custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
   
	function custom_woocommerce_placeholder_img_src( $src ) {
	$upload_dir = wp_upload_dir();
	$uploads = untrailingslashit( $upload_dir['baseurl'] );
	$src = $uploads . '/2012/07/thumb1.jpg';
	 
	return $src;
	}
}