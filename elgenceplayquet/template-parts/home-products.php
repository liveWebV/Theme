<?php
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 *
 */ 

$elegence_products_args = array(
	'post_type' => array('elegance_product'),
	'posts_per_page' => 3,
    'orderby' => 'ID',
    'order' => 'ASC',
    'max_num_pages' => 1
);

$elegence_products = new WP_Query( $elegence_products_args );

if( $elegence_products->have_posts() ) : 
	$count = 1;
	while( $elegence_products->have_posts() ) :
		$elegence_products->the_post();
		$even_odd_class = isEven( $count ) ? 'even-product' : 'odd-product';
		echo "<div class=\"row $even_odd_class elegence_product_row\">";
		if( isEven( $count ) ) :
			?>
				<div class="col-sm-5 col-md-5 product-details">
					<h2 class="title"> <?php the_title(); ?> </h2>
					<div class="product-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<div class="view-product-detail">
						<a href="<?php the_permalink(); ?>">
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				<div class="col-sm-7 col-md-7">
					<div class="elegance-product-image"><?php the_post_thumbnail('full'); ?>
						<div class="texture-image">
							<?php 
								$texture_image = get_field( 'upload_texture_image' );
								$alt = !empty( $texture_image['alt'] ) ? $texture_image['alt'] : $texture_image['name'];
								echo sprintf( '<img src="%1$s" alt="%2$s">', $texture_image['url'], $alt ); 
							?>
						</div>
					</div>
				</div>
			<?php
		else :
			?>
				<div class="col-sm-7 col-md-7">
					<div class="elegance-product-image"><?php the_post_thumbnail('full'); ?>
						<div class="texture-image">
							<?php 
								$texture_image = get_field( 'upload_texture_image' );
								$alt = !empty( $texture_image['alt'] ) ? $texture_image['alt'] : $texture_image['name'];
								echo sprintf( '<img src="%1$s" alt="%2$s">', $texture_image['url'], $alt ); 
							?>
						</div>
					</div>
				</div>
				<div class="col-sm-5 col-md-5 product-details">
					<h2 class="title"> <?php the_title(); ?> </h2>
					<div class="product-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<div class="view-product-detail">
						<a href="<?php the_permalink(); ?>">
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			<?php
		endif;
		echo "</div>";
		$count++;
	endwhile;

endif;