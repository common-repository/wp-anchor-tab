<?php
/**
 * Plugin Name: WP Anchor Tab
 * Plugin URI: https://anchortab.com
 * Description: Makes adding an Anchor Tab to your blog really easy.
 * Version: 1.0
 * Author: Anchor Tab
 * Author URI: https://anchortab.com
 * License: Apache 2
 */
class WPAnchorTab {
  /**
   * Render the load tag on the page.
   *
   * This should be invoked by whatever hook is triggered just before the
   * </body> tag is rendered, which should be wp_footer, but could change
   * in the future.
  **/
  public static function renderLoadTag() {
    $tabId = get_option('wp-anchortab-tab-id');
    $loadScriptUrl = get_option('wp-anchortab-load-script-url');

    if ($tabId != '' && $loadScriptUrl != '') {
      ?><script type="text/javascript" id="anchortab-loader" data-tab-id="<?php echo $tabId ?>" src="<?php echo $loadScriptUrl ?>"></script><?php
    }
  }

  /**
   * Register all settings that will be required for the plugin to function.
  **/
  public static function registerSettings() {
    add_option('wp-anchortab-tab-id', '');
    add_option('wp-anchortab-load-script-url', '//s3.amazonaws.com/embed.anchortab.com/javascripts/load.js');
  }

  /**
   * Register the menu page entry for the configuration of the tab settings.
  **/
  public static function reigsterMenuPage() {
    add_menu_page('Anchor Tab', 'Anchor Tab', 'administrator', __FILE__, array('WPAnchorTab', 'renderSettingsPage'));
    add_action('admin_init', array('WPAnchorTab', 'registerSettings'));
  }

  /**
   * Render the settings page.
  **/
  public static function renderSettingsPage() {
    if ($_POST['wp-anchortab-tab-id'] !== null && $_POST['wp-anchortab-load-script-url'] !== null) {
      update_option('wp-anchortab-tab-id', $_POST['wp-anchortab-tab-id']);
      update_option('wp-anchortab-load-script-url', $_POST['wp-anchortab-load-script-url']);
      $settingsSaved = true;
    }

    require('settings.php');
  }
}

add_action('admin_menu', array('WPAnchorTab', 'reigsterMenuPage'));
add_action('wp_footer', array('WPAnchorTab', 'renderLoadTag'));
?>
