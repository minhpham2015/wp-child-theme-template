<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function __CHILD_THEME_SLUG__ajax_demo() {
    wp_send_json_success( [
        'message' => 'Ajax works',
    ] );
}

add_action( 'wp_ajax___CHILD_THEME_SLUG___demo', '__CHILD_THEME_SLUG__ajax_demo' );
add_action( 'wp_ajax_nopriv___CHILD_THEME_SLUG___demo', '__CHILD_THEME_SLUG__ajax_demo' );

