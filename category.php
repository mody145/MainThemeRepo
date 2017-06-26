<?php get_header(); ?>

<?php $cat_id = get_query_var( 'cat' ); ?>

<!-- Start Sidebar -->
<div class="col-md-3 hidden-xs pull-right nopadding">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- End Sidebar -->

<div class="col-md-9 nopadding">
	<div class="all-posts-blog">

<?php

$ourCurrentPage = get_query_var( 'paged' );

$args 	= array(
	'post_type'  		=> 'post',
	'posts_per_page' 	=> 4,
	'paged' 			=>$ourCurrentPage,
	'cat' 				=> $cat_id
	);

$posts 	= new WP_Query($args);

// Start Loop All Posts
if($posts->have_posts()) {
	while($posts->have_posts()) {
		$posts->the_post(); ?>

		<!-- ||  Posts Content  || -->
		
			<article class="post">
				<div class="post-thumbnail-img">
					<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<a href="<?php the_permalink(); ?>">
						<?php echo '<img src="' . get_the_post_thumbnail_url() . '" />'; ?>
					</a>
					<p class="post-info hidden-xs">
					 <i class="icon-clock-o"></i> 
					<?php the_time('F j,Y g:i a'); ?>
					 <i class="icon-pencil2"></i> By :
					<?php the_author(); ?> 
					 <i class="icon-folder-open"></i> Posted In : 
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
				<p class="some-content-post"><?php echo $str = substr(get_the_content(), 0, 180) . " ..." ?><a href="<?php echo the_permalink() ?>"> Read More</a></p>
			</article>

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