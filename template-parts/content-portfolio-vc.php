<?php
/**
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<?php if(has_post_thumbnail()): ?>
		<?php if(get_post_meta($post->ID, 'progression_optional_link', true) == 'invested_lightbox' ): ?>				
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
			<a href="<?php echo esc_attr($image[0]);?>" data-rel="prettyPhoto[gallery]" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> class="portfolio-container-progression">
			<?php else: ?>
				
				<?php if(get_post_meta($post->ID, 'progression_optional_link', true) == 'invested_custom_link' ): ?>		
					<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>" class="portfolio-container-progression">	
						<?php else: ?>
								
								<?php if(get_post_meta($post->ID, 'progression_optional_link', true) == 'invested_custom_link_new_window' ): ?>
									<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>" class="portfolio-container-progression" target="_blank">		
										<?php else: ?>
											<?php if(get_post_meta($post->ID, 'progression_optional_link', true) == 'invested_video_link' ): ?>
												<a data-rel="prettyPhoto[gallery]" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>" class="portfolio-container-progression">		
													<?php else: ?>
															<a href="<?php the_permalink(); ?>" class="portfolio-container-progression">
											<?php endif; ?>
								<?php endif; ?>
								
				<?php endif; ?>

		<?php endif; ?>
	<?php else: ?>
			<a href="<?php the_permalink(); ?>" class="portfolio-container-progression">
	<?php endif; ?>
		
	

			<?php if(has_post_thumbnail()): ?>
				<div class="invested-portfolio-feature"><?php the_post_thumbnail('progression-portfolio'); ?></div>
				
				<?php else: ?>
					<?php if(get_post_meta($post->ID, 'progression_gallery', true) ): ?>
						<div class="invested-portfolio-feature">
							<div class="flexslider gallery-progression">
					      		<ul class="slides">
										<?php $files = get_post_meta( get_the_ID(),'progression_gallery', 1 ); ?>
										<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
											<li><?php echo wp_get_attachment_image( $attachment_id, 'progression-portfolio' ); ?></li>
										<?php endforeach;  ?>
								</ul>
							</div><!-- close .flexslider -->
						</div>
					<?php else: ?>
						<?php if(get_post_meta($post->ID, 'progression_video_post', true)): ?>
							<div class="invested-portfolio-feature"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_video_post', true)); ?></div>
						<?php endif; ?>
					<?php endif; ?>
				
			<?php endif; ?>
			
			<div class="invested-portfolio-index-hover<?php if($portfolio_title_hover == 'always' ): ?> always-visible-portfolio<?php endif ?><?php if($portfolio_title_hover == 'none' ): ?> never-visible-portfolio<?php endif ?>">
				<div class="invested-portfolio-title"><?php the_title(); ?></div>
				
				
				<?php if( has_excerpt() ): ?><div class="invested-excerpt-portfolio"><?php the_excerpt(); ?></div><?php else: ?>
			<?php 
				$terms = get_the_terms( $post->ID , 'portfolio-category' ); 
				if ( !empty( $terms ) ) :
					echo '<ul class="progressoin-portfolio-tax">';
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term, 'portfolio-category' );
					if( is_wp_error( $term_link ) )
						continue;
					echo '<li>' . $term->name . '<span>&middot;</span></li>';
				} 
				echo '</ul>';
				endif;
			?>
			<?php endif; ?>
		</div>

	<div class="clearfix-pro"></div>
	</a><!-- close .portfolio-container-pro -->
</div><!-- #post-## -->