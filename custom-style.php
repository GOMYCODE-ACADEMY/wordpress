<?php

	$podcaster_radio_custom_css= "";

	/*-------------------- Global Color -------------------*/

	$podcaster_radio_first_color = get_theme_mod('podcaster_radio_first_color');

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='.search-box i, #slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #slider .more-btn a, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #track-player-sec .ai-wrap .ai-btn.ai-btn-active, #track-player-sec .ai-wrap .ai-track:hover, #track-player-sec .ai-wrap .ai-track.ai-track-active, #track-player-sec .ai-wrap .ai-track-progress, #track-player-sec .ai-wrap .ai-volume-bar.ai-volume-bar-active::before, #track-player-sec .ai-wrap .ai-audio-control, #track-player-sec .ai-wrap .ai-audio-control:hover, #track-player-sec .ai-wrap .ai-audio-control:focus, #track-player-sec .ai-wrap .ai-track-progress:after, #podcast-series-section .owl-nav button:hover i, #preloader, #footer .tagcloud a:hover, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale, .toggle-nav i{';
			$podcaster_radio_custom_css .='background: '.esc_attr($podcaster_radio_first_color).';';
		$podcaster_radio_custom_css .='}';
	}

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='a:hover, .top-bar .topbar-links a:hover, p.site-title a:hover, .logo h1 a:hover, .main-navigation li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover, #slider .inner_carousel h1 a:hover, #slider .more-btn a i, .more-btn a i, #track-player-sec .ai-wrap .ai-track-time, #podcast-series-section h2, #podcast-series-section .owl-nav button i, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .post-main-box:hover h3 a,#sidebar ul li a:hover, #footer li a:hover,.post-navigation a:hover .post-title,.post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .post-navigation span.meta-nav:hover{';
			$podcaster_radio_custom_css .='color: '.esc_attr($podcaster_radio_first_color).';';
		$podcaster_radio_custom_css .='}';
	}

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='.tags-bg a:hover{';
			$podcaster_radio_custom_css .='color: '.esc_attr($podcaster_radio_first_color).'!important;';
		$podcaster_radio_custom_css .='}';
	}

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='#slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #footer .tagcloud a:hover{';
			$podcaster_radio_custom_css .='border-color: '.esc_attr($podcaster_radio_first_color).';';
		$podcaster_radio_custom_css .='}';
	}

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='#podcast-series-section h3 a:before{';
			$podcaster_radio_custom_css .='border-left-color: '.esc_attr($podcaster_radio_first_color).';';
		$podcaster_radio_custom_css .='}';
	}

	if($podcaster_radio_first_color != false){
		$podcaster_radio_custom_css .='.search-box:before, .search-box:after{';
			$podcaster_radio_custom_css .='border-top-color: '.esc_attr($podcaster_radio_first_color).';';
		$podcaster_radio_custom_css .='}';
	}

	$podcaster_radio_custom_css .='@media screen and (max-width:1000px) {';
		if($podcaster_radio_first_color != false){
			$podcaster_radio_custom_css .='.main-navigation a:hover{
				color:'.esc_attr($podcaster_radio_first_color).' !important;
			}';
		}
	$podcaster_radio_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$podcaster_radio_theme_lay = get_theme_mod( 'podcaster_radio_width_option','Full Width');
    if($podcaster_radio_theme_lay == 'Boxed'){
		$podcaster_radio_custom_css .='body{';
			$podcaster_radio_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$podcaster_radio_custom_css .='}';
		$podcaster_radio_custom_css .='.scrollup i{';
			$podcaster_radio_custom_css .='right: 100px;';
		$podcaster_radio_custom_css .='}';
		$podcaster_radio_custom_css .='.page-template-custom-home-page .home-page-header{';
			$podcaster_radio_custom_css .='padding: 0px 40px 0 10px;';
		$podcaster_radio_custom_css .='}';
	}else if($podcaster_radio_theme_lay == 'Wide Width'){
		$podcaster_radio_custom_css .='body{';
			$podcaster_radio_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$podcaster_radio_custom_css .='}';
		$podcaster_radio_custom_css .='.scrollup i{';
			$podcaster_radio_custom_css .='right: 30px;';
		$podcaster_radio_custom_css .='}';
	}else if($podcaster_radio_theme_lay == 'Full Width'){
		$podcaster_radio_custom_css .='body{';
			$podcaster_radio_custom_css .='max-width: 100%;';
		$podcaster_radio_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$podcaster_radio_resp_slider = get_theme_mod( 'podcaster_radio_resp_slider_hide_show',false);
	if($podcaster_radio_resp_slider == true && get_theme_mod( 'podcaster_radio_slider_hide_show', false) == false){
    	$podcaster_radio_custom_css .='#slider{';
			$podcaster_radio_custom_css .='display:none;';
		$podcaster_radio_custom_css .='} ';
	}
    if($podcaster_radio_resp_slider == true){
    	$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='#slider{';
			$podcaster_radio_custom_css .='display:block;';
		$podcaster_radio_custom_css .='} }';
	}else if($podcaster_radio_resp_slider == false){
		$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='#slider{';
			$podcaster_radio_custom_css .='display:none;';
		$podcaster_radio_custom_css .='} }';
		$podcaster_radio_custom_css .='@media screen and (max-width:575px){';
		$podcaster_radio_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$podcaster_radio_custom_css .='margin-top: 45px;';
		$podcaster_radio_custom_css .='} }';
		$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='#track-player-sec .audioigniter-root{';
			$podcaster_radio_custom_css .='margin-top: 5%;';
		$podcaster_radio_custom_css .='} }';
	}

	$podcaster_radio_resp_sidebar = get_theme_mod( 'podcaster_radio_sidebar_hide_show',true);
    if($podcaster_radio_resp_sidebar == true){
    	$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='#sidebar{';
			$podcaster_radio_custom_css .='display:block;';
		$podcaster_radio_custom_css .='} }';
	}else if($podcaster_radio_resp_sidebar == false){
		$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='#sidebar{';
			$podcaster_radio_custom_css .='display:none;';
		$podcaster_radio_custom_css .='} }';
	}

	$podcaster_radio_resp_scroll_top = get_theme_mod( 'podcaster_radio_resp_scroll_top_hide_show',true);
	if($podcaster_radio_resp_scroll_top == true && get_theme_mod( 'podcaster_radio_hide_show_scroll',true) == false){
    	$podcaster_radio_custom_css .='.scrollup i{';
			$podcaster_radio_custom_css .='visibility:hidden !important;';
		$podcaster_radio_custom_css .='} ';
	}
    if($podcaster_radio_resp_scroll_top == true){
    	$podcaster_radio_custom_css .='@media screen and (max-width:575px) {';
		$podcaster_radio_custom_css .='.scrollup i{';
			$podcaster_radio_custom_css .='visibility:visible !important;';
		$podcaster_radio_custom_css .='} }';
	}else if($podcaster_radio_resp_scroll_top == false){
		$podcaster_radio_custom_css .='@media screen and (max-width:575px){';
		$podcaster_radio_custom_css .='.scrollup i{';
			$podcaster_radio_custom_css .='visibility:hidden !important;';
		$podcaster_radio_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$podcaster_radio_copyright_alingment = get_theme_mod('podcaster_radio_copyright_alingment');
	if($podcaster_radio_copyright_alingment != false){
		$podcaster_radio_custom_css .='.copyright p{';
			$podcaster_radio_custom_css .='text-align: '.esc_attr($podcaster_radio_copyright_alingment).';';
		$podcaster_radio_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$podcaster_radio_site_title_font_size = get_theme_mod('podcaster_radio_site_title_font_size');
	if($podcaster_radio_site_title_font_size != false){
		$podcaster_radio_custom_css .='.logo h1, .logo p.site-title{';
			$podcaster_radio_custom_css .='font-size: '.esc_attr($podcaster_radio_site_title_font_size).';';
		$podcaster_radio_custom_css .='}';
	}

	$podcaster_radio_site_tagline_font_size = get_theme_mod('podcaster_radio_site_tagline_font_size');
	if($podcaster_radio_site_tagline_font_size != false){
		$podcaster_radio_custom_css .='.logo p.site-description{';
			$podcaster_radio_custom_css .='font-size: '.esc_attr($podcaster_radio_site_tagline_font_size).';';
		$podcaster_radio_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$podcaster_radio_preloader_bg_color = get_theme_mod('podcaster_radio_preloader_bg_color');
	if($podcaster_radio_preloader_bg_color != false){
		$podcaster_radio_custom_css .='#preloader{';
			$podcaster_radio_custom_css .='background-color: '.esc_attr($podcaster_radio_preloader_bg_color).';';
		$podcaster_radio_custom_css .='}';
	}

	$podcaster_radio_preloader_border_color = get_theme_mod('podcaster_radio_preloader_border_color');
	if($podcaster_radio_preloader_border_color != false){
		$podcaster_radio_custom_css .='.loader-line{';
			$podcaster_radio_custom_css .='border-color: '.esc_attr($podcaster_radio_preloader_border_color).'!important;';
		$podcaster_radio_custom_css .='}';
	}

	/*----------------- Slider -----------------*/

	$podcaster_radio_slider_hide_show = get_theme_mod('podcaster_radio_slider_hide_show');
	if($podcaster_radio_slider_hide_show == false){
		$podcaster_radio_custom_css .='.page-template-custom-home-page .home-page-header{';
			$podcaster_radio_custom_css .='position: static; background-color: #000; padding: 15px;';
		$podcaster_radio_custom_css .='}';
	}