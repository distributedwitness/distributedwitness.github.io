<?php
/**
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="progression-portfolio-post-container">
		
		<div class="width-container-pro">
				
		
		<?php if(get_post_meta($post->ID, 'progression_gallery', true) ): ?>
			<div class="progression-featured-portfolio-single">
				<div class="flexslider gallery-progression">
		      		<ul class="slides">
						<?php $files = get_post_meta( get_the_ID(),'progression_gallery', 1 ); ?>
						<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
							<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
							<li>
								<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery]" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
								<?php echo wp_get_attachment_image( $attachment_id, 'progression-portfolio-single' ); ?>
								</a>
							</li>
						<?php endforeach;  ?>
					</ul>
				</div><!-- close .flexslider -->
			</div><!-- close .single-blog-pro -->
		<?php else: ?>	
			<?php if(get_post_meta($post->ID, 'progression_video_post', true)): ?>
				<div class="progression-featured-portfolio-single"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_video_post', true)); ?></div>
			<?php else: ?>
					<?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?><div class="progression-featured-portfolio-single">
						<a href="<?php echo esc_attr($image[0]);?>" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> data-rel="prettyPhoto"><?php the_post_thumbnail('progression-portfolio-single'); ?></a></div><?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		
		
		</div><!-- close .width-container-pro -->
		
		<div id="invested-container-content-single">
			<div class="width-container-pro">
			<div class="portfolio-singlesummary"><?php the_content(); ?></div>
			
			
			<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div>
		
	<div class="clearfix-pro"></div>
	</div><!-- close .progression-portfolio-post-container -->
</div><!-- #post-## -->