<?php
/**
 * Installs the VOffice User Role Plugin
 * @package Voffice_Roles
 * @subpackage Functions/Install
 * @copyright Copyright (c) 2016, Picerne Real Estate Group
 * @since 0.0.1
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Installation functions
 *
 * This runs when the plugin is activated
 * @since 0.0.1
 */
function voffice_roles_installation() {
    global $wp_roles;

    Voffice_Roles()->voffice_roles->voffice_add_roles();

    Voffice_Roles()->voffice_roles->voffice_add_capabilities();
}

/**
 * Uninstall functions
 *
 * This runs when the plugin is activated
 * @since 0.0.1
 */
function voffice_roles_uninstall() {

    //$voffice_roles->voffice_remove_roles();  //Currently not being used. Only for debugging purposes

}


register_activation_hook(VOFFICE_ROLES_PLUGIN_FILE, 'voffice_roles_installation');

register_deactivation_hook(VOFFICE_ROLES_PLUGIN_FILE, 'voffice_roles_uninstall'); //Trigger things to happen if the plugin is ever uninstalled
