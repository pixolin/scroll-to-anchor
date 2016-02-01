<?php
/*
 * Shortcode
 * Adds shortcode to easily add anchors in Text
 */

add_shortcode( 'anchor', 'sta_anchor' );

function sta_anchor( $atts ){

  //Shortcode Attributes
  $pairs = array(
    'id' => ''
  );
  $a = shortcode_atts( $pairs, $atts );

  //fetch option to see whether anchor should be displayed
  $current = (array) get_option( 'scroll_to_anchor' );
  if( isset($current['show']) ) $display = true;

  $html = '<div id="'.$a['id'].'" class="sta-anchor '.$a['id'].'" ';

    if($display) {
      $html .= '>';
      $html .= '<img src="'.plugins_url( "img/anchor.svg", __FILE__ ).'" width="20" height="20" border="0">Anchor: ' . $a['id'];
    } else {
      $html .= 'style="visibility:hidden;height:0;" >';
    }

  $html .= '</div>';

  // … finally return it.
  return $html;
}
