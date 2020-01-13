<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 * Template Name: Find A Dealer Page Template
 */ 
	get_header();
	get_template_part( 'template-parts/page', 'banner' );
?>
<main id="site-content" class="site-content">
	<div class="container-fluid"> 
		<div class="find-dealer-form">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="title-bottom-line"><?php the_field( 'form_title' ); ?></h2>
					<p class="form-description"><?php the_field( 'form_description' ); ?></p>
				</div>
			</div>
			<?php echo do_shortcode( get_field( 'contact_form_shortcode' ) ); ?>
		</div>
		<?php
			get_template_part( 'template-parts/page', 'content' );
		
			get_footer();
		?>
	</div>