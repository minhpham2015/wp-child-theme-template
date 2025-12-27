<?php
/**
 * Initialize and Load Theme Files
 *
 * @package __NAMESPACE__
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/static.php';
require_once __DIR__ . '/hooks.php';
require_once __DIR__ . '/helper.php';
require_once __DIR__ . '/ajax.php';
require_once __DIR__ . '/shortcode.php';
require_once __DIR__ . '/template-functions.php';
require_once __DIR__ . '/acf.php';

