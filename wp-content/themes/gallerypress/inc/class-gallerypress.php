<?php
/**
 * Theme Class
 *
 * @package gallerypress
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GalleryPress' ) ) :
	/**
	 * The main Theme class to init & setup theme
	 * 
	 */
	class GalleryPress {

		public function __construct() {

			add_action( 'after_setup_theme', array( $this, 'setup' ), 30 );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_action( 'widgets_init',               array( $this, 'unregister_sidebar' ), 30 );

			// Theme Thumbnails
			$this->_add_image_sizes();
		}

		/**
		 * Any theme setup go here
		 *
		 * @since 1.0.0
		 * 
		 */
		public function setup() {

			load_child_theme_textdomain( 'gallerypress', get_stylesheet_directory() . '/languages' );

			add_filter( 'basepress_footer_widget_regions', array( $this, 'gallerypress_footer_widgets' ) );

			unregister_nav_menu( 'footer' );


		}

		public function gallerypress_footer_widgets() {

			$number = apply_filters('gallerypress_footer_widget_regions', 2);

			return $number;

		}


		public function unregister_sidebar() {

			unregister_sidebar('header-1');
		}

		/**
		 * Child scripts & styles
		 * 
		 * @since 1.0.0
		 */
		public function scripts() {
			global $wp_query;

			$layout = is_page_template('template-homepage.php') ? 'home' : 'archive';

			wp_enqueue_script( 'gallerypress-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '20160423', true);
		
			$args = array(
				'nonce'  => wp_create_nonce( 'gallerypress' ),
				'url'    => admin_url( 'admin-ajax.php' ),
				'query'  => $wp_query->query,
				'layout' => $layout
			);
		
			wp_localize_script( 'gallerypress-script', 'GalleryPress', $args );
		}


		/**
		 * Theme Thumbnails 
		 * 
		 * @return [type] [description]
		 */
		private function _add_image_sizes() {

			add_theme_support( 'post-thumbnails' );
			add_image_size( 'gallerypress-thumbnail-related-post', 260, 170, true ); // Posts grid
			
		}

	}

endif;

return new GalleryPress();

