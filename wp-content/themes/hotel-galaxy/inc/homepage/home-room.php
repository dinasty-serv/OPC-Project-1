<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if( ! function_exists('hotelgalaxy_add_home_room') ){

	add_action('hotelgalaxy_do_homeRoom', 'hotelgalaxy_add_home_room');

	function hotelgalaxy_add_home_room(){

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );

		if( !empty($hotelgalaxy_settings['room_sec_show'])){

			?>

			<div id="main-home-room" class="home-section">
				<div class="overlay">
					<div class="container">
						<?php 

						if(!empty($hotelgalaxy_settings['room_sec_title']) || !empty($hotelgalaxy_settings["room_sec_description"])){
							?>

							<div class="entry-header">
								
								<?php 

								echo '<h2>'.esc_html(wp_kses_post($hotelgalaxy_settings["room_sec_title"])).'</h2>'; 

								echo '<p>'.esc_html(wp_kses_post($hotelgalaxy_settings["room_sec_description"])).'</p>';
								?>								

							</div>		

							<?php
						}
						?>

						<div class="home-summary home-room clearfix">

							<?php hotelgalaxy_construct_home_room() ?>
							
						</div>

					</div>
				</div>
			</div>
			
			<?php
		}

	}

}

if(!function_exists( 'hotelgalaxy_construct_home_room' )){

	function hotelgalaxy_construct_home_room(){

		if( defined( 'HG_ROOM_ADDON_VERSION' ) ){

			do_action('hg_premium_home_room');

		}else{
			do_action('hotelgalaxy_add_room');
			
		}
	}
}


// 

if(!function_exists('hotelgalaxy_const_add_room')){

	add_action('hotelgalaxy_add_room','hotelgalaxy_const_add_room');

	function hotelgalaxy_const_add_room(){

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );

		if( !empty( $hotelgalaxy_settings['room_cat'] ) ){

			$args = array( 'post_type' => 'post',
				'posts_per_page'=>6,
				'cat'=> absint( $hotelgalaxy_settings['room_cat'] ) 
			);

			$loop = new WP_Query($args);

			if( $loop->have_posts() ){

				while( $loop->have_posts() ) : $loop->the_post();

					hotelgalaxy_room_item();

				endwhile;

				wp_reset_postdata();

			}
		}

	}
}

// 

if(!function_exists('hotelgalaxy_room_item')){

	function hotelgalaxy_room_item(){

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );

		?>

		<div <?php hotelgalaxy_add_class('home_room_column') ?> >
			
			<div class="thumbnail">

				<?php do_action( 'hotelgalaxy_posts_featured_image' ); ?>

				<div class="caption">

					<?php 

					the_title( sprintf( '<h4 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );


					if(!empty($hotelgalaxy_settings['room_button_text'])){

						echo sprintf( '<p><a title="%1$s" class="btn btn-default" href="%2$s">%3$s </a></p>',
							the_title_attribute( 'echo=0' ),
							esc_url( get_permalink() ),
							esc_html( $hotelgalaxy_settings['room_button_text'])
						);
						
					}
					

					?>					



				</div>
			</div>

		</div>
		<?php

		?>

		<?php
	}
}
?>