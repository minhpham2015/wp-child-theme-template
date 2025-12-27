<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function __CHILD_THEME_SLUG__enqueue_assets() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        '__CHILD_THEME_SLUG__-style',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        [],
        $version
    );

    wp_enqueue_script(
        '__CHILD_THEME_SLUG__-script',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [ 'jquery' ],
        $version,
        true
    );

    wp_localize_script(
        '__CHILD_THEME_SLUG__-script',
        '__CHILD_THEME_SLUG__Data',
        [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
        ]
    );
}

add_action( 'wp_enqueue_scripts', '__CHILD_THEME_SLUG__enqueue_assets' );

