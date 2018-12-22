/**
 * @snippet       Add Conversion Tracking Code to Thank You Page
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=19964
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */
 
add_action( 'woocommerce_thankyou', 'bbloomer_conversion_tracking' );
 
function bbloomer_conversion_tracking() {
?>
<!-- Google Code for Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 000000000000;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "kjsdhfkjhkfsdfsdf";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/000000000000/?label=kjdhfsdjfkjkjshdkkkjsdkk&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php
}