<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 */ 
get_header();
?>
<main id="site-content" class="site-content">
<?php
get_template_part( 'template-parts/home', 'products' );

if( have_posts() ) : 
	while( have_posts() ) :
		the_post();
		the_content();
	endwhile; 
endif;

get_footer();