<?php 
/**
 * Elegence Playquet functions and definitions
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 */
if( is_home() || is_front_page() ){

	if( get_field( 'show_slider' ) ){
		?>
			<div class='home-slider-container'>
				<div class="home-slider">
					<?php 
						if( have_rows( 'image_slides' ) ):
							while( have_rows( 'image_slides' ) ) :
								the_row();
								$slider_img = get_sub_field( 'image' );
								$alt  = !empty($slider_img['alt']) ? $slider_img['alt'] : $slider_img['name'];
								?>
									<div class='slide'>
										<img src="<?php echo $slider_img['url'];  ?>" alt="<?php echo $alt; ?>"/>
										<div class="slider-text-container">
											<h5 class="heading"><?php the_sub_field('heading'); ?></h5>
											<h2 class="sub-heading"><?php the_sub_field('sub_heading'); ?></h2>
											<?php 
												if( get_sub_field( 'button_link' ) == '#' || empty( get_sub_field( 'button_link' ) ) ) {
													$button_html = '<button class="btn btn-transparent">%1$s</button>';
												}
												else{
													$button_html = '<a class="btn btn-transparent" href="%2$s">%1$s</a>';
												}
												echo sprintf( $button_html, get_sub_field( 'button_text' ), get_sub_field( 'button_link' ) );
											?>
										</div> 
									</div>
								<?php
							endwhile;
						endif; 
					?>
				</div>
			</div>
		<?php
	}
}