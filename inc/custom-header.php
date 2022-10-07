<?php
/**
 * @package Podcaster Radio
 * Setup the WordPress core custom header feature.
 *
 * @uses podcaster_radio_header_style()
*/
function podcaster_radio_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'podcaster_radio_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 95,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'podcaster_radio_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'podcaster_radio_custom_header_setup' );

if ( ! function_exists( 'podcaster_radio_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see podcaster_radio_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'podcaster_radio_header_style' );

function podcaster_radio_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'podcaster-radio-basic-style', $custom_css );
	endif;
}
endif;