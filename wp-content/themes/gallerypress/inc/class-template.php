<?php
/**
 * Template functions
 *
 * @package gallerypress
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GalleryPress_Template' ) ) {

	class GalleryPress_Template {

		public function __construct() {

			add_action( 'init', array( $this, 'update_hooks' ) );

		}

		public function update_hooks (){

			// Remove hooks
			$this->_remove_hooks();

			// Add new hooks
			$this->_add_hooks();

		}

		private function _remove_hooks() {

			/**
			 * Post - Hooks
			 */
			remove_action( 'basepress_homepage', 'basepress_homepage_content', 10);
			
			remove_action( 'basepress_loop_post', 'basepress_post_content',         		30 );
			remove_action( 'basepress_header', 'basepress_primary_navigation', 20 );
			remove_action( 'basepress_category_menu', 'basepress_category_navigation', 	0 );
			
			remove_action( 'basepress_sidebar', 'basepress_get_sidebar',          10 );
			remove_action( 'basepress_page', 'basepress_page_header',         10 );
			remove_action( 'basepress_after_header', 'basepress_header_image',  				10 );
			
			/** Single **/
			remove_action( 'basepress_single_post', 'basepress_post_header',  		 		10 );
			remove_action( 'basepress_single_post', 'basepress_post_header_meta',  		 	20 );
			remove_action( 'basepress_single_post_bottom', 'basepress_pro_author_bio', 30 );
			remove_action( 'basepress_single_post_bottom', 'basepress_post_tags', 					10 );

			/** Footer **/
			remove_action( 'basepress_footer', 			'basepress_footer_nav', 30 );
			remove_action( 'basepress_footer', 'basepress_credit', 40 );


		}

		private function _add_hooks() {

			/**
			 * Header - Hooks
			 */
			add_action( 'basepress_header', 'gallerypress_primary_nav_wrapper', 15 );
			add_action( 'basepress_header', 'gallerypress_primary_nav',         20 );
			add_action( 'basepress_header', 'gallerypress_primary_nav_wrapper_close', 30 );

			/**
			 * Post - Hooks
			 */
			add_action( 'basepress_homepage', 'gallerypress_home_post', 10 );
			add_action( 'gallerypress_loop_post', 'gallerypress_main_wrap_open', 1 );
			add_action( 'gallerypress_loop_post', 'gallerypress_home_post_header', 10 );
			add_action( 'gallerypress_loop_post', 'gallerypress_post_excerpt', 20 );
			add_action( 'gallerypress_loop_post', 'gallerypress_main_wrap_close', 30 );
			add_action( 'gallerypress_loop_after', 'gallerypress_infinite_loading', 10 );	
			add_action( 'gallerypress_loop_after', 'gallerypress_add_div_infinite_scroll', 30 );
			add_action( 'gallerypress_post_content_before', 'basepress_post_metadata', 10 );

			add_action( 'basepress_loop_post', 'gallerypress_post_content_excerpt',         30 );

			add_action( 'basepress_single_post', 'gallerypress_post_header',  		 		10 );
			add_action( 'basepress_single_post_bottom', 'gallerypress_post_tags', 					10 );
			add_action( 'basepress_after_post_title', 'gallerypress_single_post_thumbnail', 10);
			
			add_action( 'basepress_page', 'gallerypress_page_header',         10 );
			add_action( 'gallerypress_after_page_header', 'gallerypress_single_post_thumbnail',         15 );
			add_action( 'basepress_footer', 'gallerypress_credit', 40 );

			/**
			 * Filters
			 */
			add_filter( 'theme_page_templates', array( $this, 'child_theme_remove_page_template' ) );
			add_filter( 'excerpt_length', array( $this, 'gallerypress_excerpt_length' ) );

			//add_filter( 'basepress_enable_post_metadata', array( $this, 'enable_post_metadata' ) );

			do_action('after_gallerypress_setup');
		}

		// public function enable_post_metadata() {

		// 	return array('author', 'date');
		// }

		/**
		* Remove page templates inherited from the parent theme.
		*
		* @param array $page_templates List of currently active page templates.
		*
		* @return array Modified list of page templates.
		*/
		function child_theme_remove_page_template( $page_templates ) {
		    // Remove the template we don’t need.
		    unset( $page_templates['template-fullwidth.php'] );

		    return $page_templates;
		}


		function gallerypress_excerpt_length( $length ) {

				$number = apply_filters('gallerypress_display_length', 20);

				return $number;
		}

	}
}

return new GalleryPress_Template();