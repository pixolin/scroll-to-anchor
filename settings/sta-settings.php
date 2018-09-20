<?php
/*
 * Plugin Settings
 * Edit settings in menu Settings > Reading in your WordPress Back End.
 *
 * Contents:
 * 1. Option Defaults
 * 2. Settings Section and Fields in Settings > Reading
 * 3. Form Fields
 * 4. Validation
 * 5. Show link to settings
 */

/* ------------------------------------------------------------------------- *
 * 1. Settings Section and Fields in Settings > Reading
 * ------------------------------------------------------------------------- */

add_action( 'admin_init', 'sta_settings_api_init' );

if ( ! function_exists( 'sta_settings_api_init' ) ) {
	function sta_settings_api_init() {
		//New settings section in page "reading"
		add_settings_section(
			$id       = 'sta_section',
			$title    = '',
			$callback = 'sta_settings_section',
			$page     = 'reading'
		);

		//Settings Field Scroll Speed
		add_settings_field(
			$id       = 'sta_speed',
			$title    = __( 'Animation-Speed', 'scroll-to-anchor' ),
			$callback = 'sta_settings_speed_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		//Settings Field Distance
		add_settings_field(
			$id       = 'sta_distance',
			$title    = __( 'Offset', 'scroll-to-anchor' ),
			$callback = 'sta_settings_distance_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		//Settings Show Anchor
		add_settings_field(
			$id       = 'sta_show',
			$title    = __( 'Display anchor(s) in front end', 'scroll-to-anchor' ),
			$callback = 'sta_settings_showanchor_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		//Settings Label
		add_settings_field(
			$id       = 'sta_label',
			$title    = __( 'Label of the anchor', 'scroll-to-anchor' ),
			$callback = 'sta_settings_label_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		//Settings Label
		add_settings_field(
			$id       = 'sta_exceptions',
			$title    = __( 'Exclude Sections', 'scroll-to-anchor' ),
			$callback = 'sta_settings_exceptions_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		// Seetings additional post types
		add_settings_field(
			$id       = 'sta_posttypes',
			$title    = __( 'Support Custom Post Types', 'scroll-to-anchor' ),
			$callback = 'sta_settings_posttypes_function',
			$page     = 'reading',
			$section  = 'sta_section',
			$args     = array()
		);

		register_setting( 'reading', 'scroll_to_anchor', 'sta_sanitize' );
	}
}

/* ------------------------------------------------------------------------- *
 * 2. Form Fields
 * ------------------------------------------------------------------------- */

//Form Field SPEED
if ( ! function_exists( 'sta_settings_speed_function' ) ) {
	function sta_settings_speed_function() {
		$current = (array) get_option( 'scroll_to_anchor' );

		$options = array(
			5000 => __( 'slow', 'scroll-to-anchor' ),
			1000 => __( 'medium', 'scroll-to-anchor' ),
			500  => __( 'fast', 'scroll-to-anchor' ),
			0    => __( 'disabled', 'scroll-to-anchor' ),
		);

		$html  = '<p>' . __( 'Select the speed to scroll to anchors', 'scroll-to-anchor' ) . '</p>';
		$html .= '<select id="speed" name="scroll_to_anchor[speed]">';

		foreach ( $options as $value => $text ) {
			$html .= '<option value="' . $value . '"';
			$html .= selected( esc_attr( $current['speed'] ), $value, false ) . '>' . $text . '</option>';
		}

		$html .= '</select>';

		echo $html;
	}
}

//Form Field DISTANCE
if ( ! function_exists( 'sta_settings_distance_function' ) ) {
	function sta_settings_distance_function() {
		$current = (array) get_option( 'scroll_to_anchor' );

		$html  = '<p>' . __( 'Show anchor with an offset of…', 'scroll-to-anchor' ) . '</p>';
		$html .= '<input name="scroll_to_anchor[distance]" id="sta-distance" type="text" value="' . esc_attr( $current['distance'] ) . '" size="5"/> ';
		$html .= '<label for="sta-distance">' . __( 'Pixel', 'scroll-to-anchor' ) . ' (0&ndash;600 Pixel)</label>';

		echo $html;
	}
}

//checkbox show anchor
if ( ! function_exists( 'sta_settings_showanchor_function' ) ) {
	function sta_settings_showanchor_function() {
		$current = (array) get_option( 'scroll_to_anchor' );

		$html  = '<p style="max-width:36em;">' . __( 'Do you just want the scrolling animation, or do you also want to &hellip;', 'scroll-to-anchor' ) . '</p>';
		$html .= '<input name="scroll_to_anchor[show]" id="sta-show" type="checkbox" value="1" ' . checked( isset( $current['show'] ), 1, false ) . '/>';
		$html .= '<label for="sta-show">';
		$html .= __( '<strong>display</strong> the anchors in front end', 'scroll-to-anchor' );
		$html .= '</label>';

		echo $html;
	}
}

//form field for anchor label
if ( ! function_exists( 'sta_settings_label_function' ) ) {
	function sta_settings_label_function() {
		$current = (array) get_option( 'scroll_to_anchor' );
		if ( $current['label'] ) {
			$label = esc_attr( $current['label'] );
		} else {
			$label = __( 'Anchor', 'scroll-to-anchor' );
		}

		$html  = '<p style="max-width:36em;">' . sprintf( __( 'If you chose above to display anchors in front end, they will be shown with a label <strong>%s</strong>:&nbsp;&hellip; by default, but you can <em>globally</em> change that <em>label</em> here.', 'scroll-to-anchor' ), $label ) . '</p>';
		$html .= '<label for="sta-label">' . __( 'Label for anchors:', 'scroll-to-anchor' ) . '</label> ';
		$html .= '<input name="scroll_to_anchor[label]" id="sta-label" type="text" value="' . esc_attr( $current['label'] ) . '" /> ';

		echo $html;
	}
}

// exceptions
if ( ! function_exists( 'sta_settings_exceptions_function' ) ) {
	function sta_settings_exceptions_function() {
		$current = (array) get_option( 'scroll_to_anchor' );
		if ( isset( $current['exceptions'] ) ) {
			$exceptions = esc_attr( $current['exceptions'] );
		} else {
			$exceptions = '';
		}

		$html  = '<p style="max-width:36em;">' . __( 'Some themes and plugins use anchors to provide other animations, e.g. in accordions or tabs. <strong>To avoid conflicts</strong> between these animations and plugin Scroll to Anchor, you can exclude these sections by specifying their CSS classes (e.g. <code>.accordion</code>) or ids (e.g. <code>#accordion</code>) in the field below. For more than one CSS class, please use commas as separator (e.g. <code>.one, .two, #three</code>).', 'scroll-to-anchor' ) . '</p>';
		$html .= '<p style="max-width:36em;">' . __( 'If you have no idea, what this is good for, just leave the field empty.', 'scroll-to-anchor' ) . '</p>';
		$html .= '<label for="sta-exceptions">' . __( 'Exclude these CSS classes:', 'scroll-to-anchor' ) . '</label> ';
		$html .= '<input name="scroll_to_anchor[exceptions]" id="sta-exceptions" type="text" value="' . $exceptions . '" /> ';

		echo $html;
	}
}

//form to select custom post types
if ( ! function_exists( 'sta_settings_posttypes_function' ) ) {
	function sta_settings_posttypes_function() {

		$current = (array) get_option( 'scroll_to_anchor' );

		// which custom post types are currently used?
		$args          = array(
			'public'   => true,
			'_builtin' => false,
		);
		$available_cpt = get_post_types( $args, 'names' );

		$html = '<p style="max-width:36em;">' . __( 'Scroll to anchor supports the TinyMCE editor for posts and pages by default. If you wish to extend the functionality to other post types, choose from the selection here:', 'scroll-to-anchor' ) . '</p><p>';

		$checked = '';

		foreach ( $available_cpt as $cpt ) {
			if ( isset( $current['posttypes'] ) ) {
				$checked = checked( in_array( $cpt, $current['posttypes'] ), true, false );
			}

			$html .= '<input
						id="' . $cpt . '"
						type="checkbox"
						name="scroll_to_anchor[posttypes][' . $cpt . ']"'
						. $checked .
						'value="' . $cpt . '"
						/>
						<label for="' . $cpt . '">' . $cpt . '</label>
						<br />';
		}
		$html .= '</p>';

		echo $html;
	}
}
/* ------------------------------------------------------------------------- *
 * 4. Validation and Sanitization
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'sta_sanitize' ) ) {
	function sta_sanitize( $input ) {
		// Initialize the new array that will hold the sanitize values
		$new_input = array();

		// Loop through the input and sanitize each of the values
		foreach ( $input as $key => $val ) {
			switch ( $key ) {
				case 'label':
				case 'exceptions':
					$new_input[ $key ] = sanitize_text_field( $val );
					break;
				case 'posttypes':
					foreach ( $val as $cpt_setting ) {
						$cpt_setting = sanitize_text_field( $cpt_setting );
					}
					$new_input[ $key ] = $val;
					break;
				default:
					$new_input[ $key ] = absint( $val );
					if ( ( 'distance' === $key ) && ( $val > 600 ) ) {
						$new_input[ $key ] = 0;
						add_settings_error(
							'scroll_to_anchor',
							'sta_distance',
							__( 'Scroll to Anchor: Replaced invalid value for offset', 'scroll-to-anchor' ),
							'notice-warning'
						);
					} // check distance
			} // switch
		} // foreach

		return $new_input;
	}
}

/* ------------------------------------------------------------------------- *
 * 5. Link to settings
 * ------------------------------------------------------------------------- */

add_filter( 'plugin_action_links_' . STA_BASE, 'sta_plugin_action_links' );
function sta_plugin_action_links( $links ) {
	$mylinks = array(
		'<a href="options-reading.php#sta_section">' . __( 'Settings', 'scroll-to-anchor' ) . '</a>',
	);

	return array_merge( $links, $mylinks );
}

// Settings Section Callback to add an anchor for link from the plugins menu
function sta_settings_section( $arg ) {
	echo '<h2 id="' . $arg['id'] . '">' . __( 'Scroll to Anchor Settings', 'scroll-to-anchor' ) . '</h2>';
}
