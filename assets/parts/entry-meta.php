<span class="entry-meta">
	<span class="entry-author">
		Written by:
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
	</span>
	<span class="entry-categs">
	<?php
		$categories = get_the_category();
		$separator = ' ';
		$output = ' | Category: ';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'Evyr2014' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		echo trim($output, $separator);
		}
	?>
	</span>
	<span class="entry-tags">
	<?php the_tags(' | Tags: ',' / ',''); ?>
	</span>
</span>