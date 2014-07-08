<section id="content" role="main" class="wrapper">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<header class="header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
			<?php if(is_singular('post')){
				if(of_get_option('evyr_meta_checkbox')==1){
					get_template_part('assets/parts/entry', 'meta');
					};
				};?>
		</header>
		<section class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php $post_id = get_the_ID();
					$single = 'true';
					$photo_credit_url_meta_key = '_photo_credit_url_meta_value_key';
					$photo_credit_url_meta_value = get_post_meta( $post_id, $photo_credit_url_meta_key, $single );

					$photo_credit_text_meta_key = '_photo_credit_text_meta_value_key';
					$photo_credit_text_meta_value = get_post_meta( $post_id, $photo_credit_text_meta_key, $single );
				?>
				<?php if($photo_credit_text_meta_value && $photo_credit_url_meta_value){ ?>
					<span class="interior-creds wp-caption">
						<a href="<?php echo $photo_credit_url_meta_value;?>" target="_blank" title="<?php echo $photo_credit_text_meta_value?>" class="f-photo-credit">Photo Credit: <?php echo $photo_credit_text_meta_value; ?></a>
					</span>
				<?php } ?>
			<?php the_content(); ?>
		</section>
		<?php if(of_get_option('authorinfo_checkbox')==1 && is_singular('post')){ ?>
			<section class="author-written-by">
				<table>
					<tbody>
						<tr>
							<td class="author-img" rowspan="2">
								<span>
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
								</span>
							</td>
							<td class="author-name">
								<span>
									Written By: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
								</span>
							</td>
						</tr>
						<tr>
							<td class="author-info" colspan="2">
								<span>
									<?php the_author_meta( 'description' ); ?>
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		<?php }; ?>
		<?php if ('open' == $post->comment_status){ ?>
			<?php if ( ! post_password_required() ) comments_template('', true); ?>
		<?php }; ?>
	<?php endwhile; endif; ?>
</section>