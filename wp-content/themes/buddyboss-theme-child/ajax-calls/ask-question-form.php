<?php

if ( is_user_logged_in() ) {
    add_action( 'wp_ajax_ask_question_ajax_call', 'ask_question_ajax_call' );

} else {
    add_action( 'wp_ajax_nopriv_ask_question_ajax_call', 'ask_question_ajax_call' );
}
function ask_question_ajax_call() {
    require_once(__DIR__ . '/actions/ask-question-form.php');
}