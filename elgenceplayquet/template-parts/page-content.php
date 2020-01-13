<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */

if( have_posts() ) : 
	while( have_posts() ) :
		the_post();
		the_content();
	endwhile;
endif;
