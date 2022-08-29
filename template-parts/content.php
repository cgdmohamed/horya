<?php

/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
	<div>
		<header class="content">
			<?php if (is_single()) : ?>
				<?php horya_the_title('is-1', FALSE); ?>
			<?php elseif ('page' === get_post_type()) : ?>
				<?php
				if (is_front_page()) {
				} else {
					horya_the_title('is-2', FALSE);
				} ?>
			<?php else : ?>
				<?php horya_the_title('is-2'); ?>
			<?php endif; ?>
			<?php if ('post' === get_post_type()) : ?>
				<div class="subtitle is-6">
					<?php horya_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="content entry-content">
			<?php
			if (is_front_page()) {
				get_template_part('template-parts/content', 'home');
			} else {

				the_content(
					sprintf(
						/* translators: %s: Name of current post. */
						wp_kses(
							__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'horya'),
							array(
								'span' => array(
									'class' => array()
								)
							)
						),
						the_title('<span class="screen-reader-text">"', '"</span>', false)
					)
				);
			}

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'horya'),
				'after'  => '</div>',
			));
			?>
		</div><!-- .entry-content -->

		<footer class="content entry-footer">
			<?php horya_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
<?php get_footer(); ?>