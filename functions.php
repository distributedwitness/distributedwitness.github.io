<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


if ( ! function_exists( 'progression_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */

	
function progression_setup() {
	
	if(function_exists( 'set_revslider_as_theme' )){
		add_action( 'init', 'progression_custom_slider_rev' );
		function progression_custom_slider_rev() { set_revslider_as_theme(); }
	}
	add_action( 'vc_before_init', 'progression_SetAsTheme' );
	function progression_SetAsTheme() { vc_set_as_theme( $disable_updater = true ); }

	
	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('progression-blog', 1000, 600, true);
	add_image_size('progression-portfolio', 600, 1200, false);
	add_image_size('progression-portfolio-single', 1200, 600, true);
	add_image_size('progression-team', 500, 500, true);

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pro, use a find and replace
	 * to change 'invested-progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'invested-progression', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote', 'link', 'image' ) );
	

	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'profile' => esc_html__( 'Top Right Menu', 'invested-progression' ),
		'primary' => esc_html__( 'Primary Menu', 'invested-progression' ),
		'mobile-menu' => esc_html__( 'Mobile Menu', 'invested-progression' ),
	) );
	

	
	
}
endif; // progression_setup
add_action( 'after_setup_theme', 'progression_setup' );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since pro 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1140; /* pixels */


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since pro 1.0
 */
function progression_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'invested-progression' ),
		'description'   => esc_html__('Default sidebar', 'invested-progression'),
		'id' => 'sidebar-progression',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '</div><div class="sidebar-divider-pro"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Left', 'invested-progression' ),
		'description'   => esc_html__('Top left area above header', 'invested-progression'),
		'id' => 'header-top-left-progression',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );

	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets', 'invested-progression' ),
		'description' => esc_html__( 'Footer widgets', 'invested-progression' ),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Second Row Widgets', 'invested-progression' ),
		'description' => esc_html__( 'Footer Second Row widgets', 'invested-progression' ),
		'id' => 'footer-widgets-bottom',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
}
add_action( 'widgets_init', 'progression_widgets_init' );




/**
 * Enqueue scripts and styles
 */
function progression_scripts() {
	wp_enqueue_style( 'progression-style', get_stylesheet_uri());
	wp_enqueue_style( 'progression-google-fonts', progression_fonts_url(), array( 'progression-style' ), '1.0.0' );
	wp_enqueue_script( 'progression-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'progression-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'progression_scripts' );



/**
 * Enqueue google fonts
 */
function progression_fonts_url() {
    $progression_font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'invested-progression' ) ) {
        $progression_font_url = add_query_arg( 'family', urlencode( 'Unica One|Noticia Text:400,400italic|Lato:400,300,700,300italic,400italic,700italic&subset=latin' ), "//fonts.googleapis.com/css" );
    }
	 
    return $progression_font_url;
}



/**
 * Enqueue or de-enqueue third party plugin scripts/styles
 */
function progression_plugin_styles_scripts() {
	wp_enqueue_style( 'prettyphoto' );
	wp_deregister_style( 'flexslider' );
	wp_deregister_style( 'font-awesome' );
}
add_action( 'wp_enqueue_scripts', 'progression_plugin_styles_scripts', 100 );


/**
 * Custom Editor Styles
 */
function progression_add_editor_styles() {
    add_editor_style( 'inc/editor-style.css' );
}
add_action( 'admin_init', 'progression_add_editor_styles' );




/* Demo Content Import */
function progression_studios_demo_import_files() {
  return array(
    array(
      'import_file_name'           => esc_html__( 'Demo Import', 'invested-progression' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . '/demo/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/demo/widgets.json',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/demo/theme_option.dat',
      'preview_url'                => 'https://invested.progressionstudios.com/',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'progression_studios_demo_import_files' );

function progression_studios_demo_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by('name', 'Main Navigation', 'nav_menu');

	set_theme_mod( 'nav_menu_locations', array(
		'primary' => $main_menu->term_id,
		)
	);
	
   //Import Revolution Slider
	//http://www.themevan.com/a-simple-guide-to-provide-one-click-demo-import-feature-in-wordpress/
   if ( class_exists( 'RevSlider' ) ) {
       $slider_array = array(
          get_template_directory()."/demo/slider.zip",
          );

       $slider = new RevSlider();
    
       foreach($slider_array as $filepath){
         $slider->importSliderFromPost(true,true,$filepath);  
       }
    
       echo ' Slider processed';
  }

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'News & Press' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'progression_studios_demo_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom Metabox Fields
 */
require get_template_directory() . '/inc/custom-meta.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/default-customizer.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/mega-menu/mega-menu-framework.php';

/**
 * Load Plugin Activiation
 */
require get_template_directory() . '/inc/tgm-plugin-activation/plugin-activation.php';

