<?php
/*
 * Tiny MCE Button
 * Adds Button to insert an anchor easily
 */

add_action('admin_head', 'sta_tinymce_button');

function sta_tinymce_button() {
  global $typenow;
   // check user permissions
   if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   return;
   }
   // verify the post type
   if( ! in_array( $typenow, array( 'post', 'page' ) ) )
       return;
   // check if WYSIWYG is enabled
   if ( get_user_option('rich_editing') == 'true') {
       add_filter("mce_external_plugins", "sta_add_tinymce_plugin");
       add_filter('mce_buttons', 'sta_register_my_tc_button');
   }

}

//set path for the JavaScript file
function sta_add_tinymce_plugin( $plugin_array ){
  $plugin_array['sta_tc_button'] = plugins_url( 'js/sta-tinymce-button.js', __FILE__ );
  return $plugin_array;
}

//add the button
function sta_register_my_tc_button( $buttons ){
  array_push( $buttons, "sta_tc_button");
  return $buttons;
}

//Stylesheet for Back End
function sta_admin_style() {
    wp_enqueue_style(
      'sta-backend',
      plugins_url('/css/admin-style.css', __FILE__)
    );
}

add_action('admin_enqueue_scripts', 'sta_admin_style');
