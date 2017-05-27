<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/26/17
 * Time: 8:16 PM
 */
?>

<?php
/*
Plugin Name: bootstrap-slider
Description: Basic slider built using bootstrap
Version: 0.1.0
Author: Brian Andrews
*/
?>

<?php

if ( !class_exists('bootstrapSlider' ) ) {
  class bootstrapSlider
  {
    function init()
    {



      /**
       * Add our Settings menu to Admin
       *
       *
       *
       */
      require 'admin/SliderSettings.php';



      

      /**
       * Add our shortcode will need to do more cool things. . .
       * like get our data from db, and rendor the slider/etc.
       */
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




    }

  }
  bootstrapSlider::init();
}

?>
