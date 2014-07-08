<?php get_header(); ?>
<div class="wrapper single-post-template interior">
	<div class="row">
		<?php get_template_part('entry');?>
		<?php setPostViews(get_the_ID()); ?>
	</div><!--/.row-->
</div>
<?php get_footer(); ?>