<?php

/**
 *
 * @package pro
 * @since pro 1.0
 */
get_header(); ?>
	
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'invested-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			<?php the_title( '<h1 class="entry-title-pro">', '</h1>' ); ?>
			<?php if(get_post_meta($post->ID, 'progression_sub_title', true)) : ?><h3 class="subheadline-invested"><?php echo esc_html( get_post_meta($post->ID, 'progression_sub_title', true) );?></h3><?php endif; ?>
			
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->
	
	
	<div id="content-pro">
		<div class="width-container-pro<?php if(get_post_meta($post->ID, 'progression_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
			
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
	
<?php get_footer(); ?>