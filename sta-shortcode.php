<?php
/*
 * Shortcode
 * Adds shortcode to easily add anchors in Text
 */

add_shortcode( 'anchor', 'sta_anchor' );

function sta_anchor( $atts ){
  $pairs = array(
    'id' => 'foo'
  );
  $a = shortcode_atts( $pairs, $atts );

  $html = '<div id="'.$a['id'].'"></div>';
  return $html;
}
