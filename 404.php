<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * 
 */
?>

<?php get_header(); ?>

<div id="primary">
	<main id="main" role="main">
		<div class="container">
			<section class="error-404 not-found">
				<header class="page-header wrapper">
					<h1 class="title is-1 page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'horya' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content content">
					<p class="text"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try the search?', 'horya' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
