<?php
/**
 * WordPress Hooks and Filters
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function add_body_class( $classes ) {
    $classes[] = '__CHILD_THEME_SLUG__';
    return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\add_body_class' );

