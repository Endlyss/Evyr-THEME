<?php
/*
	UPPER HEADER
	Includes the following: 
		-Top Bar Nav
		-Search box
		-social Icons
*/
?>
<div class="wrapper">
	<div class="tnavi"><!--Top Navi-->
		<?php
			/*--Pulls the navigation menu from wordpress, that has the "main menu" checkbox checked.--*/ 
			wp_nav_menu( array( 'theme_location' => 'top-navi' ) ); 
		?>
	</div>
	<div class="swidget"><!--Search Widget-->
		<?php get_search_form(); ?>
		<span class="search-icon-svg">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="search-icon-svg" x="0px" y="0px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve"><style type='text/css'>.style0{fill:	#231F20;}</style><g><path d="M9.4 1.9c1.1 0 2.2 0.5 2.9 1.2c0.8 0.7 1.2 1.8 1.2 2.9s-0.5 2.2-1.2 2.9c-0.8 0.7-1.8 1.2-2.9 1.2 S7.2 9.7 6.4 8.9C5.7 8.2 5.2 7.1 5.2 6s0.5-2.2 1.2-2.9C7.2 2.3 8.2 1.9 9.4 1.9 M9.4 0.9C8 0.9 6.7 1.4 5.7 2.4 c-1 1-1.5 2.3-1.5 3.6s0.5 2.7 1.5 3.6c1 1 2.3 1.5 3.6 1.5S12 10.6 13 9.6c1-1 1.5-2.3 1.5-3.6S14 3.3 13 2.4 C12 1.4 10.8 0.9 9.4 0.9L9.4 0.9z" class="style0"/></g><polygon points="6,11.1 2.2,14.9 0.5,13.2 4.3,9.4" class="style0"/></svg>
		</span>
	</div>
	<div class="socialb"><!--Social Bar-->
		<span class="socialb-left">
			<svg version="1.1" id="soc-left-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
			<g>
				<path fill="#231F20" d="M0,0c13.3,0,26.7,0,40,0c-6.7,6.7-13.3,13.3-20,20l0,0C13.3,13.3,6.7,6.7,0,0z"/>
			</g>
			</svg>
		</span>
		<?php echo do_shortcode(' [cn-social-icon]');?>
		<span class="socialb-right">
			<svg version="1.1" id="soc-right-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
			<g>
				<path fill="#231F20" d="M-20,0C-6.7,0,6.7,0,20,0C13.3,6.7,6.7,13.3,0,20l0,0C-6.7,13.3-13.3,6.7-20,0z"/>
			</g>
			</svg>
		</span>
	</div>
</div>