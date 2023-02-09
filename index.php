<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>


	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
	<div id="page-title-pro">
		<div class="width-container-pro">
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'invested-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			<h1 class="entry-title-pro"><?php $page_for_posts = get_option('page_for_posts'); ?><?php echo get_the_title($page_for_posts); ?></h1>
			<?php if(get_post_meta($cover_page->ID, 'progression_sub_title', true)) : ?><h3 class="subheadline-invested"><?php echo esc_html( get_post_meta($cover_page->ID, 'progression_sub_title', true) );?></h3><?php endif; ?>
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->
	<?php else: ?>
		<div id="page-title-pro">
			<div class="width-container-pro">
				<h1 class="entry-title-pro"><?php esc_html_e( 'Latest Posts', 'invested-progression' ); ?></h1>
				<div class="clearfix-pro"></div>
			</div>
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	
	
	

	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?><?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
				<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
				<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
				<?php endif; ?>
						
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
							<?php endwhile; ?>
							<?php progression_show_pagination_links_pro( ); ?>
						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
						
				<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
				<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'right-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
				<?php if(get_post_meta($cover_page->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
				<?php endif; ?>
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>