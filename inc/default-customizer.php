<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */
get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');

/* Remove Default Theme Customizer Panels that aren't useful */
function pro_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
	
	$wp_customize->remove_section("title_tagline"); // Remove Title & Tagline Section
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section	
		
}
add_action( "customize_register", "pro_change_default_customizer_panels" );


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function progression_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'general_panel_progression', array(
		'priority'    => 10,
        'title'       => esc_html__( 'General', 'invested-progression' ),
    ) );
	
	/* Section - General - Logo */
	$wp_customize->add_section( 'section_logo_pro', array(
		'title'          => esc_html__( 'Logo', 'invested-progression' ),
		'panel'          => 'general_panel_progression', // Not typically needed.
		'priority'       => 10,
	) );
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_theme_logo', array(
		'section' => 'section_logo_pro',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('pro_theme_logo_width',array(
		'default' => '210',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'pro_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'invested-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		),
	) ) );
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_top',array(
		'default' => '30',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'invested-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('theme_logo_margin_bottom',array(
		'default' => '28',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'invested-progression' ),
		'section'  => 'section_logo_pro',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		),
	) ) );
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_theme_fav_icon' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_theme_fav_icon', array(
		'label'    => esc_html__( 'Favicon', 'invested-progression' ),
		'description'    => esc_html__( 'File must be .png or .ico format. Recommended Dimensions: 32px by 32px', 'invested-progression' ),
		'section' => 'section_logo_pro',
		'priority'   => 40,
		))
	);
	
	
	
	
	
	
	
	

	
	/* Section - General - Layout */
	$wp_customize->add_section( 'section_global_pro', array(
		'title'          => esc_html__( 'General Layout', 'invested-progression' ),
		'panel'          => 'general_panel_progression', // Not typically needed.
		'priority'       => 26,
	) );
	
	/* Setting - General - Layout */
	$wp_customize->add_setting( 'pro_site_layout_wide', array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'pro_site_layout_wide', array(
		'label'    => esc_html__( 'Site Layout', 'invested-progression' ),
		'section'  => 'section_global_pro',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'invested-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'invested-progression' ),
		),
	) ) );


	
	/* Section - General - Page Transitions */
	$wp_customize->add_section( 'section_page_transition_pro', array(
		'title'          => esc_html__( 'Page Loader', 'invested-progression' ),
		'panel'          => 'general_panel_progression', // Not typically needed.
		'priority'       => 26,
	) );

	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'pro_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'invested-progression' ),
		'section' => 'section_page_transition_pro',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'invested-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'invested-progression' ),
		),
		))
	);


	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_transition_loader' ,array(
		'default' => 'cube-grid-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'invested-progression' ),
		'section' => 'section_page_transition_pro',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'invested-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'invested-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'invested-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'invested-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'invested-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'invested-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'invested-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'invested-progression' ),
		
		 ),
		)
	);


	/* Setting - General - Page Transitions */
	$wp_customize->add_setting( 'pro_loading_text_new' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'pro_loading_text_new', array(
		'label'    => esc_html__( 'Optional Loading Text', 'invested-progression' ),
		'section' => 'section_page_transition_pro',
		'type' => 'text',
		'priority'   => 25,
		)
	);


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_page_loader_text', array(
		'default' => '#46afda',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'invested-progression' ),
		'section'  => 'section_page_transition_pro',
		'priority'   => 30,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_page_loader_bg', array(
		'default' => '#182343',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'invested-progression' ),
		'section'  => 'section_page_transition_pro',
		'priority'   => 35,
	) ) );
	
	
	
	

	
	/* Section - General - Custom CSS */
	$wp_customize->add_section( 'section_css_progression', array(
		'title'          => esc_html__( 'Custom CSS', 'invested-progression' ),
		'panel'          => 'general_panel_progression', // Not typically needed.
		'priority'       => 150,
	) );
	
	/* Setting - General - Custom CSS */
	$wp_customize->add_setting( 'custom_css_progression' ,array(
		'default' => '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'custom_css_progression', array(
		'description'          => esc_html__( 'Add-in any custom styles here', 'invested-progression' ),
		'section' => 'section_css_progression',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);
	


	
	/* Panel - Header */
	$wp_customize->add_panel( 'header_panel_pro', array(
		'priority'    => 14,
        'title'       => esc_html__( 'Header', 'invested-progression' ),
    ) );
	 
	 
	 
 	/* Section - General - Sticky Navigation */
 	$wp_customize->add_setting( 'fixed_menu_pro', array(
 		'default' => 'fixed-pro',
 		'sanitize_callback' => 'progression_sanitize_text',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'fixed_menu_pro', array(
 		'section'  => 'tt_font_pro-navigation-font',
 		'priority'   => 5,
 		'choices'     => array(
 			'fixed-pro' => esc_html__( 'Show Sticky Nav', 'invested-progression' ),
 			'not-fixed-pro' => esc_html__( 'Hide Sticky Nav', 'invested-progression' ),
 		),
 	) ) );
	
	 
	 		

	
		/* Section - Typography - Header/Navigation Fonts */
		$wp_customize->add_setting('nav_padding_top_bottom',array(
			'default' => '23',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'nav_padding_top_bottom', array(
			'label'    => esc_html__( 'Padding Top/Bottom', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting('nav_font_size_pro',array(
			'default' => '16',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'nav_font_size_pro', array(
			'label'    => esc_html__( 'Font Size', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting( 'nav_font_color_pro', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_font_color_pro', array(
			'label'    => esc_html__( 'Font Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 510,
		) ) );
		$wp_customize->add_setting( 'nav_hover_font_color_pro', array(
			'default' => '#182244',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_hover_font_color_pro', array(
			'label'    => esc_html__( 'Font Hover Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 515,
		) ) );
		
		$wp_customize->add_setting( 'nav_hover_bg_pro', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_hover_bg_pro', array(
			'label'    => esc_html__( 'Font Hover Background Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 520,
		) ) );
		
		
		/* Setting - Backgrounds - Header Background */
		$wp_customize->add_setting( 'nav_bg_color_pro', array(
			'default'	=> '#44aedb',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_color_pro', array(
			'default'	=> '#44aedb',
			'label'    => esc_html__( 'Navigation Background Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-navigation-font',
			'priority'   => 600,
			)
		) );
		
		
		
		
		
		
	
	
		/* Section - Typography - SUB Sub-Navigation Fonts */
		$wp_customize->add_setting('sub_nav_padding_top_bottom',array(
			'default' => '8',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'sub_nav_padding_top_bottom', array(
			'label'    => esc_html__( 'Padding Top/Bottom', 'invested-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 80,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting('sub_nav_font_size_pro',array(
			'default' => '12',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'sub_nav_font_size_pro', array(
			'label'    => esc_html__( 'Font Size', 'invested-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 505,
			'choices'     => array(
				'min'  => 0,
				'max'  => 40,
				'step' => 1
			),
		) ) );
		$wp_customize->add_setting( 'sub_nav_font_color_pro', array(
			'default' => '#858585',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sub_nav_font_color_pro', array(
			'label'    => esc_html__( 'Font Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 510,
		) ) );
		$wp_customize->add_setting( 'sub_nav_hover_font_color_pro', array(
			'default' => '#182244',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sub_nav_hover_font_color_pro', array(
			'label'    => esc_html__( 'Font Hover Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 515,
		) ) );
		

	
		/* Setting - Backgrounds - Header Background */
		$wp_customize->add_setting( 'sub_navigation_bg_color', array(
			'default'	=> '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'sub_navigation_bg_color', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__( 'Background Color', 'invested-progression' ),
			'section'  => 'tt_font_pro-sub-navigation-font',
			'priority'   => 600,
			)
		) );
	
	
	
	
	

	/* Section - Backgrounds - Header Background */
	$wp_customize->add_section( 'section_header_top_options', array(
		'title'          => esc_html__( 'Header Top', 'invested-progression' ),
		'panel'          => 'header_panel_pro', // Not typically needed.
		'priority'       => 30,
	) );



	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'top_header_bg_avlar', array(
		'default'	=> '',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'top_header_bg_avlar', array(
		'default'	=> '',
		'label'    => esc_html__( 'Top Header Background Color', 'invested-progression' ),
		'section'  => 'section_header_top_options',
		'priority'   => 10,
		)
	) );
		
	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'top_header_border_avlar', array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'top_header_border_avlar', array(
		'label'    => esc_html__( 'Top Header Border Bottom Color', 'invested-progression' ),
		'section'  => 'section_header_top_options',
		'priority'   => 20,
		)
	) );
		

	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'top_header_color_avlar', array(
		'default'	=> '#bbbbbb',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_header_color_avlar', array(
		'label'    => esc_html__( 'Top Header Color', 'invested-progression' ),
		'section'  => 'section_header_top_options',
		'priority'   => 30,
		)
	) );

			
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'top_header_color_hover_avlar', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_header_color_hover_avlar', array(
		'label'    => esc_html__( 'Top Header Hover Color', 'invested-progression' ),
		'section'  => 'section_header_top_options',
		'priority'   => 40,
		)
	) );


	
	

	/* Section - Backgrounds - Header Background */
	$wp_customize->add_section( 'section_header_bg_pro', array(
		'title'          => esc_html__( 'Header Background', 'invested-progression' ),
		'panel'          => 'header_panel_pro', // Not typically needed.
		'priority'       => 40,
	) );
	

	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_bg_color_pro', array(
		'default'	=> '#182244',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color_pro', array(
		'default'	=> '#182244',
		'label'    => esc_html__( 'Header Background Color', 'invested-progression' ),
		'section'  => 'section_header_bg_pro',
		'priority'   => 10,
		)
	) );

	
	
		
	
	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_img_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'header_img_bg_image_pro', array(
		'label'    => esc_html__( 'Header Background Image', 'invested-progression' ),
		'section' => 'section_header_bg_pro',
		'priority'   => 30,
		)
	) );
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'header_img_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'header_img_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'invested-progression' ),
		'section'  => 'section_header_bg_pro',
		'priority'   => 40,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'invested-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'invested-progression' ),
		),)
	) );	
		
	
	

		
		
	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'sidebar_bg_pro', array(
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_bg_pro', array(
	  		'label'    => esc_html__( 'Sidebar Background Color', 'invested-progression' ),
	  		'section'  => 'tt_font_pro-sidebar',
	  		'priority'   => 20,
	  		)
	  	) );
			

	

	
	

	/* Setting - General - Site Logo */
	$wp_customize->add_setting('pro_button_font_size',array(
		'default' => '15',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'pro_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size (px)', 'invested-progression' ),
		'section'  => 'tt_font_pro-buttons-default',
		'priority'   => 400,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	) ) );
	
  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_color_pro', array(
  		'default'	=> '#3b97bf',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_color_pro', array(
  		'label'    => esc_html__( 'Button Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 430,
  		)
  	) );
		

  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_background_pro', array(
  		'default'	=> '#46b7e4',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_background_pro', array(
  		'label'    => esc_html__( 'Button Secondary Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 440,
  		)
  	) );

  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'button_font_background_hover_pro', array(
  		'default'	=> '#182343',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_font_background_hover_pro', array(
  		'label'    => esc_html__( 'Button Third Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-buttons-default',
  		'priority'   => 450,
  		)
  	) );
		
	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'progression_newsletter_bg_field', array(
	  		'default'	=> '#182e47',
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_newsletter_bg_field', array(
	  		'label'    => esc_html__( 'Footer Newsletter Background Color', 'invested-progression' ),
	  		'section'  => 'tt_font_pro-buttons-default',
	  		'priority'   => 460,
	  		)
	  	) );





  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'blog_link_heading_color', array(
  		'default'	=> '#182244',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_link_heading_color', array(
  		'label'    => esc_html__( 'Blog Heading Link Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-blog-headings',
  		'priority'   => 500,
  		)
  	) );
	

  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'blog_link_heading_hover_color', array(
  		'default'	=> '#46b7e4',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_link_heading_hover_color', array(
  		'label'    => esc_html__( 'Blog Heading Link Hover Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-blog-headings',
  		'priority'   => 505,
  		)
  	) );		
	
	
	
	/* Panel - Typography */
	$wp_customize->add_panel( 'body_main_panel_pro', array(
		'priority'    => 20,
        'title'       => esc_html__( 'Body', 'invested-progression' ),
    ) );
	 
	 
  	/* Setting - Backgrounds - Body Background */
  	$wp_customize->add_setting( 'default_font_link_pro', array(
  		'default'	=> '#46b7e4',
  		'sanitize_callback' => 'progression_sanitize_text',
  	) );
  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'default_font_link_pro', array(
  		'label'    => esc_html__( 'Default Link Color', 'invested-progression' ),
  		'section'  => 'tt_font_pro-global',
  		'priority'   => 425,
  		)
  	) );
	 
	 
	  	/* Setting - Backgrounds - Body Background */
	  	$wp_customize->add_setting( 'default_hover_link_font_color_pro', array(
	  		'default'	=> '#182244',
	  		'sanitize_callback' => 'progression_sanitize_text',
	  	) );
	  	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'default_hover_link_font_color_pro', array(
	  		'label'    => esc_html__( 'Default Link Hover Color', 'invested-progression' ),
	  		'section'  => 'tt_font_pro-global',
	  		'priority'   => 425,
	  		)
	  	) );
	 
	 

	
	
 	/* Setting - Backgrounds - Body Background */
 	$wp_customize->add_setting( 'page_title_bg_pro', array(
 		'sanitize_callback' => 'progression_sanitize_text',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_title_bg_pro', array(
 		'label'    => esc_html__( 'Page Title Background Color', 'invested-progression' ),
 		'section'  => 'tt_font_pro-page-title-headings',
 		'priority'   => 425,
 		)
 	) );
		
	 	/* Setting - Backgrounds - Body Background */
	 	$wp_customize->add_setting( 'progression_page_title_border', array(
			'default'	=> '#e7e8ec',
	 		'sanitize_callback' => 'progression_sanitize_text',
	 	) );
	 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_page_title_border', array(
	 		'label'    => esc_html__( 'Page Title Border Color', 'invested-progression' ),
	 		'section'  => 'tt_font_pro-page-title-headings',
	 		'priority'   => 455,
	 		)
	 	) );

	
		
		
		

	
	

	
	/* Section - Backgrounds - Body Background */
	$wp_customize->add_section( 'section_body_pro', array(
		'title'          => esc_html__( 'Body Background', 'invested-progression' ),
		'panel'          => 'body_main_panel_pro', // Not typically needed.
		'priority'       => 200,
	) );
	
	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_color_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_bg_color_pro', array(
		'label'    => esc_html__( 'Background Color', 'invested-progression' ),
		'section'  => 'section_body_pro',
		'priority'   => 10,
		)
	) );
	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_image_pro' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'body_bg_image_pro', array(
		'label'    => esc_html__( 'Background Image', 'invested-progression' ),
		'section' => 'section_body_pro',
		'priority'   => 20,
		)
	) );
	/* Setting - Backgrounds - Body Background */
	$wp_customize->add_setting( 'body_bg_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'body_bg_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'invested-progression' ),
		'section'  => 'section_body_pro',
		'priority'   => 30,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'invested-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'invested-progression' ),
		),)
	) );
	
	
	
	/* Section - Backgrounds - Boxed Background */
	$wp_customize->add_section( 'section_boxed_pro', array(
		'title'          => esc_html__( 'Boxed Layout Background', 'invested-progression' ),
		'panel'          => 'body_main_panel_pro', // Not typically needed.
		'priority'       => 240,
	) );
	
	/* Setting - Backgrounds - Boxed Background */
	$wp_customize->add_setting( 'boxed_bg_color_pro', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'boxed_bg_color_pro', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Background Color', 'invested-progression' ),
		'section'  => 'section_boxed_pro',
		'priority'   => 10,
		)
	) );
	
		
	
		
		/* Panel - Typography */
		$wp_customize->add_panel( 'progression_portfolio_panel', array(
			'priority'    => 22,
	        'title'       => esc_html__( 'Portfolio/Team', 'invested-progression' ),
	    ) );
		 
		 
	 	/* Section - General - Footer */
	 	$wp_customize->add_section( 'progression_section_portfolio_layout', array(
	 		'title'          => esc_html__( 'Portfolio Layout', 'invested-progression' ),
	 		'panel'          => 'progression_portfolio_panel', // Not typically needed.
	 		'priority'       => 5,
	 	) );
		
		
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_portfolio_width', array(
			'default' => 'full-width-pro',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_portfolio_width', array(
			'label'    => esc_html__( 'Portfolio Width (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'priority'   => 10,
			'choices'     => array(
				'full-width-pro' => esc_html__( 'Full Width', 'invested-progression' ),
				'normal-width-pro' => esc_html__( 'Default Width', 'invested-progression' ),
			),
		) ) );
		
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_portfolio_padding', array(
			'default' => '0%',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( 'progression_portfolio_padding', array(
			'label'    => esc_html__( 'Portfolio Padding (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'type' => 'select',
			'priority'   => 25,
			'choices' => array(
	            '0' => '0%',	
					'1' => '1%',			
	            '2' => '2%',		
	            '3' => '3%',		
	            '4' => '4%',		
					'5' => '5%',
					'6' => '6%',
					'7' => '7%',
					'8' => '8%',
					'9' => '9%',
					'10' => '10%',
			
			 ),
		) );
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_portfolio_columns', array(
			'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_portfolio_columns', array(
			'label'    => esc_html__( 'Portfolio Columns (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'priority'   => 30,
			'choices'     => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
		) ) );
		
		
		/* Setting - General - Footer */
		$wp_customize->add_setting( 'progression_portfolio_per_page' ,array(
			'default' =>  '9',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( 'progression_portfolio_per_page', array(
			'label'          => esc_html__( 'Portfolio Posts Per Page (Archive)', 'invested-progression' ),
			'section' => 'progression_section_portfolio_layout',
			'type' => 'text',
			'priority'   => 50,
			)
	
		);
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_pagination_portfolio', array(
			'default' => 'default_paginatin_pro',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control( 'progression_pagination_portfolio', array(
			'label'    => esc_html__( 'Portfolio Pagination (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'type' => 'select',
			'priority'   => 52,
			'choices'     => array(
				'default_paginatin_pro' => esc_html__( 'Default Pagination', 'invested-progression' ),
				'load_more_pagination_pro' => esc_html__( 'Load More Posts', 'invested-progression' ),
				'infinite_scroll_pro' => esc_html__( 'Infinite Scroll', 'invested-progression' ),
			),
		) );
		
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_portfolio_title', array(
			'default' => 'default',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_portfolio_title', array(
			'label'    => esc_html__( 'Portfolio Title Hover (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'priority'   => 55,
			'choices'     => array(
				'default' => esc_html__( 'On Hover', 'invested-progression' ),
				'visible' => esc_html__( 'Always Visible', 'invested-progression' ),
				'hidden' => esc_html__( 'Hidden', 'invested-progression' ),
			),
		) ) );
		
		
		/* Setting - General - Scroll To Top */
		$wp_customize->add_setting( 'progression_portfolio_border', array(
			'default' => 'on',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_portfolio_border', array(
			'label'    => esc_html__( 'Portfolio Border (Archive)', 'invested-progression' ),
			'section'  => 'progression_section_portfolio_layout',
			'priority'   => 60,
			'choices'     => array(
				'on' => 'On',
				'off' => 'Off',
			),
		) ) );
		
		/* Setting - Backgrounds - Header Background */
		$wp_customize->add_setting( 'progression_portfolio_border_color', array(
			'default'	=> '#eeefef',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_portfolio_border_color', array(
			'default'	=> '#eeefef',
			'label'    => esc_html__( 'Portfolio Border Color', 'invested-progression' ),
			'section'  => 'tt_font_progression-portfolio-font',
			'priority'   => 565,
			)
		) );
			
			
			/* Setting - Backgrounds - Header Background */
			$wp_customize->add_setting( 'progression_portfolio_bg', array(
				'default'	=> '#ffffff',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_portfolio_bg', array(
				'default'	=> '#ffffff',
				'label'    => esc_html__( 'Portfolio Background Color', 'invested-progression' ),
				'section'  => 'tt_font_progression-portfolio-font',
				'priority'   => 580,
				)
			) );
				
				/* Setting - Backgrounds - Header Background */
				$wp_customize->add_setting( 'progression_portfolio_bg_hover', array(
					'default'	=> '#1b274d',
					'sanitize_callback' => 'progression_sanitize_text',
				) );
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_portfolio_bg_hover', array(
					'default'	=> '#1b274d',
					'label'    => esc_html__( 'Portfolio Hover Background', 'invested-progression' ),
					'section'  => 'tt_font_progression-portfolio-font',
					'priority'   => 580,
					)
				) );
		
		
		

 	/* Section - General - Footer */
 	$wp_customize->add_section( 'progression_section_team_layout', array(
 		'title'          => esc_html__( 'Team Layout', 'invested-progression' ),
 		'panel'          => 'progression_portfolio_panel', // Not typically needed.
 		'priority'       => 30,
 	) );
	

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'progression_team_width', array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_team_width', array(
		'label'    => esc_html__( 'Team Width (Archive)', 'invested-progression' ),
		'section'  => 'progression_section_team_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'invested-progression' ),
			'normal-width-pro' => esc_html__( 'Default Width', 'invested-progression' ),
		),
	) ) );	


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'progression_team_padding', array(
		'default' => '0',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_team_padding', array(
		'label'    => esc_html__( 'Team Padding (Archive)', 'invested-progression' ),
		'section'  => 'progression_section_team_layout',
		'type' => 'select',
		'priority'   => 25,
		'choices' => array(
            '0' => '0%',	
				'1' => '1%',			
            '2' => '2%',		
            '3' => '3%',		
            '4' => '4%',		
				'5' => '5%',
				'6' => '6%',
				'7' => '7%',
				'8' => '8%',
				'9' => '9%',
				'10' => '10%',
		
		 ),
	) );
	
	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'progression_team_columns', array(
		'default' => '4',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_team_columns', array(
		'label'    => esc_html__( 'Team Columns (Archive)', 'invested-progression' ),
		'section'  => 'progression_section_team_layout',
		'priority'   => 30,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );


	/* Setting - General - Footer */
	$wp_customize->add_setting( 'progression_team_per_page' ,array(
		'default' =>  '9',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_team_per_page', array(
		'label'          => esc_html__( 'Team Posts Per Page (Archive)', 'invested-progression' ),
		'section' => 'progression_section_team_layout',
		'type' => 'text',
		'priority'   => 50,
		)

	);
	
	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'progression_pagination_team', array(
		'default' => 'default_paginatin_pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'progression_pagination_team', array(
		'label'    => esc_html__( 'Team Pagination (Archive)', 'invested-progression' ),
		'section'  => 'progression_section_team_layout',
		'type' => 'select',
		'priority'   => 52,
		'choices'     => array(
			'default_paginatin_pro' => esc_html__( 'Default Pagination', 'invested-progression' ),
			'load_more_pagination_pro' => esc_html__( 'Load More Posts', 'invested-progression' ),
			'infinite_scroll_pro' => esc_html__( 'Infinite Scroll', 'invested-progression' ),
		),
	) );	
		  

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'progression_team_border', array(
		'default' => 'on',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_team_border', array(
		'label'    => esc_html__( 'Team Border (Archive)', 'invested-progression' ),
		'section'  => 'progression_section_team_layout',
		'priority'   => 60,
		'choices'     => array(
			'on' => 'On',
			'off' => 'Off',
		),
	) ) );
	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'progression_team_border_color', array(
		'default'	=> '#eeefef',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_team_border_color', array(
		'default'	=> '#eeefef',
		'label'    => esc_html__( 'Team Border Color', 'invested-progression' ),
		'section'  => 'tt_font_progression-team-font',
		'priority'   => 565,
		)
	) );
		
		
		/* Setting - Backgrounds - Header Background */
		$wp_customize->add_setting( 'progression_team_bg', array(
			'default'	=> '#ffffff',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_team_bg', array(
			'default'	=> '#ffffff',
			'label'    => esc_html__( 'Team Background Color', 'invested-progression' ),
			'section'  => 'tt_font_progression-team-font',
			'priority'   => 580,
			)
		) );
	
	
			/* Setting - General - Scroll To Top */
			$wp_customize->add_setting( 'progression_team_radius_image', array(
				'default' => 'circle',
				'sanitize_callback' => 'progression_sanitize_text',
			) );
			$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_team_radius_image', array(
				'label'    => esc_html__( 'Team Image Display', 'invested-progression' ),
				'section'  => 'tt_font_progression-team-font',
				'priority'   => 530,
				'choices'     => array(
					'circle' => esc_html__( 'Circle', 'invested-progression' ),
					'round' => esc_html__( 'Rounded', 'invested-progression' ),
					'square' => esc_html__( 'Square', 'invested-progression' ),
				),
			) ) );
	


	/* Panel - Footer */
	$wp_customize->add_panel( 'footer_panel_pro', array(
		'priority'    => 25,
        'title'       => esc_html__( 'Footer', 'invested-progression' ),
    ) );
	
	
	/* Section - General - Footer */
	$wp_customize->add_section( 'section_copyright_text_pro', array(
		'title'          => esc_html__( 'Footer General', 'invested-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 5,
	) );
	/* Setting - General - Footer */
	$wp_customize->add_setting( 'footer_copyright_progression' ,array(
		'default' =>  'Copyright - Invested WordPress Theme by Progression Studios',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( 'footer_copyright_progression', array(
		'label'          => esc_html__( 'Copyright Text', 'invested-progression' ),
		'section' => 'section_copyright_text_pro',
		'type' => 'textarea',
		'priority'   => 10,
		)
	
	);
	
	/* Section - Layout - Footer */
	$wp_customize->add_setting( 'pro_widget_count', array(
		'default' => 'footer-4-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'pro_widget_count', array(
		'label'    => esc_html__( 'Row 1 Widget Count', 'invested-progression' ),
		'section'  => 'section_copyright_text_pro',
		'priority'   => 20,
		'choices'     => array(
			'footer-1-pro' => esc_html__( '1', 'invested-progression' ),
			'footer-2-pro' => esc_html__( '2', 'invested-progression' ),
			'footer-3-pro' => esc_html__( '3', 'invested-progression' ),
			'footer-4-pro' => esc_html__( '4', 'invested-progression' ),
			'footer-5-pro' => esc_html__( '5', 'invested-progression' ),
		),
	) ) );
	
	/* Section - Layout - Footer */
	$wp_customize->add_setting( 'pro_widget_count_secondary', array(
		'default' => 'footer-3-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'pro_widget_count_secondary', array(
		'label'    => esc_html__( 'Row 2 Widget Count', 'invested-progression' ),
		'section'  => 'section_copyright_text_pro',
		'priority'   => 20,
		'choices'     => array(
			'footer-1-pro' => esc_html__( '1', 'invested-progression' ),
			'footer-2-pro' => esc_html__( '2', 'invested-progression' ),
			'footer-3-pro' => esc_html__( '3', 'invested-progression' ),
			'footer-4-pro' => esc_html__( '4', 'invested-progression' ),
			'footer-5-pro' => esc_html__( '5', 'invested-progression' ),
		),
	) ) );
	
	
	/* Section - Layout - Footer */
	$wp_customize->add_setting( 'progression_footer_full_width', array(
		'default' => 'progression-default',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_footer_full_width', array(
		'label'    => esc_html__( 'Footer Width', 'invested-progression' ),
		'section'  => 'section_copyright_text_pro',
		'priority'   => 30,
		'choices'     => array(
			'progression-default' => esc_html__( 'Default', 'invested-progression' ),
			'progression-full-width' => esc_html__( 'Full Width', 'invested-progression' ),
		),
	) ) );
	
	
	
	/* Section - General - Scroll To Top */
	$wp_customize->add_section( 'section_scroll_pro', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'invested-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 500,
	) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'invested-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'invested-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'invested-progression' ),
		),
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_scroll_color', array(
		'label'    => esc_html__( 'Color', 'invested-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 15,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_bg_color', array(
		'default' => 'rgba(0,0,0,  0.3)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'pro_scroll_bg_color', array(
		'label'    => esc_html__( 'Background', 'invested-progression' ),
		'default' => 'rgba(0,0,0,  0.3)',
		'section'  => 'section_scroll_pro',
		'priority'   => 20,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_border_color', array(
		'default' => 'rgba(255,255,255,  0.2)',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'pro_scroll_border_color', array(
		'label'    => esc_html__( 'Border', 'invested-progression' ),
		'default' => 'rgba(255,255,255,  0.2))',
		'section'  => 'section_scroll_pro',
		'priority'   => 25,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pro_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Color', 'invested-progression' ),
		'section'  => 'section_scroll_pro',
		'priority'   => 30,
	) ) );


	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_bg_color', array(
		'default' => '#41aad4',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'pro_scroll_hvr_bg_color', array(
		'label'    => esc_html__( 'Hover Background', 'invested-progression' ),
		'default' => '#5ac763',
		'section'  => 'section_scroll_pro',
		'priority'   => 40,
	) ) );

	/* Setting - General - Scroll To Top */
	$wp_customize->add_setting( 'pro_scroll_hvr_border_color', array(
		'default' => '#41aad4',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'pro_scroll_hvr_border_color', array(
		'label'    => esc_html__( 'Border', 'invested-progression' ),
		'default' => '#5ac763',
		'section'  => 'section_scroll_pro',
		'priority'   => 50,
	) ) );
	
	
	
	/* Section - Backgrounds - Footer Background */
	$wp_customize->add_section( 'section_footer_bg_pro', array(
		'title'          => esc_html__( 'Footer Background', 'invested-progression' ),
		'panel'          => 'footer_panel_pro', // Not typically needed.
		'priority'       => 40,
	) );
	

	$wp_customize->add_setting( 'progression_footer_bg_color', array(
		'default'	=> '#10162c',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_footer_bg_color', array(
		'label'    => esc_html__( 'Footer Background Color', 'invested-progression' ),
		'section'  => 'section_footer_bg_pro',
		'priority'   => 500,
		)
	) 
	);
	
	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'progression_bg_image_footer' ,array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_bg_image_footer', array(
		'label'    => esc_html__( 'Header Background Image', 'invested-progression' ),
		'section' => 'section_footer_bg_pro',
		'priority'   => 510,
		)
	) );
	
	
	/* Setting - Backgrounds - Header Background */
	$wp_customize->add_setting( 'progression_bg_image_footer_cover_pro', array(
		'default' => 'cover-pro',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_bg_image_footer_cover_pro', array(
		'label'    => esc_html__( 'Background Cover or Pattern', 'invested-progression' ),
		'section'  => 'section_footer_bg_pro',
		'priority'   => 520,
		'choices'     => array(
			'cover-pro' => esc_html__( 'Cover', 'invested-progression' ),
			'pattern-pro' => esc_html__( 'Pattern', 'invested-progression' ),
		),)
	) );	
	
	
		$wp_customize->add_setting( 'progression_footer_border_color', array(
			'default'	=> 'rgba(255, 255, 255,  0.1)',
			'sanitize_callback' => 'progression_sanitize_text',
		) );
		$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_footer_border_color', array(
			'label'    => esc_html__( 'Footer Border color', 'invested-progression' ),
			'default' => 'rgba(255, 255, 255,  0.1)',
			'section'  => 'section_footer_bg_pro',
			'priority'   => 540,
		) ) );
		
	
	$wp_customize->add_setting( 'progressions_copyright_bg_color', array(
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progressions_copyright_bg_color', array(
		'label'    => esc_html__( 'Copyright Background Color', 'invested-progression' ),
		'section'  => 'section_footer_bg_pro',
		'priority'   => 550,
		)
	) 
	);
		
		

		

	$wp_customize->add_setting( 'progression_footer_font_link', array(
		'default'	=> '#398eb6',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_footer_font_link', array(
		'label'    => esc_html__( 'Footer Link Color', 'invested-progression' ),
		'section'  => 'tt_font_pro-footer-font',
		'priority'   => 500,
		)
	) );
	
	
	$wp_customize->add_setting( 'progression_footer_font_link_hover', array(
		'default'	=> '#46b7e4',
		'sanitize_callback' => 'progression_sanitize_text',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_footer_font_link_hover', array(
		'label'    => esc_html__( 'Footer Link Hover Color', 'invested-progression' ),
		'section'  => 'tt_font_pro-footer-font',
		'priority'   => 510,
		)
	) );
	
	
			
	

}
add_action( 'customize_register', 'progression_customizer' );



