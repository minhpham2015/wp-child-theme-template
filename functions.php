<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load Composer autoloader (for scssphp/scssphp package)
if ( file_exists( get_stylesheet_directory() . '/vendor/autoload.php' ) ) {
    require_once get_stylesheet_directory() . '/vendor/autoload.php';
}

// Load configuration
require_once get_stylesheet_directory() . '/config.php';

// Load theme files
require_once get_stylesheet_directory() . '/inc/init-load.php';

