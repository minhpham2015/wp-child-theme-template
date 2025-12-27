<?php
/**
 * Auto Build CSS in Development Mode
 *
 * @package __NAMESPACE__
 */

namespace __NAMESPACE__;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Auto-compile CSS when in development mode
 */
function auto_compile_css() {
    // Only run in development mode
    if ( ! defined( 'DEV_MODE' ) || ! DEV_MODE ) {
        return;
    }

    // Check if sass is available (cross-platform)
    $node_modules = get_stylesheet_directory() . '/node_modules';
    if ( ! is_dir( $node_modules ) ) {
        return;
    }

    // Try to find sass executable
    $sass_path = null;
    $sass_bin = get_stylesheet_directory() . '/node_modules/.bin/sass';
    
    // Check for Unix/Linux/Mac
    if ( file_exists( $sass_bin ) && is_executable( $sass_bin ) ) {
        $sass_path = $sass_bin;
    }
    // Check for Windows
    elseif ( file_exists( $sass_bin . '.cmd' ) ) {
        $sass_path = $sass_bin . '.cmd';
    }
    // Try npx as fallback
    elseif ( ! empty( shell_exec( 'which npx 2>/dev/null || where npx 2>nul' ) ) ) {
        $sass_path = 'npx sass';
    }
    
    if ( ! $sass_path ) {
        return;
    }

    $scss_file = get_stylesheet_directory() . '/assets/scss/main.scss';
    $css_file = get_stylesheet_directory() . '/assets/css/main.css';

    // Check if SCSS file exists
    if ( ! file_exists( $scss_file ) ) {
        return;
    }

    // Check if CSS needs compilation (SCSS is newer than CSS)
    if ( file_exists( $css_file ) ) {
        $scss_mtime = filemtime( $scss_file );
        $css_mtime = filemtime( $css_file );
        
        // If CSS is newer or same, skip compilation
        if ( $css_mtime >= $scss_mtime ) {
            return;
        }
    }

    // Compile SCSS to CSS
    if ( strpos( $sass_path, 'npx' ) === 0 ) {
        // Use npx command
        $command = sprintf(
            'cd %s && npx sass %s %s --style=expanded --source-map 2>&1',
            escapeshellarg( get_stylesheet_directory() ),
            escapeshellarg( $scss_file ),
            escapeshellarg( $css_file )
        );
    } else {
        // Use direct sass path
        $command = sprintf(
            'cd %s && %s %s:%s --style=expanded --source-map 2>&1',
            escapeshellarg( get_stylesheet_directory() ),
            escapeshellarg( $sass_path ),
            escapeshellarg( $scss_file ),
            escapeshellarg( $css_file )
        );
    }

    // Execute compilation (suppress output in production-like environments)
    @exec( $command, $output, $return_code );
}

// Hook to compile CSS on page load in dev mode
add_action( 'init', __NAMESPACE__ . '\\auto_compile_css', 1 );

