<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function pro_add_tab_to_panel( $tabs ) {

    // Do this for each tab you want to create.
    // Make sure the array index matches the
    // 'name' array property.
    $tabs['pro-global'] = array(
        'name'        => 'pro-global',
        'panel'       => 'body_main_panel_pro',
        'title'       => esc_html__('Body Typography', 'invested-progression'),
        'description' => '',
        'sections'    => array(),
    );
	 
	 
 	//Default Headings
     $tabs['pro-default-headings'] = array(
         'name'        => 'pro-default-headings',
         'panel'       => 'body_main_panel_pro',
         'title'       => esc_html__('Headings', 'invested-progression'),
         'description' => '',
         'sections'    => array(),
     );
	 
  	//Default Headings
      $tabs['pro-page-title-headings'] = array(
          'name'        => 'pro-page-title-headings',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Page Title', 'invested-progression'),
          'description' => '',
          'sections'    => array(),
      );
		
		
      $tabs['pro-sidebar'] = array(
          'name'        => 'pro-sidebar',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Sidebar', 'invested-progression'),
          'description' => '',
          'sections'    => array(),
      );
		
		
		
      $tabs['pro-buttons-default'] = array(
          'name'        => 'pro-buttons-default',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Buttons', 'invested-progression'),
          'description' => '',
          'sections'    => array(),
      );
		
		
      $tabs['pro-blog-headings'] = array(
          'name'        => 'pro-blog-headings',
          'panel'       => 'body_main_panel_pro',
          'title'       => esc_html__('Blog Typography', 'invested-progression'),
          'description' => '',
          'sections'    => array(),
      );
		
	
	 
 	//Navigation
     $tabs['pro-navigation-font'] = array(
         'name'        => 'pro-navigation-font',
         'panel'       => 'header_panel_pro',
         'title'       => esc_html__('Navigation', 'invested-progression'),
         'description' => '',
         'sections'    => array(),
     );
	  
	  
  	//Sub-Navigation
      $tabs['pro-sub-navigation-font'] = array(
          'name'        => 'pro-sub-navigation-font',
          'panel'       => 'header_panel_pro',
          'title'       => esc_html__('Sub-Navigation', 'invested-progression'),
          'description' => '',
          'sections'    => array(),
      );
	


		//Footer
	    $tabs['pro-footer-font'] = array(
	        'name'        => 'pro-footer-font',
	        'panel'       => 'footer_panel_pro',
	        'title'       => esc_html__('Footer Typography', 'invested-progression'),
	        'description' => '',
	        'sections'    => array(),
	    );
		 
		 
		 
	    $tabs['progression-portfolio-font'] = array(
	        'name'        => 'progression-portfolio-font',
	        'panel'       => 'progression_portfolio_panel',
	        'title'       => esc_html__('Portfolio Styling', 'invested-progression'),
	        'description' => '',
	        'sections'    => array(),
	    );
		 
	    $tabs['progression-team-font'] = array(
	        'name'        => 'progression-team-font',
	        'panel'       => 'progression_portfolio_panel',
	        'title'       => esc_html__('Team Styling', 'invested-progression'),
	        'description' => '',
	        'sections'    => array(),
	    );
		 


    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'pro_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function pro_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
 	/* Body Fonts */
   
   $controls['pro_body_font'] = array(
       'name'       => 'pro_body_font',
		'type'        => 'font',
       'title'      =>  esc_html__('Body Font', 'invested-progression'),
       'tab'        => 'pro-global',
       'properties' => array( 'selector'   => 'body,  body input, body textarea' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'lato',
			'font_name'                  => 'Lato',
			'font_weight_style'          => 'regular',
			'font_color'                 => '#8b8b8b',
			'line_height'                => '1.65',
			'font_size'                  => array( 'amount' => '16', 'unit' => 'px' )
		),
   );
	
	
   $controls['pro_heading_1'] = array(
       'name'       => 'pro_heading_1',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 1', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h1' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.2',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '28', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
   $controls['pro_heading_2'] = array(
       'name'       => 'pro_heading_2',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 2', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h2' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.4',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '24', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
   $controls['pro_heading_3'] = array(
       'name'       => 'pro_heading_3',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 3', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h3' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.4',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '22', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
   $controls['pro_heading_4'] = array(
       'name'       => 'pro_heading_4',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 4', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h4, h3#reply-title' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.4',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '20', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
	
   $controls['pro_heading_5'] = array(
       'name'       => 'pro_heading_5',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 5', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h5' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.4',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
   $controls['pro_heading_6'] = array(
       'name'       => 'pro_heading_6',
	'type'        => 'font',
       'title'      =>  esc_html__('Heading 6', 'invested-progression'),
       'tab'        => 'pro-default-headings',
       'properties' => array( 'selector'   => 'h6' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'line_height'                => '1.4',
			'text_decoration'            => 'none',
			'text_transform'             => 'none',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
			'letter_spacing'             => array( 'amount' => '0', 'unit' => 'px' ),
			'margin_bottom'              => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
	
	
   $controls['progression_second_body_font'] = array(
       'name'       => 'progression_second_body_font',
		'type'        => 'font',
       'title'      =>  esc_html__('Secondary Font', 'invested-progression'),
       'tab'        => 'pro-global',
       'properties' => array( 'selector'   => '#infinite-nav-pro a, body ul.filter-button-group, .invested-excerpt-team,
.vc_btn3-style-custom, ul.progressoin-portfolio-tax,
.comment-navigation, .search-form input.search-submit, #sidebar .tagcloud a, #site-footer .tagcloud a,
.comment-form input.submit, .page-nav-pro, .post-password-form input[type=submit],
ul.page-numbers li a, ul.page-numbers li .current, ul.page-numbers li a:hover,
a.progression-button, .mc4wp-form input[type="submit"], .rev_slider h1, #breadcrumbs-pro, body h6, .wpcf7-form input.wpcf7-submit, .cat-meta-pro, .post-meta-pro, a.more-link' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'unica_one',
			'font_name'                  => 'Unica One',
			'font_weight_style'          => '400',
		),
   );
	
	
   $controls['pro_main_nav_font'] = array(
       'name'       => 'pro_main_nav_font',
		 'type'        => 'font',
       'title'      =>  esc_html__('Navigation Font Family', 'invested-progression'),
       'tab'        => 'pro-navigation-font',
       'properties' => array( 'selector'   => '#header-top-avlar .sf-menu, nav#site-navigation' ),
		 'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'unica_one',
			'font_name'                  => 'Unica One',
			'font_weight_style'          => '400',
		),
   );
	
   $controls['pro_sub_navigation_font_family'] = array(
       'name'       => 'pro_sub_navigation_font_family',
	'type'        => 'font',
       'title'      =>  esc_html__('Sub-Navigation Font Family', 'invested-progression'),
       'tab'        => 'pro-sub-navigation-font',
       'properties' => array( 'selector'   => '.sf-menu li li a' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_id'                    => 'lato',
			'font_name'                  => 'Lato',
			'font_weight_style'          => 'regular',
		),
   );
	
	
   $controls['pro_mega_menu_heading2'] = array(
       'name'       => 'pro_mega_menu_heading2',
	'type'        => 'font',
       'title'      =>  esc_html__('Mega Menu Heading', 'invested-progression'),
       'tab'        => 'pro-sub-navigation-font',
       'properties' => array( 'selector'   => 'body header .invested_nav_dark .sf-mega h2.mega-menu-heading a,
body header .invested_nav_light .sf-mega h2.mega-menu-heading a,
body #header-top-avlar .header-top-right-avlar .sf-mega h2.mega-menu-heading a,
body header .sf-mega h2.mega-menu-heading a, body #header-top-avlar .header-top-right-avlar .sf-mega h2.mega-menu-heading,
.sf-mega h2.mega-menu-heading' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#1e1e1e',
		),
   );
	
	
   $controls['pro_page_title_font'] = array(
       'name'       => 'pro_page_title_font',
	'type'        => 'font',
       'title'      =>  esc_html__('Page Title', 'invested-progression'),
       'tab'        => 'pro-page-title-headings',
       'properties' => array( 'selector'   => '#page-title-pro h1' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'text_decoration'            => 'none',
			'font_size'                  => array( 'amount' => '80', 'unit' => 'px' ),
		),
   );
	
	
	$controls['progression_sub_title_page_title_font'] = array(
       'name'       => 'progression_sub_title_page_title_font',
	'type'        => 'font',
       'title'      =>  esc_html__('Page Sub-Title', 'invested-progression'),
       'tab'        => 'pro-page-title-headings',
       'properties' => array( 'selector'   => '#page-title-pro h3' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#7e84a0',
			'text_decoration'            => 'none',
			'font_size'                  => array( 'amount' => '22', 'unit' => 'px' ),
		),
   );
	
	
	
   $controls['pro_sidebar_heading'] = array(
       'name'       => 'pro_sidebar_heading',
	'type'        => 'font',
       'title'      =>  esc_html__('Sidebar Heading', 'invested-progression'),
       'tab'        => 'pro-sidebar',
       'properties' => array( 'selector'   => '#sidebar h4.widget-title' ),
	'default' => array(
			'subset'                     => 'latin',
			'text_decoration'            => 'none',
			'font_size'                  => array( 'amount' => '20', 'unit' => 'px' ),
		),
   );
	
   $controls['progression_sidebar_default'] = array(
       'name'       => 'progression_sidebar_default',
	'type'        => 'font',
       'title'      =>  esc_html__('Sidebar Default Font', 'invested-progression'),
       'tab'        => 'pro-sidebar',
       'properties' => array( 'selector'   => '#sidebar, .widget_categories li a, .widget_archive ul li a' ),
	'default' => array(
			'subset'                     => 'latin',
			'text_decoration'            => 'none',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_blog_heading'] = array(
       'name'       => 'progression_blog_heading',
	'type'        => 'font',
       'title'      =>  esc_html__('Blog Index Heading', 'invested-progression'),
       'tab'        => 'pro-blog-headings',
       'properties' => array( 'selector'   => '.post-container-pro h2.blog-title-pro' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'text_decoration'            => 'none',
			'text_transform'             => 'normal',
			'font_size'                  => array( 'amount' => '32', 'unit' => 'px' ),
			'margin_bottom'             => array( 'amount' => '15', 'unit' => 'px' )
		),
   );
	
	
   $controls['progression_blog_meta'] = array(
       'name'       => 'progression_blog_meta',
	'type'        => 'font',
       'title'      =>  esc_html__('Blog Index Meta', 'invested-progression'),
       'tab'        => 'pro-blog-headings',
       'properties' => array( 'selector'   => 'body ul.post-meta-pro' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#a3a9c8',
			'text_decoration'            => 'none',
			'text_transform'             => 'normal',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
		),
   );
	
	
	
   $controls['progression_blog_heading_single'] = array(
       'name'       => 'progression_blog_heading_single',
	'type'        => 'font',
       'title'      =>  esc_html__('Blog Single Heading', 'invested-progression'),
       'tab'        => 'pro-blog-headings',
       'properties' => array( 'selector'   => 'body.search-results #page-title-pro h1.entry-title-pro,
#page-title-pro h1.blog-post-single-progression' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#182244',
			'text_decoration'            => 'none',
			'text_transform'             => 'normal',
			'font_size'                  => array( 'amount' => '52', 'unit' => 'px' ),
			'margin_bottom'             => array( 'amount' => '30', 'unit' => 'px' )
		),
   );
	
   $controls['progression_blog_meta_single'] = array(
       'name'       => 'progression_blog_meta_single',
	'type'        => 'font',
       'title'      =>  esc_html__('Blog Single Meta', 'invested-progression'),
       'tab'        => 'pro-blog-headings',
       'properties' => array( 'selector'   => '#page-title-pro ul.post-meta-pro' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#a3a9c8',
			'text_decoration'            => 'none',
			'text_transform'             => 'normal',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
		),
   );
	
	
	

   $controls['progression_heading_footer'] = array(
       'name'       => 'progression_heading_footer',
	'type'        => 'font',
       'title'      =>  esc_html__('Footer Heading', 'invested-progression'),
       'tab'        => 'pro-footer-font',
       'properties' => array( 'selector'   => 'footer#site-footer h4.widget-title' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#ffffff',
			'font_size'                  => array( 'amount' => '21', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_font_footer_default'] = array(
       'name'       => 'progression_font_footer_default',
	'type'        => 'font',
       'title'      =>  esc_html__('Footer Default Font', 'invested-progression'),
       'tab'        => 'pro-footer-font',
       'properties' => array( 'selector'   => 'footer#site-footer' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#868ca9',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_font_footer_default'] = array(
       'name'       => 'progression_font_footer_default',
	'type'        => 'font',
       'title'      =>  esc_html__('Copyright Text', 'invested-progression'),
       'tab'        => 'pro-footer-font',
       'properties' => array( 'selector'   => 'footer#site-footer #copyright-pro' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#575d78',
			'font_size'                  => array( 'amount' => '13', 'unit' => 'px' ),
		),
   );
	
	
	
	
   $controls['progression_font_portfolio_heading'] = array(
       'name'       => 'progression_font_portfolio_heading',
	'type'        => 'font',
       'title'      =>  esc_html__('Portfolio Heading', 'invested-progression'),
       'tab'        => 'progression-portfolio-font',
       'properties' => array( 'selector'   => '.invested-portfolio-title' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#ffffff',
			'font_size'                  => array( 'amount' => '20', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_font_portfolio_default'] = array(
       'name'       => 'progression_font_portfolio_default',
	'type'        => 'font',
       'title'      =>  esc_html__('Portfolio Category/Excerpt', 'invested-progression'),
       'tab'        => 'progression-portfolio-font',
       'properties' => array( 'selector'   => '.invested-excerpt-portfolio, ul.progressoin-portfolio-tax' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#a3a9c8',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_font_team_heading'] = array(
       'name'       => 'progression_font_team_heading',
	'type'        => 'font',
       'title'      =>  esc_html__('Team Heading', 'invested-progression'),
       'tab'        => 'progression-team-font',
       'properties' => array( 'selector'   => 'h2.invested-team-title' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_size'                  => array( 'amount' => '24', 'unit' => 'px' ),
		),
   );
	
   $controls['progression_font_team_sub_heading'] = array(
       'name'       => 'progression_font_team_sub_heading',
	'type'        => 'font',
       'title'      =>  esc_html__('Team Sub-title', 'invested-progression'),
       'tab'        => 'progression-team-font',
       'properties' => array( 'selector'   => '.invested-excerpt-team' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_color'                 => '#46b7e4',
			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
		),
   );
	
	
   $controls['progression_font_team_text'] = array(
       'name'       => 'progression_font_team_text',
	'type'        => 'font',
       'title'      =>  esc_html__('Team Text', 'invested-progression'),
       'tab'        => 'progression-team-font',
       'properties' => array( 'selector'   => '.invested-content-team' ),
	'default' => array(
			'subset'                     => 'latin',
			'font_size'                  => array( 'amount' => '13', 'unit' => 'px' ),
		),
   );
	
	
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'pro_add_control_to_tab' );