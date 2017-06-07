<?php get_header(); ?>

<div class="col-md-9 nopadding">
	
	<?php // Start Loop
	if(have_posts()) {
		while(have_posts()) {
			the_post(); ?>

	<h1 class="text-center"><?php echo the_title(); ?></h1>
	<p><?php echo the_content(); ?></p>		

	<?php }} ?>
</div>
<div class="col-md-3 nopadding">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>

<?php get_footer(); ?>