<?php session_start(); ?>
<?php get_header(); ?>

<?php 
if (is_product_tag()) {
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $tag = $cat->slug;
} ?>

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
			'product_tag'		=> $tag
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
							'total' => $query->max_num_pages,
							'prev_text' => '<i class="icon-chevron-left2"></i>',
							'next_text' => '<i class="icon-chevron-right2"></i>'
				 			));
						echo '</div>'; ?>
				</div>

			</div>
			<!-- Here Is Result Filter -->
			<!-- <div class="result_search_shop grid for-pagination for-load-more"> -->
				
			</div><!-- Here Is Result Filter -->

	</div><!-- End Container Shop -->

<?php get_footer(); ?>


