<div class="mpostfeed" >
	<header class="header">
	<?php the_post(); ?>
		<?php if(is_front_page()){ 
			//If is the front page, show this header for the main loop
			?>
			<?php
				$mpmaintitle = of_get_option('evyr_mainfeedtitle');
				if(!$mpmaintitle){
					$mpmaintitle = 'Most Recent Articles';
				}
			?>
			<?php esc_html($mpmaintitle);?>
			<span class="mp-main-title"><?php echo $mpmaintitle ?></span>
		<?php }elseif(is_author()){
			//If an author's archive is being displayed, use this as the header.
			?>	
			<h1 class="mp-main-title author"><?php _e( 'Author Archives', 'Evyr2014' ); ?>: <?php the_author_link(); ?></h1>
			<?php if ( '' != get_the_author_meta('user_description') ) echo apply_filters('archive_meta', '<div class="archive-meta">' . get_the_author_meta('user_description') . '</div>'); ?>
		<?php }elseif(is_tag()){ 
			 //If a Tag archive is being displayed, use the following as the header
			?>
			<h1 class="mp-main-title"><?php _e( 'Tag Archives: ', 'Evyr2014' ); ?><span><?php single_tag_title(); ?></span></h1>
		<?php }elseif(is_category()){ 
				//if a category archive is being displayed, use this as the header.
			?>
			<h1 class="mp-main-title"><?php _e( 'Category Archives: ', 'Evyr2014' ); ?><?php single_cat_title(); ?></h1>
			<?php if ( '' != category_description() ) echo apply_filters('archive_meta', '<div class="archive-meta">' . category_description() . '</div>'); ?>
		<?php }elseif(is_archive()){ 
				//If it is a dated archive being displayed, use this as the header.
			?>
			<h1 class="mp-main-title"><?php 
				if ( is_day() ) { printf( __( 'Daily Archives: %s', 'Evyr2014' ), get_the_time(get_option('date_format') ) ); }
				elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'Evyr2014' ), get_the_time('F Y') ); }
				elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'Evyr2014' ), get_the_time('Y') ); }
				else { _e( 'Archives', 'Evyr2014' ); }
				?>
			</h1>
		<?php }elseif(is_search()){
				//If it is search results being displayed, use this as the header
			?>
			<h1 class="mp-main-title"><?php printf( __( 'Search Results for: %s', 'Endlyss2014' ), get_search_query() ); ?></h1>
		<?php } ?>


	<?php rewind_posts(); ?>
	</header>
	<ul>
	<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			/*---------------------
			--Begin the post item--
			---------------------*/
			?>
			<li <?php post_class();?>>
				<a href="<?php echo the_permalink();?>">
					<span class="featured-bg">
						<?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  	the_post_thumbnail();
						}else{ ?>
							<span class="fp-holder"></span>	
						<?php }
						?>
					</span>
				</a>
				<a href="<?php echo get_permalink();?>" class="mp-title"><?php the_title();?></a>
					
				<div class="mp-excerpt"><?php echo excerpt(45);?></div>
				<span class="mp-panel">
						<span class="mp-date">
							<?php
								/*--------------------------------------------------
								--Sets up the Date in [Month] [Day], [Year] Format--
								--------------------------------------------------*/
								the_time('F d, Y');
							?>
						</span>
						<span class="mp-postcount">
							<?php 
							/*--Retrieve the post view count for the designated post--*/
							echo getPostViews(get_the_ID()); 
							?>
						</span>
						<?php
						/*-----------------------------------------------------------------------
						--Removed as per Theme Reqs (Temporary Removal?)-------------------------
						--http://make.wordpress.org/themes/guidelines/guidelines-accessibility/--
						<a href="<?php echo get_permalink();?>" class="mp-readmore">Read More</a>
						-----------------------------------------------------------------------*/
						?>
					</span>
			</li><!--/.post-item-->
		<?php

		  ?>
		  <?php endwhile; ?>
	</ul>
	<?php
	get_template_part('assets/parts/entry', 'pagination'); 
	/*---------------------------------
	--Reset the arguments and query,--- 
	--So that multiple queries may be-- 
	--set up in a template-------------
	---------------------------------*/ 
	wp_reset_postdata(); ?>
	<?php else:
	  //Do Nothing
	endif; ?>
	
</div>