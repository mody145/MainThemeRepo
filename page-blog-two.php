<?php get_header(); ?>

<div class="col-md-9 nopadding">
	<div class="all-posts-blog">
		<div class="parent">
<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 10,
	'paged' 			=>$ourCurrentPage
	);

$posts 	= new WP_Query($args);

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->

			<div class="grid-item">
				<article class="post">
					<div class="post-thumbnail-img">
						<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<a href="<?php the_permalink(); ?>">
							<?php echo '<img src="' . get_the_post_thumbnail_url() . '" />'; ?>
						</a>
						<p class="post-info">
						<?php the_time('F j,Y g:i a'); ?>
						 | By 
						<?php the_author(); ?>
						 | Posted In 
						<?php 

						$categories =  get_the_category();
						$separator = ', ';
						$output = '';

						if ($categories) {
							foreach ($categories as $category) {
								$output .= "<a href='" . get_category_link($category->term_id) . "'>" . $category->cat_name . "</a>" . $separator;
							}
							echo trim($output, $separator);
						} ?>
							
						</p>
					</div>
					<p class="some-content-post two"><?php echo $str = substr(get_the_content(), 0, 120) . " ..." ?><a href="<?php echo the_permalink() ?>"> Read More</a></p>
				</article>
			</div>

		<!-- ||  Posts Content  || -->

		<?php }} ?>

		</div>
	</div>

		<?php echo '<div class="custom-pagination">';
			echo paginate_links(array(
				'total' => $posts->max_num_pages
	 			));
		echo '</div>';

		wp_reset_postdata(); ?>
</div>

<!-- Start Sidebar -->
<div class="col-md-3 hidden-xs hidden-sm nopadding">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- End Sidebar -->

<?php get_footer(); ?>