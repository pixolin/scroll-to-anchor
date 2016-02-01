<?php
// This file is based on wp-includes/js/tinymce/langs/wp-langs.php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function sta_tinymce_button_translation() {
    $strings = array(
        'Anchor' => __('Anchor', 'textdomain'),
        'Insert anchor' => __('Insert anchor', 'textdomain'),
        'Anchor name' => __('Anchor name', 'textdomain'),
        'CSS-Class (optional)' => __('CSS-Class (optional)', 'textdomain')
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.sta-tc-button", ' . json_encode( $strings ) . ");\n";

     return $translated;
}

$strings = sta_tinymce_button_translation();
