<?php get_header(); ?>

<?php global $product; global $shop; ?>

<div class="col-md-12 nopadding">
	<div class="parent-dashboard-page">

		<div class="boxes">
			<!-- <h4 class="bold">Your Latest</h4> -->

			<div class="col-md-6 nopadding parent-box">

				<div class="col-md-12 nopadding">
					<div class="box1">
						<div class="head">Latest 5 Views Posts</div>
						<div class="body">

							<?php 

							$arrViews = $_SESSION['views'];

							// Return an array of the IDs ensure no empty array elements from extra commas
							$products_ids = array( 
													'post_type' 		=> 'post', 
				                                   	'post__in' 			=> $arrViews,
				                                   	'posts_per_page' 	=> 5,
				                                   	'order' 			=> 'ASC'
												);

							$loop = new WP_Query( $products_ids ); 


							if ($loop->have_posts()) {
								while ($loop->have_posts()) {
									$loop->the_post(); ?>


						<div class="item">
							<h5>
							<?php if ($loop->current_post == 0) { echo '<i class="icon-number11">'; } elseif ($loop->current_post == 1) { echo '<i class="icon-number12">'; } elseif ($loop->current_post == 2) { echo '<i class="icon-number13">'; } elseif ($loop->current_post == 3) { echo '<i class="icon-number14">'; } elseif ($loop->current_post == 4) { echo '<i class="icon-number15">'; } ?>
								
							</i>&nbsp;<a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h5>
							<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 150) . ' ...'; ?></p>
							<p class="info-for-the-post">

								<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> 
								&nbsp;<i class="icon-bubble"> </i> <?php echo comments_number(); ?>
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
							</p>
						</div>

							<?php }} ?>

						</div>
					</div>
				</div>

				<div class="col-md-12 nopadding">
					<div class="box2">
						<div class="head">Latest 5 Products You Are Liked</div>
						<div class="body">
							
							<?php 

							$arrLikes = $_SESSION['likes'];

							// Return an array of the IDs ensure no empty array elements from extra commas
							$products_ids = array( 
													'post_type' 		=> 'product', 
				                                   	'post__in' 			=> $arrLikes,
				                                   	'posts_per_page' 	=> 5,
				                                   	'order' 			=> 'ASC'
												);

							$loop = new WP_Query( $products_ids );    

							if ($loop->have_posts()) {
								while ($loop->have_posts()) {
									$loop->the_post(); ?>


						<div class="item">
							<h5>

							<?php if ($loop->current_post == 0) { echo '<i class="icon-number11">'; } elseif ($loop->current_post == 1) { echo '<i class="icon-number12">'; } elseif ($loop->current_post == 2) { echo '<i class="icon-number13">'; } elseif ($loop->current_post == 3) { echo '<i class="icon-number14">'; } elseif ($loop->current_post == 4) { echo '<i class="icon-number15">'; } ?>

							</i>&nbsp;<a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h5>
							<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 150) . ' ...'; ?></p>
							<p class="info-for-the-post">

								<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> 
								&nbsp;<i class="icon-bubble"> </i> <?php echo comments_number(); ?>
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
							</p>
						</div>

							<?php }} ?>

						</div>
					</div>
				</div>

			</div>

			<div class="col-md-6 nopadding parent-box">

				<div class="col-md-12 nopadding">
					<div class="box1">
						<div class="head">Latest 5 Views Products</div>
						<div class="body">
							
							<?php 

							$arrViews = $_SESSION['views'];

							// Return an array of the IDs ensure no empty array elements from extra commas
							$products_ids = array( 
													'post_type' 		=> 'product', 
				                                   	'post__in' 			=> $arrViews,
				                                   	'posts_per_page' 	=> 5,
				                                   	'order' 			=> 'ASC'
												);

							$loop = new WP_Query( $products_ids );    

							if ($loop->have_posts()) {
								while ($loop->have_posts()) {
									$loop->the_post(); ?>


						<div class="item">
							<h5>

							<?php if ($loop->current_post == 0) { echo '<i class="icon-number11">'; } elseif ($loop->current_post == 1) { echo '<i class="icon-number12">'; } elseif ($loop->current_post == 2) { echo '<i class="icon-number13">'; } elseif ($loop->current_post == 3) { echo '<i class="icon-number14">'; } elseif ($loop->current_post == 4) { echo '<i class="icon-number15">'; } ?>

							</i>&nbsp;<a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h5>
							<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 150) . ' ...'; ?></p>
							<p class="info-for-the-post">

								<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> 
								&nbsp;<i class="icon-bubble"> </i> <?php echo comments_number(); ?>
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
							</p>
						</div>

							<?php }} ?>

						</div>
					</div>
				</div>

				<div class="col-md-12 nopadding">
					<div class="box2">
						<div class="head">Latest 5 Items You Are Follow</div>
						<div class="body">

							<?php 

							$arrFollow = $_SESSION['follow'];

							// Return an array of the IDs ensure no empty array elements from extra commas
							$products_ids = array( 
													'post_type' 		=> 'product', 
				                                   	'post__in' 			=> $arrFollow,
				                                   	'posts_per_page' 	=> 5,
				                                   	'order' 			=> 'DESC'
												);

							$loop = new WP_Query( $products_ids );    

							if ($loop->have_posts()) {
								while ($loop->have_posts()) {
									$loop->the_post(); ?>


						<div class="item">
							<h5>
							
							<?php if ($loop->current_post == 0) { echo '<i class="icon-number11">'; } elseif ($loop->current_post == 1) { echo '<i class="icon-number12">'; } elseif ($loop->current_post == 2) { echo '<i class="icon-number13">'; } elseif ($loop->current_post == 3) { echo '<i class="icon-number14">'; } elseif ($loop->current_post == 4) { echo '<i class="icon-number15">'; } ?>

							</i>&nbsp;<a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a></h5>
							<p><?php echo $str = substr(filter_var(get_the_content(), FILTER_SANITIZE_STRING), 0, 150) . ' ...'; ?></p>
							<p class="info-for-the-post">

								<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> 
								&nbsp;<i class="icon-bubble"> </i> <?php echo comments_number(); ?>
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
							</p>
						</div>

							<?php }} ?>

						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="clearfix"></div>

		<div class="you-orders">
			<!-- <h4 class="bold">Your Orders</h4> -->
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
			<tr>
				<td>__</td>
				<td>__</td>
				<td>__</td>
				<td>__</td>
				<td>__</td>
				<td class="text-center">
					<button class="btn btn-primary btn-sm"><i class="icon-check"></i>&nbsp;To Cart</button>
					<button class="btn btn-info btn-sm"><i class="icon-close"></i>&nbsp;remove</button>
				</td>
			</tr>	
		</tbody>
		</table>
		</div>

	</div>
</div>
<?php get_footer(); ?>