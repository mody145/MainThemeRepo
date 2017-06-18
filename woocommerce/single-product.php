<?php
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
<div class='col-md-3 nopadding pull-right'>
	<!-- Sidebar Shop -->
	<?php dynamic_sidebar( 'shop-sidebar' ); ?>
</div><!-- End Sidebar Shop -->


<div class="col-md-9 nopadding">
	<!-- Start Container Singel Product Here -->
	<div class="container_singel_product">

		<!--=========================================
		=            Section breadcrumb             =
		==========================================-->
		
		<div class="col-md-12 nopadding">
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
			<div class="col-md-6 nopadding">
				<!-- Featuer Image For Product -->
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
				<div class="main_image_product">
					<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
				</div>
			</div>
			<!--====  End of Section Get Main Image   ====-->
			
			<!--================================================
			=            Title | Rate | Description            =
			=================================================-->
			
			<div class="col-md-6 nopadding">
				<div class="meta_product">
					<?php the_title( '<h1 class="product_title entry-title">', '</h1>' ); ?>
					<?php $average = $product->get_average_rating(); ?>
					<?php $review_count = $product->get_review_count(); ?>

					<!-- Start Section Rating -->
					<fieldset id='demo3' class="rating" data-toggle="tooltip" title="Can't Rating From Here ... You Can This From Item Page">
		            	<div class="tooltip top" role="tooltip">
							<div class="tooltip-arrow"></div>
							<div class="tooltip-inner">
							Can't Rating From Here ... You Can This From Item Page
							</div>
		            	</div>
		            	<!-- Start -->
		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 5) { echo "checked='checked'"; } ?> id="1star53" name="rating1" value="5" />
		                <label class = "full" for="1star53"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 4.5) { echo "checked='checked'"; } ?> id="1star4half3" name="rating2" value="4.5" />
		                <label class="half" for="1star4half3"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 4) { echo "checked='checked'"; } ?> id="1star43" name="rating3" value="4" />
		                <label class = "full" for="1star43"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 3.5) { echo "checked='checked'"; } ?> id="1star3half3" name="rating4" value="3.5" />
		                <label class="half" for="1star3half3"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 3) { echo "checked='checked'"; } ?> id="1star33" name="rating5" value="3" />
		                <label class = "full" for="1star33"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 2.5) { echo "checked='checked'"; } ?> id="1star2half3" name="rating6" value="2.5" />
		                <label class="half" for="1star2half3"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 2) { echo "checked='checked'"; } ?> id="1star23" name="rating7" value="2" />
		                <label class = "full" for="1star23"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 1.5) { echo "checked='checked'"; } ?> id="1star1half3" name="rating8" value="1.5" />
		                <label class="half" for="1star1half3"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 1) { echo "checked='checked'"; } ?> id="1star13" name="rating9" value="1" />
		                <label class = "full" for="1star13"></label>

		                <input class="stars" disabled='disabled' type="checkbox" <?php if ($average == 0.5) { echo "checked='checked'"; } ?> id="1starhalf3" name="rating10" value="0.5" />
		                <label class="half" for="1starhalf3"></label> 

		            </fieldset><!-- End Section Rating -->
					
		            <p class="reviews_count"> <?php echo ' [ ' . $review_count . ' ] Reviews' ?></p>
		            <p class="short_description"><?php echo $product->short_description; ?></p>
		            <p class="short_description"><?php the_content(); ?></p>
		            <p class="price"><?php echo $product->get_price_html(); ?></p>

		            <?php //echo '<pre>'; print_r($product); echo '</pre>'; ?>

				<!--====  End of Title | Rate | Description  ====-->

				<!--==============================================
				=            Section Get Meta Product            =
				===============================================-->
				
					<!-- Start Get Meta About Product -->
					<div class="product_meta">

						<?php do_action( 'woocommerce_product_meta_start' ); ?>

						<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

							<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

						<?php endif; ?>

						<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

						<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

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

			
			<div class="col-md-6 nopadding">
				<div class="images_gallery">
					<?php foreach( $attachment_ids as $attachment_id ) { ?>
					
						<?php echo '<div class="img_gallary_box"><img src="' . $image_link = wp_get_attachment_url( $attachment_id ) . '" width="200px" /></div>'; } ?>
					
				</div>
			</div>
			
			<!--====  End of Get All Images For Product  ====-->
			

		<?php endwhile; // end of the loop. ?>

		<!-- Add Tabs ( Reveiws And ) -->
		<div class="clearfix"></div>
		<div class="col-md-12 nopadding">
			<?php wc_get_template_part( 'single', 'product-reviews' ) ?>
		</div>

	</div><!-- Start Container Singel Product Here -->
</div>

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
