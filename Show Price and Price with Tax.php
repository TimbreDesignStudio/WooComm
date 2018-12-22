/**
 * Appends a second product price, with or without tax, to the displayed prices.
 *
 * @param string price_html The original product price.
 * @param WC_Product product A product.
 * @return string
 * @author Aelia <support@aelia.co>
 */
add_filter('woocommerce_get_price_html', function($price_html, $product) {
  $price_incl_tax = $product->get_price_including_tax();
  $price_excl_tax = $product->get_price_excluding_tax();

  // No need to display two prices if the one with and without tax are the same
  if($price_incl_tax != $price_excl_tax) {
    $price_html .= '<span class="extra_price">';
    // Only enable the require line
    // The following line displays the price WITH tax
    //$price_html .= wc_price($product->get_price_including_tax());
    // The following line displays the price WITHOUT tax
    $price_html .= wc_price($product->get_price_excluding_tax());

    $price_html .= '</span>';
  }
  return $price_html;
}, 10, 2);