<?php
/**
 * chevalier functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chevalier
 */

if ( ! function_exists( 'chevalier_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chevalier_setup() {
		

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails', array('post','page'));

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Menu principal', 'chevalier' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Font sizes in editor
		* https://www.billerickson.net/building-a-gutenberg-website/#editor-font-sizes
		*/
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'Petite', 'chevalier' ),
				'size' => 13,
				'slug' => 'small'
			),
			array(
				'name' => __( 'Normale', 'chevalier' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => __( 'Grande', 'chevalier' ),
				'size' => 20,
				'slug' => 'big'
			),
		) );

		/**
		* Responsive embeds
		*/
		add_theme_support( 'responsive-embeds' );

		/**
		* Wide/full alignment
		*/
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'chevalier_setup' );

/**
* Register color palette for Gutenberg editor.
*/
require get_template_directory() . '/inc/colors.php';


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chevalier_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'chevalier' ),
		'id'            => 'copyright',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'chevalier_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chevalier_scripts() {
	wp_enqueue_style( 'chevalier-style', get_stylesheet_uri() );
	wp_enqueue_style( 'chevalier-google-fonts', 'https://fonts.googleapis.com/css?family=Halant:500|Open+Sans:400,700|Vidaloka&display=swap');

	wp_enqueue_script( 'chevalier-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'chevalier-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'chevalier-scripts', get_template_directory_uri() . '/js/chevalier.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'chevalier_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';

/**
* Image sizes. Work first with medium and large in admin if possible
* https://developer.wordpress.org/reference/functions/add_image_size/
*/

//add_image_size('banniere',1960,300,true);



/**
* Blocks
*/


function chevalier_block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'slug' => 'chevalier',
				'title' => 'Chevalier',
				'icon'  => 'dashicons-admin-generic',
			),
		),
		$categories
	);
}
add_filter( 'block_categories', 'chevalier_block_categories', 10, 2 );

require_once( 'blocks/acf-block-banniere.php' );
require_once( 'blocks/acf-block-2-colonnes.php' );

/**
* Page options
*/

//require_once( 'inc/acf-options-page.php' );


