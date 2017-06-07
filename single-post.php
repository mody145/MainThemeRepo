<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="content-post">
		<?php // Start Loop
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>
			<img src="<?php echo get_the_post_thumbnail_url() ?>" width="100%" />
			<div class="post-meta-container">
				<h1><?php echo the_title(); ?></h1>
				<span><?php echo the_date(); ?></span>
				<span><?php echo ' , By : ' . get_the_author(); ?></span>
				<p><?php echo the_content(); ?></p>	
			</div>
			
		<?php }} ?>
	</div>

	<?php 
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	 ?>
	 
</div>

<div class="col-md-3 nopadding hidden-xs">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>

<?php get_footer(); ?>