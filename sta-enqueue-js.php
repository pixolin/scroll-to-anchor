<?php
/*
* Enqueue JavaScript
*
*/

//Register and enqueue the jQuery function for smooth scrolling
function sta_enqueue_js( $plugin_version ) {
  $file_data   = get_file_data( __FILE__, array( 'version' => 'Version' ) );
  $maybe_min   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

  wp_register_script(
    $handle    = 'scroll-to-anchor',
    $src       = plugins_url( "js/scroll-to-anchor$maybe_min.js", __FILE__ ),
    $deps      = array('jquery'),
    $ver       = $file_data['version'],
    $in_footer = true
  );

  $distance    = absint( get_option( 'sta_setting_distance' ), 200 );
  if(empty( $distance )) {
    $distance = 0;
  }

  $speed_settings = (array) get_option( 'sta_setting_speed' ) ;
  //Check whether the user has set a speed yet. Use default speed, if not.
  if(!isset($speed_settings['speed_selection'])) $speed_settings['speed_selection'] = 5000;

  $speed        = absint($speed_settings['speed_selection']);
  if(empty( $speed )) {
    $speed = 5000;
  }


  $sta_settings = array(
    'distance' => $distance,
    'speed'    => $speed
  );

  wp_localize_script(
    $handle    = 'scroll-to-anchor',
    $object_name = 'sta_settings',
    $l10n      = $sta_settings
  );

  wp_enqueue_script(
    $handle    = 'scroll-to-anchor'
  );
}

add_action('wp_enqueue_scripts', 'sta_enqueue_js');
