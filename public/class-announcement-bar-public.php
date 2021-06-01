<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mydigitalsauce.com
 * @since      0.5.0
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/public
 * @author     MyDigitalSauce <justin@mydigitalsauce.com>
 */
class Announcement_Bar_Public {

	private $plugin_name;
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.6.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->settings = json_decode( get_option( 'ab_settings' ) );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.6.0
	 */
	public function enqueue_styles() {

		if ( $this->settings->show_announcement_bar ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/public.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.6.0
	 */
	public function enqueue_scripts() {

		if ( $this->settings->show_announcement_bar ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/public.js', array( 'jquery' ), $this->version, false );
		}

	}

}
