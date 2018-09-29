<?php
/**
 * noa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package noa
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'noa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function noa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on noa, use a find and replace
		 * to change 'noa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'noa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		* Image sizes
		*/
		add_image_size( 'post-thumbnail', 750, 9999 );
		
		add_image_size( 'widget-posts', 100, 9999 );

		/**
		 * Add Editor Style.
		 */
		add_editor_style( 'editor-style.css' );
			
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'noa' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'noa_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;

add_action( 'after_setup_theme', 'noa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noa_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'noa_content_width', 640 );
}
add_action( 'after_setup_theme', 'noa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noa_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 1', 'noa' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'noa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 2', 'noa' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'noa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 3', 'noa' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'noa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'noa_widgets_init' );


/**
 * Set default size for galleries
 */
function noa_gallery_defaults( $settings, $post ) {
    $defaults = ! empty( $settings['galleryDefaults'] ) && is_array( $settings['galleryDefaults'] ) ? $settings['galleryDefaults'] : array();
    $settings['galleryDefaults'] = array_merge( $defaults, array(
        'columns'   => 5,
        'size'      => 'large',
        'link'      => 'file'
    ) );
    return $settings;
}
add_filter( 'media_view_settings', 'noa_gallery_defaults', 10, 2 );

# Including theme components
require_once get_template_directory().'/inc/includes.php';