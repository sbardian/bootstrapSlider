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


      function bootstrapSlider_styles()
      {
        // Register the style like this for a plugin:
        wp_register_style( 'bootstrap', plugins_url( '/public/css/bootstrap.min.css', __FILE__ ), array(), '20120208', 'all' );

        // For either a plugin or a theme, you can then enqueue the style:
        wp_enqueue_style( 'bootstrap' );
      }
      add_action( 'wp_enqueue_scripts', 'bootstrapSlider_styles' );


      function bootstrapSlider_scripts()
      {
        // Register the script like this for a plugin:
        wp_register_script( 'bootstrap', plugins_url( '/public/js/bootstrap.min.js', __FILE__ ) );

        // For either a plugin or a theme, you can then enqueue the script:
        wp_enqueue_script( 'bootstrap' );
      }
      add_action( 'wp_enqueue_scripts', 'bootstrapSlider_scripts' );


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
          $load = 'public/slider.php';

          ob_start();
          include $load;
          $content = ob_get_contents();
          ob_end_clean();
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
