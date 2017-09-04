<?php
/**
* Enqueue JavaScript
*
*/

//Register and enqueue the jQuery function for smooth scrolling
add_action( 'wp_enqueue_scripts', 'sta_enqueue_js' );

if ( ! function_exists( 'sta_enqueue_js' ) ) {
	/**
	 * Enqueue JavaScript and add custom settings
	 * @param  $plugin_version
	 */
	function sta_enqueue_js( $plugin_version ) {
		//automatically fetch version number
		$file_data = get_file_data(
			__FILE__, array(
				'version' => 'Version',
			)
		);
		//use minified JavaScript, if not in DEBUG mode
		$maybe_min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		//register the script
		wp_register_script(
			$handle = 'scroll-to-anchor',
			$src = plugins_url( "../js/scroll-to-anchor$maybe_min.js", __FILE__ ),
			$deps = array( 'jquery' ),
			$ver = $file_data['version'],
			$in_footer = true
		);

		//get values from option 'scroll_to_anchor'
		$current = (array) get_option( 'scroll_to_anchor' );

		$speed = absint( $current['speed'] );
		$distance = absint( $current['distance'] );

		if ( isset( $current['exceptions'] ) ) {
			$exceptions = esc_attr( $current['exceptions'] );
		} else {
			$exceptions = '';
		}

		//pass values to JavaScript
		$sta_settings = array(
			'distance' => $distance,
			'speed' => $speed,
			'exceptions' => $exceptions,
		);

		wp_localize_script( 'scroll-to-anchor', 'sta_settings', $sta_settings );

		//and finally enqueue the javascript
		wp_enqueue_script( 'scroll-to-anchor' );
	}
}
