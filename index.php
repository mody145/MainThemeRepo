<?php get_header(); ?>

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

	<!-- Section Slider -->
	<div class="mini-slider hidden-xs">
		<div class="skitter skitter-large with-dots">
			<ul>
			<?php 

			/* --||  Start Loop (WP-Query)  ||-- */

			$args = array(
				'post_type' 	=> 'slider',
				'post_per_post' => 10,
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
	</div><!-- End Section Slider -->

	<!-- Section Features -->
	<div class="feat">
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="box-feat">
				<i class="icon-monocle"></i>
				<h3 class="bold text-uppercase">our experience</h3>
				<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				<a href="<?php echo home_url( 'about-us' ); ?>" class="btn btn-info">Read More</a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="box-feat-2">
				<i class="icon-bomb"></i>
				<h3 class="bold">OUR SERVICES</h3>
				<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				<a href="<?php echo home_url( 'services' ); ?>" class="btn btn-info">Read More</a>
			</div>
		</div>
	</div><!-- End Section Features -->

	<!-- Start Grid Images -->
	<div class="col-md-12 nopadding">
		<div class="container-grid-images">

			<div class="buttons-section">
				Top Four
			</div>

			<div class="grid-images">

				<div class="col-md-6 col-sm-12 nopadding">
					<div class="image-box align-v">
						<img src="http://placehold.it/500x700/700">
					</div>
					<div class="info">
						<h3>test</h3>
						<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
						<span>
							<i class="icon-time2"> </i> 25 June 2015, 
							<i class="icon-comment-o"> </i> 5, 
							<i class="icon-like"> </i> 12, 
						</span>
					</div>
				</div>

				<div class="col-md-6 col-sm-4 nopadding">
					<div class="image-box align-v">
						<img src="http://placehold.it/500x700/700">
					</div>
					<div class="info">
						<h3>test</h3>
						<p>is simply dummy text of the printing and typesetting industry. Lorem </p>
						<span>
							<i class="icon-time2"> </i> 25 June 2015, 
							<i class="icon-comment-o"> </i> 5, 
							<i class="icon-like"> </i> 12, 
						</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 nopadding">
					<div class="image-box align-v">
						<img src="http://placehold.it/500x700/700">
					</div>
					<div class="info">
						<h3>test</h3>
						<span>
							<i class="icon-time2"> </i> 25 June 2015, 
							<i class="icon-comment-o"> </i> 5, 
							<i class="icon-like"> </i> 12, 
						</span>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 nopadding">
					<div class="image-box align-v">
						<img src="http://placehold.it/500x700/700">
					</div>
					<div class="info">
						<h3>test</h3>
						<span>
							<i class="icon-time2"> </i> 25 June 2015, 
							<i class="icon-comment-o"> </i> 5, 
							<i class="icon-like"> </i> 12, 
						</span>
					</div>
				</div>

			</div>
		</div>
	</div><!-- Start Grid Images -->

	<div class="clearfix"></div>


	<!-- Section Testimonials -->
	<div class="testimonials hidden-xs">
		<div class="container-testimonials">
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
							<img src="<?php echo get_the_post_thumbnail_url(); ?>">
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

	<!-- Section Services -->
	<div class="services">
		<div class="services-container">
			Test
		</div>
	</div><!-- Section Services -->

	<!-- Start Section Latest Posts -->
	<div class="latest-posts-blog">

    	<?php global $query_string;
        query_posts ('posts_per_page=6');
        if (have_posts()) { while (have_posts()) { the_post(); ?>
        
		<div class="col-md-6 col-sm-6">
			<div class="post-image-home">
				<img src="http://placehold.it/350/333<?php //echo get_the_post_thumbnail_url(); ?>">
			</div>
			<h3 class="post_title"><a href="<?php echo get_permalink(); ?>"><i class="icon-chevron-right2"> </i> <?php echo the_title(); ?></a></h3>
			<p><?php echo $str = substr(get_the_content(), 0, 150) . ' ... <a class="btn btn-info btn-sm" href="' . get_permalink() . '">Read More</a>'; ?></p>
			<p class="info_post">
				<i class="icon-user2"> </i><?php echo get_the_author(); ?>
				<i class="icon-thumbs-o-up"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'likes' )) { echo get_post_meta( get_the_id(), 'likes', true ); } else { echo 0; } ?> <i class="icon-bubble"> </i> <?php echo  get_comments_number(); ?>  <i class="icon-eye"> </i> <?php if (metadata_exists( 'post', get_the_id(), 'views' )) { echo get_post_meta( get_the_id(), 'views', true ); } else { echo 0; }  ?> <i class="icon-clock-o"> </i> <?php echo get_the_date(); ?>
			</p>
		</div>

		<?php }} ?>
	</div><!-- End Section Latest Posts -->

</div><!--End Content Page Here -->

<!--====  End of Content Page Here  ====-->



<?php get_footer(); ?>