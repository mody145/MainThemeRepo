<?php 

add_action('wp_ajax_nopriv_queick_view_windows', 'queick_view_windows'); 
add_action('wp_ajax_queick_view_windows', 'queick_view_windows');
function queick_view_windows() {

	if (isset($_POST['id'])) {
		
		global $woocommerce;
		// Get All Info About Product
		$productInfo = wc_get_product( $_POST['id'] );
		// Get Id Of Main Image
		$mainImageID = $productInfo->get_image_id();
		// Get Ids For Gallery Image
		$galleryImagesIDS = $productInfo->get_gallery_image_ids();
		// Get src Image For Main Image By Id Attachment
		wp_get_attachment_image_src( $mainImageID, false, false )[0];

		foreach ($galleryImagesIDS as $oneImageId) {
			// Get src Images Gallery By Id Attachment
			wp_get_attachment_image_src( $oneImageId, false, false )[0];
		} 
		?>	
			<div class="container-quick-veiw">
				<div class="col-md-6">
					<div id="slider3" class="">
						<div class="thumbelina-but vert top"></div>
							<ul>

							<?php foreach ($galleryImagesIDS as $oneImageId) { ?>
							    <li class="img_gallary_box"><img class="img_gallery" src="<?php echo wp_get_attachment_image_src( $oneImageId, false, false )[0] ?>"></li>
						    <?php } ?>
						    </ul>
						<div class="thumbelina-but vert bottom"></div>
					</div>

					<div class="main-image">
						<img class="main_image_product_single" src="<?php echo wp_get_attachment_image_src( $mainImageID, false, false )[0]; ?>">
					</div>
				</div>

				<div class="col-md-6">
					<div class="the-content">

						<h3 class=""><a href="<?php echo $productInfo->get_permalink() ?>"><?php echo $productInfo->get_title() ?></a></h3>

						<div class="panel-primary">

							<div class="panel-heading">
								<?php $rating = $productInfo->get_average_rating() ?>
								<!-- Start Section Rating -->
								<fieldset id='demo3' class="rating">
				                	
					                	<!-- Start -->
					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 5) { echo "checked='checked'"; } ?> id="1star53" name="rating1" value="5" />
					                    <label class = "full" for="1star53"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4.5 && $rating < 5) { echo "checked='checked'"; } ?> id="1star4half3" name="rating2" value="4.5" />
					                    <label class="half" for="1star4half3"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4 && $rating < 4.5) { echo "checked='checked'"; } ?> id="1star43" name="rating3" value="4" />
					                    <label class = "full" for="1star43"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3.5 && $rating < 4) { echo "checked='checked'"; } ?> id="1star3half3" name="rating4" value="3.5" />
					                    <label class="half" for="1star3half3"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3 && $rating < 3.5) { echo "checked='checked'"; } ?> id="1star33" name="rating5" value="3" />
					                    <label class = "full" for="1star33"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2.5 && $rating < 3) { echo "checked='checked'"; } ?> id="1star2half3" name="rating6" value="2.5" />
					                    <label class="half" for="1star2half3"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2 && $rating < 2.5) { echo "checked='checked'"; } ?> id="1star23" name="rating7" value="2" />
					                    <label class = "full" for="1star23"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1.5 && $rating < 2) { echo "checked='checked'"; } ?> id="1star1half3" name="rating8" value="1.5" />
					                    <label class="half" for="1star1half3"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1 && $rating < 1.5) { echo "checked='checked'"; } ?> id="1star13" name="rating9" value="1" />
					                    <label class = "full" for="1star13"></label>

					                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 0.5 && $rating < 1) { echo "checked='checked'"; } ?> id="1starhalf3" name="rating10" value="0.5" />
					                    <label class="half" for="1starhalf3"></label>

				                </fieldset><!-- End Section Rating -->
							</div>

							<div class="panel-body">
								<span class="price">
									<?php echo  '<span class="main-price"><i class="icon-usd"> </i> ';

									if ( $productInfo->is_on_sale() ) { echo $productInfo->get_sale_price(); } else { echo $productInfo->get_regular_price(); }
									echo '</span>'; ?>
									<!-- Check If On Sale -->
									<?php if ( $productInfo->is_on_sale() ) { echo "/ <span class='price-without-disc'><i class='icon-usd'></i>" . $productInfo->get_regular_price() . " </span>"; } else { echo '<span class="no-disc">No Disc</span>'; } ?>
								</span>
							</div>

						</div>

						<p class=""><?php echo $productInfo->get_short_description() ?></p>

						<p class=""><?php echo $productInfo->get_description() ?></p>

						<?php  
						if (isset($_COOKIE['Country_Currency'])) {

							$the_main_price = $productInfo->get_price();
							$currency = $_COOKIE['Country_Currency'];

							$byCurrency = convertCurrency($the_main_price, 'USD', $currency);
							echo '<p class="price-currency"><i class="icon-quote2"></i>&nbsp;In Your Country :&nbsp;' . $currency . '&nbsp;<span class="bold">' . $byCurrency . '</span></p>';

						} else {
							echo '<p class="note-currency" data-price="' . $productInfo->get_price() . '"><i class="icon-hand-o-up"></i>&nbsp;You Do not Choose Your Currency</p>';
						}
						?>

						<p class="stock">
						<?php if ( $productInfo->is_in_stock() ) { ?>
							<span>available : <?php echo $productInfo->get_stock_quantity() ?></span>
						<?php } else { ?>
							<span>Unavailable Now</span>
						<?php } ?>
							
						</p>

						<?php if ( $productInfo->is_on_sale() ) { ?>
						<p>
							<span class='discount-number'>

							<?php

							$discount = (($productInfo->get_regular_price() - $productInfo->get_sale_price()) * 100) / $productInfo->get_regular_price();
							echo '<span class=sale-circle>' . floor($discount) . "%</span>"; 
							echo '<span class=sale-icon><i class="icon-sale"></i></span>'; 

							?>
								
							</span>
						</p>
						<?php } else { echo ''; } ?>
						
						<p class="icons">
							<?php if( woo_in_cart( $productInfo->id ) ) { ?>
							<i  id="remove_from_cart_quick_view" class="icon-shopping-bag" data-id="<?php echo $productInfo->get_id() ?>"></i>
							<?php } else { ?>
							<i id="add_to_cart_quick_view" class="icon-add_shopping_cart" data-id="<?php echo $productInfo->get_id() ?>"></i>
							<?php } ?>

						</p>

						<p class=""><span class="posted_in"><?php echo $productInfo->get_categories() ?></span></p>
						<p class=""><span class="tagged_as"><?php echo $productInfo->get_tags() ?></span></p>

					</div>
				</div>
			</div>

			<div class="cntainer-reviews">

			<?php 

			$argsReviews = array(
				'post_id' => $productInfo->get_id()
				);

			$reviews = get_comments( $argsReviews ); ?>

				<h3><i class="icon-star"></i>&nbsp; Reviews</h3>
				<ul class="media-list">

			<?php foreach ($reviews as $review) { ?>

					<li class="media">

						<div class="media-left">
							<a href="#">
								<img class="media-object" src="<?php echo get_avatar_url( $review->comment_author_email ); ?>" alt="..." style="max-width:50px">
							</a>
						</div>

						<div class="media-body">
							<h4 class="media-heading"><?php echo $review->comment_author ?></h4>
							<p class="rev-content">
							<?php echo $review->comment_content ?>
								<span class="rating">
								<?php $rating = intval( get_comment_meta( $review->comment_ID, 'rating', true ) ); ?>

									<fieldset id='demo3' class="rating">
						                	<!-- Start -->
						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 5) { echo "checked='checked'"; } ?> id="1star53" name="rating1" value="5" />
						                    <label class = "full" for="1star53"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4.5 && $rating < 5) { echo "checked='checked'"; } ?> id="1star4half3" name="rating2" value="4.5" />
						                    <label class="half" for="1star4half3"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 4 && $rating < 4.5) { echo "checked='checked'"; } ?> id="1star43" name="rating3" value="4" />
						                    <label class = "full" for="1star43"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3.5 && $rating < 4) { echo "checked='checked'"; } ?> id="1star3half3" name="rating4" value="3.5" />
						                    <label class="half" for="1star3half3"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 3 && $rating < 3.5) { echo "checked='checked'"; } ?> id="1star33" name="rating5" value="3" />
						                    <label class = "full" for="1star33"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2.5 && $rating < 3) { echo "checked='checked'"; } ?> id="1star2half3" name="rating6" value="2.5" />
						                    <label class="half" for="1star2half3"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 2 && $rating < 2.5) { echo "checked='checked'"; } ?> id="1star23" name="rating7" value="2" />
						                    <label class = "full" for="1star23"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1.5 && $rating < 2) { echo "checked='checked'"; } ?> id="1star1half3" name="rating8" value="1.5" />
						                    <label class="half" for="1star1half3"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 1 && $rating < 1.5) { echo "checked='checked'"; } ?> id="1star13" name="rating9" value="1" />
						                    <label class = "full" for="1star13"></label>

						                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating >= 0.5 && $rating < 1) { echo "checked='checked'"; } ?> id="1starhalf3" name="rating10" value="0.5" />
						                    <label class="half" for="1starhalf3"></label>

					                </fieldset><!-- End Section Rating -->
								</span>
							</p>
							<p class="rev-date"><?php $date = $review->comment_date; echo $new_date = date('y-M-D H:i', strtotime($date)); ?></p>
						</div>

					</li>

				<?php } ?>

				</ul>

			</div>

		<?php
	}
	
	wp_die();
} 


?>