<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 * Template Name: Company Page Template
 */ 
	get_header();
	get_template_part( 'template-parts/page', 'banner' );
?>
<main id="site-content" class="site-content">
	<div class="container-fluid"> 
		<div class="row our-story">
			<div class="col-sm-12">
				<div class="our-story-content"><?php the_field( 'our_mission' ); ?> </div>
			</div>
		</div>
		<div class="row mission-n-vision">
			<div class="col-md-5">
				<div class="mission-container">
					<div class="mission-title">
						Mission
					</div>
					<div class="mission-content">
						<?php the_field( 'mission' ); ?>
					</div>
				</div>
			</div>
			<div class="col-md-2 d-flex">
				<div class="and-text">&amp;</div>
			</div>
			<div class="col-md-5">
				<div class="vision-container">
					<div class="vision-title">
						Vision
					</div>
					<div class="vision-content">
						<?php the_field( 'vision' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="company-values full-width">
			<div class="company-values-head text-center">
				<h2 class="title-bottom-line"><?php _e( 'Our Values' )?></h2>
			</div>
			<div class="row">
				<?php 
					if( have_rows( 'our_value' ) ) :
						while( have_rows( 'our_value' ) ) :
							the_row();
							$thumb_img = get_sub_field( 'image' );
							$alt  = !empty($thumb_img['alt']) ? $thumb_img['alt'] : $thumb_img['name'];
							?>	
								<div class="col-sm-6 col-md-3">
										
									<div class="cut-lu-corner-border values-img"> 
									<?php 
										echo sprintf('<img src="%1$s" alt="%2$s"/>', $thumb_img['url'], $alt );
									?>
									</div>
									<div class="values-title"><?php the_sub_field( 'title' ); ?></div>
									<div class="values-description"><?php the_sub_field( 'description' ); ?></div>
								</div>
							<?php
						endwhile;
					endif;
				?>
			</div>
		</div>
		<?php 
			get_template_part( 'template-parts/page', 'content' );
		?>
	</div>
<?php
	get_footer();