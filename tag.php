<?php get_header(); ?>

<?php 

if (is_tag()) {
	$tag = get_queried_object();
    $tag_slug = $tag->slug;
}

?>

<!-- Start Sidebar -->
<div class="col-md-3 col-sm-6 hidden-xs nopadding pull-right">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- End Sidebar -->

<div class="col-md-9 col-sm-6 nopadding">
	<div class="all-posts-blog">

<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 4,
	'paged' 			=>$ourCurrentPage,
	'tag' 				=> $tag_slug
	);

$posts 	= new WP_Query( $args );

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->
		
			<?php get_template_part( 'template/content-plog-1', get_post_format() ); ?>

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