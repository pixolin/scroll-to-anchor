<?php
/*
Plugin Name:  Scroll to Anchor
Version:      0.2
Plugin URI:   https://github.com/pixolin/Scroll-to-anchor
Description:  Adds jQuery function to scroll smoothly to anchors in posts and pages.
Author:       Bego Mario Garde
Author URI:   https://pixolin.de
License:      GPLv2
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

Credits:
(c) Caspar Hübinger, 2016 for used JavaScript, GPLv2
(c) Tom McFarlin, 2015 for Settings Field Sanitization, GPLv2
Thank you for providing your code to the public.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

//Localize
add_action( 'plugins_loaded', 'sta_load_textdomain' );
function sta_load_textdomain() {
  load_plugin_textdomain( 'scroll-to-anchor', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

require_once( PLUGIN_DIR . '/sta-settings.php' ); // Plugin Settings
require_once( PLUGIN_DIR . '/sta-enqueue-js.php' ); // Enqueue JS
require_once( PLUGIN_DIR . '/sta-shortcode.php' ); // Add Shortcode
require_once( PLUGIN_DIR . '/sta-tinymce-button.php' ); // TinyMCE Button

//Set some options on plugin activation
register_activation_hook( __FILE__, 'sta_initial_options' );
