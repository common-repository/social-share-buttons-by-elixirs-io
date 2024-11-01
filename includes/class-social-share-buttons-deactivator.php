<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/includes
 */
class social_share_buttons_Deactivator {
	public static function deactivate() { 

		delete_option('elixirs_wssi_options_position');
		delete_option('elixirs_wssi_facebook_checkbox');
		delete_option('elixirs_wssi_twitter_checkbox');
		delete_option('elixirs_wssi_linkedin_checkbox');
		delete_option('elixirs_wssi_whatsapp_checkbox');
		delete_option('elixirs_wssi_fbmessenger_checkbox');
		delete_option('elixirs_wssi_pinterest_checkbox');
		delete_option('elixirs_wssi_reddit_checkbox');
		delete_option('elixirs_wssi_email_checkbox');

	}
}
