<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<div class="container my-3">
	<div class="pt-3 pb-1 pe-3 rounded border post-breadcrumb fw-bold">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
	}
	?>
	</div>
</div><!-- container -->

<div class="container">
	<div class="row pb-5 pt-1">
		<div class="col-md-8">
			<main id="main" class="border rounded p-3" role="main">
				<?php while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
					<?php the_content(); ?>
					<div class="section">
						<div class="container is-narrow">
							<?php the_post_navigation(); ?>
						</div>
					</div>
					<?php //horya_get_comments(); 
					?>
				<?php endwhile; ?>
			</main><!-- #main -->
		</div>
		<div class="col-md-4">
			<div class="border rounded p-3">
			<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<div id="primary">

</div><!-- #primary -->


<?php get_footer(); ?>