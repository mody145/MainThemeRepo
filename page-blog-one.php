<?php get_header(); ?>

<!-- Start Sidebar -->
<div class="col-md-3 hidden-xs nopadding">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- End Sidebar -->

<div class="col-md-9 nopadding">
	<div class="all-posts-blog">

<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 4,
	'paged' 			=>$ourCurrentPage
	);

$posts 	= new WP_Query($args);

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->
		
			<?php get_template_part( 'content' ); ?>

		<!-- ||  Posts Content  || -->

		<?php } 

		echo '<div class="custom-pagination">';
			echo paginate_links(array(
				'total' => $posts->max_num_pages
	 			));
		echo '</div>';

		wp_reset_postdata();

		} ?>
	</div>
</div>

<?php get_footer(); ?>