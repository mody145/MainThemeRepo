<?php 

add_action('wp_ajax_nopriv_get_posts_by_category_in_header_menu', 'get_posts_by_category_in_header_menu'); 
add_action('wp_ajax_get_posts_by_category_in_header_menu', 'get_posts_by_category_in_header_menu');

function get_posts_by_category_in_header_menu() {
	
	if (isset($_POST['linkCategory'])) {
		// Link In href
		$link = $_POST['linkCategory']; 
		// Explode Link By [ / ]
		$ex = explode('/', $link);
		// Remove Empty Valus From Array
		$filter = array_filter($ex);
		// Get Last In Array [ Category ]
		$category = array_slice($filter, -1);
		// Get The Taxonomy
		$taxonomy = array_slice($filter, -2);

		// Get Taxonomy Name
		$taxonomy_name = $taxonomy[0];

		// Finaly This Is Category Name :)
		$category_name = $category[0]; 

		if($taxonomy_name == 'product-category') {

			$id = get_term_by( 'slug', $category_name, 'product_cat' );

			$query = new WP_Query( array(
				'post_type' 		=> 'product',
				'posts_per_page' 	=> 4,
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'product_cat',
			            'terms' => $id,
			            'operator' => 'IN',
			        )
			    )
			) );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="post-box wow fadeIn" data-wow-duration=".5" data-wow-delay=".<?php $i++; echo $i; ?>s">
		        <div class="post-image-box preload">
		        	<img src="<?php echo get_the_post_thumbnail_url(); ?>">
		        </div>
		        <div class="info-box">
		            <h4 class=""><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
		            <p class="info_post "><?php echo $str = substr(get_the_content(), 0, 50) . ' ... '; ?></p>
		        </div>
		    </div>		
					
			<?php }}

			wp_reset_postdata();

		} elseif ($taxonomy_name == 'category') {

			$query = new WP_Query( array(
				'post_type' 		=> 'post',
				'posts_per_page' 	=> 4,
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'category_name' 	=> $category_name
				) );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="post-box wow fadeIn" data-wow-duration=".5" data-wow-delay=".<?php $i++; echo $i; ?>s">
		        <div class="post-image-box preload">
		        	<img src="<?php echo get_the_post_thumbnail_url(); ?>">
		        </div>
		        <div class="info-box">
		            <h4 class=""><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
		            <p class="info_post "><?php echo $str = substr(get_the_content(), 0, 50) . ' ... '; ?></p>
		        </div>
		    </div>		
					
			<?php }}

			wp_reset_postdata();
			wp_die();
		}
	}
	wp_die();
} 

 ?>