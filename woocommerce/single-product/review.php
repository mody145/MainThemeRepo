<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*global $product;
$id = $product->get_id();
$commentsProduct = get_comments( array(
	'post_id' => $id
) );*/ ?>



<?php //foreach ($commentsProduct as $comment) { ?>

		
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><?php echo get_avatar( $comment->comment_author_email, 80, 'http://placehold.it/80x80/ddd' ); ?></div>
					<!-- Comment Box -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><a href="http://creaticode.com/blog"><?php echo $comment->comment_author ?></a></h6>
							<span><?php $date = $comment->comment_date; echo $new_date = date('y-M-D H:i', strtotime($date)); ?></span>
							<span class="rating">
							<?php $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ); ?>

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
						</div>
						<div class="comment-content">
							<?php echo $comment->comment_content ?>
						</div>
					</div>
				</div>
			</li>


<?php //} ?>

