<?php get_header();?>

<!--=====================================
=            Sidebar Section            =
======================================-->

	<div class='col-md-3 hidden-xs hidden-sm nopadding pull-right'>

		<?php dynamic_sidebar( 'right-sidebar' ); ?>

	</div>
	<div class="clearfix hidden-md hidden-lg"></div>

<!--====  End of Sidebar Section  ====-->
<!--=======================================
=            Content Page Here            =
========================================-->

<!-- Content Page Here -->
<div class="col-md-9 nopadding clearfix">

	<!-- Section Welcome -->
	<div class="welcome-container hidden-xs">
		<?php dynamic_sidebar( 'welcome_msg' ); ?>
	</div><!-- End Section Welcome -->

	<!-- Section Closest Sale -->

	<?php 

		global $wpdb;
		$sales = $wpdb->get_results( "SELECT * FROM `wp_postmeta` WHERE `meta_key` = '_sale_price_dates_to' AND `meta_value` > 1", ARRAY_A );
		$count_sales = count($sales);
		$avilbale_sales = array();

		for ($i=0; $i < $count_sales; $i++) {
			if ( $sales[$i]['meta_value'] > time() ) {
				$avilbale_sales[] = $sales[$i]['post_id'];
			}
		}

		$random_sale = array_rand( $avilbale_sales );
		$id_random_sale = $avilbale_sales[$random_sale];

		$_product = wc_get_product( $id_random_sale );

		if( !empty($avilbale_sales) ) {

	?>
	<div class="conatiner-closest-sale hidden-xs" style="position: relative;">

		<div class="container_image_closest_sale" data-saleTo="<?php echo date_format($_product->date_on_sale_to, "Y/m/d") ?>">
			<!-- <span class="gradiant_overlay three"></span> -->
	    	<?php if(has_post_thumbnail( $_product->id )) { echo '<a href="' . get_post_permalink( $_product->id ) . '"><img src="' . get_the_post_thumbnail_url( $_product->id, 'medium_large' ) . '" /></a>'; } ?>
	    </div>
	    <div class="clock">
	    	<?php if ( count($avilbale_sales) > 1 ) { ?>
		    <i id="refresh_sale" class="icon-refresh3 round-info-span"></i>
		    <?php } ?>
	    	<span class="title_sale">This Item Have Discount<span class="numberCircle"><?php $discount = ( ($_product->regular_price - $_product->sale_price ) * 100) / $_product->regular_price; echo floor($discount) . "%"; ?></span></span>
	    	<div id="clock" data-idProduct="<?php echo $_product->id; ?>"></div>
			<h3>
				<a href="<?php echo get_post_permalink( $_product->id ) ?>"><?php echo $_product->name ?></a>
				<span class="sale_price"><i class="icon-usd"></i>&nbsp;<?php echo $_product->sale_price ?></span>
				<span class="reg_price">&nbsp;/&nbsp;<i class="icon-usd"></i>&nbsp;<?php echo $_product->regular_price ?></span>
			</h3>
			<p><?php echo $_product->description ?></p>
	    </div>

	</div><!-- Section Closest Sale -->

	<?php } else { echo ''; } ?>

	<!-- Section Slider -->
	<div class="mini-slider hidden-xs wow fadeIn">

	<?php if ( isset($_COOKIE['what_small_slider']) && $_COOKIE['what_small_slider'] == 'hide' ) { ?>

		<i class="icon-show-two toggel-opacity hide_item show_mini_slider reload_again_small_slider" data-toggle="tooltip" data-placement="top" title="Reload Slider"></i>

	<?php } elseif ( isset($_COOKIE['what_small_slider']) && $_COOKIE['what_small_slider'] == 'show' ) { ?>

		<i class="icon-close-one toggel-opacity hide_mini_slider hide_item rotate--90" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>
			<div class="skitter skitter-large with-dots">
				<ul>
				<?php 

				/* --||  Start Loop (WP-Query)  ||-- */

				$args = array(
					'post_type' 	=> 'slider',
					'post_per_post' => 10,
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'wich_slider',
				            'field'    => 'slug',
				            'terms'    => 'small-slider',
				        ),
				    ),
				);
				
				$slides = new WP_Query($args);

				if ($slides->have_posts()) {
					while ($slides->have_posts()) {
						$slides->the_post(); ?>
						 
					<li>
						<a href="#cut">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="" />
						</a>
						<div class="label_text">
							<p>
								<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
								<a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>" class="btn btn-xs btn-warning">See more</a>
							</p>
						</div>
					</li>

					<!--||  End Loop (WP-QUery)  ||-->
					<?php }} ?>
					<?php wp_reset_postdata(); ?>	

				</ul>
			</div>
	<?php } else { ?>

	<i class="icon-close-one toggel-opacity hide_mini_slider hide_item rotate--90" data-toggle="tooltip" data-placement="top" title="Don't Reload Again"></i>
		<div class="skitter skitter-large with-dots">
			<ul>
			<?php 

			/* --||  Start Loop (WP-Query)  ||-- */

			$args = array(
				'post_type' 	=> 'slider',
				'post_per_post' => 10,
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'wich_slider',
			            'field'    => 'slug',
			            'terms'    => 'small-slider',
			        ),
			    ),
			);
			
			$slides = new WP_Query($args);

			if ($slides->have_posts()) {
				while ($slides->have_posts()) {
					$slides->the_post(); ?>
					 
				<li>
					<a href="#cut">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="" />
					</a>
					<div class="label_text">
						<p>
							<h4><?php the_title(); ?></h4>
							<?php the_content(); ?>
							<a href="<?php echo get_post_meta( get_the_ID(), 'slide-link', true ); ?>" class="btn btn-xs btn-warning">See more</a>
						</p>
					</div>
				</li>

				<!--||  End Loop (WP-QUery)  ||-->
				<?php }} ?>
				<?php wp_reset_postdata(); ?>	

			</ul>
		</div>

	<?php } ?>
	</div><!-- End Section Slider -->

	<!-- Section Testimonials -->
	<div class="testimonials hidden-xs">
		<div class="container-testimonials wow fadeIn">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<?php  
				$args_testimonials1 = array('post_type' => 'wpm-testimonial'); ?>
				<?php 
				$testimonial1 = new WP_Query($args_testimonials1);
				$number = 0; 
				if ($testimonial1->have_posts()) {
					while ($testimonial1->have_posts()) {
						$testimonial1->the_post(); ?>
						
					<li <?php if ($testimonial1->current_post == 0) { echo 'class="active"'; } ?> data-target="#carousel-example-generic" data-slide-to="<?php echo $number++; ?>"><?php get_the_title(); ?></li>
				
				<?php }} ?>
				<?php wp_reset_postdata(); ?>	
				</ol>
				<div class="carousel-inner" role="listbox">
				<?php 

				/* --||  Start Loop (WP-Query)  ||-- */

				$args_testimonials = array(
					'post_type' 				=> 'wpm-testimonial',
					'post_per_post' 			=> 10,
					);
				
				$testimonial = new WP_Query($args_testimonials);

				if ($testimonial->have_posts()) {
					while ($testimonial->have_posts()) {
						$testimonial->the_post(); ?>

				<!-- Wrapper for slides -->

					<div class="item <?php if ($testimonial->current_post == 0) { echo 'active'; } ?>">
						<div class="image-testimonials">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>">
						</div>

						<div class="carousel-caption">
						<h4><i class="icon-fountain-pen-head-2"></i> <?php the_title(); ?></h4>
						<p><?php the_content(); ?></p>
						<span><?php echo get_post_meta( get_the_ID(), 'company_name', true ); ?></span>
						</div>
					</div>

				<!--||  End Loop (WP-QUery)  ||-->
				<?php }} ?>
				<?php wp_reset_postdata(); ?>				
								
				</div>
			</div>
		</div>
	</div><!-- End Section Testimonials -->

	<!-- Start Grid Images -->
	<div class="col-md-12 nopadding">
		<div class="container-grid-images wow fadeIn">
			
			<div class="buttons-section">
				<span class="hidden-xs">Top Four Items</span>
				<span class="pull-right">
					<span class="Sorting_grid" id="by_rating"><i class="icon-star-o"></i>&nbsp;Rating</span>
					<span class="Sorting_grid" id="by_like"><i class="icon-thumbs-o-up"></i>&nbsp;Like</span>
					<span class="Sorting_grid" id="by_views"><i class="icon-fire"></i>&nbsp;views</span>
					<span class="Sorting_grid" id="by_comments"><i class="icon-comment-circle"></i>&nbsp;Comments</span>
					<span class="Sorting_grid" id="rand"><i class="icon-random"></i>&nbsp;Random</span>
				</span>
				<div class="clearfix"></div>
			</div>

			<div class="grid-images">
				<!-- <span class="overlay"><i class="icon-refresh3"></i></span> -->

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

				<div class="<?php if ($query->current_post == 0) { echo 'col-md-6 col-sm-12 nopadding'; } elseif ($query->current_post == 1) { echo 'col-md-6 col-sm-4 nopadding'; } elseif ($query->current_post == 2) { echo 'col-md-3 col-sm-4 nopadding'; } elseif ($query->current_post == 3) { echo 'col-md-3 col-sm-4 nopadding'; } ?>">
					<!-- Section Queck View Product -->
					
					<div class="queck-view-container hidden-xs">
						<a href="#" id="queck_view_button" data-id="<?php echo $product->get_id() ?>">
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

				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</div><!-- Start Grid Images -->

	<?php dynamic_sidebar( 'big_advertise_here' ); ?>

	<!-- Section GridPosts -->
	<div class="services">

		<div class="buttons-section">
			<span class="hidden-xs"><?php echo __('Top Four Posts', 'smile') ?></span>
			<span class="pull-right">
				<span class="Sorting_grid" id="sorting_posts_by_latest"><i class="icon-clock-o"></i>&nbsp;Latest</span>
				<span class="Sorting_grid" id="sorting_posts_by_like"><i class="icon-thumbs-o-up"></i>&nbsp;Like</span>
				<span class="Sorting_grid" id="sorting_posts_by_views"><i class="icon-fire"></i>&nbsp;views</span>
				<span class="Sorting_grid" id="sorting_posts_by_comments"><i class="icon-comment-circle"></i>&nbsp;Comments</span>
				<span class="Sorting_grid" id="sorting_posts_rand"><i class="icon-random"></i>&nbsp;Random</span>
			</span>
			<div class="clearfix"></div>
		</div>

		<div class="services-container-box wow fadeIn">

		<?php  

		$top_posts = new WP_Query( array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 4,
			'orderby' 			=> 'rand'
			) );

		if ($top_posts->have_posts()) {
			while ($top_posts->have_posts()) {
				$top_posts->the_post(); ?>

				<?php if ($top_posts->current_post == 0) { ?>

				<div class="col-md-6 nopadding">
			    	<div class="item one">
			    		<a href="<?php echo get_permalink(); ?>">
			    			<div class="img-box align-v">
				    			<span class="gradiant_overlay four"></span>
								<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>">
							</div>
						</a>
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $str = substr(get_the_content(), 0, 110) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
						<p class="info_post">
							<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
							<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
							<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
							<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
						</p>
					</div>
			    </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 1) { ?>

			    <div class="col-md-6 col-sm-12 nopadding">
			        <div class="col-md-12 col-sm-12 nopadding">
			        	<div class="item two">

							<div class="media">
								<div class="media-left media-middle">
									<a href="<?php echo get_permalink(); ?>">
										<span class="gradiant_overlay one"></span>
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
									<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
									<p class="info_post">
										<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
										<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
										<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
										<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
									</p>
								</div>
							</div>

			        	</div>
			        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 2) { ?>

		        <div class="col-md-12 col-sm-12 nopadding">
		        	<div class="item three">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="<?php echo get_permalink(); ?>">
									<span class="gradiant_overlay two"></span>
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?></p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>

				<?php if ($top_posts->current_post == 3) { ?>

				<div class="col-md-12 col-sm-12 nopadding">
		        	<div class="item four">

		        		<div class="media">
							<div class="media-left media-middle">
								<a href="<?php echo get_permalink(); ?>">
									<span class="gradiant_overlay three"></span>
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<p><?php echo $str = substr(get_the_content(), 0, 50) . ' ... <a class="" href="' . get_permalink() . '">Read More</a>'; ?> </p>
								<p class="info_post">
									<i class="icon-thumbs-o-up"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> </span>
									<i class="icon-bubble"> </i><span class="round-info-span"><?php echo  get_comments_number(); ?>  </span>
									<i class="icon-fire"> </i><span class="round-info-span"><?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> </span>
									<i class="icon-clock-o"> </i><span class="round-info-span"><?php echo get_the_date(); ?></span>
								</p>
							</div>
						</div>

		        	</div>
		        </div>

				<?php } ?>
			
		<?php }} ?>

		    </div>
		</div>
	</div><!-- Section Services -->

</div><!--End Content Page Here -->

<!--====  End of Content Page Here  ====-->



<?php get_footer(); ?>