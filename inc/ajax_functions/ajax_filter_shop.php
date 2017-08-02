<?php 

/* ============================================
=            Section Sort By ....             =
============================================ */

add_action('wp_ajax_nopriv_sorting_by_date', 'sorting_by_date'); 
add_action('wp_ajax_sorting_by_date', 'sorting_by_date');

function sorting_by_date() { 

	// Sorting By Date
	// Ordering
	if (isset($_POST['orderBy']) && $_POST['orderBy'] == 'date') {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];
		
		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 9,
			'orderby'			=> $orderBy,
			'order' 			=> $order,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); 

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="order" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php } 


	// Sorting By Random
	// Ordering
	} elseif (isset($_POST['orderBy']) && $_POST['orderBy'] == 'rand') {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 9,
			'orderby' 			=> $orderBy,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query();

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="order" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php } 
 

	// Sorting By Rating
	// Ordering
	} elseif (isset($_POST['orderBy']) && $_POST['orderBy'] == '_wc_average_rating') {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 9,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query();

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="order" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php } 


	// Sorting By Price
	// Ordering
	} elseif (isset($_POST['orderBy']) && $_POST['orderBy'] == '_regular_price') {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$orderBy = $_POST['orderBy'];
		$order = $_POST['order'];

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 9,
			'meta_key' 			=> $orderBy,
			'orderby' 			=> 'meta_value_num',
			'order' 			=> $order,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query();

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="order" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php } 
 
	}

	die();
}

/* ====  End of Section filter By ....   ==== */

/* ==================================================
=            Section filter By Categore             =
================================================== */

add_action('wp_ajax_nopriv_sorting_by_category', 'sorting_by_category'); 
add_action('wp_ajax_sorting_by_category', 'sorting_by_category');

function sorting_by_category() { ?>

	<?php // Sorting By Category
	if (isset($_POST['category'])) {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$cat = $_POST['category'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
			'product_cat' 		=> $cat,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); 

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="cat" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php }

	} 

	die();
}

/* ====  End of Section filter By Categore   ==== */

/* ==================================================
=            Section filter By Tag Name             =
================================================== */

add_action('wp_ajax_nopriv_sorting_by_tag_name', 'sorting_by_tag_name'); 
add_action('wp_ajax_sorting_by_tag_name', 'sorting_by_tag_name');

function sorting_by_tag_name() { ?>

	<?php // Search By Tag
	if (isset($_POST['tag'])) {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$tag = $_POST['tag'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 6,
			'product_tag' 		=> $tag ,
			'paged' 			=> $paged
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); 

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="tag" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php }
	} 

	die();
}

/* ====  End of Section filter By Tag Name   ==== */

/* ======================================================
=            Section filter By product Name             =
====================================================== */

add_action('wp_ajax_nopriv_sorting_by_product_name', 'sorting_by_product_name'); 
add_action('wp_ajax_sorting_by_product_name', 'sorting_by_product_name');

function sorting_by_product_name() { ?>

	<?php // Search By Product Name
	if (isset($_POST['name'])) {

		global $wpdb;

		$name = $_POST['name'];

		$posttitle = '%' . $name . '%';
		$postid = $wpdb->get_results( "SELECT ID FROM wp_posts WHERE post_title LIKE '" . $posttitle . "'" );

		$result_count = count($postid);
		$ids = array();

		for ($i=0; $i < $result_count; $i++) { 
			
			$ids[] = $postid[$i]->ID;
		}

		if ( empty($ids) ) {

			echo "<div class='filter_no_results'><h3>There's No Products Have This Name</h3></div>";
		} else {

			$query_d = new WP_Query( array(
				'post_type' 		=> 'product',
				'posts_per_page' 	=> -1,
				'post__in' 			=> $ids

			) );

			if($query_d->have_posts()) {
				while($query_d->have_posts()) {
					$query_d->the_post(); ?>

					<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

			<?php }} ?>

			<?php wp_reset_query(); ?>

			<?php } ?>

	<?php

	} 

	die();
}

/* ====  End of Section filter By product Name   ==== */

/* =============================================================
=            Section filter By product Price Range             =
============================================================= */

add_action('wp_ajax_nopriv_sorting_by_product_price_range', 'sorting_by_product_price_range'); 
add_action('wp_ajax_sorting_by_product_price_range', 'sorting_by_product_price_range');

