<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<?php get_header(); ?>

<main>
	<?php if (is_front_page()) {
		get_template_part('template-parts/content', 'home');
	}
	?>
	<?php if (have_posts()) : ?>

		<div class="container my-3">
			<div class="row">
				<div class="col-md-8">
					<div class="border rounded p-3">

					<strong>احدث المواضيع</strong>
					<div class="container py-3">
						<div class="row row-cols-3 row-cols-sm-2 row-cols-md-3 g-3">
							<?php while (have_posts()) : the_post(); ?>
								<?php get_template_part('template-parts/content', 'grid'); ?>
							<?php endwhile; ?>
						</div>
						<?php the_posts_pagination(); ?>
					</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="border rounded p-3">
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
					</div>


				</div>
			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>
			<?php endif; ?>
</main><!-- #main -->


<?php get_footer(); ?>