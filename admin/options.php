<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/26/17
 * Time: 9:31 PM
 */
?>

<?php

/**
 * Set some default options for our Slider Settings.
 *
 */
$default_options = array(
    'title' => 'Fake Title',
    'arrows-radio' => 1
);
add_option('bsSlider-Settings', $default_options);

/**
 * Render our settings page.
 *
 */
function RenderSettings() { ?>
    <h1> Bootstrap Slider Settings</h1>
    <?php $options = get_option('bsSlider-Settings'); ?>
      <form method="post" action="options.php">
        <?php
        settings_fields( 'bsSlider-Settings' );
        do_settings_sections( 'bsSlider-Settings');
        ?>
          <table class="form-table">
              <tr valign="top">
                  <th scope="row">Title:</th>
                  <td>
                      <span style="font-size: 6pt; color: red">Not used, just testing...</span>
                      <input type="text" name="bsSlider-Settings[title]" value="<?php echo $options['title']; ?>"/>
                  </td>
              </tr>
              <tr valign="top">
                  <th scope="row">Show arrow controls:</th>
                  <td>
                      Yes: <input type="radio" name="bsSlider-Settings[arrows-radio]" value="1" <?php checked(1, $options['arrows-radio']); ?> /><br />
                      No : <input type="radio" name="bsSlider-Settings[arrows-radio]" value="0" <?php checked(0, $options['arrows-radio']); ?> /><br />
                  </td>
              </tr>
          </table>
        <?php submit_button(); ?>
      </form>
    <?php
}

/**
 * Register our settings.
 */
function register_settings() {
  register_setting('bsSlider-Settings', 'bsSlider-Settings');
}
add_action( 'admin_init', 'register_settings' );

/**
 * Add our menu and submenu to the Admin Dashboard.
 */
function bootstrapSliderMenu()
{
  add_menu_page(
        'Edit BootStrap Slider',
        'BootStrap Slider',
        'manage_options',
        'bootstrapSlider',
        bootstrapSliderSettings,
        null,
        null
    );
  add_submenu_page(
      'bootstrapSlider',
      'Bootstrap Slider Settings',
      'Settings',
      'manage_options',
      'bsSliderSettings',
      RenderSettings
  );
}
add_action('admin_menu', 'bootstrapSliderMenu');
?>
