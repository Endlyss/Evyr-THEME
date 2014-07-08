<?php 
/*------------------------------------------------------------------------------
--This is the index.php, it is a template that serves as a default.-------------
--To set this as the front page, normally wordpress is automatically------------
--set up to use it, but if it isn't head into:----------------------------------
--Dashboard -> Settings -> Reading -> Radio Button next to 'Your Latest Posts'--
------------------------------------------------------------------------------*/
get_header();?>
	
	<?php 
		/*---------------------------------------------------------
		--Two Template parts found in assets/parts-----------------
		--that are used to create a main featured slider and the---
		--two vertical posts next to it----------------------------
		---------------------------------------------------------*/

		$main_cata = of_get_option('evyr_main_cata_hide');
		if($main_cata==1){
			get_template_part('assets/parts/featured', 'slider');
		}else{

		}
	?>

	<?php
		/*---------------------------------------------------------
		--One Template part, found in the assets/parts-------------
		--Used to create the two-post loop that is below the-------
		--Main Slider.---------------------------------------------
		-----------------------------------------------------------
		--To-Do List:----------------------------------------------
		--1. Option to hide this section in the theme options------
		--==-Panel.------------------------------------------------
		---------------------------------------------------------*/
		$sec_cata = of_get_option('evyr_secondary_cata_hide');
		if(empty($sec_cata)){
			$sec_cata = 1;
		}
		if($sec_cata!==1){

			get_template_part('assets/parts/featured', 'secondary');

		}else{
			//Do Nothing
		}
	?>
<div class="wrapper mcontent">
	<div class="row">
		<?php get_template_part('entry');?>
	</div><!--/.row-->
</div><!--/.mcontent-->

<?php get_footer();?>