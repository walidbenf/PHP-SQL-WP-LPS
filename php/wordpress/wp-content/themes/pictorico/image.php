<?php
/**
 * The template for displaying image attachments.
 *
 * @package Pictorico
 */

get_header();
?>

		<div id="content" class="site-content">
			<section id="primary" class="content-area image-attachment">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->
							<div class="entry-meta">
								<?php
									$metadata = wp_get_attachment_metadata();
									if ( $post->post_parent ) {
										printf( __( '<span class="entry-date"><time class="entry-date" datetime="%1$s" pubdate>%2$s</time></span><span class="sep"> &bull; </span><a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a><span class="sep"> &bull; </span><a href="%6$s" title="Return to %7$s" rel="gallery">%7$s</a>', 'pictorico' ),
											esc_attr( get_the_date( 'c' ) ),
											esc_html( get_the_date() ),
											esc_url( wp_get_attachment_url() ),
											$metadata['width'],
											$metadata['height'],
											esc_url( get_permalink( $post->post_parent ) ),
											get_the_title( $post->post_parent )
										);
									} else {
										printf( __( '<span class="entry-date"><time class="entry-date" datetime="%1$s" pubdate>%2$s</time></span><span class="sep"> &bull; </span><a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a>', 'pictorico' ),
											esc_attr( get_the_date( 'c' ) ),
											esc_html( get_the_date() ),
											esc_url( wp_get_attachment_url() ),
											$metadata['width'],
											$metadata['height']
										);
									}
								?>
							</div><!-- .entry-meta -->
							<div class="entry-content">

								<div class="entry-attachment">
									<div class="attachment">
										<?php
										$next_attachment_url = wp_get_attachment_url();
										if ( $post->post_parent ) {
											/**
											 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
											 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
											 */
											$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
											foreach ( $attachments as $k => $attachment ) {
												if ( $attachment->ID == $post->ID )
													break;
											}
											$k++;
											// If there is more than 1 attachment in a gallery
											if ( count( $attachments ) > 1 ) {
												if ( isset( $attachments[ $k ] ) )
													// get the URL of the next image attachment
													$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
												else
													// or get the URL of the first image attachment
													$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
											} else {
												// or, if there's only 1 image, get the URL of the image
												$next_attachment_url = wp_get_attachment_url();
											}
										}
										?>

										<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
											$attachment_size = apply_filters( 'pictorico_attachment_size', array( 1180, 1180 ) ); // Filterable image size.
											echo wp_get_attachment_image( $post->ID, $attachment_size );
										?></a>
									</div><!-- .attachment -->

									<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div><!-- .entry-caption -->
									<?php endif; ?>
								</div><!-- .entry-attachment -->
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php edit_post_link( __( 'Edit', 'pictorico' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-<?php the_ID(); ?> -->

						<?php comments_template(); ?>

						<?php if ( $post->post_parent ) { ?>
						<nav id="image-navigation" class="navigation post-navigation site-navigation">
							<div class="nav-links">
								<span class="previous-image nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav"></span> Previous Image', 'pictorico' ) ); ?></span>
								<span class="next-image nav-next"><?php next_image_link( false, __( 'Next Image <span class="meta-nav"></span>', 'pictorico' ) ); ?></span>
							</div>
						</nav><!-- #image-navigation -->
						<?php } ?>

					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</section><!-- #content .site-content -->
		</div><!-- #primary .content-area .image-attachment -->

<?php get_footer(); ?>
