<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/26/17
 * Time: 11:00 PM
 */

// Create shortcode
function bootstrapSlider_shortcodes_init()
{
  function bootstrapSlider_shortcode($atts = [], $content = null)
  {
    // do something to $content
    $content = "<h2>YOOOOO DAWG</h2>";
    // always return
    return $content;
  }
  add_shortcode('bootstrapSlider', 'bootstrapSlider_shortcode');
}
add_action('init', 'bootstrapSlider_shortcodes_init');

?>