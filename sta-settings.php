<?php
/*
* Plugin Settings
* To edit your settings visit Settings > Reading
* in your WordPress Back End.
*/


function sta_settings_api_init(){

  //Settings Sction
  add_settings_section(
    $id = 'sta_section',
    $title = __('Scroll to Anchor Settings', 'scroll_to_anchor'),
    $callback = 'sta_settings_callback',
    $page = 'reading'
  );

  //Settings Field for Distance
  add_settings_field(
    $id = 'stafd',
    $title = __('Distance', 'scroll-to-anchor'),
    $callback = 'sta_settings_distance_function',
    $page = 'reading',
    $section = 'sta_section',
    $args = array()
  );

  //Settings Field for Scroll Speed
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

function sta_settings_callback() {
  //We could add some general Settings Description here.
  __return_false();
}

function sta_settings_distance_function() {
  //Settings form field for Distance
  _e('Offset for Anchor', 'scroll_to_anchor');
  echo '<br />';
  echo '<input name="sta_setting_distance" id="sta_setting_distance" type="text" value="'. get_option( 'sta_setting_distance' ).'" class="code" size="5"/>';
  _e(' Distance in Pixel (0 - 600)', 'scroll_to_anchor');
}

function sta_settings_speed_function() {
  //Settings form field for scroll speed
  _e('Speed when scrolling to anchors', 'scroll_to_anchor');
  echo '<br />';
  echo '<input name="sta_setting_speed" id="sta_setting_speed" type="text" value="'. get_option( 'sta_setting_speed' ).'" class="code" size="5"/>';
  _e(' Speed Value (0 – 5000)', 'scroll_to_anchor');
}

function sta_validate_distance( $input ) {
  $output = intval( $input );
  if(( $output > 600 ) || ($output < 0)){
    add_settings_error( 'sta_setting_distance', 'invalid-value', 'Value for offset for anchor is invalid.' );
    $output = '';
  }
  return $output;
}

function sta_validate_speed( $input ) {
  $output = intval( $input );
  if(( $output > 10000 ) || ($output < 0)){
    add_settings_error( 'sta_setting_speed', 'invalid-value', 'Value for Speed is invalid.' );
    $output = '';
  }
  return $output;
}
