<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if( ! function_exists('hotelgalaxy_add_home_shortcode') ){

	add_action('hotelgalaxy_do_homeShortcode', 'hotelgalaxy_add_home_shortcode');

	function hotelgalaxy_add_home_shortcode(){

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 

		if( !empty($hotelgalaxy_settings['shortcode_show'])){

			?>

			<div id="main-home-shortcode" class="home-section">
				<div class="overlay">
					<div class="container">
						<?php 

						if(!empty($hotelgalaxy_settings['shortcode_title']) || !empty($hotelgalaxy_settings["shortcode_description"])){
							?>

							<div class="entry-header">
								
								<?php 

								echo '<h2>'.esc_html(wp_kses_post($hotelgalaxy_settings["shortcode_title"])).'</h2>'; 

								echo '<p>'.esc_html(wp_kses_post($hotelgalaxy_settings["shortcode_description"])).'</p>';
								?>								

							</div>		

							<?php
						}
						?>

						<div class="home-summary clearfix">

							<div class="col-md-6 col-md-offset-3 hotel-g-contact-form">
								<?php 
								if(!empty($hotelgalaxy_settings['shortcode_echo'])){
									echo do_shortcode($hotelgalaxy_settings['shortcode_echo']);
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php

		}
	}
}




?>
