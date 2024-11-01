
<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/public/partials
 */
?>

<?php
//Change default values
//$design_variation = get_option('elixirs_wssi_options_design');
$post_position = get_option('elixirs_wssi_options_position');

//Icons
$facebook_enabled = get_option('elixirs_wssi_facebook_checkbox');
$twitter_enabled = get_option('elixirs_wssi_twitter_checkbox');
$linkedin_enabled = get_option('elixirs_wssi_linkedin_checkbox');
$whatsapp_enabled = get_option('elixirs_wssi_whatsapp_checkbox');
$fbmessenger_enabled = get_option('elixirs_wssi_fbmessenger_checkbox');
$email_enabled = get_option('elixirs_wssi_email_checkbox');
$pinterest_enabled = get_option('elixirs_wssi_pinterest_checkbox');
$reddit_enabled = get_option('elixirs_wssi_reddit_checkbox');

global $wp;
$currentUrl = home_url( $wp->request );
$wssi_channels = '';

if ($facebook_enabled) {
    $wssi_channels .= '<a href="#" class="wssi-facebook" data-channel="facebook" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-facebook-f"></i></a>';
}

if ($twitter_enabled) {
    $wssi_channels .= '<a href="#" class="wssi-twitter" data-channel="twitter" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-twitter"></i></a>';
}

if ($linkedin_enabled) {
    $wssi_channels .= '<a href="#" class="wssi-linkedin" data-channel="linkedin" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-linkedin-in"></i> </a>';
}

if ($whatsapp_enabled) {
    if (wp_is_mobile()) {
        $wssi_channels .= '<a href="#" class="wssi-whatsapp" data-channel="whatsapp" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-whatsapp"></i></a>';
    }
}

if ($fbmessenger_enabled) {
    if (wp_is_mobile()) {
        $wssi_channels .= '<a href="#" class="wssi-fbmessenger" data-channel="fbmessenger" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-facebook-messenger"></i></a>';
    }
}

if ($pinterest_enabled) {
    $wssi_channels .= '<a href="#" class="wssi-pinterest" data-channel="pinterest" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-pinterest-p"></i> </a>';
}

if ($reddit_enabled) {
    $wssi_channels .= '<a href="#" class="wssi-reddit" data-channel="reddit" data-text="" data-url="'.$currentUrl.'"><i class="fab fa-reddit-alien"></i></a>';
}

if ($email_enabled) {
    $wssi_channels .= '<a href="mailto:?subject=Check%20this%20out&body='.$currentUrl.'" class="wssi-email"><i class="far fa-envelope"></i></a>';
}

$wssi_element = '<div id="social-share-buttons" class="'.$design_class.'">'.$wssi_channels.'</div>';
?>