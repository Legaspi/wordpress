<?php
/**
 * Theme functions
 *
 * @package gallerypress
 * @since 1.0.0
 */

/**
 * Comment Form - GalleryPress
 *
**/
function gallerypress_comment_form_fields( $fields ) {
			
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;

}
add_filter( 'comment_form_fields', 'gallerypress_comment_form_fields' );