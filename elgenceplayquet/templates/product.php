<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 */ 
	get_header();
	get_template_part( 'template-parts/page', 'banner' );
?>
<main id="site-content" class="site-content">
	<div class="container-fluid"> 
		<?php
			$elegence_products_args = array(
				'post_type' => array('elegance_product'),
				'posts_per_page' => -1,
			    'orderby' => 'ID',
			    'order' => 'ASC',
			    'max_num_pages' => 1
			);

			$elegence_products = new WP_Query( $elegence_products_args );
			if( $elegence_products->have_posts() ) :
				echo "<div class=\"row\">";
				while( $elegence_products->have_posts() ) :
					$elegence_products->the_post();
					?>
						<div class="col-sm-4 col-md-4 ">
							<div class="product-description">
								<div class="texture-image product-texture">
									<?php 
										$texture_image = get_field( 'upload_texture_image' );
										$alt = !empty( $texture_image['alt'] ) ? $texture_image['alt'] : $texture_image['name'];
										echo sprintf( '<img src="%1$s" alt="%2$s">', $texture_image['url'], $alt ); 
									?>
								</div>
								<h2 class="title"> <span><?php the_title(); ?> </span></h2>
								<div class="product-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<div class="view-product-detail">
									<a href="<?php the_permalink(); ?>" class="read-more btn btn-transparent">
										<?php _e( 'Read More', 'elegenceplayquet' ); ?>
									</a>
								</div>
							</div>
						</div>
					<?php
				endwhile;
				echo "</div>";
			endif;

			// Page Content
			if( have_posts() ) : 
				while( have_posts() ) :
					the_post();
					the_content();
				endwhile; 
			endif;
		?>
	</div>
<?php
	get_footer();