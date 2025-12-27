<?php
/**
 * Helper Functions
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dump( $data ) {
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
        echo '<pre>';
        print_r( $data );
        echo '</pre>';
    }
}

/**
 * Get ACF option value
 *
 * @param string $field_name The field name.
 * @param mixed  $default    Default value if field is empty.
 * @return mixed
 */
function get_acf_option( $field_name, $default = false ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, 'option' );
        return $value !== false && $value !== null ? $value : $default;
    }
    return $default;
}

