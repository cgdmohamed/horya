<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package horya
 */
?>

<?php get_header(); ?>
<div class="container my-3">
	<div class="pt-3 pb-1 pe-3 rounded border post-breadcrumb fw-bold">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		}
		?>
	</div>
</div><!-- container -->

<div class="container my-3">
	<div class="row rounded border mx-1">
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">
				<?php if (have_posts()) : ?>
					<header class="page-header">
						<div class="hero-body">
							<div class="container">
								<?php the_archive_title('<h1 class="title page-title py-3">', '</h1>'); ?>
								<?php the_archive_description('<div class="subtitle archive-description">', '</div>'); ?>
							</div>
						</div>
					</header><!-- .page-header -->

					<div class="container">
						<div class="row row-cols-3 row-cols-sm-2 row-cols-md-3 g-3">
							<?php while (have_posts()) : the_post(); ?>
								<?php get_template_part('template-parts/content', 'grid'); ?>
							<?php endwhile; ?>
						</div>
					</div><!-- .container -->

					<div class="section pagination">
						<div class="container is-narrow">
							<?php the_posts_navigation(); ?>
						</div>
					</div>
				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>



<?php get_footer(); ?>