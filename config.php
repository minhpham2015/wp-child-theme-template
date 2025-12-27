<?php
/**
 * Theme Configuration
 *
 * @package __NAMESPACE__
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Development Mode
 * 
 * Set to true to enable development features:
 * - Auto CSS compilation on page load
 * - Source maps
 * - Debug information
 * 
 * Set via environment variable: DEV_MODE=true
 * Or uncomment the line below and set to true
 */
if ( ! defined( 'DEV_MODE' ) ) {
    // Check environment variable first
    $dev_mode_env = getenv( 'DEV_MODE' );
    if ( $dev_mode_env !== false ) {
        define( 'DEV_MODE', filter_var( $dev_mode_env, FILTER_VALIDATE_BOOLEAN ) );
    } else {
        // Default: false (production mode)
        //define( 'DEV_MODE', false );
        
        // Uncomment and set to true to enable dev mode:
        define( 'DEV_MODE', true );
    }
}

