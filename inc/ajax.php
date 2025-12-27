<?php
/**
 * AJAX Handlers
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ajax_demo() {
    wp_send_json_success( [
        'message' => 'Ajax works',
    ] );
}

add_action( 'wp_ajax___CHILD_THEME_SLUG___demo', __NAMESPACE__ . '\\ajax_demo' );
add_action( 'wp_ajax_nopriv___CHILD_THEME_SLUG___demo', __NAMESPACE__ . '\\ajax_demo' );

