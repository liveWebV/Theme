<?php 
/**
 * Elegence Playquet Customize functions
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */


function elegence_site_logo( $args = array(), $echo = true ) {

	$defaults = array(
		'container'	  		=> '<div class="%1$s">%2$s</div>',	
		'container_class'	=> 'site-logo-conatiner',	
		'logo'        		=> '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  		=> 'site-logo',	
		'logo_size'	  		=> 'elegence-logo',	
		'title'       		=> '<a href="%1$s" class="%2$s">%3$s</a>',
	);

	$args = wp_parse_args( $args, $defaults );

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$site_title = get_bloginfo( 'name' );
	$contents   = '';
	$classname  = '';
	$switched_blog = false;
 
    if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
        $switched_blog = true;
    }

    if( $custom_logo_id ) {

    	$custom_logo_attr = array(
            'class' => $args['logo_class'] .'-img',
        );
    	/* Get Logo alt Attrbites */ 
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );

	    if ( empty( $image_alt ) ) {
	        $custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
	    }

		$logo = sprintf(
			'<a href="%1$s" class="%2$s">%3$s</a>',
			esc_url( home_url( '/' ) ), 
			$args['logo_class'], 
			wp_get_attachment_image( $custom_logo_id, $args['logo_size'], false, $custom_logo_attr ) );
    }

    elseif ( is_customize_preview() ) {
        // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
        $logo = sprintf(
            '<a href="%1$s" class="%2$s" style="display:none;"><img class="custom-logo"/></a>',
            esc_url( home_url( '/' ) ),
            $args['logo_class']
        );
    }
	
	if ( $switched_blog ) {
        restore_current_blog();
    }

	/**
	 * Filters the arguments for `elegence_site_logo()`.
	 *
	 * @param array  $args     Parsed arguments.
	 * @param array  $defaults Function's default arguments.
	 */

	$args = apply_filters( 'elegence_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
	} else {
		$contents  = sprintf( 
			$args['title'],
			esc_url( get_home_url( null, '/' ) ),
			$args['logo_class'],
			esc_html( $site_title )
		);
	}


	$html = sprintf( $args['container'], $args['container_class'], $contents );

	/**
	 * Filters the arguments for `elegence_site_logo()`.
	 *
	 * @param string $html      Compiled html based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters( 'elegence_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Displays the site description.
 *
 * @param boolean $echo Echo or return the html.
 *
 * @return string $html The HTML to display.
 */
function elegence_site_description( $echo = true ) {
	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

	$html = sprintf( $wrapper, esc_html( $description ) );

	/**
	 * Filters the html for the site description.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html         The HTML to display.
	 * @param string $description  Site description via `bloginfo()`.
	 * @param string $wrapper      The format used in case you want to reuse it in a `sprintf()`.
	 */
	$html = apply_filters( 'elegence_site_description', $html, $description, $wrapper );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function elegence_main_menu( $args = array() ) {
	
	$defaults = array(
		'theme_location' => 'primary',
		'container_class' => 'collapse navbar-collapse',	
		'container_id' => 'collapse-navbar',	
		'menu_class'     => 'navbar-nav ml-auto',
		'walker' => new Elegence_Nav_Walker()
	);

	$args = wp_parse_args( $args, $defaults );
	?>
	<nav class="navbar navbar-expand-md navbar-light site-container">
	  	<?php 
	  		elegence_site_logo( 
	  			array(
	  				'container_class' 	=> 'navbar-header',	
	  				'logo' 			  	=> '%1$s',
	  				'logo_class' 	  	=> 'navbar-brand',
	  			)
	  		);
	  	?>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php echo $args['container_id']; ?>">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<?php 
			wp_nav_menu( $args );
		?>
	</nav>
	<?php
}

/* Nav Menu Additional fields */
function wp_main_menu_objects( $items, $args ) {
	
	foreach( $items as &$item ) {
		
		$is_button = get_field( 'menu_button', $item );
		$icon = get_field( 'font_awesome_icon', $item );
		if( $is_button ) {
			$item->classes[] = 'button-menu';
			$item->icon = $icon;
			$item->button = array( 
				'color' => get_field( 'button_text_color', $item ),
				'background' => get_field( 'button_background_color', $item ),
			);
		}

		if( !empty( get_field( 'social_icon', $item ) ) ){

			$item->title = get_field( 'social_icon', $item );
			$item->classes = array('social-menu');
		}
		
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'wp_main_menu_objects', 10, 2);
