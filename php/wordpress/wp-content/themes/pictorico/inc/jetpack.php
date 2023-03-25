<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.com/
 *
 * @package Pictorico
 */
function pictorico_jetpack_setup() {
	// Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'content',
		'footer_widgets' => array( 'sidebar-1', 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
		'render'         => 'pictorico_infinite_scroll_render',
		'posts_per_page' => 8,
		'wrapper'        => false,
	) );

	// Featured Content
	add_theme_support( 'featured-content', array(
	    'filter'     => 'pictorico_get_featured_posts',
	    'max_posts'  => 10,
	    'post_types' => array( 'post', 'page', 'jetpack-portfolio' ),
	) );

	// Portfolio CPT
	add_theme_support( 'jetpack-portfolio', array(
		'title'          => true,
		'content'        => true,
		'featured-image' => true,
	) );

	// Content Options
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'pictorico-style',
			'date'       => '.posted-on, .byline .sep',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
			'fallback'   => true,
		),
	) );
}
add_action( 'after_setup_theme', 'pictorico_jetpack_setup' );

function pictorico_infinite_scroll_render() {
	while( have_posts() ) {
	    the_post();
	    get_template_part( 'content', 'home' );
	}
}

function pictorico_get_featured_posts() {
    return apply_filters( 'pictorico_get_featured_posts', array() );
}

function pictorico_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;

    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'pictorico_get_featured_posts', array() );

    if ( ! is_array( $featured_posts ) )
        return false;

    if ( $minimum > count( $featured_posts ) )
        return false;

    return true;
}

/**
 * Portfolio Title.
 */
function pictorico_portfolio_title( $before = '', $after = '' ) {
	$jetpack_portfolio_title = get_option( 'jetpack_portfolio_title' );
	$title = '';

	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		if ( isset( $jetpack_portfolio_title ) && '' != $jetpack_portfolio_title ) {
			$title = esc_html( $jetpack_portfolio_title );
		} else {
			$title = post_type_archive_title( '', false );
		}
	} elseif ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$title = single_term_title( '', false );
	}

	echo $before . $title . $after;
}

/**
 * Portfolio Content.
 */
function pictorico_portfolio_content( $before = '', $after = '' ) {
	$jetpack_portfolio_content = get_option( 'jetpack_portfolio_content' );

	if ( is_tax() && get_the_archive_description() ) {
		echo $before . get_the_archive_description() . $after;
	} else if ( isset( $jetpack_portfolio_content ) && '' != $jetpack_portfolio_content ) {
		$content = convert_chars( convert_smilies( wptexturize( wp_kses_post( $jetpack_portfolio_content ) ) ) );
		echo $before . $content . $after;
	}
}

/**
 * Portfolio Featured Image.
 */
function pictorico_portfolio_thumbnail( $before = '', $after = '' ) {
	$jetpack_portfolio_featured_image = get_option( 'jetpack_portfolio_featured_image' );

	if ( isset( $jetpack_portfolio_featured_image ) && '' != $jetpack_portfolio_featured_image ) {
		$featured_image = wp_get_attachment_image( (int) $jetpack_portfolio_featured_image, 'full-width' );
		echo $before . $featured_image . $after;
	}
}

/**
 * Filter Infinite Scroll text handle.
 */
function pictorico_portfolio_infinite_scroll_navigation( $js_settings ) {
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$js_settings[ 'text' ] = esc_js( esc_html__( 'Older projects', 'pictorico' ) );
	}

	return $js_settings;
}
add_filter( 'infinite_scroll_js_settings', 'pictorico_portfolio_infinite_scroll_navigation' );

/**
 * Custom function to check for a post thumbnail;
 * If Jetpack is not available, fall back to has_post_thumbnail()
 */
function pictorico_has_post_thumbnail( $post = null ) {
	if ( function_exists( 'jetpack_has_featured_image' ) ) {
		return jetpack_has_featured_image( $post );
	} else {
		return has_post_thumbnail( $post );
	}
}

/**
 * Custom function to get the URL of a post thumbnail;
 * If Jetpack is not available, fall back to wp_get_attachment_image_src()
 */
function pictorico_get_attachment_image_src( $post_id, $post_thumbnail_id, $size ) {
	if ( function_exists( 'jetpack_featured_images_fallback_get_image_src' ) ) {
		return jetpack_featured_images_fallback_get_image_src( $post_id, $post_thumbnail_id, $size );
	} else {
		$attachment = wp_get_attachment_image_src( $post_thumbnail_id, $size ); // Attachment array
		$url = $attachment[0]; // Attachment URL
		return $url;
	}
}
