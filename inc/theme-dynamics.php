<?php

/**
 * Widget Functions
 *
 * @package horya
 */

// Add theme support for selective refresh for widgets.
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('title-tag');
add_theme_support('custom-logo', array(
	'height' => 81,
	'width'  => 211,
));
add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_theme_support( "responsive-embeds" );
$themeargs = array(
	'default-image' => get_template_directory_uri() . '/assets/img/default.png',
	'default-position-x' => 'center',
	'default-position-y' => 'top',
	'default-size' => 'contain',
	'default-repeat'     => 'no-repeat',
);
//add_theme_support( 'custom-background',$themeargs);


if (!function_exists('horya_widgets_init')) {
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function horya_widgets_init()
	{
		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'horya'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'horya'),
			'before_widget' => '<section id="%1$s" class="widget %2$s column is-one-third">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title is-bold">',
			'after_title'   => '</h2>',
		));
	}
}
add_action('widgets_init', 'horya_widgets_init');

/**
 * theme functions
 */

register_nav_menus(array(
	'primary' => __('Primary Menu', 'horya'),
	'footer' => __('Footer', 'horya'),
));

function register_navwalker()
{
	require get_template_directory() . '/inc/bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/**
 * menu link classes
 */
function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/**
 * Widgets
 */