function sorting_by_product_price_range() { ?>

	<?php // Search By Product Price Range
	if (isset($_POST['price_from']) || isset($_POST['price_to'])) { 

		if (isset($_POST['price_from'])) { $price_from = $_POST['price_from']; } else { $price_from = 0; }
		if (isset($_POST['price_to'])) { $price_to = $_POST['price_to']; } else { $price_to = 1000000; }

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
			'paged' 			=> $paged,
		    'meta_query' => array(
		        array(
		            'key' 		=> '_price',
		            'value' 	=> array($price_from, $price_to),
		            'compare' 	=> 'BETWEEN',
		            'type' 		=> 'NUMERIC'
		        )
		    )
		);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); 

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="price" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php }
	} 

	die();
}

/* ====  End of Section filter By product Price Range   ==== */

/*===============================================
=            Section Filter By Color            =
===============================================*/

add_action('wp_ajax_nopriv_filter_by_color', 'filter_by_color'); 
add_action('wp_ajax_filter_by_color', 'filter_by_color');

function filter_by_color() { ?>

	<?php // Search By Tag
	if (isset($_POST['color'])) {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$color = $_POST['color']; 

		/* Filter Query Here
		-----------------------*/

		// Set attribute name and value to search for
		$attribute_name  = 'color';
		$attribute_value = $color;
		 
		$args = array(
		    'post_type'      => 'product',
		    'post_status'    => 'any',
		    'posts_per_page' => 9,
		    'orderby'        => 'title',
		    'order'          => 'ASC',
		    'paged' 			=> $paged,
		    'tax_query'      => array(
		        array(
		            'taxonomy' => 'pa_' . $attribute_name,
		            'field'    => 'name', // can be 'slug'
		            'terms'    => $attribute_value,
		        ),
		    ),
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) {
		    $loop->the_post();

		    include( locate_template( 'woocommerce/content-product.php', false, false ) );
		}
		wp_reset_postdata();

		/* End Of Filter Here
		-----------------------*/

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="color" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php }

	} 

	die();
}

/*=====  End of Section Filter By Color  ======*/

/*==============================================
=            Section Filter By Date            =
==============================================*/

add_action('wp_ajax_nopriv_filter_by_date2', 'filter_by_date2'); 
add_action('wp_ajax_filter_by_date2', 'filter_by_date2');

function filter_by_date2() { ?>

	<?php // Search By Tag
	if (isset($_POST['date'])) {

		if (isset($_POST['page'])) { $paged = $_POST['page']+1; } else { $paged = 1; }

		$date = $_POST['date'];

		/* Filter Query Here
		-----------------------*/

		if ( $date == date('Y-m-d') ) {
			$queryDate = array(
					        array(
						        'after' => 'today',
						        'inclusive' => true,
					        )
					    );
		}

		if ( $date == 'tomorrow' ) {
			$queryDate = array(
					        array(
						        'after' => '2 day ago',
						        'before' => '1 day ago',
						        'inclusive' => true,
					        )
					    );
		}

		if ( $date == '- 7' ) {
			$queryDate = array(
					        array(
								'year' => date( 'Y' ),
								'week' => date( 'W' ),
					        )
					    );
		}

		if ( $date == '1 week ago' ) {
			$queryDate = array(
					        array(
						        'after' => '2 week ago',
						        'before' => '1 week ago',
						        'inclusive' => true,
					        )
					    );
		}

		if ( $date == '1 month ago' ) {
			$queryDate = array(
					        array(
						        'after' => '2 month ago',
						        'before' => '1 month ago',
						        'inclusive' => true,
					        )
					    );
		}

		if ( $date == '1 year ago' ) {
			$queryDate = array(
					        array(
						        'after' => '2 year ago',
						        'before' => '1 year ago',
						        'inclusive' => true,
					        )
					    );
		}

		$args = array(
		    'post_type'      => 'product',
		    'post_status'    => 'any',
		    'posts_per_page' => 1,
		    'orderby'        => 'date',
		    'order'          => 'DESC',
		    'paged' 		 => $paged,
		    'date_query' => $queryDate
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) {
		    $loop->the_post();

		    include( locate_template( 'woocommerce/content-product.php', false, false ) );
		}
		wp_reset_postdata();

		/* End Of Filter Here
		-----------------------*/

		if (isset($_POST['page'])) { ''; } else { ?>
		
		<div class="load-more-container text-center">
		<?php if ($query->max_num_pages == 1) { echo ''; } else { ?>
			<a class="btn btn-default show-more-products text-center" data-page="1" data-query="date2" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
		<?php } ?>
		</div>
		<?php }
	} 

	die();
}

/*=====  End of Section Filter By Date  ======*/



