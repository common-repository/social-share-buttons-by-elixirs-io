<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/includes
 */
class social_share_buttons_i18n {
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'social-share-buttons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
