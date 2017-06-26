			<?php global $query; global $product; ?>

			<!-- Start Masonry Grid -->
			<div class="grid-item-shop item">
				<a id="parent_overlay" href="<?php echo get_the_permalink(); ?>">
					<?php if(has_post_thumbnail()) { echo '<img src="' . get_the_post_thumbnail_url( $query->post->ID ) . '" />'; } ?>

					<!-- This OverLay Will Be Show If The Product Allready In Cart -->
					<?php if( woo_in_cart( $product->id ) ) { ?>
					<!-- Overlay Show If Item In Cart -->
					<div class="overlay">
						<i class="icon-cart-arrow-down"></i>
					</div><!-- Overlay Show If Item In Cart -->
					<?php } ?>
				</a>

					<!-- Check If On Sale -->
					<?php if ( $product->is_on_sale() ) { ?>
					<span class="sale"><i class="icon-sale"></i></span>
					<?php } else { echo ''; } ?>

				<div class="info-item">
					<span class="likes">
						<?php $rating = $product->get_average_rating(); ?>

						<!-- Start Section Rating -->
						<fieldset id='demo3' class="rating" data-toggle="tooltip" title="Can't Rating From Here ... You Can This From Item Page">
		                	<div class="tooltip top" role="tooltip">
								<div class="tooltip-arrow"></div>
								<div class="tooltip-inner">
								Can't Rating From Here ... You Can This From Item Page
								</div>
		                	</div>
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

					<span class="price">
						<?php echo  '<span class="main-price"><i class="icon-usd"> </i> ';

						if ( $product->is_on_sale() ) { echo $product->get_sale_price(); } else { echo $product->get_regular_price(); }
						echo '</span>'; ?>
						<!-- Check If On Sale -->
						<?php if ( $product->is_on_sale() ) { echo "<span class='price-without-disc'> <i class='icon-usd'></i> " . $product->get_regular_price() . " </span>"; } else { echo ''; } ?>
					</span>
				</div>

				<!-- Product Info -->
				<div class="carousel-caption">

				<!--====================================================
				=            Section Add To Cart And Follow            =
				=====================================================-->
				
					<!--  || !! DON'T INSERT THIS ELEMENT IN OTHER DIV ( FOR JQUERY ) || -->
					<?php if( woo_in_cart( $product->id ) ) { ''; } else { ?>
					<!-- Add To Cart Button -->
					<div class="add-to-cart-container-false">
						<h3><a class="add_to_cart_shop_archive" id="add_to_cart_shop_archive" data-id="<?php echo $product->get_id(); ?>" data-link="<?php echo get_template_directory_uri() . '/Ajax/add_cart.php/?add-to-cart=' . $product->get_id() . '' ?>" href="<?php echo $link_add_to_cart; ?>"><i id="cart_icon" class="icon-cart-plus"></i></a></h3>
					</div><!-- Add To Cart Button -->

					<!-- =======  FOLLOW  ======== -->
					
					<!-- Check If This Item In Current List -->
					<?php if(isset($_SESSION['follow'])) { $array_follow = $_SESSION['follow']; } else { $array_follow = array(); } ?>
					<?php if (in_array($product->get_id(), $array_follow)) { ?>
						<!-- If True Echo ... -->
						<div class="add-to-follow-container-false">
							<h3><a id="unfollow" href="<?php echo get_template_directory_uri() . '/Ajax/remove_follow.php' ?>" data-id="<?php echo $product->get_id() ?>" class="unfollow_archive" data-add="<?php echo get_template_directory_uri() . '/Ajax/add_follow.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/remove_follow.php' ?>"><i id="follow_icon" class="icon-heart6"></i></a></h3>
						</div>

					<?php } else { ?>
						<!-- If False Echo ... -->
						<div class="add-to-follow-container-true">
							<h3><a id="follow" href="<?php echo get_template_directory_uri() . '/Ajax/add_follow.php' ?>" data-id="<?php echo $product->get_id() ?>" class="follow_archive" data-add="<?php echo get_template_directory_uri() . '/Ajax/add_follow.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/remove_follow.php' ?>"><i id="follow_icon" class="icon-heart5"></i></a></h3>
						</div>

						<?php } ?>

				<!--=============================================
				=             Button Like And Unlike            =
				==============================================-->

				<?php //$countItems = get_post_meta( $product->get_id(), 'likes', true ); echo '<pre>'; print_r($countItems); echo '</pre>'; ?>

				<?php if (in_array($product->get_id(), $_SESSION['likes'])) { ?>

				<div class="like-container">
					<button class="btn btn-info btn-xs" type="button">
						<a id="unlike" data-id="<?php echo $product->get_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-check"></i>
						</a>
						<span class="badge likes-count"><?php echo get_post_meta( $product->get_id(), 'likes', true ); ?></span>
					</button>
				</div>

				<?php } else { ?>

				<div class="like-container">
					<button class="btn btn-info btn-xs" type="button">
						<a id="like" data-id="<?php echo $product->get_id() ?>" href="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-add="<?php echo get_template_directory_uri() . '/Ajax/like.php' ?>" data-remove="<?php echo get_template_directory_uri() . '/Ajax/unlike.php' ?>">
							<i id="like_icon" class="icon-thumbs-up"></i>
						</a>
						<span class="badge likes-count"><?php echo get_post_meta( $product->get_id(), 'likes', true ); ?></span>
					</button>
				</div>

				<?php } ?>

				<!--====  End of  Button Like And Unlike  ====-->
				
				<!--====  End of Section Add To Cart And Follow  ====-->
				
					<?php } ?>

					<a href="<?php echo get_the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
					<?php if ( $product->is_on_sale() ) { ?>
					<span class='discount-number'><div class='numberCircle'><?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?></div></span>
					<?php } else { echo ''; } ?>

					<p class="decsription"><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="' . get_the_permalink() . '">Read More</a>'; ?></p>
					<p class="info-for-the-post text-center">

						<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> 
						&nbsp;<i class="icon-bubble"> </i> <?php print_r($shop->post->comment_count); ?>
						&nbsp;<i class="icon-eye"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>
						<!-- <i class="icon-stack"> </i> -->  
						<!-- Get Categories Names -->
						<?php
						/*$cats = $product->get_category_ids(); 
						foreach ($cats as $cat) {

							$term = get_term_by( 'id', $cat, 'product_cat', 'ARRAY_A' );
							echo $term['name'] . ',';
						}*/
						?> 
						&nbsp;<i class="icon-clock-o"> </i> <?php echo get_the_date(); ?>
						&nbsp;<i class="icon-tag"> </i><?php if ( $product->is_on_sale() ) {  echo floor($discount) . "%"; }else{ echo "No"; } ?>

					</p>
				</div>
			</div><!-- End Masonry Grid -->
