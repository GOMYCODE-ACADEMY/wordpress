<?php
/**
 * Podcaster Radio Theme Customizer
 *
 * @package Podcaster Radio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function podcaster_radio_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'podcaster_radio_custom_controls' );

function podcaster_radio_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'podcaster_radio_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'podcaster_radio_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'podcaster_radio_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'podcaster-radio' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'podcaster_radio_left_right', array(
    	'title' => esc_html__('General Settings', 'podcaster-radio'),
		'panel' => 'podcaster_radio_panel_id'
	) );

	$wp_customize->add_setting('podcaster_radio_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control(new Podcaster_Radio_Image_Radio_Control($wp_customize, 'podcaster_radio_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','podcaster-radio'),
        'description' => esc_html__('Here you can change the width layout of Website.','podcaster-radio'),
        'section' => 'podcaster_radio_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('podcaster_radio_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control('podcaster_radio_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','podcaster-radio'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','podcaster-radio'),
        'section' => 'podcaster_radio_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','podcaster-radio'),
            'Right Sidebar' => esc_html__('Right Sidebar','podcaster-radio'),
            'One Column' => esc_html__('One Column','podcaster-radio'),
            'Grid Layout' => esc_html__('Grid Layout','podcaster-radio')
        ),
	) );

	$wp_customize->add_setting('podcaster_radio_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control('podcaster_radio_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','podcaster-radio'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','podcaster-radio'),
        'section' => 'podcaster_radio_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','podcaster-radio'),
            'Right_Sidebar' => esc_html__('Right Sidebar','podcaster-radio'),
            'One_Column' => esc_html__('One Column','podcaster-radio')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'podcaster_radio_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'podcaster_radio_customize_partial_podcaster_radio_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'podcaster_radio_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','podcaster-radio' ),
		'section' => 'podcaster_radio_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'podcaster_radio_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'podcaster_radio_customize_partial_podcaster_radio_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'podcaster_radio_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','podcaster-radio' ),
		'section' => 'podcaster_radio_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'podcaster_radio_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','podcaster-radio' ),
        'section' => 'podcaster_radio_left_right'
    )));

	$wp_customize->add_setting('podcaster_radio_preloader_bg_color', array(
		'default'           => '#12AFF5',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'podcaster_radio_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'podcaster-radio'),
		'section'  => 'podcaster_radio_left_right',
	)));

	$wp_customize->add_setting('podcaster_radio_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'podcaster_radio_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'podcaster-radio'),
		'section'  => 'podcaster_radio_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'podcaster_radio_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_panel_id'
	) );

	$wp_customize->add_setting( 'podcaster_radio_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','podcaster-radio' ),
      'section' => 'podcaster_radio_topbar_section'
    )));

	$wp_customize->add_setting('podcaster_radio_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('podcaster_radio_topbar_text',array(
		'label'	=> esc_html__('Add Topbar Text','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Welcome To Podcast!', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('podcaster_radio_topbar_support_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('podcaster_radio_topbar_support_link',array(
		'label'	=> esc_html__('Add Support Link','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('podcaster_radio_topbar_wishlist_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('podcaster_radio_topbar_wishlist_link',array(
		'label'	=> esc_html__('Add Wishlist Link','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_topbar_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('podcaster_radio_topbar_myaccount_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('podcaster_radio_topbar_myaccount_link',array(
		'label'	=> esc_html__('Add My Account Link','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_topbar_section',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'podcaster_radio_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_panel_id'
	) );

	$wp_customize->add_setting( 'podcaster_radio_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','podcaster-radio' ),
      'section' => 'podcaster_radio_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('podcaster_radio_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'podcaster_radio_customize_partial_podcaster_radio_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'podcaster_radio_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'podcaster_radio_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'podcaster_radio_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'podcaster-radio' ),
			'description' => __('Slider image size (1400 x 550)','podcaster-radio'),
			'section'  => 'podcaster_radio_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'podcaster_radio_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'podcaster_radio_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','podcaster-radio'),
		'section' => 'podcaster_radio_slidersettings',
		'type'  => 'text',
	) );

	// Track Player Section
	$wp_customize->add_section('podcaster_radio_track_player_section',array(
		'title'	=> __('Track Player Section','podcaster-radio'),
		'description' => __('Select the Page to display track player.','podcaster-radio'),
		'panel' => 'podcaster_radio_panel_id',
	));

	$wp_customize->add_setting( 'podcaster_radio_track_player_page', array(
		'default'           => '',
		'sanitize_callback' => 'podcaster_radio_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'podcaster_radio_track_player_page', array(
		'label'    => __( 'Select Page of Player', 'podcaster-radio' ),
		'section'  => 'podcaster_radio_track_player_section',
		'type'     => 'dropdown-pages'
	) );

	// Podcast Series Section
	$wp_customize->add_section('podcaster_radio_series_podcast_section',array(
		'title'	=> __('Podcast Series Section','podcaster-radio'),
		'description' => __('Add section title and select the category to display for podcast post','podcaster-radio'),
		'panel' => 'podcaster_radio_panel_id',
	));

	$wp_customize->add_setting( 'podcaster_radio_series_podcast_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'podcaster_radio_series_podcast_small_title', array(
		'label'    => __( 'Add Section Small Title', 'podcaster-radio' ),
		'input_attrs' => array(
            'placeholder' => __( 'LISTEN TO COMPLETE SERIES', 'podcaster-radio' ),
        ),
		'section'  => 'podcaster_radio_series_podcast_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'podcaster_radio_series_podcast_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'podcaster_radio_series_podcast_heading', array(
		'label'    => __( 'Add Section Heading', 'podcaster-radio' ),
		'input_attrs' => array(
            'placeholder' => __( 'PODCAST SERIES', 'podcaster-radio' ),
        ),
		'section'  => 'podcaster_radio_series_podcast_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('podcaster_radio_series_podcast_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'podcaster_radio_sanitize_choices',
	));
	$wp_customize->add_control('podcaster_radio_series_podcast_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Podcast Series','podcaster-radio'),
		'section' => 'podcaster_radio_series_podcast_section',
	));

	//Blog Post
	$wp_customize->add_panel( 'podcaster_radio_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'podcaster_radio_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('podcaster_radio_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'podcaster_radio_Customize_partial_podcaster_radio_toggle_postdate', 
	));

	$wp_customize->add_setting( 'podcaster_radio_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','podcaster-radio' ),
        'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_toggle_author',array(
		'label' => esc_html__( 'Author','podcaster-radio' ),
		'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_toggle_comments',array(
		'label' => esc_html__( 'Comments','podcaster-radio' ),
		'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_toggle_time',array(
		'label' => esc_html__( 'Time','podcaster-radio' ),
		'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
	));
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','podcaster-radio' ),
		'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
	));
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_toggle_tags', array(
		'label' => esc_html__( 'Tags','podcaster-radio' ),
		'section' => 'podcaster_radio_post_settings'
    )));

    $wp_customize->add_setting( 'podcaster_radio_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'podcaster_radio_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'podcaster_radio_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','podcaster-radio' ),
		'section'     => 'podcaster_radio_post_settings',
		'type'        => 'range',
		'settings'    => 'podcaster_radio_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('podcaster_radio_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('podcaster_radio_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','podcaster-radio'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','podcaster-radio'),
		'section'=> 'podcaster_radio_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('podcaster_radio_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control('podcaster_radio_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','podcaster-radio'),
        'section' => 'podcaster_radio_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','podcaster-radio'),
            'Excerpt' => esc_html__('Excerpt','podcaster-radio'),
            'No Content' => esc_html__('No Content','podcaster-radio')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'podcaster_radio_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('podcaster_radio_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'podcaster_radio_Customize_partial_podcaster_radio_button_text', 
	));

    $wp_customize->add_setting('podcaster_radio_button_text',array(
		'default'=> esc_html__('Read More','podcaster-radio'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('podcaster_radio_button_text',array(
		'label'	=> esc_html__('Add Button Text','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'podcaster_radio_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'podcaster-radio' ),
		'panel' => 'podcaster_radio_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('podcaster_radio_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'podcaster_radio_Customize_partial_podcaster_radio_related_post_title', 
	));

    $wp_customize->add_setting( 'podcaster_radio_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ) );
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_related_post',array(
		'label' => esc_html__( 'Related Post','podcaster-radio' ),
		'section' => 'podcaster_radio_related_posts_settings'
    )));

    $wp_customize->add_setting('podcaster_radio_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('podcaster_radio_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('podcaster_radio_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'podcaster_radio_sanitize_number_absint'
	));
	$wp_customize->add_control('podcaster_radio_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('podcaster_radio_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','podcaster-radio'),
		'panel' => 'podcaster_radio_panel_id',
	));

    $wp_customize->add_setting( 'podcaster_radio_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','podcaster-radio' ),
      	'section' => 'podcaster_radio_responsive_media'
    )));

    $wp_customize->add_setting( 'podcaster_radio_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','podcaster-radio' ),
      	'section' => 'podcaster_radio_responsive_media'
    )));

    $wp_customize->add_setting( 'podcaster_radio_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','podcaster-radio' ),
      	'section' => 'podcaster_radio_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('podcaster_radio_footer',array(
		'title'	=> esc_html__('Footer Settings','podcaster-radio'),
		'panel' => 'podcaster_radio_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('podcaster_radio_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'podcaster_radio_Customize_partial_podcaster_radio_footer_text', 
	));
	
	$wp_customize->add_setting('podcaster_radio_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('podcaster_radio_footer_text',array(
		'label'	=> esc_html__('Copyright Text','podcaster-radio'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'podcaster-radio' ),
        ),
		'section'=> 'podcaster_radio_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('podcaster_radio_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control(new Podcaster_Radio_Image_Radio_Control($wp_customize, 'podcaster_radio_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','podcaster-radio'),
        'section' => 'podcaster_radio_footer',
        'settings' => 'podcaster_radio_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'podcaster_radio_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'podcaster_radio_switch_sanitization'
    ));  
    $wp_customize->add_control( new Podcaster_Radio_Toggle_Switch_Custom_Control( $wp_customize, 'podcaster_radio_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','podcaster-radio' ),
      	'section' => 'podcaster_radio_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('podcaster_radio_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'podcaster_radio_Customize_partial_podcaster_radio_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('podcaster_radio_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'podcaster_radio_sanitize_choices'
	));
	$wp_customize->add_control(new Podcaster_Radio_Image_Radio_Control($wp_customize, 'podcaster_radio_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','podcaster-radio'),
        'section' => 'podcaster_radio_footer',
        'settings' => 'podcaster_radio_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'podcaster_radio_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Podcaster_Radio_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Podcaster_Radio_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Podcaster_Radio_Customize_Section_Pro( $manager,'podcaster_radio_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Podcaster Radio PRO', 'podcaster-radio' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'podcaster-radio' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/radio-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'podcaster-radio-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'podcaster-radio-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Podcaster_Radio_Customize::get_instance();