<?php
/**
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="invested-team-index <?php echo esc_attr(get_theme_mod('progression_team_radius_image')); ?>">
		<?php if(has_post_thumbnail()): ?>
			<div class="progression-team-featured"><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php endif; ?><?php the_post_thumbnail('progression-team'); ?><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?></a><?php endif; ?></div>
			<?php else: ?>
				<?php if(get_post_meta($post->ID, 'progression_gallery', true) ): ?>
					<div class="progression-team-featured">
						<div class="flexslider gallery-progression">
				      		<ul class="slides">
									<?php $files = get_post_meta( get_the_ID(),'progression_gallery', 1 ); ?>
									<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
										<li><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php endif; ?><?php echo wp_get_attachment_image( $attachment_id, 'progression-team' ); ?><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?></a><?php endif; ?></li>
									<?php endforeach;  ?>
							</ul>
						</div><!-- close .flexslider -->
					</div>
				<?php else: ?>
					<?php if(get_post_meta($post->ID, 'progression_video_post', true)): ?>
						<div class="progression-team-featured"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_video_post', true)); ?></div>
					<?php endif; ?>
				<?php endif; ?>
		<?php endif; ?>
	
		<h2 class="invested-team-title"><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php endif; ?><?php the_title(); ?><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?></a><?php endif; ?></h2>
		
		

		<?php if(get_post_meta($post->ID, 'progression_sub_title', true)): ?><div class="invested-excerpt-team"><?php echo esc_attr( get_post_meta($post->ID, 'progression_sub_title', true) );?></div><?php endif; ?>
		<div class="invested-content-team"><?php the_content(); ?></div>
		
		<div class="social-icons-team">
			<?php if(get_post_meta($post->ID, 'progression_facebook', true)): ?><a class="facebook-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_facebook', true) );?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_twitter', true)): ?><a class="twitter-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_twitter', true) );?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_dribbble', true)): ?><a class="dribbble-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_dribbble', true) );?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_linkedin', true)): ?><a class="linkedin-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_linkedin', true) );?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_pinterest', true)): ?><a class="pinterest-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_pinterest', true) );?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_google', true)): ?><a class="google-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_google', true) );?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_instagram', true)): ?><a class="instagram-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_instagram', true) );?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_tumblr', true)): ?><a class="tumblr-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_tumblr', true) );?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_youtube', true)): ?><a class="youtube-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_youtube', true) );?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_dropbox', true)): ?><a class="dropbox-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_dropbox', true) );?>" target="_blank"><i class="fa fa-dropbox"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_flickr', true)): ?><a class="flickr-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_flickr', true) );?>" target="_blank"><i class="fa fa-flickr"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_vimeo', true)): ?><a class="vimeo-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_vimeo', true) );?>" target="_blank"><i class="fa fa-vimeo"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_soundcloud', true)): ?><a class="soundcloud-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_soundcloud', true) );?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_houzz', true)): ?><a class="houzz-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_houzz', true) );?>" target="_blank"><i class="fa fa-houzz"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_wordpress', true)): ?><a class="wordpress-pro" href="<?php echo esc_url( get_post_meta($post->ID, 'progression_wordpress', true) );?>" target="_blank"><i class="fa fa-wordpress"></i></a><?php endif; ?>
			<?php if(get_post_meta($post->ID, 'progression_mail', true)): ?><a class="mail-pro" href="mailto:<?php echo esc_attr( get_post_meta($post->ID, 'progression_mail', true) );?>"><i class="fa fa-envelope"></i></a><?php endif; ?>

		</div>
	</div>
	
	<div class="clearfix-pro"></div>
</div><!-- #post-## -->