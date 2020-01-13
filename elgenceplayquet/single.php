<?php
/**
 * Elegence Playquet Single Posts Page
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */

get_header();

get_template_part( 'template-parts/product', 'banner' );
?>
	
	<main id="site-content" class="site-content">
<?php
$product_gallery = get_field( 'gallery' );

if( !empty( $product_gallery ) ) :
	echo "<div class=\"row\">";
	foreach ( $product_gallery as $gallery_image ) :
		$gallery_alt  = !empty( $gallery_image['alt'] ) ? $gallery_image['alt'] : $gallery_image['name'];
		?>
			<div class="col-md-4 col-sm-6">
				<div class="gallery-img-container">
					<img src="<?php echo $gallery_image['url'] ?>" alt="<?php echo $gallery_alt; ?>">
				</div>
			</div>	
		<?php
	endforeach;
	echo "</div>";
endif; 
get_template_part( 'template-parts/page', 'content' );

get_footer();