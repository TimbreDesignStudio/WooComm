/* Display 24 products per page. */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 18;' ), 20 );