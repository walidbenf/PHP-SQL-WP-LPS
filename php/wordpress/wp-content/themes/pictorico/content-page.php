<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Pictorico
 */

$postclass = '';

if ( has_post_thumbnail() || get_header_image() )
	$postclass = 'has-thumbnail';

if ( has_post_thumbnail() )
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pictorico-single' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $postclass ); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() || get_header_image() ) : ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);"></div>
			<?php else : ?>
				<div class="header-image" style="background-image: url(<?php header_image(); ?>)"></div>
			<?php endif; ?>
		<?php endif; ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pictorico' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'pictorico' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
