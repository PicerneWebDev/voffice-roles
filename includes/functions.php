<?php
/**
 * Preg Utility Functions
 *
 * @package Preg_Utility
 * @subpackage Classes/Functions
 * @copyright Copyright (c) 2015, Picerne Real Estate Group
 * @since 0.0.1
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * If a user is logged in, get the user object and add a global $current_i4_user for use throughout the site and plugin
 *
 * @since 0.0.1
 */
function voffice_get_user() {
    global $current_voffice_user;
    //Check if the user is logged in
    if (is_user_logged_in()) {
        global $current_voffice_user;
        $current_voffice_user = wp_get_current_user(); //load the current user for use throughout the site
    }
}

add_action('plugins_loaded', 'voffice_get_user');
