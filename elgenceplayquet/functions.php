<?php
/**
 * Elegence Playquet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */

function elegence_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffffff',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'elegence-fullscreen', 1980, 9999 );

	add_image_size( 'elegence-logo', 120, 90 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'elegenceplayquet' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'elegenceplayquet' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	// if ( is_customize_preview() ) {
	// 	require get_template_directory() . '/inc/starter-content.php';
	// 	add_theme_support( 'starter-content', elegenceplayquet_get_starter_content() );
	// }

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new Elegence_Playquet_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'elegence_theme_support' );

/* Define Theme Version */ 
if( !defined( 'THEME_VERSION' ) ) 
	define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/* 
  Include Rquired files	
*/

// Custom script loader class.
require get_template_directory() . '/classes/class-tgm-plugin-activation.php';
require get_template_directory() . '/classes/class.elegence-script-loader.php';
require get_template_directory() . '/classes/WP_Customize_Gallery_Image_Control.php';
require get_template_directory() . '/classes/class.nav_walker.php';
require get_template_directory() . '/classes/class.elegence_widgets.php';
require get_template_directory() . '/classes/class.elegence_customize.php';
require get_template_directory() . '/inc/customize-functions.php';


/* Register Elegence Style */

function register_elegence_style(){
	/* Theme StyleSheet */
	wp_enqueue_style( 'parent-style', get_stylesheet_uri(), array(), THEME_VERSION );
	/* Enqueue Bootstrap */
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '4.4.1' );
	/* BXSlider */
	wp_enqueue_style( 'bxslider-style', get_template_directory_uri() . '/assets/css/jquery.bxslider.css', array(), '4.2.12' );
	/* Font Awesome */
	wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
	/* FancyBox */
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), '3.5.7' );
	
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), THEME_VERSION );
}

add_action( 'wp_enqueue_scripts', 'register_elegence_style' );

/* Register Elegence Script */

function register_elegence_script(){
	/* Enqueue JQuery */
	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/js/jQuery-3.4.1.min.js', array(), '3.4.1' );
	/* Bootstarp Proper Js */
	wp_enqueue_script( 'bootstrap-proper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), '1.16.0' );
	/* Enqueue Bootstrap */
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '4.4.1' );
	/* BXSlider */
	wp_enqueue_script( 'bxslider-script', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array(), '4.2.12' );
	/* FancyBox */
	wp_enqueue_script( 'fancybox-script', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), '3.5.7' );
	/* Theme JS */
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/theme-script.js', array(), THEME_VERSION );
}

add_action( 'wp_enqueue_scripts', 'register_elegence_script' );

/* Register Nav Menu */

if(!function_exists('elegence_menus')){
	
	function elegence_menus(){
		$locations = array(
			'primary'	=> __( 'Main Menu', 'elegenceplayquet' ),
			'footer'	=> __( 'Footer Menu', 'elegenceplayquet' ),
			'social'	=> __( 'Social Menu', 'elegenceplayquet' ),
		);
		register_nav_menus( $locations );
	}

	add_action( 'init', 'elegence_menus' );
}

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

function elegence_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'elegence_get_custom_logo' );

/* Register Widgets */

function elegence_register_widgets(){
	$common_args = array(
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget' => '</div></div>',
	);
	/* Widget 1 */
	register_sidebar( 
		array_merge( 
			$common_args,
			array(
				'name' 	=> __( 'Footer Column 1', 'elegenceplayquet' ),
				'id'	=> 'widget-one',
				'class'	=> 'widget-one',	
			)
		) 
	);

	/* Widget 2 */
	register_sidebar( 
		array_merge( 
			$common_args,
			array(
				'name' 	=> __( 'Footer Column 2', 'elegenceplayquet' ),
				'id'	=> 'widget-two',
				'class'	=> 'widget-two',
			)
		) 
	);

	/* Widget 3 */
	register_sidebar( 
		array_merge( 
			$common_args,
			array(
				'name' 	=> __( 'Footer Column 3', 'elegenceplayquet' ),
				'id'	=> 'widget-three',
				'class'	=> 'widget-three',
			)
		) 
	);

}

add_action( 'widgets_init', 'elegence_register_widgets' );

