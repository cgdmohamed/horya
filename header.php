<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <!-- google adsense tag -->
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
      window.googletag = window.googletag || {cmd: []};
      googletag.cmd.push(function() {
        googletag
            .defineSlot(
                '/6355419/Travel/Europe/France/Paris', [300, 250], 'banner-ad')
            .addService(googletag.pubads());
        googletag.enableServices();
      });
    </script>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <nav class="navbar navbar-expand-lg  shadow-5-strong bg-light justify-content-between" role="navigation">
            <div class="container-fluid ">
                <a class="navbar-brand" href="<?php echo esc_url(site_url()); ?> ">
            <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
             
            if ( has_custom_logo() ) {
                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" height="50px" />';
            } else {
                echo '<h1>' . get_bloginfo('name') . '</h1>';
            }
            ?>        
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'horya'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse justify-content-end',
                    'container_id'      => 'navbarNavAltMarkup',
                    'menu_class'        => 'navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>

            </div>
        </nav>
    </header>