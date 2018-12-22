
function dequeueYITHOnOrderPage() {
    if (is_page('wholesale-page')) // adjust this to the slug of your wholesale ordering page, wholesale-page is the default
        wp_dequeue_script( 'jquery-yith-wcwl' );
}
 
add_action('wp_enqueue_scripts', 'dequeueYITHOnOrderPage', 999);