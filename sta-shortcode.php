<?php
/*
 * Shortcode
 * Adds shortcode to easily add anchors in Text
 */

add_shortcode( 'anchor', 'sta_anchor' );

function sta_anchor( $atts ){
  $pairs = array(
    'id' => ''
  );
  $a = shortcode_atts( $pairs, $atts );

  $html = '<div id="'.$a['id'].'" style="visibility: hidden"></div>';
  return $html;
}
