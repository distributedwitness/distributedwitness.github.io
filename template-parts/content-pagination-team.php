
						<script type="text/javascript">
						jQuery(document).ready(function($) {
							'use strict';
							
							/* Default Isotope Load Code */
							var $container = $('.progression-masonry-team').isotope();
							$container.imagesLoaded( function() {
								$(".progression-masonry-item").addClass('opacity-progression');
								$container.isotope({
									itemSelector: '.progression-masonry-item',
									transitionDuration: '0.4s',

									masonry: {
									    columnWidth: '.progression-masonry-col-<?php echo esc_attr(get_theme_mod( 'progression_team_columns', '4')); ?>',
									},hiddenStyle: {
										opacity: 0
									},
									visibleStyle: {
										opacity: 1
									}
						 		});
							});
							/* END Default Isotope Code */
							
							<?php if (get_theme_mod( 'progression_pagination_team', 'default_paginatin_pro' ) == 'default_paginatin_pro') : ?><?php else : ?>
							/* Begin Infinite Scroll */
							$container.infinitescroll({
								errorCallback: function(){  $('#infinite-nav-pro').delay(500).fadeOut(500, function(){ $(this).remove(); }); },
							  navSelector  : '#infinite-nav-pro',    // selector for the paged navigation 
							  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
							  itemSelector : '.progression-masonry-item',     // selector for all items you'll retrieve
						   		loading: {
						   		 	img: '<?php echo esc_url( get_template_directory_uri() );?>/images/loader.gif',
						   			 msgText: "",
						   		 	finishedMsg: "<div id='no-more-posts'><?php esc_html_e( "No more posts", "invested-progression" ); ?></div>",
						   		 	speed: 0, }
							  },
							  // trigger Isotope as a callback
							  function( newElements ) {
			  
							    var $newElems = $( newElements );
			
								
								
									$newElems.imagesLoaded(function(){
										$(".progression-masonry-item").addClass('opacity-progression');
									    $container.isotope( 'appended', $newElems );

								});
		   
							  }
							);
						    /* END Infinite Scroll */
							<?php endif; ?>
							
							
							<?php if (get_theme_mod( 'progression_pagination_team') == 'load_more_pagination_pro') : ?>
							/* PAUSE FOR LAOD MORE */
							$(window).unbind('.infscr');
							// Resume Infinite Scroll
							$('.nav-previous a').click(function(){
								$container.infinitescroll('retrieve');
								return false;
							});
							/* End Infinite Scroll */
							<?php endif; ?>
							
							
						});
						</script>
						
						
				
						<div class="clearfix-pro"></div>
						
						
						
						<?php if (get_theme_mod( 'progression_pagination_team', 'default_paginatin_pro' ) == 'default_paginatin_pro') : ?>
							<?php progression_show_pagination_links_pro(); ?>
						<?php endif; ?>
						
						<?php if (get_theme_mod( 'progression_pagination_team') == 'load_more_pagination_pro') : ?>
							<div id="load-more-manual"><?php progression_infinite_content_nav_pro( 'nav-below' ); ?></div>
						<?php endif; ?>
						
						<?php if (get_theme_mod( 'progression_pagination_team') == 'infinite_scroll_pro') : ?>
							<?php progression_infinite_content_nav_pro( 'nav-below' ); ?>
						<?php endif; ?>