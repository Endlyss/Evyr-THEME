<?php 
/*--<span class="line-lheader">
	<?php
		/*
		a line added for above the navbar (thin 1px line)
		</span>
--*/
?>
<div class="lheader">
	<?php
		/*
			Lower Header
			Includes the following: 
				-Main Navigation
		*/
	?>
	<div class="wrapper">
		<nav class="mnavi">
			<?php
				wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); 
			?>
		</nav>
	</div>
</div>