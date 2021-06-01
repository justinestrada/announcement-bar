<?php

/**
 * Fired during plugin activation
 *
 * @link       https://mydigitalsauce.com
 * @since      0.0.1
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.0.1
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/includes
 * @author     MyDigitalSauce <justin@mydigitalsauce.com>
 */
class Announcement_Bar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.0.1
	 */
	public static function activate() {

		$init = get_option( 'ab_init' );
		if ( ! empty( $init ) ) {
			return;
		}

		$settings = array(
			'show_announcement_bar' => true,
			'image_src' => '',
			'text' => '',
		);
		update_option( 'ab_settings', json_encode( $settings ) );

		update_option( 'ab_init', true );

	}

}