function elegence_products_post_type(){
	$labels = array(
        'name'                  => _x( 'Elegance Products', 'Post type general name', 'elegenceplayquet' ),
        'singular_name'         => _x( 'Elegance Product', 'Post type singular name', 'elegenceplayquet' ),
        'menu_name'             => _x( 'Elegance Products', 'Admin Menu text', 'elegenceplayquet' ),
        'name_admin_bar'        => _x( 'Elegance Product', 'Add New on Toolbar', 'elegenceplayquet' ),
        'add_new'               => __( 'Add New', 'elegenceplayquet' ),
        'add_new_item'          => __( 'Add New Elegance Product', 'elegenceplayquet' ),
        'new_item'              => __( 'New Elegance Product', 'elegenceplayquet' ),
        'edit_item'             => __( 'Edit Elegance Product', 'elegenceplayquet' ),
        'view_item'             => __( 'View Elegance Product', 'elegenceplayquet' ),
        'all_items'             => __( 'All Elegance Products', 'elegenceplayquet' ),
        'search_items'          => __( 'Search Elegance Products', 'elegenceplayquet' ),
        'parent_item_colon'     => __( 'Parent Elegance Products:', 'elegenceplayquet' ),
        'not_found'             => __( 'No Elegance Product found.', 'elegenceplayquet' ),
        'not_found_in_trash'    => __( 'No Elegance Product found in Trash.', 'elegenceplayquet' ),
        'featured_image'        => __( 'Elegance Product Cover Image', 'elegenceplayquet' ),
        'set_featured_image'    => __( 'Set product image', 'elegenceplayquet' ),
        'remove_featured_image' => __( 'Remove product image', 'elegenceplayquet' ),
        'use_featured_image'    => __( 'Use as product image', 'elegenceplayquet' ),
        'archives'              => __( 'Elegance Product archives', 'elegenceplayquet' ),
        'insert_into_item'      => __( 'Insert into Elegance Product', 'elegenceplayquet' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Elegance Product', 'elegenceplayquet' ),
        'filter_items_list'     => __( 'Filter Elegance Products list', 'elegenceplayquet' ),
        'items_list_navigation' => __( 'Elegance Products list navigation', 'elegenceplayquet' ),
        'items_list'            => __( 'Elegance Products list', 'elegenceplayquet' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'elegance_product' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'elegance_product', $args );
}
add_action( 'init', 'elegence_products_post_type' );

function isEven ( $number ){ 
    if($number % 2 == 0){ 
        return true; 
    } 
    else{ 
        return false;
    } 
} 
/* Require Plugins  for This Theme */
function elegence_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'               => 'ACF Pro',
	        'slug'               => 'advanced-custom-fields-pro',
	        'source'             => get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro.zip', 
	        'required'           => true, 
	        'version'            => '5.7.8', 
	        'force_activation'   => false,
	    ),
	    array(
	        'name'               => 'ACF Font Awesome',
	        'slug'               => 'advanced-custom-fields-font-awesome',
	        'source'             => get_stylesheet_directory() . '/plugins/advanced-custom-fields-font-awesome.zip', 
	        'required'           => true, 
	        'version'            => '3.1.1', 
	        'force_activation'   => false,
	    ),
	    array(
	        'name'               => 'Multi Image Control',
	        'slug'               => 'multi-image-control',
	        'source'             => get_stylesheet_directory() . '/plugins/multi-image-control.zip', 
	        'required'           => true, 
	        'version'            => '1.0', 
	        'force_activation'   => false,
	    ),
	    array(
	        'name'               => 'Contact Form 7',
	        'slug'               => 'contact-form-7',
	        'source'             => get_stylesheet_directory() . '/plugins/contact-form-7.zip', 
	        'required'           => true, 
	        'version'            => '1.0', 
	        'force_activation'   => false,
	    ),
	);
	    $config = array(
	    'id'           => 'elegence-tgmpa', // your unique TGMPA ID
	    'default_path' => get_stylesheet_directory() . '/plugins/', // default absolute path
	    'menu'         => 'elegence-install-required-plugins', // menu slug
	    'has_notices'  => true, // Show admin notices
	    'dismissable'  => false, // the notices are NOT dismissable
	    'is_automatic' => true, // automatically activate plugins after installation
	    'message'      => '<!--Hey there.-->', // message to output right before the plugins table
	    'strings'      => array(), // The array of message strings that TGM Plugin Activation uses
	);
 
    tgmpa( $plugins, $config );
 
}

add_action( 'tgmpa_register', 'elegence_require_plugins' );

// Elegence Page Settings

function elegence_auto_page_templates_settings(){
	add_submenu_page(
		'edit.php?post_type=elegance_product', 
		__( 'Page Settings', 'elegenceplayquet' ),
		__( 'Page Settings', 'elegenceplayquet' ),
		'manage_options',
		'elegance_product',
		'elegence_auto_page_templates_settings_callback'
	);

	/* call register settings function */

	add_action( 'admin_init', 'register_elegence_page_settings' );
}

add_action( 'admin_menu', 'elegence_auto_page_templates_settings' );

/*register settings function*/

function register_elegence_page_settings() {
	register_setting( 'elegence-page-settings-group', '__product_page_template' );
}
/* Elegence Page Settings Callback */

function elegence_auto_page_templates_settings_callback(){
	global $title;
	include get_template_directory(). '/inc/page-settings.php';
}
/* Set Apge Template Automattic*/
function elegence_custom_page_template( $page_template ) {
    global $post;

    switch ( $post->ID ) :

        case esc_attr( get_option('__product_page_template') ) : 
            if( file_exists( get_stylesheet_directory() . '/templates/product.php' ) ) {
                $page_template = get_stylesheet_directory() . '/templates/product.php' ; 
            	return $page_template;
            	
        	}
        break;
        default:
        	return $page_template;
        break;

    endswitch;
}
add_filter( 'page_template', 'elegence_custom_page_template' );

// Add Page Template Class in body
add_filter( 'body_class', function( $classes ) {
	global $post;
	switch ( $post->ID ) :

        case esc_attr( get_option('__product_page_template') ) : 
        		$page_template = get_stylesheet_directory() . '/templates/product.php' ;
                $classes[] = str_replace('.', '__', 'template-' . basename( $page_template ) );       
        break;

    endswitch;
	return $classes;
} );

/* Page State */
function elegence_add_post_state( $post_states, $post ) {
	switch ( $post->ID ) :

        case esc_attr( get_option('__product_page_template') ) : 
                $post_states[] = __( 'Elegance Product Page', 'elegenceplayquet' );        
        break;

    endswitch;
	return $post_states;
}
add_filter( 'display_post_states', 'elegence_add_post_state', 10, 2 );
