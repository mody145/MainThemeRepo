<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="all-posts-blog">
		<div class="parent">
<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 12,
	'paged' 			=>$ourCurrentPage
	);

$posts 	= new WP_Query( $args );

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->

			<?php get_template_part( 'template/content-plog-2', get_post_format() ); ?>

		<!-- ||  Posts Content  || -->

		<?php } ?>

		<?php wp_reset_postdata(); ?>

		<?php } ?>

		</div>
	</div>

		<?php echo '<div class="custom-pagination">';
			echo paginate_links(array(
				'total' => $posts->max_num_pages
	 			));
		echo '</div>'; ?>
</div>

<!-- Start Sidebar -->
<div class="col-md-3 hidden-xs hidden-sm nopadding">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- End Sidebar -->

<?php get_footer(); ?>