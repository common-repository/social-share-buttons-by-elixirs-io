<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://elixirs.io
 * @since      1.0.0
 *
 * @package    social_share_buttons
 * @subpackage social_share_buttons/admin/partials
 */
?>

<div class="elixirs_wssi-container">

    <div class="elixirs_wssi-header">
        <span class="elixirs_wssi-icon-bkg"><span class="elixirs_wssi-icon dashicons dashicons-share"></span></span>
        <h1>WordPress Social Sharing Icons | Settings</h1>
    </div>

    <?php

    if ( isset( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( $_REQUEST['_wpnonce'] ) ) {

        /*
        if ( isset( $_POST['elixirs_wssi_options_design'] ) ) {
            update_option('elixirs_wssi_options_design', sanitize_text_field( $_POST['elixirs_wssi_options_design'] ));
        } else {
            update_option('elixirs_wssi_options_design', 0 );
        }
        */

        if ( isset( $_POST['elixirs_wssi_options_position'] ) ) {
            update_option('elixirs_wssi_options_position', sanitize_text_field( $_POST['elixirs_wssi_options_position'] ));
        } else {
            update_option('elixirs_wssi_options_position', 0 );
        }
        
        if ( isset( $_POST['elixirs_wssi_facebook_checkbox'] ) ) {
            update_option('elixirs_wssi_facebook_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_facebook_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_twitter_checkbox'] ) ) {
            update_option('elixirs_wssi_twitter_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_twitter_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_linkedin_checkbox'] ) ) {
            update_option('elixirs_wssi_linkedin_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_linkedin_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_whatsapp_checkbox'] ) ) {
            update_option('elixirs_wssi_whatsapp_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_whatsapp_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_fbmessenger_checkbox'] ) ) {
            update_option('elixirs_wssi_fbmessenger_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_fbmessenger_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_pinterest_checkbox'] ) ) {
            update_option('elixirs_wssi_pinterest_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_pinterest_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_reddit_checkbox'] ) ) {
            update_option('elixirs_wssi_reddit_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_reddit_checkbox', 0 );
        }

        if ( isset( $_POST['elixirs_wssi_email_checkbox'] ) ) {
            update_option('elixirs_wssi_email_checkbox', 1 );
        } else {
            update_option('elixirs_wssi_email_checkbox', 0 );
        }

    } 

    //$elixirs_wssi_options['design'] = get_option('elixirs_wssi_options_design', 0);
    $elixirs_wssi_options['position'] = get_option('elixirs_wssi_options_position', 0);

    $elixirs_wssi_options['elixirs_wssi_facebook_checkbox'] = get_option('elixirs_wssi_facebook_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_twitter_checkbox'] = get_option('elixirs_wssi_twitter_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_linkedin_checkbox'] = get_option('elixirs_wssi_linkedin_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_whatsapp_checkbox'] = get_option('elixirs_wssi_whatsapp_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_fbmessenger_checkbox'] = get_option('elixirs_wssi_fbmessenger_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_pinterest_checkbox'] = get_option('elixirs_wssi_pinterest_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_reddit_checkbox'] = get_option('elixirs_wssi_reddit_checkbox', 0);
    $elixirs_wssi_options['elixirs_wssi_email_checkbox'] = get_option('elixirs_wssi_email_checkbox', 0);

    if ( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
    } else {
        $active_tab = "basic_settings";
    }
    ?>

    <div class="elixirs_wssi-menu">
        <a href="?page=social-share-buttons&tab=basic_settings" class="nav-tab <?php echo $active_tab == 'basic_settings' ? 'nav-tab-active' : ''; ?>">Basic Settings</a>
    </div>

    <?php
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if ( !wp_verify_nonce($_POST['_wpnonce'] )) {
            die('Sorry, but this request is invalid');
        } else {
            ?>
            <div class="notice notice-success is-dismissible">
                <p><?php _e('Your settings have been updated.', 'textdomain') ?></p>
            </div>
            <?php
        }
    }
    ?>

    <?php
    /*
    $elixirs_wssi_design_one = '';
    $elixirs_wssi_design_two = '';
    $elixirs_wssi_design_three = '';
    if ($elixirs_wssi_options['design']) {
        if ($elixirs_wssi_options['design'] == 'design-one') {
            $elixirs_wssi_design_one = 'checked';
        }
        if ($elixirs_wssi_options['design'] == 'design-two') {
            $elixirs_wssi_design_two = 'checked';
        }
        if ($elixirs_wssi_options['design'] == 'design-three') {
            $elixirs_wssi_design_three = 'checked';
        }
    } else {
        $elixirs_wssi_design_one = 'checked';
    }
    */

    $elixirs_wssi_position_above = '';
    $elixirs_wssi_position_below = '';
    $elixirs_wssi_position_both = '';
    if ($elixirs_wssi_options['position']) {
        if ($elixirs_wssi_options['position'] == 'position-above') {
            $elixirs_wssi_position_above = 'checked';
        }
        if ($elixirs_wssi_options['position'] == 'position-below') {
            $elixirs_wssi_position_below = 'checked';
        }
        if ($elixirs_wssi_options['position'] == 'position-both') {
            $elixirs_wssi_position_both = 'checked';
        }
    } else {
        $elixirs_wssi_position_both = 'checked';
    }
    ?>

    <form method="post" action="" class="elixirs_wssi-form">
        <?php wp_nonce_field(); ?>

        <table class="form-table <?php echo $active_tab == 'basic_settings' ? 'nav-tab-active' : ''; ?>">
            <tr>
                <h2>Basic Settings</h2> 
            </tr>

            <tr valign="top">
                <th scope="row">Social Media Icons</th>
                <td>
                    Select the social media you want to enable.<br/>
                        
                    <ul class="elixirs_wssi_social_fields">
                  
                        <li class="facebook">
                            <p><i class="fab fa-facebook-f"></i>
                                <label for="elixirs_wssi_facebook" class="facebook">Facebook</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_facebook_checkbox" 
                                       id="elixirs_wssi_facebook_checkbox" 
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_facebook_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="twitter">
                            <p><i class="fab fa-twitter"></i>
                                <label for="elixirs_wssi_twitter" class="twitter">Twitter</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_twitter_checkbox" 
                                       id="elixirs_wssi_twitter_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_twitter_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="linkedin">
                            <p><i class="fab fa-linkedin"></i>
                                <label for="elixirs_wssi_linkedin" class="linkedin">Linkedin</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_linkedin_checkbox" 
                                       id="elixirs_wssi_linkedin_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_linkedin_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="pinterest">
                            <p><i class="fab fa-pinterest-p"></i> 
                                <label for="elixirs_wssi_pinterest" class="pinterest">Pinterest</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_pinterest_checkbox" 
                                       id="elixirs_wssi_pinterest_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_pinterest_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="whatsapp">
                            <p><i class="fab fa-whatsapp"></i>
                                <label for="elixirs_wssi_whatsapp" class="whatsapp">WhatsApp</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_whatsapp_checkbox" 
                                       id="elixirs_wssi_whatsapp_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_whatsapp_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="facebook-messenger">
                            <p><i class="fab fa-facebook-messenger"></i>
                                <label for="elixirs_wssi_fbmessenger" class="fbmessenger">Facebook Messenger</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_fbmessenger_checkbox" 
                                       id="elixirs_wssi_fbmessenger_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_fbmessenger_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="reddit">
                            <p><i class="fab fa-reddit-alien"></i>
                                <label for="elixirs_wssi_reddit" class="reddit">Reddit</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_reddit_checkbox" 
                                       id="elixirs_wssi_reddit_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_reddit_checkbox'], 1 ); ?> />
                            </p>
                        </li>
                        <li class="email">
                            <p><i class="far fa-envelope"></i>
                                <label for="elixirs_wssi_email" class="email">Email</label>
                                <input type="checkbox" 
                                       name="elixirs_wssi_email_checkbox" 
                                       id="elixirs_wssi_email_checkbox"
                                       <?php checked($elixirs_wssi_options['elixirs_wssi_email_checkbox'], 1 ); ?> />
                        </li>

                    </ul>
             
                </td>
            </tr>                  

            <!--
            <tr valign="top">
                <th scope="row">Design variation:</th>
                <td>
                    <input type="radio" id="design-one" name="elixirs_wssi_options_design" value="design-one" <?php echo $elixirs_wssi_design_one; ?>>
                    <label for="design-one">Design #1</label><br>

                    <input type="radio" id="design-two" name="elixirs_wssi_options_design" value="design-two" <?php echo $elixirs_wssi_design_two; ?>>
                    <label for="design-two">Design #2</label><br>

                    <input type="radio" id="design-three" name="elixirs_wssi_options_design" value="design-three" <?php echo $elixirs_wssi_design_three; ?>>
                    <label for="design-three">Design #3</label>
                </td>
            </tr>
            -->

            <tr valign="top">
                <th scope="row">WordPress Post Position:</th>
                <td>
                    <input type="radio" id="position-above" name="elixirs_wssi_options_position" value="position-above" <?php echo $elixirs_wssi_position_above; ?>>
                    <label for="position-above">Above Post</label><br>

                    <input type="radio" id="position-below" name="elixirs_wssi_options_position" value="position-below" <?php echo $elixirs_wssi_position_below; ?>>
                    <label for="position-below">Below Post</label><br>

                    <input type="radio" id="position-both" name="elixirs_wssi_options_position" value="position-both" <?php echo $elixirs_wssi_position_both; ?>>
                    <label for="position-both">Above &amp; Below Post</label>
                </td>
            </tr>

        </table>

        <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>

    </form>

</div>