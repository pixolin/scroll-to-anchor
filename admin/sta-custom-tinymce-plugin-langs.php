<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '_WP_Editors' ) ) {
	require( ABSPATH . WPINC . '/class-wp-editor.php' );
}

function sta_custom_tinymce_plugin_translation() {
	$strings = array(
		'Anchor'                          => __( 'Anchor', 'scroll-to-anchor' ),
		'insert_anchor'                   => __( 'Insert anchor', 'scroll-to-anchor' ),
		'anchor_name'                     => __( 'Anchor name', 'scroll-to-anchor' ),
		'css_class'                       => __( 'CSS class', 'scroll-to-anchor' ),
		'Please provide an anchor name!'  => __( 'Please provide an anchor name', 'scroll-to-anchor' ),
		'Link'                            => _x( 'Link', 'string has to end with #-sign', 'scroll-to-anchor' ),
	);
	$locale = _WP_Editors::$mce_locale;
	$translated = 'tinyMCE.addI18n("' . $locale . '", ' . json_encode( $strings ) . ");\n";

	return $translated;
}

$strings = sta_custom_tinymce_plugin_translation();
