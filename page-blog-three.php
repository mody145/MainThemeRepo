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

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$posts = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged
) );

// Start Loop All Posts

	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->
		
			<?php get_template_part( 'content-plog-3', get_post_format() ); ?>

		<!-- ||  Posts Content  || -->

	<?php }

		// Start Pagination
		echo '<div class="custom-pagination">';
		echo paginate_links();
		echo '</div>'; ?>

		<?php wp_reset_query();  // Restore global post data ?>

	</div>
</div>

<?php get_footer(); ?>

<!--====  End of Content Posts   ====-->

<?php get_footer(); ?>