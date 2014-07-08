<?php
		$total_pages = $wp_query->max_num_pages;
		if($total_pages > 1){
	?>
	<div class="mp-pagi">
	<?php
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			   	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '??__=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
					/*--SVG Usage for Next and prev--*/
				'prev_text' => '
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 10 12" enable-background="new 0 0 10 12" xml:space="preserve">
					<g id="Layer_1">
						<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="8" y1="2.4" x2="2" y2="6"/>
					</g>
					<g id="Layer_1_copy">
						<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="8" y1="9.6" x2="2" y2="6"/>
					</g>
					</svg>
					',  
				'next_text' => '
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 10 12" enable-background="new 0 0 10 12" xml:space="preserve">
					<g id="Layer_1">
						<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="2" y1="2.4" x2="8" y2="6"/>
					</g>
					<g id="Layer_1_copy">
						<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="2" y1="9.6" x2="8" y2="6"/>
					</g>
					</svg>
				' 
			    ));    
		?>
		<span class="divider"></span>
	</div>
	<?php 
	}/*--End If Conditional--*/
	?>