<?php
/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'invested-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			<?php the_title( '<h1 class="entry-title-pro blog-post-single-progression">', '</h1>' ); ?>	
			
			<?php if ( 'post' == get_post_type() ) : ?>
				<ul class="post-meta-pro">
					 <li class="date-meta-pro"><?php the_time(get_option('date_format')); ?></li>
					 <li class="author-meta-pro"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
					 <li class="category-meta-pro"><?php the_category(', '); ?></li>
					 <li class="comment-meta-pro"><?php comments_popup_link( '' . wp_kses( __( '<i class="fa fa-commenting"></i>No Comments', 'invested-progression' ), true ) . '', wp_kses( __( '<i class="fa fa-commenting"></i>1 Comment', 'invested-progression' ), true), wp_kses( __( '<i class="fa fa-commenting"></i>% Comments', 'invested-progression' ), true ) ); ?></li>
					 
				</ul>
			<?php endif; ?>
			
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->

	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
			
			<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
			<?php endif; ?>
			
			
				<?php get_template_part( 'template-parts/content', 'single' ); ?>

		
			<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
			<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
			<?php endif; ?>
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
	
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>