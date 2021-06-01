<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mydigitalsauce.com
 * @since      0.0.1
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/admin
 * @author     MyDigitalSauce <justin@mydigitalsauce.com>
 */
class Announcement_Bar_Admin {

	private $plugin_name;
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', array($this, 'create_admin_menu') );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, false );

	}


	public function create_admin_menu() {
		$hook = add_submenu_page(
			'options-general.php',
			'Announcement Bar - Settings',
			'Announcement Bar',
			'manage_options',
			'announcement-bar',
			array($this, 'create_admin_page')
		);
	}

	public function create_admin_page() {
		
		require plugin_dir_path( __FILE__ ) . 'partials/admin-settings-page.php';

	}

}
