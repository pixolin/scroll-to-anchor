<?php
/*
* Enqueue JavaScript
*
*/

//Register and enqueue the jQuery function for smooth scrolling
function sta_enqueue_js( $plugin_version ) {
  //some parameters to register and enqueue the script
  $file_data   = get_file_data( __FILE__, array( 'version' => 'Version' ) );
  $maybe_min   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

  //register the script
  wp_register_script(
    $handle    = 'scroll-to-anchor',
    $src       = plugins_url( "js/scroll-to-anchor$maybe_min.js", __FILE__ ),
    $deps      = array('jquery'),
    $ver       = $file_data['version'],
    $in_footer = true
  );

  //get values from option 'scroll_to_anchor'
  $current      = (array) get_option( 'scroll_to_anchor' ) ;

  $speed        = absint($current['speed']);
  $distance     = absint( $current['distance'] );

  //pass values to JavaScript
  $sta_settings = array(
    'distance' => $distance,
    'speed'    => $speed
  );

  wp_localize_script(
    $handle      = 'scroll-to-anchor',
    $object_name = 'sta_settings',
    $l10n        = $sta_settings
  );

  //and finally enqueue the javascript
  wp_enqueue_script(
    $handle    = 'scroll-to-anchor'
  );
}

add_action('wp_enqueue_scripts', 'sta_enqueue_js');
