<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pro
 */


/* Logo */
function progression_logo() {
?>
	<img src="<?php echo esc_attr( get_theme_mod( 'progression_theme_logo', get_template_directory_uri() . '/images/logo.png' ) ); ?>" alt="<?php bloginfo('name'); ?>" 
	<?php global $post; if(is_page() && get_post_meta($post->ID, 'progression_logo_custom', true)): ?>class="default-logo-pro"<?php endif; ?>
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(is_home() && get_post_meta($cover_page->ID, 'progression_logo_custom', true)): ?>class="default-logo-pro"<?php endif; ?><?php endif; ?>>
	
	<?php if(is_page() && get_post_meta($post->ID, 'progression_logo_custom', true)): ?><img src="<?php echo esc_url( get_post_meta($post->ID, 'progression_logo_custom', true) );?>" alt="<?php bloginfo('name'); ?>" class="custom-logo-pro"><?php endif; ?>
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(is_home() && get_post_meta($cover_page->ID, 'progression_logo_custom', true)): ?><img src="<?php echo esc_url( get_post_meta($cover_page->ID, 'progression_logo_custom', true) );?>" alt="<?php bloginfo('name'); ?>" class="custom-logo-pro"><?php endif; ?><?php endif; ?>
	
<?php
}


/* Header/Page Title Options */
function progression_page_title() {
?>

	<?php global $post; if(is_page() && get_post_meta($post->ID, 'progression_header_display', true)): ?> class="<?php echo esc_html( get_post_meta($post->ID, 'progression_header_display', true) );?>"<?php endif; ?>
		
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		<?php if(is_home() && get_post_meta($cover_page->ID, 'progression_header_display', true)): ?> class="<?php echo esc_html( get_post_meta($cover_page->ID, 'progression_header_display', true) );?>"<?php endif; ?>
	<?php endif; ?>
	
<?php
}


/* remove more link jump */
function progression_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'progression_remove_more_link_scroll' );




if ( ! function_exists( 'progression_show_pagination_links_pro' ) ) :
function progression_show_pagination_links_pro()
{
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
				'prev_text'    => esc_html__('&lsaquo; Previous', 'invested-progression'),
				'next_text'    => esc_html__('Next &rsaquo;', 'invested-progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;



if ( ! function_exists( 'progression_show_pagination_links_blog' ) ) :
function progression_show_pagination_links_blog()
{	
	
    global $blogloop;

    $page_tot   = $blogloop->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => esc_html__('&lsaquo; Previous', 'invested-progression'),
			'next_text'    => esc_html__('Next &rsaquo;', 'invested-progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;





if ( ! function_exists( 'progression_infinite_content_nav_pro' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function progression_infinite_content_nav_pro( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="infinite-nav-pro">
			<div class="nav-previous"><?php next_posts_link( esc_html__( 'Load More', 'invested-progression' ) ); ?></div>
		</div>
	<?php endif;
}
endif;





if ( ! function_exists( 'progression_VC_portfolio_infinite_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function progression_VC_portfolio_infinite_content_nav( $html_id ) {
	global $blogloop;

	$html_id = esc_attr( $html_id );

	if ( $blogloop->max_num_pages > 1 ) : ?>
		<div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( esc_html__( 'Load More', 'invested-progression' ), $blogloop->max_num_pages ); ?></div></div>
	<?php endif;
}
endif;




if ( ! function_exists( 'progression_content_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function progression_content_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<div class="post-nav-pro-border">
	<nav class="navigation post-navigation-pro" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'invested-progression' ); ?></h2>
		<div class="nav-links">
			 <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="back-blog-index"><i class="fa fa-th"></i></a>
			<?php
				previous_post_link( '<div class="nav-previous">%link<span>|</span></div>', wp_kses( __('<i class="fa fa-arrow-left"></i>Previous', 'invested-progression' ) , TRUE));
				next_post_link( '<div class="nav-next"><span>|</span>%link</div>',  wp_kses( __('Next<i class="fa fa-arrow-right"></i>', 'invested-progression' ) , TRUE));
			?>
		<div class="clearfix-pro"></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	</div>
	<?php
}
endif;





/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function progression_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'qube_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'qube_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so progression_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so progression_categorized_blog should return false.
		return false;
	}
}



/**
 * Flush out the transients used in progression_categorized_blog.
 */
function progression_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'qube_categories' );
}
add_action( 'edit_category', 'progression_category_transient_flusher' );
add_action( 'save_post',     'progression_category_transient_flusher' );
