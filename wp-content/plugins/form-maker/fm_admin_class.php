<?php

class FM_Admin {
	public static $instance = null;
	public $update_path = 'http://api.web-dorado.com/v1/_id_/allversions';
	public $updates = array();
	public $fm_plugins = array();
	public $prefix = "fm_";
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	private function __construct() {
		add_action( 'admin_menu', array( $this, 'check_for_update' ), 25 );
	}

	public function get_plugin_data( $name ) {

    $fm_plugins = array(
      'form-maker/form-maker.php' => array(
        'id' => 31,
        'url' => 'https://web-dorado.com/products/wordpress-form.html',
        'description' => 'WordPress Form Maker is a fresh and innovative form builder. This form builder is for generating various kinds of forms.',
        'icon' => '',
        'image' => plugins_url('assets/form-maker.png', __FILE__)
      ),
      'form-maker-export-import/fm_exp_imp.php' => array(
        'id' => 66,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/export-import.html',
        'description' => 'Form Maker Export/Import WordPress plugin allows exporting and importing forms with/without submissions.',
        'icon' => '',
        'image' => plugins_url('assets/import_export.png', __FILE__),
      ),
      'form-maker-mailchimp/fm_mailchimp.php' => array(
        'id' => 101,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/mailchimp.html',
        'description' => 'This add-on is an integration of the Form Maker with MailChimp which allows to add contacts to your subscription lists just from submitted forms.',
        'icon' => '',
        'image' => plugins_url('assets/mailchimp.png', __FILE__),
      ),
      'form-maker-reg/fm_reg.php' => array(
        'id' => 103,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/registration.html',
        'description' => 'User Registration add-on integrates with Form maker forms allowing users to create accounts at your website.',
        'icon' => '',
        'image' => plugins_url('assets/reg.png', __FILE__),
      ),
      'form-maker-post-generation/fm_post_generation.php' => array(
        'id' => 105,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/post-generation.html',
        'description' => 'Post Generation add-on allows creating a post, page or custom post based on the submitted data.',
        'icon' => '',
        'image' => plugins_url('assets/post-generation-update.png', __FILE__),
      ),
      'form-maker-conditional-emails/fm_conditional_emails.php' => array(
        'id' => 109,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/conditional-emails.html',
        'description' => 'Conditional Emails add-on allows to send emails to different recipients depending on the submitted data .',
        'icon' => '',
        'image' => plugins_url('assets/conditional-emails-update.png', __FILE__),
      ),
      'form-maker-dropbox-integration/fm_dropbox_integration.php' => array(
        'id' => 115,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/dropbox.html',
        'description' => 'The Form Maker Dropbox Integration addon is extending the Form Maker capabilities allowing to store the form attachments straight to your Dropbox account.',
        'icon' => '',
        'image' => plugins_url('assets/dropbox-integration-update.png', __FILE__),
      ),
      'form-maker-gdrive-integration/fm_gdrive_integration.php' => array(
        'id' => 123,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/google-drive.html',
        'description' => 'The Google Drive Integration add-on integrates Form Maker with Google Drive and allows you to send the file uploads to the Google Drive.',
        'icon' => '',
        'image' => plugins_url('assets/google_drive_integration.png', __FILE__),
      ),
      'form-maker-pdf-integration/fm_pdf_integration.php' => array(
        'id' => 125,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/pdf.html',
        'description' => 'The Form Maker PDF Integration add-on allows sending submitted forms in PDF format.',
        'icon' => '',
        'image' => plugins_url('assets/pdf-integration.png', __FILE__),
      ),
      'form-maker-pushover/fm_pushover.php' => array(
        'id' => 131,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/pushover.html',
        'description' => 'Form Maker Pushover integration allows to receive real-time notifications when a user submits a new form. This means messages can be pushed to Android and Apple devices, as well as desktop notification board.',
        'icon' => '',
        'image' => plugins_url('assets/pushover.png', __FILE__),
      ),
      'form-maker-save-progress/fm_save.php' => array(
        'id' => 137,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/save-progress.html',
        'description' => 'The add-on allows to save filled in forms as draft and continue editing them subsequently.',
        'icon' => '',
        'image' => plugins_url('assets/save-progress.png', __FILE__),
      ),
      'form-maker-stripe/fm_stripe.php' => array(
        'id' => 133,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/stripe.html',
        'description' => 'Form Maker Stripe Integration Add-on allows to accept direct payments made by Credit Cards. Users will remain on your website during the entire process.',
        'icon' => '',
        'image' => plugins_url('assets/stripe-integration-update.png', __FILE__),
      ),
      'form-maker-calculator/fm_calculator.php' => array(
        'id' => 145,
        'url' => 'https://web-dorado.com/products/wordpress-form/add-ons/calculator.html',
        'description' => 'The Form Maker Calculator add-on allows creating forms with dynamically calculated fields.',
        'icon' => '',
        'image' => plugins_url('assets/calculator.png', __FILE__)
      )
    );
    return $fm_plugins[$name];
  }
	
