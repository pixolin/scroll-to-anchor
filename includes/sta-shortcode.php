<?php
/*
 * Shortcode
 * Adds shortcode to easily add anchors in Text
 */

add_action( 'init', 'sta_register_shortcode' );
if ( ! function_exists( 'sta_register_shortcode' ) ) {
	function sta_register_shortcode() {
		add_shortcode( 'sta_anchor', 'sta_anchor' );
	}
}

if ( ! function_exists( 'sta_anchor' ) ) {
	function sta_anchor( $atts, $content = null ) {

		//Shortcode Attributes
		$pairs = array(
			'id' => '',    // id of the anchor, sanitized, e.g. summary-chapter-two
			'unsan' => '', // *unsan*itized name of the anchor, e.g. Summary Chapter Two
			'class' => '', // CSS class, if provided by user
		);

		$a = shortcode_atts( $pairs, $atts );

		$sta_anchorname = strtolower( str_replace( ' ', '-', $a['id'] ) );

		//fetch option to see whether anchor should be displayed
		$current = (array) get_option( 'scroll_to_anchor' );

		//create the html output,
		$html = '<span id="' . $sta_anchorname . '" ';

		//add classes and optionally display anchor according to user settings
		if ( ! isset( $current['show'] ) || 'hidden' == $a['class'] ) {
			$html .= 'class="sta-anchor ' . $a['class'] . '" aria-hidden="true">';
		} else {
			$html .= 'class="sta-anchor ' . $a['class'] . '">' . esc_attr( $current['label'] ) . ': ';
			if ( $a['unsan'] ) {
				$html .= $a['unsan'];
			} else {
				$html .= $a['id'];
			}
			$html .= '&nbsp';
		}

		$html .= $content . '</span>';

		//and finally return it.
		return $html;
	}
}
