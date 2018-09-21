<?php
/*
Plugin Name:  Scroll to Anchor
Version:      0.6.0
Plugin URI:   https://github.com/pixolin/Scroll-to-anchor
Description:  Add anchors and use a smooth scrolling animation for a better user experience.
Author:       Bego Mario Garde
Author URI:   https://pixolin.de
License:      GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
Text Domain:  scroll-to-anchor

(c) Bego Mario Garde, 2016–2018
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
(c) Caspar Hübinger, 2016 for JavaScript function in scroll-to-anchor.js, GPLv2
Thank you for providing your code to the public.
Thank you Felix Arntz for improvements in the JavaScript.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// plugin base name
define( 'STA_BASE', plugin_basename( __FILE__ ) );

/**
 * Init the plugin
 */
function sta_init() {
	require_once dirname( __FILE__ ) . '/includes/sta-enqueue-js.php';
	require_once dirname( __FILE__ ) . '/includes/sta-shortcode.php';
	if ( is_admin() ) {
		require_once dirname( __FILE__ ) . '/settings/sta-settings.php';
		require_once dirname( __FILE__ ) . '/admin/sta-tinymce-button.php';
	};

	load_plugin_textdomain( 'scroll-to-anchor', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'sta_init' );

/**
 * Add option with intial values
 */
if ( ! function_exists( 'sta_initial_options' ) ) {
	function sta_initial_options() {
		//check if option is already present
		if ( ! get_option( 'scroll_to_anchor' ) ) {
			//not present, so add
			$op = array(
				'speed'    => 5000,
				'distance' => 50,
				'label'    => 'Anchor',
			);
			add_option( 'scroll_to_anchor', $op );
		}
	}
}
register_activation_hook( __FILE__, 'sta_initial_options' );
