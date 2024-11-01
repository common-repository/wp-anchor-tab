<div class="wrap">
  <h2>Anchor Tab Settings</h2>

  <?php if($settingsSaved) { ?>
  <div id="setting-error-settings_updated" class="updated settings-error"> 
    <p><strong>Settings saved.</strong></p>
  </div>
  <?php } ?>

  <p>Drop in the ID of your Tab into the Tab ID field below, and your Anchor Tab will magically appear on your site!</p>

  <form method="post">
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Tab ID</th>
        <td>
          <input type="text" name="wp-anchortab-tab-id" class="regular-text" value="<?php echo get_option('wp-anchortab-tab-id'); ?>" />
          <p class="description">Enter the ID of the Tab you created.</p>
        </td>
      </tr>

      <tr valign="top">
        <th scope="row">Load Script</th>
        <td>
          <input type="text" name="wp-anchortab-load-script-url" class="regular-text" value="<?php echo get_option('wp-anchortab-load-script-url'); ?>" />
          <p class="description">Don't touch this value unless you know what you're doing.</p>
        </td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>
