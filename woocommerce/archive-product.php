<?php session_start(); ?>
<?php get_header(); ?>

<!-- Start Sidebar Shop -->
<!-- <div class='col-md-3 nopadding pull-right wow fadeIn'> -->
	<!-- Sidebar Shop -->
	<?php //dynamic_sidebar( 'shop-sidebar' ); ?>
<!-- </div> --><!-- End Sidebar Shop -->

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
		<div class="col-md-6 nopadding">
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
			<select id="order" class="select-option" name="order">
				<option value="">-- ORDERING --</option>
				<option value="date" data-order="DESC">Newest First</option>
				<option value="date" data-order="ASC">Oldest First</option>
				<option value="_regular_price" data-order="DESC">DESC Price</option>
				<option value="_regular_price" data-order="ASC">ASC Price</option>
				<option value="_wc_average_rating" data-order="DESC">DESC Rating</option>
				<option value="_wc_average_rating" data-order="ASC">ASC Rating</option>
				<option value="rand">Random</option>
			</select>

			<?php $args = array( 
				'type' 		=> 'product', 
				'taxonomy' 	=> 'product_cat' 
				); 

			$categories = get_categories( $args ); ?>

			<select id="category" class="category select-option" name="category">
				<option value="">-- CATEGORIES --</option>
			<?php foreach ($categories as $cat) { ?>
				<option value="<?php echo $cat->slug ?>"><?php echo $cat->name; ?></option>
			<?php } ?>
			</select>

			<input id="price-from" type="text" name="price-from" placeholder="From Price" />
			<input id="price-to" type="text" name="price-to" placeholder="To Price" />
			<input id="search-tag" type="search" name="tags" placeholder="Search By Tags" />
			<input id="search-name" type="search" name="names" placeholder="Search By Names" />

		</form>
	</div><!-- End Conatiner Filter -->
</div><!-- End Filter Products -->

<div class="clearfix hidden-md hidden-lg"></div>
<div class="col-md-12 nopadding">
	<!-- Start Container Shop -->
	<div class="shop-container wow fadeIn">
		<div class="parent-shop-container for-pagination">

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
				<div class="clearfix"></div>
				<div class="shop-pagination">

					<?php echo '<div class="custom-pagination">';
							echo paginate_links(array(
							'total' => $query->max_num_pages
				 			));
						echo '</div>'; ?>
				</div>

			</div>
			<!-- Here Is Result Filter -->
			<div class="result_search_shop for-pagination for-load-more">
				
			</div><!-- Here Is Result Filter -->
		</div>
	</div><!-- End Container Shop -->

<?php get_footer(); ?>


