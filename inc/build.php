<?php
/**
 * Auto Build CSS in Development Mode
 *
 * Uses scssphp/scssphp composer package to automatically compile SCSS to CSS
 * on page load when DEV_MODE is enabled.
 *
 * @package __NAMESPACE__
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Auto-compile CSS when in development mode
 * 
 * Automatically compiles SCSS to CSS on each page load when DEV_MODE is enabled.
 * Uses the scssphp/scssphp composer package for PHP-based SCSS compilation.
 */
function __CHILD_THEME_PREFIX___auto_compile_css() {
    // Only run in development mode
    if ( ! defined( 'DEV_MODE' ) || ! DEV_MODE ) {
        return;
    }

    // Check if scssphp is available
    if ( ! class_exists( 'ScssPhp\\ScssPhp\\Compiler' ) ) {
        return;
    }

    $scss_file = get_stylesheet_directory() . '/assets/scss/main.scss';
    $css_file = get_stylesheet_directory() . '/assets/css/main.css';
    $css_dir = dirname( $css_file );

    // Check if SCSS file exists
    if ( ! file_exists( $scss_file ) ) {
        return;
    }

    // Ensure CSS directory exists
    if ( ! is_dir( $css_dir ) ) {
        wp_mkdir_p( $css_dir );
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

    try {
        // Initialize SCSS compiler
        $compiler = new \ScssPhp\ScssPhp\Compiler();
        
        // Set import paths
        $compiler->setImportPaths( [
            get_stylesheet_directory() . '/assets/scss',
        ] );

        // Set output style (expanded for development)
        $compiler->setOutputStyle( \ScssPhp\ScssPhp\OutputStyle::EXPANDED );

        // Read SCSS file
        $scss_content = file_get_contents( $scss_file );
        
        if ( $scss_content === false ) {
            return;
        }

        // Compile SCSS to CSS
        $css_content = $compiler->compileString( $scss_content )->getCss();

        // Write CSS file
        file_put_contents( $css_file, $css_content );
        
        // Set file permissions
        @chmod( $css_file, 0644 );

    } catch ( \Exception $e ) {
        // Silently fail in production, but log in debug mode
        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            error_log( 'SCSS Compilation Error: ' . $e->getMessage() );
        }
    }
}

// Hook to compile CSS on page load in dev mode
add_action( 'init', '__CHILD_THEME_PREFIX___auto_compile_css');

