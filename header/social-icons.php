<?php if (get_theme_mod( 'show_social_pro', '1' )) : ?>
<div class="social-ico">
	<?php if (get_theme_mod( 'footer_facebook_link_progression', 'http://facebook.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_facebook_link_progression', 'http://facebook.com')); ?>" target="_blank" class="facebook-pro"><i class="fa fa-facebook"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_twitter_link_progression', 'http://twitter.com'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_twitter_link_progression', 'http://twitter.com')); ?>" target="_blank" class="twitter-pro"><i class="fa fa-twitter"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_dribbble_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_dribbble_link_progression')); ?>" target="_blank" class="dribbble-pro"><i class="fa fa-dribbble"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_linkedin_link_progression'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_linkedin_link_progression')); ?>" target="_blank" class="linkedin-pro"><i class="fa fa-linkedin"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_qube_pinterest_link_progression'  )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_pinterest_link_progression')); ?>" target="_blank" class="pinterest-pro"><i class="fa fa-pinterest-p"></i></a><?php endif; ?>	
	<?php if (get_theme_mod( 'footer_google_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_google_link_progression')); ?>" target="_blank" class="google-pro"><i class="fa fa-google-plus"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_instagram_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_instagram_link_progression')); ?>" target="_blank" class="instagram-pro"><i class="fa fa-instagram"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_tumblr_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_tumblr_link_progression')); ?>" target="_blank" class="tumblr-pro"><i class="fa fa-tumblr"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_youtube_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_youtube_link_progression')); ?>" target="_blank" class="youtube-pro"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_dropbox_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_dropbox_link_progression')); ?>" target="_blank" class="dropbox-pro"><i class="fa fa-dropbox"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_flickr_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_flickr_link_progression')); ?>" target="_blank" class="flickr-pro"><i class="fa fa-flickr"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_vimeo_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_vimeo_link_progression')); ?>" target="_blank" class="vimeo-pro"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_soundcloud_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_soundcloud_link_progression')); ?>" target="_blank" class="soundcloud-pro"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_vine_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_vine_link_progression')); ?>" target="_blank" class="houzz-pro"><i class="fa fa-houzz"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'footer_wordpress_link_progression' )) : ?><a href="<?php echo esc_attr(get_theme_mod('footer_wordpress_link_progression')); ?>" target="_blank" class="wordpress-pro"><i class="fa fa-wordpress"></i></a><?php endif; ?>	
	<?php if (get_theme_mod( 'footer_mail_link_progression' )) : ?><a href="mailto:<?php echo esc_attr(get_theme_mod('footer_mail_link_progression')); ?>" target="_blank" class="mail-pro"><i class="fa fa-envelope"></i></a><?php endif; ?>
</div>
<?php endif; ?>