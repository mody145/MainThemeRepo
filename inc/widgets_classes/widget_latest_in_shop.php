<?php 

/*=================================================
=            Widget Top Itemes In Shop            =
=================================================*/


           	/* --|| Top Items In Shop Widget ||-- */          	 
class top_items_in_shop extends WP_Widget {

	public function __construct() {
		parent::__construct('top_items', 'Latest Items', array(
				'description' => 'Top Items In Shop',
			));
	}
	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('Title_top'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('Title_top'); ?>" 
			value="<?php echo $instace['Title_top'] ?>" 
			name="<?php echo $this->get_field_name('Title_top'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Items'); ?>">Count Of Items : </label>
			<input id="<?php echo $this->get_field_id('Items'); ?>" 
			value="<?php echo $instace['Items'] ?>" 
			name="<?php echo $this->get_field_name('Items'); ?>" 
			type="text" 
			class="widefat" />
		</p>		
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];
		echo '<div class="top-items-shop-widget">';

		echo $args['before_title'];
		echo '<i class="icon-clock4"> </i> ' . $instace['Title_top'];
		echo $args['after_title']; ?>

		<div id="top_items_widget" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

			<?php $i = 0; ?>

			<?php 

			$woo = array(
				'post_type' 		=> 'product',
				'posts_per_page' 	=> 5,
				'orderby' 			=> 'rating',
				'stock' 			=> 1,
				);
			$shop = new WP_Query($woo);
			while ($shop->have_posts()) {
				$shop->the_post();
				global $product; ?>

			<!-- Loop All Info For Item -->

				<?php if ($i == 0) { ?>

				<!-- Add Class Active -->
				<div class="item <?php echo 'active'; ?>">
				<?php }else { ?>
				<div class="item <?php echo ''; ?>">
				<?php } ?>
					<a href="<?php echo get_the_permalink(); ?>">
						<div class="parent-image-in-loop-products">
							<?php if(has_post_thumbnail( $shop->post->ID )) { echo '<img src="' . get_the_post_thumbnail_url( $shop->post->ID ) . '" />'; } ?>
						</div>
					</a>

					<div class="info-item">

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
									<?php if ( $product->is_on_sale() ) { echo "<span class='price-without-disc'>/ <i class='icon-usd'></i>" . $product->get_regular_price() . " </span>"; } else { echo 'No Disc'; } ?>
								</span>
							</div>
						</div>

					</div>
					<!-- Product Info -->
					<div class="carousel-caption">
						<a href="<?php echo get_the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
						<?php if ( $product->is_on_sale() ) { ?>
						<span class='discount-number'>This Item Have Discount <div class='numberCircle'><?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?></div></span>
						<?php } else { echo ''; } ?>

						<p class="decsription"><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="#">Read More</a>'; ?></p>
							<p class="info-for-the-post text-center">

								<i class="icon-thumbs-o-up"> </i> <span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
								&nbsp;<i class="icon-bubble"> </i> <span class="round-info-span"><?php echo comments_number( '0', '1', '%' ); ?></span>
								&nbsp;<i class="icon-fire"> </i><span class="round-info-span"> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?></span>
								<!-- <i class="icon-stack"> </i> -->  
								<!-- Get Categories Names -->
								<?php
								/*$cats = $product->get_category_ids(); 
								foreach ($cats as $cat) {

									$term = get_term_by( 'id', $cat, 'product_cat', 'ARRAY_A' );
									echo $term['name'] . ',';
								}*/
								?> 
								&nbsp;<i class="icon-clock-o"></i><span class="round-info-span"> <?php echo get_the_date(); ?></span>
							</p>
					</div>
				</div>

				<?php $i++; ?>

				<?php } ?>

				<?php wp_reset_query(); ?>

			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#top_items_widget" role="button" data-slide="prev">
				<i class="icon-chevron-left2"></i>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#top_items_widget" role="button" data-slide="next">
				<i class="icon-chevron-right2"></i>
				<span class="sr-only">Next</span>
			</a>

		</div>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*=====  End of Widget Top Itemes In Shop  ======*/

 ?>