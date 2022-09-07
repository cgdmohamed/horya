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

function remove_jquery_migrate( $scripts ) {
	
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			
		$script = $scripts->registered['jquery'];
		
		if ( $script->deps ) { 
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

/**
 * Images Sizes
 * */
function add_img_size($content){
  $pattern = '/<img [^>]*?src="(https?:\/\/[^"]+?)"[^>]*?>/iu';
  preg_match_all($pattern, $content, $imgs);
  foreach ( $imgs[0] as $i => $img ) {
    if ( false !== strpos( $img, 'width=' ) && false !== strpos( $img, 'height=' ) ) {
      continue;
    }
    $img_url = $imgs[1][$i];
    $img_size = @getimagesize( $img_url );
      
    if ( false === $img_size ) {
      continue;
    }
    $replaced_img = str_replace( '<img ', '<img ' . $img_size[3] . ' ', $imgs[0][$i] );
    $content = str_replace( $img, $replaced_img, $content );
  }
  return $content;
}
add_filter('the_content','add_img_size');

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