<?php session_start(); ?>
<?php get_header(); ?>

<!-- Upperbar -->
<div class="col-md-12 nopadding wow fadeIn">
	<!-- Start Upper bar In Shop -->
	<div class="upper-bar-woo-shop">

		<div class="col-md-6 nopadding">
				<?php add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' ); ?>
				<?php 
				// Modify breadcrumb
				function jk_woocommerce_breadcrumbs() {
				    return array(
				            'delimiter'   => '&nbsp;<i class="icon-angle-double-right"></i>&nbsp;',
				            'wrap_before' => '<p class="path-shop" itemprop="breadcrumb">',
				            'wrap_after'  => '</p>',
				            'before'      => '',
				            'after'       => '',
				            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
				        );
				}
				//Creat Custom breadcrumb
				function woocommerce_custom_breadcrumb(){
				    woocommerce_breadcrumb();
				}
				add_action( 'woo_my_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );
				do_action('woo_my_custom_breadcrumb'); ?>
		</div>
		<?php print_r($sub_category) ?>
		<!-- Show Count Result -->
		<div class="col-md-6 hidden-sm hidden-xs nopadding">
			<p class="woocommerce-result-count">&nbsp;

			</p>
		</div><!-- Show Count Result -->

	</div><!-- End Upper bar In Shop -->
</div><!-- Upperbar -->

<!-- Start Filter Products -->
<div class="col-md-12 nopadding wow fadeIn">
	<!-- Start Conatiner Filter -->
	<div class="container-filter">
	<?php add_query_arg( array(
    'key1' => 'value1',
    'key2' => 'value2',
	), 'http://example.com' ); ?>

		<form id="filter_shop" method="POST" action="<?php echo admin_url('admin-ajax.php')?>">

			<div class="col-md-3 col-sm-6 col-xs-12 nopadding">
				<select id="order" class="select-option select_filter" name="order">
					<option value="date" data-order="DESC">Newest First</option>
					<option value="date" data-order="ASC">Oldest First</option>
					<option value="_regular_price" data-order="DESC">DESC Price</option>
					<option value="_regular_price" data-order="ASC">ASC Price</option>
					<option value="_wc_average_rating" data-order="DESC">DESC Rating</option>
					<option value="_wc_average_rating" data-order="ASC">ASC Rating</option>
					<option value="rand">Random</option>
				</select>
			</div>

			<?php $args = array( 
				'type' 		=> 'product', 
				'taxonomy' 	=> 'product_cat' 
				); 

			$categories = get_categories( $args ); ?>

			<div class="col-md-3 col-sm-6 col-xs-12 nopadding">
				<select id="category" class="category select-option select_filter" name="category">
				<?php foreach ($categories as $cat) { ?>
					<option value="<?php echo $cat->slug ?>"><?php echo $cat->name; ?></option>
				<?php } ?>
				</select>
			</div>

			<div class="input-group col-md-3 col-sm-6 col-xs-12 nopadding">

				<span class="input-group-addon" id="price-from"><i class="icon-usd"></i></span>
				<input class="form-control" id="price-from" type="text" name="price-from" placeholder="From Price" />

			</div>

			<div class="input-group col-md-3 col-sm-6 col-xs-12 nopadding">

				<span class="input-group-addon" id="price-to"><i class="icon-usd"></i></span>
				<input class="form-control" id="price-to" type="text" name="price-to" placeholder="Price Limit" />

			</div>

			<div class="input-group col-md-3 col-sm-6 col-xs-12 nopadding">

				<span class="input-group-addon" id="search-name"><i class="icon-chevron-right"></i></span>
				<input class="form-control" id="search-name" type="search" name="names" placeholder="Names Like ..." />

			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 nopadding">
				<select multiple="true" data-tags="true" data-placeholder="Multiple Tags" class="select-option select_filter" id="search-tag" name="tags">	

					<?php // Get List Of All Tags
					$terms = get_terms( 'product_tag' );
					// Create Empty Array
					$term_array = array();
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					    foreach ( $terms as $term ) {
					    	// Insert All Tags Slug In Empty Array
					        $term_array[] = $term->name;
					    }
					}
					// Fetch Array
					foreach ($term_array as $tagName) {

						$args = array(
						    'posts_per_page' 	=> -1,
						    'post_type' 		=> 'product',
						    'product_tag' 		=> $tagName
						);
						$query = new WP_Query( $args );
						// Get Count Results
						$count = $query->post_count;
						wp_reset_postdata();
						// Insert Into Option Tag
						echo '<option value="' . $tagName . '">[ ' . $count . ' ]&nbsp;' . $tagName . '</option>';
					}

					?>

				</select>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 nopadding">
				<select class="select-option select_filter" id="filter-color" name="colors">	

					<option value="black">Black</option>
					<option value="blue">Blue</option>
					<option value="green">Green</option>
					<option value="red">Red</option>
					<option value="yellow">Yellow</option>
					<option value="white">White</option>
					<option value="gray">Gray</option>

				</select>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 nopadding">
				<select class="select-option select_filter" id="filter-date2" name="date">	

					<option data-after="" value="<?php echo date('Y-m-d') ?>">ToDay</option>
					<option data-after="" value="tomorrow">Tomorrow</option>
					<option data-after="" value="- 7">This Week</option>
					<option data-after="" value="1 week ago">Last Week</option>
					<option data-after="" value="1 month ago">Last Month</option>
					<option data-after="" value="1 year ago">Last Year</option>

				</select>
			</div>

		</form>
	</div><!-- End Conatiner Filter -->
</div><!-- End Filter Products -->

<div class="clearfix hidden-md hidden-lg"></div>
<div class="col-md-12 nopadding">
	<!-- Start Container Shop -->
	<div class="shop-container wow fadeIn">
		<div class="parent-shop-container grid-shop-products products for-pagination">

	<?php
	// Get Current Page 
	$ourCurrentPage = get_query_var( 'paged' );
	// WP_Query 
	$woo = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 9,
			'paged' 			=> $ourCurrentPage,
			'stock' 			=> 1,
		);

		$query = new WP_Query($woo); 

		while ($query->have_posts()) {
			$query->the_post();
			global $product; ?>
			
			<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php } ?>
			<?php wp_reset_query(); ?>
			
				<?php echo '<div class="custom-pagination">';
						echo paginate_links(array(
						'total' => $query->max_num_pages,
						'prev_text' => '<i class="icon-chevron-left2"></i>',
						'next_text' => '<i class="icon-chevron-right2"></i>'
			 			));
					echo '</div>'; ?>
			</div>
			<!-- Here Is Result Filter -->
				
			</div><!-- Here Is Result Filter -->

	</div><!-- End Container Shop -->

<?php get_footer(); ?>


