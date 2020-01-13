<?php 
/**
 * Elegence Playquet Customization
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */
class Elegence_Customizer {
	public function __construct(){
		add_action( 'customize_register', array( &$this, 'elegence_register_customizer' ) );
	}

	public function elegence_register_customizer( $elegence ){
		/* Check If Classs Exist For Footer Gallery */
		if( class_exists('tad_Multi_Image_Control')) : 

			$elegence->add_section( 'elegence_footer_caresoul_section', array(
				'title' => __( 'Footer Carousel Slider', 'plegenceplayquet' )
			) );
			/* Display or Not*/
			$elegence->add_setting('elegence_footer_caresoul_display', array(
			    'default' => "No"
			  ));
			$elegence->add_control(new WP_Customize_Control($elegence, 'elegence_footer_caresoul_display', array(
			    'label'    => "Display Footer Caresoul?",
			    'section'  => 'elegence_footer_caresoul_section',
			    'settings' => 'elegence_footer_caresoul_display',
			    'type'     => 'checkbox',
			    'description' => __( 'Show/Hide Footer Caresoul From all Pages.' ),
			    'choices'  => array("No" => 'No', "Yes" => "Yes")
				)));

				// Caresoul Heading
			$elegence->add_setting('elegence_footer_caresoul_heading', array(
				'default' => "LET'S SEE <span>LOOKBOOK</span> 2019"
			));
			$elegence->add_control(new WP_Customize_Control($elegence, 'elegence_footer_caresoul_heading', array(
					'label'    => "Caresoul Heading",
					'section'  => 'elegence_footer_caresoul_section',
					'settings' => 'elegence_footer_caresoul_heading',
					'description' => __( 'Title that will show above the <code>Footer Caresoul Slider</code>.' ),
				)
			) );

			$elegence->selective_refresh->add_partial( 'elegence_footer_caresoul_heading', array(
		        'selector'            => '.lookbook-header',
		        'container_inclusive' => true,
		        'render_callback'     => 'get_theme_mod',
		        'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
		    ) );

				/* Image for Slider */

			$elegence->add_setting( 'elegence_footer_caresoul', array(
			    'default' => array(),
			) );
			$elegence->add_control( new tad_Multi_Image_Control(
				$elegence,
				'elegence_footer_caresoul',
				array(
				    'label'    => __( 'Carousel Images:' ),
				    'section'  => 'elegence_footer_caresoul_section',
				    'settings' => 'elegence_footer_caresoul',
				    'type'     => 'multi_image',
				) 
			) );

			$elegence->selective_refresh->add_partial( 'elegence_footer_caresoul', array(
		        'selector'            => '.carousel-wrapper',
		        'container_inclusive' => true,
		        'render_callback'     => 'get_theme_mod',
		        'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
		    ) );
		endif;
	}
}

new Elegence_Customizer();