/* Sanitize Text */
function progression_sanitize_text( $input ) {
    return wp_kses( $input, TRUE);
}


/* Sanitize Code */
function progression_sanitize_code( $input ) {
   return wp_kses(  $input, 
	array(
      'div' => array(
          'id' => array(),
  		  'class' => array(),
        'style' => array(),
      ),
      'form' => array(
			'action' => array(),
          'method' => array(),
          'id' => array(),
  		  'name' => array(),
  		  'class' => array(),
  		  'target' => array(),
      ),
    'input' => array(
        'value' => array(),
        'placeholder' => array(),
		  'type' => array(),
		  'name' => array(),
		  'class' => array(),
		  'id' => array(),
		  'tabindex' => array(),
    ),
	    'a' => array(
	        'href' => array(),
	        'title' => array()
	    ),
		 
	    'br' => array(),
	    'em' => array(),
		 'strong' => array(),
	) );
}



function progression_customize_js()
{
    ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		
		<?php if (get_theme_mod( 'pro_page_transition', 'transition-off-pro') == "transition-on-pro") : ?>
		(function($) {
			var didDone = false;
			    function done() {
			        if(!didDone) {
			            didDone = true;
						$("#page-loader-pro").addClass('finished-loading');
						$("#page-loader-pro").fadeOut(1000);
			        }
			    }
			    var loaded = false;
			    var minDone = false;
			    //The minimum timeout.
			    setTimeout(function(){
			        minDone = true;
			        //If loaded, fire the done callback.
			        if(loaded)  {  done(); } }, 200);
			    //The maximum timeout.
			    setTimeout(function(){  done();   }, 2500);
			    //Bind the load listener.
			    $(window).load(function(){  loaded = true;
			        if(minDone) { done(); }
			    });
		})(jQuery);
		<?php endif ?>
		
	});
	</script>
    <?php
}
add_action('wp_footer', 'progression_customize_js');


