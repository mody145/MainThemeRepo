<?php

session_start();

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>


<!-- Start Sidebar Shop -->
<div class='col-md-3 hidden-xs nopadding pull-right'>
	<!-- Sidebar Shop -->
	<?php dynamic_sidebar( 'shop-sidebar' ); ?>
</div><!-- End Sidebar Shop -->

<div class="col-md-9 nopadding">
	<!-- Start Container Singel Product Here -->
	<div class="container_singel_product">

		<!--=========================================
		=            Section breadcrumb             =
		==========================================-->
		
		<div class="col-md-12 nopadding wow fadeIn">
			<!-- Start breadcrumb Here -->
			<div class="breadcrumb_singel_product">
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
			</div><!-- End breadcrumb Here -->
		</div>
		
		<!--========  End of Section For Product  ========-->
		

		<?php while ( have_posts() ) : the_post(); ?>

			<!--=============================================
			=            Section Get Main Image             =
			==============================================-->

			<div class="clearfix"></div>
			<div class="col-md-6 nopadding wow fadeIn">
				<!-- Featuer Image For Product -->
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
				<div class="main_image_product">
					<img id="zoom_01" data-zoom-image="<?php  echo $image[0]; ?>" class="main_image_product_single" src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
				</div>
			</div>
			<!--====  End of Section Get Main Image   ====-->
			
			<!--================================================
			=            Title | Rate | Description            =
			=================================================-->
			
			<div class="col-md-6 nopadding wow fadeIn">
				<div class="meta_product">

					<div class="panel-primary">
						<div class="panel-heading">
							<?php wc_get_template_part( 'content', 'rating' ); ?>
						</div>
						<div class="panel-body">
							<span class="price">
								<?php echo  '<span class="main-price"><i class="icon-usd"> </i> ';

								if ( $product->is_on_sale() ) { echo $product->get_sale_price(); } else { echo $product->get_regular_price(); }
								echo '</span>'; ?>
								<!-- Check If On Sale -->
								<?php if ( $product->is_on_sale() ) { echo "<span class='price-without-disc'> <i class='icon-usd'></i> " . $product->get_regular_price() . " </span>"; } else { echo '<span class="no-disc">No Disc</span>'; } ?>
							</span>
						</div>
					</div>

					<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>

					<?php $review_count = $product->get_review_count(); ?>

		            <!-- Increament Views -->
		            <?php increament_post_views( $product->get_id() ) ?>
					
		            <p class="short_description"><?php echo $product->short_description; ?></p>
		            <p class="short_description"><?php the_content(); ?></p>
					
					<?php

					if (isset($_COOKIE['Country_Currency'])) {

						$the_main_price = $product->get_price();
						$currency = $_COOKIE['Country_Currency'];

						$byCurrency = convertCurrency($the_main_price, 'USD', $currency);
						echo '<p class="price-currency"><i class="icon-quote2"></i>&nbsp;In Your Country :&nbsp;' . $currency . '&nbsp;<span class="bold">' . $byCurrency . '</span></p>';

					} else {
						echo '<p class="note-currency" data-price="' . $product->get_price() . '"><i class="icon-hand-o-up"></i>&nbsp;You Do not Choose Your Currency</p>';
					}

					?>

				<!--====  End of Title | Rate | Description  ====-->

				<!--================================================
				=            Add To Cart Button Section            =
				=================================================-->
				
					<!-- Check If This Item In Cart -->
					<?php if( woo_in_cart( $product->id ) ) { ?>
						<!-- If True Echo ... -->
						<div class="add-to-cart-container-true">
							<h3><i id="cart_icon" class="icon-shopping-bag"></i></h3>
						</div>

					<?php } else { ?>
						<!-- If False Echo ... -->
						<div class="add-to-cart-container-false">
							<h3>
								<a href="#" id="add_to_cart_shop" data-id="<?php echo $product->get_id(); ?>">
									<i id="cart_icon" class="icon-add_shopping_cart"></i>
								</a>
							</h3>
						</div>

					<?php } ?>
				
				<!--====  End of Add To Cart Button Section  ====-->

				<!--===============================================
				=            Add To White List Button             =
				================================================-->

				<!-- Check If This Item In Current List -->
				<?php if (check_if_is_product_in_session( $_SESSION['follow'], $product->get_id() ) == true) { ?>
					<!-- If True Echo ... -->
					<div class="add-to-follow-container-false">
						<h3>
							<a id="unfollow" href="#" data-id="<?php echo $product->get_id() ?>" class="unfollow">
								<i id="follow_icon" class="icon-heart8"></i>
							</a>
						</h3>
					</div>

				<?php } else { ?>
					<!-- If False Echo ... -->
					<div class="add-to-follow-container-true">
						<h3>
							<a id="follow" href="#" data-id="<?php echo $product->get_id() ?>" class="follow">
								<i id="follow_icon" class="icon-heart-o"></i>
							</a>
						</h3>
					</div>

				<?php } ?>
				
				<!--====  End of Add To White List Button   ====-->

				<!--=============================================
				=             Button Like And Unlike            =
				==============================================-->

				<?php if (check_if_is_product_in_session( $_SESSION['likes'], $product->get_id() ) == true) { ?>

				<div class="like-container">
					<a id="unlike" data-id="<?php echo $product->get_id() ?>" href="#">
						<i id="like_icon" class="icon-check"></i>
					</a>
				</div>

				<?php } else { ?>

				<div class="like-container">
					<a id="like" data-id="<?php echo $product->get_id() ?>" href="#">
						<i id="like_icon" class="icon-thumbs-o-up"></i>
					</a>
				</div>

				<?php } ?>

				<!--====  End of  Button Like And Unlike  ====-->
				
				<!--==============================================
				=            Section Get Meta Product            =
				===============================================-->
				
					<!-- Start Get Meta About Product -->
					<div class="product_meta">

						<?php do_action( 'woocommerce_product_meta_start' ); ?>

						<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

							<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

						<?php endif; ?>

						<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

						<?php echo wc_get_product_tag_list( $product->get_id(), '  ', '<span class="tagged_as">' . _n( '', '', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

						<?php do_action( 'woocommerce_product_meta_end' ); ?>
					</div>
				</div>
			</div>
			
			<!--====  End of Section Get Meta Product  ====-->
			
			<!--================================================
			=            Get All Images For Product            =
			=================================================-->
			
			<!-- Get All Images For Product -->
			<?php global $product;
			$attachment_ids = $product->get_gallery_attachment_ids(); ?>

			
			<div class="col-md-6 nopadding wow fadeIn">
				<div class="gallery-box">
					<div class="owl-carousel owl-theme carousel-one">

						<?php foreach( $attachment_ids as $attachment_id ) { ?>
					    	<div class="img_gallary_box item"><img src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ) ?>" data-number="<?php $i++; echo $i; ?>" /></div>
					    <?php } ?>
					</div>
				</div>
			</div>
			
			<!--====  End of Get All Images For Product  ====-->
			

			<?php endwhile; // end of the loop. ?>
			<div class="clearfix"></div>
			<h3 class="feedback-heading"><i class="icon-star"></i>&nbsp;Feedback</h3>

			<!--==================================================
			=            Section Comments And Reviews            =
			===================================================-->
			
			<!-- Add Tabs ( Reveiws And Comments ) -->
			<div class="clearfix"></div>
			<div class="col-md-12 nopadding wow fadeIn">
				<div class="container-comments">
					<div class="comments-container">
						<ul id="comments-list" class="comments-list">
			<?php 

				$id = $product->id;

				$args = array ('post_type' => 'product', 'post_id' => $id);
				$comments = get_comments( $args );
				wp_list_comments( array( 'callback' => 'woocommerce_comments' ), $comments);
			?>
						</ul>
					</div>
				</div>
			<?php wc_get_template_part( 'single', 'product-reviews' ) ?>
			</div>
			

			<!--====  End of Section Comments And Reviews  ====-->
			
			
			<!--==============================================
			=            Section Related Products            =
			===============================================-->
			
			<div class="clearfix"></div>
			<h3 class="r_products wow fadeIn"><i class="icon-usb"></i>&nbsp; Reilated Products</h3>
			
			<!-- Start Related Products -->
			<div class="container-reilated-products products grid-shop-products wow fadeIn">
				<?php

				global $post;
				$terms = get_the_terms( $post->ID, 'product_cat' );
				foreach ($terms as $term) {
				   $term_id = $term->term_id;
				}

				$r_products = new WP_Query( array(
					'post_type' 		=> 'product',
					'post__not_in' 		=> array($id),
					'posts_per_page' 	=> 3,
					'stock' 			=> 1,
				    'tax_query' => array(
				        array(
				            'taxonomy' 	=> 'product_cat',
				            'terms' 	=> $term_id,
				            'operator' 	=> 'IN',
				        )
				    )

				) );

				if ($r_products->have_posts()) {
					while ($r_products->have_posts()) {
						$r_products->the_post();

						wc_get_template_part( 'content', 'product' );
					}
				}
			
				?>
			</div><!-- End Related Products -->
			
			<!--====  End of Section Related Products  ====-->
			

	</div><!-- Start Container Singel Product Here -->
</div>

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
