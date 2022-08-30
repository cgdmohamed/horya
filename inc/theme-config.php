<?php

/**
 * 
 * Theme Performance and functions
 * 
 */
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

add_action('wp_enqueue_scripts', 'aiooc_crunchify_dequeue_dashicon');
function aiooc_crunchify_dequeue_dashicon()
{
    if (current_user_can('update_core')) {
        return;
    }
    wp_deregister_style('dashicons');
}

/**
 * 
 * 
 * Text Domain Loader
 * 
 * 
 */
add_action('after_setup_theme', 'horya_theme_setup');
 
/**
 * Load translations for Horya Theme
 */
function horya_theme_setup(){
    load_theme_textdomain('horya', get_template_directory() . '/languages');
}

/**
 * Excerpt lenght
 */
function custom_excerpt_length( $length ) {
    return 10   ;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * 
 * Add image size
 * 
 */
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'img-thumb', 220 ); // 300 pixels wide (and unlimited height)
    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}