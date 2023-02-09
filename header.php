<?php
/**
 * The Header for our theme.
 *
 * @package pro
 * @since pro 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include( get_template_directory() . '/header/social-sharing.php'); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php include( get_template_directory() . '/header/page-loader.php'); ?>
	<div id="boxed-layout-pro"<?php progression_page_title(); ?>>
			
			<header id="masthead-pro" class="site-header-pro">
				
				<?php include( get_template_directory() . '/header/header-top.php'); ?>

					<div id="logo-nav-pro">
						<div class="width-container-pro">
							<h1 id="logo-pro" class="logo-inside-nav-pro noselect">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php progression_logo(); ?>
								</a>
							</h1>
							
						<div class="clearfix-pro"></div>
					</div><!-- close .width-container-pro -->
				</div>
				
						
				<div id="invested-bottom-header">
					<?php if (get_theme_mod( 'fixed_menu_pro', 'fixed-pro' ) == 'fixed-pro') : ?><?php if(is_page() && get_post_meta($post->ID, 'progression_disable_fixed', true)): ?><?php else: ?><div id="sticky-header-pro" class="menu-default-pro"><?php endif; ?><?php endif; ?>
					<div id="navigation-background-pro">
						<div class="nav-width-container-pro">
							<nav id="site-navigation" class="main-navigation<?php if(is_page() && get_post_meta($post->ID, 'progression_navigation_display', true)): ?> <?php echo esc_html( get_post_meta($post->ID, 'progression_navigation_display', true) );?><?php endif; ?>">
								<?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
							</nav>
							<div class="mobile-menu-icon-pro noselect"><i class="fa fa-bars"></i></div>
							<div class="clearfix-pro"></div>
						</div>
					</div>
					<?php if (get_theme_mod( 'fixed_menu_pro', 'fixed-pro' ) == 'fixed-pro') : ?><?php if(is_page() && get_post_meta($post->ID, 'progression_disable_fixed', true)): ?><?php else: ?></div><?php endif; ?><?php endif; ?>
				</div>
				
				<?php include( get_template_directory() . '/header/mobile-navigation.php'); ?>
			</header>