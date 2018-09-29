<?php
/**
 * includes
 *
 * @package noa
 */
if ( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Set dynamic styles
 */

function noa_dynamic_styles(){
    ?>

   <style id="solido_custom_css">

       .site-header .site-branding .header-button{
           background-color:<?php echo get_theme_mod('noa_header_button_color','#a80054'); ?>;
           color:<?php echo get_theme_mod('noa_header_button_textcolor','#ffffff'); ?>
       }
       .site-header .site-branding .header-button:hover{
           background-color:<?php echo get_theme_mod('noa_header_button_color_hover','#774e73b'); ?>;
       }
   </style>

<?php
}
add_action('wp_head' ,'noa_dynamic_styles');
