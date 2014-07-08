<?php
/*
Template Part: Primary Featured Posts Slider
Default Location: Homepage, Top of the content, just below the navigation bar.
Description: Posts (in order from most recent to oldest) in a designated category
-------------Displayed as a slider.

To Do list: 
1. Create an input box in the theme options so that users may easily choose 
==-what category to use for this box. 
*/

/*--.FS-wrapp-----------------------------------------
--Added to create a thin border around slider.--------
--Padding on ".featured-slider" was not agreeing------
--well, due to need of absolute positioning of items--
--within slider.--------------------------------------
----------------------------------------------------*/
?>
<div class="fs-wrapp">
	<div class="featured-slider">
		<ul id="slider">
		<?php 
			// the query
			$main_cata = of_get_option('evyr_maincata');
			$args = array(
				'cat' => $main_cata,
			);
			global $the_query;
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
			  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			  <!-- Slide Item-->
			  <?php
			 /**

			**/
			/*Begin Slide Content*/
				/*---------------------
				--Get some meta stuff--
				---------------------*/
				$post_id = get_the_ID();
					$single = 'true';
					$custom_preview_meta_key = '_custom_preview_meta_value_key';
					$custom_preview_meta_value = get_post_meta( $post_id, $custom_preview_meta_key, $single );

					$photo_credit_url_meta_key = '_photo_credit_url_meta_value_key';
					$photo_credit_url_meta_value = get_post_meta( $post_id, $photo_credit_url_meta_key, $single );

					$photo_credit_text_meta_key = '_photo_credit_text_meta_value_key';
					$photo_credit_text_meta_value = get_post_meta( $post_id, $photo_credit_text_meta_key, $single );
				?>
				<li class="post-item">
					<a href="<?php echo the_permalink();?>">
						<span class="featured-bg">
							<?php
							if($custom_preview_meta_value){
								echo '<img src="' . $custom_preview_meta_value .'" alt="' . the_title() . ' Custom Preview Image" />';
							}else{
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								  	the_post_thumbnail();
								}else{
									//Do Nothing
								}
							}
							?>
						</span>
					</a>
					<div class="caption-slider">
						<div class="sf-panel">
							<div class="sf-date">
								<?php
									/*--------------------------------------------------
									--Sets up the Date in [Month] [Day], [Year] Format--
									--------------------------------------------------*/
									the_time('F d, Y');
								?>
							</div>
							<div class="sf-postcount">
								<?php 
								/*--Retrieve the post view count for the designated post--*/
								echo getPostViews(get_the_ID()); 
								?>
							</div>
							<?php
							/*-----------------------------------------------------------------------
							--Removed as per Theme Reqs (Temporary Removal?)-------------------------
							--http://make.wordpress.org/themes/guidelines/guidelines-accessibility/--
							<a href="<?php echo get_permalink();?>" class="sf-readmore">Read More</a>
							-----------------------------------------------------------------------*/
							?>
						</div>
						<a href="<?php echo the_permalink();?>" class="f-title"><?php the_title();?></a>
						<div class="f-excerpt"><?php echo excerpt(45);?></div>
						<div class="f-creds">
							<?php if($photo_credit_text_meta_value && $photo_credit_url_meta_value){ ?>
								<a href="<?php echo $photo_credit_url_meta_value;?>" target="_blank" title="<?php echo $photo_credit_text_meta_value?>" class="f-photo-credit">Photo Credit: <?php echo $photo_credit_text_meta_value; ?></a>
							<?php } ?>
						</div>
						<div class="f-pagination">
							<span class="f-prev"></span>
							<span class="f-next"></span>
						</div><!--/.f-pagination-->
					</div><!--/.caption-slider-->
				</li><!--/.post-item-->
			<?php
				/*End Content*/
				 /**

				**/
			  ?>
			<?php endwhile; ?>
			<?php
			/*---------------------------------
			--Reset the arguments and query,--- 
			--So that multiple queries may be-- 
			--set up in a template-------------
			---------------------------------*/ 
			wp_reset_postdata(); ?>
		<?php else: 
			  //Do Nothing
		endif; ?>
		</ul>
	</div><!--/.featured-slider-->
</div><!--/.fs-wrapper-->