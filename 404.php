<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pro
 */

get_header(); ?>

	<div id="page-title-pro">
		<div class="width-container-pro">
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'invested-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			<h1 class="entry-title-pro"><?php esc_html_e( '404 Error', 'invested-progression' ); ?></h1>
			<h3 class="subheadline-invested"><?php esc_html_e( 'Page could not be found.', 'invested-progression' ); ?></h3>
			
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->
	
	<div id="content-pro">
		<div class="width-container-pro">
			
			<h5><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'invested-progression' ); ?></h5>
			
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links in the navigation or a search.', 'invested-progression' ); ?></p>
			<?php get_search_form(); ?>
			<br>
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
	
<?php get_footer(); ?>