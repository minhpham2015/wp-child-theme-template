<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode: [__CHILD_THEME_SLUG___button]
 */
function __CHILD_THEME_SLUG__button_shortcode( $atts ) {

    $atts = shortcode_atts(
        [
            'text' => 'Click me',
            'url'  => '#',
        ],
        $atts
    );

    return sprintf(
        '<a class="child-btn" href="%s">%s</a>',
        esc_url( $atts['url'] ),
        esc_html( $atts['text'] )
    );
}

add_shortcode(
    '__CHILD_THEME_SLUG___button',
    '__CHILD_THEME_SLUG__button_shortcode'
);

