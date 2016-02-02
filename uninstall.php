<?php
/*
 * Uninstall routine to delete the options for Scroll to Anchor
 */

// If uninstall is not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

$option_name = 'scroll-to-anchor';

delete_option($option_name);

// Thank you for using my plugin. <3
