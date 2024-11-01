<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/public
 * @author     Author Name <wizard@elixirs.io>
 */
class social_share_buttons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name 	= $plugin_name;
		$this->version		= $version;

		add_filter( 'the_content', array( $this, 'render_html_area'), 20 );
	}

	public function render_html_area( $content ) {
		include plugin_dir_path( __FILE__ ) . 'partials/social-share-buttons-public-display.php';

		$original_content = $content ;
		$before_content =  '';
		$after_content = '';

		if ($post_position == 'position-above') {
			$before_content = $wssi_element;
		}

		if ($post_position == 'position-below') {
			$after_content = $wssi_element;
		}

		if ($post_position == 'position-both') {
			$before_content = $wssi_element;
			$after_content = $wssi_element;
		}

		$content = $before_content . $original_content . $after_content;	

		return $content;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name . '-fontawesome', plugin_dir_url( __FILE__ ) . 'css/fontawesome-5.13.1/fontawesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-fontawesome-brands', plugin_dir_url( __FILE__ ) . 'css/fontawesome-5.13.1/brands.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-fontawesome-regular', plugin_dir_url( __FILE__ ) . 'css/fontawesome-5.13.1/regular.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/social-share-buttons-public.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/social-share-buttons-public.js', array( 'jquery' ), $this->version, false );
	}

}
