<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mydigitalsauce.com
 * @since             0.6.0
 * @package           Announcement_Bar
 *
 * @wordpress-plugin
 * Plugin Name:       Radical Skincare Announcement Bar
 * Plugin URI:        https://mydigitalsauce.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.6.0
 * Author:            MyDigitalSauce
 * Author URI:        https://mydigitalsauce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       announcement-bar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ANNOUNCEMENT_BAR_VERSION', '0.6.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-announcement-bar-activator.php
 */
function activate_announcement_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-announcement-bar-activator.php';
	Announcement_Bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-announcement-bar-deactivator.php
 */
function deactivate_announcement_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-announcement-bar-deactivator.php';
	Announcement_Bar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_announcement_bar' );
register_deactivation_hook( __FILE__, 'deactivate_announcement_bar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-announcement-bar.php';

function announcement_bar_plugin_action_links( $links ) {
	$links[] = '<a href="' . admin_url( 'options-general.php?page=announcement-bar' ) . '">' . __('Settings') . '</a>';
	return $links;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_announcement_bar() {

	$plugin = new Announcement_Bar();
	$plugin->run();

	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'announcement_bar_plugin_action_links' );

}
run_announcement_bar();
