<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function __CHILD_THEME_SLUG__add_body_class( $classes ) {
    $classes[] = '__CHILD_THEME_SLUG__';
    return $classes;
}

add_filter( 'body_class', '__CHILD_THEME_SLUG__add_body_class' );