function progression_customize_css()
{
    ?>
<?php if (get_theme_mod( 'progression_theme_fav_icon' )) : ?><link rel="icon"  href="<?php echo esc_attr(get_theme_mod( 'progression_theme_fav_icon')); ?>"><?php endif; ?>
<style type="text/css">
	<?php if (get_theme_mod( 'custom_css_progression')) : ?><?php echo esc_attr(get_theme_mod('custom_css_progression')); ?><?php endif ?>
	body #logo-pro, body #logo-pro img {max-width:<?php echo esc_attr( get_theme_mod('pro_theme_logo_width', '210') ); ?>px;}
	header#masthead-pro h1#logo-pro a { padding-top:<?php echo esc_attr(get_theme_mod('theme_logo_margin_top', '30')); ?>px; padding-bottom:<?php echo esc_attr(get_theme_mod('theme_logo_margin_bottom', '30')); ?>px; }
	.invested_header_transparent header#masthead-pro h1#logo-pro a {padding-bottom:<?php echo esc_attr(get_theme_mod('theme_logo_margin_bottom', '30') - 15); ?>px; }
	
	.portfolio-container-progression { border-color:<?php echo esc_attr(get_theme_mod('progression_portfolio_border_color', '#eeefef')); ?>;	background:<?php echo esc_attr(get_theme_mod('progression_portfolio_bg', '#ffffff')); ?>;}
	
	.invested-team-border { border-color:<?php echo esc_attr(get_theme_mod('progression_team_border_color', '#eeefef')); ?>;	background:<?php echo esc_attr(get_theme_mod('progression_team_bg', '#ffffff')); ?>;}
	
	<?php if (get_theme_mod( 'progression_team_border') == 'off') : ?>
	.invested-team-border { border:none; margin-right:0px; margin-bottom:0px;	}
	.width-container-pro-full-team { margin-right:0px; }
	<?php endif ?>
	
	<?php if (get_theme_mod( 'progression_portfolio_border') == 'off') : ?>
	.portfolio-container-progression { border:none; margin-right:0px; margin-bottom:0px;	}
	.width-container-pro-full { margin-right:0px; }
	<?php endif ?>
	
	header#masthead-pro {background:	<?php echo esc_attr(get_theme_mod('header_bg_color_pro', '#182244') ); ?>; <?php if (get_theme_mod( 'header_img_bg_image_pro')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'header_img_bg_image_pro' )); ?>"); <?php if (get_theme_mod( 'header_img_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>}	

	<?php if ( get_theme_mod( 'top_header_bg_avlar')) : ?>#header-top-avlar, body .header-top-right-avlar .sf-menu ul {background:<?php echo esc_attr(get_theme_mod( 'top_header_bg_avlar' )); ?>;}<?php endif; ?>
	<?php if ( get_theme_mod( 'top_header_border_avlar')) : ?>#header-top-avlar {border:1px solid <?php echo esc_attr(get_theme_mod('top_header_border_avlar')); ?>;}<?php endif; ?>
	#header-top-avlar, #header-top-avlar a { color:<?php echo esc_attr(get_theme_mod('top_header_color_avlar', '#bbbbbb')); ?>; }
	#header-top-avlar h6, #header-top-avlar a:hover { color:<?php echo esc_attr(get_theme_mod('top_header_color_hover_avlar', '#ffffff')); ?>; }
	#header-top-avlar, #header-top-avlar h6, body #header-top-avlar .header-top-right-avlar .sf-menu li a {font-size:<?php echo esc_attr(get_theme_mod('avlar_font_size_top_header_left', '13')); ?>px;}
	
	#pro-scroll-top { color:<?php echo esc_attr(get_theme_mod('pro_scroll_color', '#ffffff')); ?>; background: <?php echo esc_attr(get_theme_mod('pro_scroll_bg_color', 'rgba(0,0,0,  0.3)')); ?>; border-top:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; border-left:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; border-right:1px solid <?php echo esc_attr(get_theme_mod('pro_scroll_border_color', 'rgba(255,255,255,  0.2)')); ?>; }
	#pro-scroll-top:hover {  background: <?php echo esc_attr(get_theme_mod('pro_scroll_hvr_bg_color', '#41aad4')); ?>; border-color:<?php echo esc_attr(get_theme_mod('pro_scroll_hvr_border_color', '#41aad4')); ?>; }
	<?php if (get_theme_mod( 'pro_scroll_top') == "scroll-off-pro") : ?>a#pro-scroll-top {display:none;}<?php endif ?>
	
	#widget-area-qube-secondary .width-container-pro {border-color:<?php echo esc_attr(get_theme_mod('progression_footer_border_color', 'rgba(255, 255, 255,  0.1)')); ?>;}
	
	
	.invested-portfolio-index-hover:before {	border-bottom: 8px solid <?php echo esc_attr(get_theme_mod('progression_portfolio_bg_hover', '#1b274d')); ?>;}
	.invested-portfolio-index-hover { background:<?php echo esc_attr(get_theme_mod('progression_portfolio_bg_hover', '#1b274d')); ?>;}
	
	<?php if (get_theme_mod( 'sidebar_bg_pro')) : ?>#sidebar {background:<?php echo esc_attr(get_theme_mod('sidebar_bg_pro')); ?>;}<?php endif ?>

	@media only screen and (max-width: 959px) {
		body .invested_header_transparent header#masthead-pro,
		body .invested_header_transparent_logo header#masthead-pro,
		body .invested_header_footer header#masthead-pro {
			position:relative ;
			background:<?php echo esc_attr(get_theme_mod('header_bg_color_pro', '#182244') ); ?>;
		}
		body .invested_header_transparent header#masthead-pro #navigation-background-pro,
		body .invested_header_transparent_logo header#masthead-pro #navigation-background-pro,
		body .invested_header_footer header#masthead-pro #navigation-background-pro {
			background-color:<?php echo esc_attr(get_theme_mod('nav_bg_color_pro', '#44aedb')); ?>;
		}

	}
	.invested_header_transparent .scroll-to-fixed-fixed #navigation-background-pro, .sf-menu a, #navigation-background-pro {
		background-color:<?php echo esc_attr(get_theme_mod('nav_bg_color_pro', '#44aedb')); ?>;
	}

	.sf-menu a {
		color:<?php echo esc_attr(get_theme_mod('nav_font_color_pro', '#ffffff')); ?>;
		font-size:<?php echo esc_attr(get_theme_mod('nav_font_size_pro', '16')); ?>px; 
		padding-top:<?php echo esc_attr(get_theme_mod('nav_padding_top_bottom', '23')); ?>px;
		padding-bottom:<?php echo esc_attr(get_theme_mod('nav_padding_top_bottom', '23')); ?>px;
	}
	.scroll-to-fixed-fixed .sf-menu li:after, .scroll-to-fixed-fixed .sf-menu li.current-menu-item a, .scroll-to-fixed-fixed .sf-menu a:hover, .scroll-to-fixed-fixed .sf-menu li.sfHover a,
	.sf-menu li:after, .sf-menu li.current-menu-item a, .sf-menu a:hover, .sf-menu li.sfHover a {
		color:<?php echo esc_attr(get_theme_mod('nav_hover_font_color_pro', '#182244') ); ?>;
	}
	
	body #header-top-avlar .header-top-right-avlar .sf-menu li li a:hover,
	.sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a  {
		color:<?php echo esc_attr(get_theme_mod('nav_hover_font_color_pro', '#182244') ); ?>;
	}
	.invested_header_transparent .scroll-to-fixed-fixed .invested_nav_dark .sf-menu li:after,
	.invested_header_transparent .scroll-to-fixed-fixed .sf-menu li:after, .invested_header_transparent .scroll-to-fixed-fixed .sf-menu li.current-menu-item a,  .invested_header_transparent .scroll-to-fixed-fixed .sf-menu a:hover, .invested_header_transparent .scroll-to-fixed-fixed .sf-menu li.sfHover a,
	.scroll-to-fixed-fixed .sf-menu li:after, .scroll-to-fixed-fixed .sf-menu li.current-menu-item a, .scroll-to-fixed-fixed .sf-menu a:hover, .scroll-to-fixed-fixed .sf-menu li.sfHover a,
	.sf-menu li:after, .sf-menu li.current-menu-item a, .sf-menu a:hover, .sf-menu li.sfHover a {
		background:<?php echo esc_attr(get_theme_mod('nav_hover_bg_pro', '#ffffff') ); ?>;
	}
	.sf-menu li li a {
		font-size:<?php echo esc_attr(get_theme_mod('sub_nav_font_size_pro', '12') ); ?>px;
		padding-top:<?php echo esc_attr(get_theme_mod('sub_nav_padding_top_bottom', '8') ); ?>px; padding-bottom:<?php echo esc_attr(get_theme_mod('sub_nav_padding_top_bottom', '8') ); ?>px;
	}
	.sf-menu ul { background:<?php echo esc_attr(get_theme_mod('sub_navigation_bg_color', '#ffffff') ); ?>;}
	.scroll-to-fixed-fixed .sf-menu li.sfHover li a,
	.invested_nav_dark .sf-menu li.sfHover li a,
	.invested_nav_dark .sf-menu li.sfHover li.sfHover li a,
	.invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li a,
	.invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.invested_nav_light .sf-menu li.sfHover li a,
	.invested_nav_light .sf-menu li.sfHover li.sfHover li a,
	.invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li a,
	.invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a,
	body #header-top-avlar .header-top-right-avlar .sf-menu li li a,
	.sf-menu li.sfHover li a,
	.sf-menu li.sfHover li.sfHover li a,
	.sf-menu li.sfHover li.sfHover li.sfHover li a,
	.sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a,
	.sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:<?php echo esc_attr(get_theme_mod('sub_nav_font_color_pro', '#858585') ); ?>;
	}

	.invested_nav_dark .sf-menu li.sfHover li a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover a,
	.invested_nav_dark .sf-menu li.sfHover li li a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover a,
	.invested_nav_dark .sf-menu li.sfHover li li li a:hover,.invested_nav_dark  .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.invested_nav_dark .sf-menu li.sfHover li li li li a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, 
	.invested_nav_dark .sf-menu li.sfHover li li li li li a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_dark .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,


	.invested_nav_light .sf-menu li.sfHover li a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover a,
	.invested_nav_light .sf-menu li.sfHover li li a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover a,
	.invested_nav_light .sf-menu li.sfHover li li li a:hover,.invested_nav_light  .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.invested_nav_light .sf-menu li.sfHover li li li li a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, 
	.invested_nav_light .sf-menu li.sfHover li li li li li a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .invested_nav_light .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,

	body #header-top-avlar .header-top-right-avlar .sf-menu li li a:hover,
	.sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a,
	.sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a  {
		color:<?php echo esc_attr(get_theme_mod('sub_nav_hover_font_color_pro', '#182244') ); ?>;
	}
	body .cat-meta-pro a { border-color:<?php echo esc_attr(get_theme_mod('default_font_link_pro', '#46b7e4')); ?>;}
	
	a.more-link i, body blockquote { border-color:<?php echo esc_attr(get_theme_mod('default_font_link_pro', '#46b7e4')); ?>; }	
	
	body ul.filter-button-group li.is-checked, body ul.filter-button-group li:hover,
	a, h1.vc_custom_heading a:hover, h2.vc_custom_heading a:hover, h3.vc_custom_heading a:hover, h4.vc_custom_heading a:hover, h5.vc_custom_heading a:hover, h6.vc_custom_heading a:hover, .cat-meta-pro a, .post-container-pro h2.blog-title-pro a:hover { color:<?php echo esc_attr(get_theme_mod('default_font_link_pro', '#46b7e4')); ?>;}
	
	
	body ul.filter-button-group li,
	a:hover, ul#breadcrumbs-pro, ul#breadcrumbs-pro a:hover, .cat-meta-pro a:hover  { color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#182244')); ?>;	 }
	.page-nav-pro a span,.page-nav-pro a, ul.page-numbers li a, ul.page-numbers li .current, ul.page-numbers li a:hover { color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#182244')); ?>;	border-color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#182244')); ?>; }
	.cat-meta-pro a  { border-color:<?php echo esc_attr(get_theme_mod('default_hover_link_font_color_pro', '#182244')); ?>; }
	
	footer#site-footer a.progression-button, a.progression-button {
		font-size:<?php echo esc_attr(get_theme_mod('pro_button_font_size', '15')); ?>px;
		color:<?php echo esc_attr(get_theme_mod('button_font_color_pro', '#3b97bf')); ?>;
		border-color: <?php echo esc_attr(get_theme_mod('button_font_color_pro', '#3b97bf')); ?>;
	}
	footer#site-footer a.progression-button:hover,
	a.progression-button:hover {
		background:<?php echo esc_attr(get_theme_mod('button_font_color_pro', '#3b97bf')); ?>;
		color:#ffffff;
	}

	#invested-container-content-single a.progression-button {
		background:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
		border-color:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
		color:#ffffff;
	}
	
	
	#invested-container-content-single a.progression-button:hover {
		background:<?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#182343')); ?>;
		border-color:<?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#182343')); ?>;
		color:#ffffff;
	}

	.search-form input.search-submit, .comment-form input.submit, .wpcf7-form input.wpcf7-submit {
		font-size:<?php echo esc_attr(get_theme_mod('pro_button_font_size', '15') + 1); ?>px;
		background:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
	}

	
	body {background-color:<?php echo esc_attr(get_theme_mod('body_bg_color_pro', '#ffffff')); ?>; 
	<?php if (get_theme_mod( 'body_bg_image_pro')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'body_bg_image_pro' )); ?>"); <?php if (get_theme_mod( 'body_bg_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>}
	
	.mc4wp-form .mc4wp-form-fields { background:<?php echo esc_attr(get_theme_mod('progression_newsletter_bg_field', '#182e47')); ?>; }
	
	.mc4wp-form input[type="submit"] {
		background:<?php echo esc_attr(get_theme_mod('button_font_color_pro', '#3b97bf')); ?>;
		color:<?php echo esc_attr(get_theme_mod('progression_footer_bg_color', '#10162c')); ?>;
	}

	#sidebar .mc4wp-form input[type="submit"],
	#sidebar .social-ico a {
		background:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
	}
	#sidebar .tagcloud a, #site-footer .tagcloud a, .post-password-form input[type=submit] {
		background:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
		border:2px solid <?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>;
	}

	#sidebar .mc4wp-form input[type="submit"]:hover,
	#sidebar .tagcloud a:hover, #site-footer .tagcloud a:hover,
	.search-form input.search-submit:hover,
	.comment-navigation a:hover,
	.post-password-form input[type=submit]:hover,
	.comment-form input.submit:hover,
	.wpcf7-form input.wpcf7-submit:hover {
		background:<?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#182343')); ?>;
		border-color:<?php echo esc_attr(get_theme_mod('button_font_background_hover_pro', '#182343')); ?>;
	}

	.search-form input.search-field:focus,
	.post-password-form input[type=password]:focus,
	.comment-form input:focus, .comment-form textarea:focus,
	.wpcf7-form input:focus, .wpcf7-form textarea:focus {
		border-color:<?php echo esc_attr(get_theme_mod('button_font_background_pro', '#46b7e4')); ?>; 
	}
	.post-container-pro h2.blog-title-pro a {color:<?php echo esc_attr(get_theme_mod('blog_link_heading_color', '#182244')); ?>;	}
	.post-container-pro h2.blog-title-pro a:hover {color:<?php echo esc_attr(get_theme_mod('blog_link_heading_hover_color', '#46b7e4')); ?>;}
	footer#site-footer a { color:<?php echo esc_attr(get_theme_mod('progression_footer_font_link', '#398eb6')); ?>; }
	footer#site-footer a:hover {color:<?php echo esc_attr(get_theme_mod('progression_footer_font_link_hover', '#46b7e4')); ?>;}
	
	#page-title-pro ul#breadcrumbs-pro {border-color: <?php echo esc_attr(get_theme_mod('progression_page_title_border', '#e7e8ec')); ?>;}
	
	<?php if (get_theme_mod( 'page_title_bg_pro')) : ?>#page-title-pro {background-color:<?php echo esc_attr(get_theme_mod('page_title_bg_pro')); ?>;}<?php endif ?>
	footer#site-footer { background-color:<?php echo esc_attr(get_theme_mod('progression_footer_bg_color', '#10162c')); ?>; 
