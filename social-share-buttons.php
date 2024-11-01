<?php
/*
Plugin Name:       Social Share Buttons by elixirs.io
Plugin URI:        https://elixirs.io/plugins/social-share-buttons
Description:       The quickest & easiest plugin to add social media share buttons to your WordPress posts. Facebook, Twitter, Reddit, WhatsApp and more.
Version:           1.0.0
Author:            elixirs.io
Author URI:        https://elixirs.io
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:       easy-call-now-button
Domain Path:       /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'SOCIAL_SHARE_BUTTONS_VERSION', '1.0.0' );

function activate_social_share_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-share-buttons-activator.php';
	social_share_buttons_Activator::activate();
}

function deactivate_social_share_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-share-buttons-deactivator.php';
	social_share_buttons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_social_share_buttons' );
register_deactivation_hook( __FILE__, 'deactivate_social_share_buttons' );

require plugin_dir_path( __FILE__ ) . 'includes/class-social-share-buttons.php';

function run_social_share_buttons() {
	$plugin = new social_share_buttons();
	$plugin->run();
}

run_social_share_buttons();
