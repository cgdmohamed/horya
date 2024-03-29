<?php
/**
 * Helper Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package horya
 */

if ( ! function_exists( 'horya_home_link' ) ) {
	function horya_home_link($class)
	{
		$output = '<a href="' . esc_url( home_url( '/' ) ) . '" class="' . $class . '" rel="home">' . get_bloginfo('name') . '</a>';
		echo $output;
	}
}

if ( ! function_exists( 'horya_blog_description' ) ) {
	function horya_blog_description($class)
	{
		$description = get_bloginfo( 'description', 'display' );
		$output = '';
		if ( $description || is_customize_preview() ) {
			$output.= '<p class="'. $class .' site-description is-hidden-mobile">'. $description . '</p>';
		}
		echo $output;
	}
}

if ( ! function_exists( 'horya_skip_link_screen_reader_text' ) ) {
	function horya_skip_link_screen_reader_text()
	{
		$output = '<a class="skip-link screen-reader-text" href="#content">Skip to content</a>';
		echo $output;
	}
}

if ( ! function_exists( 'horya_menu_toggle' ) ) {
	function horya_menu_toggle()
	{
		$output = '
			<button id="menu-toggle" class="navbar-burger" 
				style="border: none; background: inherit; color: inherit; height: auto;" 
				aria-controls="primary-menu" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
			</button>';
		echo $output;
	}
}

if ( ! function_exists( 'horya_copyright_link' ) ) {
	function horya_copyright_link($author = 'horya', $url = 'http://horya.com')
	{
		$output = '
			<p class="copyright-link">&copy; '. date('Y') . '
				<a href=" ' . $url . '">' . $author . '</a>
			</p>';
		echo $output;
	}
}

if ( ! function_exists( 'horya_the_title' ) ) {
	function horya_the_title($class = 'is-3', $link = TRUE)
	{
		$heading = _horya_convert_heading($class);
		$title_before = '<' . $heading . ' class="title entry-title ' . $class . '">';
		$title_after = '</' . $heading . '>';
		if ($link === TRUE) {
			$output = the_title( sprintf( $title_before .'<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' . $title_after );
		} else {
			$output = $title_before . get_the_title() . $title_after;
		}
		echo $output;
	}
}

if ( ! function_exists( '_horya_convert_heading' ) ) {
	function _horya_convert_heading($class)
	{
		switch ($class) {
			case 'is-1':
			$heading = 'h1';
			break;

			case 'is-2':
			$heading = 'h2';
			break;

			case 'is-3':
			$heading = 'h3';
			break;

			case 'is-4':
			$heading = 'h4';
			break;

			case 'is-5':
			$heading = 'h5';
			break;

			case 'is-6':
			$heading = 'h6';
			break;

			default:
			$heading = 'h3';
			break;
		}
		return $heading;
	}
}

if ( ! function_exists( 'horya_get_comments' ) ) {
	function horya_get_comments()
	{
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}