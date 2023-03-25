<?php
/**
 * Pictorico functions and definitions
 *
 * @package Pictorico
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1180; /* pixels */
}

if ( ! function_exists( 'pictorico_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pictorico_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pictorico, use a find and replace
	 * to change 'pictorico' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pictorico', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Editor styles
	 */
	add_editor_style( 'editor-style.css' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'pictorico-home', '590', '590', true );
	add_image_size( 'pictorico-slider', '1180', '525', true );
	add_image_size( 'pictorico-single', '1500', '525', true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pictorico' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pictorico_custom_background_args', array(
		'default-color' => 'e7f2f8',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // pictorico_setup
add_action( 'after_setup_theme', 'pictorico_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pictorico_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'pictorico' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'pictorico' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'pictorico' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'pictorico' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pictorico_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pictorico_scripts() {
	wp_enqueue_style( 'pictorico-style', get_stylesheet_uri() );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	wp_enqueue_style( 'pictorico-open-sans-condensed' );
	wp_enqueue_style( 'pictorico-pt-serif' );

	wp_enqueue_script( 'pictorico-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'pictorico-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( pictorico_has_featured_posts( 1 ) ) {
	    wp_enqueue_script( 'pictorico-slider-script', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ) );
	    wp_enqueue_script( 'pictorico-script', get_template_directory_uri() . '/js/pictorico.js', array( 'pictorico-slider-script' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'pictorico_scripts' );

/**
 * Register Google Fonts
 */
function pictorico_google_fonts() {
	/*	translators: If there are characters in your language that are not supported
		by Open Sans Condensed, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Open Sans Condensed font: on or off', 'pictorico' ) ) {

		wp_register_style( 'pictorico-open-sans-condensed', "https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,latin-ext" );

	}

	/*	translators: If there are characters in your language that are not supported
		by PT Serif, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'pictorico' ) ) {

		wp_register_style( 'pictorico-pt-serif', "https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic" );

	}

}
add_action( 'init', 'pictorico_google_fonts' );

/**
 * Enqueue Google Fonts for custom headers
 */
function pictorico_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'pictorico-open-sans-condensed' );
	wp_enqueue_style( 'pictorico-pt-serif' );

}
add_action( 'admin_enqueue_scripts', 'pictorico_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';