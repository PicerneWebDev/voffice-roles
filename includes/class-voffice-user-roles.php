<?php
/**
 * Voffice_Roles User Roles
 *
 * @package Voffice_Roles
 * @subpackage Classes/User Roles
 * @copyright Copyright (c) 2016, Picerne Real Estate Group
 * @since 0.0.1
 */

 // Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Voffice_User_Roles Classes
 * This handles creating roles for the i4Web LMS Plugin
 *
 * @since 0.0.1
 */
class Voffice_User_Roles {
    /**
     * Class Construct to get started
     *
     * @since 0.0.1
     */
    public function __construct() {

    }

    /**
     * Adds the custom roles
     *
     * We explicitly deny capabilities by using 'false'
     *
     */
    public function voffice_add_roles() {
        global $wp_roles;

        //Add the VP Role with elevated capabilities.
        add_role('vp', __('Vice President', 'preg'), array(
            'create_users' => true,
            'delete_users' => true,
            'edit_users' => true,
            'delete_others_pages' => false,
            'delete_others_posts' => false,
            'delete_pages' => false,
            'delete_posts' => false,
            'delete_private_pages' => false,
            'delete_private_posts' => false,
            'delete_published_pages' => false,
            'delete_published_posts' => false,
            'edit_dashboard' => true,
            'edit_others_pages' => true,
            'edit_others_posts' => true,
            'edit_pages' => true,
            'edit_posts' => true,
            'edit_private_pages' => true,
            'edit_private_posts' => true,
            'edit_published_pages' => true,
            'edit_published_posts' => true,
            'edit_theme_options' => false,
            'manage_categories' => false,
            'manage_links' => false,
            'manage_options' => true,
            'moderate_comments' => false,
            'publish_pages' => false,
            'publish_posts' => false,
            'read' => true,
            'read_private_pages' => false,
            'read_private_posts' => false,
            'switch_themes' => false,
            'upload_files' => true
        ));

        //Add the VP Role with elevated capabilities.
        add_role('dm', __('District Manager', 'preg'), array(
            'create_users' => true,
            'delete_users' => true,
            'edit_users' => true,
            'delete_others_pages' => false,
            'delete_others_posts' => false,
            'delete_pages' => false,
            'delete_posts' => false,
            'delete_private_pages' => false,
            'delete_private_posts' => false,
            'delete_published_pages' => false,
            'delete_published_posts' => false,
            'edit_dashboard' => true,
            'edit_others_pages' => true,
            'edit_others_posts' => true,
            'edit_pages' => true,
            'edit_posts' => true,
            'edit_private_pages' => true,
            'edit_private_posts' => true,
            'edit_published_pages' => true,
            'edit_published_posts' => true,
            'edit_theme_options' => false,
            'manage_categories' => false,
            'manage_links' => false,
            'manage_options' => true,
            'moderate_comments' => false,
            'publish_pages' => false,
            'publish_posts' => false,
            'read' => true,
            'read_private_pages' => false,
            'read_private_posts' => false,
            'switch_themes' => false,
            'upload_files' => true
        ));

        //Add the "Property" role with basic subscriber capabilities
        add_role('property', __('Property', 'preg'), array(
            'delete_others_pages' => false,
            'delete_others_posts' => false,
            'delete_pages' => false,
            'delete_posts' => false,
            'delete_private_pages' => false,
            'delete_private_posts' => false,
            'delete_published_pages' => false,
            'delete_published_posts' => false,
            'edit_dashboard' => false,
            'edit_others_pages' => false,
            'edit_others_posts' => false,
            'edit_pages' => false,
            'edit_posts' => false,
            'edit_private_pages' => false,
            'edit_private_posts' => false,
            'edit_published_pages' => false,
            'edit_published_posts' => false,
            'edit_theme_options' => false,
            'manage_categories' => false,
            'manage_links' => false,
            'manage_options' => false,
            'moderate_comments' => false,
            'publish_pages' => false,
            'publish_posts' => false,
            'read' => true,
            'read_private_pages' => false,
            'read_private_posts' => false,
            'switch_themes' => false,
            'upload_files' => false
        ));

    }

    /**
     * Adds Custom Capabilities to certain roles
     * @since 1.0.0
     */
    public function voffice_add_capabilities() {

        //Retrieve our Custom Roles
        $vp_role = get_role('vp');
        $dm_role = get_role('dm');

        //Add Capabilities to Roles
        $vp_role->add_cap('run_vp_reports');        //Run VP Level Reports for VP
        $vp_role->add_cap('run_dm_reports');        //Run DM Level Reports for VP

        $dm_role->add_cap('run_dm_reports');        //Run DM Level Reports for DM


        //Add all custom capabilities for our Admin profiles cuz we can do whatever we want bro.
        $admin_role = get_role('administrator');
        $admin_role->add_cap('run_vp_reports');
        $admin_role->add_cap('run_dm_reports');

    }

    /**
     * Remove Roles from the Site (for devs only)
     *
     * @since 1.0.0
     */
    public function voffice_remove_roles() {
        //For development purposes only
        //remove_role( 'vp' );
        //remove_role( 'dm' );
    }


}
