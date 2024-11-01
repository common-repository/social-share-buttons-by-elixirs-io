<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/admin
 */

class social_share_buttons_Admin {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_title = 'WordPress Social Sharing Icons';
		add_action('admin_menu', array( $this, 'social_share_buttons_plugin_admin_menu' ), 9);	
		add_action('admin_notices', array( $this, 'social_share_buttons_activation_notice'));	
	} 

	public function social_share_buttons_activation_notice() {
		$run_once = get_option('elixirs_wssi_run_once');
		if (!$run_once){
			echo '
			<div id="elixirs_wssi_activation" class="notice notice-success is-dismissible">
            	<p style="display: inline-block;">'.$this->plugin_title.' is now activated. <a href="options-general.php?page='.$this->plugin_name.'">Click here to edit the settings</a>.</p>
        	</div>';
			update_option('elixirs_wssi_run_once', true);
		}
    }

	public function social_share_buttons_plugin_admin_menu() {
		add_options_page(  $this->plugin_title, $this->plugin_title, 'administrator', $this->plugin_name, array( $this, 'social_share_buttons_options_page' ));
	}

	public function social_share_buttons_options_page() {
		include plugin_dir_path( __FILE__ ) . 'partials/social-share-buttons-admin-display.php';
	}

	public function enqueue_styles() {
		wp_register_style( 'font-awesome', plugin_dir_url( __FILE__ ) . '../public/css/fontawesome-5.13.1/fontawesome.min.css', array(), $this->version, 'all' );
		wp_register_style( 'font-awesome-brands',  plugin_dir_url( __FILE__ ) . '../public/css/fontawesome-5.13.1/brands.min.css', array(), $this->version, 'all' );
		wp_register_style( 'font-awesome-regular',  plugin_dir_url( __FILE__ ) . '../public/css/fontawesome-5.13.1/regular.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/social-share-buttons-admin.css', array('wp-color-picker', 'font-awesome', 'font-awesome-brands', 'font-awesome-regular'), $this->version, 'all' );	
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/social-share-buttons-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
	}

}
