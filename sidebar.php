<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area col" role="complementary">
		<div class="row">
			<div class="col">
				<?php dynamic_sidebar('sidebar-1'); ?>
				<?php get_sidebar( 'sidebar-1' ); ?>
			</div>
		</div><!-- .container -->
</aside><!-- #secondary -->