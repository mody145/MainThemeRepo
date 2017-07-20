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
			<a class="btn btn-default show-more-products text-center" data-page="1" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
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
			<a class="btn btn-default show-more-products text-center" data-page="1" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
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
			<a class="btn btn-default show-more-products text-center" data-page="1" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
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
			<a class="btn btn-default show-more-products text-center" data-page="1" data-link="<?php echo admin_url('admin-ajax.php')?>">
				<i class="icon-lightbulb-o"></i>&nbsp;
				Show More
			</a>
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

		$cat = $_POST['category'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
			'product_cat' 		=> $cat,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); ?>

	<?php

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

		$tag = $_POST['tag'];

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
			'product_tag' 		=> $tag ,
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); ?>

	<?php

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

		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
		    'meta_query' => array(
		        array(
		            'key' => '_price',
		            'value' => array($price_from, $price_to),
		            'compare' => 'BETWEEN',
		            'type' => 'NUMERIC'
		        )
		    )
		);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php', false, false ) ); ?>

		<?php }} ?>

		<?php wp_reset_query(); ?>

	<?php

	} 

	die();
}

/* ====  End of Section filter By product Price Range   ==== */

