<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 * Template Name: Home Page Template
 */ 
	get_header();
?>
<main id="site-content" class="site-content">
<?php
	get_template_part( 'template-parts/home', 'products' );
	
	get_template_part( 'template-parts/page', 'content' );
	
	get_footer();