<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/26/17
 * Time: 9:31 PM
 */
?>

<?php
// TODO: Add some slider settings. git

add_option('bsSlider-Settings', null);
get_option('bsSlider-Settings');

function RenderSettings() { ?>
    <h1> Bootstrap Slider Settings</h1>

      <form method="post" action="options.php">
        <?php
        settings_fields('bsSlider-Settings');
        do_settings_sections('bsSlider-Settings');
        ?>
          <table class="form-table">
              <tr valign="top">
                  <th scope="row">Show arrow controls:</th>
                  <td>
                      <input type="text" name="title" value="<?php echo esc_attr( get_option('title') ); ?>"/>
                  </td>
              </tr>
          </table>
        <?php submit_button(); ?>
      </form>
    <?php
}

function register_settings() {
  register_setting('bsSlider-Settings', 'title');
  register_setting('bsSlider-Settings', 'arrows-radio');
}
add_action( 'admin_init', 'register_settings' );

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