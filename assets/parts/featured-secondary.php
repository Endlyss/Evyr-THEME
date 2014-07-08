<div class="row sfeatured">
	<ul>
		<?php 
		/*-----------------------------------
		--Setup the Arguments for the Query--
		-----------------------------------*/
		$secondary_cata = of_get_option('evyr_secondarycata');
		$args = array(
			'post_type' => 'post',
			'cat' => $secondary_cata,
			'posts_per_page' => 2,
		);
		/*-------------------------------------------
		--Create the query user the above arguments--
		-------------------------------------------*/
		global $the_query;
		$the_query = new WP_Query( $args ); 

		if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();

		/*-------------------------------
		--Begin the content of the post--
		-------------------------------*/
		?>
			<li class="post-item">
				<a href="<?php echo the_permalink();?>">
					<span class="featured-bg">
						<?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  	the_post_thumbnail();
						}else{
							//Do Nothing
						}
						?>
					</span>
				</a>
				<div class="sf-caption">
					<a href="<?php echo get_permalink();?>" class="sf-title"><?php the_title();?></a>
					<div class="sf-creds">
						<?php $post_id = get_the_ID();
							$single = 'true';
							$photo_credit_url_meta_key = '_photo_credit_url_meta_value_key';
							$photo_credit_url_meta_value = get_post_meta( $post_id, $photo_credit_url_meta_key, $single );

							$photo_credit_text_meta_key = '_photo_credit_text_meta_value_key';
							$photo_credit_text_meta_value = get_post_meta( $post_id, $photo_credit_text_meta_key, $single );
						?>
						<?php if($photo_credit_text_meta_value && $photo_credit_url_meta_value){ ?>
							<a href="<?php echo $photo_credit_url_meta_value;?>" title="<?php echo $photo_credit_text_meta_value?>" class="f-photo-credit">Photo Credit: <?php echo $photo_credit_text_meta_value; ?></a>
						<?php } ?>
					</div>
					<div class="sf-excerpt"><?php echo excerpt(20);?></div>
					<div class="sf-panel">
						<span class="sf-date">
								<?php
									/*--------------------------------------------------
									--Sets up the Date in [Month] [Day], [Year] Format--
									--------------------------------------------------*/
									the_time('F d, Y');
								?>
							</span>
						<span class="sf-postcount">
							<?php 
							/*--Retrieve the post view count for the designated post--*/
							echo getPostViews(get_the_ID()); 
							?>
						</span>
						<?php
						/*-----------------------------------------------------------------------
						--Removed as per Theme Reqs (Temporary Removal?)-------------------------
						--http://make.wordpress.org/themes/guidelines/guidelines-accessibility/--
						<a href="<?php echo get_permalink();?>" class="sf-readmore">Read More</a>
						-----------------------------------------------------------------------*/
						?>
					</div>
				</div>
			</li><!--/.post-item-->
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
</div>