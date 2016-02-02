<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

if( !function_exists( 'sta_tinymce_button_translation' ) ) {
  function sta_tinymce_button_translation() {
      $strings = array(
          'Anchor' => __('Anchor', 'scroll-to-anchor'),
          'Insert anchor' => __('Insert anchor', 'scroll-to-anchor'),
          'Anchor name' => __('Anchor name', 'scroll-to-anchor'),
          'CSS-Class (optional)' => __('CSS-Class (optional)', 'scroll-to-anchor')
      );
      $locale = _WP_Editors::$mce_locale;
      $translated = 'tinyMCE.addI18n("' . $locale . '.sta-tc-button", ' . json_encode( $strings ) . ");\n";

       return $translated;
  }

  $strings = sta_tinymce_button_translation();
}
