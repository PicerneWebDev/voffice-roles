<?php
/**
 * Plugin Name: V-Office Roles
 * Plugin URI: http://www.picernerealestategroup.com
 * Description: The V-Office Roles plugin manages the custom roles and capabilities for the site
 * Author: Picerne Real Estate Group
 * Author URI: http://www.picernerealestategroup.com
 * Version: 0.0.1
 * Text Domain: preg
 * Domain Path: N/A
 *
 *
 *
 *
 * @package Voffice_Roles
 * @category Core
 * @author Jonathan Rivera
 * @version 0.0.1
 */

 // Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Voffice_Roles')) :

/**
     * Main Voffice_Roles class_exists
     *
     * @since 1.0.0
     */
    final class Voffice_Roles {

        /**
         * @var The one and only.
         * @since 0.0.1
         */
        private static $instance;

        /**
         * Voffice_Roles Roles Object
         *
         * @var object
         * @since 1.0.0
         */
        public $voffice_roles;

        /**
         * Main Voffice_Roles instance
         *
         * Uses the singleton OOP approach to ensure that only one instance Voffice_Roles exists in memory at any one time.
         * this prevents the need to define a lot of Globals.
         *
         * @since 0.0.1
         * @static var array $instance
         * @uses Voffice_Roles::includes() Include the required files for the Voffice_Roles plugin
         * @see Voffice_Roles()
         * @return The one and only Voffice_Roles
         */
        public static function instance(){
            if( !isset(self::$instance) && !(self::$instance instanceof Voffice_Roles)) {
                self::$instance = new Voffice_Roles;
                self::$instance->voffice_roles_constants();
                self::$instance->includes();
                self::$instance->voffice_roles = new Voffice_User_Roles();

            }
            return self::$instance;
        } //end instance()

        /**
         * Throw and error when the object is cloned
         *
         * Since we're using the singleton design pattern there should only be one single object...So no objects are to be cloned
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
        public function __clone() {
            //Cloned instances of the Candidate_Space class is not allowed
            _doing_it_wrong(__FUNCTION__, __('Word? That aint allowed son!', 'preg'), '0.0.1');
        }

        /**
         * Disable unserializing of the class
         *
         * @since 0.0.1
         * @access protected
         * @return void
         */
        public function __wakeup() {
            //Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Word? That aint allowed son!', 'preg'), '0.0.1');
        }

        /**
         * Setup the Voffice_Roles plugin constants
         *
         * @access private
         * @since 0.0.1
         * @return void
         */
        private function voffice_roles_constants() {
            //Plugin Version
            if (!defined('VOFFICE_ROLES_VERSION')) {
                define('VOFFICE_ROLES_VERSION', '0.0.1');
            }

            //Path to the Picerne Utility Plugin
            if (!defined('VOFFICE_ROLES_PLUGIN_DIR')) {
                define('VOFFICE_ROLES_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            //Plugin Folder URL
            if (!defined('VOFFICE_ROLES_PLUGIN_URL')) {
                define('VOFFICE_ROLES_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            //Plugin Root File
            if (!defined('VOFFICE_ROLES_PLUGIN_FILE')) {
                define('VOFFICE_ROLES_PLUGIN_FILE', __FILE__);
            }

            //Make sure that CAL_GREGORIAN is defined
            if (!defined('CAL_GREGORIAN')) {
                define('CAL_GREGORIAN', 1);
            }

        } //end voffice_roles_constants

        /**
         *
         * @access private
         * @since 0.0.1
         * @return void
         */
        private function includes() {
            require_once VOFFICE_ROLES_PLUGIN_DIR . 'includes/install.php';
            require_once VOFFICE_ROLES_PLUGIN_DIR . 'includes/class-voffice-user-roles.php';

        }

    } //end Main Preg_Utility class

endif; // End if class_exists check

/**
 * Responsible for returning the one and only Preg_Utility instance to our functions
 *
 * This function gets used like a Global variable, except you don't have to declare the Global
 * Example: <?php $preg_utility = Preg_Utility(); ?>
 *
 * @since 0.0.1
 * @return object The one and only Preg_Utility instance
 */
function Voffice_Roles() {
    return Voffice_Roles::instance();
}

Voffice_Roles();
