<?php
/**
 * Theme assets
 *
 * @package noa
 */

 /**
 * Enqueue scripts and styles.
 */
if ( !defined( 'ABSPATH' ) ) { exit; }

function noa_scripts() {
	
	wp_enqueue_style( 'noa-style', get_stylesheet_uri(), array(), '1.2.8' );

	wp_enqueue_style( 'googlefont-pacifico', 'https://fonts.googleapis.com/css?family=Pacifico' );
	
	wp_enqueue_style( 'googlefont-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );

	wp_enqueue_style( 'aos-css', get_template_directory_uri() .'/assets/css/aos.css' );

	wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/assets/css/lightbox.min.css'); // Enqueue it!

	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), '2.10.0', true );

	wp_enqueue_script( 'imagesloader', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '3.1.8', true );

	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.min.js', array('jquery'), '4.2.1', true );

	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/js/aos.min.js', array('jquery'), '2.0.0', true );

	wp_enqueue_script( 'noa-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'noa-global', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'noa_scripts' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function noa_customize_preview_js() {

	
	wp_enqueue_script( 'noa-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'jquery' ), '20151215', true );
	
}
add_action( 'customize_preview_init', 'noa_customize_preview_js' );

/**
 * Binds JS handlers with manage controls of cutomizer.
 */
function noa_customize_controls_js(){
    wp_enqueue_script( 'noa-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery' ), '20151215', true );
}

add_action( 'customize_controls_enqueue_scripts', 'noa_customize_controls_js' );