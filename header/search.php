<div id="progression-search-homepage">
	<div id="progression-search-caption-home">		
		<?php if(get_post_meta($post->ID, 'progression_search_heading', true)) : ?>
			<div id="progression-home-search-title"><?php echo wp_filter_post_kses( get_post_meta($post->ID, 'progression_search_heading', true) );?></div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'avlar_search_drop_down') == 'idx') : ?>
		<div class="progression-search-home-container">
			<div class="idx-home-page-search-form">
				 <?php echo do_shortcode('[idx-quick-search format="horizontal"]'); ?>
			</div>
		</div><!-- close .progression-search-home-container -->
		<?php else: ?>
		<div class="progression-search-home-container">
			<?php $purl = get_post_type_archive_link('property'); ?>
			<?php
			if(!isset($_GET['search_keyword'])) { $_GET['search_keyword'] = ''; }
			if(!isset($_GET['pstatus'])) { $_GET['pstatus'] = ''; }		
			if(!isset($_GET['ptype'])) { $_GET['ptype'] = ''; }
			if(!isset($_GET['price-min'])) { $_GET['price-min'] = ''; }
			if(!isset($_GET['price-max'])) { $_GET['price-max'] = ''; }
			?>
			<form method="get" class="home-advanced-searchform-property" action="<?php echo esc_url($purl); ?>">
				<input type="hidden" name="post_type" value="property" />
				
				<?php if ( get_theme_mod( 'avlar_search_drop_down', 'status') == 'none') : ?>
				<div class="progression-hide-files home-search-property-status-progression">
					<select name="pstatus">
						<option value="">Blank Value</option>
					</select>
				</div><!-- close .property-status-progression -->
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'avlar_search_drop_down', 'status') == 'status') : ?>
				<?php $pstatus = get_terms('property_status'); if($pstatus): ?>
				<div class="home-search-property-status-progression">
					<select name="pstatus">
						<!--option value=""><?php echo esc_html__( 'Property Status', 'invested-progression' ); ?></option-->
						<?php foreach($pstatus as $ps): ?><option value="<?php echo esc_attr($ps->slug); ?>" <?php if($_GET['pstatus'] == $ps->slug ): ?>selected="selected"<?php endif; ?>><?php echo esc_attr($ps->name); ?></option><?php endforeach; ?>
					</select>
				</div><!-- close .property-status-progression -->
				<?php endif; ?>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'avlar_search_drop_down') == 'type') : ?>
				<?php $ptype = get_terms('property_type'); if($ptype): ?>
				<div class="home-search-property-status-progression">
					<select name="ptype">
						<option value=""><?php echo esc_html__( 'Property Type', 'invested-progression' ); ?></option>
						<?php foreach($ptype as $pt): ?><option value="<?php echo esc_attr($pt->slug); ?>" <?php if($_GET['ptype'] == $pt->slug ): ?>selected="selected"<?php endif; ?>><?php echo esc_attr($pt->name); ?></option><?php endforeach; ?>
					</select>
				</div><!-- close .property-type-progression -->
				<?php endif; ?>
				<?php endif; ?>
				
				<?php if ( get_theme_mod( 'avlar_search_drop_down') == 'price') : ?>
				<div class="home-search-property-status-progression">
				<div class="search-sidebar-price-container-pro">
				<div class="home-search-price-progression home-search-price-to">
					<span class="to-progression"><?php echo esc_html__( 'to', 'invested-progression' ); ?></span>
					<select name="price-min">
						<option value=""><?php echo esc_html__( 'Any Price', 'invested-progression' ); ?></option>
						<option value="1000" <?php if($_GET['price-min'] == '1000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,000', 'invested-progression' ); ?></option>
						<option value="2000" <?php if($_GET['price-min'] == '2000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '2,000', 'invested-progression' ); ?></option>
						<option value="5000" <?php if($_GET['price-min'] == '5000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '5,000', 'invested-progression' ); ?></option>
						<option value="10000" <?php if($_GET['price-min'] == '10000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '10,000', 'invested-progression' ); ?></option>
						<option value="50000" <?php if($_GET['price-min'] == '50000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '50,000', 'invested-progression' ); ?></option>
						<option value="100000" <?php if($_GET['price-min'] == '100000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '100,000', 'invested-progression' ); ?></option>
						<option value="150000" <?php if($_GET['price-min'] == '150000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '150,000', 'invested-progression' ); ?></option>
						<option value="200000" <?php if($_GET['price-min'] == '200000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '200,000', 'invested-progression' ); ?></option>
						<option value="250000" <?php if($_GET['price-min'] == '250000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '250,000', 'invested-progression' ); ?></option>
						<option value="300000" <?php if($_GET['price-min'] == '300000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '300,000', 'invested-progression' ); ?></option>
						<option value="350000" <?php if($_GET['price-min'] == '350000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '350,000', 'invested-progression' ); ?></option>
						<option value="400000" <?php if($_GET['price-min'] == '400000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '400,000', 'invested-progression' ); ?></option>
						<option value="500000" <?php if($_GET['price-min'] == '500000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '500,000', 'invested-progression' ); ?></option>
						<option value="600000" <?php if($_GET['price-min'] == '600000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '600,000', 'invested-progression' ); ?></option>
						<option value="700000" <?php if($_GET['price-min'] == '700000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '700,000', 'invested-progression' ); ?></option>
						<option value="800000" <?php if($_GET['price-min'] == '800000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '800,000', 'invested-progression' ); ?></option>
						<option value="900000" <?php if($_GET['price-min'] == '900000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '900,000', 'invested-progression' ); ?></option>
						<option value="1000000" <?php if($_GET['price-min'] == '1000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,000,000', 'invested-progression' ); ?></option>
						<option value="1500000" <?php if($_GET['price-min'] == '1500000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,500,000', 'invested-progression' ); ?></option>
						<option value="2000000" <?php if($_GET['price-min'] == '2000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '2,000,000', 'invested-progression' ); ?></option>
						<option value="5000000" <?php if($_GET['price-min'] == '5000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '5,000,000', 'invested-progression' ); ?></option>
						<option value="10000000" <?php if($_GET['price-min'] == '10000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '10,000,000', 'invested-progression' ); ?></option>
					</select>
				</div><!-- close .price-min-progression -->
			
				<div class="home-search-price-progression">
					<select name="price-max">
						<option value=""><?php echo esc_html__( 'Any Price', 'invested-progression' ); ?>&nbsp;&nbsp;</option>
						<option value="1000" <?php if($_GET['price-max'] == '1000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,000', 'invested-progression' ); ?></option>
						<option value="2000" <?php if($_GET['price-max'] == '2000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '2,000', 'invested-progression' ); ?></option>
						<option value="5000" <?php if($_GET['price-max'] == '5000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '5,000', 'invested-progression' ); ?></option>
						<option value="10000" <?php if($_GET['price-max'] == '10000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '10,000', 'invested-progression' ); ?></option>
						<option value="50000" <?php if($_GET['price-max'] == '50000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '50,000', 'invested-progression' ); ?></option>
						<option value="100000" <?php if($_GET['price-max'] == '100000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '100,000', 'invested-progression' ); ?></option>
						<option value="150000" <?php if($_GET['price-max'] == '150000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '150,000', 'invested-progression' ); ?></option>
						<option value="200000" <?php if($_GET['price-max'] == '200000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '200,000', 'invested-progression' ); ?></option>
						<option value="250000" <?php if($_GET['price-max'] == '250000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '250,000', 'invested-progression' ); ?></option>
						<option value="300000" <?php if($_GET['price-max'] == '300000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '300,000', 'invested-progression' ); ?></option>
						<option value="350000" <?php if($_GET['price-max'] == '350000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '350,000', 'invested-progression' ); ?></option>
						<option value="400000" <?php if($_GET['price-max'] == '400000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '400,000', 'invested-progression' ); ?></option>
						<option value="500000" <?php if($_GET['price-max'] == '500000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '500,000', 'invested-progression' ); ?></option>
						<option value="600000" <?php if($_GET['price-max'] == '600000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '600,000', 'invested-progression' ); ?></option>
						<option value="700000" <?php if($_GET['price-max'] == '700000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '700,000', 'invested-progression' ); ?></option>
						<option value="800000" <?php if($_GET['price-max'] == '800000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '800,000', 'invested-progression' ); ?></option>
						<option value="900000" <?php if($_GET['price-max'] == '900000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '900,000', 'invested-progression' ); ?></option>
						<option value="1000000" <?php if($_GET['price-max'] == '1000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,000,000', 'invested-progression' ); ?></option>
						<option value="1500000" <?php if($_GET['price-max'] == '1500000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '1,500,000', 'invested-progression' ); ?></option>
						<option value="2000000" <?php if($_GET['price-max'] == '2000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '2,000,000', 'invested-progression' ); ?></option>
						<option value="5000000" <?php if($_GET['price-max'] == '5000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '5,000,000', 'invested-progression' ); ?></option>
						<option value="10000000" <?php if($_GET['price-max'] == '10000000'): ?>selected="selected"<?php endif; ?>><?php echo esc_attr(get_theme_mod('avlar_currency_pro', '$')); ?><?php echo esc_html__( '10,000,000', 'invested-progression' ); ?></option>
					</select>
				</div><!-- close .price-max-progression -->
			
				</div>
				</div>
				<?php endif; ?>
				
				<div class="home-keyword-search-progression">
					<input type="text" class="search-field-progression" name="search_keyword" placeholder="<?php echo esc_html__( 'Enter An Address, Zipcode, or City', 'invested-progression' ); ?>" value="<?php echo esc_attr($_GET['search_keyword']); ?>" />
				</div>
			
				<input type="submit" class="home-submit-search-pro" name="submit" value="Search" />
				<div class="home-search-submit-progression">&nbsp;</div>
			
			</form>
		</div><!-- close .progression-search-home-container -->
		
		<?php endif; ?>
		
	</div><!-- close #progression-search-caption-home -->
	<?php if(has_post_thumbnail()): ?><?php $main_pro = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-property-single'); ?><div class="progression-home-search-bg" style="background-image:url('<?php echo esc_attr($main_pro[0]);?>')"></div><?php endif; ?>
</div><!-- close #slider-pro-container -->