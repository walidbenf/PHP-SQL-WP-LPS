<?php
/**
 * @package Pictorico
 */

$featured = pictorico_get_featured_posts();

if ( empty( $featured ) )
	return;
?>

<div id="featured-content" class="flexslider">
	<div class="flex-viewport-wrapper">
		<ul class="featured-posts slides" id="featured-slides">
			<?php
			foreach ( $featured as $post ) :
				setup_postdata( $post ); ?>

			<?php   if ( pictorico_has_post_thumbnail() ) {
						$postclass = 'has-thumbnail';
						$thumbnail = pictorico_get_attachment_image_src( get_the_ID(), get_post_thumbnail_id( get_the_ID() ), 'pictorico-slider' );
					} ?>
			<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>">
						<?php if ( pictorico_has_post_thumbnail() ) : ?>
							<div class="entry-thumbnail" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);"></div>
						<?php endif; ?>
					</a>
				</div>
				<div class="entry-wrapper">
					<header class="entry-header">
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<?php pictorico_date(); ?>
							<?php edit_post_link( __( 'Edit', 'pictorico' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
						<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</li><!-- #post-## -->
	<?php
			endforeach;
			wp_reset_postdata();
	?>
		</ul>
	</div>
</div>