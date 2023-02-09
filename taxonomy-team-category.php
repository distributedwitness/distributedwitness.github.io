<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-pro"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'invested-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			<h1 class="entry-title-pro"><?php if (is_tax('team-category')) {
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$tax_term_breadcrumb_taxonomy_slug = $term->taxonomy;
					echo '' . $term->name . '';
				}
				?></h1>
			<?php the_archive_description( '<h3 class="subheadline-invested">', '</h3>' ); ?>
			<div class="clearfix-pro"></div>
		</div>
	</div><!-- #page-title-pro -->


	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro<?php if (get_theme_mod( 'progression_team_width', 'full-width-pro') == "full-width-pro") : ?>-full<?php endif; ?>">
			
				
				
				<?php if ( have_posts() ) : ?>
					<div class="progression-team">
						<div class="progression-masonry-team" style="margin-right:<?php echo esc_html(get_theme_mod( 'progression_team_padding', '0') / 4) ; ?>%; margin-left:<?php echo esc_html(get_theme_mod( 'progression_team_padding', '0') / 4) ; ?>%;">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_team_columns', '4')); ?>">
									<div class="progression-masonry-inline-padding" style="padding:<?php echo esc_html(get_theme_mod( 'progression_team_padding', '0')); ?>%">		
									<div class="invested-team-border">
										<?php get_template_part( 'template-parts/content', 'team' ); ?>	
									</div>
									</div>
								</div>
							<?php endwhile; ?>
							
						<div class="clearfix-pro"></div>
						</div><!-- close .progression-masonry-team -->
					</div><!-- close .progression-team -->

					
					<?php get_template_part( 'template-parts/content-pagination', 'team' ); ?>
					
				<?php else : ?>
					
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
					
				<?php endif; ?>
				
			
			
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>