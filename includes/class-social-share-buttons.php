<?php
class social_share_buttons {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'SOCIAL_SHARE_BUTTONS_VERSION' ) ) {
			$this->version = SOCIAL_SHARE_BUTTONS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'social-share-buttons';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-social-share-buttons-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-social-share-buttons-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-social-share-buttons-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-social-share-buttons-public.php';
		$this->loader = new social_share_buttons_Loader();
	}

	private function set_locale() {
		$plugin_i18n = new social_share_buttons_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {
		$plugin_admin = new social_share_buttons_Admin( $this->get_plugin_name(), $this->get_version() );
		global $pagenow;
		if (($pagenow == 'options-general.php') && ($this->get_plugin_name() === $_GET['page'])) {
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		}
	}

	private function define_public_hooks() {
		$plugin_public = new social_share_buttons_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
