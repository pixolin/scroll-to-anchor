<?php
/*
Plugin Name:  Scroll to Anchor
Version:      0.2
Plugin URI:   https://github.com/pixolin/Scroll-to-anchor
Description:  Adds jQuery function to scroll smoothly to anchors in a web page.
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

Credits: This plugin uses JavaScript by (c) Caspar Hübinger, 2016,
         lincensed under GPLv2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( PLUGIN_DIR . '/sta-settings.php' ); // Plugin Settings
require_once( PLUGIN_DIR . '/sta-enqueue-js.php' ); // Enqueue JS
