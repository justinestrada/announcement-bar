<?php
/**
 *
 * @link       https://taylordigital.com
 * @since      0.1.0
 *
 * @package    Announcement_Bar_Shortcodes
 */
/**
 *
 * @package    Announcement_Bar_Shortcodes
 * @author     Taylor Digital <support@taylordigital.com>
 */
class Announcement_Bar_Shortcodes {
	
	private $plugin_name;
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param    string    $plugin_name   The name of the plugin.
	 * @param    string    $version    		The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->settings = json_decode( get_option( 'ab_settings' ) );
		add_shortcode( 'announcement_bar', array($this, 'announcement_bar_shortcode') );
	}

	/**
	 * Shows the announcement bar.
	 * 
	 * [announcement_bar]
	 * This shortcode will display an announcement bar.
	 */
	public function announcement_bar_shortcode( $atts, $content = null ) {
		ob_start();
    $is_time_out = false;
    if(isset($this->settings->enable_auto_deactivate) && $this->settings->enable_auto_deactivate){
      date_default_timezone_set($this->settings->auto_deactivate_timezone);
      $current_date = date("Y-m-d H:i:s");
      $auto_deactivate_date_time = date("Y-m-d H:i:s",strtotime($this->settings->auto_deactivate_date_time));
      if($current_date > $auto_deactivate_date_time){
        $is_time_out = true;
      }
    }
    
		if ( $this->settings->show_announcement_bar && !$is_time_out ) { ?>
			<div id="ab_announcement_bar" class="ab_container-fluid <?php echo (isset($this->settings->sticky) && $this->settings->sticky) ? 'ab_sticky' : ''; ?>" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); background-color: <?php echo $this->settings->background_color; ?>; display: none;">
				<div class="ab_row">
					<div class="ab_container container">
						<div class="ab_row py-2">
							<?php if ( $this->settings->show_close_button ) { ?>
								<div class="col-12 col-md-auto" style="position: relative;">
									<button class="ab_dismiss_announcement d-md-none" style="position: absolute; top: 0; right: 1rem; cursor: pointer; background: transparent; border: none;" >
										<i class="fa fa-times fa-rotate-90 white-text"></i>
									</button>
								</div>
							<?php } ?>
							<div class="d-flex ab_col col justify-content-start align-items-center text-center text-md-left">
								<p class="mb-0 white-text">
									<?php echo html_entity_decode( $this->settings->text ); ?>
								</p>
							</div>
							<?php if ( $this->settings->show_close_button ) { ?>
								<div class="d-md-flex col-auto justify-content-end align-items-center text-right">
									<button class="ab_dismiss_announcement" style="cursor: pointer;background: transparent;border: 0px;" >
                  <i class="fa fa-times fa-rotate-90 white-text"></i>	
                </button>
								</div>
							<?php } ?>
						</div>
					</div>        
				</div>
			</div>
		<?php }
		return ob_get_clean();
	}

}