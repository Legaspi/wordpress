<?php
/**
 * noa Theme Customizer
 *
 * @package noa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( !defined( 'ABSPATH' ) ) { exit; }

function noa_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         	= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default		= '#990f8b';

	/*
	* Site Brandign animations
	*/
	
	$wp_customize->add_setting( 'noa_branding_css_animations', array( 
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( 'noa_branding_css_animations', array(
		'type'		 => 'select',
		'label'      => esc_html__( 'Animation for title and description', 'noa' ),
        'section'    => 'title_tagline',
		'settings'   => 'noa_branding_css_animations',
		'choices'    => noa_branding_css_animations(),
		'priority' => 40
	));

	/*
	*Theme options panel
	*/
	$wp_customize->add_panel( 'noa_theme_options_panel', array(
        'title' => esc_html__( 'Theme options', 'noa' ),
        'priority' => 35,
	));

	/*
	*Header button
	*/
	$wp_customize->add_section( 'noa_header_button_section' , array(
		'title'       => esc_html__( 'Header Button options', 'noa' ),
		'panel'		=> 'noa_theme_options_panel',
		'priority'    => 20,
		'description' => esc_html__('Set pagination type on posts list','noa'),
	));
	
	$wp_customize->add_setting( 'noa_header_button' , array(
		'default' => true,
		'sanitize_callback' => 'noa_sanitize_checkbox',
	));
	
	$wp_customize->add_control( 'noa_header_button_control', array(
		'label'      => esc_html__( 'Show Header button', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button',
		'description'=> esc_html__('Show or hide header button , It will only be shown on the blog page or front page','noa'),
		'type' => 'checkbox',
		
					
	));

	$wp_customize->add_setting( 'noa_header_button_text' , array(
		'default' => esc_html__('Button Text','noa'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	 => 'postMessage',
	));

	$wp_customize->add_control( 'noa_header_button_text_control', array(
		'label'      => esc_html__( 'Text Button', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button_text',
		'description'=> esc_html__('Set text for button header','noa'),
	));

	$wp_customize->add_setting( 'noa_header_button_link' , array(
		'default' => esc_url(home_url( '/'),'noa'),
		'sanitize_callback' => 'url_raw',
	));

	$wp_customize->add_control( 'noa_header_button_link_control', array(
		'label'      => esc_html__( 'Link for Button', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button_link',
		'description'=> esc_html__('Set link for button header','noa'),
					
	));

	$wp_customize->add_setting( 'noa_header_button_color' , array(
		'default' => '#a80054',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'noa_header_button_color_control', array(
		'label'      => esc_html__( 'Color for button ', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button_color',
		'description'=> esc_html__('Set color button header','noa'),
	)));

	$wp_customize->add_setting( 'noa_header_button_color_hover' , array(
		'default' => '#e6cde6',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'noa_header_button_color_hover_control', array(
		'label'      => esc_html__( 'Color for button header hover', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button_color_hover',
		'description'=> esc_html__('Set color for button header hover','noa'),
	)));

	$wp_customize->add_setting( 'noa_header_button_textcolor' , array(
		'default' => '#e6cde6',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'noa_header_button_textcolor_control', array(
		'label'      => esc_html__( 'Color text for button header ', 'noa' ),
		'section'    => 'noa_header_button_section',
		'settings'   => 'noa_header_button_textcolor',
		'description'=> esc_html__('Set color text with button header','noa'),
	)));


	

	/*
	* Pagination
	*/
	$wp_customize->add_section( 'noa_pagination_section' , array(
		'title'       => esc_html__( 'Blog pagination options', 'noa' ),
		'panel'		=> 'noa_theme_options_panel',
		'priority'    => 30,
		'description' => esc_html__('Set pagination type on posts list','noa'),
	));
  
	     
	$wp_customize->add_setting( 'noa_pagination_type', array( 
		'default' => 'next-prev',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( 'noa_pagination_type_control', array(
		'type'		 => 'select',
		'label'      => esc_html__( 'Pagination Type', 'noa' ),
        'section'    => 'noa_pagination_section',
		'settings'   => 'noa_pagination_type',
		'choices'    => array(
			'next-prev' => esc_html__('Old/New (Default)','noa'),
			'numerical' => esc_html__('Numerical','noa'),
		)
		
	));


	/*
	* Social network
	*/
	$wp_customize->add_section( 'noa_social_section' , array(
		'title'       => __( 'Social icons', 'noa' ),
		'priority'    => 40,
		'panel'		=> 'noa_theme_options_panel',
		'description' => __('Set url for social icons footer, with hidde icon set empty value.','noa'),
	) );
  
	/*Instagram*/     
	$wp_customize->add_setting( 'noa_instagram_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_instagram_url_control', array(
		'label'      => esc_html__( 'Instagram Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_instagram_url',
		
	));
	
	/* Pinterest*/
	$wp_customize->add_setting( 'noa_pinterest_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_pinterest_url_control', array(
		'label'      => esc_html__( 'Pinterest Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_pinterest_url',
		
    ));

	/* Facebook*/
	$wp_customize->add_setting( 'noa_facebook_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_facebook_url_control', array(
		'label'      => esc_html__( 'Facebook Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_facebook_url',
		
    ));

	/* Twitter*/
	$wp_customize->add_setting( 'noa_twitter_url', 
	array( 
		'sanitize_callback' => 'esc_url_raw') );

	$wp_customize->add_control( 'noa_twitter_url_control', array(
	'label'      => esc_html__( 'Twitter Url', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_twitter_url',

	));

	/* Linkedin*/
	$wp_customize->add_setting( 'noa_linkedin_url', 
	array( 
		'sanitize_callback' => 'esc_url_raw') );

	$wp_customize->add_control( 'noa_linkedin_url_control', array(
	'label'      => esc_html__( 'Linkedin Url', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_linkedin_url',

	));

	/* Whatsapp*/
	$wp_customize->add_setting( 'noa_whatsapp_number', 
	array( 
		'sanitize_callback' => 'absint'
	) 
	);

	$wp_customize->add_control( 'noa_whatsapp_number_control', array(
	'label'      => esc_html__( 'Whatsapp Phone number', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_whatsapp_number',

	));

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'noa_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'noa_customize_partial_blogdescription',
		) );

		$wp_customize->selective_refresh->add_partial( 'noa_header_button_text', array(
			'selector'        => '.header-button',
			'render_callback' => 'noa_customize_partial_header_button_text',
		) );
	}
}
add_action( 'customize_register', 'noa_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function noa_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function noa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the header button text for the selective refresh partial.
 *
 * @return void
 */
function noa_customize_partial_header_button_text(){
	return get_theme_mod('noa_header_button_text');
}



/**
 * noa sanitization
 */
function noa_sanitize_checkbox($value){

	if('1'== $value){
		return true;
	}
	return false;

}