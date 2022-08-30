<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>
<div class="container">
	<div class="bg-secondary rounded border text-center text-light p-5 my-3">
		Google Ads Placeholder
	</div>
</div>

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
					<div class="py-2">
						اخر تحديث
					<?php $post_date = get_the_date( 'j F Y' ); echo $post_date; ?>
					<?php echo get_the_time(); ?>
					</div>
					<?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
					<?php the_content(); ?>
					<section>
						<div>
							<?php
							setCrunchifyPostViews(get_the_ID());
							?>
						</div>
					</section>
					<?php //horya_get_comments(); 
					?>
				<?php endwhile; ?>
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-8">
							<?php echo do_shortcode('[share_buttons]'); ?>
						</div>
						<div class="col d-flex justify-content-end">
							<?php echo getCrunchifyPostViews(get_the_ID()); ?>
						</div>
					</div><!-- tools -->
				</div>
			</main><!-- #main -->
		</div>
		<div class="col-md-4">
			<div class="border rounded p-3">
				<aside class="container">
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
						مقالات من تصنيف <?php $categories = get_the_category();
										if (!empty($categories)) {
											echo esc_html($categories[0]->name);
										} ?>
					</strong>
					<hr />
					<div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 g-3">
						<?php echo do_shortcode('[related_posts]'); ?>
					</div> <!-- related posts -->
				</aside>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>