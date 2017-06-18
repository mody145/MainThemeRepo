<?php get_header(); ?>

<!--=====================================
=            Sidebar Section            =
======================================-->

	<div class='col-md-3 nopadding pull-right'>
		<div class="plog-page-3">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</div>
	</div>

<!--====  End of Sidebar Section  ====-->

<!--====================================
=            Content Posts             =
=====================================-->

<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="all-posts-blog-page-3">

<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 10,
	'paged' 			=>$ourCurrentPage
	);

$posts 	= new WP_Query( $args );

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->
		
			<?php get_template_part( 'content-plog-3', get_post_format() ); ?>

		<!-- ||  Posts Content  || -->

		<?php } ?>

		<?php wp_reset_postdata(); ?>

		<?php } ?>

		<?php echo '<div class="custom-pagination">';
			echo paginate_links(array(
				'total' => $posts->max_num_pages
	 			));
		echo '</div>'; ?>

	</div>
</div>

<?php get_footer(); ?>

<!--====  End of Content Posts   ====-->

<?php get_footer(); ?>