<?php
/**
 * Shortcode Definitions
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode: [__CHILD_THEME_SLUG___button]
 */
function button_shortcode( $atts ) {

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
    __NAMESPACE__ . '\\button_shortcode'
);

