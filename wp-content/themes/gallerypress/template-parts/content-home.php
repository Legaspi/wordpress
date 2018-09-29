<?php
/**
 * Template part for displaying posts for GalleryPress Homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GalleryPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item clearfix'); ?>>

	<?php
	/**
	 * Functions hooked in to gallerypress_loop_post action.
	 *
	 * @hooked gallerypress_main_wrap_open - 1
	 * @hooked gallerypress_home_post_header - 10
	 * @hooked gallerypress_post_excerpt - 20
	 * @hooked gallerypress_main_wrap_close - 30
	 */
	do_action( 'gallerypress_loop_post' );


	?>	
	
</article><!-- #post-## -->