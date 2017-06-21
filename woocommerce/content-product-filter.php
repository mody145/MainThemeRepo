		<!-- Start Parent Items -->
		<div class="filter_result">
			<?php global $query; global $product; ?>

			<!-- Start items Grid -->
			<div class="grid-item-shop item">
				<a href="<?php echo get_the_permalink(); ?>">
					<?php if(has_post_thumbnail()) { echo '<img src="' . get_the_post_thumbnail_url( $query->post->ID ) . '" />'; } ?>
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

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 4.5 || $rating < 5) { echo "checked='checked'"; } ?> id="1star4half3" name="rating2" value="4.5" />
		                    <label class="half" for="1star4half3"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 4 || $rating < 4.5) { echo "checked='checked'"; } ?> id="1star43" name="rating3" value="4" />
		                    <label class = "full" for="1star43"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 3.5 || $rating < 4) { echo "checked='checked'"; } ?> id="1star3half3" name="rating4" value="3.5" />
		                    <label class="half" for="1star3half3"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 3 || $rating < 3.5) { echo "checked='checked'"; } ?> id="1star33" name="rating5" value="3" />
		                    <label class = "full" for="1star33"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 2.5 || $rating < 3) { echo "checked='checked'"; } ?> id="1star2half3" name="rating6" value="2.5" />
		                    <label class="half" for="1star2half3"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 2 || $rating < 2.5) { echo "checked='checked'"; } ?> id="1star23" name="rating7" value="2" />
		                    <label class = "full" for="1star23"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 1.5 || $rating < 2) { echo "checked='checked'"; } ?> id="1star1half3" name="rating8" value="1.5" />
		                    <label class="half" for="1star1half3"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 1 || $rating < 1.5) { echo "checked='checked'"; } ?> id="1star13" name="rating9" value="1" />
		                    <label class = "full" for="1star13"></label>

		                    <input class="stars" disabled='disabled' type="checkbox" <?php if ($rating == 0.5 || $rating < 1) { echo "checked='checked'"; } ?> id="1starhalf3" name="rating10" value="0.5" />
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
					<a href="<?php echo get_the_permalink(); ?>"><h5><?php echo get_the_title(); ?></h5></a>
					<span class="date"><?php echo get_the_date(); ?></span>

					<p class="decsription"><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="' . get_the_permalink() . '">Read More</a>'; ?></p>
					<p class="info-for-the-post text-center"><span class="bold"><i class="icon-bubble"> </i></span><?php echo $product->get_review_count(); ?>
					 | <span class="bold"><i class="icon-stack"> </i></span> 
					 <!-- Get Categories Names -->
					 <?php
					  $cats = $product->get_category_ids(); 
					  foreach ($cats as $cat) {
					  	// Get Names For Each Category
					  	$term = get_term_by( 'id', $cat, 'product_cat', 'ARRAY_A' );
					  	echo ' [ ' . $term['name'] . ' ] ';
					  }
					  ?> 
					 | <span class="bold"><i class="icon-tag"> </i></span><?php if ( $product->is_on_sale() ) {  echo floor($discount) . "%"; }else{ echo "No"; } ?></p>
				</div>
			</div><!-- End items Grid -->
		</div><!-- End Parent Items -->
