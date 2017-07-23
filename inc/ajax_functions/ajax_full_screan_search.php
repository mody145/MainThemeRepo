<?php  

add_action('wp_ajax_nopriv_full_screen_search', 'full_screen_search'); 
add_action('wp_ajax_full_screen_search', 'full_screen_search');
function full_screen_search() {

	$words = $_POST['search'];
	$product_post = $_POST['product_post'];

	$search_query = 'SELECT 
						ID,post_title 
					FROM 
						wp_posts
	                WHERE 
	                	post_title 
	                LIKE 
	                	%s';

	$like = '%'.$words.'%';
	global $wpdb;
	$results = $wpdb->get_results($wpdb->prepare($search_query, $like), ARRAY_N);

	$result_count = count($results);

	for ($i=0; $i < $result_count; $i++) { 
		
		$ids[] 		= $results[$i][0];
		$titles[] 	= $results[$i][1];
	}

	if (! empty($ids)) {

	$results = new WP_Query( array(
		'post_type' 		=> $product_post,
		'posts_per_page' 	=> -1,
		'orderby'			=>'title',
		'order'				=>'ASC',
		'post__in' 			=> $ids

		) );

	if ($results->have_posts()) {
		while ($results->have_posts()) {
			$results->the_post(); ?>

		<div class="media">
			<div class="media-left">
				<a href="<?php echo get_the_permalink(); ?>">
					<img class="media-object" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="..." style="width:100px!important;max-width: none;border-radius: 5px;" />
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading"><a style="color: #fff" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
				<?php echo $str = substr(get_the_content(), 0, 150) . ' ... '; ?>
			</div>
		</div>
			
	<?php }} else { ?>

			<h2 class="text-center">No Results</h2>

	<?php } ?>

	<?php } else { ?>

		<h2 class="text-center">No Results</h2>

	<?php } 

	wp_die();
} 


?>