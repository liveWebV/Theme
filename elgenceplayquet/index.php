<?php
/**
 * Elegence Playquet functions and definitions
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */
	get_header();
	get_template_part( 'template-parts/page', 'banner' );
	?>
	<main id="site-content" class="site-content">
	<?php 
	echo "<h2>" . get_the_title() . "</h2>";

	get_template_part( 'template-parts/page', 'content' );

	get_footer();
?>