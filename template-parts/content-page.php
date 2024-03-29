<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <?php the_title('<h1 class="title is-1 entry-title">', '</h1>'); ?>
        </header><!-- .entry-header -->

        <div class="content entry-content">
            <?php the_content(); ?>

            <?php wp_link_pages(array(
                'before' => '<div class="page-links level">' . esc_html__('Pages:', 'horya'),
                'after'  => '</div>',
            )); ?>

        </div><!-- .entry-content -->

        <?php if (get_edit_post_link()) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__('Edit %s', 'horya'),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </div>
</article><!-- #post-## -->