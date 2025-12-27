<?php
/**
 * Template Functions
 *
 * @package __NAMESPACE__
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function render_hero() {
    get_template_part( 'template-parts/components/hero-section' );
}

