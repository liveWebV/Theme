<?php 
/**
 * Elegence Playquet Widget
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */

class Elegence_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'important-links',  // Base ID
            'Elegence Improtant Links'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Elegence_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget">';
 
        echo esc_html__( $instance['important_links'], 'elegenceplayquet' );
 
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 		echo "<pre>";
 		print_r($instance);
 		echo "</pre>";
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'elegenceplayquet' );
        $important_links = ! empty( $instance['important_links'] ) ? $instance['important_links'] : esc_html__( '', 'elegenceplayquet' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'elegenceplayquet' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'important_links' ) ); ?>"><?php echo esc_html__( 'Menu Links:', 'elegenceplayquet' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'important_links' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'important_links' ) ); ?>" cols="30" rows="10"><?php echo esc_attr( $important_links ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['important_links'] = ( !empty( $new_instance['important_links'] ) ) ? $new_instance['important_links'] : '';
 
        return $instance;
    }
 
}
$elegence_widget = new Elegence_Widget();
?>