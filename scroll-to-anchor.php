<?php
/*
Plugin Name:  Scroll to Anchor
Version:      0.2
Plugin URI:   https://github.com/pixolin/Scroll-to-anchor
Description:  Adds jQuery function to scroll smoothly to anchors in a web page.
Author:       Bego Mario Garde
Author URI:   https://pixolin.de
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
Text Domain:  scroll-to-anchor

(c) Bego Mario Garde, 2016
Scroll to Anchor is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Scroll to Anchor is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Scroll to Anchor. If not, see https://www.gnu.org/licenses/gpl-2.0.html.

*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

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

  $sta_settings = array(
    'distance' => sanitize_text_field( get_option( 'sta_setting_distance' ) ),
    'speed'    => sanitize_text_field( get_option( 'sta_setting_speed' ) )
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


function sta_settings_api_init(){
  add_settings_section(
    $id = 'sta_section',
    $title = __('Scroll to Anchor Settings', 'scroll_to_anchor'),
    $callback = 'sta_settings_callback',
    $page = 'reading'
  );

  add_settings_field(
    $id = 'stafd',
    $title = __('Distance', 'scroll-to-anchor'),
    $callback = 'sta_settings_distance_function',
    $page = 'reading',
    $section = 'sta_section',
    $args = array()
  );


  add_settings_field(
    $id = 'stafs',
    $title = __('Scroll-Speed', 'scroll-to-anchor'),
    $callback = 'sta_settings_speed_function',
    $page = 'reading',
    $section = 'sta_section',
    $args = array()
  );

  register_setting( 'reading', 'sta_setting_distance' );
  register_setting( 'reading', 'sta_setting_speed' );
}

add_action( 'admin_init', 'sta_settings_api_init' );

function sta_settings_callback() {
  __return_false();
}

function sta_settings_distance_function() {
  _e('Offset of Anchor', 'scroll_to_anchor');
  echo '<br />';
  echo '<input name="sta_setting_distance" id="sta_setting_distance" type="text" value="'.sanitize_text_field( get_option( 'sta_setting_distance' ) ).'" class="code" />';
  _e(' Distance in Pixel', 'scroll_to_anchor');
}

function sta_settings_speed_function() {
  _e('Speed when scrolling to anchors', 'scroll_to_anchor');
  echo '<br />';
  echo '<input name="sta_setting_speed" id="sta_setting_speed" type="text" value="'.sanitize_text_field( get_option( 'sta_setting_speed' ) ).'" class="code" />';
  _e(' Speed Value (0 – 10000)', 'scroll_to_anchor');

}