<?php if (get_theme_mod( 'progression_bg_image_footer')) : ?>background-image:url("<?php echo esc_attr(get_theme_mod( 'progression_bg_image_footer' )); ?>"); <?php if (get_theme_mod( 'progression_bg_image_footer_cover_pro', 'cover-pro') == "cover-pro") : ?>background-position: center center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;<?php else: ?>background-repeat:repeat-all;<?php endif ?><?php endif ?>
}
	<?php if (get_theme_mod( 'progressions_copyright_bg_color')) : ?>footer#site-footer #copyright-pro { background-color:<?php echo esc_attr(get_theme_mod('progressions_copyright_bg_color')); ?>; }<?php endif ?>
	
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{background-color:<?php echo esc_attr(get_theme_mod('pro_page_loader_text', '#46afda')); ?>;}
	#page-loader-pro { background:<?php echo esc_attr(get_theme_mod('pro_page_loader_bg', '#182343')); ?>; color:<?php echo esc_attr(get_theme_mod('pro_page_loader_text', '#46afda')); ?>; }
	<?php if ( get_theme_mod( 'pro_site_layout_wide') == 'boxed-pro') : ?>
	#boxed-layout-pro {
		margin-top:25px;
		position:relative;
		width:1200px;
		margin-left:auto; margin-right:auto; 
		background:<?php echo esc_attr(get_theme_mod('boxed_bg_color_pro', '#f7f8f8')); ?>;-moz-box-shadow:0px 0px 15px rgba(0, 0, 0, 0.05); -webkit-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05); box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);
	}
	#boxed-layout-pro .width-container-pro {width:90%;}
	@media only screen and (min-width: 960px) and (max-width: 1300px) { body #boxed-layout-pro {width:92%;} }
	<?php endif; ?>
</style>
    <?php
}
add_action('wp_head', 'progression_customize_css');