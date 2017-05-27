<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/26/17
 * Time: 9:31 PM
 */

function bootstrapSliderSettings()
{
  // check user capabilities
  if (!current_user_can('manage_options')) {
    echo 'mehh';
    return;
  }
  ?>
    <div class="wrap">
        <h1>BootStrap Slider Settings</h1>
    </div>
  <?php
}

function boostrapSliderMenu()
{
  add_menu_page(
        'Edit BootStrap Slider',
        'BootStrap Slider',
        'manage_options',
        'boostrapSlider',
        bootstrapSliderSettings,
        '',
        null
    );
}
add_action('admin_menu', 'boostrapSliderMenu');

?>