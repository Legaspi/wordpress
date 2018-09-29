<?php
/**
 * includes
 *
 * @package noa
 */
if ( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Widgets
 */
 require get_template_directory().'/widgets/recent-post-thumbnails.php';

 /**
 * Assets
 */
require get_template_directory().'/inc/assets.php';

/**
 * Dynamic styles
 */
require get_template_directory().'/inc/dynamic-styles.php';

