<?php
/**
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container-pro featured-blog-single">

		<?php if(get_post_meta($post->ID, 'progression_gallery', true) ): ?>
			<div class="featured-blog-pro">
				<div class="flexslider gallery-progression">
		      		<ul class="slides">
						<?php $files = get_post_meta( get_the_ID(),'progression_gallery', 1 ); ?>
						<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
							<?php $lightbox_pro = wp_get_attachment_image_src($attachment_id, 'large'); ?>
							<li>
								<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[gallery]" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?>>
								<?php echo wp_get_attachment_image( $attachment_id, 'progression-blog' ); ?>
								</a>
							</li>
						<?php endforeach;  ?>
					</ul>
				</div><!-- close .flexslider -->
			</div><!-- close .single-blog-pro -->
		<?php else: ?>	
			<?php if(get_post_meta($post->ID, 'progression_video_post', true)): ?>
				<div class="featured-blog-pro"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_video_post', true)); ?></div>
			<?php else: ?>
					<?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?><div class="featured-blog-pro">
						<a href="<?php echo esc_attr($image[0]);?>" <?php $get_description = get_post(get_post_thumbnail_id())->post_excerpt; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?> data-rel="prettyPhoto"><?php the_post_thumbnail('progression-blog'); ?></a></div><?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	
			
		<div class="summary-post-pro"><?php the_content(); ?></div>
		
		<?php the_tags( '<div class="tags-progression"><i class="fa fa-tag"></i>', '<span>|</span>', '</div>' ); ?> 
	
		<div class="clearfix-pro"></div>
		<?php wp_link_pages( array(
				'before' => '<div class="page-nav-pro">' . esc_html__( 'Pages:', 'invested-progression' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
		
	<div class="clearfix-pro"></div>
	</div><!-- close .post-container-pro -->
</div><!-- #post-## -->

<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>