<?php
/**
 * @package Pictorico
 */

$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
$postclass = '';

if ( pictorico_has_post_thumbnail() || get_header_image() )
	$postclass = 'has-thumbnail';

if ( pictorico_has_post_thumbnail() )
	$thumbnail = pictorico_get_attachment_image_src( get_the_ID(), get_post_thumbnail_id( get_the_ID() ), 'pictorico-single' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $postclass ); ?>>

	<header class="entry-header">
		<?php if ( pictorico_has_post_thumbnail() || get_header_image() ) : ?>
			<?php if ( pictorico_has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);"></div>
			<?php else : ?>
				<div class="header-image" style="background-image: url(<?php header_image(); ?>)"></div>
			<?php endif; ?>
		<?php endif; ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
			<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'pictorico' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a><span class="sep"> &bull; </span>
		<?php endif; ?>
		<?php pictorico_posted_on(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pictorico' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'pictorico' ) );
			if ( $categories_list && pictorico_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'pictorico' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'pictorico' ) );
			if ( $tags_list && ! is_wp_error( $tags_list ) ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'pictorico' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}

			printf( '<span class="permalink-bookmark"><a href="%1$s" rel="bookmark">' . esc_html__( 'Bookmark the permalink.', 'pictorico' ) . '</a></span>', esc_url( get_permalink() ) );
		?>

		<?php edit_post_link( __( 'Edit', 'pictorico' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
