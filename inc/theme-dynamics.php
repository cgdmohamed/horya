<?php
/**
 * Widget Functions
 *
 * @package horya
 */

// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

if ( ! function_exists( 'horya_widgets_init' ) ) {
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function horya_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'horya' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'horya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s column is-one-third">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title is-bold">',
			'after_title'   => '</h2>',
			) );
	}
}
add_action( 'widgets_init', 'horya_widgets_init' );
