<?php session_start() ?>

<?php get_header(); ?>

<?php global $product; global $woocommerce; ?>

<div class="col-md-12 nopadding">
	<div class="parent-follow-page">

	<?php if (! empty($_SESSION['follow'])) { ?>

	<table class="table table-bordered wow fadeIn">
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
				<td>
					
					<?php wc_get_template_part( 'content', 'rating' ); ?>

				</td>
				<td><?php if ( $product->is_on_sale() ) { ?>

					<?php $discount = (($product->get_regular_price() - $product->get_sale_price()) * 100) / $product->get_regular_price(); echo floor($discount) . "%"; ?>
					

				<?php } else { ?>

					Not In Sale 

				<?php } ?>
					
				</td>
				<td><?php the_author(); ?></td>
				<td class="text-center">

				<?php
					// Git List Products In Cart 
					$items = $woocommerce->cart->get_cart();
					// Creat Empty Array
					$cart_list = array();
					// Add All ID Products To Empty Array
					foreach($items as $item) { 
						$cart_list[] = $item['product_id']; } ?>

					<!-- Check If This Item In Cart -->
					<?php if (in_array($product->get_id(), $cart_list)) { ?>
					<button disabled="disabled" class="btn btn-success btn-sm">
						<i class="icon-check3"></i>
						&nbsp;In Cart
					</button>
					<?php } else { ?>
					<button class="add_to_cart_from_whitelist_page btn btn-primary btn-sm" data-id="<?php echo get_the_id(); ?>">
						<i class="icon-check"></i>
						&nbsp;To Cart
					</button>
					<?php } ?>

					<button class="remove_from_whitelist_page btn btn-info btn-sm" data-id="<?php echo get_the_id(); ?>">
						<i class="icon-close"></i>
						&nbsp;remove
					</button>
				</td>
			</tr>	

			<?php }} ?>
		</tbody>
		</table>
	<div class="empty_white_list wow fadeIn"><a class="btn btn-primary" href="#">Empty White List</a></div>

		<?php } else { ?>

		<h3 class="text-center wow fadeIn"><i class="icon-close"></i>&nbsp; You List Is Empty &nbsp;<i class="icon-sad"></i></h3>

		<?php } ?>
		
	</div>
</div>

<?php get_footer(); ?>