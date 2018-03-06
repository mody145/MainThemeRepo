			<?php global $product; ?>

			<!-- Start Masonry Grid --><?php $tests = 1; ?>
			<div class="grid-item-shop nopadding post <?php if ($query->current_post !== 0 && $query->current_post !== 1 && $query->current_post !== 2) { echo 'wow fadeIn'; } else { echo ''; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">

				<a id="parent_overlay" href="<?php echo get_the_permalink(); ?>"  data-getTheID="<?php echo $product->get_id(); ?>">
					
					<div class="parent-image-in-loop-products">
						<?php if(has_post_thumbnail()) { echo '<img src="' . get_the_post_thumbnail_url( $query->post->ID, 'medium_large' ) . '" />'; } ?>
						<?php 
						if (is_product()) {
							echo '';
						} else {

							global $product;
							$list_colors_product = $product->get_attribute( 'pa_color' );
							$array_colors = explode(',', $list_colors_product);

							foreach ($array_colors as $color_product) {
								echo '<div title="' . $color_product . '" data-toggle="tooltip" data-placement="top" class="colors_product" style="background-color: ' . $color_product . ' "></div>'; 
							}
						}
						 ?>

						<?php
						    global $product;

						    $attachment_ids = $product->get_gallery_attachment_ids();
						?>

						<div class="imgs-bullets">
							<div class="show-img-box-in-hover">

							</div>

							<?php 

							if (is_product()) {
								echo '';
							} else {

								$theNum = 1;
							    foreach( $attachment_ids as $attachment_id ) {
							        $theLink = wp_get_attachment_image_src( $attachment_id, false, false )[0];
							        echo '<span data-linkImg="' . $theLink .'">' . $theNum++ . '</span>';
							    }
							}

							 ?>
						</div>
					</div>

					<!-- This OverLay Will Be Show If The Product Allready In Cart -->
					<?php if( woo_in_cart( $product->id ) ) { ?>
					<!-- Overlay Show If Item In Cart -->
					<div class="overlay">
						<i class="icon-close" id="remove_from_cart_sd" data-id="<?php echo $product->id ?>"></i>
						<i class="icon-shopping-bag"></i>
					</div><!-- Overlay Show If Item In Cart -->
					<?php } ?>
				</a>

					<!-- Check If On Sale -->
					<?php if ( $product->is_on_sale() ) { ?>
					<span class="sale"><i class="icon-sale"></i></span>
					<?php } else { echo ''; } ?>

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

				<!--====================================================
				=            Section Add To Cart And Follow            =
				=====================================================-->
				
					<!--  || !! DON'T INSERT THIS ELEMENT IN OTHER DIV ( FOR JQUERY ) || -->

					<!-- Add To Cart Button -->
					<div class="add-to-cart-container-false">
						<h3>
							<a href="#" class="add_to_cart_shop_archive" id="add_to_cart_shop_archive" data-id="<?php echo $product->get_id(); ?>">
								<i id="cart_icon" class="icons-option icon-add_shopping_cart"></i>
							</a>
						</h3>
					</div><!-- Add To Cart Button -->

					<!-- =======  FOLLOW  ======== -->
					
					<!-- Check If This Item In Current List -->
					<?php if (check_if_is_product_in_session( $_SESSION['follow'], $product->get_id() ) == true) { ?>
						<!-- If True Echo ... -->
						<div class="add-to-follow-container-false">
							<h3>
								<a id="unfollow" href="#" data-id="<?php echo $product->get_id() ?>" class="unfollow_archive">
									<i id="follow_icon" class="icons-option exists icon-heart8"></i>
								</a>
							</h3>
						</div>

					<?php } else { ?>
						<!-- If False Echo ... -->
						<div class="add-to-follow-container-true">
							<h3>
								<a id="follow" href="#" data-id="<?php echo $product->get_id() ?>" class="follow_archive">
									<i id="follow_icon" class="icons-option icon-heart-o"></i>
								</a>
							</h3>
						</div>

						<?php } ?>

				<!--=============================================
				=             Button Like And Unlike            =
				==============================================-->

				<?php if (check_if_is_product_in_session( $_SESSION['likes'], $product->get_id() ) == true) { ?>

				<div class="like-container">
					<a href="#" id="unlike_archive" data-id="<?php echo $product->get_id() ?>">
						<i id="like_icon" class="icons-option exists icon-check"></i>
					</a>
				</div>

				<?php } else { ?>

				<div class="like-container">
					<a href="#" id="like_archive" data-id="<?php echo $product->get_id() ?>">
						<i id="like_icon" class="icons-option icon-thumbs-o-up"></i>
					</a>
				</div>

				<?php } ?>

				<!--====  End of  Button Like And Unlike  ====-->

				<!--================================================
				=            Section Queck View Product            =
				=================================================-->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo $product->get_id() ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!--====  End of Section Queck View Product  ====-->
				
				<!--====  End of Section Add To Cart And Follow  ====-->
				
					<a href="<?php echo get_the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
					<?php if ( $product->is_on_sale() ) { ?>
					<span class='discount-number'><div class='numberCircle'><?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?></div></span>
					<?php } else { echo ''; } ?>

					<p class="decsription"><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="' . get_the_permalink() . '">Read More</a>'; ?></p>
					<p class="info-for-the-post text-center">

						<i class="icon-thumbs-o-up"> </i> <span class="round-info-span count_likes_here"><?php get_meta_value_if_exists( get_the_id(), 'likes' ); ?> </span>
						&nbsp;<i class="icon-bubble"> </i> <span class="round-info-span"><?php echo get_comments_number( $product->get_id() ); ?></span>
						&nbsp;<i class="icon-fire"> </i><span class="round-info-span"> <?php get_meta_value_if_exists( get_the_id(), 'views' ); ?></span>

						&nbsp;<i class="icon-clock-o"></i><span class="round-info-span"> <?php echo get_the_date(); ?></span>
					</p>
				</div>
				
			</div><!-- End Masonry Grid -->

