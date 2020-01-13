<?php
/**
 * Elegence Playquet functions and definitions
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
*/ 			
if( get_theme_mod( 'elegence_footer_caresoul_display' ) == 'Yes' ) : 
?>
<div class="lookbook-container">
	<div class="lookbook-header">
		<p class="lookbook-heading">
			<?php 
				if( !empty( get_theme_mod( 'elegence_footer_caresoul_heading' ) ) ){
					_e( html_entity_decode( get_theme_mod( 'elegence_footer_caresoul_heading' ) ) );
				}
				else{
					_e( 'Let\'s See <span>Lookbook</span> 2019' );
				}	
			?>
		</p>
	</div>
	<div class="lookbook-slider clear">
		<?php 
			if( !empty( get_theme_mod( 'elegence_footer_caresoul' ) ) ): 
				$caresoul_images = explode( ',', get_theme_mod( 'elegence_footer_caresoul' ) );
				foreach ( $caresoul_images as $caresoul_image ) :
					?>
						<div class="slide">
							<a href="<?php echo $caresoul_image ; ?>" class="slider-fancybox" data-fancybox="gallery"><img src="<?php echo $caresoul_image ; ?>"/></a>
						</div>
					<?php 	
				endforeach;
			else:
		?>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/engineered_wood.png"/>
			</div>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/luxury-vinyle.png"/>
			</div>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/solid-wood.png"/>
			</div>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/engineered_wood.png"/>
			</div>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/luxury-vinyle.png"/>
			</div>
			<div class="slide">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/solid-wood.png"/>
			</div>
		<?php 
			endif;
		?>
	</div>
</div>
<?php 
	endif;
?>