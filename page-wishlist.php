<?php session_start() ?>

<?php get_header(); ?>

<?php global $product; ?>

<div class="col-md-12 nopadding">
	<div class="parent-follow-page">

	<?php if (! empty($_SESSION['follow'])) { ?>

	<table class="table table-bordered">
		<thead>
			<tr>
				<td><h5 class="bold">Name</h5></td>
				<td><h5 class="bold">Price</h5></td>
				<td><h5 class="bold">Rate</h5></td>
				<td><h5 class="bold">Sale</h5></td>
				<td><h5 class="bold">Auther</h5></td>
				<td class="text-center"><h5 class="bold">Option</h5></td>
			</tr>
		</thead>
		<tbody>



		<?php

		$items_unique = array_unique($_SESSION['follow']); 

			$args = array(
				'post_type' 		=> 'product',
				'post__in' 			=> $items_unique,
				'posts_per_page' 	=> -1
				);
			$Query = new WP_Query( $args );

			if ($Query->have_posts()) {
				while($Query->have_posts()) {
					$Query->the_post(); ?>

			<tr>
				<td><?php the_title(); ?></td>
				<td><?php echo $product->get_price(); ?></td>
				<td><?php $rating = $product->get_average_rating(); ?>
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
				</td>
				<td><?php if ( $product->is_on_sale() ) { ?>

					<?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?>
					

				<?php } else { ?>

					Not In Sale 

				<?php } ?>
					
				</td>
				<td><?php the_author(); ?></td>
				<td class="text-center">
					<button class="btn btn-primary btn-sm"><i class="icon-check"></i>&nbsp;To Cart</button>
					<button class="btn btn-info btn-sm"><i class="icon-close"></i>&nbsp;remove</button>
				</td>
			</tr>	

			<?php }} ?>
		</tbody>
		</table>
	<div class="empty_white_list"><a class="btn btn-primary" href="<?php echo get_template_directory_uri() . '/Ajax/empty_white_list.php' ?>">Empty White List</a></div>

		<?php } else { ?>

		<h3 class="text-center"><i class="icon-close"></i>&nbsp; You List Is Empty &nbsp;<i class="icon-sad"></i></h3>

		<?php } ?>
		
	</div>
</div>

<?php get_footer(); ?>