<?php
/**
 * Advanced Custom Fields (ACF) Integration
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if ACF is active and register Theme Options page
 */
function __CHILD_THEME_PREFIX___register_acf_options_page() {
    
    // Check if ACF is active
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    // Register Theme Options page
    acf_add_options_page( [
        'page_title' => __( 'Theme Options', '__CHILD_THEME_SLUG__' ),
        'menu_title' => __( 'Theme Options', '__CHILD_THEME_SLUG__' ),
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-generic',
        'position'   => 30,
    ] );
}

add_action( 'acf/init',  '__CHILD_THEME_PREFIX___register_acf_options_page' );

