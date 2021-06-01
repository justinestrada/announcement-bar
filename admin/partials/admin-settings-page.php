<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://mydigitalsauce.com/
 * @since      0.1.0
 *
 * @package    Announcement_Bar
 * @subpackage Announcement_Bar/admin/partials
 */

$success_msg = "";
if (  isset($_POST['action']) && $_POST['action'] === 'update_settings'  ) {
	$settings = array(
	    'show_announcement_bar' => ( isset($_POST['show_announcement_bar']) ) ? true : false,
	    'sticky' => ( isset($_POST['sticky']) ) ? true : false,
	    'background_color' => $_POST['background_color'],
	    'text' => htmlentities(stripslashes($_POST['text'])),
	    'show_close_button' => ( isset($_POST['show_close_button']) ) ? true : false,
	);
	update_option( 'ab_settings', json_encode( $settings ) );
	$success_msg = __( 'Settings Updated.' );
}

if ( ! empty( $success_msg ) ) { ?>
	<div class="notice notice-success is-dismissible">
		<p><?php echo $success_msg; ?></p>
	</div>
<?php }

$settings = json_decode( get_option( 'ab_settings' ) ); ?>

<div class="wrap">
	<h1>Announcement Bar</h1>
	<p>Display an announcement bar anywhere on your site, perfect for announcements, notices, flash sales, ectera. Use your creativity!</p>
	<form method="post" action="<?php echo get_site_url(); ?>/wp-admin/options-general.php?page=announcement-bar" >
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="show_announcement_bar">Show</label></th>
					<td>
						<input type="checkbox" id="show_announcement_bar" name="show_announcement_bar" value="1" <?php echo (isset($settings->show_announcement_bar) && $settings->show_announcement_bar) ? 'checked': ''; ?>/> Show Announcement Bar
					</td>
				</tr>
				<tr>
					<th><label for="sticky">Sticky</label></th>
					<td>
						<input type="checkbox" id="sticky" name="sticky" value="1" <?php echo (isset($settings->sticky) && $settings->sticky) ? 'checked': ''; ?>/> Make Announcement Bar Sticky
						<p class="description">Stays fixed as user scrolls.</p>
					</td>
				</tr>
				<tr>
					<th><label for="background_color">Background Color</label>
					</th>
					<td>
						<input type="text" id="background_color" name="background_color" class="regular-text" value="<?php echo isset($settings->background_color) ? $settings->background_color: '#666666'; ?>" required/>
					</td>
				</tr>
				<tr>
					<th><label for="text">Text</label>
					</th>
					<td>
						<textarea rows="10" cols="100" id="text" name="text" class="regular-text" required><?php echo isset($settings->text) ? $settings->text : ''; ?></textarea>
					</td>
				</tr>
				<tr>
					<th><label for="show_close_button">Show Close Button</label></th>
					<td>
						<input type="checkbox" id="show_close_button" name="show_close_button" value="1" <?php echo (isset($settings->show_close_button) && $settings->show_close_button) ? 'checked': ''; ?>/> Show Close Button
					</td>
				</tr>
			</tbody>
		</table>
		<button type="submit" name="action" value="update_settings" class="button button-primary" >Save Changes</button>
	</form>
</div>