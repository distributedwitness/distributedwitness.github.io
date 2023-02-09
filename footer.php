<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package pro
 * @since pro 1.0
 */
?>
		
		<footer id="site-footer">
			
			<?php if ( is_active_sidebar( 'footer-widgets' ) ) { ?>
			<div id="widget-area-qube">
				<div class="width-container-pro <?php echo esc_attr(get_theme_mod('pro_widget_count', 'footer-4-pro')); ?> <?php echo esc_attr(get_theme_mod('progression_footer_full_width')); ?>">
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- close #widget-area-pro -->
			<?php } ?>
			
			<?php if ( is_active_sidebar( 'footer-widgets-bottom' ) ) { ?>
			<div id="widget-area-qube-secondary">
				<div class="width-container-pro <?php echo esc_attr(get_theme_mod('pro_widget_count_secondary', 'footer-3-pro')); ?> <?php echo esc_attr(get_theme_mod('progression_footer_full_width')); ?>">
					<?php dynamic_sidebar( 'footer-widgets-bottom' ); ?>
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- close #widget-area-pro -->
			<?php } ?>
			
			
			<?php if ( get_theme_mod('footer_copyright_progression', 'Copyright - Invested WordPress Theme by Progression Studios') ) : ?>
			<div id="copyright-pro">
				<div class="width-container-pro <?php echo esc_attr(get_theme_mod('progression_footer_full_width')); ?>">
					<?php echo wp_kses(get_theme_mod( 'footer_copyright_progression', 'Copyright - Invested WordPress Theme by Progression Studios' ), true); ?>
					<div class="clearfix-pro"></div>
				</div>
			</div><!-- close #copyright-pro -->
			<?php endif; ?>
			
		</footer>
		

	</div><!-- close #boxed-layout-pro -->
	<a href="#0" id="pro-scroll-top"><?php esc_html_e( 'Scroll to top', 'invested-progression' ); ?></a>
<?php wp_footer(); ?>
</body>
</html>