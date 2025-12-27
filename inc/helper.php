<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function __CHILD_THEME_SLUG__dump( $data ) {
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
        echo '<pre>';
        print_r( $data );
        echo '</pre>';
    }
}

