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

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow bounceIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<!-- Section Queck View Product -->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo get_the_ID(); ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!-- End of Section Queck View Product -->
				<a href="<?php echo get_permalink(); ?>">
					<div class="image-box align-v">
						<?php if ($query->current_post == 0) { echo '<span class="gradiant_overlay four"></span>'; } elseif ($query->current_post == 1) { echo '<span class="gradiant_overlay one"></span>'; } elseif ($query->current_post == 2) { echo '<span class="gradiant_overlay two"></span>'; } elseif ($query->current_post == 3) { echo '<span class="gradiant_overlay three"></span>'; } ?>
						<?php
						$sizeThumb = 'medium_large';
						if ($query->current_post == 2 || $query->current_post == 3) {
							$sizeThumb = 'medium';
						} else {
							$sizeThumb = 'medium_large';
						}
						 ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $sizeThumb); ?>">
						<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
					</div>
					<div class="info">

						<h3><?php echo get_the_title(); ?></h3><br>

						<?php if ($query->current_post == 0) { ?>
						<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
						<?php } else { echo ''; } ?>
					</div>
				</a>
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

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow bounceIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<!-- Section Queck View Product -->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo get_the_ID(); ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!-- End of Section Queck View Product -->
				<a href="<?php echo get_permalink(); ?>">
					<div class="image-box align-v">
						<?php if ($query->current_post == 0) { echo '<span class="gradiant_overlay four"></span>'; } elseif ($query->current_post == 1) { echo '<span class="gradiant_overlay one"></span>'; } elseif ($query->current_post == 2) { echo '<span class="gradiant_overlay two"></span>'; } elseif ($query->current_post == 3) { echo '<span class="gradiant_overlay three"></span>'; } ?>
						<?php
						$sizeThumb = 'medium_large';
						if ($query->current_post == 2 || $query->current_post == 3) {
							$sizeThumb = 'medium';
						} else {
							$sizeThumb = 'medium_large';
						}
						 ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $sizeThumb); ?>">
						<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
					</div>
					<div class="info">
						<h3><?php echo get_the_title(); ?></h3><br>

						<?php if ($query->current_post == 0) { ?>
						<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
						<?php } else { echo ''; } ?>
					</div>
				</a>
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

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow bounceIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<!-- Section Queck View Product -->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo get_the_ID(); ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!-- End of Section Queck View Product -->
				<a href="<?php echo get_permalink(); ?>">
					<div class="image-box align-v">
						<?php if ($query->current_post == 0) { echo '<span class="gradiant_overlay four"></span>'; } elseif ($query->current_post == 1) { echo '<span class="gradiant_overlay one"></span>'; } elseif ($query->current_post == 2) { echo '<span class="gradiant_overlay two"></span>'; } elseif ($query->current_post == 3) { echo '<span class="gradiant_overlay three"></span>'; } ?>
						<?php
						$sizeThumb = 'medium_large';
						if ($query->current_post == 2 || $query->current_post == 3) {
							$sizeThumb = 'medium';
						} else {
							$sizeThumb = 'medium_large';
						}
						 ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $sizeThumb); ?>">
						<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
					</div>
					<div class="info">
						<h3><?php echo get_the_title(); ?></h3><br>

						<?php if ($query->current_post == 0) { ?>
						<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
						<?php } else { echo ''; } ?>
					</div>
				</a>
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

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow bounceIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<!-- Section Queck View Product -->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo get_the_ID(); ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!-- End of Section Queck View Product -->
				<a href="<?php echo get_permalink(); ?>">
					<div class="image-box align-v">
						<?php if ($query->current_post == 0) { echo '<span class="gradiant_overlay four"></span>'; } elseif ($query->current_post == 1) { echo '<span class="gradiant_overlay one"></span>'; } elseif ($query->current_post == 2) { echo '<span class="gradiant_overlay two"></span>'; } elseif ($query->current_post == 3) { echo '<span class="gradiant_overlay three"></span>'; } ?>
						<?php
						$sizeThumb = 'medium_large';
						if ($query->current_post == 2 || $query->current_post == 3) {
							$sizeThumb = 'medium';
						} else {
							$sizeThumb = 'medium_large';
						}
						 ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $sizeThumb); ?>">
						<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
					</div>
					<div class="info">
						<h3><?php echo get_the_title(); ?></h3><br>

						<?php if ($query->current_post == 0) { ?>
						<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
						<?php } else { echo ''; } ?>
					</div>
				</a>
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

			<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding wow bounceIn'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding wow bounceIn'; } ?>" data-wow-delay=".<?php $i++; echo $i; ?>s">
				<!-- Section Queck View Product -->
				
				<div class="queck-view-container hidden-xs">
					<a href="#" id="queck_view_button" data-id="<?php echo get_the_ID(); ?>">
						<i class="icons-option icon-magnifier"></i>
					</a>
				</div>
				
				<!-- End of Section Queck View Product -->
				<a href="<?php echo get_permalink(); ?>">
					<div class="image-box align-v">
						<?php if ($query->current_post == 0) { echo '<span class="gradiant_overlay four"></span>'; } elseif ($query->current_post == 1) { echo '<span class="gradiant_overlay one"></span>'; } elseif ($query->current_post == 2) { echo '<span class="gradiant_overlay two"></span>'; } elseif ($query->current_post == 3) { echo '<span class="gradiant_overlay three"></span>'; } ?>
						<?php
						$sizeThumb = 'medium_large';
						if ($query->current_post == 2 || $query->current_post == 3) {
							$sizeThumb = 'medium';
						} else {
							$sizeThumb = 'medium_large';
						}
						 ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $sizeThumb); ?>">
						<span class="price-item"><?php global $product; echo $product->get_price(); ?></span>
					</div>
					<div class="info">
						<h3><?php echo get_the_title(); ?></h3><br>

						<?php if ($query->current_post == 0) { ?>
						<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 100) . ' ...'; ?></p>
						<?php } else { echo ''; } ?>
					</div>
				</a>
			</div>

		<?php }} ?>

	<?php }

	wp_die();
} 


?>