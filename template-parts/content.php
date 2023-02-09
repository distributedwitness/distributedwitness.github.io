<?php
/**
 * @package pro
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-container-pro">

			<?php if(has_post_thumbnail()): ?>
				<div class="featured-blog-pro"><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_post_thumbnail('progression-blog'); ?></a></div>
				<?php else: ?>
					<?php if(get_post_meta($post->ID, 'progression_gallery', true) ): ?>
						<div class="featured-blog-pro">
							<div class="flexslider gallery-progression">
					      		<ul class="slides">
										<?php $files = get_post_meta( get_the_ID(),'progression_gallery', 1 ); ?>
										<?php foreach ( (array) $files as $attachment_id => $attachment_url ) : ?>
											<li><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php echo wp_get_attachment_image( $attachment_id, 'progression-blog' ); ?></a></li>
										<?php endforeach;  ?>
								</ul>
							</div><!-- close .flexslider -->
						</div>
					<?php else: ?>
						<?php if(get_post_meta($post->ID, 'progression_video_post', true)): ?>
							<div class="featured-blog-pro"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_video_post', true)); ?></div>
						<?php endif; ?>
					<?php endif; ?>
			<?php endif; ?>			
			
			
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="cat-meta-pro"><?php the_category(''); ?></div>
			<?php endif; ?>

			<h2 class="blog-title-pro"><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_external_link', true) );?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?></a></h2>
			
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="clearfix-pro"></div>
				<ul class="post-meta-pro">
					 <li class="date-meta-pro"><?php the_time(get_option('date_format')); ?></li>
					 <li class="author-meta-pro"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
					 <li class="comment-meta-pro"><?php comments_popup_link( '' . wp_kses( __( '<i class="fa fa-commenting"></i>No Comments', 'invested-progression' ), true ) . '', wp_kses( __( '<i class="fa fa-commenting"></i>1 Comment', 'invested-progression' ), true), wp_kses( __( '<i class="fa fa-commenting"></i>% Comments', 'invested-progression' ), true ) ); ?></li>
					 
				</ul>
			<?php endif; ?>
			
			
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="summary-post-pro"><?php the_content( sprintf( wp_kses( __( 'Continue Reading<i class="fa fa-plus"></i>', 'invested-progression' ), array(  'i' => array( 'id' => array(),  'class' => array(),  'style' => array(),  ), 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) ); ?></div>
			<?php endif; ?>
			
			
			<?php wp_link_pages( array(
					'before' => '<div class="page-nav-pro">' . esc_html__( 'Pages:', 'invested-progression' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
			
	
	<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<div class="sticky-post-pro">%s</div>', esc_html__( 'Featured', 'invested-progression' ) ); } ?>
	<div class="clearfix-pro"></div>
	</div><!-- close .post-container-pro -->
</div><!-- #post-## -->