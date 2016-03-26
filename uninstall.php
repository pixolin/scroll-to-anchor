<?php
/*
 * Uninstall routine to delete the options for Scroll to Anchor
 */

// If uninstall is not called from WordPress, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'scroll_to_anchor' );

// Thank you for using my plugin. <3
