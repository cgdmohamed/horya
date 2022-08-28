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
        <?php if ( is_front_page()){
            get_template_part( 'template-parts/content', 'home' ); 
        } 
        if ( is_home() ){
            echo 'hi home';
        }
        ?>
		<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'post' ); ?>

					<?php endwhile; ?>

					<?php the_posts_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