	public function get_remote_version( $id ) {
    $userhash = 'nohash';
    if (file_exists(WD_FM_DIR . '/.keep') && is_readable(WD_FM_DIR . '/.keep')) {
      $f = fopen(WD_FM_DIR . '/.keep', 'r');
      $userhash = fgets($f);
      fclose($f);
    }

    $this->update_path .= '/' . $userhash;
    $request = wp_remote_get((str_replace('_id_', $id, $this->update_path)));
    if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
      return json_decode($request['body'], true);
    }

    return false;
  }


	public function check_for_update() {
    global $menu;
    $fm_plugins = array();
    $request_ids = array();

    if (!function_exists('get_plugins')) {
      require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    $all_plugins = get_plugins();

    foreach ($all_plugins as $name => $plugin) {
      if (strpos($name, "fm_") !== false or $name == "form-maker/form-maker.php") {

        $data = $this->get_plugin_data($name);
        if ($data['id'] > 0) {
          $request_ids[] = $data['id'] . ':' . $plugin['Version'];
          $fm_plugins[$data['id']] = $plugin;
          $fm_plugins[$data['id']]['fm_data'] = $data;
        }
      }
    }

    $this->fm_plugins = $fm_plugins;
    if (false === $updates_available = get_transient('fm_update_check')) {
      $updates_available = array();
      if (count($request_ids) > 0) {
        $remote_version = $this->get_remote_version(implode('_', $request_ids));
        if (isset($remote_version['body'])) {

          foreach ($remote_version['body'] as $id => $updated_plugins) {
            if (count($updated_plugins) == 0) {
              continue;
            }
            $updates = array();
            foreach ($updated_plugins as $updated_plugin) {
              if (version_compare($fm_plugins[$id]['Version'], $updated_plugin['version'], '<')) {
                if (strpos(strtolower($updated_plugin['note']), 'important') !== false) {
                  $updates = $updated_plugins;
                  break;
                }
              }
            }
            if (!empty($updates)) {
              $updates_available [$id] = $updates;
            }

            /* if ( isset( $updated_plugin[0]['version'] ) && version_compare( $fm_plugins[$id]['Version'], $updated_plugin[0]['version'], '<' ) && strpos(strtolower($updated_plugin[0]['note']), 'important')!==false) {
              $updates = $updated_plugins;
              break;
            } */
          }
        }
      }
      set_transient('fm_update_check', $updates_available, 12 * 60 * 60);
    }

    $this->updates = $updates_available;
    foreach ($updates_available as $key => $update_available) {
      $update_version = $update_available[0]['version'];
      if (isset($fm_plugins[$key]) && $update_version == $fm_plugins[$key]['Version']) {
        unset($updates_available[$key]);
      }
    }
    $updates_count = is_array($updates_available) ? count($updates_available) : 0;
    add_submenu_page('manage_fm', 'Updates', 'Updates' . ' ' . '<span class="update-plugins count-' . $updates_count . '" title="title"><span class="update-count">' . $updates_count . '</span></span>', 'manage_options', 'updates_fm', 'updates_fm');

    $uninstall_page = add_submenu_page('manage_fm', 'Uninstall', 'Uninstall', 'manage_options', 'uninstall_fm', 'form_maker');
    add_action('admin_print_styles-' . $uninstall_page, 'form_maker_styles');
    add_action('admin_print_scripts-' . $uninstall_page, 'form_maker_scripts');

    if ($updates_count > 0) {
      foreach ($menu as $key => $value) {

        if ($menu[$key][2] == 'manage_fm' || $menu[$key][2] == 'updates_fm') {
          $menu[$key][0] .= ' ' . '<span class="update-plugins count-' . $updates_count . '" title="title">
                                                    <span class="update-count">' . $updates_count . '</span></span>';

          return;
        }

      }
    }

  }
	
	public function plugin_updated() {
		delete_transient( 'fm_update_check' );
	}
}

?>