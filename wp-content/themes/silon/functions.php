<?php

// Silon theme supports
if ( ! function_exists( 'silon_theme_supports' ) ) :
function silon_theme_supports(){
    
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    
	register_nav_menus( array(
		'main-menu'   => __( 'Main menu', 'silon' ),
        'top-menu'   => __( 'Top menu', 'silon' ),
	) );    
}
endif;
add_action('after_setup_theme', 'silon_theme_supports');


// Calling Theme files
function silon_theme_files(){
    
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0' );
    wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
    wp_enqueue_style( 'silon-theme-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'silon-theme-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );
    
    wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), '1.16.0', true );
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
    wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'silon-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20120206', true );
}
add_action('wp_enqueue_scripts', 'silon_theme_files'); 


// Includes
include_once('inc/widgets.php');
//include_once('inc/custom-posts.php');
include_once('inc/shortcodes.php');
//include_once('inc/elementor/elementor.php');
//include_once('inc/metabox-and-options.php');
include_once('inc/codestar-framework-master/cs-framework.php');

if (class_exists('WooCommerce')) {
    
   include_once('inc/woocommerce.php');
}