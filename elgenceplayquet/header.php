<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>
		<header id="site-header">
			<?php elegence_main_menu(); ?>
		</header>
		<?php 
			get_template_part( 'template-parts/home', 'banner' );
		?>
		