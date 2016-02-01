<?php
/*
 * Shortcode
 * Adds shortcode to easily add anchors in Text
 */

add_shortcode( 'anchor', 'sta_anchor' );

function sta_anchor( $atts ){

  //Shortcode Attributes
  $pairs = array(
    'id'    => '',
    'class' => ''
  );
  $a = shortcode_atts( $pairs, $atts );

  $a['id'] = esc_attr( $a['id'] );
  $a['class'] = esc_attr( $a['class'] );

  //fetch option to see whether anchor should be displayed
  $current = (array) get_option( 'scroll_to_anchor' );


  //create the html output,
  $html = '<span id="'.$a['id'].'" ';

    //add classes and display more or less
    if( !isset($current['show']) || $a['class'] == 'hidden' ) {
      $html .= 'class="sta-anchor '.$a['class'].'" aria-hidden="true">';
    } else {
      $html .= 'class="sta-anchor '.$a['class'].'">Anchor: ' . $a['id'];
    }

  $html .= '</span>';

  //and finally return it.
  return $html;
}
