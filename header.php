<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport"  content="width=device-width,initial-scale=1" />
	<title><?php wp_title(' | ', true, 'right'); ?></title>
	<?php
		$favicon_link = of_get_option('evyr_favicon_uploader');?>
	<link rel="shortcut icon" href="<?php echo $favicon_link;?>?v2" type="image/x-icon">
	<link rel="icon" href="<?php echo $favicon_link;?>?v2" type="image/x-icon">	
	<?php wp_head(); ?>
	</head>
	<?php 
		if(is_user_logged_in()){ ?>
			<style type="text/css">
				.fixed-menu
				{
					margin: 32px 0 0 0;
				}
			</style>
		<?php }	?>
	<body <?php body_class(); ?>>
		<div class="mwrapp"> 
			<header class="fixed-menu">
				<?php 
					/*-----------------------------
					--Grabs a copy of the lower----
					--header to place in a fixed---
					--position at the top of the---
					--window-----------------------
					-----------------------------*/
					get_template_part('assets/parts/header', 'lower');
				?>
			</header>
			<header class="hwrapp">
				<div class="uheader">
					<?php 
						/*----------------------------------
						--Upper Header (bar across the top)-
						----------------------------------*/
						get_template_part('assets/parts/header', 'upper');
					?>
				</div>
				<div class="mheader wrapper">
					<?php
						/*-----------------------------------------
						--Middle Header (currently just the logo)--
						--To-Do List:------------------------------
						--1. Adspace(s)----------------------------
						-----------------------------------------*/  
						get_template_part('assets/parts/header', 'mid');
					?>
				</div>
				<?php 
					/*-----------------------------
					--Lower Header-----------------
					----Line Above the Navigation--
					----Main Navigation------------
					----Line Below the Navigation--
					-----------------------------*/
					get_template_part('assets/parts/header', 'lower');
				?>
			</header>
