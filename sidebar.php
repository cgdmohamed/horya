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

<?php dynamic_sidebar('sidebar-1'); ?>

<aside class="container py-3">
	<strong>الزوار قد شاهدوا ايضاً</strong>
	<hr />
	<div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 g-3">
		<?php
		echo do_shortcode('[random-posts]');
		?>
	</div> <!-- random -->
	<div class="bg-secondary rounded border text-center text-light p-4 my-3">
		Google Ads Placeholder
	</div>
	<strong class="pt-3">
		اهم التصنيفات
	</strong>
	<hr />
	<div class="row g-3 archive-cats fw-bold">
		<?php wp_list_categories(
			array(
				'title_li' => '',
				'style'    => 'none',
			)

		); ?>
	</div> <!-- related posts -->
</aside>