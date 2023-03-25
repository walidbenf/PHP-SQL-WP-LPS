<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Pictorico
 */
?>
	<div id="secondary" class="widget-areas" role="complementary">
		<div class="widget-areas-inner">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div><!-- #secondary -->
