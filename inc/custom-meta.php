<?php

add_action( 'cmb2_admin_init', 'progression_page_meta_box' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function progression_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'invested-progression'),
		'object_types'  => array( 'page' ), // Post type
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Sub-title', 'invested-progression'),
		'id'         => $prefix . 'sub_title',
		'description'=> esc_html__('Add-in a sub-title to display underneat the page title.', 'invested-progression'),
		'type'       => 'text',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Header Display', 'invested-progression'),
		'id'         => $prefix . 'header_display',
		'type'       => 'select',
		'options'     => array(
			'invested_header_default'   => esc_html__( 'Default Display', 'invested-progression' ), // {#} gets replaced by row number
			'invested_header_transparent'    => esc_html__( 'Transparent Header and Navigation', 'invested-progression' ),
			'invested_header_transparent_logo'    => esc_html__( 'Transparent Header Only', 'invested-progression' ),
			'invested_header_footer'    => esc_html__( 'Place Header At Bottom of Screen', 'invested-progression' ),
			'invested_header_hidden'    => esc_html__( 'Hidden Page Title', 'invested-progression' ),
		),

	) );
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Navigation Display', 'invested-progression'),
		'id'         => $prefix . 'navigation_display',
		'type'       => 'select',
		'options'     => array(
			'invested_nav_default'   => esc_html__( 'Default Display', 'invested-progression' ), // {#} gets replaced by row number
			'invested_nav_light'    => esc_html__( 'Light Navigation Text', 'invested-progression' ),
			'invested_nav_dark'    => esc_html__( 'Dark Navigation Text', 'invested-progression' ),
		),

	) );
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Custom Logo Per Page', 'invested-progression'),
		'id'         => $prefix . 'logo_custom',
		'type'       => 'file',
		'options' => array(
		        'url' => false, // Hide the text input for the url
		        'add_upload_file_text' => esc_html__('Add Logo', 'invested-progression'), // Change upload button text. Default: "Add or Upload File"
		    ),

	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Fixed Navigation', 'invested-progression'),
		'id'         => $prefix . 'disable_fixed',
		'type'       => 'checkbox',
		'description'=> esc_html__('Check this box to disable the fixed navigation that stays when a user scrolls down.', 'invested-progression'),
	) );
	


	
}


add_action( 'cmb2_admin_init', 'progression_page_header_meta_box' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function progression_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page',
		'title'         => esc_html__('Page Settings', 'invested-progression'),
		'object_types'  => array( 'page' ), // Post type
	) );
	
	
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'invested-progression'),
		
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'invested-progression' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'invested-progression' ),
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'invested-progression' ), 
		),
	) );
	



	
}




add_action( 'cmb2_admin_init', 'progression_team_meta_box' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function progression_team_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_teak',
		'title'         => esc_html__('Team Settings', 'invested-progression'),
		'object_types'  => array( 'team' ), // Post type
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Sub-title', 'invested-progression'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'invested-progression'),
		'desc' => esc_html__('Make your post link to another page.', 'invested-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Facebook', 'invested-progression'),
		'id'         => $prefix . 'facebook',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Twitter', 'invested-progression'),
		'id'         => $prefix . 'twitter',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Dribbble', 'invested-progression'),
		'id'         => $prefix . 'dribbble',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: LinkedIn', 'invested-progression'),
		'id'         => $prefix . 'linkedin',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Pinterest', 'invested-progression'),
		'id'         => $prefix . 'pinterest',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Google+', 'invested-progression'),
		'id'         => $prefix . 'google',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Instagram', 'invested-progression'),
		'id'         => $prefix . 'instagram',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Tumblr', 'invested-progression'),
		'id'         => $prefix . 'tumblr',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Youtube', 'invested-progression'),
		'id'         => $prefix . 'youtube',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Dropbox', 'invested-progression'),
		'id'         => $prefix . 'dropbox',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Flickr', 'invested-progression'),
		'id'         => $prefix . 'flickr',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Vimeo', 'invested-progression'),
		'id'         => $prefix . 'vimeo',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Soundcloud', 'invested-progression'),
		'id'         => $prefix . 'soundcloud',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: Houzz', 'invested-progression'),
		'id'         => $prefix . 'houzz',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: WordPress', 'invested-progression'),
		'id'         => $prefix . 'wordpress',
		'type'       => 'text',
	) );
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Social Icon: E-mail', 'invested-progression'),
		'id'         => $prefix . 'mail',
		'type'       => 'text',
	) );



	
}




add_action( 'cmb2_admin_init', 'progression_portfolio_meta_box' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function progression_portfolio_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_portfolio',
		'title'         => esc_html__('Post Settings', 'invested-progression'),
		'object_types'  => array( 'portfolio' ), // Post type
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'invested-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'invested-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Audio/Video Embed', 'invested-progression'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'invested-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'text',
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Featured Image Link (Index list of posts)', 'invested-progression'),
		'id'         => $prefix . 'optional_link',
		'type'       => 'select',
		'options'     => array(
			'invested_default'   => esc_html__( 'Link to Post', 'invested-progression' ), // {#} gets replaced by row number
			'invested_lightbox'    => esc_html__( 'Link to Image in Lightbox Popup', 'invested-progression' ),
			'invested_custom_link'    => esc_html__( 'Link to Custom Link', 'invested-progression' ),
			'invested_custom_link_new_window'    => esc_html__( 'Link to Custom Link (New Window)', 'invested-progression' ),
			'invested_video_link'    => esc_html__( 'Link to Video', 'invested-progression' ),
		),
	) );
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'invested-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up. Lightbox Videos Support for: Vimeo, Youtube, and .MOV', 'invested-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	

}


add_action( 'cmb2_admin_init', 'progression_post_meta_box' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function progression_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'invested-progression'),
		'object_types'  => array( 'post' ), // Post type
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'invested-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'invested-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_cmb_demo->add_field( array(
		'name'       => esc_html__('Audio/Video Embed', 'invested-progression'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'invested-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'text',
	) );
	
	

	$progression_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'invested-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'invested-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	

}




