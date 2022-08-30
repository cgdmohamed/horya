<?php

/**
 * Search result page
 */

get_header();

if (have_posts()) {
?>
    <div class="container py-3">
        <div class="row">

            <header class="page-header alignwide">
                <h1 class="page-title">
                    <?php
                    printf(
                        /* translators: %s: Search term. */
                        esc_html__('نتائج البحث عن "%s"', 'horya'),
                        '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                    );
                    ?>
                </h1>
            </header><!-- .page-header -->

            <div class="search-result-count default-max-width">
                <?php
                printf(
                    esc_html(
                        /* translators: %d: The number of search results. */
                        _n(
                            'تم ايجاد %d نتيجة لبحثك.',
                            'تم ايجاد %d نتيجة لبحثك..',
                            (int) $wp_query->found_posts,
                            'horya'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
            </div><!-- .search-result-count -->
        </div><!-- row -->
    </div><!-- Container -->

    <section class="py-3 text-center container">
        <div class="row">
            <div class="col">
                <?php get_search_form() ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row px-2">
            <?php
            // Start the Loop.
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'result');
            } // End the loop.

            // Previous/next page navigation.
            the_posts_navigation();

            // If no content, include the "No posts found" template.
        } else {
            get_template_part('template-parts/content/content-none');
        }
            ?>
            </div>
        </div>
    </section>

    <?php
    get_footer();
    ?>