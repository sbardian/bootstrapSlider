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
       * Setup our database table on activation for storing sliders.
       *
       */
      function bootstrapSlider_activation() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $db = $wpdb->prefix . "bootstrapSliderTable";

        // create the ECPT metabox database table
        if($wpdb->get_var("show tables like '$db'") != $db)
        {
          $sql = "CREATE TABLE  $db  (
		        id mediumint(9) NOT NULL AUTO_INCREMENT,
		        caption TEXT NOT NULL,
		        image VARCHAR(2083) NOT NULL,
		        UNIQUE KEY id (id)
		      ) $charset_collate;";

          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
          dbDelta($sql);
        }
      }
      register_activation_hook( __FILE__, 'bootstrapSlider_activation' );

      /**
       * Remove our database table on deactivation for storing sliders.
       *
       */
      // TODO: move this to uninstall instead of deactivation. . .
      function bootstrapSlider_deactivation() {
        global $wpdb;
        $db = $wpdb->prefix . "bootstrapSliderTable";

        if($wpdb->get_var("show tables like '$db'") == $db) {
          $sql = "DROP TABLE IF EXISTS $db";
          $wpdb->query($sql);
        }
      }
      register_deactivation_hook( __FILE__, 'bootstrapSlider_deactivation' );

      /**
       * Add our style sheets.
       *
       */
      function bootstrapSlider_styles()
      {
        // Register the style like this for a plugin:
        wp_register_style( 'bootstrap', plugins_url( '/public/css/bootstrap.min.css', __FILE__ ), array(), '20120208', 'all' );

        // For either a plugin or a theme, you can then enqueue the style:
        wp_enqueue_style( 'bootstrap' );
      }
      add_action( 'wp_enqueue_scripts', 'bootstrapSlider_styles' );


      /**
       * Add our scripts.
       *
       */
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
       * Add our shortcode, will need to do more cool things. . .
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



      /**
       * Add our custom post type.
       *
       */
      function create_posttype() {

        register_post_type( 'sliders',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Sliders' ),
                    'singular_name' => __( 'Slider' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'sliders'),
                'show_in_menu' => 'boostrapSlider',
                'supports' => array( 'title', 'editor', 'thumbnail' ),
            )
        );
      }
      // Hooking up our function to theme setup
      add_action( 'init', 'create_posttype' );

    }

  }
  bootstrapSlider::init();
}

?>
