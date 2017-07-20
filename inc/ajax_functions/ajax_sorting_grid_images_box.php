<?php  

add_action('wp_ajax_nopriv_sorting_grid_images_box', 'sorting_grid_images_box'); 
add_action('wp_ajax_sorting_grid_images_box', 'sorting_grid_images_box');
function sorting_grid_images_box() {

	global $product; global $woocommerce;

	if (isset($_POST['rating'])) { ?>

		<?php // Sorting By Rating

			$orderBy 	= '_wc_average_rating';
			$order 		= 'DESC';

			$args = array(
				'post_type' 		=> 'product',
				'stock' 			=> 1,
				'posts_per_page' 	=> 4,
				'meta_key' 			=> $orderBy,
				'orderby' 			=> 'meta_value_num',
				'order' 			=> $order,
				);

			$query = new WP_Query( $args );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow fadeIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<div class="image-box align-v">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
				</div>
				<div class="info">

					<h3><?php echo get_the_title(); ?></h3><br>

					<?php if ($query->current_post == 0) { ?>
					<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
					<?php } else { echo ''; } ?>
					<span>
						<i class="icon-time2"> </i> <?php echo get_the_date(); ?>,

						<?php if ($query->current_post == 0 || $query->current_post == 1) { ?> 
						<i class="icon-comment-o"> </i> <?php echo comments_number(); ?>, 
						<?php } else { echo ''; } ?>

						<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?>, 
						<i class="icon-fire"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>,
						<i class="icon-star-o"> </i> <?php //$rating = $product->average_rating(); echo $rating; ?>
					</span>
				</div>
			</div>

			<?php }} ?>
		
	<?php }

	if (isset($_POST['like'])) { ?>
		
		<?php // Sorting By Rating

			$orderBy 	= 'likes';
			$order 		= 'DESC';

			$args = array(
				'post_type' 		=> 'product',
				'stock' 			=> 1,
				'posts_per_page' 	=> 4,
				'meta_key' 			=> $orderBy,
				'orderby' 			=> 'meta_value_num',
				'order' 			=> $order,
				);

			$query = new WP_Query( $args );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow fadeIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<div class="image-box align-v">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
				</div>
				<div class="info">
					<h3><?php echo get_the_title(); ?></h3><br>

					<?php if ($query->current_post == 0) { ?>
					<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
					<?php } else { echo ''; } ?>
					<span>
						<i class="icon-time2"> </i> <?php echo get_the_date(); ?>,

						<?php if ($query->current_post == 0 || $query->current_post == 1) { ?> 
						<i class="icon-comment-o"> </i> <?php echo comments_number(); ?>, 
						<?php } else { echo ''; } ?>

						<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?>, 
						<i class="icon-fire"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>,
						<i class="icon-star-o"> </i> <?php echo $rating = $product->get_average_rating(); ?>
					</span>
				</div>
			</div>

			<?php }} ?>

	<?php }

	if (isset($_POST['views'])) { ?>
		
		<?php // Sorting By Rating

			$orderBy 	= 'views';
			$order 		= 'DESC';

			$args = array(
				'post_type' 		=> 'product',
				'stock' 			=> 1,
				'posts_per_page' 	=> 4,
				'meta_key' 			=> $orderBy,
				'orderby' 			=> 'meta_value_num',
				'order' 			=> $order,
				);

			$query = new WP_Query( $args );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow fadeIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<div class="image-box align-v">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
				</div>
				<div class="info">
					<h3><?php echo get_the_title(); ?></h3><br>

					<?php if ($query->current_post == 0) { ?>
					<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
					<?php } else { echo ''; } ?>
					<span>
						<i class="icon-time2"> </i> <?php echo get_the_date(); ?>,

						<?php if ($query->current_post == 0 || $query->current_post == 1) { ?> 
						<i class="icon-comment-o"> </i> <?php echo comments_number(); ?>, 
						<?php } else { echo ''; } ?>

						<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?>, 
						<i class="icon-fire"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>,
						<i class="icon-star-o"> </i> <?php echo $rating = $product->get_average_rating(); ?>
					</span>
				</div>
			</div>

			<?php }} ?>

	<?php }

	if (isset($_POST['comments'])) { ?>
		<?php // Sorting By Rating

			$orderBy 	= '_wc_average_rating';
			$order 		= 'DESC';

			$args = array(
				'post_type' 		=> 'product',
				'stock' 			=> 1,
				'posts_per_page' 	=> 4,
				'orderby' 			=> 'comment_count',
				'order' 			=> $order,
				);

			$query = new WP_Query( $args );

			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post(); ?>

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow fadeIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<div class="image-box align-v">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
				</div>
				<div class="info">
					<h3><?php echo get_the_title(); ?></h3><br>

					<?php if ($query->current_post == 0) { ?>
					<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
					<?php } else { echo ''; } ?>
					<span>
						<i class="icon-time2"> </i> <?php echo get_the_date(); ?>,

						<?php if ($query->current_post == 0 || $query->current_post == 1) { ?> 
						<i class="icon-comment-o"> </i> <?php echo comments_number(); ?>, 
						<?php } else { echo ''; } ?>

						<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?>, 
						<i class="icon-fire"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>,
						<i class="icon-star-o"> </i> <?php echo $rating = $product->get_average_rating(); ?>
					</span>
				</div>
			</div>

			<?php }} ?>
	<?php }

	if (isset($_POST['rand'])) { ?>

	<?php // Sorting By Rating

		$args = array(
			'post_type' 		=> 'product',
			'stock' 			=> 1,
			'posts_per_page' 	=> 4,
			'orderby' 			=> 'rand'
			);

		$query = new WP_Query( $args );

		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); ?>

		<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow fadeIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow fadeIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
			<div class="image-box align-v">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>">
				<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
			</div>
			<div class="info">
				<h3><?php echo get_the_title(); ?></h3><br>

				<?php if ($query->current_post == 0) { ?>
				<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
				<?php } else { echo ''; } ?>
				<span>
					<i class="icon-time2"> </i> <?php echo get_the_date(); ?>,

					<?php if ($query->current_post == 0 || $query->current_post == 1) { ?> 
					<i class="icon-comment-o"> </i> <?php echo comments_number(); ?>, 
					<?php } else { echo ''; } ?>

					<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?>, 
					<i class="icon-fire"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?>,
					<i class="icon-star-o"> </i> <?php echo $rating = $product->get_average_rating(); ?>
				</span>
			</div>
		</div>

		<?php }} ?>

	<?php }

	wp_die();
} 


?>