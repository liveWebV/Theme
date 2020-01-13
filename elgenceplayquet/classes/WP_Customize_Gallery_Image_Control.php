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
if(!class_exists('WP_Customize_Control')) 
	include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class WP_Customize_Gallery_Image_Control extends WP_Customize_Control {
	public $type = 'multiple-images';

	public function __construct( $manager, $id, $args = array() ) {

      	parent::__construct( $manager, $id, $args );

  	}

  	public function render_content() {
        ?>
        <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div>
                        <a href="#" class="button-secondary upload"><?php _e( 'Upload' ); ?></a>
                        <a href="#" class="remove"><?php _e( 'Remove All' ); ?></a>
                </div>
        </label>
        <?php
	}
}
