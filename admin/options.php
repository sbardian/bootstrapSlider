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

function updateOptions() {
    
}

function RenderSettings() { ?>
    <h1> Bootstrap Slider Settings</h1>

      <form method="post" action="updateOptions">
        <?php
        settings_fields('bsSlider-Settings');
        do_settings_sections( 'bsSlider-Settings' );
        $options = get_option('bsSlider_settings');
        ?>
          <table class="form-table">
              <tr valign="top">
                  <th scope="row">Show arrow controls:</th>
                  <td>
                      <input type="radio" name="bsSlider_settings[radio1]" value="true" <?php checked('true', $options['radio1']); ?> /> True<br />
                      <input type="radio" name="bsSlider_settings[radio1]" value="false" <?php checked('false', $options['radio1']); ?> /> False<br />
                      <input type="text" name="bsSlider-show-arrow-controls" value="<?php echo get_option( 'bsSlider-show-arrow-controls' ); ?>"/>
                  </td>
              </tr>
          </table>
        <?php submit_button(); ?>
      </form>
    <?php
}

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