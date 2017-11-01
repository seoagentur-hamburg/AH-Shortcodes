<?php
/**
 * Plugin Name: AH Shortcodes
 * Plugin URI: https://andreas-hecht.com/plugins/evolution-shortcodes
 * Description: This is a simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
 * Version: 1.0.1
 * Author: Andreas Hecht
 * Author URI: https://andreas-hecht.com
 * Based on the ZillaShortcodes Plugin
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: evo-shortcodes
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

function evolution_load_plugin_textdomain() {
    load_plugin_textdomain( 'evo-shortcodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'evolution_load_plugin_textdomain' );


class Evolution_Shortcodes {

    
    public function __construct() {

        // Plugin folder path
        if ( ! defined( 'EVOLUTION_PLUGIN_DIR' ) ) {
            define( 'EVOLUTION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        }

        // Plugin folder URL
        if ( ! defined( 'EVOLUTION_PLUGIN_URL' ) ) {
            define( 'EVOLUTION_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        }

        require_once( EVOLUTION_PLUGIN_DIR .'includes/shortcodes.php' );

        add_action( 'init', array(&$this, 'init') );
        add_action( 'admin_init', array(&$this, 'admin_init') );
    }

    /**
	 * Enqueue front end scripts and styles
	 *
	 * @return	void
	 */
    public function init() {
        
        if( ! is_admin() )
        {
            wp_enqueue_style( 'evolution-shortcodes', EVOLUTION_PLUGIN_URL . 'assets/css/shortcodes.css' );
            wp_enqueue_script( 'evolution-shortcodes-js', EVOLUTION_PLUGIN_URL . 'assets/js/evolution-shortcodes.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs') );
        }
    }

    /**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
    public function admin_init() {
        
        include_once( EVOLUTION_PLUGIN_DIR . 'includes/class-admin-insert.php' );

        wp_enqueue_style( 'evolution-admin', EVOLUTION_PLUGIN_URL . 'assets/css/admin.css', false, '1.0', 'all' );

        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_localize_script( 'jquery', 'Evolution-Shortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/evolution-shortcodes') );
    }
}

new Evolution_Shortcodes();