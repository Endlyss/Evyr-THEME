<?php
if ( is_active_sidebar('primary-widget-area') ) { ?>
	<div class="left-sidebar">
		<ul class="sidebar-wrapp">
			<?php 
				/*----------------------------------------------------------
				--If there are active widgets in the sidebar for the page,--
				--then display the sidebar.---------------------------------
				----------------------------------------------------------*/
				dynamic_sidebar( 'primary-widget-area' );
			?>
		</ul>
	</div><!--/.left-sidebar-->
	<?php
		/*---------------------------------------------------------------
		--If it is a singular post being displayed, display it and it's--
		--content, else go through the loops-----------------------------
		---------------------------------------------------------------*/
		if (is_singular()){ 
				get_template_part('assets/parts/entry','single');
		}else{
			get_template_part('assets/parts/entry', 'loop');
		}
	?>
<?php } else { ?>
	<div class="fw-evyr"><!--Full Width Main Post Feed-->
		<?php
			/*---------------------------------------------------------------
			--If it is a singular post being displayed, display it and it's--
			--content, else go through the loops-----------------------------
			---------------------------------------------------------------*/
			if (is_singular()){ 
					get_template_part('assets/parts/entry','single');
			}else{
				get_template_part('assets/parts/entry', 'loop');
			}
		?>
	</div>
<?php }; ?>

