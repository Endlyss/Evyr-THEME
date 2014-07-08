<?php get_header(); ?>
<?php global $post; ?>
<div class="wrapper attachment-template interior">
	<div class="row">
		<section role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<header class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
			</header>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="entry-content">
				<div class="entry-attachment">
					<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large"); ?>
					<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0]; ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a></p>
					<?php else : ?>
					<a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php echo esc_html(get_the_title($post->ID), 1); ?>" rel="attachment"><?php echo basename($post->guid); ?></a>
					<?php endif; ?>
				</div>
				<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?></div>
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				</section>
			</article>
			<?php comments_template(); ?>
			<?php endwhile; endif; ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>