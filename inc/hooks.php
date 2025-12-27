<?php
/**
 * WordPress Hooks and Filters
 *
 * @package __NAMESPACE__
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function __CHILD_THEME_PREFIX___add_body_class( $classes ) {
    $classes[] = '__CHILD_THEME_SLUG__';
    return $classes;
}

add_filter( 'body_class',  '__CHILD_THEME_PREFIX___add_body_class' );

