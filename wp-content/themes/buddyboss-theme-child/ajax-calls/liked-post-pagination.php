<?php

if ( is_user_logged_in() ) {
    add_action( 'wp_ajax_liked_post_pagination_ajax_call', 'liked_post_pagination_ajax_call' );

} else {
    add_action( 'wp_ajax_nopriv_liked_post_pagination_ajax_call', 'liked_post_pagination_ajax_call' );
}
function liked_post_pagination_ajax_call() {
    require_once(__DIR__ . '/actions/liked-post-pagination.php');
}