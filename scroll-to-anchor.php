<?php
/*
Plugin Name:  Scroll to Anchor
Version:      0.1
Plugin URI:   https://github.com/pixolin/Scroll-to-anchor
Description:  Adds jQuery function to scroll smoothly to anchors in a web page.
Author:       Bego Mario Garde
Author URI:   https://pixolin.de
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
Text Domain:  Scroll-to-anchor

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

function sta_enqueueu_js() {
  $plugin      = get_plugin_data( __FILE__ );
  $maybe_min   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

  wp_register_script(
    $handle    = 'scroll-to-anchor',
    $src       = plugins_url( "js/scroll-to-anchor$maybe_min.js", __FILE__ ),
    $deps      = array('jquery'),
    $ver       = $plugin['Version'],
    $in_footer = true
  );
  wp_enqueue_script(
    $handle    = 'scroll-to-anchor'
  );
}

add_action('wp_enqueue_scripts', 'sta_enqueueu_js');
