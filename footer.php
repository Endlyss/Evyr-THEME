			<?php 
				$footer_cols = of_get_option('evyr_footer_cols');
				global $footer_class;
				if($footer_cols == 'evyr_1col'){
					$footer_class = 'evyrevyr_1column';
				}elseif($footer_cols == 'evyr_2col'){
					$footer_class = 'evyrevyr_2column';
				}elseif($footer_cols == 'evyr_4col'){
					$footer_class = 'evyrevyr_4column';
				}else{
					$footer_class = 'evyrevyr_turnoff';
				}
			?>

			<div class="lfooter <?php echo $footer_class;?>">
				<div class="wrapper">
					<ul class="sidebar-wrapp">
						<?php dynamic_sidebar('footer');?>
					</ul>
				</div>
			</div>
			<footer class="mfooter"><!--Main Footer-->
				<div class="wrapper">
					<?php 
						/*-------------------------------------------------------
						--Simple Paragraph Notice as well as a copyright notice--
						--To-Do List:--------------------------------------------
						--Make these customizable from the Theme options panel---
						-------------------------------------------------------*/		
					?>
					<p class="copyright">
						&copy;<?php echo bloginfo('name');?>&nbsp;<?php the_time('Y');?>
					</p>
				</div>
			</footer>
		</div><!--/.mwrapp-->
		<?php wp_footer();
			$evyr_footer_google_ana_output = of_get_option('evyr_footer_google_ana');
			if($evyr_footer_google_ana_output){
				echo '<script>' . $evyr_footer_google_ana_output . '</script>';
			};
		?>
	</body>
</html>