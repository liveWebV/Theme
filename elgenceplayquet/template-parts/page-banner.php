<div class="elegence-product-banner">
	<?php 
		if( !empty( get_field( 'banner_image' ) ) ){
			$banner_img = get_field( 'banner_image' );
			$alt  = !empty($banner_img['alt']) ? $banner_img['alt'] : $banner_img['name'];
			echo sprintf(
				'<img src="%1$s" alt="%2$s"/>',
				$banner_img['url'],
				$alt
			);
		}
		elseif ( has_post_thumbnail() ) {
			the_post_thumbnail('full');
		}
		else{
			$default_banner = get_template_directory_uri() . '/assets/images/engineered_wood.png';
			echo "<img src=\"$default_banner\" alt=\"Product Image\">";
		}
	 ?>
	 <div class="product-banner-text-container">
	 	<h5 class="small-description"><?php the_field( 'small_description' ); ?></h5>
	 	<h2 class="product-title"> <?php the_title(); ?></h2>
	 </div>
</div>