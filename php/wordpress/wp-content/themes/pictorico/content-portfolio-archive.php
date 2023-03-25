<?php
/**
 * The template used for displaying Portfolio Archive view
 *
 * @package Pictorico
 */
?>

<header class="page-header">
	<?php pictorico_portfolio_title( '<h1 class="page-title">', '</h1>' ); ?>

	<?php pictorico_portfolio_content( '<div class="taxonomy-description">', '</div>' ); ?>
</header><!-- .page-header -->

<?php pictorico_portfolio_thumbnail( '<div class="portfolio-featured-image">', '</div>' ); ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php
		/* Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'content', 'home' );
	?>

<?php endwhile; ?>

<?php pictorico_paging_nav(); ?>