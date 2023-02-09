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
			
			<?php the_title( '<h1 class="entry-title-pro portfolio-post-single-progression">', '</h1>' ); ?>	
			
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->

	
	<div id="content-pro" class="site-content">
		
				
				<?php get_template_part( 'template-parts/content', 'single-portfolio' ); ?>

		
	</div><!-- #content-pro -->
	
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>