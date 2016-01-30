<?php
/*
* Plugin Settings
* To edit your settings visit Settings > Reading
* in your WordPress Back End.
*/


function sta_settings_api_init(){

  //New ettings Sction in oage "reading"
  add_settings_section(
    $id = 'sta_section',
    $title = __('Scroll to Anchor Settings', 'scroll_to_anchor'),
    $callback = false,
    $page = 'reading'
  );

  //Settings Field Distance
  add_settings_field(
    $id = 'stafd',
    $title = __('Distance', 'scroll-to-anchor'),
    $callback = 'sta_settings_distance_function',
    $page = 'reading',
    $section = 'sta_section',
    $args = array()
  );

  //Settings Field Scroll Speed
  add_settings_field(
    $id = 'stafs',
    $title = __('Scroll-Speed', 'scroll-to-anchor'),
    $callback = 'sta_settings_speed_function',
    $page = 'reading',
    $section = 'sta_section',
    $args = array()
  );

  register_setting( 'reading', 'sta_setting_distance', 'sta_validate_distance' );
  register_setting( 'reading', 'sta_setting_speed', 'sta_validate_speed' );
}

add_action( 'admin_init', 'sta_settings_api_init' );


/* ------------------------------------------------------------------------- *
 * Form Fields
 * ------------------------------------------------------------------------- */

//Form Field DISTANCE
function sta_settings_distance_function() {

  $html = __('Show anchor with an offset of…', 'scroll_to_anchor').'<br />';
  $html .= '<input name="sta_setting_distance" id="sta_setting_distance" type="text" value="'. get_option( 'sta_setting_distance' ).'" class="code" size="5"/> ';
  $html .= '<label for="sta_setting_distance">'.__('Pixel', 'scroll_to_anchor') . ' (0 - 600)</label>';

  echo ( $html );
}

//Form Field SPEED
function sta_settings_speed_function() {


  $current = (array) get_option( 'sta_setting_speed' );

  $options = array(
      5000 => 'slow',
      1000 => 'medium',
       500 => 'fast',
  );

  $html = __('Animation speed when scrolling to anchors', 'scroll_to_anchor').'<br />';
  $html .= '<select id="speed_selection" name="sta_setting_speed[speed_selection]}">';

  foreach ( $options as $value => $text) {
    $html .= '<option value="'.$value.'"';
    $html .= selected( $current['speed_selection'], $value , false ) . '>'.$text.'</option>';
  }

  $html .= '</select>';

  echo( $html );
}

/* ------------------------------------------------------------------------- *
 * Validation
 * ------------------------------------------------------------------------- */

function sta_validate_distance( $input ) {
  $output = intval( $input );

  if( ( $output > 600 ) || ($output < 0)){
    add_settings_error( 'sta_setting_distance', 'invalid-value', 'Invalid value anchor offset' );
    $output = '';
  }
  return $output;
}

function sta_validate_speed( $input ) {
    $input['speed_selection'] = absint( $input['speed_selection'] );
    return $input;
}
