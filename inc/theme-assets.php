<?php
function themebs_enqueue_styles() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/main.min.css' );
    wp_enqueue_style( 'fontawesom-brands', get_template_directory_uri() . '/assets/css/brands.min.css' );
    wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  
  }
  add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');
  
  function themebs_enqueue_scripts() {
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/home.js', array( 'jquery' ) );
  }
  add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');