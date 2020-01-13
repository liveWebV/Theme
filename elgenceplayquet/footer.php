<?php 
/**
 * Elegence Playquet functions and definitions
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 */ 
?>
		</main>
		<?php get_template_part( 'template-parts/footer', 'caresoul' ); ?>
		<footer id="site-footer" class="site-footer full-width-footer">
			<div class="footer-one">
				<div class="row site-container">
					<?php
						if( is_active_sidebar( 'widget-one' ) ){
							echo "<div class=\"footer-widget-1 col-md-4\">";
							dynamic_sidebar( 'widget-one' );
							echo "</div>";
						}
						
						if( is_active_sidebar( 'widget-two' ) ){
							echo "<div class=\"footer-widget-2 col-md-4\">";
							dynamic_sidebar( 'widget-two' );
							echo "</div>";
						}

						if( is_active_sidebar( 'widget-three' ) ){
							echo "<div class=\"footer-widget-3 col-md-4\">";
							dynamic_sidebar( 'widget-three' );
							echo "</div>";
						}
					?>
				</div>
			</div>
			<div class="footer-two">
				<div class="row site-container">
					<div class="col-sm-12 col-md-6">
						<div class="copyright-container">
							<p class="copyright">
								<?php 
									_e( sprintf( '%1$s %2$s', '&copy;', 'Copyright 2020 Elegance Plyquet. All Right Reserved' ) );
							 	?>
							</p> 
						</div>
					</div>
					<div class="col-sm-12 col-md-6 text-md-right">
						<?php 
							$social_menu_args = array( 
								'theme_location' 	=> 'social',
								'container_class' 	=> 'footer-social-conatainer',
								'menu_class'		=> 'social-menu-container',
								'menu_id'			=> 'social-menu-container',
							);

							wp_nav_menu( $social_menu_args );

						?>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
