<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  gallerypress
 * @since 1.0.0
 */

/**
 * Assign the base version to a var
 */

$theme				= wp_get_theme( 'gallerypress' );
$gallerypress_version	= $theme['Version'];

$basepress = (object) array(
	'version'		=> $gallerypress_version,
	'main'			=> require 'inc/class-gallerypress.php',
	'customizer'	=> require 'inc/customizer/class-theme-customizer.php',
);

// Include Core Template
require_once 'inc/class-template.php';

// Include Core Function
require_once 'inc/core-functions.php';
require_once 'inc/function-template.php';
