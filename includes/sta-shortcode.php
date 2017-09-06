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

		$sta_id = esc_attr( $a['id'] );
		$sta_uns = esc_attr( $a['unsan'] );
		$sta_class = esc_attr( $a['class'] );

		//fetch option to see whether anchor should be displayed
		$current = (array) get_option( 'scroll_to_anchor' );

		//create the html output,
		$html = '<span id="' . $sta_id . '" ';

		//add classes and optionally display anchor according to user settings
		if ( ! isset( $current['show'] ) || 'hidden' == $sta_class ) {
			$html .= 'class="sta-anchor ' . $sta_class . '" aria-hidden="true">';
		} else {
			$html .= 'class="sta-anchor ' . $sta_class . '">' . esc_attr( $current['label'] ) . ': ';
			if ( $sta_unsan ) {
				$html .= $sta_unsan;
			} else {
				$html .= $sta_id;
			}
			$html .= '&nbsp';
		}

		$html .= $content . '</span>';

		//and finally return it.
		return $html;
	}
}
